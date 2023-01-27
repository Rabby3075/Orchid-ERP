@extends('master.app')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="card">
                            <div class="card-header text-center"><h3>Edit Company Information</h3></div>
                            <div class="card-body">
                                <h4 class="text-success">{{ Session::get('message') }}</h4>
                                <form action="{{route('updateCompanyInfo',['id'=>$companyInfo['id']])}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Company Name</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="companyName" value="{{ $companyInfo->companyName }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Logo </label>
                                        <div class="col-md-9">
                                            <img src="{{ asset($companyInfo->logo) }}" width= '50' height='50' class="img img-responsive" />
                                            <input type="file" class="form-control" name="logo" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Fav Icon</label>
                                        <div class="col-md-9">
                                            <img src="{{ asset($companyInfo->favicon) }}" width= '50' height='50' class="img img-responsive" />
                                            <input type="file" class="form-control" name="favIcon" value=""/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Phone</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="phone" value="{{ $companyInfo->phone }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Email</label>
                                        <div class="col-md-9">
                                            <input type="email" class="form-control" name="email" value="{{ $companyInfo->email }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Address</label>
                                        <div class="col-md-9">
                                            <textarea class="form-control" id="comment" name="address" value="{{ $companyInfo->address }}">
                                                {{ $companyInfo->address }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">City</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="city" value="{{ $companyInfo->city }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">State</label>
                                        <div class="col-md-9 input-group">
                                            <span class="input-group-text bg-white"><i class="fa-solid fa-earth-africa" style="color:#4666ff"></i> </span>
                                            <select id="state" class="form-control bg-white " name="state" data-live-search="true">
                                                <option @if($companyInfo->state === "Bagerhat") selected @endif value="Bagerhat">Bagerhat</option>
                                                <option @if($companyInfo->state === "Bandarban") selected @endif value="Bandarban">Bandarban</option>
                                                <option @if($companyInfo->state === "Barguna") selected @endif value="Barguna">Barguna</option>
                                                <option @if($companyInfo->state === "Barisal") selected @endif value="Barisal">Barisal</option>
                                                <option @if($companyInfo->state === "Bhola") selected @endif value="Bhola">Bhola</option>
                                                <option @if($companyInfo->state === "Bogra") selected @endif value="Bogra">Bogra</option>
                                                <option @if($companyInfo->state === "Brahmanbaria") selected @endif value="Brahmanbaria">Brahmanbaria</option>
                                                <option @if($companyInfo->state === "Chandpur") selected @endif value="Chandpur">Chandpur</option>
                                                <option @if($companyInfo->state === "Chittagong") selected @endif value="Chittagong">Chittagong</option>
                                                <option @if($companyInfo->state === "Chuadanga") selected @endif value="Chuadanga">Chuadanga</option>
                                                <option @if($companyInfo->state === "Comilla") selected @endif value="Comilla">Comilla</option>
                                                <option @if($companyInfo->state === "Cox's Bazar") selected @endif value="Cox's Bazar">Cox's Bazar</option>
                                                <option @if($companyInfo->state === "Dhaka") selected @endif value="Dhaka">Dhaka</option>
                                                <option @if($companyInfo->state === "Dinajpur") selected @endif value="Dinajpur">Dinajpur</option>
                                                <option @if($companyInfo->state === "Faridpur") selected @endif value="Faridpur">Faridpur</option>
                                                <option @if($companyInfo->state === "Feni") selected @endif value="Feni">Feni</option>
                                                <option @if($companyInfo->state === "Gaibandha") selected @endif value="Gaibandha">Gaibandha</option>
                                                <option @if($companyInfo->state === "Gazipur") selected @endif value="Gazipur">Gazipur</option>
                                                <option @if($companyInfo->state === "Gopalganj") selected @endif value="Gopalganj">Gopalganj</option>
                                                <option @if($companyInfo->state === "Habiganj") selected @endif value="Habiganj">Habiganj</option>
                                                <option @if($companyInfo->state === "Jaipurhat") selected @endif value="Jaipurhat">Jaipurhat</option>
                                                <option @if($companyInfo->state === "Jamalpur") selected @endif value="Jamalpur">Jamalpur</option>
                                                <option @if($companyInfo->state === "Jessore") selected @endif value="Jessore">Jessore</option>
                                                <option @if($companyInfo->state === "Jhalakati") selected @endif value="Jhalakati">Jhalakati</option>
                                                <option @if($companyInfo->state === "Khagrachari") selected @endif  value="Khagrachari">Jhenaidah</option>
                                                <option @if($companyInfo->state === "Jhenaidah") selected @endif value="Jhenaidah">Jhenaidah</option>
                                                <option @if($companyInfo->state === "Khagrachari") selected @endif value="Khagrachari">Khagrachari</option>
                                                <option @if($companyInfo->state === "Khulna") selected @endif value="Khulna">Khulna</option>
                                                <option @if($companyInfo->state === "Kishoreganj") selected @endif value="Kishoreganj">Kishoreganj</option>
                                                <option @if($companyInfo->state === "Kurigram") selected @endif value="Kurigram">Kurigram</option>
                                                <option @if($companyInfo->state === "Kushtia") selected @endif value="Kushtia">Kushtia</option>
                                                <option @if($companyInfo->state === "Lakshmipur") selected @endif value="Lakshmipur">Lakshmipur</option>
                                                <option @if($companyInfo->state === "Lalmonirhat") selected @endif value="Lalmonirhat">Lalmonirhat</option>
                                                <option @if($companyInfo->state === "Madaripur") selected @endif value="Madaripur">Madaripur</option>
                                                <option @if($companyInfo->state === "Magura") selected @endif value="Magura">Magura</option>
                                                <option @if($companyInfo->state === "Manikganj") selected @endif value="Manikganj">Manikganj</option>
                                                <option @if($companyInfo->state === "Meherpur") selected @endif value="Meherpur">  Meherpur</option>
                                                <option @if($companyInfo->state === "Moulvibazar") selected @endif value="Moulvibazar">Moulvibazar</option>
                                                <option @if($companyInfo->state === "Munshiganj") selected @endif value="Munshiganj">Munshiganj</option>
                                                <option @if($companyInfo->state === "Mymensingh") selected @endif value="Mymensingh">Mymensingh</option>
                                                <option @if($companyInfo->state === "Naogaon") selected @endif value="Naogaon"> Naogaon</option>
                                                <option @if($companyInfo->state === "Narail") selected @endif value="Narail">Narail</option>
                                                <option @if($companyInfo->state === "Narayanganj") selected @endif value="Narayanganj">Narayanganj</option>
                                                <option @if($companyInfo->state === "Narsingdi") selected @endif value="Narsingdi">Narsingdi</option>
                                                <option @if($companyInfo->state === "Natore") selected @endif value="Natore">Natore</option>
                                                <option @if($companyInfo->state === "Nawabganj") selected @endif value="Nawabganj">Nawabganj</option>
                                                <option @if($companyInfo->state === "Netrakona") selected @endif value="Netrakona">Netrakona</option>
                                                <option @if($companyInfo->state === "Nilphamari") selected @endif value="Nilphamari">Nilphamari</option>
                                                <option @if($companyInfo->state === "Noakhali") selected @endif value="Noakhali">Noakhali</option>
                                                <option @if($companyInfo->state === "Pabna") selected @endif value="Pabna">Pabna</option>
                                                <option @if($companyInfo->state === "Panchagarh") selected @endif value="Panchagarh">Panchagarh</option>
                                                <option @if($companyInfo->state === "Parbattya Chattagram") selected @endif value="Parbattya Chattagram">Parbattya Chattagram</option>
                                                <option @if($companyInfo->state === "Patuakhali") selected @endif value="Patuakhali">Patuakhali</option>
                                                <option @if($companyInfo->state === "Pirojpur") selected @endif value="Pirojpur">Pirojpur</option>
                                                <option @if($companyInfo->state === "Rajbari") selected @endif value="Rajbari">Rajbari</option>
                                                <option @if($companyInfo->state === "Rajshahi") selected @endif value="Rajshahi">Rajshahi</option>
                                                <option @if($companyInfo->state === "Rangpur") selected @endif value="Rangpur">Rangpur </option>
                                                <option @if($companyInfo->state === "Satkhira") selected @endif value="Satkhira">Satkhira</option>
                                                <option @if($companyInfo->state === "Shariatpur") selected @endif value="Shariatpur">Shariatpur</option>
                                                <option @if($companyInfo->state === "Sherpur") selected @endif value="Sherpur">Sherpur</option>
                                                <option @if($companyInfo->state === "Sirajganj") selected @endif value="Sirajganj">Sirajganj</option>
                                                <option @if($companyInfo->state === "Sunamganj") selected @endif value="Sunamganj">Sunamganj</option>
                                                <option @if($companyInfo->state === "Sylhet") selected @endif value="Sylhet">Sylhet</option>
                                                <option @if($companyInfo->state === "Tangail") selected @endif value="Tangail">Tangail</option>
                                                <option @if($companyInfo->state === "Thakurgaon") selected @endif value="Thakurgaon">Thakurgaon</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Country</label>
                                        <div class="col-md-9 input-group">
                                            <span class="input-group-text bg-white"><i class="fa-solid fa-flag " style="color:#4666ff  "></i></span>
                                            <select id="country" class="form-control bg-white"  name="country" data-live-search="true">
                                                <option selected value="{{$companyInfo->country}}">{{$companyInfo->country}}</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Åland Islands">Åland Islands</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="American Samoa">American Samoa</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Angola">Angola</option>
                                                <option value="Anguilla">Anguilla</option>
                                                <option value="Antarctica">Antarctica</option>
                                                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Aruba">Aruba</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Bouvet Island">Bouvet Island</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burundi">Burundi</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cape Verde">Cape Verde</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic</option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Christmas Island">Christmas Island</option>
                                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                                                <option value="Cook Islands">Cook Islands</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czechia">Czechia</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Djibouti">Djibouti</option>
                                                <option value="Dominica">Dominica</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                <option value="Eritrea">Eritrea</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                <option value="Faroe Islands">Faroe Islands</option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Guiana">French Guiana</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="French Southern Territories">French Southern Territories</option>
                                                <option value="Gabon">Gabon</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Gibraltar">Gibraltar</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Grenada">Grenada</option>
                                                <option value="Guadeloupe">Guadeloupe</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guernsey">Guernsey</option>
                                                <option value="Guinea">Guinea</option>
                                                <option value="Guinea-bissau">Guinea-bissau</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland">Ireland</option>
                                                <option value="Isle of Man">Isle of Man</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jersey">Jersey</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kiribati">Kiribati</option>
                                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                <option value="Korea, Republic of">Korea, Republic of</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Lesotho">Lesotho</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macao">Macao</option>
                                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Marshall Islands">Marshall Islands</option>
                                                <option value="Martinique">Martinique</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mayotte">Mayotte</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Montenegro">Montenegro</option>
                                                <option value="Montserrat">Montserrat</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Myanmar">Myanmar</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nauru">Nauru</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="Niue">Niue</option>
                                                <option value="Norfolk Island">Norfolk Island</option>
                                                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Palau">Palau</option>
                                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Pitcairn">Pitcairn</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Reunion">Reunion</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russian Federation">Russian Federation</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saint Helena">Saint Helena</option>
                                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                <option value="Saint Lucia">Saint Lucia</option>
                                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                                                <option value="Samoa">Samoa</option>
                                                <option value="San Marino">San Marino</option>
                                                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Sierra Leone">Sierra Leone</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Solomon Islands">Solomon Islands</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                                                <option value="Swaziland">Swaziland</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Timor-leste">Timor-leste</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Tokelau">Tokelau</option>
                                                <option value="Tonga">Tonga</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Turkmenistan">Turkmenistan</option>
                                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                <option value="Tuvalu">Tuvalu</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States">United States</option>
                                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Vanuatu">Vanuatu</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Viet Nam">Viet Nam</option>
                                                <option value="Virgin Islands, British">Virgin Islands, British</option>
                                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                                <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                <option value="Western Sahara">Western Sahara</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Slogan</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="slogan" value="{{$companyInfo->slogan }}"/>
                                        </div>
                                    </div>
                                    <div class="form-group row text-center">
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-success" value="Save"/>
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
