<!DOCTYPE html>
<html>
<head>
    @include('Admin/Layouts/adminheadscripts')
    @section('title', 'Login')
</head>
<body class="bg-dark">

<!-- wrapper -->
<div class="wrapper animsition">
    <div class="container text-center">
        <h1 class="font-header login-header text-upper">R-o-R</h1>

        <div class="single-wrap">
            <div class="single-inner-padding text-center">
                <h3 class="font-header no-m-t">Login to your account</h3>
                <span class="error">{!! $errors->first('errMsg') !!}</span>
                <div class="dots-divider m-t-20 center-block"><span class="icon-flickr4"></span></div>
                <form role="form" action="" method="post">
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="email" name="email" class="form-control input-lg font-14"
                               placeholder="Email Address">
                        <input type="password" name="password" class="form-control input-lg font-14"
                               placeholder="Password">
                    </div>
                    {{--<div class="m-l-10 font-11 text-left"><a data-toggle="modal" href="#forgotModal">Forgot your password?</a></div>--}}
                    <span class="error" style="color:red">{!! $errors->first('email') !!}</span><br/>
                    <span class="error" style="color:red">{!! $errors->first('password') !!}</span>
                    <button type="submit" class="btn btn-main btn-lg btn-block font-14 m-t-30 ">Login</button>
                </form>
                {{--<div class="m-t-20 text-muted font-11">Don't have an account?</div>--}}

                {{--<a href="register.html" class="btn btn-dark btn-lg btn-block font-14 m-t-20 animsition-link">Create an Account</a>--}}
            </div>
            <!-- /.login-inner -->
        </div>
        <!-- /.login-wrap -->
    </div>
    <!-- /.container -->
</div>
<!-- /.wrapper -->

<!-- Start Modal -->
<div class="modal modal-scale fade" id="forgotModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title font-header text-dark">Forgot Password ?</h4>
            </div>
            <div class="modal-body">
                <div class="form-group form-input-group m-t-30 m-b-5">
                    <input type="text" class="form-control input-lg font-14" placeholder="Email Address">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-main">Send Reset Link</button>
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- End Modal -->

@include('Admin/Layouts/admincommonfooterscripts')

</body>
</html>