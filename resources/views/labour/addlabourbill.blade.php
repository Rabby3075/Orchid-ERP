@extends('master.app')
@section('css')
{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" /> --}}
@endsection
@section('content')

    <div class="content-wrapper"  >

        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                        <div class="card">
                            <div class="card-header">Add Labour Bill </div>
                            <div class="card-body">
                           <add-labour> </add-labour>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    {{--    :purchase = "{!! $id !!}  "--}}


@endsection
@section('js')
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script> --}}
<script>
    // $('select').selectpicker();

    import AddLabour from "../../js/components/AddLabour";
    export default {
        components: {AddLabour}
    }
</script>

@endsection

