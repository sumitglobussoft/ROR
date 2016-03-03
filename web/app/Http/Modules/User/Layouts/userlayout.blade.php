<html lang="en">

<head>
    @include('User/Layouts/userheadscripts')
    @yield('pagestyle')
</head>

<body>
<!-- Header Start -->
<header>
    <nav class="nav navbar navbar-fixed-top navbar-content">
        @if(Auth::user())
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="javascript:;"><img src="assets/images/logo.png"></a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/">Home</a></li>
                        <li><a href="javascript:;">Directory</a></li>
                        <li><a href="javascript:;">Resources</a></li>
                        <li><a href="javascript:;">FAQ</a></li>
                        <li><a href="javascript:;">Contact Us</a></li>
                        {{--<li><a href="register.html"><strong>Register</strong></a></li>--}}
                        {{--<li><a href="login.html"><strong>Login</strong></a></li>--}}
                        <li><a href="javascript:;" class="find">File A Report</a></li>
                    </ul>
                </div>
            </div>

        @else
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="javascript:;"><img src="assets/images/logo.png"></a>
                </div>

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="javascript:;">Home</a></li>
                        <li><a href="javascript:;">Directory</a></li>
                        <li><a href="javascript:;">Resources</a></li>
                        <li><a href="javascript:;">FAQ</a></li>
                        <li><a href="javascript:;">Contact Us</a></li>
                        {{--<li><a href="/register"><strong>Register</strong></a></li>--}}
                        <li><a href="/login"><strong>Login</strong></a></li>
                        <li><a href="javascript:;" class="find">File A Report</a></li>
                    </ul>
                </div>
            </div>
        @endif
    </nav>
</header>
@yield('content')

<footer>

    &copy; 2016 <a href="index.html">BadCustomer.org</a>. All Rights Reserved.
</footer>
@yield('modalcontent')
        <!-- /.wrapper -->
@include('User/Layouts/usercommonfooterscripts')
@yield('pagescript')


<script>
    $(document).ready(function () {

    });
</script>
</body>
</html>