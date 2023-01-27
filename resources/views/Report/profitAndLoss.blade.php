@extends('master.app')
@section('content')
    <style>
        hr.new1 {
            border-top: 1px solid black;
        }
    </style>
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-12 bg-white mx-auto mt-5">
                {{--                <h4 class="text-success">{{ Session::get('message') }}</h4>--}}
                <div class="card bg-white">
                    <h4 class="card-header">Profit & Loss Report</h4>
                    <div class="card-body bg-white">
                        <div class="bg-white">
                            <form action="{{route('FilterprofitAndLossReport')}}" method="GET">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="from">From</label>
                                        <input class="form-control" type="date" name="from" id="from">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="to">To</label>
                                        <input class="form-control" type="date" name="to" id="to">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label"></label>
                                    <div class="col-md-8">
                                        <input type="submit" class="btn btn-success" value="Filter"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <hr class="new1">
                        <h5 class="d-flex justify-content-end ">Total</h5>
                        <hr class="new1">
                        <div>
                            {{--Income Area--}}
                            <p><button class="btn" type="button" data-toggle="collapse" data-target="#incomeType" aria-expanded="false" aria-controls="incomeType"><i class="fa-sharp fa-solid fa-plus"></i></button>  Income</p>
                            <div class="collapse ml-3" id="incomeType">
                                @php
                                    $totalIncome = 0;
                                @endphp
                                @foreach($types as $type)
                                    @if($type->AccountType === "Income")
                                        @foreach($charts as $chart)
                                            @if(empty($chart->AccountGroup) && $chart->AccountType === $type->id)
                                                <div class="d-flex justify-content-between">
                                                <p>{{$chart->AccountName}}</p>
                                                @if($chart->Side === "Debit")
                                                    @php
                                                    $totalIncome = $totalIncome + $chart->Balance;
                                                    @endphp
                                                    <p>+ {{$chart->Balance}} </p>
                                                @elseif($chart->Side === "Credit")
                                                        @php
                                                            $totalIncome = $totalIncome - $chart->Balance;
                                                        @endphp
                                                    <p >- {{$chart->Balance}}</p>
                                                @endif
                                                </div>
                                            @endif
                                        @endforeach
                                        @foreach($groups as $group)
                                                @php
                                                    $value = 0;
                                                @endphp
                                            @if($group->AccountType === $type->id)
                                                    @php
                                                        $groupName = str_replace(' ', '', $group->AccountGroup)
                                                    @endphp
                                                <p><button class="btn" type="button" data-toggle="collapse" data-target="#{{$groupName}}" aria-expanded="false" aria-controls="{{$groupName}}"><i class="fa-sharp fa-solid fa-plus"></i></button> {{$group->AccountGroup}}</p>
                                                    <div class="collapse" id="{{$groupName}}">
                                                        @foreach($charts as $chart)
                                                            @if(!empty($chart->AccountGroup) && $chart->AccountGroup === $group->id)
                                                                <div class="d-flex justify-content-between">
                                                                    <p>{{$chart->AccountName}}</p>
                                                                    @if($chart->Side === "Debit")
                                                                            @php
                                                                                $value = $value + $chart->Balance;
                                                                                $totalIncome = $totalIncome + $chart->Balance;
                                                                            @endphp
                                                                        <p>+ {{$chart->Balance}} </p>
                                                                    @elseif($chart->Side === "Credit")
                                                                            @php
                                                                                $value = $value - $chart->Balance;
                                                                                $totalIncome = $totalIncome - $chart->Balance;
                                                                            @endphp
                                                                        <p>- {{$chart->Balance}}</p>
                                                                    @endif
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                     <hr>
                                                        <div class="d-flex justify-content-between">
                                                            <p><b>Total {{$group->AccountGroup}}</b></p>
                                                            <p><b>{{$value}}</b></p>
                                                        </div>
                                                    </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between bg-light p-2">
                                <p><b>Total Income</b></p>
                                <p><b>{{$totalIncome}}</b></p>
                            </div>
                            {{--Income Area--}}
                            {{--Cost of good sold Area--}}
                            <p><button class="btn" type="button" data-toggle="collapse" data-target="#cgsType" aria-expanded="false" aria-controls="cgsType"><i class="fa-sharp fa-solid fa-plus"></i></button>  Cost of Good Sold</p>
                            <div class="collapse ml-3" id="cgsType">
                                @php
                                    $totalcgs = 0;
                                @endphp
                                @foreach($types as $type)
                                    @if($type->AccountType === "Cost of Good Sold")
                                        @foreach($charts as $chart)
                                            @if(empty($chart->AccountGroup) && $chart->AccountType === $type->id)
                                                <div class="d-flex justify-content-between">
                                                    <p>{{$chart->AccountName}}</p>
                                                    @if($chart->Side === "Debit")
                                                        @php
                                                            $totalcgs = $totalcgs + $chart->Balance;
                                                        @endphp
                                                        <p>+ {{$chart->Balance}} </p>
                                                    @elseif($chart->Side === "Credit")
                                                        @php
                                                            $totalcgs = $totalcgs - $chart->Balance;
                                                        @endphp
                                                        <p >- {{$chart->Balance}}</p>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                        @foreach($groups as $group)
                                            @php
                                                $value = 0;
                                            @endphp
                                            @if($group->AccountType === $type->id)
                                                    @php
                                                        $groupName = str_replace(' ', '', $group->AccountGroup)
                                                    @endphp
                                                <p><button class="btn" type="button" data-toggle="collapse" data-target="#{{$groupName}}" aria-expanded="false" aria-controls="{{$groupName}}"><i class="fa-sharp fa-solid fa-plus"></i></button> {{$group->AccountGroup}}</p>
                                                <div class="collapse" id="{{$groupName}}">
                                                    @foreach($charts as $chart)
                                                        @if(!empty($chart->AccountGroup) && $chart->AccountGroup === $group->id)
                                                            <div class="d-flex justify-content-between">
                                                                <p>{{$chart->AccountName}}</p>
                                                                @if($chart->Side === "Debit")
                                                                    @php
                                                                        $value = $value + $chart->Balance;
                                                                        $totalcgs = $totalcgs + $chart->Balance;
                                                                    @endphp
                                                                    <p>+ {{$chart->Balance}} </p>
                                                                @elseif($chart->Side === "Credit")
                                                                    @php
                                                                        $value = $value - $chart->Balance;
                                                                        $totalcgs = $totalcgs - $chart->Balance;
                                                                    @endphp
                                                                    <p>- {{$chart->Balance}}</p>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <p><b>Total {{$group->AccountGroup}}</b></p>
                                                        <p><b>{{$value}}</b></p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between bg-light p-2">
                                <p><b>Total Cost of good sold</b></p>
                                <p><b>{{$totalcgs}}</b></p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between p-2">
                                <p>GROSS PROFIT</p>
                                @php
                                $gross = $totalIncome - $totalcgs
                                @endphp
                                <p>{{$gross}}</p>
                            </div>
                            <hr>
                            {{--Cost of good sold Area--}}
                            {{--Expenses Area--}}
                            <p><button class="btn" type="button" data-toggle="collapse" data-target="#expensesType" aria-expanded="false" aria-controls="expensesType"><i class="fa-sharp fa-solid fa-plus"></i></button>  Expenses</p>
                            <div class="collapse ml-3" id="expensesType">
                                @php
                                    $totalExpenses = 0;
                                @endphp
                                @foreach($types as $type)
                                    @if($type->AccountType === "Expenses")
                                        @foreach($charts as $chart)
                                            @if(empty($chart->AccountGroup) && $chart->AccountType === $type->id)
                                                <div class="d-flex justify-content-between">
                                                    <p>{{$chart->AccountName}}</p>
                                                    @if($chart->Side === "Debit")
                                                        @php
                                                            $totalExpenses = $totalExpenses + $chart->Balance;
                                                        @endphp
                                                        <p>+ {{$chart->Balance}} </p>
                                                    @elseif($chart->Side === "Credit")
                                                        @php
                                                            $totalExpenses = $totalExpenses - $chart->Balance;
                                                        @endphp
                                                        <p >- {{$chart->Balance}}</p>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                        @foreach($groups as $group)
                                            @php
                                                $value = 0;
                                            @endphp
                                            @if($group->AccountType === $type->id)
                                                @php
                                                $groupName = str_replace(' ', '', $group->AccountGroup)
                                                @endphp
                                                <p><button class="btn" type="button" data-toggle="collapse" data-target="#{{$groupName}}" aria-expanded="false" aria-controls="{{$groupName}}"><i class="fa-sharp fa-solid fa-plus"></i></button> {{$group->AccountGroup}}</p>
                                                <div class="collapse" id="{{$groupName}}">
                                                    @foreach($charts as $chart)
                                                        @if(!empty($chart->AccountGroup) && $chart->AccountGroup === $group->id)
                                                            <div class="d-flex justify-content-between">
                                                                <p>{{$chart->AccountName}}</p>
                                                                @if($chart->Side === "Debit")
                                                                    @php
                                                                        $value = $value + $chart->Balance;
                                                                        $totalExpenses = $totalExpenses + $chart->Balance;
                                                                    @endphp
                                                                    <p>+ {{$chart->Balance}} </p>
                                                                @elseif($chart->Side === "Credit")
                                                                    @php
                                                                        $value = $value - $chart->Balance;
                                                                        $totalExpenses = $totalExpenses - $chart->Balance;
                                                                    @endphp
                                                                    <p>- {{$chart->Balance}}</p>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                    <hr>
                                                    <div class="d-flex justify-content-between">
                                                        <p><b>Total {{$group->AccountGroup}}</b></p>
                                                        <p><b>{{$value}}</b></p>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between bg-light p-2">
                                <p><b>Total Expenses</b></p>
                                <p><b>{{$totalExpenses}}</b></p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between p-2">
                                <p>NET INCOME</p>
                                @php
                                    $netIncome = $gross - $totalExpenses
                                @endphp
                                <p>{{$netIncome}}</p>
                            </div>
                            <hr>
                            {{--Expenses Area--}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
<script>
    import Buttons from "../../../public/backend/pages/UI/buttons.html";
    export default {
        components: {Buttons}
    }
</script>
