<?php // echo "<pre>";
//print_r($Allusers);die;?>
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
    <div class="page-header no-breadcrumb font-header">Profile</div>
    <div class="content-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="title ">Profile Data</div>
                    </div>
                    <div class="panel-body">
                        <form action="" role="form" method="post" action="/admin/profile">

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">

                              <label class="col-md-2 control-label">Full Name</label>
                                <div class="col-md-10">
                                <input type="text" name="full_name" id="full_name" value="<?php echo $AdminData->full_name;?>"
                                       class="form-control input-lg font-14 pull-right"  placeholder="Username"/>
                                </div>
                            </div>



                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Display Name</label>
                                <div class="col-md-10">

                                <input type="text" name="display_name" id="display_name" value="<?php echo $AdminData->display_name;?>"
                                       class="form-control input-lg font-14 pull-left" placeholder="Display Name"/>
                                    </div>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">email</label>
                                <div class="col-md-10">

                                <input type="text" name="email" id="editemailid"
                                       class="form-control input-lg font-14 pull-left" placeholder="Email" value="<?php echo $AdminData->email;?>"/>
                                    </div>
                                </div>



                            {{--<div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">--}}
                                {{--<input type="text" name="repassword" id="repassword"--}}
                                           {{--class="form-control input-lg font-14 pull-left" placeholder="Re-password"/>--}}
                                {{--</div>--}}

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">address</label>
                                <div class="col-md-10">

                                <input type="text" name="address" id="editaddress"
                                       class="form-control input-lg font-14 pull-right" placeholder="Address" value="<?php echo $AdminData->address;?>"/>
                            </div>
                            </div>
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">City</label>
                                <div class="col-md-10">

                                <input type="text" name="city" id="editcity"
                                       class="form-control input-lg font-14 pull-left" placeholder="City" value="<?php echo $AdminData->city;?>"/>
                            </div>
                            </div>
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">State</label>
                                <div class="col-md-10">


                                <input type="text" name="state" id="editstate"
                                       class="form-control input-lg font-14 pull-right" placeholder="State" value="<?php echo $AdminData->state;?>"/>
                            </div>
                            </div>
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Country</label>
                                <div class="col-md-10">

                                <input type="text" name="country" id="editcountry"
                                       class="form-control input-lg font-14 pull-left" placeholder="Country" value="<?php echo $AdminData->country;?>"/>
                            </div>
                            </div>
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Zipcode</label>
                                <div class="col-md-10">

                                <input type="text" name="zipcode" id="editzipcode"
                                       class="form-control input-lg font-14 pull-right" placeholder="Zipcode" value="<?php echo $AdminData->zipcode;?>"/>
                            </div>
                            </div>
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Phone</label>
                                <div class="col-md-10">

                                <input type="text" name="primary_phone" id="editprimary_phone"
                                       class="form-control input-lg font-14 pull-left" placeholder="Primary Phone" value="<?php echo $AdminData->primary_phone;?>"/>
                            </div>
                            </div>
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Alternate Phone</label>
                                <div class="col-md-10">

                                <input type="text" name="alternate_phone" id="editalternate_phone" value="<?php echo $AdminData->alternate_phone;?>"
                                       class="form-control input-lg font-14 pull-right"
                                       placeholder="Alternate Phone"/>
                            </div>

                            {{--<div class="form-group form-input-group m-t-10 m-b-5 col-md-6">--}}
                                {{--<select class="form-control input-lg font-14">--}}
                                    {{--<option disabled selected> Status</option>--}}
                                    {{--<option id="1"> Active</option>--}}
                                    {{--<option id="2"> Inactive</option>--}}
                                {{--</select>--}}
                            {{--</div>--}}

                            <div class="form-group col-md-12 m-t-10">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-main updateuserinfo" >Update User</button>
                                    <button type="button" class="btn btn-dark add-toggle">Cancel</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
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

{{--<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>--}}
{{--<script>--}}
    {{--$(document).ready(function () {--}}
        {{--$('#userjoin').click(function () {--}}
            {{--$(".error").remove();--}}
            {{--var profileData = $('#joinUserForm').serializeArray();--}}
            {{--profileData.push({name: 'method', value: 'userJoin'});--}}
            {{--$.ajax({--}}
                {{--url: '/admin/users-ajax-handler',--}}
                {{--type: 'post',--}}
                {{--dataType: 'json',--}}
                {{--data: profileData,--}}
                {{--success: function (response) {--}}

                    {{--if(response ==2){--}}

                        {{--alert('User added');--}}
                        {{--$('#userjoin').modal('hide');--}}
                    {{--}--}}


                    {{--else  if (response.status == 'error') {--}}

                        {{--$.each(response.msg, function (index, value) {--}}

                            {{--$('#joinUserForm').find("[name='" + index + "']").after('<span class="error">' + value + '</span>');--}}
                        {{--});--}}

                    {{--}--}}

                {{--}--}}

            {{--});--}}


        {{--});--}}
        {{--$('.edituserinfo').click(function (){--}}
            {{--var userid=$(this).attr('data-id');--}}

            {{--$.ajax({--}}
                {{--url: '/admin/users-ajax-handler',--}}
                {{--type: 'post',--}}
                {{--dataType: 'json',--}}
                {{--data: {--}}
                    {{--method: 'edituser',--}}
                    {{--userid: userid,--}}

                {{--},--}}
                {{--beforeSend: function () {--}}
                {{--},--}}
                {{--success: function (response) {--}}
                    {{--jQuery.each(response, function(index, data) {--}}
                        {{--$("#edituserid").val(data.id);--}}
                        {{--$("#editusername").val(data.full_name);--}}
                        {{--$("#editdisplayname").val(data.display_name);--}}
                        {{--$("#editemailid").val(data.email);--}}
                        {{--$("#editpassword").val(data.password);--}}
                        {{--$("#editaddress").val(data.address);--}}
                        {{--$("#editcity").val(data.city);--}}
                        {{--$("#editstate").val(data.state);--}}
                        {{--$("#editcountry").val(data.country);--}}
                        {{--$("#editzipcode").val(data.zipcode);--}}
                        {{--$("#editcountry").val(data.country);--}}
                        {{--$("#editprimary_phone").val(data.primary_phone);--}}
                        {{--$("#editalternate_phone").val(data.alternate_phone);--}}
                        {{--$('#active').val(data.status);--}}
                        {{--console.log(status1);--}}
                        {{--$(".editUser").show();--}}
                    {{--});--}}


                {{--},--}}

            {{--});--}}

        {{--});--}}




        {{--$('.deleteuser').click(function (){--}}
            {{--var userid=$(this).attr('data-id');--}}
            {{--$(".deleteuserinfo").attr('data-id',userid);--}}
            {{--$("#deleteModal").modal("show");--}}

        {{--});--}}



        {{--$('.deleteuserinfo').click(function (){--}}
            {{--var userid=$(this).attr('data-id');--}}

            {{--$.ajax({--}}
                {{--url: '/admin/users-ajax-handler',--}}
                {{--type: 'post',--}}
                {{--dataType: 'json',--}}
                {{--data: {--}}
                    {{--method: 'deleteuserinfo',--}}
                    {{--userid: userid,--}}

                {{--},--}}
                {{--beforeSend: function () {--}}
                {{--},--}}
                {{--success: function (response) {--}}

                    {{--alert('user deleted');--}}
                    {{--//  response = $.parseJSON(response);--}}
                {{--},--}}

            {{--});--}}

        {{--});--}}


        {{--$('.updateuserinfo').click(function (){--}}

            {{--var username =$("#editusername").val();--}}
            {{--var displayname = $("#editdisplayname").val();--}}
            {{--var emailid =$("#editemailid").val();--}}
            {{--var password= $("#editpassword").val();--}}
            {{--var address= $("#editaddress").val();--}}
            {{--var city  =$("#editcity").val();--}}
            {{--var state =$("#editstate").val();--}}
            {{--var country =$("#editcountry").val();--}}
            {{--var zipcode=$("#editzipcode").val();--}}
            {{--var country =$("#editcountry").val();--}}
            {{--var primary_phone =$("#editprimary_phone").val();--}}
            {{--var alternate_phone =$("#editalternate_phone").val();--}}
            {{--var edituserid    =$('#edituserid').val();--}}





{{--//                console.log(editusername);--}}





            {{--$.ajax({--}}
                {{--url: '/admin/users-ajax-handler',--}}
                {{--type: 'post',--}}
                {{--dataType: 'json',--}}
                {{--data: {--}}
                    {{--method: 'updateuserinfo',--}}
                    {{--username:username,--}}
                    {{--displayname:displayname,--}}
                    {{--emailid:emailid,--}}
                    {{--password:password,--}}
                    {{--address:address,--}}
                    {{--city:city,--}}
                    {{--state:state,--}}
                    {{--country:country,--}}
                    {{--zipcode:zipcode,--}}
                    {{--country:country,--}}
                    {{--primary_phone:primary_phone,--}}
                    {{--alternate_phone:alternate_phone,--}}
                    {{--edituserid:edituserid,--}}


                {{--},--}}
                {{--beforeSend: function () {--}}
                {{--},--}}
                {{--success: function (response) {--}}

                    {{--if(response ==2){--}}
                        {{--alert('user Updated Sucessfully')--}}

                    {{--}--}}

                {{--},--}}

            {{--});--}}

        {{--});--}}


    {{--});--}}

    {{--//--}}


{{--</script>--}}




