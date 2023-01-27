@extends('master.app')
@section('content')
    <div class="content-wrapper bg-white">
        <div class="row">
            <div class="col-lg-12 bg-white mx-auto mt-5">
                {{--                <h4 class="text-success">{{ Session::get('message') }}</h4> --}}
                <div class="card bg-white">
                    <h4 class="card-header">Total Purchase Return</h4>

                    <div class="card-body bg-white">

                        <div class="bg-white">
                            <form action="/purchase-return-search" method="GET">
                                <div class="form-group row">
                                    <label class="col-md-6">
                                        <input type="text" class="form-control bg-white" name="query" value="Search" />
                                    </label>
                                    <div class="col-md-6 ml-0">
                                        {{--                                        <span class="float-right col-md-6"><a href="/create-purchase" class="btn btn-success float-right">+Add</a></span> --}}
                                        <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead class="bg-orange">
                                    <tr class="text-light">
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Return Invoice No.</th>
                                        <th>Purchase Bil No.</th>
                                        <th>Supplier Name</th>
                                        <th>Client Name</th>
                                        <th>Project Name</th>
                                        <th>Total Return Amuount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <?php
                                        if (!is_null($purchase->branch)) {
                                            $company = \App\Models\Settings\CompanyInfo::where('id', '=', $purchase->branch)->first();
                                        }

                                        ?>
                                        <?php
                                        $products = json_decode($purchase['products']);
                                        //                                    $pdt = \App\Models\User::where('id','=', $purchase->userId)->first();
                                        $client = \App\Models\CRM\Leeds::where('id', '=', $purchase->clientId)->first();
                                        if ($purchase->clientId === null) {
                                            $client = \App\Models\CRM\Leeds::all('clientName')->first();
                                        }
                                        $supp = \App\Models\Supplier\Supplier::where('id', '=', $purchase->supplierId)->first();
                                        if ($purchase->supplierId === null) {
                                            $supp = \App\Models\Supplier\Supplier::all('companyOrStoreName')->first();
                                        }
                                        $project = \App\Models\Project\ProjectDeal::where('id', '=', $purchase->projectId)->first();

                                        ?>
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $purchase->date }}</td>
                                            <td>{{ $purchase->purchaseReturnId }}</td>
                                            <td>{{ $purchase->purchaseInvoice }}</td>
                                            <td>{{ $supp->companyOrStoreName  ?? 'none'}}</td>
                                            <td>{{ $client->clientName  ?? 'none'}}</td>
                                                <td>{{ $purchase->project->projectName ?? 'No project name selected'  }}</td>
                                            <td>{{ $purchase->grandTotal }}</td>
                                            <td>

                                                <a href="#" id="detail" class="btn btn-primary btn-sm"
                                                    title="Detail" data-toggle="modal"
                                                    data-target="#detailModal{{ $purchase->id }}">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                                <a class="btn btn-danger btn-sm" id="delete" title="Delete"
                                                    href="javascript:void(0)"
                                                    data-url="{{ route('purchaseReturnInfo', $purchase->id) }}">
                                                    <i class="fa fa-trash"></i>
                                                </a> <br>


                                            </td>
                                            @include('purchase.modalpurchasereturn')
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
                    <h5 class="modal-title text-danger">Purchase Return Delete</h5>

                </div>
                <div class="modal-body">

                    <span class="text-dark">Are you sure to delete this Purchase Return?</span>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('deletePurchaseReturn') }}" class="form-group" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" id="user-id" name="id">
                        <input type="submit" class="btn btn-danger" id="yes" value="Yes">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        //-----------cancel ride---------------
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
@endsection
