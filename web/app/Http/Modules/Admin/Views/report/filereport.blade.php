@extends('Admin/Layouts/adminlayout')

@section('title', 'Report')



@section('pagestyle')
    <style>
        .file-rebuttal h3.hidden-xs {
            font-size: 12px;
        }

        .file-rebuttal .nav-tabs > li {
            width: 20%;
        }

        .img-130 {
            height: 145px;
            width: 225px
        }

        .list-toggle > a.disabled {
            color: #999999;
        }

        .list-toggle > li {
            pointer-events: none;
            color: #999999;
        }

        .list-toggle > li.active {
            pointer-events: auto;
        }

        .overflow-text > p {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            width: 60%;
        }
    </style>
    @endsection

    @section('content')


            <!-- Start Main Container -->
    <div class="main-container">
        <div class="page-header no-breadcrumb font-header">File Report</div>

        <div class="content-wrap">
            <div class="row">
                <div class="col-lg-12">
                    <div class="file-rebuttal">
                        <div class="board">
                            <div class="board-inner">
                                <ul class="nav nav-tabs list-toggle" id="myTab">
                                    <div class="liner"></div>
                                    <li class="active">
                                        <a href="#1" id="tabs1" data-toggle="tab">
                                            <span class="round-tabs one"> 1 </span>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <h3 class="hidden-xs"> Company or Individual </h3>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#2" id="tabs2" data-toggle="tab">
                                            <span class="round-tabs two"> 2 </span>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <h3 class="hidden-xs"> Report Title and Category </h3>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#3" id="tabs3" data-toggle="tab">
                                            <span class="round-tabs three"> 3 </span>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <h3 class="hidden-xs"> Write your Report </h3>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#4" id="tabs4" data-toggle="tab">
                                            <span class="round-tabs four"> 4 </span>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <h3 class="hidden-xs"> Add Photos </h3>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#5" id="tabs5" data-toggle="tab">
                                            <span class="round-tabs five"> 5 </span>
                                            <br/>
                                            <br/>
                                            <br/>
                                            <h3 class="hidden-xs"> Submit your Report </h3>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="1">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="" role="form" action="" method="post">
                                                <h3 class="text-danger">Company or Individual you are reporting</h3>
                                                <p>All the information in Step 1 is on the Company or Individual you are
                                                    reporting.</p>
                                                <strong>YOU ARE NOT reporting your personal information here.</strong>
                                                <legend class="heading-report">Name of Company or Individual you are
                                                    reporting:
                                                </legend>
                                                <small>If you have more than one Company or Individual named in your
                                                    report, or if the company goes by more than one name (AKA's), put
                                                    the other names in the "Other Name's" box
                                                </small>

                                                <div class="form-group m-top-lg row">
                                                    <label class="col-xs-3 control-label">Name of Company or Individual
                                                        :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($steponedata))
                                                            <input type="text" class="form-control"
                                                                   id="steponecompanyname"
                                                                   value="{{$steponedata['companyname']}}"
                                                                   name="steponecompanyname" required/>
                                                        @else
                                                            <input type="text" class="form-control"
                                                                   id="steponecompanyname" name="steponecompanyname"
                                                                   required/>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group m-bottom-lg row">
                                                    <label class="col-xs-3 control-label">Additional names (AKA's)
                                                        :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($steponedata))
                                                            <textarea class="form-control" id="steponeakaname"
                                                                      name="steponeakaname"
                                                                      rows="6">{{$steponedata['aka']}}</textarea>
                                                        @else
                                                            <textarea class="form-control" id="steponeakaname"
                                                                      name="steponeakaname" rows="6"></textarea>
                                                        @endif
                                                        <i class="help-block">(optional)</i>
                                                    </div>
                                                </div>

                                                <legend class="heading-report">Web address of the Company or Individual
                                                    on the Internet:
                                                </legend>
                                                <small>If the Company or Individual is on the Internet and only on-line
                                                    based, enter a web address below.
                                                </small>

                                                <div class="form-group m-top-lg m-bottom-lg row">
                                                    <label class="col-xs-3 control-label">Web Address :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($steponedata))
                                                            <input type="url" class="form-control"
                                                                   id="steponewebaddress" name="steponewebaddress"
                                                                   value="{{$steponedata['webaddress']}}"
                                                                   placeholder=""/>
                                                        @else
                                                            <input type="url" class="form-control"
                                                                   id="steponewebaddress" name="steponewebaddress"/>
                                                        @endif
                                                    </div>
                                                </div>

                                                <legend class="heading-report">Choose the location of the Company or
                                                    Individual:
                                                </legend>
                                                <div class="form-group m-top-lg m-bottom-lg row">
                                                    <div class="col-xs-8">
                                                        <input type="radio" value="0" name="steponelocationtype"
                                                               id="steponelocationtype" class="physical"
                                                               <?php if (isset($steponedata)) {
                                                                   if ($steponedata['locationtype'] == "0") {
                                                                       echo "checked";
                                                                   }
                                                               } else {
                                                                   echo "checked";
                                                               } ?>  required/> &nbsp; - &nbsp; Physical Location
                                                        <br/>
                                                        <input type="radio" value="1" name="steponelocationtype"
                                                               id="steponelocationtype" class="national"
                                                               <?php if (isset($steponedata)) {
                                                                   if ($steponedata['locationtype'] == "1") {
                                                                       echo "checked";
                                                                   }
                                                               } ?> required/> &nbsp; - &nbsp; Nationwide
                                                        <br/>
                                                        <input type="radio" value="2" name="steponelocationtype"
                                                               id="steponelocationtype" class="internet"
                                                               <?php if (isset($steponedata)) {
                                                                   if ($steponedata['locationtype'] == "2") {
                                                                       echo "checked";
                                                                   }
                                                               } ?> required/> &nbsp; - &nbsp; Internet Only
                                                    </div>
                                                </div>

                                                <legend class="heading-report">Address of Company or Individual you are
                                                    reporting:
                                                </legend>
                                                <ul>
                                                    <li>
                                                        <small>You must enter either a physical street address and/or a
                                                            web address.
                                                        </small>
                                                    </li>
                                                    <li>
                                                        <small>You may enter both, BUT If the Company or Individual is
                                                            on the Internet and only on-line based, or you don't have a
                                                            physical address, you MUST enter their Web address.
                                                        </small>
                                                    </li>
                                                </ul>
                                                <div class="row m-top-lg physical_y" <?php if (isset($steponedata)) {
                                                    if ($steponedata['locationtype'] != "0") {
                                                        echo "style=display:none";
                                                    }
                                                } ?> >
                                                    <div class="col-xs-8">
                                                        <div class="form-group row">
                                                            <label class="col-xs-5 control-label">Street Address
                                                                :</label>
                                                            <div class="col-xs-7">
                                                                @if(isset($steponedata))
                                                                    <input type="text" class="form-control"
                                                                           name="steponestreet"
                                                                           value="{{$steponedata['streetaddress']}}"
                                                                           id="steponestreet"/>
                                                                @else
                                                                    <input type="text" class="form-control"
                                                                           name="steponestreet" id="steponestreet"/>
                                                                @endif
                                                                <i class="help-block">physical (street) address only,
                                                                    city and state go below</i>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-xs-5 control-label">City :</label>
                                                            <div class="col-xs-7">
                                                                @if(isset($steponedata))
                                                                    <input type="text" class="form-control"
                                                                           name="steponecity" id="steponecity"
                                                                           value="{{$steponedata['city']}}"/>
                                                                @else
                                                                    <input type="text" class="form-control"
                                                                           name="steponecity" id="steponecity"/>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-xs-5 control-label">State/Province
                                                                :</label>
                                                            <div class="col-xs-7">
                                                                <select class="form-control" name="steponestate"
                                                                        id="steponestate">
                                                                    <option selected disabled>Select State/Province
                                                                    </option>
                                                                    <option value="Internet">Internet</option>
                                                                    <option value="Nationwide">Nationwide</option>
                                                                    <optgroup label="--- US States">
                                                                        <option value="Alabama"> Alabama</option>
                                                                        <option value="Alaska"> Alaska</option>
                                                                        <option value="Arizona"> Arizona</option>
                                                                        <option value="Arkansas"> Arkansas</option>
                                                                        <option value="California"> California</option>
                                                                        <option value="Colorado"> Colorado</option>
                                                                        <option value="Connecticut"> Connecticut
                                                                        </option>
                                                                        <option value="Delaware"> Delaware</option>
                                                                        <option value="Dist of Columbia"> Dist of
                                                                            Columbia
                                                                        </option>
                                                                        <option value="Florida"> Florida</option>
                                                                        <option value="Georgia"> Georgia</option>
                                                                        <option value="Hawaii"> Hawaii</option>
                                                                        <option value="Idaho"> Idaho</option>
                                                                        <option value="Illinois"> Illinois</option>
                                                                        <option value="Indiana"> Indiana</option>
                                                                        <option value="Iowa"> Iowa</option>
                                                                        <option value="Kansas"> Kansas</option>
                                                                        <option value="Kentucky"> Kentucky</option>
                                                                        <option value="Louisiana"> Louisiana</option>
                                                                        <option value="Maine"> Maine</option>
                                                                        <option value="Maryland"> Maryland</option>
                                                                        <option value="Massachusetts"> Massachusetts
                                                                        </option>
                                                                        <option value="Michigan"> Michigan</option>
                                                                        <option value="Minnesota"> Minnesota</option>
                                                                        <option value="Mississippi"> Mississippi
                                                                        </option>
                                                                        <option value="Missouri"> Missouri</option>
                                                                        <option value="Montana"> Montana</option>
                                                                        <option value="Nebraska"> Nebraska</option>
                                                                        <option value="Nevada"> Nevada</option>
                                                                        <option value="New Hampshire"> New Hampshire
                                                                        </option>
                                                                        <option value="New Jersey"> New Jersey</option>
                                                                        <option value="New Mexico"> New Mexico</option>
                                                                        <option value="New York"> New York</option>
                                                                        <option value="North Carolina"> North Carolina
                                                                        </option>
                                                                        <option value="North Dakota"> North Dakota
                                                                        </option>
                                                                        <option value="Ohio"> Ohio</option>
                                                                        <option value="Oklahoma"> Oklahoma</option>
                                                                        <option value="Oregon"> Oregon</option>
                                                                        <option value="Pennsylvania"> Pennsylvania
                                                                        </option>
                                                                        <option value="Rhode Island"> Rhode Island
                                                                        </option>
                                                                        <option value="South Carolina"> South Carolina
                                                                        </option>
                                                                        <option value="South Dakota"> South Dakota
                                                                        </option>
                                                                        <option value="Tennessee"> Tennessee</option>
                                                                        <option value="Texas"> Texas</option>
                                                                        <option value="Utah"> Utah</option>
                                                                        <option value="Vermont"> Vermont</option>
                                                                        <option value="Virginia"> Virginia</option>
                                                                        <option value="Washington"> Washington</option>
                                                                        <option value="West Virginia"> West Virginia
                                                                        </option>
                                                                        <option value="Wisconsin"> Wisconsin</option>
                                                                        <option value="Wyoming"> Wyoming</option>
                                                                    </optgroup>
                                                                    <option value="Other">--- Other</option>
                                                                    <optgroup label="--- Canadian Provinces">
                                                                        <option value="Alberta">Alberta</option>
                                                                        <option value="British Columbia">British
                                                                            Columbia
                                                                        </option>
                                                                        <option value="Manitoba">Manitoba</option>
                                                                        <option value="New Brunswick">New Brunswick
                                                                        </option>
                                                                        <option value="New Foundland">New Foundland
                                                                        </option>
                                                                        <option value="NorthWest Territories">Northwest
                                                                            Territories
                                                                        </option>
                                                                        <option value="Nova Scotia">Nova Scotia</option>
                                                                        <option value="Ontario">Ontario</option>
                                                                        <option value="Prince Edward Island">Prince
                                                                            Edward Island
                                                                        </option>
                                                                        <option value="Quebec">Quebec</option>
                                                                        <option value="Saskatchewan">Saskatchewan
                                                                        </option>
                                                                        <option value="Yukon">Yukon</option>
                                                                    </optgroup>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-xs-5 control-label">Zipcode :</label>
                                                            <div class="col-xs-7">
                                                                @if(isset($steponedata))
                                                                    <input type="text" class="form-control"
                                                                           name="steponezip" id="steponezip"
                                                                           value="{{$steponedata['zipcode']}}"/>
                                                                @else
                                                                    <input type="text" class="form-control"
                                                                           name="steponezip" id="steponezip"/>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label class="col-xs-5 control-label">Country :</label>
                                                            <div class="col-xs-7">
                                                                <?php
                                                                $countryarray = array("Afghanistan", "Aland Islands", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Australia"
                                                                , "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean territory", "Brunei Darussalam", "Bulgaria"
                                                                , "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, Democratic Republic", "Cook Islands", "Costa Rica", "Cote dIvoire (Ivory Coast)", "Croatia (Hrvatska)"
                                                                , "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea"
                                                                , "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern Territories"
                                                                , "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau"
                                                                , "Guyana", "Haiti", "Heard and McDonald Islands", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy"
                                                                , "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea (north)", "Korea (south)", "Kuwait", "Kyrgyzstan", "Lao People's Democratic Republic", "Latvia", "Lebanon"
                                                                , "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta"
                                                                , "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia"
                                                                , "Moldova", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles"
                                                                , "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau"
                                                                , "Palestinian Territories", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico"
                                                                , "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Helena", "Saint Kitts and Nevis"
                                                                , "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal"
                                                                , "Serbia and Montenegro", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands"
                                                                , "Somalia", "South Africa", "Spain", "Sri Lanka", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syria",
                                                                        "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan",
                                                                        "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States of America",
                                                                        "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (US)",
                                                                        "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Zaire", "Zimbabwe");

                                                                ?>
                                                                <select class="form-control" name="steponecountry"
                                                                        id="steponecountry">
                                                                    <option selected disabled> Select Country</option>
                                                                    @foreach($countryarray as $country)
                                                                        @if(isset($steponedata) && $country== $steponedata['country'])
                                                                            <option value="{{$country}}"
                                                                                    selected="">{{$country}}</option>
                                                                        @else
                                                                            <option value="{{$country}}">{{$country}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                <!-- <select class="form-control" name="steponecountry" id="steponecountry">
                                                                    <option selected disabled> Select Country </option>
                                                                    <option value="Afghanistan"> Afghanistan</option>
                                                                    <option value="�land Islands"> �land Islands</option>
                                                                    <option value="Albania"> Albania</option>
                                                                    <option value="Algeria"> Algeria</option>
                                                                    <option value="American Samoa"> American Samoa</option><option value="Andorra"> Andorra</option><option value="Angola"> Angola</option>
                                                                    <option value="Anguilla"> Anguilla</option><option value="Antarctica"> Antarctica</option>
                                                                    <option value="Antigua and Barbuda"> Antigua and Barbuda</option><option value="Argentina"> Argentina</option>
                                                                    <option value="Armenia"> Armenia</option><option value="Aruba"> Aruba</option>
                                                                    <option value="Australia"> Australia</option><option value="Austria"> Austria</option>
                                                                    <option value="Azerbaijan"> Azerbaijan</option>
                                                                    <option value="Bahamas"> Bahamas</option>
                                                                    <option value="Bahrain"> Bahrain</option>
                                                                    <option value="Bangladesh"> Bangladesh</option>
                                                                    <option value="Barbados"> Barbados</option>
                                                                    <option value="Belarus"> Belarus</option>
                                                                    <option value="Belgium"> Belgium</option>
                                                                    <option value="Belize"> Belize</option>
                                                                    <option value="Benin"> Benin</option>
                                                                    <option value="Bermuda"> Bermuda</option>
                                                                    <option value="Bhutan"> Bhutan</option>
                                                                    <option value="Bolivia"> Bolivia</option>
                                                                    <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina</option>
                                                                    <option value="Botswana"> Botswana</option><option value="Bouvet Island"> Bouvet Island</option><option value="Brazil"> Brazil</option>
                                                                    <option value="British Indian Ocean territory"> British Indian Ocean territory</option>
                                                                    <option value="Brunei Darussalam"> Brunei Darussalam</option><option value="Bulgaria"> Bulgaria</option>
                                                                    <option value="Burkina Faso"> Burkina Faso</option>
                                                                    <option value="Burundi"> Burundi</option>
                                                                    <option value="Cambodia"> Cambodia</option>
                                                                    <option value="Cameroon"> Cameroon</option>
                                                                    <option value="Canada"> Canada</option>
                                                                    <option value="Cape Verde"> Cape Verde</option>
                                                                    <option value="Cayman Islands"> Cayman Islands</option>
                                                                    <option value="Central African Republic"> Central African Republic</option>
                                                                    <option value="Chad"> Chad</option><option value="Chile"> Chile</option>
                                                                    <option value="China"> China</option>
                                                                    <option value="Christmas Island"> Christmas Island</option>


                                                                    <option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands</option>
                                                                    <option value="Colombia"> Colombia</option>
                                                                    <option value="Comoros"> Comoros</option>
                                                                    <option value="Congo"> Congo</option>
                                                                    <option value="Congo, Democratic Republic"> Congo, Democratic Republic</option>
                                                                    <option value="Cook Islands"> Cook Islands</option>
                                                                    <option value="Costa Rica"> Costa Rica</option>
                                                                    <option value="C�te d'Ivoire (Ivory Coast)"> C�te d'Ivoire (Ivory Coast)</option>
                                                                    <option value="Croatia (Hrvatska)"> Croatia (Hrvatska)</option>
                                                                    <option value="Cuba"> Cuba</option>
                                                                    <option value="Cyprus"> Cyprus</option>
                                                                    <option value="Czech Republic"> Czech Republic</option>
                                                                    <option value="Denmark"> Denmark</option>
                                                                    <option value="Djibouti"> Djibouti</option>
                                                                    <option value="Dominica"> Dominica</option>
                                                                    <option value="Dominican Republic"> Dominican Republic</option>
                                                                    <option value="East Timor"> East Timor</option>
                                                                    <option value="Ecuador"> Ecuador</option>
                                                                    <option value="Egypt"> Egypt</option>
                                                                    <option value="El Salvador"> El Salvador</option>
                                                                    <option value="Equatorial Guinea"> Equatorial Guinea</option>
                                                                    <option value="Eritrea"> Eritrea</option><option value="Estonia"> Estonia</option>
                                                                    <option value="Ethiopia"> Ethiopia</option>
                                                                    <option value="Falkland Islands"> Falkland Islands</option>
                                                                    <option value="Faroe Islands"> Faroe Islands</option>
                                                                    <option value="Fiji"> Fiji</option>
                                                                    <option value="Finland"> Finland</option>
                                                                    <option value="France"> France</option>
                                                                    <option value="French Guiana"> French Guiana</option>
                                                                    <option value="French Polynesia"> French Polynesia</option>
                                                                    <option value="French Southern Territories"> French Southern Territories</option>
                                                                    <option value="Gabon"> Gabon</option><option value="Gambia"> Gambia</option>
                                                                    <option value="Georgia"> Georgia</option><option value="Germany"> Germany</option>
                                                                    <option value="Ghana"> Ghana</option><option value="Gibraltar"> Gibraltar</option>
                                                                    <option value="Greece"> Greece</option><option value="Greenland"> Greenland</option>
                                                                    <option value="Grenada"> Grenada</option><option value="Guadeloupe"> Guadeloupe</option>
                                                                    <option value="Guam"> Guam</option><option value="Guatemala"> Guatemala</option>
                                                                    <option value="Guinea"> Guinea</option><option value="Guinea-Bissau"> Guinea-Bissau</option>

                                                                    <option value="Guyana"> Guyana</option><option value="Haiti"> Haiti</option>
                                                                    <option value="Heard and McDonald Islands"> Heard and McDonald Islands</option>
                                                                    <option value="Honduras"> Honduras</option>
                                                                    <option value="Hong Kong"> Hong Kong</option>
                                                                    <option value="Hungary"> Hungary</option><option value="Iceland"> Iceland</option>
                                                                    <option value="India"> India</option><option value="Indonesia"> Indonesia</option>
                                                                    <option value="Iran"> Iran</option><option value="Iraq"> Iraq</option>
                                                                    <option value="Ireland"> Ireland</option><option value="Israel"> Israel</option><option value="Italy"> Italy</option>
                                                                    <option value="Jamaica"> Jamaica</option><option value="Japan"> Japan</option>
                                                                    <option value="Jordan"> Jordan</option><option value="Kazakhstan"> Kazakhstan</option>
                                                                    <option value="Kenya"> Kenya</option><option value="Kiribati"> Kiribati</option>
                                                                    <option value="Korea (north)"> Korea (north)</option><option value="Korea (south)"> Korea (south)</option>
                                                                    <option value="Kuwait"> Kuwait</option><option value="Kyrgyzstan"> Kyrgyzstan</option>
                                                                    <option value="Lao People's Democratic Republic"> Lao People's Democratic Republic</option>
                                                                    <option value="Latvia"> Latvia</option><option value="Lebanon"> Lebanon</option>
                                                                    <option value="Lesotho"> Lesotho</option><option value="Liberia"> Liberia</option>
                                                                    <option value="Libyan Arab Jamahiriya"> Libyan Arab Jamahiriya</option>
                                                                    <option value="Liechtenstein"> Liechtenstein</option><option value="Lithuania"> Lithuania</option>
                                                                    <option value="Luxembourg"> Luxembourg</option><option value="Macao"> Macao</option>
                                                                    <option value="Macedonia"> Macedonia</option><option value="Madagascar"> Madagascar</option>
                                                                    <option value="Malawi"> Malawi</option><option value="Malaysia"> Malaysia</option>
                                                                    <option value="Maldives"> Maldives</option><option value="Mali"> Mali</option><option value="Malta"> Malta</option>
                                                                    <option value="Marshall Islands"> Marshall Islands</option>
                                                                    <option value="Martinique"> Martinique</option><option value="Mauritania"> Mauritania</option>
                                                                    <option value="Mauritius"> Mauritius</option><option value="Mayotte"> Mayotte</option>
                                                                    <option value="Mexico"> Mexico</option><option value="Micronesia"> Micronesia</option>
                                                                    <option value="Moldova"> Moldova</option><option value="Monaco"> Monaco</option>
                                                                    <option value="Mongolia"> Mongolia</option>
                                                                    <option value="Montserrat"> Montserrat</option>
                                                                    <option value="Morocco"> Morocco</option><option value="Mozambique"> Mozambique</option>
                                                                    <option value="Myanmar"> Myanmar</option><option value="Namibia"> Namibia</option>
                                                                    <option value="Nauru"> Nauru</option><option value="Nepal"> Nepal</option>
                                                                    <option value="Netherlands"> Netherlands</option>
                                                                    <option value="Netherlands Antilles"> Netherlands Antilles</option>

                                                                    <option value="New Caledonia"> New Caledonia</option>
                                                                    <option value="New Zealand"> New Zealand</option>
                                                                    <option value="Nicaragua"> Nicaragua</option><option value="Niger"> Niger</option>
                                                                    <option value="Nigeria"> Nigeria</option>
                                                                    <option value="Niue"> Niue</option>
                                                                    <option value="Norfolk Island"> Norfolk Island</option>
                                                                    <option value="Northern Mariana Islands"> Northern Mariana Islands</option>
                                                                    <option value="Norway"> Norway</option><option value="Oman"> Oman</option>
                                                                    <option value="Pakistan"> Pakistan</option><option value="Palau"> Palau</option>
                                                                    <option value="Palestinian Territories"> Palestinian Territories</option>
                                                                    <option value="Panama"> Panama</option>
                                                                    <option value="Papua New Guinea"> Papua New Guinea</option>
                                                                    <option value="Paraguay"> Paraguay</option><option value="Peru"> Peru</option>
                                                                    <option value="Philippines"> Philippines</option>
                                                                    <option value="Pitcairn"> Pitcairn</option><option value="Poland"> Poland</option>
                                                                    <option value="Portugal"> Portugal</option>
                                                                    <option value="Puerto Rico"> Puerto Rico</option>
                                                                    <option value="Qatar"> Qatar</option><option value="R�union"> R�union</option>
                                                                    <option value="Romania"> Romania</option>
                                                                    <option value="Russian Federation"> Russian Federation</option>
                                                                    <option value="Rwanda"> Rwanda</option>
                                                                    <option value="Saint Helena"> Saint Helena</option>
                                                                    <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis</option>
                                                                    <option value="Saint Lucia"> Saint Lucia</option><option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon</option>
                                                                    <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines</option>
                                                                    <option value="Samoa"> Samoa</option><option value="San Marino"> San Marino</option>
                                                                    <option value="Sao Tome and Principe"> Sao Tome and Principe</option>
                                                                    <option value="Saudi Arabia"> Saudi Arabia</option><option value="Senegal"> Senegal</option>
                                                                    <option value="Serbia and Montenegro"> Serbia and Montenegro</option>
                                                                    <option value="Seychelles"> Seychelles</option>
                                                                    <option value="Sierra Leone"> Sierra Leone</option>
                                                                    <option value="Singapore"> Singapore</option>
                                                                    <option value="Slovakia"> Slovakia</option>
                                                                    <option value="Slovenia"> Slovenia</option>
                                                                    <option value="Solomon Islands"> Solomon Islands</option>

                                                                    <option value="Somalia"> Somalia</option>
                                                                    <option value="South Africa"> South Africa</option>
                                                                    <option value="Spain"> Spain</option><option value="Sri Lanka"> Sri Lanka</option>
                                                                    <option value="Sudan"> Sudan</option><option value="Suriname"> Suriname</option>
                                                                    <option value="Svalbard and Jan Mayen Islands"> Svalbard and Jan Mayen Islands</option>
                                                                    <option value="Swaziland"> Swaziland</option><option value="Sweden"> Sweden</option>
                                                                    <option value="Switzerland"> Switzerland</option><option value="Syria"> Syria</option>
                                                                    <option value="Taiwan"> Taiwan</option>
                                                                    <option value="Tajikistan"> Tajikistan</option>
                                                                    <option value="Tanzania"> Tanzania</option>
                                                                    <option value="Thailand"> Thailand</option>
                                                                    <option value="Togo"> Togo</option><option value="Tokelau"> Tokelau</option>
                                                                    <option value="Tonga"> Tonga</option>
                                                                    <option value="Trinidad and Tobago"> Trinidad and Tobago</option>
                                                                    <option value="Tunisia"> Tunisia</option><option value="Turkey"> Turkey</option>
                                                                    <option value="Turkmenistan"> Turkmenistan</option>
                                                                    <option value="Turks and Caicos Islands"> Turks and Caicos Islands</option>
                                                                    <option value="Tuvalu"> Tuvalu</option><option value="Uganda"> Uganda</option>
                                                                    <option value="Ukraine"> Ukraine</option>
                                                                    <option value="United Arab Emirates"> United Arab Emirates</option>
                                                                    <option value="United Kingdom"> United Kingdom</option>
                                                                    <option value="USA" selected=""> United States of America</option>
                                                                    <option value="Uruguay"> Uruguay</option>
                                                                    <option value="Uzbekistan"> Uzbekistan</option>
                                                                    <option value="Vanuatu"> Vanuatu</option><option value="Vatican City"> Vatican City</option><option value="Venezuela"> Venezuela</option>
                                                                    <option value="Vietnam"> Vietnam</option>
                                                                    <option value="Virgin Islands (British)"> Virgin Islands (British)</option>
                                                                    <option value="Virgin Islands (US)"> Virgin Islands (US)</option>
                                                                    <option value="Wallis and Futuna Islands"> Wallis and Futuna Islands</option>
                                                                    <option value="Western Sahara"> Western Sahara</option>
                                                                    <option value="Yemen"> Yemen</option><option value="Zaire"> Zaire</option>
                                                                    <option value="Zambia"> Zambia</option><option value="Zimbabwe"> Zimbabwe</option>
                                                                </select> -->
                                                            </div>
                                                        </div>

                                                        <button type="button" id="updateMap"
                                                                class="btn btn-info btn-rounded"> Update Map
                                                        </button>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <div id="googleMap" style="min-height:300px;"></div>
                                                    </div>
                                                </div>

                                                <legend class="heading-report">Phone, FAX, and e-mail address of Company
                                                    or Individual you are reporting:
                                                </legend>
                                                <ul>
                                                    <li>
                                                        <small>This information is not required, but they are good tools
                                                            for sympathetic Consumers to let the Company or Individual
                                                            know how they feel about what they did to you and will only
                                                            help your situation.
                                                        </small>
                                                    </li>
                                                    <li>
                                                        <small>This information may also be helpful to other victims
                                                            reading your RoR Report.
                                                        </small>
                                                    </li>
                                                    <li>
                                                        <small>The more information you provide, the better.</small>
                                                    </li>
                                                </ul>

                                                <div class="form-group m-top-lg row">
                                                    <label class="col-xs-3 control-label">Fax :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($steponedata))
                                                            <input type="text" class="form-control" name="steponefax"
                                                                   id="steponefax" value="{{$steponedata['fax']}}"/>
                                                        @else
                                                            <input type="text" class="form-control" name="steponefax"
                                                                   id="steponefax"/>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-xs-3 control-label">Phone :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($steponedata))
                                                            <input type="text" class="form-control" name="steponephone"
                                                                   id="steponephone" value="{{$steponedata['phone']}}"/>
                                                        @else
                                                            <input type="text" class="form-control" name="steponephone"
                                                                   id="steponephone"/>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="form-group m-bottom-lg row">
                                                    <label class="col-xs-3 control-label">E-mail address :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($steponedata))
                                                            <input type="email" class="form-control" name="steponeemail"
                                                                   id="steponeemail" value="{{$steponedata['email']}}"/>
                                                        @else
                                                            <input type="email" class="form-control" name="steponeemail"
                                                                   id="steponeemail"/>
                                                        @endif

                                                    </div>
                                                </div>

                                                <div class="text-right">
                                                    <button class="btn btn-success btn-outline-rounded green"
                                                            id="steponeform1" type="submit"> Continue <span
                                                                class="glyphicon glyphicon-send"
                                                                style="margin-left:10px;"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="2">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="" role="form" action="/admin/reportsteptwo" method="post">
                                                <h3 class="text-danger">Report Title and Category</h3>
                                                <legend class="heading-report">Title Your Rip-off Report:</legend>
                                                <small>The title of your report is divided into four boxes below but
                                                    will appear as one line after your report is submitted.
                                                </small>

                                                <h5><strong>Preview Report Title:</strong> <span
                                                            id="concatcompanyname"></span> <span
                                                            id="concatdescriptive"></span> <span id="concatcity"></span>
                                                    <span id="concatstate"></span></h5>

                                                <h5 class="m-top-lg"><span class="text-danger">A.</span> &nbsp; Enter
                                                    all the names of the Company or Individual you are reporting</h5>
                                                <small>Be sure to include AKAs.</small>

                                                <div class="form-group m-top-lg m-bottom-lg row">
                                                    <label class="col-xs-3 control-label">Name of Company or Individual
                                                        :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($sessiondata))
                                                            <input type="text" class="form-control"
                                                                   id="steptwocompanyname" name="steptwocompanyname"
                                                                   value="{!! $sessiondata['companyname'] !!} {!! $sessiondata['aka'] !!}"
                                                                   required/>
                                                        @endif
                                                        <i class="help-block">If the company name does not appear,
                                                            please enter.</i>
                                                    </div>
                                                </div>

                                                <h5 class="m-top-lg"><span class="text-danger">B.</span> &nbsp; Enter
                                                    Descriptive words to your title... to describe what the Company or
                                                    Individual did to you.</h5>
                                                <small>Be creative when using the example words, it will make your
                                                    report more interesting.
                                                </small>

                                                <div class="form-group m-top-lg m-bottom-lg row">
                                                    <label class="col-xs-3 control-label">Descriptive Words :</label>
                                                    <div class="col-xs-5">
                                                        <input type="text" class="form-control" id="steptwodescriptive"
                                                               name="steptwodescriptive" required/>
                                                        <i class="help-block">Please limit to 20 words, you can add
                                                            several phases and edit them too</i>
                                                    </div>
                                                </div>

                                                <h5 class="m-top-lg"><span class="text-danger">C.</span> &nbsp; Enter
                                                    the City where the Company or Individual is located</h5>
                                                <small>If the Company or Individual is on the Internet and only on-line
                                                    based, the city may be left blank
                                                </small>

                                                <div class="form-group m-top-lg m-bottom-lg row">
                                                    <label class="col-xs-3 control-label">City :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($sessiondata))
                                                            <input type="text" class="form-control" id="steptwocity"
                                                                   name="steptwocity"
                                                                   value="{!! $sessiondata['city'] !!}"/>
                                                        @endif
                                                        <i class="help-block">If the city name does not appear, please
                                                            enter.</i>
                                                    </div>
                                                </div>

                                                <h5 class="m-top-lg"><span class="text-danger">D.</span> &nbsp; Enter
                                                    the State where the Company or Individual is located</h5>
                                                <small>If the Company or Individual is on the Internet and only on-line
                                                    based, and you have entered a Web address in Step 1, you must enter
                                                    "Internet" or "Nationwide" in the State box. Additional States may
                                                    be added.
                                                </small>

                                                <div class="form-group m-top-lg m-bottom-lg row">
                                                    <label class="col-xs-3 control-label">State :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($sessiondata))
                                                            <input type="text" class="form-control" id="steptwostate"
                                                                   name="steptwostate"
                                                                   value="{!! $sessiondata['state'] !!}"/>
                                                        @endif
                                                        <i class="help-block">If the state name does not appear, please
                                                            enter.</i>
                                                    </div>
                                                </div>

                                                <legend class="heading-report">Categorize Your Ripoff Report::</legend>
                                                <small>First choose a topic, and then locate the best category that
                                                    suits your report.
                                                </small>

                                                <select class="form-control" name="steptwocategory" id="steptwocategory"
                                                        required>
                                                    <option selected disabled>Select Topic</option>
                                                    @if(isset($category))
                                                        @foreach ($category as $topic)
                                                            @if(isset($sessiontwodata))
                                                                @if($topic->category_id == $sessiontwodata['category'] )
                                                                    <option value="{{$topic->category_id}}"
                                                                            selected="">{{$topic->category_name}}</option>
                                                                @else
                                                                    <option value="{{$topic->category_id}}">{{$topic->category_name}}</option>
                                                                @endif
                                                            @else
                                                                <option value="{{$topic->category_id}}">{{$topic->category_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                <select class="form-control" name="steptwosubcategory"
                                                        id="steptwosubcategory" required>
                                                    <option selected disabled>Select Category</option>
                                                    @if(isset($subcategory))
                                                        @foreach ($subcategory as $sub)
                                                            @if(isset($sessiontwodata))
                                                                @if($sub->subcategory_id == $sessiontwodata['subcategory'] )
                                                                    <option value="{{$sub->subcategory_id}}"
                                                                            selected="">{{$sub->subcategory_name}}</option>
                                                                @else
                                                                    <option value="{{$sub->subcategory_id}}">{{$sub->subcategory_name}}</option>
                                                                @endif
                                                            @else
                                                                <option value="{{$sub->subcategory_id}}">{{$sub->subcategory_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>

                                                <div class="text-right">
                                                    <button class="btn btn-success btn-outline-rounded green"
                                                            type="submit"> Continue <span
                                                                class="glyphicon glyphicon-send"
                                                                style="margin-left:10px;"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="" role="form" action="/admin/reportstepthree" method="post">
                                                <h3 class="text-danger">Write Your Report</h3>
                                                <p>To help format our reports to be more easily read:</p>
                                                <p>PLEASE....</p>
                                                <br/>
                                                <p><span class="text-danger">DO NOT</span> use ALL CAPITAL LETTERS, it
                                                    makes it hard to read.</p>
                                                <p><span class="text-danger">DO NOT</span> indent paragraphs.</p>
                                                <p><span class="text-danger">DO NOT</span> write your report all in one
                                                    paragraph. Use 2 or 3 sentences to each paragraph and leave a space
                                                    between each paragraph.</p>
                                                <p><span class="text-danger">DO NOT</span> sign your name, or include
                                                    any e-mail addresses in the report.</p>
                                                <legend class="heading-report">Write your report in the following text
                                                    box:
                                                </legend>
                                                <div class="row m-top-md">
                                                    <div class="col-xs-2">
                                                        <p><span class="text-danger">DO NOT</span> sign your name, or
                                                            include any e-mail addresses in the report. Use the boxes
                                                            below to automatically put your <span class="text-danger">FIRST</span>
                                                            name, City and State at the very end of your Ripoff Report.
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-10">
                                                        @if(isset($stepthreesession))
                                                            <textarea class="editorDemo" name="stepthreereport"
                                                                      id="stepthreereport">{{$stepthreesession['report_text']}}</textarea>
                                                        @else
                                                            <textarea class="editorDemo" name="stepthreereport"
                                                                      id="stepthreereport"></textarea>
                                                        @endif
                                                    </div>
                                                </div>

                                                <legend class="heading-report">Did you use a Credit Card for this
                                                    Transaction?
                                                </legend>
                                                <small>Dear Consumer,</small>
                                                <br/>
                                                <small>There are special protections for you if you have used a credit
                                                    card, especially in an online transaction, including a federal law
                                                    called the Fair Credit Billing Act. To help you get all the consumer
                                                    protection you can get, RoR.com is collecting information about
                                                    whether or not you used a credit card in your situation.
                                                    Ripoffreport.com is NOT asking for your credit card number, we don’t
                                                    want it, and we are NOT charging you for anything! We only want to
                                                    know whether you used a credit card to help you get all the consumer
                                                    protection you can get.
                                                </small>
                                                <br/>
                                                <br/>
                                                <p>Did you use a Credit Card for this Transaction?</p>


                                                <input type="radio" id="stepthreecard" name="stepthreecard"
                                                       class="card_y" value="0"/> Yes, I did
                                                <br/>
                                                <input type="radio" id="stepthreecard" name="stepthreecard" value="1"
                                                       class="card_n" checked/> No, I did not (but thanks for asking!)

                                                <div class="c_card">
                                                    <p>Was this an online Transaction?</p>
                                                    <input type="radio" id="stepthreetransaction"
                                                           name="stepthreetransaction" class="transaction_y" value="0"/>
                                                    Yes this was online
                                                    <br/>
                                                    <input type="radio" id="stepthreetransaction"
                                                           name="stepthreetransaction" class="transaction_n" value="1"
                                                           checked/> No, this wasn't an online purchase
                                                </div>

                                                <div class="c_company">
                                                    <p>Which Credit Company was Involved?</p>
                                                    <input type="radio" id="stepthreecreditcompany"
                                                           name="stepthreecreditcompany" value="0"/> Discover
                                                    <br/>
                                                    <input type="radio" id="stepthreecreditcompany"
                                                           name="stepthreecreditcompany" value="1"/> Visa
                                                    <br/>
                                                    <input type="radio" id="stepthreecreditcompany"
                                                           name="stepthreecreditcompany" value="2"/> Mastercard
                                                    <br/>
                                                    <input type="radio" id="stepthreecreditcompany"
                                                           name="stepthreecreditcompany" value="3"/> American Express
                                                    <br/>
                                                    <input type="radio" id="stepthreecreditcompany"
                                                           name="stepthreecreditcompany" value="4"/> JCB
                                                    <br/>
                                                    <input type="radio" id="stepthreecreditcompany"
                                                           name="stepthreecreditcompany" value="5"/> Paypal
                                                    <br/>
                                                    <input type="radio" id="stepthreecreditcompany"
                                                           name="stepthreecreditcompany" value="6"/> Google Checkout
                                                    <br/>
                                                    <input type="radio" id="stepthreecreditcompany"
                                                           name="stepthreecreditcompany" value="7"/> Western Union
                                                    <br/>
                                                    <input type="radio" id="stepthreecreditcompany"
                                                           name="stepthreecreditcompany" value="8"/> Wire Transfer
                                                    <br/>
                                                    <input type="radio" id="stepthreecreditcompany"
                                                           name="stepthreecreditcompany" value="9"/> Other
                                                </div>


                                                <legend class="heading-report">Enter YOUR first name ONLY and your City
                                                    and State:
                                                </legend>
                                                <small>This will automatically place your display name, your City and
                                                    State at the very end of your report and will add credibility to
                                                    your RoR Report. If you are afraid of retaliation and/or would like
                                                    to remain anonymous, please change your first name, city, and state
                                                    here.
                                                </small>
                                                <div class="form-group m-top-lg row">
                                                    <label class="col-xs-3 control-label">Display name only :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($userdata))
                                                            <input type="text" class="form-control"
                                                                   id="stepthreedisplayname" name="stepthreedisplayname"
                                                                   value="{{$userdata->display_name}}" required/>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xs-3 control-label">City :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($userdata))
                                                            <input type="text" class="form-control" id="stepthreecity"
                                                                   name="stepthreecity" value="{{$userdata->city}}"
                                                                   required/>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xs-3 control-label">Country :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($userdata))
                                                            <input type="text" class="form-control"
                                                                   id="stepthreecountry" name="stepthreecountry"
                                                                   value="{{$userdata->country}}" required/>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="form-group m-bottom-lg row">
                                                    <label class="col-xs-3 control-label">State :</label>
                                                    <div class="col-xs-5">
                                                        @if(isset($userdata))
                                                            <select class="form-control" id="stepthreestate"
                                                                    name="stepthreestate" id="stepthreestate"
                                                                    value="{{$userdata->state}}">
                                                                <option selected disabled>Select State/Province</option>
                                                                <option value="Internet">Internet</option>
                                                                <option value="Nationwide">Nationwide</option>
                                                                <optgroup label="--- US States">
                                                                    <option value="Alabama"> Alabama</option>
                                                                    <option value="Alaska"> Alaska</option>
                                                                    <option value="Arizona"> Arizona</option>
                                                                    <option value="Arkansas"> Arkansas</option>
                                                                    <option value="California"> California</option>
                                                                    <option value="Colorado"> Colorado</option>
                                                                    <option value="Connecticut"> Connecticut</option>
                                                                    <option value="Delaware"> Delaware</option>
                                                                    <option value="Dist of Columbia"> Dist of Columbia
                                                                    </option>
                                                                    <option value="Florida"> Florida</option>
                                                                    <option value="Georgia"> Georgia</option>
                                                                    <option value="Hawaii"> Hawaii</option>
                                                                    <option value="Idaho"> Idaho</option>
                                                                    <option value="Illinois"> Illinois</option>
                                                                    <option value="Indiana"> Indiana</option>
                                                                    <option value="Iowa"> Iowa</option>
                                                                    <option value="Kansas"> Kansas</option>
                                                                    <option value="Kentucky"> Kentucky</option>
                                                                    <option value="Louisiana"> Louisiana</option>
                                                                    <option value="Maine"> Maine</option>
                                                                    <option value="Maryland"> Maryland</option>
                                                                    <option value="Massachusetts"> Massachusetts
                                                                    </option>
                                                                    <option value="Michigan"> Michigan</option>
                                                                    <option value="Minnesota"> Minnesota</option>
                                                                    <option value="Mississippi"> Mississippi</option>
                                                                    <option value="Missouri"> Missouri</option>
                                                                    <option value="Montana"> Montana</option>
                                                                    <option value="Nebraska"> Nebraska</option>
                                                                    <option value="Nevada"> Nevada</option>
                                                                    <option value="New Hampshire"> New Hampshire
                                                                    </option>
                                                                    <option value="New Jersey"> New Jersey</option>
                                                                    <option value="New Mexico"> New Mexico</option>
                                                                    <option value="New York"> New York</option>
                                                                    <option value="North Carolina"> North Carolina
                                                                    </option>
                                                                    <option value="North Dakota"> North Dakota</option>
                                                                    <option value="Ohio"> Ohio</option>
                                                                    <option value="Oklahoma"> Oklahoma</option>
                                                                    <option value="Oregon"> Oregon</option>
                                                                    <option value="Pennsylvania"> Pennsylvania</option>
                                                                    <option value="Rhode Island"> Rhode Island</option>
                                                                    <option value="South Carolina"> South Carolina
                                                                    </option>
                                                                    <option value="South Dakota"> South Dakota</option>
                                                                    <option value="Tennessee"> Tennessee</option>
                                                                    <option value="Texas"> Texas</option>
                                                                    <option value="Utah"> Utah</option>
                                                                    <option value="Vermont"> Vermont</option>
                                                                    <option value="Virginia"> Virginia</option>
                                                                    <option value="Washington"> Washington</option>
                                                                    <option value="West Virginia"> West Virginia
                                                                    </option>
                                                                    <option value="Wisconsin"> Wisconsin</option>
                                                                    <option value="Wyoming"> Wyoming</option>
                                                                </optgroup>
                                                                <option value="Other">--- Other</option>
                                                                <optgroup label="--- Canadian Provinces">
                                                                    <option value="Alberta">Alberta</option>
                                                                    <option value="British Columbia">British Columbia
                                                                    </option>
                                                                    <option value="Manitoba">Manitoba</option>
                                                                    <option value="New Brunswick">New Brunswick</option>
                                                                    <option value="New Foundland">New Foundland</option>
                                                                    <option value="NorthWest Territories">Northwest
                                                                        Territories
                                                                    </option>
                                                                    <option value="Nova Scotia">Nova Scotia</option>
                                                                    <option value="Ontario">Ontario</option>
                                                                    <option value="Prince Edward Island">Prince Edward
                                                                        Island
                                                                    </option>
                                                                    <option value="Quebec">Quebec</option>
                                                                    <option value="Saskatchewan">Saskatchewan</option>
                                                                    <option value="Yukon">Yukon</option>
                                                                </optgroup>
                                                            </select>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="text-right">
                                                    <button class="btn btn-success btn-outline-rounded green"
                                                            type="submit"> Continue <span
                                                                class="glyphicon glyphicon-send"
                                                                style="margin-left:10px;"></span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="4">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <h3 class="text-danger">(Optional) Add documents to your RoR Report</h3>
                                            <legend class="heading-report">Please ensure that any photos or videos that
                                                you are uploading do not contain any of the generally prohibited items
                                                outlined in:
                                            </legend>
                                            <strong><a href="javascript:;"> Section 2 of the Terms of
                                                    Service. </a></strong>

                                            <legend class="heading-report">What would you like to attach?</legend>
                                            <div class="form-group m-left-lg m-bottom-lg row">
                                                <input type="radio" name="upload" class="photo_y" checked/> &nbsp;
                                                &nbsp; Upload an Image
                                                <br/>
                                                <input type="radio" name="upload" class="video_y"/> &nbsp; &nbsp; Upload
                                                a Video
                                                <br/>
                                                <input type="radio" name="upload" class="youtube_y"/> &nbsp; &nbsp;
                                                Attach a YouTube Video
                                            </div>


                                            <form id="photo_form" class="media_form" role="form"
                                                  action="/admin/uploadimage" method="post"
                                                  enctype="multipart/form-data">
                                                <strong>How to upload an Image: </strong><br/>
                                                <small>Photos are optional. If you have photos or images that you would
                                                    like to add to your report you can upload them now. Click Browse to
                                                    find a picture on your computer and then click upload to add the
                                                    photo to your report.
                                                </small>
                                                <br/>
                                                <br/>
                                                <small>Don't have photos handy? No problem, you can add them to your
                                                    report later.
                                                </small>
                                                <br/>
                                                <small><b>NOTICE: Do not post an image or video that was created by
                                                        someone other than you unless you have permission from the
                                                        photographer or creator to post it. Please refer to our Terms of
                                                        Use regarding violation of the intellectual property rights of
                                                        others. If you have any trouble at all uploading your photos,
                                                        please email us for support and include your photos with a
                                                        caption for each photo you include.</b> <i>Send your email to <a
                                                                href="javascript:;">support@rorreport.com</a></i>
                                                </small>
                                                <div class="form-group m-top-lg row">
                                                    <label class="col-xs-3 control-label">Photo File :</label>
                                                    <div class="col-xs-5">
                                                        <input type="file" class="form-control" id="photo" name="photo"
                                                               style="height:inherit;" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xs-3 control-label">Caption :</label>
                                                    <div class="col-xs-5">
                                                        <textarea class="form-control" id="stepfourphotocaption"
                                                                  name="stepfourcaption" required></textarea>
                                                        <br/>
                                                        <button type="submit" class="btn btn-primary">Upload your
                                                            Image
                                                        </button>
                                                        <br/>
                                                        <small><i>Supported files include: png, jpg, jpeg, gif, tif </i>
                                                        </small>
                                                        <small><i>If you dont see your file format please email <a
                                                                        href="javascript:;"> support@rorreport
                                                                    .com</a></i></small>
                                                        <small><i>To upload a PDF or Audio file please email <a
                                                                        href="javascript:;"> support_media@rorreport
                                                                    .com</a></i></small>
                                                    </div>
                                                </div>
                                            </form>
                                            <form id="video_form" class="media_form" role="form"
                                                  action="/admin/uploadvideo" method="post"
                                                  enctype="multipart/form-data">
                                                <strong>How to upload a Video:</strong><br/>

                                                <small>Attachments are optional. If you have videos that you would like
                                                    to add to your report you can upload them now. Click Browse to find
                                                    a video on your computer and then click upload to add the video to
                                                    your report.
                                                </small>
                                                <br/>
                                                <br/>

                                                <small>Don't have videos handy? No problem, you can add them to your
                                                    report later.
                                                </small>
                                                <br/>
                                                <small><b>NOTICE: Do not post an image or video that was created by
                                                        someone other than you unless you have permission from the
                                                        photographer or creator to post it. Please refer to our Terms of
                                                        Use regarding violation of the intellectual property rights of
                                                        others. If you have any trouble at all uploading your videos,
                                                        please email us for support and include your videos with a
                                                        caption for each video you include. </b> <i>Send your email to
                                                        <a href="javascript:;">support@rorreport.com</a></i></small>

                                                <div class="form-group m-top-lg row">
                                                    <label class="col-xs-3 control-label">Video File :</label>
                                                    <div class="col-xs-5">
                                                        <input type="file" class="form-control" id="video" name="video"
                                                               style="height:inherit;" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xs-3 control-label">Caption :</label>
                                                    <div class="col-xs-5">
                                                        <textarea class="form-control" id="stepfourvideocaption"
                                                                  name="stepfourvideocaption" required></textarea>
                                                        <br/>
                                                        <button type="submit" class="btn btn-primary">Upload your
                                                            Video
                                                        </button>
                                                        <br/>
                                                        <!--<small><i>Supported files include:3gp, asf, avi, dv, flv, mov, mp4, mpg, mpeg, mpeg2, ogg, pcm, rm, vob, wav, webm </i></small>-->
                                                        <small><i>Supported files include:3gp, mp4, ogg, webm </i>
                                                        </small>
                                                        <small><i>If you dont see your file format please email <a
                                                                        href="javascript:;"> support@rorreport
                                                                    .com</a></i></small>
                                                        <small><i>To upload a PDF or Audio file please email <a
                                                                        href="javascript:;"> support_media@rorreport
                                                                    .com</a></i></small>
                                                    </div>
                                                </div>
                                            </form>
                                            <form id="youtube_form" class="media_form" role="form"
                                                  action="/admin/uploadyoutube" method="post"
                                                  enctype="multipart/form-data">
                                                <strong>How to attach a youtube Video:</strong><br/>

                                                <small><b>NOTICE: Do not post an image or video that was created by
                                                        someone other than you unless you have permission from the
                                                        photographer or creator to post it. Please refer to our Terms of
                                                        Use regarding violation of the intellectual property rights of
                                                        others. If you have any trouble at all uploading your videos,
                                                        please email us for support and include your videos with a
                                                        caption for each video you include. </b> <i>Send your email to
                                                        <a href="javascript:;">support@rorreport.com</a></i></small>


                                                <div class="form-group m-top-lg row">
                                                    <label class="col-xs-3 control-label">Youtube :</label>
                                                    <div class="col-xs-5">
                                                        <input t
                                                               ype="input" class="form-control" id="stepfouryoutube"
                                                               name="stepfouryoutube" style="height:inherit;" required/>
                                                        <br/>
                                                        <button type="submit" class="btn btn-primary">Upload You Tube
                                                        </button>
                                                    </div>
                                                </div>

                                            </form>
                                            <strong class="text-danger">Just click continue if you don't have anything
                                                to upload </strong>
                                            <legend class="heading-report">Report Attachment:</legend>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <small>THe following documents will be attached with your RoR
                                                        reports
                                                    </small>
                                                </div>

                                                <div class="col-md-9">
                                                    <table class="table table-responsive">
                                                        <thead>
                                                        <tr>
                                                            <th>Type</th>
                                                            <th>Preview</th>
                                                            <th>Caption</th>
                                                            <th>Name</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @if(isset($reportfiledata))
                                                            @if($reportfiledata)
                                                                @foreach($reportfiledata as $data)

                                                                    <tr>
                                                                        <td>

                                                                            <?php
                                                                            if ($data->file_type == "0")
                                                                                echo "Photo";
                                                                            else if ($data->file_type == "1")
                                                                                echo "Video";
                                                                            else if ($data->file_type == "2")
                                                                                echo "Youtube";
                                                                            else
                                                                                echo "";
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php if ($data->file_type == 0) { ?>
                                                                            <img class="img-130"
                                                                                 src="{{$data->file_path}}"/>
                                                                            <?php } else if ($data->file_type == 1) { ?>
                                                                                    <!--<img class='img-130' src='/assets/images/video.png' />-->
                                                                            <video controls width="228">
                                                                                <source src="{{$data->file_path}}"
                                                                                        type="video/webm">
                                                                                <source src="{{$data->file_path}}"
                                                                                        type="video/ogg">
                                                                                <source src="{{$data->file_path}}"
                                                                                        type="video/mp4">
                                                                                <source src="{{$data->file_path}}"
                                                                                        type="video/3gp">
                                                                                Your browser does not support HTML5
                                                                                video.
                                                                            </video>
                                                                            <?php } else if ($data->file_type == 2) { ?>
                                                                            <a href="{{$data->file_path}}"
                                                                               target="_blank"><img class='img-130'
                                                                                                    src='/assets/images/youtube.png'/></a>
                                                                            <?php } ?>


                                                                        </td>
                                                                        <td>{{$data->caption}}</td>
                                                                        <td class='overflow-text'><p
                                                                                    title="{{$data->name}}">{{$data->name}}</p>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        @endif

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="text-right">
                                                <button class="btn btn-success btn-outline-rounded green"
                                                        id="stepfoursubmit"> Continue <span
                                                            class="glyphicon glyphicon-send"
                                                            style="margin-left:10px;"></span></button>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="" role="form" action="/admin/reportstepfive" method="post">
                                                <h3 class="text-danger">Submit your Report</h3>

                                                <legend class="heading-report">Terms and Conditions:</legend>
                                                <div class="terms">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading">
                                                            <div class="title"><b>About Us: Terms of Service</b></div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <legend class="heading-report">1. RoR Report Membership/User
                                                                Terms &amp; Conditions:
                                                            </legend>
                                                            <p>To use this service, you must be at least 14 years
                                                                old.</p>

                                                            <p>www.RipoffReport.com ("ROR") is an online forum created
                                                                to help give consumers a voice and keep consumers
                                                                informed. ROR is operated by Xcentric Ventures, L.L.C.
                                                                located at:</p>

                                                            <p>Xcentric Ventures, LLC
                                                                <br/> Ripoff Report
                                                                <br/> P.O. Box 310
                                                                <br/> Tempe, AZ 85280
                                                                <br/> Tel.: (602) 359-4357</p>

                                                            <p>Questions/comments regarding technical issues, editorial
                                                                issues, inquiries about any of the paid programs offered
                                                                through ROR or other general questions should be sent to
                                                                our Customer Service and Support Department by
                                                                e-mailing: support@ripoffreport.com.</p>

                                                            <p>Questions/comments regarding legal issues that directly
                                                                involve or affect ROR should be sent to our Legal
                                                                Department by e-mailing: legal@ripoffreport.com.</p>

                                                            <p>This is a legal agreement ("Agreement") between you
                                                                (“you�? or “yours�? or “users�?) and Xcentric Ventures,
                                                                LLC ("Xcentric" or “we�? or “us�? or “our�?). Please
                                                                read the Agreement carefully before registering for ROR.
                                                                By registering for ROR, you agree to be bound by the
                                                                terms and conditions of this Agreement (the "Terms"). If
                                                                you do not agree to the Terms, including our Privacy
                                                                Policy (incorporated into this Agreement by this
                                                                reference) without limitation or qualification, you are
                                                                not permitted to use ROR. To review, click on Privacy
                                                                Policy.</p>

                                                            <p>Persons who are under 14 years old may not register for
                                                                ROR. By registering with ROR, you represent and warrant
                                                                that you are at least 14 years old.</p>

                                                            <p>Xcentric reserves the right to immediately suspend or
                                                                terminate your registration with ROR, without notice,
                                                                upon any breach of this Agreement by you which is
                                                                brought to Xcentric's attention.</p>

                                                            <p>Your registration with ROR is for your sole, personal
                                                                use. You may not authorize others to use your user
                                                                identification and password, and you may not assign or
                                                                otherwise transfer your account to any other person or
                                                                entity.</p>

                                                            <legend class="heading-report">1. RoR Report Membership/User
                                                                Terms &amp; Conditions:
                                                            </legend>
                                                            <p>To use this service, you must be at least 14 years
                                                                old.</p>

                                                            <p>www.RipoffReport.com ("ROR") is an online forum created
                                                                to help give consumers a voice and keep consumers
                                                                informed. ROR is operated by Xcentric Ventures, L.L.C.
                                                                located at:</p>

                                                            <p>Xcentric Ventures, LLC
                                                                <br/> Ripoff Report
                                                                <br/> P.O. Box 310
                                                                <br/> Tempe, AZ 85280
                                                                <br/> Tel.: (602) 359-4357</p>

                                                            <p>Questions/comments regarding technical issues, editorial
                                                                issues, inquiries about any of the paid programs offered
                                                                through ROR or other general questions should be sent to
                                                                our Customer Service and Support Department by
                                                                e-mailing: support@ripoffreport.com.</p>

                                                            <p>Questions/comments regarding legal issues that directly
                                                                involve or affect ROR should be sent to our Legal
                                                                Department by e-mailing: legal@ripoffreport.com.</p>

                                                            <p>This is a legal agreement ("Agreement") between you
                                                                (“you�? or “yours�? or “users�?) and Xcentric Ventures,
                                                                LLC ("Xcentric" or “we�? or “us�? or “our�?). Please
                                                                read the Agreement carefully before registering for ROR.
                                                                By registering for ROR, you agree to be bound by the
                                                                terms and conditions of this Agreement (the "Terms"). If
                                                                you do not agree to the Terms, including our Privacy
                                                                Policy (incorporated into this Agreement by this
                                                                reference) without limitation or qualification, you are
                                                                not permitted to use ROR. To review, click on Privacy
                                                                Policy.</p>

                                                            <p>Persons who are under 14 years old may not register for
                                                                ROR. By registering with ROR, you represent and warrant
                                                                that you are at least 14 years old.</p>

                                                            <p>Xcentric reserves the right to immediately suspend or
                                                                terminate your registration with ROR, without notice,
                                                                upon any breach of this Agreement by you which is
                                                                brought to Xcentric's attention.</p>

                                                            <p>Your registration with ROR is for your sole, personal
                                                                use. You may not authorize others to use your user
                                                                identification and password, and you may not assign or
                                                                otherwise transfer your account to any other person or
                                                                entity.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group m-top-lg m-left-lg">
                                                    <input type="checkbox" id="stepfivetc" name="stepfivetc" required/>
                                                    I have read, understood, and agreed to Ripoff Report’s Terms of
                                                    Service. By posting the Report/Update/Rebuttal (hereafter the
                                                    “Post�?) I attest that this Post is valid and in compliance with the
                                                    Online Conduct and other requirements set forth in the Terms of
                                                    Service. I am giving Ripoff Report Irrevocable rights to post this
                                                    Post on the website and granting Ripoff Report’s operator an
                                                    irrevocable exclusive worldwide license to use, copy, display, and
                                                    sublicense the content and prepare derivative works. I acknowledge
                                                    that once I submit my Post, the Post cannot later be edited by me,
                                                    nor will it be removed, even at my request. I understand that I can
                                                    update my Post to reflect new developments and/or changes in my
                                                    position by clicking on UPDATE. Further, I agree that the state of
                                                    Arizona has exclusive jurisdiction over any disputes between me and
                                                    the operator of Ripoff Report arising out of this Post.
                                                </div>

                                                <legend class="heading-report">Contact me if there is an
                                                    investigation:
                                                </legend>
                                                <div class="form-group m-top-lg m-left-lg">
                                                    <input type="checkbox" id="stepfivecontact" name="stepfivecontact"/>
                                                    I am willing to be contacted by the media, a consumer advocate,
                                                    lawyer or government authority to help further my cause or to help
                                                    with an investigation against the business or individual I am
                                                    reporting.
                                                </div>

                                                <div class="text-right">
                                                    <button class="btn btn-success btn-outline-rounded green"
                                                            type="submit"> Submit <span class="glyphicon glyphicon-send"
                                                                                        style="margin-left:10px;"></span></a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrap -->
    </div>
    <!-- End Main Container -->

    <!-- Start Footer -->
    <footer class="footer">
        &copy; 2016. <b>RoR Admin</b>.
    </footer>
    <!-- End Footer -->
    @endsection
    @section('modalcontent')
            <!-- Start Modal -->
    <div class="modal modal-scale fade" id="showEventModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title font-header text-dark">All Event</h4>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-main">Add</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- End Modal -->
    @endsection
            <!-- /.wrapper -->


@section('pagescript')



    <script>
        $(document).ready(function () {
            var query = window.location.search.substring(1);
            var vars = query.split("=");
            var stepno = vars[1];
            if (vars[0] == "step") {
                $("#tabs" + stepno).trigger('click');
            }
            $('.editorDemo').summernote();
            $('.card_y').click(function () {
                this.checked ? $('.c_card').show(1000) : $('.c_card').hide(1000);
            });
            $('.card_n').click(function () {
                this.checked ? $('.c_card').hide(1000) : $('.c_card').show(1000);
            });

            $('.transaction_y').click(function () {
                this.checked ? $('.c_company').show(1000) : $('.c_company').hide(1000);
            });
            $('.transaction_n').click(function () {
                this.checked ? $('.c_company').hide(1000) : $('.c_company').show(1000);
            });


            $('.physical').click(function () {
                this.checked ? $('.physical_y').show(1000) : $('.physical_y').hide(1000);
            });
            $('.national').click(function () {
                this.checked ? $('.physical_y').hide(1000) : $('.physical_y').show(1000);
            });
            $('.internet').click(function () {
                this.checked ? $('.physical_y').hide(1000) : $('.physical_y').show(1000);
            });


            $('.photo_y').click(function () {
                $(".media_form").hide();
                this.checked ? $('#photo_form').show('fast') : $('#photo_form').hide('fast');
            });
            $('.video_y').click(function () {
                $(".media_form").hide();
                this.checked ? $('#video_form').show('fast') : $('#video_form').hide('fast');
            });
            $('.youtube_y').click(function () {
                $(".media_form").hide();
                this.checked ? $('#youtube_form').show('fast') : $('#youtube_form').hide('fast');
            });


            var initsteptwocompanyname = $("#steptwocompanyname").val();
            var initsteptwocity = $("#steptwocity").val();
            var initsteptwostate = $("#steptwostate").val();
            $("#concatcompanyname").html(initsteptwocompanyname);
            $("#concatcity").html(initsteptwocity);
            $("#concatstate").html(initsteptwostate);


            $('#steptwocompanyname').on("input", function () {
                var dInput = $(this).val();
                $("#concatcompanyname").html(dInput);
            });
            $('#steptwodescriptive').on("input", function () {
                var dInput = $(this).val();
                $("#concatdescriptive").html(dInput);
            });
            $('#steptwocity').on("input", function () {
                var dInput = $(this).val();
                $("#concatcity").html(dInput);
            });
            $('#steptwostate').on("input", function () {
                var dInput = $(this).val();
                $("#concatstate").html(dInput);
            });


            $('#steptwocategory').on('change', function () {
                console.log($(this).val());
                var categoryid = $(this).val();
                $.ajax({
                    url: '/admin/ajaxaction',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        method: "getsubcategory",
                        categoryid: categoryid
                    },
                    success: function (response) {
                        console.log(response);
                        $('#steptwosubcategory').html('');
                        $('#steptwosubcategory').append('<option selected disabled>Select Category</option>');
                        $.each(response, function (index, value) {
                            $('#steptwosubcategory').append('<option value="' + value.subcategory_id + '">' + value.subcategory_name + '</option>');
                        });
                    }
                }); //End of  ajax
            });
            $('#stepfoursubmit').on('click', function () {
                console.log("called")
                document.location = "/admin/filereport?step=5";

            });
            $('#steponeform').on('click', function () {
                console.log("called")
                //Showing wait mode till result not will be come
                var steponecompanyname = $("#steponecompanyname").val();
                var steponeakaname = $("#steponeakaname").val();
                var steponewebaddress = $("#steponewebaddress").val();
                var steponelocationtype = $("#steponelocationtype").val();
                if (steponelocationtype != 0) {
                    var steponestate = "Internet only";
                    var steponecity = "";
                    var steponestreet = "";
                    var steponecountry = "";
                    var steponezip = "";
                }
                else {
                    var steponestreet = $("#steponestreet").val();
                    var steponecity = $("#steponecity").val();
                    var steponestate = $("#steponestate").val();
                    var steponecountry = $("#steponecountry").val();
                    var steponezip = $("#steponezip").val();
                }
                var steponefax = $("#steponefax").val();
                var steponephone = $("#steponephone").val();
                var steponeemail = $("#steponeemail").val();
                $.ajax({
                    url: '/admin/filereport',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        steponecompanyname: steponecompanyname,
                        steponeakaname: steponeakaname,
                        steponewebaddress: steponewebaddress,
                        steponelocationtype: steponelocationtype,
                        steponestate: steponestate,
                        steponecity: steponecity,
                        steponestreet: steponestreet,
                        steponecountry: steponecountry,
                        steponezip: steponezip,
                        steponestate: steponestate,
                        steponefax: steponefax,
                        steponephone: steponephone,
                        steponeemail: steponeemail

                    },
                    success: function (response) {
                        //                        response = $.parseJSON(response);
                        console.log(response);

                    }
                }); //End of  ajax
            });
            $('#steponestreet').on("input", function () {
                var dInput = $(this).val();
                console.log(dInput)
                geoLocation(dInput);
            });
            $('#steponecity').on("input", function () {
                var dInput = $(this).val();
                console.log(dInput)
                geoLocation(dInput);
            });
            $('#steponestate').on("change", function () {
                var dInput = $(this).val();
                console.log(dInput)
                geoLocation(dInput);
            });
            $('#steponezip').on("input", function () {
                var dInput = $(this).val();
                console.log(dInput)
                geoLocation(dInput);
            });
            $('#steponecountry').on("change", function () {
                var dInput = $(this).val();
                console.log(dInput)
                geoLocation(dInput);
            });
            $('#updateMap').on("click", function () {
                console.log("sd")
                var street = $("#steponestreet").val();
                var city = $("#steponecity").val();
                var state = $("#steponestate").val();
                var zip = $("#steponezip").val();
                var country = $("#steponecountry").val();
                var dInput = city + " " + state + " " + country;
                console.log(dInput)
                geoLocation(dInput);
            });

        });
    </script>
    <script>
        function geoLocation(address) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({'address': address}, function (results, status) {
                console.log(google.maps.GeocoderStatus);
                if (status == google.maps.GeocoderStatus.OK) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();
                    console.log(latitude, longitude);
                    googleMap(latitude, longitude);
                }

            });
        }


        function googleMap(lat, log) {
            var myLatLng = {lat: lat, lng: log};

            var map = new google.maps.Map(document.getElementById('googleMap'), {
                zoom: 8,
                center: myLatLng
            });

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: ''
            });

        }
        googleMap(51.508742, -0.120850);
        //    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@endsection

