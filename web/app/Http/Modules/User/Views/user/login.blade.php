<!DOCTYPE html>
<html>

<head>
    @include('User/Layouts/userheadscripts')
    @yield('pagestyle')


    <style>
        .toast-title {
            font-weight: 700
        }

        .toast-message {
            -ms-word-wrap: break-word;
            word-wrap: break-word
        }

        .toast-message a, .toast-message label {
            color: #fff
        }

        .toast-message a:hover {
            color: #ccc;
            text-decoration: none
        }

        .toast-close-button {
            position: relative;
            right: -.3em;
            top: -.3em;
            float: right;
            font-size: 20px;
            font-weight: 700;
            color: #fff;
            -webkit-text-shadow: 0 1px 0 #fff;
            text-shadow: 0 1px 0 #fff;
            opacity: .8;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
            filter: alpha(opacity=80)
        }

        .toast-close-button:focus, .toast-close-button:hover {
            color: #000;
            text-decoration: none;
            cursor: pointer;
            opacity: .4;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
            filter: alpha(opacity=40)
        }

        button.toast-close-button {
            padding: 0;
            cursor: pointer;
            background: 0 0;
            border: 0;
            -webkit-appearance: none
        }

        .toast-top-center {
            top: 0;
            right: 0;
            width: 100%
        }

        .toast-bottom-center {
            bottom: 0;
            right: 0;
            width: 100%
        }

        .toast-top-full-width {
            top: 0;
            right: 0;
            width: 100%
        }

        .toast-bottom-full-width {
            bottom: 0;
            right: 0;
            width: 100%
        }

        .toast-top-left {
            top: 12px;
            left: 12px
        }

        .toast-top-right {
            top: 12px;
            right: 12px
        }

        .toast-bottom-right {
            right: 12px;
            bottom: 12px
        }

        .toast-bottom-left {
            bottom: 12px;
            left: 12px
        }

        #toast-container {
            position: fixed;
            z-index: 999999;
            pointer-events: none
        }

        #toast-container * {
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box
        }

        #toast-container > div {
            position: relative;
            pointer-events: auto;
            overflow: hidden;
            margin: 0 0 6px;
            padding: 15px 15px 15px 50px;
            width: 300px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            background-position: 15px center;
            background-repeat: no-repeat;
            -moz-box-shadow: 0 0 12px #999;
            -webkit-box-shadow: 0 0 12px #999;
            box-shadow: 0 0 12px #999;
            color: #fff;
            opacity: .8;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=80);
            filter: alpha(opacity=80)
        }

        #toast-container > :hover {
            -moz-box-shadow: 0 0 12px #000;
            -webkit-box-shadow: 0 0 12px #000;
            box-shadow: 0 0 12px #000;
            opacity: 1;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=100);
            filter: alpha(opacity=100);
            cursor: pointer
        }

        #toast-container > .toast-info {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGwSURBVEhLtZa9SgNBEMc9sUxxRcoUKSzSWIhXpFMhhYWFhaBg4yPYiWCXZxBLERsLRS3EQkEfwCKdjWJAwSKCgoKCcudv4O5YLrt7EzgXhiU3/4+b2ckmwVjJSpKkQ6wAi4gwhT+z3wRBcEz0yjSseUTrcRyfsHsXmD0AmbHOC9Ii8VImnuXBPglHpQ5wwSVM7sNnTG7Za4JwDdCjxyAiH3nyA2mtaTJufiDZ5dCaqlItILh1NHatfN5skvjx9Z38m69CgzuXmZgVrPIGE763Jx9qKsRozWYw6xOHdER+nn2KkO+Bb+UV5CBN6WC6QtBgbRVozrahAbmm6HtUsgtPC19tFdxXZYBOfkbmFJ1VaHA1VAHjd0pp70oTZzvR+EVrx2Ygfdsq6eu55BHYR8hlcki+n+kERUFG8BrA0BwjeAv2M8WLQBtcy+SD6fNsmnB3AlBLrgTtVW1c2QN4bVWLATaIS60J2Du5y1TiJgjSBvFVZgTmwCU+dAZFoPxGEEs8nyHC9Bwe2GvEJv2WXZb0vjdyFT4Cxk3e/kIqlOGoVLwwPevpYHT+00T+hWwXDf4AJAOUqWcDhbwAAAAASUVORK5CYII=) !important
        }

        #toast-container > .toast-error {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHOSURBVEhLrZa/SgNBEMZzh0WKCClSCKaIYOED+AAKeQQLG8HWztLCImBrYadgIdY+gIKNYkBFSwu7CAoqCgkkoGBI/E28PdbLZmeDLgzZzcx83/zZ2SSXC1j9fr+I1Hq93g2yxH4iwM1vkoBWAdxCmpzTxfkN2RcyZNaHFIkSo10+8kgxkXIURV5HGxTmFuc75B2RfQkpxHG8aAgaAFa0tAHqYFfQ7Iwe2yhODk8+J4C7yAoRTWI3w/4klGRgR4lO7Rpn9+gvMyWp+uxFh8+H+ARlgN1nJuJuQAYvNkEnwGFck18Er4q3egEc/oO+mhLdKgRyhdNFiacC0rlOCbhNVz4H9FnAYgDBvU3QIioZlJFLJtsoHYRDfiZoUyIxqCtRpVlANq0EU4dApjrtgezPFad5S19Wgjkc0hNVnuF4HjVA6C7QrSIbylB+oZe3aHgBsqlNqKYH48jXyJKMuAbiyVJ8KzaB3eRc0pg9VwQ4niFryI68qiOi3AbjwdsfnAtk0bCjTLJKr6mrD9g8iq/S/B81hguOMlQTnVyG40wAcjnmgsCNESDrjme7wfftP4P7SP4N3CJZdvzoNyGq2c/HWOXJGsvVg+RA/k2MC/wN6I2YA2Pt8GkAAAAASUVORK5CYII=) !important
        }

        #toast-container > .toast-success {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADsSURBVEhLY2AYBfQMgf///3P8+/evAIgvA/FsIF+BavYDDWMBGroaSMMBiE8VC7AZDrIFaMFnii3AZTjUgsUUWUDA8OdAH6iQbQEhw4HyGsPEcKBXBIC4ARhex4G4BsjmweU1soIFaGg/WtoFZRIZdEvIMhxkCCjXIVsATV6gFGACs4Rsw0EGgIIH3QJYJgHSARQZDrWAB+jawzgs+Q2UO49D7jnRSRGoEFRILcdmEMWGI0cm0JJ2QpYA1RDvcmzJEWhABhD/pqrL0S0CWuABKgnRki9lLseS7g2AlqwHWQSKH4oKLrILpRGhEQCw2LiRUIa4lwAAAABJRU5ErkJggg==) !important
        }

        #toast-container > .toast-warning {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGYSURBVEhL5ZSvTsNQFMbXZGICMYGYmJhAQIJAICYQPAACiSDB8AiICQQJT4CqQEwgJvYASAQCiZiYmJhAIBATCARJy+9rTsldd8sKu1M0+dLb057v6/lbq/2rK0mS/TRNj9cWNAKPYIJII7gIxCcQ51cvqID+GIEX8ASG4B1bK5gIZFeQfoJdEXOfgX4QAQg7kH2A65yQ87lyxb27sggkAzAuFhbbg1K2kgCkB1bVwyIR9m2L7PRPIhDUIXgGtyKw575yz3lTNs6X4JXnjV+LKM/m3MydnTbtOKIjtz6VhCBq4vSm3ncdrD2lk0VgUXSVKjVDJXJzijW1RQdsU7F77He8u68koNZTz8Oz5yGa6J3H3lZ0xYgXBK2QymlWWA+RWnYhskLBv2vmE+hBMCtbA7KX5drWyRT/2JsqZ2IvfB9Y4bWDNMFbJRFmC9E74SoS0CqulwjkC0+5bpcV1CZ8NMej4pjy0U+doDQsGyo1hzVJttIjhQ7GnBtRFN1UarUlH8F3xict+HY07rEzoUGPlWcjRFRr4/gChZgc3ZL2d8oAAAAASUVORK5CYII=) !important
        }

        #toast-container.toast-bottom-center > div, #toast-container.toast-top-center > div {
            width: 300px;
            margin-left: auto;
            margin-right: auto
        }

        #toast-container.toast-bottom-full-width > div, #toast-container.toast-top-full-width > div {
            width: 96%;
            margin-left: auto;
            margin-right: auto
        }

        .toast {
            background-color: #030303
        }

        .toast-success {
            background-color: #51a351
        }

        .toast-error {
            background-color: #bd362f
        }

        .toast-info {
            background-color: #2f96b4
        }

        .toast-warning {
            background-color: #f89406
        }

        .toast-progress {
            position: absolute;
            left: 0;
            bottom: 0;
            height: 4px;
            background-color: #000;
            opacity: .4;
            -ms-filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=40);
            filter: alpha(opacity=40)
        }

        @media all and (max-width: 240px) {
            #toast-container > div {
                padding: 8px 8px 8px 50px;
                width: 11em
            }

            #toast-container .toast-close-button {
                right: -.2em;
                top: -.2em
            }
        }

        @media all and (min-width: 241px) and (max-width: 480px) {
            #toast-container > div {
                padding: 8px 8px 8px 50px;
                width: 18em
            }

            #toast-container .toast-close-button {
                right: -.2em;
                top: -.2em
            }
        }

        @media all and (min-width: 481px) and (max-width: 768px) {
            #toast-container > div {
                padding: 15px 15px 15px 50px;
                width: 25em
            }
        }

        a, input[type="submit"], .form__link {
            -webkit-transition: all .25s ease;
            transition: all .25s ease
        }

        hidden {
            display: none
        }

        #loginForm small, #signupForm small {
            display: block;
            margin-top: 2rem;
            font-size: 12px;
            text-align: center
        }

        @-webkit-keyframes "gradient" {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        @keyframes "gradient" {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .wrapper {
            position: relative;
            margin-top: 3rem;
            margin-right: auto;
            margin-left: auto;
            width: 38rem;
            background: #fff;
            box-shadow: 3px 3px 32px rgba(0, 0, 0, 0.25);
            -webkit-perspective: 1000;
            perspective: 1000
        }

        .flipper__checkbox:checked + .form__container {
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg)
        }

        .form__container {
            position: relative;
            width: 100%;
            height: 100%;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-transition: -webkit-transform .25s ease;
            transition: -webkit-transform .25s ease;
            transition: transform .25s ease;
            transition: transform .25s ease, -webkit-transform .25s ease
        }

        .form__container--inner {
            padding: 2rem
        }

        .form__login, .form__signup {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            width: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            background: #fff;
            box-shadow: 3px 3px 32px rgba(0, 0, 0, 0.25)
        }

        .form__login:after, .form__signup:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: -webkit-linear-gradient(180deg, #2196f3, #2c4bbd);
            background: linear-gradient(270deg, #2196f3, #2c4bbd);
            background-size: 400% 400%;
            -webkit-animation: gradient 2s ease infinite;
            animation: gradient 2s ease infinite
        }

        .form__login {
            z-index: 2;
            padding: 2rem;
            -webkit-transform: rotateY(0deg);
            transform: rotateY(0deg)
        }

        .form__signup {
            padding: 2rem;
            -webkit-transform: rotateY(180deg);
            transform: rotateY(180deg)
        }

        .form__header {
            margin-bottom: 2rem;
            font-size: 1.618rem;
            font-weight: 700;
            text-align: center
        }

        .form__group label {
            display: inline
        }

        .form__group:nth-of-type(n+2) {
            margin-top: 1.5rem
        }

        .label__icon {
            padding: 15px 0;
            float: left;
            width: 3rem;
            font-size: 1.25rem;
            text-align: center;
            color: rgba(107, 141, 159, 0.25);
            border-top: 1px solid #e1e1e1;
            border-bottom: 1px solid #e1e1e1;
            border-left: 1px solid #e1e1e1;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px
        }

        .form__element {
            padding-top: 1.11rem;
            padding-right: 1rem;
            padding-bottom: 1.11rem;
            width: 89%;
            border-top: 1px solid #e1e1e1;
            border-right: 1px solid #e1e1e1;
            border-bottom: 1px solid #e1e1e1;
            border-left: 0;
            border-top-right-radius: 2px;
            border-bottom-right-radius: 2px
        }

        .form__element:focus {
            outline: 0
        }

        [type="checkbox"] {
            position: relative;
            margin-right: .5rem
        }

        [type="checkbox"]:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            border: 1px solid #e1e1e1;
            width: 16px;
            height: 16px;
            background: #fff;
            border-radius: 2px;
            cursor: pointer
        }

        label[for="checkbox"] {
            position: relative;
            font-size: .9rem;
            font-weight: 700
        }

        .checkbox--forget:checked + .icon--checkbox {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1)
        }

        .icon--checkbox {
            position: absolute;
            top: 4px;
            left: 6px;
            opacity: 0;
            cursor: pointer;
            -webkit-transition: all 0.35s cubic-bezier(0.91, 0.8, 0.84, 2.81);
            transition: all 0.35s cubic-bezier(0.91, 0.8, 0.84, 2.81);
            -webkit-transform: scale(0);
            transform: scale(0)
        }

        .form__link {
            font-size: 12px;
            font-weight: bold;
            text-decoration: underline;
            color: rgba(107, 141, 159, 0.75);
            cursor: pointer
        }

        .form__link:focus, .form__link:hover {
            color: rgba(107, 141, 159, 0.95)
        }

        .link--right {
            float: right
        }

        .form__button {
            padding-top: 1rem;
            padding-bottom: 1rem;
            display: inline-block;
            width: 100%;
            font-size: 16px;
            text-transform: uppercase;
            font-weight: 700;
            text-align: center;
            color: #fff;
            background-color: #2c4bbd;
            border: 0;
            border-radius: 2px;
            cursor: pointer
        }

        .form__button:focus, .form__button:hover {
            background-color: #0b74c7
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center" style="margin-top: 5%;">
                {{--{{Session('msg')}}--}}
                <a href="index.html"><img src="assets/images/logo.png" class=""/></a>
            </div>

            <div class="wrapper">
                {{--@if(Session::has('success'))--}}
                {{--<div class="alert-box success">--}}
                {{--<h5>{{ Session::get('success') }}</h5>--}}
                {{--</div>--}}
                {{--@endif--}}
                <input type="checkbox" name="flipper__checkbox" id="flipper__checkbox" class="flipper__checkbox"
                       hidden/>
                <div class="form__container">
                    <!-- Front side -->
                    <div class="form__login">
                        <h1 class="form__header">Login</h1>
                        <form id="loginForm" action="/login" method="post" class="form">
                            <fieldset class="form__group">
                                <label for="mail"><span class="label__icon fa fa-at"></span></label>
                                <input id="email" name="email" class="form__element" type="email" placeholder="Email"
                                       required/>
                            </fieldset>
                            <fieldset class="form__group">
                                <label for="password"><span class="label__icon fa fa-lock"></span></label>
                                <input id="password" name="password" class="form__element" type="password"
                                       placeholder="Password" required/>
                            </fieldset>
                            <fieldset class="form__group">
                                <a class="form__link link--right" href="javascript:;" data-toggle="modal"
                                   data-target="#fpModal">Forgot your password?</a>
                            </fieldset>
                            <fieldset class="form__group">
                                <input class="form__button" type="submit" value="Login"/>
                            </fieldset>
                            {{--{{Session('success')}}--}}
                            <small>Not a member yet? <label for="flipper__checkbox" class="form__link">Create your
                                    account</label>.
                            </small>
                        </form>
                    </div>
                    <!-- Back side -->
                    <div class="form__signup">
                        <h1 class="form__header">Sign Up</h1>
                        <form id="signupForm" action="/register" method="post" class="form">
                            <fieldset class="form__group">
                                <label for="signUpName"><span class="label__icon fa fa-user"></span></label>
                                <input id="full_name" name="full_name" class="form__element" type="text"
                                       placeholder="Full Name"/>
                            </fieldset>
                            <fieldset class="form__group">
                                <label for="signUpMail"><span class="label__icon fa fa-at"></span></label>
                                <input id="email" name="email" class="form__element" type="email" placeholder="Email"/>
                            </fieldset>
                            <fieldset class="form__group">
                                <label for="signUpPassword"><span class="label__icon fa fa-lock"></span></label>
                                <input id="signUpPassword" name="signUpPassword" class="form__element" type="password"
                                       placeholder="Password"/>
                            </fieldset>
                            <fieldset class="form__group">
                                <label for="signUpPasswordRepeat"><span class="label__icon fa fa-lock"></span></label>
                                <input id="conformpassword" name="conformpassword" class="form__element" type="password"
                                       placeholder="Repeat Password"/>
                            </fieldset>
                            <fieldset class="form__group">
                                <input class="form__button" type="submit" value="Sign up"/>
                            </fieldset>
                            <small>Are you a member? <label for="flipper__checkbox" class="form__link">Click here to
                                    login</label>.
                            </small>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL -->
<div id="fpModal" class="modal animated fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"> Forgot Password </h4>
            </div>
            <div class="modal-body">
                <form id="forgot_password_form" role="form" class="">
                    <div class="form-group">
                        <input id="email_for_reset" name="email_for_reset" type="email" class="form-control"
                               placeholder="Email Address"/>
                    </div>

                    <div class="form-group text-right">
                        <button class="btn btn-danger" data-dismiss="modal"> close</button>
                        <button href="#" class="btn btn-default reset_password" type="button"> Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{--<script src="/assets/js/jquery.min.js"></script>--}}
{{--<script src="/assets/js/bootstrap.min.js"></script>--}}
{{--<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>--}}
@include('User/Layouts/usercommonfooterscripts')
@yield('pagestyle')

<script>
    $(document).ready(function () {

    });
</script>
<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>


<script>

    $(document).ready(function () {
        jQuery.validator.addMethod("accept", function (value, element, param) {
            return value.match(new RegExp("." + param + "$"));

        });

        $('#signupForm').validate({

            doNotHideMessage: true,
            rules: {

                full_name: {
                    required: true
                },
                email: {
                    required: true

                },
                signUpPassword: "required",
                conformpassword: {
                    equalTo: "#signUpPassword"
                }

            },
            messages: {

                full_name: {
                    required: "please enter full name",
                    accept: "Enter only letters"
                },

                email: {
                    required: "enter a valid email id"
                },
                signUpPassword: " Enter Password",
                conformpassword: " Enter Confirm Password Same as Password"

            }
        });

        $('#forgot_password_form').validate({
            doNotHideMessage: true,
            rules: {

                email_for_reset: {
                    required: true
                }
            },
            messages: {

                email_for_reset: {
                    required: "enter a valid email id"

                },
            }
        });
        $('.reset_password').click(function () {

//            event.preventDefault();

            var email = $('#email_for_reset').val();
            $.ajax({
                url: '/user-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'Forgotpassword',
                    email: email,

                },
                beforeSend: function () {
//                    alert("ADSF");
                },
                success: function (response) {

                    if (response == 1) {

                        alert('password updated Succesfully check your email for new password');
                        document.location = "/login";

                    }
                    else if (response == 2) {

                        alert('something went wrong please try again');
                        document.location = "/login";

                    }
                    else if (response == 3) {

                        alert('something went wrong please try again');
                        document.location = "/login";

                    }
                    else if (response == 4) {
                        alert('email does not exist please try again');
                        document.location = "/login";
                    }


                }

            });

        });

    });

</script>
<script src="/assets/plugins/toastr/toastr.min.js"></script>
<script src="/assets/js/pages/notifications.js"></script>

<script>
    $(document).ready(function () {
        //FOR UI-NOTIFICATIONS
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "slideDown",
            "hideMethod": "slideUp"
        };
        @if(session('msg')!='')
                toastr["{{session('status')}}"]("{{session('msg')}}");
        @endif

    });
</script>


</body>

</html>