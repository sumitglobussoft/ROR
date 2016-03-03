@extends('User/Layouts/userlayout')

@section('title', 'Home')

@section('usercontent')
    <style>
        .error {
            color: red;
        }

        .form-control.error {
            color: #000 !important;
        }
    </style>
    <!-- Dashboard Wrapper Start -->
    <div class="dashboard-wrapper-lg" style="min-height: auto; padding: 100px 20px;">

        <!-- Row starts -->
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <form class="" role="form" action="/profile" method="post" id="user_Profile_form">
                    <div class="row">

                        <b><strong> My Profile </strong></b><br/>

                        Use this form to change your password, e-mail and other personal information. By default, your
                        password is not displayed, and doesn't need to be entered to save your settings. Your password
                        only needs to be supplied, if you are changing it.

                        <div class="form-group">


                            <label class="control-label">User Name :</label>
                            <input type="text" class="form-control" name="full_name" id="full_name"
                                   value="{{$UserData->full_name}}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Full Name :</label>
                            <input type="text" class="form-control" name="display_name" id="display_name"
                                   value="{{$UserData->display_name}}"
                            />
                        </div>

                        <div class="form-group">
                            <label class="control-label">Email :</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   value="{{$UserData->email}}"/>
                        </div>

                        {{--<div class="form-group">--}}
                        {{--<label class="control-label">Password :</label>--}}
                        {{--<input type="password" class="form-control" name="password"  id="password" />--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                        {{--<label class="control-label">Confirm Password :</label>--}}
                        {{--<input type="password" class="form-control" name="confirmpassword"--}}
                        {{--id="confirmpassword" />--}}
                        {{--</div>--}}

                        <div class="form-group">
                            <label class="control-label">Address :</label>
                            <input type="text" class="form-control" name="address" id="address"
                                   value="{{$UserData->address}}"/>
                        </div>

                        {{--<div id="divCountry" style="padding:0;" class="form-group">--}}
                        {{--<label class="control-label">Select Country</label>--}}

                        {{--<select name="country1" class="countries form-control mb-5" id="countryId">--}}
                        {{--<option value="">Select Country</option>--}}
                        {{--</select>--}}
                        {{--<input type="text" name="country" value="" id="country2" hidden/>--}}

                        {{--</div>--}}

                        {{--<div class="form-group ">--}}
                        {{--<label class="control-label">Country :</label>--}}
                        {{--<select name="country" id="country" class="form-control country">--}}
                        {{--<option value="">Select a country</option>--}}
                        {{--@foreach($resultCountry as $etKey => $etVal)--}}
                        {{--<option @if($UserData->country==$etVal->name) selected @endif--}}
                        {{--value="{{$etVal->location_id}}">{{$etVal->name}}</option>--}}
                        {{--@endforeach--}}
                        {{--</select>--}}

                        {{--</div>--}}
                        {{--<div class="form-group ">--}}
                        {{--<label class="control-label">Select State :</label>--}}

                        {{--<select class="form-control state" id="state" name="state">--}}
                        {{--<option value="">Select State</option>--}}
                        {{--</select>--}}

                        {{--</div>--}}

                        <div class="form-group">
                            <label class="control-label">Country :</label>
                            <input type="text" class="form-control" name="country" id="country"
                                   value="{{$UserData->country}}"/>
                        </div>
                        <div class="form-group">
                            <label class="control-label">State :</label>
                            <input type="text" class="form-control" name="state" id="state"
                                   value="{{$UserData->state}}"/>
                        </div>

                        <div class="form-group">
                            <label class="control-label">City :</label>
                            <input type="text" class="form-control" name="city" id="city"
                                   value="{{$UserData->city}}"/>
                        </div>


                        <div class="form-group">
                            <label class="control-label">ZIP :</label>
                            <input type="text" class="form-control" name="zipcode" id="zipcode" maxlength="6"
                                   value="{{$UserData->zipcode}}"/>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Primary Phone :</label>
                            <input type="text" class="form-control" name="primary_phone" id="primary_phone"
                                   value="{{$UserData->primary_phone}}"
                            />
                        </div>

                        <div class="form-group">
                            <label class="control-label">Alternate Phone :</label>
                            <input type="text" class="form-control" name="alternate_phone" id="alternate_phone"
                                   value="{{$UserData->alternate_phone}}"
                            />
                        </div>


                        <h2>User Preferences</h2>
                        <div class="fileReportContainer">
                            <div class="bodyIndent" style="padding:0;"><p>
                                    <input name="contact_investigate" type="checkbox" id="fbi_contact"
                                           class="link alignLeft"
                                           <?php     if($UserData->contact_investigate == 1) {?>
                                           checked="checked"
                                           <?php }?> value="1"
                                    />
                                    <label for="contact_investigate">I am willing to be contacted by the media,
                                        a consumer advocate, lawyer or government authority to help further my
                                        cause or to help with an investigation against the business or
                                        individual I am reporting.</label>
                                </p>
                                <p><input name="contact_lawyer" type="checkbox" id="contact_lawyer"
                                          class="link alignLeft"
                                          <?php if($UserData->contact_lawyer == 1){ ?>
                                          checked="checked"
                                          <?php } ?> value="1"/>
                                    <label for="contact_lawyer">Send me the contact information if a lawyer is
                                        interested in my particular case or is possibly starting a class-action
                                        lawsuit.</label>
                                </p>
                                <p>
                                    <input name="notify_report" type="checkbox" id="notify_report"
                                           class="link alignLeft"
                                           <?php if($UserData->notify_report == 1){ ?>
                                           checked="checked"
                                           <?php } ?>

                                           value="1"/> <label
                                            for="notify_report">Notify me when someone files a rebuttal or
                                        consumer comment to my report. Note: If multiple rebuttals are made in
                                        one day you will receive multiple e-mails.</label>
                                </p>
                                <p>
                                    <input name="notify_comment" type="checkbox" id="notify_comment"
                                           class="link alignLeft"
                                           <?php if($UserData->notify_comment == 1){ ?>
                                           checked="checked"
                                           <?php } ?>
                                           value="1"/>
                                    <label for="notify_comment">Notify me when someone files a rebuttal or
                                        consumer comment to a rebuttal I have filed on a report. Note: If
                                        multiple rebuttals are made in one day you will receive multiple
                                        e-mails.</label></p>
                                <p><input name="contact_ror" type="checkbox" id="contact_ror"
                                          class="link alignLeft"
                                          <?php if($UserData->contact_ror == 1){ ?>
                                          checked="checked"
                                          <?php } ?>
                                          value="1"/> <label
                                            for="contact_ror">Send me e-mail from Ripoff Report about my
                                        categories of interest, special events, newsletters, or other notices.
                                        Note: This is for Ripoff Report branded communications only as Ripoff
                                        Report does NOT rent or sell your personal information to 3rd parties
                                        for their marketing purposes.</label></p></div>
                        </div>


                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Update my account</button>
                        </div>


                    </div>
                </form>
            </div>
        </div>
        <!-- Row End -->

    </div>
    <!-- Dashboard Wrapper End -->



    {{--</div>--}}
    {{--</div>--}}
            <!-- Main Container end -->

@endsection

@section('pagescript')

    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <script src="//code.jquery.com/jquery-1.9.1.js"></script>

    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

    <script>

        $(document).ready(function () {
            jQuery.validator.addMethod("accept", function (value, element, param) {
                return value.match(new RegExp("." + param + "$"));

            });

            $('#user_Profile_form').validate({


                doNotHideMessage: true,
                rules: {

                    full_name: {
                        required: true
                    },
                    display_name: {
                        required: true

                    },
                    email: {
                        required: true

                    },

                },
                messages: {

                    full_name: {
                        required: "please enter full name",
                        accept: "Enter only letters"
                    },
                    display_name: {
                        required: "please enter display name",
                        accept: "Enter only letters"
                    },
                    email: {
                        required: "enter a valid email id"
                    },
                }
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            $('.country').change(function () {
                var country_id = $(this).val();
                $.ajax({
                    url: '/location-ajax-handler',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        method: 'Country',
                        country_id: country_id,

                    },
                    beforeSend: function () {

                    },
                    success: function (response) {

                        $('#state').empty();
//                    response = $.parseJSON(response);
                        console.log(response);
                        if (response != '') {
                            var appendState = '<option value="">Select State</option>';
                            $.each(response, function (index, value) {
                                appendState += '<option value="' + value['name'] + '">' + value['name'] + '</option>';
                            });
                            $('#state').append(appendState);
                        } else {
                            $('#state').append('<option value="">No State found</option>');
                        }

                    }
                });
            });

            var country_id = 100;
            console.log(country_id)
            $.ajax({
                url: '/location-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'Country',
                    country_id: country_id,

                },
                beforeSend: function () {

                },
                success: function (response) {

                    $('#state').empty();
//                    response = $.parseJSON(response);
                    var selectedState = '{{$UserData->state}}';
                    console.log(selectedState);
                    console.log(response);
                    if (response != '') {
                        var appendState = '<option value="">Select State</option>';
                        $.each(response, function (index, value) {
                            appendState += '<option value="' + value['name'] + '" ' + ((selectedState == value['name']) ? 'selected' : '') + '>' + value['name'] + '</option>';
                        });
                        $('#state').append(appendState);
                    } else {
                        $('#state').append('<option value="">No State found</option>');
                    }

                }
            });
        });
    </script>
@endsection












