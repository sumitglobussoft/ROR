@extends('Admin/Layouts/adminlayout')

@section('title', 'Report')


@section('content')
    <style>

        .tabbable-panel {
            border: 1px solid #eee;
            padding: 10px;
        }

        .tabbable-line > .nav-tabs {
            border: none;
            margin: 0px;
        }

        .tabbable-line > .nav-tabs > li {
            margin-right: 2px;
        }

        .tabbable-line > .nav-tabs > li > a {
            border: 0;
            margin-right: 0;
            color: #737373;
        }

        .tabbable-line > .nav-tabs > li > a > i {
            color: #a6a6a6;
        }

        .tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
            border-bottom: 4px solid rgb(80, 144, 247);
        }

        .tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
            border: 0;
            background: none !important;
            color: #333333;
        }

        .tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
            color: #a6a6a6;
        }

        .tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
            margin-top: 0px;
        }

        .tabbable-line > .nav-tabs > li.active {
            border-bottom: 4px solid #32465B;
            position: relative;
        }

        .tabbable-line > .nav-tabs > li.active > a {
            border: 0;
            color: #333333;
        }

        .tabbable-line > .nav-tabs > li.active > a > i {
            color: #404040;
        }

        .tabbable-line > .tab-content {
            margin-top: -3px;
            background-color: #fff;
            border: 0;
            border-top: 1px solid #eee;
            padding: 15px 0;
        }

        .portlet .tabbable-line > .tab-content {
            padding-bottom: 0;
        }

        .img-130 {
            height: 145px;
            width: 225px
        }
    </style>
    </head>

    <body>

    <div class="wrapper animsition has-footer">


        <!-- Start Main Container -->
        <div class="main-container">
            <div class="page-header no-breadcrumb font-header">Report Details</div>
            <div class="content-wrap">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <a href="javascript:;" data-toggle="modal" id="{{$report_data['report_id']}}"
                                   class="btn btn-info edit-report padd-10"> <i class="fa fa-pencil">Edit This
                                        Report</i> </a>
                                <a href="{{ URL::previous() }}" class="btn btn-info "> <i class="fa">Go Back</i> </a>
                                <div class="tabbable-panel">
                                    <div class="tabbable-line">
                                        <ul class="nav nav-tabs ">
                                            <li class="active">
                                                <a href="#tab_default_1" data-toggle="tab">
                                                    Company or Individual </a>
                                            </li>
                                            <li>
                                                <a href="#tab_default_2" data-toggle="tab">
                                                    Report title & Category </a>
                                            </li>
                                            <li>
                                                <a href="#tab_default_3" data-toggle="tab">
                                                    Your Reports </a>
                                            </li>
                                            <li>
                                                <a href="#tab_default_4" data-toggle="tab">
                                                    Documents </a>
                                            </li>
                                            <li>
                                                <a href="#tab_default_5" data-toggle="tab">
                                                    T&C </a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab_default_1">
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Company Name or Individual:</label>
                                                    <span>{{$report_data['company_or_individual_name']}} </span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Additaional Names:</label>
                                                    <span>{{$report_data['company_or_individual_aka']}} </span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Web Address:</label>
                                                    <span>{{$report_data['web_address']}} </span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Location of the Company or Individual:</label>
                                                    @if($report_data['location_type']==0)
                                                        <span>Physical Location</span>
                                                    @elseif($report_data['location_type']==1)
                                                        <span>Nationwide</span>
                                                    @elseif($report_data['location_type']==2)
                                                        <span>Internet Only </span>
                                                    @endif
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Street:</label>
                                                    <span> {{$report_data['street_address']}}  </span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>City:</label> <span> {{$report_data['city']}} </span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>State/Province:</label>
                                                    <span> {{$report_data['state']}} </span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Zip Code:</label> <span>{{$report_data['zip_code']}}  </span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Country:</label> <span>{{$report_data['country']}} </span>
                                                </div>

                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Fax:</label> <span>{{$report_data['fax']}} </span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Phone:</label> <span> {{$report_data['phone']}}</span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Email Address:</label>
                                                    <span>{{$report_data['email_address']}} </span>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="tab_default_2">
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Report Title :</label>
                                                    <span>{{$report_data['report_title']}} </span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Category :</label>
                                                    <span>{{$report_data['category_name']}}  </span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Sub-Category :</label>
                                                    <span>{{$report_data['subcategory_name']}} </span>
                                                </div>

                                            </div>
                                            <div class="tab-pane" id="tab_default_3">
                                                <div class="form-group form-input-group m-t-30 m-b-5 col-md-10">
                                                    <label>Report:</label>
                                                    <span id="originalreport"
                                                          class="originalreport"><?php echo $report_data['report_text']; ?></span>
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Did you use a Credit Card for this Transaction? :</label>

                                                    @if($report_data['is_online_transaction']==0)
                                                        <span>No</span>
                                                    @elseif($report_data['is_online_transaction']==1)
                                                        <span>Yes</span>
                                                    @endif

                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Was this an online Transaction?

                                                        :</label> @if($report_data['is_credit_card_used']==0)
                                                        <span>No</span>
                                                    @elseif($report_data['is_credit_card_used']==1)
                                                        <span>Yes</span>
                                                    @endif
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Which Credit Company was Involved?

                                                        :</label> @if($report_data['credit_company']==0)
                                                        <span>Discover</span>
                                                    @elseif($report_data['credit_company']==1)
                                                        <span>Visa</span>
                                                    @elseif($report_data['credit_company']==2)
                                                        <span>Mastercard</span>
                                                    @elseif($report_data['credit_company']==3)
                                                        <span>American Express</span>
                                                    @elseif($report_data['credit_company']==4)
                                                        <span>JCB</span>
                                                    @elseif($report_data['credit_company']==5)
                                                        <span>Paypal</span>
                                                    @elseif($report_data['credit_company']==6)
                                                        <span>Google Checkout</span>
                                                    @elseif($report_data['credit_company']==7)
                                                        <span>Western Union</span>
                                                    @elseif($report_data['credit_company']==8)
                                                        <span>Wire Transfer</span>
                                                    @elseif($report_data['credit_company']==9)
                                                        <span>Other</span>
                                                    @endif
                                                </div>

                                            </div>
                                            <div class="tab-pane" id="tab_default_4">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <small>THe following documents attached to this report</small>
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
                                                            @if(isset($report_data))
                                                                @if($report_data['files'])
                                                                    @foreach($report_data['files'] as $data)
                                                                        @if($data)
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
                                                                                        Your browser does not support
                                                                                        HTML5 video.
                                                                                    </video>
                                                                                    <?php } else if ($data->file_type == 2) { ?>
                                                                                    <a href="{{$data->file_path}}"
                                                                                       target="_blank"><img
                                                                                                class='img-130'
                                                                                                src='/assets/images/youtube.png'/></a>
                                                                                    <?php } ?>


                                                                                </td>
                                                                                <td>{{$data->caption}}</td>
                                                                                <td class='overflow-text'><p
                                                                                            title="{{$data->name}}">{{$data->name}}</p>
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                @endif
                                                            @endif

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane active" id="tab_default_5">
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>T&C:</label> @if($report_data['tc']==0)
                                                        <span>No</span>
                                                    @elseif($report_data['tc']==1)
                                                        <span>Yes</span>
                                                    @endif
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Contact me if there is an investigation:</label>
                                                    @if($report_data['contact_investigation']==0)
                                                        <span>No</span>
                                                    @elseif($report_data['contact_investigation']==1)
                                                        <span>Yes</span>
                                                    @endif
                                                </div>
                                                <div class="form-group form-input-group m-t-30 m-b-5">
                                                    <label>Report Status:</label>
                                                    @if($report_data['status']==0)
                                                        <span>Pending</span>
                                                    @elseif($report_data['status']==1)
                                                        <span>Approved</span>
                                                    @elseif($report_data['status']==2)
                                                        <span>UnApproved</span>
                                                    @endif
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.content-wrap -->
        </div>
        <!-- End Main Container -->

        <!-- Start Footer -->
        <footer class="footer">
            &copy; 2016. <b>RoR Admin</b>.
        </footer>
        <!-- End Footer -->

    </div>
    <!-- /.wrapper -->
    @endsection
            <!-- /.wrapper -->
    @section('modalcontent')
            <!-- Start Modal -->
    <div class="modal modal-scale fade" id="addModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title font-header text-dark">Add User</h4>
                </div>
                <form action="" role="form">
                    <div class="modal-body">
                        <div class="form-group form-input-group m-t-30 m-b-5">
                            <input type="text" class="form-control input-lg font-14" placeholder="User ID">
                        </div>
                        <div class="form-group form-input-group m-t-30 m-b-5">
                            <input type="text" class="form-control input-lg font-14" placeholder="Username">
                        </div>
                        <div class="form-group form-input-group m-t-30 m-b-5">
                            <select class="form-control input-lg font-14">
                                <option disabled selected> Status</option>
                                <option> Active</option>
                                <option> Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-main">Add User</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <div class="modal modal-scale fade" id="deleteModal">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title font-header text-dark">Delete User</h4>
                </div>
                <form action="" role="form">
                    <div class="modal-body">
                        <div class="form-group form-input-group m-t-5 m-b-5">
                            <p> Do you want to delete this User ?? </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-main">Delete</button>
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- End Modal -->

    @endsection
    @section('pagescript')
        <script>
            $(document).ready(function () {
                $('.edit-report').on('click', function () {
                    var reportid = $(this).attr("id");
                    document.location = "/admin/storesession/" + reportid;
                    //             $.ajax({
                    //                url: '/admin/ajaxaction',
                    //                type: 'POST',
                    //                dataType: 'json',
                    //                data: {
                    //                    method:"editreport",
                    //                    reportid:reportid
                    //                },
                    //                success: function (response) {
                    //                    console.log(response);
                    //
                    //                }
                    //            });
                    //           $('.editCategory').show();
                });
            });
        </script>
@endsection