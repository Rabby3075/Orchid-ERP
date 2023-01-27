<?php



namespace App\Http\Controllers\Payment;



use App\Helpers\Helperlb;
use App\Http\Controllers\Controller;

use App\Models\Account\AccountChart;
use App\Models\Payment\PaymentMethod;
use App\Models\Payment\PaymentVoucher;
use App\Models\Project\ProjectDeal;
use App\Models\Purchase\purchase;
use App\Models\Payment\SaleVoucher;
use App\Models\Supplier\Supplier;

use Illuminate\Http\Request;



class SupplierPaymentController extends Controller

{

    public function __construct()

    {

        $this->middleware('auth');
    }

    public function allSupplierPaymentDetails()

    {

        $suppliers = Supplier::all();

        return view('Payment.Supplier_Payment.paymentDetails', ['suppliers' => $suppliers]);
    }

    public function supplierTransactions($id)

    {

        $supplier = Supplier::where('id', $id)->first();
        $methods = PaymentMethod::where('status','active')->get();
//        dd($methods);
        $purchases = purchase::where('due', '>', 0)->where('supplierId', $id)->get();

        return view('Payment.Supplier_Payment.supplierTransactionList', ['purchases' => $purchases, 'supplier' => $supplier,'methods' =>$methods]);
    }
        public function getVouchers(){
                $vouchers = PaymentVoucher::latest()->with('method')->get();
        //        dd($vouchers);
                return view('Payment.vouchers.index',compact('vouchers'));

        }
    public function storeVoucher(Request $request){
        $voucher = Helperlb::IdGenerator(new PaymentVoucher(),'voucher',5,'PV');
        $vouchers = new PaymentVoucher();

        $vouchers->date = $request->date;
        $vouchers->voucher = $voucher;
        $vouchers->bill = $request->bill;

        $vouchers->payment_method = $request->payment_method;

        $vouchers->amount = $request->amount;

        $vouchers->due = $request->due - $request->amount;

        $vouchers->save();

        $purchase = purchase::where('purchaseId',$request->bill)->first();
        $purchase->due = $request->due - $request->amount;
        $purchase->paid = $purchase->paid + $request->amount;
        $purchase->save();
        return redirect('vouchers')->with('message', 'New Voucher Created Successfully!');
    }

    public function salesList()
    {
        $projects = ProjectDeal::selectRaw('clientId, sum(due) as total_due')
            ->groupBy('clientId')
            ->get();
        $total = ProjectDeal::get()->sum('due');
        return view('Payment.sales_payment.index',compact('projects','total'));
    }
    public function salesTransactions($clientId)

    {
        $clientName =  ProjectDeal::where('clientId', $clientId)->first();
        $projects = ProjectDeal::where('clientId', $clientId)->get();
//        dd($projects);
        $methods = PaymentMethod::where('status','active')->get();
//        dd($methods);

        return view('Payment.sales_Payment.sales_transaction_list',compact('projects','methods','clientName'));
    }
    public function storeSalesVoucher(Request $request){
//        dd($request->all());
        $voucher = Helperlb::IdGenerator(new SaleVoucher(),'voucher',5,'SP');
        $vouchers = new SaleVoucher();
        $vouchers->date = $request->date;
        $vouchers->voucher = $voucher;
        $vouchers->projectInvoice = $request->projectInvoice;
        $vouchers->payment_method = $request->payment_method;
        $vouchers->paid = $request->paid;
        $vouchers->due = $request->due - $request->amount;
        $vouchers->save();

        $project_deal = ProjectDeal::where('projectInvoice',$request->projectInvoice)->first();
        $project_deal->due = $request->due - $request->paid;
        $project_deal->paid = $project_deal->paid + $request->paid;
        $project_deal->save();
        return redirect('sales-vouchers')->with('message', 'New Voucher Created Successfully!');
    }
    public function getSalesVouchers(){

        $vouchers = SaleVoucher::latest()->with('method')->get();
//                dd($vouchers);
        return view('Payment.sales_payment.sales-vouchers',compact('vouchers'));
    }
}
