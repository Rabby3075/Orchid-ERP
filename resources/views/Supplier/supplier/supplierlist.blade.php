@extends('master.app')
@section('content')
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-12 bg-white mx-auto mt-5">
                {{--                <h4 class="text-success">{{ Session::get('message') }}</h4> --}}
                <div class="card bg-white">
                    <h4 class="card-header">All Suppliers</h4>

                    <div class="card-body bg-white">
                        <div class="bg-white">
                            <form action="/supplier-search" method="GET">
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        <input type="text" class="form-control bg-white" name="query" value="Search" />
                                    </label>
                                    <div class="col-md-6 ml-0">
                                        <span class="float-right col-md-6"><a href="/add-supplier"
                                                class="btn btn-success float-right">+Add</a></span>
                                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="bg-orange">
                                    <tr class="text-light">
                                        <th>SL No.</th>
                                        <th>Supplier Name</th>
                                        <th>Supplier ID</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Owner Name</th>
                                        <th>Address</th>
                                        <th>Total Purchase Due</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $supplier->companyOrStoreName }}</td>
                                            <td>{{ $supplier->supplierId }}</td>
                                            <td>{{ $supplier->phoneNo }}</td>
                                            <td>{{ $supplier->email }}</td>
                                            <td>{{ $supplier->ownerName }}</td>
                                            <td>{{ $supplier->businessAddress }}</td>
                                            <?php
                                            $dues = App\Models\Purchase\purchase::all();
                                            ?>
                                            <td>

                                                @foreach ($dues as $due)
                                                    @if ($due->supplierId == $supplier->id)
                                                        {{ $due->due }}
                                                    @endif
                                                @endforeach
                                            <td>
                                                <a href='{{ URL::to('/supplier/'.$supplier->id) }}' class="btn btn-success btn-sm"
                                                    title="view">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                                <a href="/supplier-edit/{{ $supplier->id }}" class="btn btn-success mx-1 btn-sm"
                                                    title="Update">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-sm mr-1 deleteBtn"
                                                    value="{{ $supplier->id }}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                <a href="{{route('all.supplier.payment')}}" class="btn btn-success btn-sm"
                                                    >
                                                    <i class="fa fa-forward"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row mt-3 ms-5">
                                {{ $suppliers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
       <div class="modal-dialog modal-notify modal-info" role="document">
           <!--Content-->
           <div class="modal-content text-center">
               <!--Header-->
               <div class="modal-header bg-danger d-flex justify-content-center">
                   <p class="heading mt-3">Delete Confirmation</p>
               </div>
               <div class="modal-body text-danger">
                   <i class="fas fa-circle-xmark fa-4x animated rotateIn mb-4"></i>
                   <p>Do you want to delete this?</p>
               </div>
               <div class="modal-footer flex-center">
                   <form action="{{route('deleteSupplier')}}" class="form-group" method="post" enctype="multipart/form-data">
                       {{csrf_field()}}
                       <input type="hidden" id="id" name="id">
                       <input type="submit" class="btn btn-danger mx-1" id="yes" value="Yes, Delete">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >close</button>
                   </form>
               </div>
           </div>
           <!--/.Content-->
       </div>
   </div>
    </div>
@endsection
