<?php

namespace App\Http\Controllers\Labour;

use App\Http\Controllers\Controller;
use App\Models\Labour\Labourname;
use App\Models\CRM\Leeds;
use PDF;
use Mail;
use App\Models\Labour\Labourtype;
use App\Models\Labour\Labourbill;
use App\Models\Purchase\purchase;
use App\Models\Purchase\PurchaseType;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Helpers\Helperlb;
use App\Models\Inventory\Stock;
use App\Models\Settings\BusinessBranch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class LabourController extends Controller
{
    //LabourName
    public function labourlist()
    {
        //        $user = Labourname::all();
        $user = Labourname::paginate(10);
        return view('labour.labourname', ['labors' => $user]);
    }
    public function addLabourForm()
    {
        $types = Labourtype::all();
        $branches = BusinessBranch::all();
        return view('labour.addlabour', compact('types', 'branches'));
    }
    function addLabour(Request $req)
    {
        $req->validate([
            'labourName' => 'required'
        ]);
        // dd($req->all());
        $files = [];
        if ($req->hasFile('filenames')) {
            foreach ($req->file('filenames') as $file) {
                $name = rand(1, 50) . $file->getClientOriginalName();
                $file->move(public_path('labour_files'), $name);
                $files[] = $name;
            }
        }

        $user = new Labourname;
        $user->filenames = $files;
        $user->labourName = $req->labourName;
        $user->labourType = $req->type;
        $user->businessBranch = $req->branch;
        $user->labourId = Helperlb::IdGenerator(new Labourname(), 'labourId', 5, 'L1');
        $user->mob1No = $req->mob1No;
        $user->mob2No = $req->mob2No;
        $user->email = $req->email;
        $user->subDistrict = $req->subDistrict;
        $user->district = $req->district;
        $user->address = $req->address;
        $user->note = $req->note;
        $user->save();
        return redirect('labour-list')->with('message', 'Successful! New Labour Created Successfully');
    }
    public function getLabourInformation(Request $request)
    {
        $user = Labourname::where('id', $request->id)->first();
        return $user;
    }
    function lbrdelete(Request $request)
    {
        Labourname::where('id', $request->id)->delete();
        return redirect('labour-list')->with('message', 'Successful! Labour Deleted Successfully');
    }
    public function lbrEdit($id)
    {
        $types = Labourtype::all();
        $branches = BusinessBranch::all();
        $labor = Labourname::find($id);

        // $filenames = json_decode($labor->filenames);
        // dd($filenames);
        return view('labour.updatelabour', compact('types', 'branches','labor'));
    }
    function labourUpdate(Request $req)
    {

        $data = Labourname::find($req->id);

        if($req->file)
        {
          foreach($req->file as $file)
          {
             $path = public_path('labour_files/');
             $fileName = time().'_'.$file->getClientOriginalName();
             $file->move($path, $fileName);

             if ($data->file)
             {
                File::delete($path.'/'.json_decode($data->file)[0]);
             }

             $fileData[] = $fileName;
          }
          $doc= json_encode($fileData); //replace $doc['file'] with $doc
          $data->filenames=$doc;
        }

    //    $c->save();

        $data->labourName = $req->labourName;
        $data->labourId = $req->labourId;
        $data->labourType = $req->type;
        $data->businessBranch = $req->branch;
        $data->mob1No = $req->mob1No;
        $data->mob2No = $req->mob2No;
        $data->email = $req->email;
        $data->subDistrict = $req->subDistrict;
        $data->district = $req->district;
        $data->address = $req->address;
        $data->note = $req->note;
        $data->save();
        return redirect()->back()->with('message', 'Successful! Labour Updated Successfully');
        // return redirect('labour-list')->with('message', 'Successful! Labour Updated Successfully');
    }
    function labourSearch(Request $req)
    {
        $data = Labourname::where('labourName', 'like', '%' . $req->input('query') . '%')->get();
        return view('labour.searchlabour', ['labors' => $data]);
    }
    //LabourName

    //LabourType
    public function labourTypeList()
    {
        //$user = Labourtype::all();
        $user = Labourtype::paginate(5);
        return view('labour.labourtypename', ['labors' => $user]);
    }
    public function addLabourTypeForm()
    {
        return view('labour.addlabourtype');
    }
    function addLabourType(Request $req)
    {
        $req->validate([
            'labourTypeName' => 'required'
        ]);
        $user = new Labourtype;
        $user->labourTypeName = $req->labourTypeName;
        $user->code = $req->code;
        $user->save();
        return redirect('labour-type-list')->with('message', 'Successful! New Labour Type Created Successfully');
    }
    public function getLabourTypeInformation(Request $request)
    {
        $user = Labourtype::where('id', $request->id)->first();
        return $user;
    }
    function lbrtypedelete(Request $request)
    {
        Labourtype::where('id', $request->id)->delete();
        return redirect('labour-type-list')->with('message', 'Successful! Labour Type Deleted Successfully');
    }
    public function lbrTypeEdit($id)
    {
        $data = Labourtype::find($id);

        return view('labour.updatelabourtype', ['labor' => $data]);
    }
    function labourTypeUpdate(Request $req)
    {
        $data = Labourtype::find($req->id);
        $data->labourTypeName = $req->labourTypeName;
        $data->code = $req->code;
        $data->save();
        return redirect('labour-type-list')->with('message', 'Successful! Labour Type Updated Successfully');
    }
    function labourTypeSearch(Request $req)
    {
        $data = Labourtype::where('labourTypeName', 'like', '%' . $req->input('query') . '%')->get();
        return view('labour.searchlabourtype', ['labors' => $data]);
    }
    //LabourBill
    public function addLabourBill()
    {
        return View('labour.addlabourbill');
    }
    public function getLabourNames()
    {
        $labourname = Labourname::all();
        return response()->json($labourname);
    }
    public function getLabourTypes()
    {
        $labourtype = Labourtype::all();
        return response()->json($labourtype);
    }
    public function getPurchaseType()
    {
        // $data = Purchase::all();
        $data = DB::table('purchase_type_purchase')
        ->join('purchase_types', 'purchase_types.id', '=', 'purchase_type_purchase.purchase_type_id')->get();

        return response()->json($data);
    }
    //    public function getProductData(){
    //        $user = request('id');
    //        $data = purchase::where('id',$user)->first();
    //        $products = json_decode($data->products);
    //        foreach ($products as $product){
    //            $pdt = $product->productId;
    //            $good = Product::where('id',$pdt)->get();
    //        }
    //        return response()->json($good);
    //    }
    public function getProductData()
    {
        $good = Product::all();
        return response()->json($good);
    }
    public function getPurchaseData()
    {
        $user = request('id');
        $purchases = purchase::where('clientId', $user)->get();
        $productsId = [];
        foreach ($purchases as $key => $purchase) {
            //           $products = array_merge($products, json_decode($purchase->products));
            foreach (json_decode($purchase->products) as $pro) {
                $productsId[] = $pro->productId;
            }
        }

        $products = Product::whereIn('id', $productsId)->with('unit')->get();

        return response()->json($products);
    }
    public function storeLabourBill(Request $req)
    {
        //     Log::info($req);
        //    return;

        $purchase = $req->id;
        $labour_Id = Helper::IdGenerator(new Labourbill, 'labourId', 5, 'L1');
        $data = new Labourbill();
        //         $quantity = $req->products[0]['productId'];
        // dd($quantity);
        $data->project_name = $req->project_name;
        $data->labourNameId = $req->labourNameId;
        $data->labourTypeId = $req->labourTypeId;
        $data->clientId = $req->clientId;
        $data->labourId = $labour_Id;
        $data->purchaseCategoryId = json_encode($req->purchaseCategoryId);
        $data->products = json_encode($req->products);
        $data->grandTotal = $req->grandTotal;
        $data->CSFCAmount = $req->CSFCAmount;
        $data->finalTotal = $req->finalTotal;
        $data->paid = $req->paid;
        $data->due = $req->due;
        $data->date = $req->date;
        $data->paymentStatus = $req->paymentStatus;
        $data->save();


        $data2 = Stock::find($req->products[0]['productId']);
        $data2->stockInHand = $data2->stockInHand - $req->products[0]['quantity'];
        $data2->save();
        // $stock = Stock::all();
        // if($data->products['productId'] == $stock->productId){
        //     return 3;
        // }

        return redirect('labour-bill-list')->with('message', 'Successful! New LabourBill Created Successfully');
    }
    public function getOldLabourId()
    {
        $labour_Id = Helper::IdGenerator(new Labourbill, 'labourId', 5, 'L1');
        return response($labour_Id);
    }
    public function labourBillList()
    {
       

        $labours = Labourbill::all();
        return view('labour.labourlist', ['labours' => $labours]);
    }
    public function getLabourBillInformation(Request $request)
    {
        $user = Labourbill::where('id', $request->id)->first();
        return $user;
    }
    function lbrbilldelete(Request $request)
    {
        Labourbill::where('id', $request->id)->delete();
        return redirect('labour-bill-list')->with('message', 'Successful! Labour Bill Deleted Successfully');
    }
    public function labourBillPDF(Request $req)
    {
        $labour = Labourbill::where('id', $req->id)->first();
        $leeds = Leeds::where('id', $labour->clientId)->first();
        $labourName = Labourname::where('id', $labour->labourNameId)->first();
        $labourType = Labourtype::where('id', $labour->labourTypeId)->first();
        $pdf = PDF::loadview('labour.labourbillPDF', ['labour' => $labour, 'leeds' => $leeds, 'labourName' => $labourName, 'labourType' => $labourType]);
        return $pdf->setPaper('a4', 'letter')->setWarnings(false)->stream("view_labourBill.pdf");
    }
    public function labourBillDwnPDF(Request $req)
    {
        $labour = Labourbill::where('id', $req->id)->first();
        $leeds = Leeds::where('id', $labour->clientId)->first();
        $labourName = Labourname::where('id', $labour->labourNameId)->first();
        $labourType = Labourtype::where('id', $labour->labourTypeId)->first();
        $pdf = PDF::loadview('labour.labourbillPDF', ['labour' => $labour, 'leeds' => $leeds, 'labourName' => $labourName, 'labourType' => $labourType]);
        return $pdf->download("view_labourBill.pdf");
    }
    public function labourBillMailPDF(Request $req)
    {
        $labour = Labourbill::where('id', $req->id)->first();
        $leeds = Leeds::where('id', $labour->clientId)->first();
        $labourName = Labourname::where('id', $labour->labourNameId)->first();
        $labourType = Labourtype::where('id', $labour->labourTypeId)->first();
        $pdf = PDF::loadview('labour.labourbillPDF', ['labour' => $labour, 'leeds' => $leeds, 'labourName' => $labourName, 'labourType' => $labourType]);
        Mail::send(
            'labour.labourbillPDF',
            ['labour' => $labour, 'leeds' => $leeds, 'labourName' => $labourName, 'labourType' => $labourType],
            function ($message) use ($leeds, $labourName, $pdf) {
                $message
                    ->to($leeds->email)
                    ->subject($labourName->labourName)
                    ->attachData($pdf->output(), 'view_labour_bill.pdf');
            }
        );
        return redirect()->back()->with('message', 'Successful! Email Sent Successfully');
    }

    public function download($file){

        $file_path = public_path('labour_files/'.$file);

        return \response()->download($file_path);
    }
}
