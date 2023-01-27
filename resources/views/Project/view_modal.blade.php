<div class="modal fade" id="detailModal{{ $deal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Pay Due Amount</h3>
            </div>
            <div class="modal-body">
                <div class="modal-element">
                    <form>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label>Start Date</label>
                                <input readonly type="date" class="form-control"  value="{{$deal->startDate}}" >
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>End Date</label>
                                <input  readonly type="date" class="form-control" value="{{$deal->endDate}}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Duration</label>
                                <input  readonly type="text" class="form-control" value="{{$deal->duration}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label>Category</label>
                                <input  readonly type="text" class="form-control" value="{{$deal->type->projectCategoryName ?? 'none'}}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Client</label>
                                <input readonly type="text" class="form-control" id="validationDefault05" value="  {{$deal->client->clientName ?? 'none'}}" required>
                            </div>
                                                        <div class="col-md-4 mb-3">
                                                            <label>Project</label>
                                                            <input  readonly type="text" class="form-control" id="validationDefault03" name="due" value="{{$deal->projectName}}">
                                                        </div>


                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label>Invoice</label>
                                <input  readonly type="text" class="form-control" value="{{$deal->projectInvoice}}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Amount</label>
                                <input readonly type="text" class="form-control" value="{{$deal->amount}}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Status</label>

                                <input readonly type="text" class="form-control" value="{{$deal->status}}">

                            </div>


                        </div>
                        <div class="form-row">

                            <div class="col-md-4 mb-3">
                                <label>Branch</label>
                                <input readonly type="text" class="form-control" value="{{$deal->branch->branchName ?? 'none'}}">
                            </div>
                            <div class="col-md-8 mb-3">
                                <label>Comment</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{$deal->comment}}</textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            {{--                            <button class="btn btn-primary" type="submit">Submit form</button>--}}

                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
