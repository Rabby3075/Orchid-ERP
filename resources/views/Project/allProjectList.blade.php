@extends('master.app')
@section('content')
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-12 bg-white mx-auto mt-5">
{{--                <h4 class="text-success">{{ Session::get('message') }}</h4>--}}
                <div class="card bg-white">
                    <h4 class="card-header">All Project List</h4>
                    <div class="card-body bg-white">
                        <div class="bg-white">
                            <form action="#" method="GET">
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        <input type="hidden" class="form-control bg-white" name="dealSearch" id="dealSearch" onkeyup="myFunction()" placeholder="Search"/>
                                    </label>
                                    <div class="col-md-6 ml-0">
                                        <span class="float-right col-md-6"><a href="{{route('addDeal')}}" class="btn btn-success float-right">+Add</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="myTable">
                                <thead class="bg-orange">
                                <tr class="text-light">

                                    <th >Start Date</th>
                                    <th >Invoice</th>
                                    <th >Category</th>
                                    <th >Client Name</th>
                                    <th >Project Name</th>
                                    <th >Duration <br> Left</th>
                                    <th >Paid</th>
                                    <th >Payment Due</th>
                                    <th >Total Project <br> Amount</th>
                                    <th >Assign to</th>
                                    <th >Status</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($deals as $deal)
                                    <tr>

                                        <td>{{$deal->startDate}}</td>
                                        <td>{{$deal->projectInvoice}}</td>
                                        <td>
                                           {{$deal->type->projectCategoryName ?? 'none'}}
                                        </td>
                                        <td>
                                            {{$deal->client->clientName ?? 'none'}}
                                        </td>
                                        <td>{{$deal->projectName}}</td>
                                        <td>
                                            @php
                                               $currentDate = \Carbon\Carbon::now();
                                               $endDate = \Carbon\Carbon::parse($deal->endDate);
                                               $remainingDays = $endDate->diffInDays($currentDate);

                                            if ($currentDate->gt($endDate)) {
                                                $status = 'expired';
                                              } else {
                                                $status = 'active';
                                              }
                                            @endphp
                                            @if ($status == 'expired')
                                                <p>Date expired.</p>
                                            @else
                                                {{$remainingDays + 1}} days
                                            @endif
                                        </td>

                                        <td>{{$deal->paid}}</td>
                                        <td>{{$deal->due}}</td>
                                        <td>{{$deal->amount}} BDT</td>
                                        <td> {{$deal->client->user->name}}</td>
                                        <td>
                                            <select class="form-control w-75" id="status" onchange="change(this.value,{{$deal->id}})">
                                                <option @if($deal->status==="Running") selected @endif value="Running">Running</option>
                                                <option @if($deal->status==="Completed") selected @endif value="Completed">Completed</option>
                                                <option @if($deal->status==="Rejected") selected @endif value="Rejected">Rejected</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="#" id="detail" class="btn btn-primary btn-sm" title="Detail" data-toggle="modal" data-target="#detailModal{{$deal->id}}">
                                                View
                                            </a>
                                            <a href="{{route('salesList')}}" class="btn btn-primary btn-sm">
                                                Pay Due amount
                                            </a>
                                            @include('Project.view_modal')
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
<script>
          function change(value,id) {
        var fd = new FormData();
        fd.append("status",value);
		fd.append("id",id);
        var xhttp = new XMLHttpRequest();
        xhttp.onload = function(){
			if (this.status===200) {
				  console.log(this.response);
			}
		}
		xhttp.open("post","/api/project-status-update"); //connected with backend
		xhttp.send(fd);
        var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'success',
                title: 'Project status Updated Successfully'
            })
        }
</script>
@endsection
