@extends('master.app')
@section('content')
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-8 bg-white mx-auto mt-5">
                <div class="card bg-white">
                    {{--                    <h4 class="card-header text-center">{{$supplier->companyOrStoreName}}</h4>--}}

                    <div class="card-body bg-white">
                        <h5 class="mb-4">
                            <div class="d-flex justify-content-between">
                                <a href="{{route('labourList')}}" class="btn btn-primary">Sales Payment List</a>
                                <a class="btn btn-primary" href="" >Payment Voucher</a>
                            </div>

                        </h5>
                        <h4 class="text-success">{{Session::get('message')}}</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="myTable">
                                <thead class="bg-orange">
                                <tr class="text-light">
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Labour No</th>
                                    <th>Voucher No</th>
                                    <th>Payment Method</th>
                                    <th>Payment Amount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($vouchers as $value)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$value->date}}</td>
                                        <td>{{$value->labourId}}</td>
                                        <td>{{$value->voucher}}</td>
                                        <td>{{$value->method->AccountName}}</td>
                                        <td>{{$value->paid}}</td>

                                        <td>
                                            <a href="#" id="detail" class="btn btn-primary btn-sm" title="Detail" data-toggle="modal" data-target="#detailModal{{$value->id}}">
                                                View
                                            </a>
                                            @include('Payment.labour_payment.view_modal')

                                        </td>
                                    </tr>
                                @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>



@endsection


