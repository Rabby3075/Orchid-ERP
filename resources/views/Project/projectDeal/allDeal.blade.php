@extends('master.app')
@section('content')
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-12 bg-white mx-auto mt-5">
                {{--                <h4 class="text-success">{{ Session::get('message') }}</h4> --}}
                <div class="card bg-white">
                    <h4 class="card-header">All Project Deal</h4>
                    <div class="card-body bg-white">
                        <div class="bg-white">
                            <form action="#" method="GET">
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        <input type="hidden" class="form-control bg-white" name="dealSearch"
                                            id="dealSearch" onkeyup="myFunction()" placeholder="Search" />
                                    </label>
                                    <div class="col-md-6 ml-0">
                                        <span class="float-right col-md-6"><a href="{{ route('addDeal') }}"
                                                class="btn btn-success float-right">+Add</a></span>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="myTable">
                                <thead class="bg-orange">
                                    <tr class="text-light">
                                        <th>#</th>
                                        <th>Project Start Date</th>
                                        <th>Project End Date</th>
                                        <th>Project Category</th>
                                        <th>Client Name</th>
                                        <th>Project Name</th>
                                        <th>Duration</th>
                                        <th>Business Branch</th>
                                        <th>Total Project Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deals as $deal)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $deal->startDate }}</td>
                                            <td>{{ $deal->endDate }}</td>
                                            <td>
                                                {{ $deal->type->projectCategoryName ?? 'none'}}

                                            </td>
                                            <td>
                                                {{$deal->client->clientName ?? 'none'}}
                                            </td>
                                            <td>{{ $deal->projectName }}</td>
                                            <td>{{ $deal->duration }}</td>
                                            <td>
                                                {{$deal->branch->branchName ?? 'none'}}
                                            </td>
                                            <td>{{ $deal->amount }} BDT</td>
                                            <td>
                                                <a href="/project-deal-edit/{{ $deal->id }}"
                                                    class="btn btn-success btn-sm me-1" title="Update">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm" id="delete" title="Delete"
                                                    href="javascript:void(0)"
                                                    data-url="{{ route('DealInfo', $deal->id) }}">
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
                    <h5 class="modal-title text-danger">Project Deal Delete</h5>
                </div>
                <div class="modal-body">
                    <span class="text-dark">Are you sure to delete this Project Deal?</span>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('dealDelete') }}" class="form-group" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="user-id" name="id">
                        <input type="submit" class="btn btn-danger me-1" id="yes" value="Yes">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('body').on('click', '#delete', function() {
                var userURL = $(this).data('url');
                $.get(userURL, function(data) {
                    $('#deleteModal').modal('show');
                    $('#user-id').val(data.id);

                })
            });
        });
    </script>
    <script>
        function create() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 9000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'success',
                title: 'New Project Deal Created Successfully'
            })
        }

        function wise_words() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 9000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'error',
                title: 'Project Deal Deleted Successfully'
            })
        }

        function update() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 9000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'success',
                title: 'Project Deal Updated Successfully'
            })
        }

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("dealSearch");
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
