@extends('CRM.layouts_successLeeds.leedsNav')
@section('leedContent')
    <div class="col-md-12">
        @if($measurements->toArray() == null)
            <h2 class="text-center text-success mt-3">No Measurement Added!</h2>
            <h5 class="text-center">Please <a href="{{route('measure-cart',['id'=>$leed->id])}}"><u>Click Here</u></a> to Add Measurement...</h5>
        @else
            <div class="card">
                <h4 class="card-header">All Measurements</h4>

                <div class="card-body bg-white">
                    {{--                <h4 class="text-success">{{Session::get('message')}}</h4>--}}
                    <span class="float-right mb-2"><a href="{{route('measure-cart',['id'=>$leed->id])}}" class="btn btn-success">+Add</a></span>

                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead class="bg-orange">
                            <tr class="text-light">
                                <th>#</th>
                                <th>Total Amount</th>
                                <th>discount</th>
                                <th>Total Vat</th>
                                <th>Grand Total</th>
                                <th>advanced</th>
                                <th>Payable</th>
                                <th>Note</th>
                                <th class="col-md-2">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($measurements as $measurement)


                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$measurement->totalAmount}}</td>
                                    <td>{{$measurement->discount}}</td>
                                    <td>{{$measurement->vat}}</td>
                                    <td>{{$measurement->grandTotal}}</td>
                                    <td>{{$measurement->advanced}}</td>
                                    <td>{{$measurement->totalPayableAmount}}</td>
                                    <td>{{$measurement->note}}</td>
                                    <td>
                                        <a href="{{route('view-measure-cart',['id'=>$leed->id,'mId'=>$measurement->id])}}" class="btn btn-info btn-sm ">
                                            <i class="fa fa-eye"></i>
                                        </a>
{{--                                        <a href="{{route('edit-measure-cart',['id'=>$leed->id,'mId'=>$measurement->id])}}" class="btn btn-secondary btn-sm ">--}}
{{--                                            <i class="fa fa-edit"></i>--}}
{{--                                        </a>--}}
                                        <a href="" class="btn btn-danger btn-sm mx-1" onclick="deleteQ({{$measurement->id}})">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <form method="POST" action="{{route('delete-measurement', ['id'=>$leed->id,'mId'=>$measurement->id])}}" id="deleteQForm{{$measurement->id}}">
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


