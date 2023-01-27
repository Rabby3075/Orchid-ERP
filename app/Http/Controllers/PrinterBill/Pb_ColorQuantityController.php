<?php

namespace App\Http\Controllers\PrinterBill;

use App\Http\Controllers\Controller;
use App\Models\PrinterBill\PainterBill;
use App\Models\PrinterBill\Pb_Cart;
use App\Models\PrinterBill\Pb_Color;
use App\Models\PrinterBill\Pb_DecorationType;
use App\Models\PrinterBill\Pb_HouseAreaType;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Pb_ColorQuantityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=>['getDecorationTypes','getHouseAreaTypes','getColor','getArray','createPainterBill','viewPainterBill']]);
    }
    public function addColorQty()
    {
        return view('printerBill.color_Qty.addColorQty');
    }
    public function getHouseAreaTypes()
    {
        $houseAreaTypes = Pb_HouseAreaType::all();
        return response()->json($houseAreaTypes);
    }
    public function getDecorationTypes()
    {
        $decorationTypes = Pb_DecorationType::all();
        return response()->json($decorationTypes);
    }
    public function getColor()
    {
        $colors = Pb_Color::all();
        return response()->json($colors);
    }
    public function createPainterBill(Request $request)
    {
        $pb_bill = new PainterBill();
        $pb_bill->decorCart = json_encode($request->decorCart);
        $pb_bill->finalCart = json_encode($request->finalCart);
        $pb_bill->totalAmount = $request->allTotal;
        $pb_bill->discount = $request->discC;
        $pb_bill->vat = $request->vatC;
        $pb_bill->grandTotal = $request->finalTotal;
        $pb_bill->save();
        if ($tabs = $request->get('tabs')) {
            foreach ($tabs as $tab) {
                Pb_Cart::create([
                    'pbId'       => $pb_bill->id,
                    'houseAreaTypeId'   => $tab['selectedHouseType'],
                    'cartInfo' => json_encode($tab['rows']),
                ]);
            }
        }
        return ['pbId'=>$pb_bill->id];
    }
    public function viewPainterBill($pbId)
    {
        $pbcarts = Pb_Cart::where('pbId',$pbId)->get();
        $pb = PainterBill::where('id',$pbId)->first();
        return view('printerBill.color_Qty.viewPainterBill',['pbcarts'=>$pbcarts,'pb'=>$pb]);
    }
    public function pdfPainterBill($id)
    {
        $pbcarts = Pb_Cart::where('pbId',$id)->get();
        $pb = PainterBill::where('id',$id)->first();
        $pdf = PDF::loadView('printerBill.color_Qty.pdfPainterBill',['pbcarts'=>$pbcarts,'pb'=>$pb]);
        return $pdf->setPaper('a4', 'letter')->setWarnings(false)->stream('painter-bill.pdf');
    }
    public function downloadPainterBill($id)
    {
        $pbcarts = Pb_Cart::where('pbId',$id)->get();
        $pb = PainterBill::where('id',$id)->first();
        $pdf = PDF::loadView('printerBill.color_Qty.pdfPainterBill',['pbcarts'=>$pbcarts,'pb'=>$pb]);
        return $pdf->setPaper('a4', 'letter')->setWarnings(false)->download('painter-bill.pdf');
    }
}
