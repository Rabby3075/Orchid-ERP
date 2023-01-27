@extends('CRM.layouts_successLeeds.leedsNav')
@section('leedContent')
    <div class="col-md-12">
        @if($quotations->toArray() == null)
            <h2 class="text-center text-success mt-3">No Quotation Added!</h2>
            <h5 class="text-center">Please <a href="{{route('add-cart',['id'=>$leed->id])}}"><u>Click Here</u></a> to Add Quotation...</h5>
        @else
        <div class="card">
            <h4 class="card-header">All Quotations</h4>

            <div class="card-body bg-white">
{{--                <h4 class="text-success">{{Session::get('message')}}</h4>--}}
                <span class="float-right mb-2"><a href="{{route('add-cart',['id'=>$leed->id])}}" class="btn btn-success">+Add</a></span>

                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead class="bg-orange">
                        <tr class="text-light">
                            <th>#</th>
                            <th>Subject</th>
                            <th>Body</th>
                            <th>Total Amount</th>
                            <th>Total Vat</th>
                            <th>Grand Total</th>
                            <th>Note</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($quotations as $quotation)


                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$quotation->subject}}</td>
                                <td>{{$quotation->body}}</td>
                                <td>{{$quotation->totalAmount}}</td>
                                <td>{{$quotation->totalVat}}</td>
                                <td>{{$quotation->grandTotal}}</td>
                                <td>{{$quotation->note}}</td>
                                <td>
                                    <a href="{{route('view-cart',['id'=>$leed->id,'qId'=>$quotation->id])}}" class="btn btn-info mr-1 btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
{{--                                    <a href="{{route('edit-cart',['id'=>$leed->id,'qId'=>$quotation->id])}}" class="btn btn-secondary mx-1 btn-sm">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
                                    <a href="" class="btn btn-danger btn-sm mr-1" onclick="deleteQ({{$quotation->id}})">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form method="POST" action="{{route('delete-quotation', ['id'=>$leed->id,'qId'=>$quotation->id])}}" id="deleteQForm{{$quotation->id}}">
                                        @csrf
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endif
    </div>

    <script>
        function deleteQ(id)
        {
            event.preventDefault();
            var check = confirm('Are you sure want to delete this!');
            if(check)
            {
                document.getElementById('deleteQForm'+id).submit();
            }
        }
    </script>

@endsection


