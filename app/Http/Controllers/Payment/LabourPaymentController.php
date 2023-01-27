<?php

namespace App\Http\Controllers\Payment;

use App\Helpers\Helperlb;
use App\Http\Controllers\Controller;
use App\Models\Labour\Labourbill;
use App\Models\Payment\LabourVoucher;
use App\Models\Payment\PaymentMethod;
use Illuminate\Http\Request;

class LabourPaymentController extends Controller
{
    public function labourList()
    {
        $labours = Labourbill::selectRaw('labourNameId, sum(due) as total_due')->with('labour')
            ->groupBy('labourNameId')
            ->get();
//        dd($labours);
        $total = LabourBill::get()->sum('due');
        return view('Payment.labour_payment.index',compact('labours','total'));
    }
    public function labourTransactions($labourNameId)

    {
        $labourname =  LabourBill::where('labourNameId', $labourNameId)->first();
        $labours = LabourBill::where('labourNameId', $labourNameId)->get();
//        dd($projects);
        $methods = PaymentMethod::where('status','active')->get();
//        dd($methods);

        return view('Payment.labour_Payment.labour_transaction_list',compact('labours','methods','labourname'));
    }
    public function storeLabourVoucher(Request $request){
//        dd($request->all());
        $voucher = Helperlb::IdGenerator(new LabourVoucher(),'voucher',5,'LP');
        $vouchers = new LabourVoucher();
        $vouchers->date = $request->date;
        $vouchers->voucher = $voucher;
        $vouchers->labourId = $request->labourId;
        $vouchers->payment_method = $request->payment_method;
        $vouchers->paid = $request->paid;
        $vouchers->due = $request->due - $request->paid;
        $vouchers->save();

        $labour_bill = LabourBill::where('labourId',$request->labourId)->first();
        $labour_bill->due = $request->due - $request->paid;
        $labour_bill->paid = $labour_bill->paid + $request->paid;
        $labour_bill->save();
        return redirect('labour-vouchers')->with('message', 'New Voucher Created Successfully!');
    }
    public function getLabourVouchers(){

        $vouchers = LabourVoucher::latest()->with('method')->get();
//                dd($vouchers);
        return view('Payment.labour_payment.labour-vouchers',compact('vouchers'));
    }
}
