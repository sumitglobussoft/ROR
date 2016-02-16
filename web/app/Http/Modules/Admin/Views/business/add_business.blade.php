@extends('Admin/Layouts/adminlayout')

@section('title', 'Users')

@section('content')
    <style>
        .error {
            color: red !important;
            font-size: 85%;
        }
    </style>

    <!-- Start Main Container -->
    <div class="main-container">
        <div class="page-header no-breadcrumb font-header">Add Business</div>
        <div class="content-wrap">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="title">Add Business</div>
                        </div>
                        <div class="panel-body">
                            <form action="" role="form" id="joinUserForm">

                                <div class="form-group m-t-10 m-b-5 col-md-6">
                                    <label class="col-md-4 control-label">User Id</label>
                                    <div class="col-md-8">
                                        <input type="text" name="user_id" id="user_id" value="<?php echo $user_id;?>"
                                               class="form-control font-14"
                                               placeholder="User Id" hidden="true"/>
                                    </div>
                                </div>


                                <div class="form-group m-t-10 m-b-5 col-md-6">
                                    <label class="col-md-4 control-label">Business Name</label>
                                    <div class="col-md-8">
                                        <input type="text" name="business_name" id="business_name"
                                               class="form-control font-14"
                                               placeholder="business_name"/>
                                    </div>
                                </div>

                                <div class="form-group m-t-10 m-b-5 col-md-6">
                                    <label for="Event Type" class="col-md-4 control-label">
                                        Business Category
                                    </label>
                                    <div class="col-md-8">
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

                                <div class="form-group m-t-10 m-b-5 col-md-6">
                                    <label class="col-md-4 control-label">Sub category</label>
                                    <div class="col-md-8">
                                        <select class="form-control" id="add_sub_category" name="add_sub_category">
                                            <option value="">Select subcategory</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group m-t-10 m-b-5 col-md-6">
                                    <label class="col-md-4 control-label">Description</label>
                                    <div class="col-md-8">
                                        <input type="text" name="description" id="description"
                                               class="form-control font-14 pull-right"
                                               placeholder="description"/>
                                    </div>
                                </div>

                                <div class="form-group m-t-10 m-b-5 col-md-6">
                                    <label class="col-md-4 control-label">Address</label>
                                    <div class="col-md-8">
                                        <input type="text" name="address" id="address"
                                               class="form-control font-14 pull-right" placeholder="Address"/>
                                    </div>
                                </div>

                                <div class="form-group m-t-10 m-b-5 col-md-6">
                                    <label class="col-md-4 control-label">Phone</label>
                                    <div class="col-md-8">
                                        <input type="text" name="phone" id="phone"
                                               class="form-control font-14 pull-left" placeholder="Phone"/>
                                    </div>
                                </div>

                                <div class="form-group m-t-10 m-b-5 col-md-6">
                                    <label class="col-md-4 control-label">Web Address</label>
                                    <div class="col-md-8">
                                        <input type="text" name="web_address" id="web_address"
                                               class="form-control font-14 pull-right"
                                               placeholder="web_address"/>
                                    </div>
                                </div>

                                <div class="form-group m-t-10 m-b-5 col-md-6">
                                    <label class="col-md-4 control-label">Status</label>
                                    <div class="col-md-8">
                                        <select class="form-control font-14" id="status1" name="status">
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
        </div>
    </div>

@endsection
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#userjoin').click(function () {
            var profileData = $('#joinUserForm').serializeArray();

            profileData.push({name: 'method', value: 'AddBusinessById'});

            $.ajax({
                url: '/admin/businessbyid-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: profileData,
                success: function (response) {

                    if (response == 1) {

//                        location.reload();
                        document.location="/admin/manage_business";

                    }
                    else if (response.status == 'error') {

                        $.each(response.msg, function (index, value) {

                            $('#joinUserForm').find("[name='" + index + "']").after('<span class="error">' + value + '</span>');
                        });

                    }

                }
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


    });


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
            $('#joinUserForm').hide();
        });
    });
</script>

