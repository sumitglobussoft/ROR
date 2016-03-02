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
            <div class="col-md-12">
                <form class="" role="form" action="/changepassword" method="post" id="changed_password_form">
                    <div class="row">

                        <div class="col-md-4 col-md-offset-3">


                            <div class="form-group">
                                <label class="control-label">New Password :</label>
                                <input type="password" class="form-control" name="new_password"  id="new_password" />
                            </div>

                            <div class="form-group">
                                <label class="control-label">Confirm Password :</label>
                                <input type="password" class="form-control" name="confirm_password"
                                       id="confirm_password" />
                            </div>

                            <div class="form-group">
                                <label class="control-label">Old Password :</label>
                                <input type="password" class="form-control" name="old_password"
                                       id="old_password" required/>
                            </div>

                         <div class="form-group">
                                <button class="btn btn-primary" type="submit">Chane My Password</button>
                            </div>


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


    <!-- Load jQuery and the validate plugin -->
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>

    <script>

        $(document).ready(function() {
            console.log('gfbcvn');
            jQuery.validator.addMethod("accept", function(value, element, param)
            {
                return value.match(new RegExp("." + param + "$"));

            });

            $('#changed_password_form').validate({


                doNotHideMessage: true,
                rules: {


                    new_password :"required",
                    confirm_password:{
                        equalTo: "#new_password"
                    },
                    old_password:'old_password'


                },
                messages: {

                    new_password :" Enter Password",
                    confirm_password :" Enter Confirm Password Same as Password",
                    old_password:'please provide your old password'

                }
            });
        });

    </script>
@endsection












