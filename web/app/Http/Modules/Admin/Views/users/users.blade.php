<?php // print_r($allUserDetails);die; ?>
@extends('Admin/Layouts/adminlayout')

@section('title', 'Users')

@section('content')
<style>
    .error {
        color: red !important;
        font-size: 85%;
    }

    .addUser {
        display: none;
    }

    .editUser {
        display: none;
    }
</style>
<!-- Start Main Container -->
<div class="main-container">
    <div class="page-header no-breadcrumb font-header">User Details</div>
    <div class="content-wrap">
        <div class="row editUser">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="title ">Edit User</div>
                    </div>
                    <div class="panel-body">
                        <form action="" role="form" id="edituserform">
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="username" id="editusername" value="<?php //echo $userDetails->user_id; ?>;?>"
                                       class="form-control input-lg font-14 pull-right" placeholder="Username"/>
                            </div>
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="userid" id="edituserid" value="<?php //echo $userDetails->user_id; ?>;?>"
                                       class="form-control input-lg font-14 pull-right" style="display: none" placeholder="Username"/>
                            </div>



                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="displayname" id="editdisplayname"
                                       class="form-control input-lg font-14 pull-left" placeholder="Display Name"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="email" id="editemailid"
                                       class="form-control input-lg font-14 pull-left" placeholder="Email"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="password" id="editpassword"
                                       class="form-control input-lg font-14 pull-right" placeholder="Password"/>
                            </div>

                            {{--<div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">--}}
                                {{--<input type="text" name="repassword" id="repassword"--}}
                                           {{--class="form-control input-lg font-14 pull-left" placeholder="Re-password"/>--}}
                                           {{--</div>--}}

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="address" id="editaddress"
                                       class="form-control input-lg font-14 pull-right" placeholder="Address"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="city" id="editcity"
                                       class="form-control input-lg font-14 pull-left" placeholder="City"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="state" id="editstate"
                                       class="form-control input-lg font-14 pull-right" placeholder="State"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="country" id="editcountry"
                                       class="form-control input-lg font-14 pull-left" placeholder="Country"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="zipcode" id="editzipcode"
                                       class="form-control input-lg font-14 pull-right" placeholder="Zipcode"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="primary_phone" id="editprimary_phone"
                                       class="form-control input-lg font-14 pull-left" placeholder="Primary Phone"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="alternate_phone" id="editalternate_phone"
                                       class="form-control input-lg font-14 pull-right"
                                       placeholder="Alternate Phone"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 col-md-6">
                                <select class="form-control input-lg font-14" id="status01"  >
                                    <option > Status</option>
                                    <option value="1"> Active</option>
                                    <option value="0"> Deactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12 m-t-10">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-main updateuserinfo" >Update User</button>
                                    <button type="button" class="btn btn-dark add-toggle">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row addUser">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="title">Add User</div>
                    </div>
                    <div class="panel-body">
                        <form action="" role="form" id="joinUserForm">
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="username" id="username"
                                       class="form-control input-lg font-14 pull-right" placeholder="Username"/>
                            </div>
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="displayname" id="displayname"
                                       class="form-control input-lg font-14 pull-left" placeholder="Display Name"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="email" id="emailid"
                                       class="form-control input-lg font-14 pull-left" placeholder="Email"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="password" id="password"
                                       class="form-control input-lg font-14 pull-right" placeholder="Password"/>
                            </div>

                            {{--<div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">--}}
                                {{--<input type="text" name="repassword" id="repassword"--}}
                                           {{--class="form-control input-lg font-14 pull-left" placeholder="Re-password"/>--}}
                                           {{--</div>--}}

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="address" id="address"
                                       class="form-control input-lg font-14 pull-right" placeholder="Address"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="city" id="city"
                                       class="form-control input-lg font-14 pull-left" placeholder="City"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="state" id="state"
                                       class="form-control input-lg font-14 pull-right" placeholder="State"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="country" id="country"
                                       class="form-control input-lg font-14 pull-left" placeholder="Country"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="zipcode" id="zipcode"
                                       class="form-control input-lg font-14 pull-right" placeholder="Zipcode"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="primary_phone" id="primary_phone"
                                       class="form-control input-lg font-14 pull-left" placeholder="Primary Phone"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="text" name="alternate_phone" id="alternate_phone"
                                       class="form-control input-lg font-14 pull-right"
                                       placeholder="Alternate Phone"/>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 col-md-6">
                                <select class="form-control input-lg font-14" id="status1" name="status">
                                    <option disabled selected> Status</option>
                                    <option value="1" name="active"> Active</option>
                                    <option value="0"> Inactive</option>
                                </select>
                            </div>

                            <div class="form-group col-md-12 m-t-10">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-main" id="userjoin">Add User</button>
                                    <button type="button" class="btn btn-dark add-toggle">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-right">
                            <a class="btn btn-primary add-user" href="javascript:;">
                                <i class="fa fa-plus"></i>
                                Add User
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped font-12" id="datatable">
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Allusers as $userDetails) {
                                        ?>

                                        <tr>
                                            <td><?php echo $userDetails->user_id; ?></td>
                                            <td> <?php echo $userDetails->display_name; ?></td>
                                            <td><?php echo $userDetails->email; ?></td>
                                            <td class="text-center">
                                                @if($userDetails->report_login_active==0)
                                                <label class="label label-danger">Deactive</label>
                                                @endif
                                                @if($userDetails->report_login_active==1)
                                                <label class="label label-success">Activate</label>
                                                @endif
                                            </td>



                                            <td class="text-center">
                                                <button data-toggle="modal" id="edituser" data-id="<?php echo $userDetails->user_id ?>"  class="btn btn-info edituserinfo">
                                                    <i
                                                        class="fa fa-pencil"></i> </button>
                                                <button data-id="<?php echo $userDetails->user_id ?>" id="" data-toggle="modal" class="btn btn-danger deleteuser"> <i
                                                        class="fa fa-trash"></i> </button>
                                                <a href="/admin/addreportuser/<?php echo $userDetails->user_id ?>" data-id="<?php echo $userDetails->user_id ?>" id="" class="btn btn-danger addreport"> Add Report</a>

                                            </td>
                                            <td class="text-center">
                                                {{--<button type="button" onclick="window.location='{{ url("admin/add_business")}}'" class="btn btn-primary " href="javascript:;">--}}
                                                {{--<i class="fa fa-plus"></i>--}}
                                                {{--Add Business--}}
                                                {{--</button>--}}


                                                <?php  echo "<a href='/admin/add_business/$userDetails->user_id' class='label label-warning'> Add Business </a>";?>


                                            </td>

                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
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


<!-- /.wrapper -->

<!-- Start Modal -->
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
                    <button type="button" class="btn btn-main deleteuserinfo" data-id="">Delete</button>
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

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#userjoin').click(function () {
            $(".error").remove();
            var profileData = $('#joinUserForm').serializeArray();
            profileData.push({name: 'method', value: 'userJoin'});
            $.ajax({
                url: '/admin/users-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: profileData,
                success: function (response) {

                    if(response ==2){

                        window.location.href = 'http://ror.globusapps.com/admin/users';
                        $('#userjoin').modal('hide');
                    }


                    else  if (response.status == 'error') {

                        $.each(response.msg, function (index, value) {

                            $('#joinUserForm').find("[name='" + index + "']").after('<span class="error">' + value + '</span>');
                        });

                    }

                }

            });


        });
        $('.edituserinfo').click(function (){
            var userid=$(this).attr('data-id');

            $.ajax({
                url: '/admin/users-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'edituser',
                    userid: userid,

                },
                beforeSend: function () {
                },
                success: function (response) {
                    jQuery.each(response, function(index, data) {
                        $("#edituserid").val(data.id);
                        $("#editusername").val(data.full_name);
                        $("#editdisplayname").val(data.display_name);
                        $("#editemailid").val(data.email);
                        $("#editpassword").val(data.password);
                        $("#editaddress").val(data.address);
                        $("#editcity").val(data.city);
                        $("#editstate").val(data.state);
                        $("#editcountry").val(data.country);
                        $("#editzipcode").val(data.zipcode);
                        $("#editcountry").val(data.country);
                        $("#editprimary_phone").val(data.primary_phone);
                        $("#editalternate_phone").val(data.alternate_phone);
                        //                            $('#active').val(data.status);

                        $(".editUser").show();

                        var status=data.report_login_active;

                        var x = document.getElementById("status01");
                        var txt = "";
                        var i;
                        for (i = 0; i < x.length; i++) {
                            console.log(x.options[i].value+":"+status);
                            if(x.options[i].value==status)
                                x.options[i].selected = true;
                        }
                    });


                },

            });

        });




        $('.deleteuser').click(function (){
            var userid=$(this).attr('data-id');
            $(".deleteuserinfo").attr('data-id',userid);
            $("#deleteModal").modal("show");

        });



        $('.deleteuserinfo').click(function (){
            var userid=$(this).attr('data-id');

            $.ajax({
                url: '/admin/users-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'deleteuserinfo',
                    userid: userid,

                },
                beforeSend: function () {
                },
                success: function (response) {

                    window.location.href = 'http://ror.globusapps.com/admin/users';
                },

            });

        });


        $('.updateuserinfo').click(function (){

            var username =$("#editusername").val();
            var displayname = $("#editdisplayname").val();
            var emailid =$("#editemailid").val();
            var password= $("#editpassword").val();
            var address= $("#editaddress").val();
            var city  =$("#editcity").val();
            var state =$("#editstate").val();
            var country =$("#editcountry").val();
            var zipcode=$("#editzipcode").val();
            var country =$("#editcountry").val();
            var primary_phone =$("#editprimary_phone").val();
            var alternate_phone =$("#editalternate_phone").val();
            var edituserid    =$('#edituserid').val();
            var status01 =$('#status01').val();
            //                console.log(status01);

            $.ajax({
                url: '/admin/users-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'updateuserinfo',
                    username:username,
                    displayname:displayname,
                    emailid:emailid,
                    password:password,
                    address:address,
                    city:city,
                    state:state,
                    country:country,
                    zipcode:zipcode,
                    country:country,
                    primary_phone:primary_phone,
                    alternate_phone:alternate_phone,
                    edituserid:edituserid,
                    status01:status01,


                },
                beforeSend: function () {
                },
                success: function (response) {

                    if(response ==2){

                        window.location.href = 'http://ror.globusapps.com/admin/users';


                    }

                },

            });

        });


    });

    //


</script>
<script>
    $(document).ready(function () {


        $('.edit-user').on('click', function () {
            $('.editUser').show();
        });
        $('.edit-toggle').on('click', function () {
            $('.editUser').hide();
        });
        $('.add-user').on('click', function () {
            $('.addUser').show();
        });
        $('.add-toggle').on('click', function () {
            $('.addUser').hide();
        });
    });
</script>




