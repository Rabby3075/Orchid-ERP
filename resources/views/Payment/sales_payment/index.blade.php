@extends('master.app')
@section('content')
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-8 bg-white mx-auto mt-5">
                <div class="card bg-white">
                    <h4 class="card-header">Sale Payment Details</h4>
                    <div class="card-body bg-white">
                        <h4 class="text-success">{{Session::get('message')}}</h4>
                        <div class="bg-white">
                            <form action="" method="GET">
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        <input type="text" class="form-control bg-white" name="categorySearch" id="categorySearch" onkeyup="myFunction()" placeholder="Search"/>
                                    </label>
                                    <div class="col-md-6 ml-0">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="myTable">
                                <thead class="bg-orange">
                                <tr class="text-light">
                                    <th>#</th>
                                    <th>Client Name</th>
                                    <th>Mobile No</th>
                                    <th>Email</th>
                                    <th>City/<br>Police Station</th>
                                    <th>State/<br>District</th>
                                    <th>Due Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($projects as $project)

                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td><a href="{{route('sales.transaction.list',['clientId'=>$project->clientId])}}">{{$project->client->clientName}}</a></td>
                                        <td>{{$project->client->phoneNo}}</td>
                                        <td>{{$project->client->email}}</td>
                                        <td>{{$project->client->address}}</td>
                                        <td>{{$project->client->district}}</td>
                                        <td>{{$project->total_due}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td>{{$total}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function myFunction() {
                var input, filter, table, tr, td, i, txtValue;
                input = document.getElementById("categorySearch");
                filter = input.value.toUpperCase();
                table = document.getElementById("myTable");
                tr = table.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        </script>
    </div>
@endsection
