@extends('master.app')
@section('content')
    @if(Session::has('Error_Message'))
        <li>
            <p class="show">
                <script type="text/javascript">
                    window.onload = function() {
                        document.getElementById(".showcode").innerHTML = error();
                    }
                </script>
            </p>
        </li>
    @endif
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-12 bg-white mx-auto mt-5">
                {{--                <h4 class="text-success">{{ Session::get('message') }}</h4>--}}
                <div class="card bg-white">
                    <h4 class="card-header">General Journal List</h4>
                    <div class="card-body bg-white">
                        <div class="bg-white">
                            <form action="#" method="GET">
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        <input type="text" class="form-control bg-white" name="shiftSearch" id="shiftSearch" onkeyup="myFunction()" placeholder="Search"/>
                                    </label>
                                    <div class="col-md-6 ml-0">
                                        <span class="float-right col-md-6"><a href="{{route('addgeneralJournal')}}" class="btn btn-success float-right">+Add</a></span>

                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="myTable">
                                <thead class="bg-orange">
                                <tr class="text-light">
                                    <th>Date</th>
                                    <th>Transaction Type</th>
                                    <th>JV No</th>
                                    <th>Account</th>
                                    <th>Debit</th>
                                    <th>Credit</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($jounrals as $jounral)
                                <tr>
                                    <td>{{$jounral->date}}</td>
                                    <td>{{$jounral->transactionType}}</td>
                                    <td>{{$jounral->JVNo}}</td>
                                 <td>
                                            @foreach($journalValues as $journalValue)
                                                @if($journalValue->journalEntryId === $jounral->id)
                                                    @foreach($accounts as $account)
                                                        @if($account->id == $journalValue->chartOfAccountId)
                                                            {{$account->AccountName}}<hr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endforeach

                                    </td>
                                    <td>
                                        @foreach($journalValues as $journalValue)
                                            @if($journalValue->journalEntryId === $jounral->id)
                                                @if(empty($journalValue->debit))
                                                    ---- <hr>
                                                @else
                                                    {{$journalValue->debit}}<hr>
                                                @endif
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($journalValues as $journalValue)
                                            @if($journalValue->journalEntryId === $jounral->id)
                                                @if(empty($journalValue->credit))
                                                    ---- <hr>
                                                @else
                                                    {{$journalValue->credit}}<hr>
                                                @endif

                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{$jounral->description}}</td>
                                    <td>
                                        <a  class="btn btn-danger btn-sm" id="delete" title="Delete" href="javascript:void(0)" data-url="{{ route('getGeneralJournal', $jounral->id) }}" >
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
                    <h5 class="modal-title text-danger">General Journal Delete</h5>
                </div>
                <div class="modal-body">
                    <span class="text-dark">Are you sure to delete this General Journal?</span>
                </div>
                <div class="modal-footer">
                    <form action="{{route('deleteGeneralJournal')}}" class="form-group" method="post" enctype="multipart/form-data">
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
                title: 'General Journal added successfully'
            })
        }
        function error()
        {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 9000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'warning',
                title: 'Already a Off day for this day. You can further update'
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
                title: 'General Journal Delete Successfully'
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
                title: 'General Journal Updated Successfully'
            })
        }

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("shiftSearch");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("th")[0];
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
