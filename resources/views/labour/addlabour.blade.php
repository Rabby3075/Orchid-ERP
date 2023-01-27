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

                            <div class="card-header">Add Labour </div>
                            <div class="card-body">
                                <form action="addLabour" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label>Labour Name<span style='color: #ff0000;'>*</span></label>
                                            <input type="text" class="form-control" name="labourName" />
                                            <span style="color:red;">
                                                @error('labourName')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Labour Type</label>
                                            <select class="form-control" name="type">
                                                <option value="">Select Labour Type</option>
                                                @foreach ($types as $type)
                                                <option value="{{$type->labourTypeName}}">{{$type->labourTypeName}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label>Mobile Number</label>
                                            <input type="text" class="form-control" name="mob1No" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Mobile Number(additional)</label>
                                            <input type="text" class="form-control" name="mob2No" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                            <input type="text" class="form-control" name="email" />
                                        </div>
                                        <div class="col-md-6">
                                            <label>Address</label>
                                            <input type="text" class="form-control" name="address" />
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="horizontal-firstname-input"
                                                class=" col-form-label">State/District</label>
                                            <div class=" input-group search_select_box">
                                                {{--                                              <span class="input-group-text bg-white"><i class="fa-solid fa-earth-africa" style="color:#4666ff"></i> </span> --}}
                                                <select id="state" class="form-control bg-white " name="district"
                                                    data-live-search="true">
                                                    <option value="Bagerhat">Bagerhat</option>
                                                    <option value="Bandarban">Bandarban</option>
                                                    <option value="Barguna">Barguna</option>
                                                    <option value="Barisal">Barisal</option>
                                                    <option value="Bhola">Bhola</option>
                                                    <option value="Bogra">Bogra</option>
                                                    <option value="Brahmanbaria">Brahmanbaria</option>
                                                    <option value="Chandpur">Chandpur</option>
                                                    <option value="Chittagong">Chittagong</option>
                                                    <option value="Chuadanga">Chuadanga</option>
                                                    <option value="Comilla">Comilla</option>
                                                    <option value="Cox's Bazar">Cox's Bazar</option>
                                                    <option value="Dhaka" selected>Dhaka</option>
                                                    <option value="Dinajpur">Dinajpur</option>
                                                    <option value="Faridpur">Faridpur</option>
                                                    <option value="Feni">Feni</option>
                                                    <option value="Gaibandha">Gaibandha</option>
                                                    <option value="Gazipur">Gazipur</option>
                                                    <option value="Gopalganj">Gopalganj</option>
                                                    <option value="Habiganj">Habiganj</option>
                                                    <option value="Jaipurhat">Jaipurhat</option>
                                                    <option value="Jamalpur">Jamalpur</option>
                                                    <option value="Jessore">Jessore</option>
                                                    <option value="Jhalakati">Jhalakati</option>
                                                    <option value="Khagrachari">Jhenaidah</option>
                                                    <option value="AL">Khagrachari</option>
                                                    <option value="Khulna">Khulna</option>
                                                    <option value="Kishoreganj">Kishoreganj</option>
                                                    <option value="Kurigram">Kurigram</option>
                                                    <option value="Kushtia">Kushtia</option>
                                                    <option value="Lakshmipur">Lakshmipur</option>
                                                    <option value="Lalmonirhat">Lalmonirhat</option>
                                                    <option value="Madaripur">Madaripur</option>
                                                    <option value="Manikganj">Magura</option>
                                                    <option value="AL">Manikganj</option>
                                                    <option value="Meherpur"> Meherpur</option>
                                                    <option value="Moulvibazar">Moulvibazar</option>
                                                    <option value="Munshiganj">Munshiganj</option>
                                                    <option value="Mymensingh">Mymensingh</option>
                                                    <option value="Naogaon"> Naogaon</option>
                                                    <option value="Narayanganj">Narail</option>
                                                    <option value="AL">Narayanganj</option>
                                                    <option value="Natore">Narsingdi</option>
                                                    <option value="AL">Natore</option>
                                                    <option value="Nawabganj">Nawabganj</option>
                                                    <option value="AL">Netrakona</option>
                                                    <option value="Nilphamari">Nilphamari</option>
                                                    <option value="Noakhali">Noakhali</option>
                                                    <option value="Pabna">Pabna</option>
                                                    <option value="Panchagarh">Panchagarh</option>
                                                    <option value="Parbattya Chattagram">Parbattya Chattagram</option>
                                                    <option value="Patuakhali">Patuakhali</option>
                                                    <option value="Pirojpur">Pirojpur</option>
                                                    <option value="Rajbari">Rajbari</option>
                                                    <option value="Rajshahi">Rajshahi</option>
                                                    <option value="Rangpur">Rangpur </option>
                                                    <option value="Satkhira">Satkhira</option>
                                                    <option value="Shariatpur">Shariatpur</option>
                                                    <option value="Sherpur">Sherpur</option>
                                                    <option value="Sirajganj">Sirajganj</option>
                                                    <option value="Sunamganj">Sunamganj</option>
                                                    <option value="Sylhet">Sylhet</option>
                                                    <option value="Tangail">Tangail</option>
                                                    <option value="Thakurgaon">Thakurgaon</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <label>City/Police Station</label>
                                            <input type="text" class="form-control" name="subDistrict" />
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label>Business Branch</label>
                                            <select class="form-control" name="branch">
                                                <option value="">Select Branch</option>
                                                @foreach ($branches as $branch)
                                                <option value="{{$branch->branchName}}">{{$branch->branchName}}</option>
                                                    @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-2 col-form-label">About</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="note"></textarea>
                                        </div>
                                    </div>

                                    <div class="input-group xpress control-group lst increment">
                                        <input type="file" name="filenames[]" class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success add" type="button">Add another file</button>
                                        </div>
                                   </div>
                                   <div class="clone d-none">
                                    <div class="xpress control-group lst input-group">
                                        <input type="file" name="filenames[]" class="myfrm form-control">
                                        <div class="input-group-btn">
                                             <button class="btn btn-danger remove" type="button">remove file</button>
                                        </div>
                                   </div>
                                   </div>
                                    <div class="form-group row mt-4">
                                        <label class="col-md-5 col-form-label"></label>
                                        <div class="col-md-7" style="">
                                            <input type="submit" class="btn btn-success" value="Create" />
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

@section('js')
<script>
    $(document).ready(function(){
        $('.add').click(function(){
            var htmldata = $('.clone').html();
            $('.increment').after(htmldata);
        });

        $('body').on('click','.remove', function(){
            $(this).parents('.xpress').remove()
        })
    })
</script>

@endsection
