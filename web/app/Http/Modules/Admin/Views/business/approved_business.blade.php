<?php //   echo "<pre>";print_r($this->$SubCategoryData);die; ?>

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

    .editBusiness {
        display: none;
    }

    .btn {
        padding: 0 4px;
    }
</style>
<!-- Start Main Container -->
<div class="main-container">
    <div class="page-header no-breadcrumb font-header">Approved Business Details</div>
    <div class="content-wrap">

        <div class="row editBusiness">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="title ">Edit Business Details</div>
                    </div>
                    <div class="panel-body">
                        <form action="" role="form" id="edituserform">

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <input type="hidden" name="business_id" id="business_id" value=""
                                       class="form-control input-lg font-14 pull-right" placeholder="Business Id" />
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label for="Event Type" class="col-md-2 control-label">
                                    Business Name
                                </label>

                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <input type="text" name="business_name" id="business_name" value=""
                                           class="form-control input-lg font-14 pull-right"
                                           placeholder="Business Name"/>
                                </div>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label for="Event Type" class="col-md-2 control-label">
                                    Business Category
                                </label>
                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <select name="category" id="editcategory" class="form-control category">
                                        <option selected="selected">Select a category</option>
                                        <?php
                                        //                                                 if (isset($this->$categoryData)) {
                                        // echo "<pre>";print_r($this->eventtypes);die;
                                        foreach ($categoryData as $etKey => $etVal) {
                                        //echo "<pre>";print_r($etVal);die;
                                        ?>
                                        <option  data_id="<?php echo $etVal->category_id ?>"
                                                 <?php if ($etVal->category_id == $etVal->category_id) { ?> selected="" <?php } ?>
                                                 value="<?php echo $etVal->category_id;?>"><?php echo $etVal->category_name; ?></option>
                                        <?php
                                        }
                                        //                                        }

                                        ?>
                                    </select>

                                </div>


                            </div>


                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Sub category</label>
                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <select class="form-control" id="sub_category" name="sub_category">
                                        <option value="">Select subcategory</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label for="Event Type" class="col-md-2 control-label">
                                    Description
                                </label>


                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <input type="text" name="description" id="description"
                                           class="form-control input-lg font-14 pull-right" placeholder="Description"/>
                                </div>
                            </div>


                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label for="Event Type" class="col-md-2 control-label">
                                    Address
                                </label>
                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <input type="text" name="address" id="address"
                                           class="form-control input-lg font-14 pull-right" placeholder="Address"/>
                                </div>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label for="Event Type" class="col-md-2 control-label">
                                    Phone
                                </label>

                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <input type="text" name="phone" id="phone"
                                           class="form-control input-lg font-14 pull-left" placeholder="Phone"/>
                                </div>
                            </div>
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label for="Event Type" class="col-md-2 control-label">
                                    Web Address
                                </label>

                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <input type="text" name="web_address" id="web_address"
                                           class="form-control input-lg font-14 pull-right" placeholder="Web Address"/>
                                </div>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label for="Event Type" class="col-md-2 control-label">
                                    Status
                                </label>
                                <div class="form-group form-input-group m-t-10 m-b-5 col-md-6">
                                    <select class="form-control input-lg font-14" id="status01">
                                        <option> Status</option>
                                        <option value="0"> Pending</option>
                                        <option value="1"> Approved</option>
                                        <option value="2"> Unapproved</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-12 m-t-10">
                                <div class="pull-right btn-group">
                                    <button type="button" class="btn btn-main updateBusinessinfo">Update Business Info
                                    </button>
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
                        <div class="title">Add Business</div>
                    </div>
                    <div class="panel-body">
                        <form action="" role="form" id="joinUserForm">
                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Business Name</label>


                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <input type="text" name="business_name" id="business_name"
                                           class="form-control input-lg font-14 pull-right"
                                           placeholder="business_name"/>
                                </div>
                            </div>


                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label for="Event Type" class="col-md-2 control-label">
                                    Business Category
                                </label>
                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <select name="category" id="category" class="form-control category">
                                        <option selected="selected">Select a category</option>
                                        <?php
                                        //                                        if (isset($this->$categoryData)) {
                                        // echo "<pre>";print_r($this->eventtypes);die;
                                        foreach ($categoryData as $etKey => $etVal) {
                                        //echo "<pre>";print_r($etVal);die;
                                        ?>
                                        <option data_id="<?php echo $etVal->category_id ?>"
                                                value="<?php echo $etVal->category_id;?>"><?php echo $etVal->category_name; ?></option>
                                        <?php
                                        }

                                        ?>
                                    </select>

                                </div>


                            </div>


                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Sub category</label>
                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <select class="form-control" id="add_sub_category" name="add_sub_category">
                                        <option value="">Select subcategory</option>
                                    </select>
                                </div>
                            </div>


                            {{--<div class="col-md-6 form-group form-input-group">--}}
                            {{--<label for="" class="control-label col-md-3">Business subcategory</label>--}}
                            {{--<div >--}}
                            {{--<select class="form-control" id="sub_category" name="sub_category">--}}
                            {{--<option value="">Select subcategory</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            {{--</div>--}}


                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Description</label>
                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <input type="text" name="description" id="description"
                                           class="form-control input-lg font-14 pull-right" placeholder="description"/>
                                </div>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Address</label>

                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <input type="text" name="address" id="address"
                                           class="form-control input-lg font-14 pull-right" placeholder="Address"/>
                                </div>
                            </div>


                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Phone</label>
                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <input type="text" name="phone" id="phone"
                                           class="form-control input-lg font-14 pull-left" placeholder="Phone"/>
                                </div>
                            </div>


                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Web Address</label>
                                <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                    <input type="text" name="web_address" id="web_address"
                                           class="form-control input-lg font-14 pull-right"
                                           placeholder="web_address"/>
                                </div>
                            </div>

                            <div class="form-group form-input-group m-t-10 m-b-5 pull-left col-md-6">
                                <label class="col-md-2 control-label">Status</label>
                                <div class="form-group form-input-group m-t-10 m-b-5 col-md-6">
                                    <select class="form-control input-lg font-14" id="status1" name="status">
                                        <option disabled selected> Status</option>
                                        <option value="0" name="active"> Pending</option>
                                        <option value="1"> Approved</option>
                                        <option value="2"> UnApproved</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-12 m-t-10">
                                <div class="pull-right">
                                    <button type="button" class="btn btn-main" id="userjoin">Add business</button>
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
                                Add Business
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped font-12" id="datatable">
                                <thead>
                                <tr>
                                    <th>Business Id</th>
                                    <th>Business Name</th>
                                    <th>created By</th>
                                    <th>User No</th>
                                    <th>Category Name</th>
                                    <th>Subcategory Name</th>
                                    <th>Description</th>
                                    <th>Address</th>
                                    <th>Business Phone</th>
                                    <th>Web Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php    foreach ($allApprovedBusiness as  $approvedBusines) {

                                ?>

                                <tr>
                                    <td><?php echo $approvedBusines->business_id;?></td>
                                    <td> <?php echo $approvedBusines->business_name;?></td>
                                    <td> <?php echo $approvedBusines->full_name;?></td>
                                    <td> <?php echo $approvedBusines->primary_phone;?></td>
                                    <td><?php echo $approvedBusines->category_name;?></td>
                                    <td><?php echo $approvedBusines->subcategory_name;?></td>
                                    <td><?php echo $approvedBusines->description;?></td>
                                    <td><?php echo $approvedBusines->address;?></td>
                                    <td><?php echo $approvedBusines->phone;?></td>
                                    <td><?php echo $approvedBusines->web_address;?></td>
                                    <td>
                                    <td class="text-center">
                                        @if($approvedBusines->status==1)
                                            <label class="label label-success">Approved</label>
                                        @endif

                                    </td>
                                    </td>


                                    {{--<td class="text-center">--}}
                                    {{--<a href="javascript:;" class="btn btn-info"> <i class="fa fa-pencil"></i> </a>--}}
                                    {{--<a href="javascript:;" class="btn btn-danger"> <i class="fa fa-trash"></i> </a>--}}
                                    {{--</td>--}}


                                    <td class="text-center">
                                        <button data-toggle="modal" id="edituser"
                                                data-id="<?php echo $approvedBusines->business_id?>"
                                                class="btn btn-info editBusinessinfo">
                                            <i
                                                    class="fa fa-pencil"></i></button>
                                        <button data-id="<?php echo $approvedBusines->business_id?>" id=""
                                                data-toggle="modal" class="btn btn-danger deleteBusiness"><i
                                                    class="fa fa-trash"></i></button>
                                    </td>

                                </tr>

                                <?php      } ?>
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
                <h4 class="modal-title font-header text-dark">Delete Approved Business</h4>
            </div>
            <form action="" role="form">
                <div class="modal-body">
                    <div class="form-group form-input-group m-t-5 m-b-5">
                        <p> Do you want to delete this Business ?? </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-main deletebusinessinfo" data-id="">Delete</button>
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
    $(document).ready(function() {


        $('#userjoin').click(function () {

//            $('.category').change(function () {
//                var categoryid=$(this).attr('data-id');
//                console.log(categoryid);

            $(".error").remove();
            var profileData = $('#joinUserForm').serializeArray();
            profileData.push({name: 'method', value: 'AddBusiness'});
            $.ajax({
                url: '/admin/businessmanage-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: profileData,
                success: function (response) {

                    if (response == 1) {

                        alert('Business added');
                        $('#userjoin').modal('hide');
//                        $('#joinUserForm').modal('hide');
                    }


                    else if (response.status == 'error') {

                        $.each(response.msg, function (index, value) {

                            $('#joinUserForm').find("[name='" + index + "']").after('<span class="error">' + value + '</span>');
                        });

                    }

                }

            });
//            });

        });



        $('.deleteBusiness').click(function () {
            var business_id = $(this).attr('data-id');
            $(".deletebusinessinfo").attr('data-id', business_id);
            $("#deleteModal").modal("show");

        });


        $('.deletebusinessinfo').click(function () {
            var business_id = $(this).attr('data-id');

             $.ajax({
                url: '/admin/businessmanage-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'DeleteBusinessInfo',
                    business_id: business_id,

                },
                beforeSend: function () {
                },
                success: function (response) {
               window.location.href = 'http://localhost.ripoffreport.com/admin/approved_business';
                },

            });

        });

        $('.editBusinessinfo').click(function () {
            var business_id = $(this).attr('data-id');


            $.ajax({
                url: '/admin/businessmanage-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'EditBusinessInfo',
                    business_id: business_id,

                },
                beforeSend: function () {
                },
                success: function (response) {
                    $(".editBusiness").show();
                    jQuery.each(response, function (index, data) {

                        $("#business_name").val(data.business_name);
                        $("#category_id").val(data.category_id);
                        $("#subcategory_id").val(data.subcategory_id);
                        $("#description").val(data.description);
                        $("#address").val(data.address);
                        $("#phone").val(data.phone);
                        $("#web_address").val(data.web_address);
                        $("#business_id").val(data.business_id);
                        $("#status01").val(data.status);


                    });


                },

            });

        });


        $('.category').change(function () {

            var catgory_id = $(this).val();


            $.ajax({
                url: '/admin/businessmanage-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'Category',
                    catgory_id: catgory_id,

                },
                beforeSend: function () {
//                    alert("ADSF");
                },
                success: function (response) {

                    $('#add_sub_category').empty();
//                    response = $.parseJSON(response);
                    console.log(response);
                    if (response != '') {
                        var appendsubcategory = '<option value="">Select subcategory</option>';
                        $.each(response, function (index, value) {
                            appendsubcategory += '<option value="' + value['subcategory_id'] + '">' + value['subcategory_name'] + '</option>';
                        });
                        $('#add_sub_category').append(appendsubcategory);
                    } else {
                        $('#add_sub_category').append('<option value="">No subcategory found</option>');
                    }



                    $('#sub_category').empty();
//                    response = $.parseJSON(response);
                    console.log(response);
                    if (response != '') {
                        var appendsubcategory = '<option value="">Select subcategory</option>';
                        $.each(response, function (index, value) {
                            appendsubcategory += '<option value="' + value['subcategory_id'] + '">' + value['subcategory_name'] + '</option>';
                        });
                        $('#sub_category').append(appendsubcategory);
                    } else {
                        $('#sub_category').append('<option value="">No subcategory found</option>');
                    }




                }

            });

        });


        $('.updateBusinessinfo').click(function () {


            var business_name = $("#business_name").val();
            var business_id = $("#business_id").val();
            var category_id = $("#editcategory").val();
            var subcategory_id = $("#sub_category").val();
            var description = $("#description").val();
            var address = $("#address").val();
            var phone = $("#phone").val();
            var web_address = $("#web_address").val();
            var status01 = $("#status01").val();


            $.ajax({
                url: '/admin/businessmanage-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'updateBusinessInfo',
                    business_name: business_name,
                    business_id: business_id,
                    category_id: category_id,
                    subcategory_id: subcategory_id,
                    description: description,
                    address: address,
                    phone: phone,
                    web_address: web_address,
                    status01: status01,


                },
                beforeSend: function () {
                },
                success: function (response) {

                    if (response == 1) {

                        window.location.href = 'http://localhost.ripoffreport.com/admin/approved_business';

                    }

                },

            });

        });





    });

</script>
{{--<script type="javascript">--}}
 {{--$(document).ready(function(){--}}
        {{--$('#datatable').DataTable();--}}
    {{--});--}}
{{--</script>--}}






