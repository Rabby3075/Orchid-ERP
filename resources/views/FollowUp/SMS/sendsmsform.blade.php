@extends('master.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="py-5">
            <div class="container">

                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <h4 class="text-success">{{ Session::get('message') }}</h4>
                        <div class="card">
                            <div class="card-header">Send SMS </div>
                            <div class="card-body">

                                <form action="/send-sms" method="POST">
                                    @csrf


                                    <div class="form-group row">

                                        {{--                                        <label class="col-md-4 col-form-label" >Subject</label>--}}
                                        <div class="col-md-8">
                                            <input type="hidden" class="form-control" name="templateId" value="{{$temp->id}}" />
                                            <label style="margin-top: 1rem;">Message:</label>
                                            <textarea  class="form-control" style="height: 12rem; " name="body">{{$temp->message}}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label >Send to:</label> <br>
                                            <input class="form-check-input" checked type="checkbox" onclick="checkAll(this)" id="button" >
                                            <label class="form-check-label" for="option-all" > Select All </label> <br>
                                            @foreach($supp as $suppl)
                                                @if($suppl->phoneNo != null)
                                                    <?php
                                                    if($suppl->clientName){
                                                        $client = $suppl->clientName;
                                                    }
                                                    if($suppl->companyOrStoreName){
                                                        $client = $suppl->companyOrStoreName;
                                                    }
                                                    ?>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox" onclick="checkOne(this)" checked id="inlineCheckboxes" name="phoneNo[]" value="{{$suppl->phoneNo}}">
                                                        <label class="form-check-label" for="inlineCheckbox1">{{$client}}</label>

                                                    </div> <br>
                                                @endif
                                            @endforeach


                                        </div>
                                    </div>
                                    {{--                                    <div class="form-group row">--}}
                                    {{--                                        <label class="col-md-4 col-form-label">Message</label>--}}
                                    {{--                                        <div class="col-md-8">--}}
                                    {{--                                            <textarea  class="form-control" name="body"></textarea>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}

                                    <div class="form-group row">
                                        <label class="col-md-5 col-form-label"></label>
                                        <div class="col-md-7">
                                            <input type="submit" class="btn btn-success" value="Send" />
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
    <script>
        // var checkboxes = document.querySelectorAll("input[type ='checkbox']");
        // function checkAll(myCheckbox){
        //     if (myCheckbox.checked === true){
        //      checkboxes.forEach(function(checkbox){
        //          checkbox.checked = true;
        //      });
        //
        //     }else{
        //         console.log('No');
        //     }
        // }
        // $(document).ready(function(){
        //     $("input:checkbox").prop("checked", "true");
        // });
        function checkAll(main){
            all = document.getElementsByName('phoneNo[]');

            //console.log(all);
            for(var a=0; a < all.length; a++  ){
                 all[a].checked = main.checked;
            }
        }
        function checkOne(){
            all = document.getElementById('button');
            //console.log(all.parentNode);

            text = document.getElementById('inlineCheckboxes');
            allw = document.getElementsByName('phoneNo[]');
            console.log(allw.findIndex(checkInd));
            function checkInd(allw){
                return age >= '+1 (261) 986-5997';
            }
            console.log(allw);
            for(var a=0; a < allw.length; a++  ) {
                if (allw[a].checked === true && allw[a+1].checked != false ) {
                    //all.checked = true;
                }
                else if (allw[a].checked === false)
                {
                    all.checked = false;
                }
                else {
                    return 0;
                }
            }
           // all.checked = false;



            // for(var a=0; a < allw.length; a++  ){
            //     if (allw[a].checked=true){
            //         all.checked = false;
            //         allw[a].checked = false;
            //     }
            //     else{
            //         all.checked = true;
            //         allw[a].checked = true;
            //     }
            // }
            // const ELEMENT_DATA = [{
            //     position: 1,
            //     name: 'Hydrogen',
            //     weight: 1.0079,
            //     symbol: 'H'
            // },
            //     {
            //         position: 2,
            //         name: 'Helium',
            //         weight: 4.0026,
            //         symbol: 'He'
            //     },
            //     {
            //         position: 3,
            //         name: 'Lithium',
            //         weight: 6.941,
            //         symbol: 'Li'
            //     },
            //     {
            //         position: 4,
            //         name: 'Beryllium',
            //         weight: 9.0122,
            //         symbol: 'Be'
            //     }
            // ];
            //  m = ELEMENT_DATA.some(function(item) {
            //     return item.name === 'Helium'
            // });
            // console.log(m)

        }
    </script>
@endsection


































