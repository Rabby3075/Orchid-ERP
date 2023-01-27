@extends('master.app')

@section('content')

    <div class="content-wrapper bg-white">

        <div class="row">

            <div class="col-lg-8 bg-white mx-auto mt-5">

                {{--                <h4 class="text-success">{{ Session::get('message') }}</h4> --}}

                <div class="card bg-white">

                    <h4 class="card-header">{{ $singlesupplier->companyOrStoreName }}</h4>

                    <div class="card-body">

                    <div class="form-group row">

                        <label class="col-md-4 col-form-label">Company/Store Name</label>

                        <div class="col-md-8">

                            {{ $singlesupplier->companyOrStoreName }}

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-md-4 col-form-label">Supplier Group Name</label>

                        <div class="col-md-8 ">



                            <td>

                                @if ($singlesupplier->supplierGroupId)

                                    {{ $singlesupplier->group->groupName }}

                                @endif

                            </td>

                        </div>

                    </div>



                    {{-- <div class="form-group row">

                        <label class="col-md-4 col-form-label">Product Name</label>

                        <div class="col-md-8  ">

                            <td>{{ $singlesupplier->product->productName }}</td>

                        </div>

                    </div> --}}

                    <div class="form-group row">

                        <label class="col-md-4 col-form-label">Owner Name</label>

                        <div class="col-md-8">

                            <td>{{ $singlesupplier->ownerName }}</td>

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-md-4 col-form-label">Business Address</label>

                        <div class="col-md-8">

                            <td>{{ $singlesupplier->businessAddress }}</td>

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-md-4 col-form-label">Phone Number</label>

                        <div class="col-md-8">

                            <td>{{ $singlesupplier->phoneNo }}</td>

                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-md-4 col-form-label">Alternate Phone Number</label>

                        <div class="col-md-8">

                            <td>{{ $singlesupplier->altphoneNo }}</td>



                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-md-4 col-form-label">Email</label>

                        <div class="col-md-8">

                            <td>{{ $singlesupplier->email }}</td>



                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-md-4 col-form-label">Website</label>

                        <div class="col-md-8">

                            <td>{{ $singlesupplier->website }}</td>



                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-md-4 col-form-label">Supplier Country</label>

                        <div class="col-md-8  ">

                            <td>{{ $singlesupplier->supplierCountry }}</td>



                        </div>

                    </div>

                    <div class="form-group row">

                        <label class="col-md-4 col-form-label">Description</label>

                        <div class="col-md-8">

                            <td>{{ $singlesupplier->note }}</td>



                        </div>

                    </div>

                </div>

                </div>

            </div>

        </div>



    </div>

@endsection

