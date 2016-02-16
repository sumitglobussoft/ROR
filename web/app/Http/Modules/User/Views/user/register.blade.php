<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="AllThatIsRam" />
    <title>RoR || User</title>

    <link href="https://fonts.googleapis.com/css?family=Exo" rel="stylesheet" />
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/new.css" rel="stylesheet" />

    <link href="/assets/css/font-awesome.min.css" rel="stylesheet" />

    <!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/assets/js/html5shiv.js"></script>
    <script src="/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Header Start -->
<header>
    <a href="index.html" class="logo"> R - o - R </a>
    <div class="pull-right">
        <ul id="mini-nav" class="clearfix" style="margin-top: 4%;">
            <li class="list-box user-profile">
                <a href="signin.html" class="btn btn-default" style="color: #000; padding: 14%;">LOGIN</a>
            </li>
            <li class="list-box user-profile">
                <a href="register.html" class="btn btn-default" style="color: #000; padding: 10%;">REGISTER</a>
            </li>
        </ul>
    </div>
</header>
<!-- Header End -->

<!-- Main Container start -->
<div class="dashboard-container">

    <div class="container">
        <!-- Top Nav Start -->
        <div id='cssmenu'>
            <ul class="wcontent">
                <li class="">
                    <a href="index.html"><i class="fa fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="account.html">
                        <i class="fa fa-user"></i> My Account
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;"><i class="fa fa-shopping-cart"></i>Menu</a>
                    <ul>
                        <li><a href="javascript:;">Submenu</a></li>
                        <li><a href="javascript:;">Submenu</a></li>
                        <li><a href="javascript:;">Submenu</a></li>
                        <li>
                            <a href="javascript:;">Submenu</a>
                            <ul>
                                <li><a href="javascript:;">Submenu</a></li>
                                <li><a href="javascript:;">Submenu</a></li>
                                <li><a href="javascript:;">Submenu</a></li>
                            </ul>
                        </li>
                        <li style="border-top:1px #FFF solid;"><a href="javascript:;">Submenu</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Top Nav End -->

        <!-- Sub Nav End -->
        <div class="sub-nav hidden-sm hidden-xs">
            <ul>
                <li><a href="/user/register" class="heading">Register</a></li>
            </ul>
            <div class="custom-search hidden-sm hidden-xs">
                <input type="text" class="search-query" placeholder="Search here ...">
                <i class="fa fa-search"></i>
            </div>
        </div>
        <!-- Sub Nav End -->

        <!-- Dashboard Wrapper Start -->
        <div class="dashboard-wrapper-lg" style="min-height: auto; padding: 100px 20px;">

            <!-- Row starts -->
            <div class="row">
                <div class="col-md-12">
                    <form class="" role="form" action="/user/register" method="post">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <label class="control-label">User Name :</label>
                                    <input type="text" class="form-control" name="full_name" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Full Name :</label>
                                    <input type="text" class="form-control" name="display_name" required />
                                </div>

                                <div class="form-group">
                                    <label class="control-label">Email :</label>
                                    <input type="email" class="form-control" name="email" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Mobile :</label>
                                    <input type="primary_phone" class="form-control" name="primary_phone" required />
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Password :</label>
                                    <input type="password" class="form-control" name="password" required />
                                </div>
                                {{--<div class="form-group">--}}
                                    {{--<label class="control-label">Confirm Password :</label>--}}
                                    {{--<input type="password" class="form-control" name="conform_password" required />--}}
                                {{--</div>--}}
                                <div class="form-group">
                                    <button class="btn btn-primary" type="submit">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Row End -->

        </div>
        <!-- Dashboard Wrapper End -->

        <footer>
            <p>&copy; RoR 2015-16</p>
        </footer>

    </div>
</div>
<!-- Main Container end -->

<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/jquery.scrollUp.js"></script>

<!-- jQuery UI JS -->
<script src="/assets/js/jquery-ui-v1.10.3.js"></script>

<!-- Custom JS -->
<script src="/assets/js/menu.js"></script>
<script src="/assets/js/custom.js"></script>

<script>
</script>

</body>

</html>