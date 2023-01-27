<?php



namespace App\Http\Controllers\supplier;



use App\Helpers\Helper;

use App\Http\Controllers\Controller;

use App\Models\Supplier\SupplierGroup;

use App\Models\Supplier\Supplier;

use App\Models\Product\Product;

use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;



class SupplierController extends Controller

{

    //    supplier Group

    public function suppGrpList()

    {

        $user = SupplierGroup::paginate(5);

        return view('Supplier.suppliergroup.suppliergrouplist', ['suppliers' => $user]);
    }

    public function addSuppGrpForm()

    {

        return view('Supplier.suppliergroup.addsuppliergroup');
    }

    function addSuppGrp(Request $req)

    {

        $req->validate([

            'groupName' => 'required'

        ]);

        $user = new SupplierGroup;

        $user->groupName = $req->groupName;

        $user->note = $req->note;

        $user->save();

        return redirect('suppGrp-list')->with('message', 'Successful! New Supplier Group Created Successfully');
    }

    public function getSuppGrpInformation(Request $request)

    {

        $user = SupplierGroup::where('id', $request->id)->first();

        return $user;
    }

    function suppGrpDelete(Request $request)

    {

        SupplierGroup::where('id', $request->id)->delete();

        return redirect('suppGrp-list')->with('message', 'Successful! Supplier Group Deleted Successfully');
    }

    public function suppGrpEdit($id)
    {

        $data = SupplierGroup::find($id);

        return view('Supplier.suppliergroup.updatesuppliergroup', ['supplier' => $data]);
    }

    function suppGrpUpdate(Request $req)
    {

        $data = SupplierGroup::find($req->id);

        $data->groupName = $req->groupName;

        $data->note = $req->note;

        $data->save();

        return redirect('suppGrp-list')->with('message', 'Successful! Supplier Group Updated Successfully');
    }

    function suppGrpSearch(Request $req)

    {

        $data = SupplierGroup::where('groupName', 'like', '%' . $req->input('query') . '%')->get();

        return view('Supplier.suppliergroup.searchsuppliergroup', ['searchs' => $data]);
    }

    //    End supplier Group



    public function supplierList()
    {

        $suppliers = Supplier::latest()->with('product')->paginate(5);



        //     ->join('products','suppliers.productId','=','products.id')

        //     ->join('supplier_groups','suppliers.supplierGroupId','=','supplier_groups.id')

        //     ->select('suppliers.*','products.productName as productId','supplier_groups.groupName as supplierGroupId');

        // ->paginate(5);

        // dd($suppliers);

        return view('Supplier.supplier.supplierlist', compact("suppliers"));
    }

    public function getSupplierInformation(Request $request)

    {

        $user = Supplier::where('id', $request->id)->first();

        return $user;
    }

    function suppDelete(Request $request)

    {

        Supplier::find($request->id)->delete();

        return redirect()->back()->with('message', 'Supplier Deleted Successfully!');
    }

    public function addSupplierForm()

    {

        $data = Product::all();

        $user = SupplierGroup::all();

        return view('Supplier.supplier.addsupplier', ['products' => $data, 'suppgrps' => $user]);
    }

    function addSupplier(Request $req)

    {

        // $req->validate([

        //     'companyOrStoreName'=>'required',

        //     'supplierId'=>'required|unique:suppliers',

        //     // 'supplierGroupId'=>'required',

        //     'productId'=>'required'

        // ]);

        $user = new Supplier;

        $user->companyOrStoreName = $req->companyOrStoreName;

        $user->supplierGroupId = $req->supplierGroupId;

        $user->supplierId = Helper::IdGenerator(new Supplier(), 'supplierId', 5, 'SP');

        $user->productId = $req->productId;

        $user->ownerName = $req->ownerName;

        $user->businessAddress = $req->businessAddress;

        $user->phoneNo = $req->phoneNo;

        $user->altphoneNo = $req->altphoneNo;

        $user->email = $req->email;

        $user->website = $req->website;

        $user->supplierCountry = $req->supplierCountry;

        $user->note = $req->note;

        $user->save();

        return redirect('supplier-list')->with('message', 'Successful! New Supplier Created Successfully');
    }

    public function supplierEdit(Request $req)
    {

        $data = Supplier::where('id', $req->id)->first();

        $category = Product::all();

        $suppgrp = SupplierGroup::all();

        $show = Product::where('id', $data->productId)->first();

        $showsupp = SupplierGroup::where('id', $data->supplierGroupId)->first();

        return view('Supplier.supplier.updatesupplier', ['supplier' => $data, 'products' => $category, 'suppgrps' => $suppgrp, 'showname' => $show, 'showsupp' => $showsupp]);
    }

    public function show($id)
    {

        $suppliers = Supplier::all();

        $singlesupplier = Supplier::where('id', $id)->with('product')->first();

        // dd($singleService);

        return view('Supplier.supplier.show', compact('singlesupplier', 'suppliers'));
    }

    public function supplierUpdate(Request $req)
    {



        $data = Supplier::find($req->id);

        $data->companyOrStoreName = $req->companyOrStoreName;

        $data->supplierGroupId = $req->supplierGroupId;

        $data->productId = $req->productId;

        $data->ownerName = $req->ownerName;

        $data->businessAddress = $req->businessAddress;

        $data->phoneNo = $req->phoneNo;

        $data->altphoneNo = $req->altphoneNo;

        $data->email = $req->email;

        $data->website = $req->website;

        $data->supplierCountry = $req->supplierCountry;

        $data->note = $req->note;

        $data->save();

        return redirect('supplier-list')->with('message', 'Successful! Supplier Updated Successfully');
    }

    function supplierSearch(Request $req)

    {

        $data = DB::table('suppliers')

            ->join('products', 'suppliers.productId', '=', 'products.id')

            ->join('supplier_groups', 'suppliers.supplierGroupId', '=', 'supplier_groups.id')

            ->select('suppliers.*', 'products.productName as productId', 'supplier_groups.groupName as supplierGroupId')

            ->where('companyOrStoreName', 'like', '%' . $req->input('query') . '%')

            ->get();

        return view('Supplier.supplier.searchsupplier', ['searchs' => $data]);
    }
}
