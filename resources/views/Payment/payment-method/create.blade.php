@extends('master.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="py-5">
            <div class="container">

                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                        <div class="card">

                            <div class="card-header">Create Payment Method </div>
                            <div class="card-body">
                                <form action="post-payment-method" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">Payment Method</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="payment">
                                            <option value="">Select a Payment Method</option>
                                            @foreach ($accounts as $account)
                                            <option value="{{$account->AccountName}}">{{$account->AccountName}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label">Status</label>
                                        <div class="col-md-8">
                                            <select class="form-control" name="status">
                                            <option value="">Select Status</option>
                                            <option value="active">Active</option>
                                            <option value="inactive">InActive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-4 col-form-label"></label>
                                        <div class="col-md-8">
                                            <input type="submit" class="btn btn-success" value="Add" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->
@endsection
