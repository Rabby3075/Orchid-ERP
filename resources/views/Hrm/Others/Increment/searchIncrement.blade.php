@extends('master.app')
@section('content')
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-12 bg-white mx-auto mt-5">
                {{--                <h4 class="text-success">{{ Session::get('message') }}</h4>--}}
                <div class="card bg-white">
                    <h4 class="card-header">All Increment History</h4>
                    <div class="card-body bg-white">
                        <div class="bg-white">
                            <form action="{{route('IncrementSearch')}}" method="GET">
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        <input type="text" class="form-control bg-white" name="query" id="complaintSearch" onkeyup="myFunction()" placeholder="Search"/>
                                    </label>
                                    <div class="col-md-6 ml-0">
                                        <span class="float-right col-md-6"><a href="{{route('addIncrement')}}" class="btn btn-success float-right">+Add</a></span>
                                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="myTable">
                                <thead class="bg-orange">
                                <tr class="text-light">
                                    <th>#</th>
                                    <th >Employee Name</th>
                                    <th >Before Salary</th>
                                    <th >Present Salary</th>
                                    <th >Increment Amount</th>
                                    <th >Effective Date</th>
                                    <th >Increment By</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($increments as $increment)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>

                                        <td>
                                            @foreach($users as $user)
                                                @if($user->id == $increment->Employee)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                        </td>

                                        <td>{{$increment->BeforeSalary}}</td>
                                        <td>{{$increment->NewSalary}}</td>
                                        <td>{{$increment->IncrementSalary}}</td>
                                        <td>{{$increment->EffectiveDate}}</td>
                                        <td>
                                            @foreach($users as $user)
                                                @if($user->id == $increment->IncrementBy)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="/Increment-edit/{{$increment->id}}" class="btn btn-success btn-sm me-1" title="Update">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a  class="btn btn-danger btn-sm" id="delete" title="Delete" href="javascript:void(0)" data-url="{{ route('IncrementInfo', $increment->id) }}" >
                                                <i class="fa fa-trash"></i>
                                            </a>
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
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Increment Delete</h5>
                </div>
                <div class="modal-body">
                    <span class="text-dark">Are you sure to delete this Increment?</span>
                </div>
                <div class="modal-footer">
                    <form action="{{route('IncrementDelete')}}" class="form-group" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" id="user-id" name="id">
                        <input type="submit" class="btn btn-danger me-1" id="yes" value="Yes">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('body').on('click', '#delete', function () {
                var userURL = $(this).data('url');
                $.get(userURL, function (data) {
                    $('#deleteModal').modal('show');
                    $('#user-id').val(data.id);

                })
            });
        });
    </script>
    <script>
        function create()
        {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 9000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'success',
                title: 'New Increment Created Successfully'
            })
        }
        function wise_words()
        {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 9000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'error',
                title: 'Increment Deleted Successfully'
            })
        }
        function update()
        {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 9000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'success',
                title: 'Increment Updated Successfully'
            })
        }

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("complaintSearch");
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

@endsection
