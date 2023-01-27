<div class="modal fade" id="detailModal{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Pay Due Amount</h3>
            </div>
            <div class="modal-body">
                <div class="modal-element">
                    <form action="{{route('storeLabourVoucher')}}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label>Date</label>
                                <input type="date" class="form-control"  name ="date" value="<?=date('Y-m-d')?>" >
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Labour No.</label>
                                <input  readonly type="text" class="form-control" name="labourId" value="{{$value->labourId}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label>Payment Method</label>
                                <select class="custom-select" name="payment_method" required>
                                    @foreach($methods as $method)
                                        <option value="{{$method->id}}">{{$method->method}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Payment Amount</label>
                                <input type="number" class="form-control"  name="paid" required>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label>Due Amount</label>
                                <input  readonly type="number" class="form-control"  name="due" value="{{$value->due}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">Submit form</button>

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
