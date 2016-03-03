<!DOCTYPE html>
<html lang="en">

<head>
    @include('User/Layouts/userheadscripts')
    @yield('pagestyle')
</head>

<body>
<!-- Header Start -->
<header>
    <a href="/" class="logo"> R - o - R </a>
    <div class="pull-right">
        @if(Auth::user())
        <ul id="mini-nav" class="clearfix">
            <li class="list-box hidden-xs">
                <a href="#" data-toggle="modal" data-target="#modalMd">
                    <!--						<span class="text-white">Code</span> <i class="fa fa-code"></i>-->
                </a>
                <!-- Modal -->
                <div class="modal fade" id="modalMd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel5"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                <h4 class="modal-title text-danger" id="myModalLabel5">Coding Style </h4>
                            </div>
                            <div class="modal-body">
                                <img src="img/documentation.png" alt="Esquare Admin">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                        class="fa fa-times"></i> Close
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="list-box user-profile">
                <a id="drop7" href="#" role="button" class="dropdown-toggle user-avtar" data-toggle="dropdown">
                    {{Auth::user()->email}}
                </a>
                <ul class="dropdown-menu server-activity">
                    <li>
                        <p>
                            <a href="/profile" style="color: #000; padding: initial;">
                                <i class="fa fa-user text-info" style="font-size: inherit;"></i>Your Profile
                            </a>
                        </p>
                    </li>
                    <li>
                        <p>
                            <a href="/changepassword" style="color: #000; padding: initial;">
                                <i class="fa fa-user text-info" style="font-size: inherit;"></i>changed password
                            </a>
                        </p>
                    </li>
                    <li>
                        <p><i class="fa fa-cog text-info"></i>Your Report</p>
                    </li>
                    {{--
                    <li>--}}
                        {{--<p><i class="fa fa-fire text-warning"></i> Payment Details</p>--}}
                        {{--
                    </li>
                    --}}
                    {{--
                    <li>--}}
                        {{--
                        <div class="demo-btn-group clearfix">--}}
                            {{--<a href="#" data-original-title="" title="">--}}
                                {{--<i class="fa fa-facebook fa-lg icon-rounded info-bg"></i>--}}
                                {{--</a>--}}
                            {{--<a href="#" data-original-title="" title="">--}}
                                {{--<i class="fa fa-twitter fa-lg icon-rounded twitter-bg"></i>--}}
                                {{--</a>--}}
                            {{--<a href="#" data-original-title="" title="">--}}
                                {{--<i class="fa fa-linkedin fa-lg icon-rounded linkedin-bg"></i>--}}
                                {{--</a>--}}
                            {{--<a href="#" data-original-title="" title="">--}}
                                {{--<i class="fa fa-pinterest fa-lg icon-rounded danger-bg"></i>--}}
                                {{--</a>--}}
                            {{--<a href="#" data-original-title="" title="">--}}
                                {{--<i class="fa fa-google-plus fa-lg icon-rounded success-bg"></i>--}}
                                {{--</a>--}}
                            {{--
                        </div>
                        --}}
                        {{--
                    </li>
                    --}}
                    <li>
                        <div class="demo-btn-group clearfix">
                            <a href="/logout" class="btn btn-danger">
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        @else
        <ul id="mini-nav" class="clearfix" style="margin-top: 4%;">
            <li class="list-box user-profile">
                <a href="/login" class="btn btn-default" style="color: #000; padding: 14%;">LOGIN</a>
            </li>
            <li class="list-box user-profile">
                <a href="/register" class="btn btn-default" style="color: #000; padding: 10%;">REGISTER</a>
            </li>
        </ul>

        @endif
    </div>
</header>
<!-- Header End -->

<!-- Main Container start -->
<div class="dashboard-container">

    <div class="container">
        <!-- Top Nav Start -->
        <div id='cssmenu'>
            <ul class="wcontent">
                <li class="active">
                    <a href="/"><i class="fa fa-home"></i>Home</a>
                </li>
                <li>
                    <a href="account.html">
                        <i class="fa fa-user"></i> My Account
                    </a>
                </li>
                <li class="">
                    <a href="javascript:;"><i class="fa fa-shopping-cart"></i>Update A Report</a>

                </li>

                <li class="">
                    <a href="javascript:;"><i class="fa fa-shopping-cart"></i>Programs & Services</a>
                    <ul>
                        <li><a href="javascript:;">VIP arbitration</a></li>
                        <li><a href="javascript:;">Corporate Advocacy program</a></li>

                    </ul>
                </li>
                <li class="">
                    <a href="javascript:;"><i class="fa fa-shopping-cart"></i>Help & FAQs</a>
                    <ul>
                        <li><a href="javascript:;">Freaquently Asked Questions</a></li>
                        <li><a href="javascript:;">Legal issues</a></li>

                    </ul>
                </li>

                <li class="">
                    <a href="javascript:;"><i class="fa fa-shopping-cart"></i>Consumer Resources</a>

                </li>

                <li class="">
                    <a href="javascript:;"><i class="fa fa-shopping-cart"></i>Verified Business <p><b>Directory</b></p>
                    </a>

                </li>
                <li class="">
                    <a href="/listing"><i class="fa fa-shopping-cart"></i>Legal Directory</a>

                </li>
                <li class="">
                    <a href="javascript:;"><i class="fa fa-shopping-cart"></i>Consumers <b>Say Thank You</b></a>

                </li>
                <li class="">
                    <a href="javascript:;"><i class="fa fa-shopping-cart"></i>In the <b>Media</b></a>

                </li>
                {{--
                <li class="">--}}
                    {{--<a href="javascript:;"><i class="fa fa-shopping-cart"></i>Repair your Reputation the right way
                        <b>Corporate Advocacy Programe</b></a>--}}

                    {{--
                </li>
                --}}

            </ul>
        </div>
        <!-- Top Nav End -->

        <!-- Sub Nav End -->
        <div class="sub-nav hidden-sm hidden-xs">
            <ul>
                <li><a href="javascript:;" class="heading">Dashboard</a></li>
            </ul>
            <div class="custom-search hidden-sm hidden-xs">
                <input type="text" class="search-query" placeholder="Search here ...">
                <i class="fa fa-search"></i>
            </div>
        </div>
        <!-- Sub Nav End -->


        <!--            @yield('usercontent')-->

        <footer>
            <p>&copy; RoR 2015-16</p>
        </footer>

    </div>
</div>
<!-- Main Container end -->


@yield('modalcontent')
<!-- /.wrapper -->
@include('User/Layouts/usercommonfooterscripts')
@yield('pagescript')
</body>

</html>














