@extends('CRM.layouts_successLeeds.leedsNav')
@section('leedContent')
    <div class="content-wrapper mx-auto">
        <section class="pb-5 pt-0">
            <div class="mx-3 px-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Quotation Summary</div>
                            <div class="card-body">
                                <create-cart :cart="{{$cart}}"></create-cart>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
<script>
    import CreateCart from "../../../js/components/CreateCart";
    export default {
        components: {CreateCart}
    }
</script>
