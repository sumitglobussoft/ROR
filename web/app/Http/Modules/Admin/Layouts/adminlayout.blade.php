<!DOCTYPE html>
<html lang="en">

    <head>
        @include('Admin/Layouts/adminheadscripts')
        @yield('pagestyle')
    </head>

    <body>
        <div class="wrapper animsition has-footer">

            <!-- Start header -->
            <header class="header-top navbar">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle side-nav-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a class="navbar-brand" href="index.html">RoR <span>- Admin</span></a>

                    <ul class="nav navbar-nav-xs">
                        <li>
                            <a href="#" class="font-lg collapse" data-toggle="collapse" data-target="#headerNavbarCollapse">
                                <i class="icon-user move-d-1"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="search-toggle">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="toggle-right-sidebar">
                                <i class="icon-menu2"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="headerNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="hidden-xs"><a href="#" class="font-lg sidenav-size-toggle"><i class="icon-indent-decrease inline-block"></i></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle font-lg" data-toggle="dropdown">
                                <i class="icon-bell font-12-xs"></i>
                                <span class="badge bg-danger">3</span>
                                <span class="hidden-sm hidden-md hidden-lg font-12 m-l-5">New Account</span>
                            </a>
                            <ul class="dropdown-menu dropdown-animated pop-effect dropdown-lg list-group-dropdown">
                                <li class="no-link font-12">You have 5 new notifications</li>
                                <li>
                                    <a href="#">
                                        <div class="user-list-wrap">
                                            <div class="profile-pic"><img src="/assets/images/pic.jpg" alt=""></div>
                                            <div class="detail">
                                                <span class="text-normal">Carrie Orr</span>
                                                <span class="time">2 mins ago</span>
                                                <p class="font-11 no-m-b text-overflow">Start following you</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-list-wrap">
                                            <div class="profile-pic"><img src="/assets/images/pic.jpg" alt=""></div>
                                            <div class="detail">
                                                <span class="text-normal">James Wygant</span>
                                                <span class="time">1 hr ago</span>
                                                <p class="font-11 no-m-b text-overflow">Accepted your friend request</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-list-wrap">
                                            <div class="profile-pic"><img src="/assets/images/pic.jpg" alt=""></div>
                                            <div class="detail">
                                                <span class="text-normal">Mary Cormier</span>
                                                <span class="time">yesterday</span>
                                                <p class="font-11 no-m-b text-overflow">Sent you a friend request</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="user-list-wrap">
                                            <div class="profile-pic"><img src="/assets/images/pic.jpg" alt=""></div>
                                            <div class="detail">
                                                <span class="text-normal">Erica Conley</span>
                                                <span class="time">2 days ago</span>
                                                <p class="font-11 no-m-b text-overflow">Start following you</p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li><a href="#" class="text-center">See all</a></li>
                            </ul>
                        </li>
                    </ul>		<ul class="dropdown-menu dropdown-animated pop-effect dropdown-lg list-group-dropdown">
                        <li class="no-link font-12">You have 5 new notifications</li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="profile-pic"><img src="/assets/images/pic.jpg" alt=""></div>
                                    <div class="detail">
                                        <span class="text-normal">Carrie Orr</span>
                                        <span class="time">2 mins ago</span>
                                        <p class="font-11 no-m-b text-overflow">Start following you</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="profile-pic"><img src="/assets/images/pic.jpg" alt=""></div>
                                    <div class="detail">
                                        <span class="text-normal">James Wygant</span>
                                        <span class="time">1 hr ago</span>
                                        <p class="font-11 no-m-b text-overflow">Accepted your friend request</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="profile-pic"><img src="/assets/images/pic.jpg" alt=""></div>
                                    <div class="detail">
                                        <span class="text-normal">Mary Cormier</span>
                                        <span class="time">yesterday</span>
                                        <p class="font-11 no-m-b text-overflow">Sent you a friend request</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="user-list-wrap">
                                    <div class="profile-pic"><img src="/assets/images/pic.jpg" alt=""></div>
                                    <div class="detail">
                                        <span class="text-normal">Erica Conley</span>
                                        <span class="time">2 days ago</span>
                                        <p class="font-11 no-m-b text-overflow">Start following you</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#" class="text-center">See all</a></li>
                    </ul>
                    </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="main-search hidden-xs">
                            <div class="input-wrap">
                                {{--<input class="form-control" type="text" placeholder="Search Here...">--}}
                                {{--<a href="#"><i class="icon-search"></i></a>--}}
                            </div>
                        </li>
                        <li class="user-profile dropdown">
                            <a href="#" class="clearfix dropdown-toggle" data-toggle="dropdown">
                                {{--<img src="/assets/images/pic.jpg" alt="" class="hidden-sm">--}}
                                <div class="user-name">{{Auth::user()->email}}<span class="caret m-l-5"></span></div>
                            </a>
                            <ul class="dropdown-menu dropdown-animated pop-effect" role="menu">
                                <li><a href="/admin/profile">My Profile</a></li>
                                {{--<li><a href="#">Settings</a></li>--}}
                                <li><a href="/admin/logout">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </header>
            <!-- End Header -->

            <!-- Start Side Navigation -->
            <aside class="side-navigation-wrap sidebar-fixed">
                <div class="sidenav-inner">
                    <ul class="side-nav magic-nav">
                        <li class="first-link active">
                            <a href="/admin/dashboard" class="animsition-link">
                                <i class="icon-stats-dots"></i> <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="has-submenu">
                            <a href="#submenu1" data-toggle="collapse" aria-expanded="false">
                                <i class="icon-stack"></i> <span class="nav-text">User Management</span>
                                <!--<span class="badge bg-danger">8</span>-->
                            </a>
                            <div class="sub-menu collapse secondary list-style-circle" id="submenu1">
                                <ul>
                                    <li><a href="/admin/users" class="animsition-link">Report user Details</a></li>

                                    <li><a href="/admin/businessuser" class="animsition-link">Business user Details</a></li>
                                    <!--								<li class="has-submenu">
                                                                                                            <a href="#submenu2" data-toggle="collapse" aria-expanded="false">Sample 3 <i class="fa fa-angle-down pull-right"></i></a>
                                                                                                            <div class="sub-menu collapse tertiary list-style-dashed" id="submenu2">
                                                                                                                    <ul>
                                                                                                                            <li><a href="javascript:;" class="animsition-link">menu 1</a></li>
                                                                                                                            <li><a href="javascript:;" class="animsition-link">menu 2</a></li>
                                                                                                                    </ul>
                                                                                                            </div>
                                                                                                    </li>-->
                                </ul>
                            </div>
                        </li>
                        <li class="first-link active">
                            <a href="/admin/category" class="animsition-link">
                                <i class="icon-stack"></i><span class="nav-text">Category</span>
                            </a>
                        </li>
                        <li class="has-submenu">
                            <a href="#report" data-toggle="collapse" aria-expanded="false">
                                <i class="icon-stack"></i> <span class="nav-text">Report Management</span>
                                <span class="badge bg-danger"></span>
                            </a>
                            <div class="sub-menu collapse secondary list-style-circle" id="report">
                                <ul>
                                    <li><a href="/admin/removesession" class="animsition-link">Add Report</a></li>
                                    <li><a href="/admin/listfilereport" class="animsition-link">List All Reports</a></li>
                                    <li><a href="/admin/pending-report" class="animsition-link">Pending Reports</a></li>
                                    <li><a href="/admin/approved-report" class="animsition-link">Approved Reports</a></li>
                                    <li><a href="/admin/unapproved-report" class="animsition-link">Unapproved Reports</a></li>

                                </ul>
                            </div>
                        </li>
                        <li class="has-submenu">
                            <a href="#review" data-toggle="collapse" aria-expanded="false">
                                <i class="icon-stack"></i> <span class="nav-text">Review Management</span>
                                <span class="badge bg-danger"></span>
                            </a>
                            <div class="sub-menu collapse secondary list-style-circle" id="review">
                                <ul>
                                    <li><a href="javascript:;" id="addReview">Add Review</a></li>
                                    <li><a href="/admin/list-review" class="animsition-link">List All Reviews</a></li>
                                    <li><a href="/admin/pending-review" class="animsition-link">Pending Reviews</a></li>
                                    <li><a href="/admin/approved-review" class="animsition-link">Approved Reviews</a></li>
                                    <li><a href="/admin/unapproved-review" class="animsition-link">Unapproved Reviews</a></li>

                                </ul>
                            </div>
                        </li>
                        <li class="has-submenu">
                            <a href="#rebuttal" data-toggle="collapse" aria-expanded="false">
                                <i class="icon-stack"></i> <span class="nav-text">Rebuttal</span>
                                <!--<span class="badge bg-danger">8</span>-->
                            </a>
                            <div class="sub-menu collapse secondary list-style-circle" id="rebuttal">
                                <ul>
                                    <li><a href="/admin/rebuttal" class="animsition-link">Add rebuttal</a></li>

                                    {{--<li><a href="http://localhost.ripoffreport.com/admin/business" class="animsition-link">Business user Details</a></li>--}}
                                    {{--<li class="has-submenu">--}}
                                        {{--<a href="#submenu2" data-toggle="collapse" aria-expanded="false">Sample 3 <i class="fa fa-angle-down pull-right"></i></a>--}}
                                        {{--<div class="sub-menu collapse tertiary list-style-dashed" id="submenu2">--}}
                                            {{--<ul>--}}
                                                {{--<li><a href="javascript:;" class="animsition-link">menu 1</a></li>--}}
                                                {{--<li><a href="javascript:;" class="animsition-link">menu 2</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                </ul>
                            </div>
                        </li>


                        <li class="has-submenu">
                            <a href="#business" data-toggle="collapse" aria-expanded="false">
                                <i class="icon-stack"></i> <span class="nav-text">Business</span>
                                <!--<span class="badge bg-danger">8</span>-->
                            </a>
                            <div class="sub-menu collapse secondary list-style-circle" id="business">
                                <ul>
                                    <li><a href="/admin/managebusiness" class="animsition-link">Business Details</a></li>


                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-inner -->
            </aside>
            <!-- End Side Navigation -->

            @yield('content')

        </div>
            <!-- Modal -->
<div id="category_details" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Select Report</h4>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-right">
                                    <!-- <a class="btn btn-primary" data-toggle="modal" href="#addModal"> <i class="fa fa-plus"></i> Add User </a> -->
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped font-12" id="datatable-report">
                                        <thead>
                                            <tr>
                                                <th>Report ID</th>
                                                <th>Created By</th>
                                                <th>Report Title</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="reportbody">

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
      </div>
      
    </div>

  </div>
</div>
        @yield('modalcontent')
        <!-- /.wrapper -->
        @include('Admin/Layouts/admincommonfooterscripts')
        @yield('pagescript')
    </body>

</html>