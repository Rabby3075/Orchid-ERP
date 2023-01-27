@extends('master.app')
@section('content')
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-8 bg-white mx-auto mt-5">
                <div class="card bg-white">
                    <h4 class="card-header text-center">{{$labourname->labour->labourName}}</h4>

                    <div class="card-body bg-white">
                        <h5 class="mb-4">
                            <div class="d-flex justify-content-between">
                                <a href="{{route('sales.transaction.list',['clientId'=>$labourname->clientId])}}" class="btn btn-primary">Transaction List</a>
                                <a class="btn btn-primary" href="{{route('getSalesVouchers')}}" >Payment Voucher</a>
                            </div>


                        </h5>
                        <h4 class="text-success">{{Session::get('message')}}</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="myTable">
                                <thead class="bg-orange">
                                <tr class="text-light">
                                    <th>#</th>
                                    <th>Date</th>

                                    <th>LabourId</th>

                                    <th>Paid Amount</th>
                                    <th>Due Amount</th>
                                    <th>Open Balance</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($labours as $value)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{$value->date}}</td>

                                        <td>{{$value->labourId}}</td>

                                        <td>{{$value->paid}}</td>
                                        <td>{{$value->due}}</td>
                                        <td>{{$value->finalTotal}}</td>
                                        <td>
                                            <a href="#" id="detail" class="btn btn-primary btn-sm" title="Detail" data-toggle="modal" data-target="#detailModal{{$value->id}}">
                                                pay
                                            </a>
                                            @include('Payment.labour_Payment.pay_modal')

                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-lg-5 bg-white" style="margin-left: 243px">
                <div class="card bg-white">
                    <h5 class="card-header text-center">@{{name}}</h5>
                    <div class="card-body bg-white">
                        <div>@{{name}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--    <script src='https://cdn.jsdelivr.net/lodash/4.17.2/lodash.min.js'></script>--}}
    {{--    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.4/axios.min.js" integrity="sha512-lTLt+W7MrmDfKam+r3D2LURu0F47a3QaW5nF0c6Hl0JDZ57ruei+ovbg7BrZ+0bjVJ5YgzsAWE+RreERbpPE1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}

    {{--    <script>--}}
    {{--        new Vue({--}}
    {{--            el: '#app',--}}
    {{--            data: {--}}
    {{--                name: 'Sreejon',--}}

    {{--            },--}}
    {{--            methods: {--}}

    {{--            },--}}
    {{--            mounted() {--}}

    {{--            }--}}
    {{--        });--}}
    {{--    </script>--}}


@endsection


