<?php

namespace App\Http\Controllers\payment;

use App\Http\Controllers\Controller;
use App\Models\Account\Account;
use App\Models\Account\AccountChart;
use App\Models\Payment\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = PaymentMethod::all();
        return view('Payment.payment-method.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accounts = AccountChart::all();
        return view('Payment.payment-method.create',compact('accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payments = new PaymentMethod();

        $payments->method = $request->payment;
        $payments->status = $request->status;

        $res = $payments->save();
        if($res){
            return redirect()->route('payment-methods')->with('message', 'Payment-method Added successfully');
        }
        else{
            return redirect()->route('payment-methods')->with('message', 'Failed to add Payment-method');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        PaymentMethod::find($request->id)->delete();
        return redirect()->route('payment-methods')->with('message','Payment Method Deleted Successfully!');
    }
}
