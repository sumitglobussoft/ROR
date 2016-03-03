@extends('Listing/Layouts/listinglayout')

@section('title', 'Home')

@section('listingcontent')


        <!-- Main Container start -->
<div class="dashboard-container">

    <div class="container">


        <!-- Sub Nav End -->
        <div class="sub-nav hidden-sm hidden-xs">
            <ul>
                <li><a href="javascript:;" class="heading">Legal Directory</a></li>
            </ul>
            <div class="custom-search hidden-sm hidden-xs">
                <input type="text" class="search-query" placeholder="Search here ...">
                <i class="fa fa-search"></i>
            </div>
        </div>
        <!-- Sub Nav End -->

        <!-- Dashboard Wrapper Start -->
        <div class="dashboard-wrapper-lg">

            <!-- Row Start -->
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <div class="widget-body">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="">

                                        <div class="widget">
                                            <h3 class="title">Categories and sub-categories</h3>
                                        </div>

                                        <div class="row font-segoe">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="panel-group" id="accordion" style="margin: 1%;">
                                                    <div class="panel panel-default">
                                                        @if(sizeof($CategoryData) >0)
                                                            <?php $index = 1; $i = 0; ?>
                                                            @foreach($CategoryData as $data)
                                                                <?php $i++; ?>
                                                                <div class="panel-heading">
                                                                    <a class="panel-title cursor main-category"
                                                                       id="mydata"
                                                                       {{$i}} data-toggle="collapse"
                                                                       data-parent="#accordion"
                                                                       value="{{$data->category_id}}"
                                                                       data-id="{{$data->category_id}}"> {{$data->category_name}}
                                                                        <span class="text-primary"></span></a>
                                                                </div>
                                                                <ul class="list-unstyled sub-categories"></ul>


                                                                {{--<div id="collapseOne"--}}
                                                                {{--class="panel-collapse collapse in sub_category">--}}
                                                                {{--<div class="panel-body">--}}
                                                                {{--<ul class="list-unstyled">--}}

                                                                {{--</ul>--}}
                                                                {{--</div>--}}
                                                                {{--</div>--}}
                                                                <?php $index++; ?>
                                                            @endforeach
                                                        @else
                                                            No Category Data!!
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="col-md-10 col-md-offset-1">
                                                    <div class="form-group">
                                                        <select size="5" multiple=""
                                                                class="form-control display_category" name="feed">
                                                            <option id="cat_hide" value="106">Miscellaneous Businesses
                                                                Services
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <button type="button" id="hello">Remove Selected Category</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-md-offset-1" style="margin-top: 5%;">
                                        <form action="/add_business" role="form" method="post"
                                              class="font-segoe form-horizontal">
                                            <div class="form-group">
                                                <label class="control-label col-md-4"> <span
                                                            class="text-danger"> * </span>Language:
                                                </label>
                                                <div class="col-md-7">
                                                    <select class="form-control" name="language">
                                                        <option>English</option>
                                                        <option>Español</option>
                                                        <option>Français</option>
                                                        <option>Italiano</option>
                                                        <option>Deutsch</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{--<div class="form-group">--}}
                                            {{--<label class="control-label col-md-5"> <span class="text-danger"> * </span>First Name: </label>--}}
                                            {{--<div class="col-md-7">--}}
                                            {{--<input type="text" class="form-control" name="fname" required />--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                            {{--<label class="control-label col-md-5"> <span class="text-danger"> * </span>Last Name: </label>--}}
                                            {{--<div class="col-md-7">--}}
                                            {{--<input type="text" class="form-control" name="lname" required />--}}
                                            {{--</div>--}}
                                            {{--</div>--}}
                                            <div class="form-group">
                                                <label class="control-label col-md-4"> Company: </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="business_name"
                                                           id="business_name"
                                                           required/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-4"> Description </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="description"
                                                           required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4">
                                                    Business Category
                                                </label>
                                                <div class="col-md-7">
                                                    <select name="category" id="category" class="form-control category">
                                                        <option selected="selected">Select a category</option>
                                                        <?php
                                                        //                                        if (isset($this->$categoryData)) {
                                                        // echo "<pre>";print_r($this->eventtypes);die;
                                                        foreach ($CategoryData as $etKey => $etVal) {
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

                                            <div class="form-group">
                                                <label class="control-label col-md-4">Sub category</label>
                                                <div class="col-md-7">
                                                    <select class="form-control" id="add_sub_category"
                                                            name="add_sub_category">
                                                        <option value="">Select subcategory</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4"> Address: </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="address" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4"> Country: </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="country" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4"> State: </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="state" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4"> city: </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="city" required/>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-md-4"> Zipcode: </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="zipcode" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4"> Web Address: </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="web_address"
                                                           required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4"> Phone: </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="phone" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-4"> Fax: </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="fax" required/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-4"> URL: </label>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control" name="url"/>
                                                </div>
                                            </div>
                                            <div class="form-group text-right">
                                                <button class="btn btn-primary" type="submit"> Continue &rarr; </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row End -->
        </div>
        <!-- Dashboard Wrapper End -->
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    //ScrollUp
    $(function () {
        $.scrollUp({
            scrollName: 'scrollUp', // Element ID
            topDistance: '300', // Distance from top before showing element (px)
            topSpeed: 300, // Speed back to top (ms)
            animation: 'fade', // Fade, slide, none
            animationInSpeed: 400, // Animation in speed (ms)
            animationOutSpeed: 400, // Animation out speed (ms)
            scrollText: 'Top', // Text for element
            activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
    });

    //Tiny Scrollbar
    $('#scrollbar').tinyscrollbar();
</script>
<script>


    $(document).ready(function () {

        $('.category').change(function () {

            var category_id = $(this).val();
            $.ajax({
                url: '/listing-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'Category',
                    category_id: category_id,

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
                }
            });

        });


    });

</script>
{{--<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>--}}
<script>
    $(document).ready(function () {
        $(".main-category").click(function () {
            var obj = $(this);
            var ULObj = $(this).parent('div').next();
            var category_id = $(this).attr("data-id");

            $.ajax({
                url: '/listing-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {
                    method: 'Category',
                    category_id: category_id,

                },
                beforeSend: function () {
//                    alert("ADSF");
                },
                success: function (response) {

                    if (response != '') {
                        ULObj.empty();
                        $.each(response, function (index, value) {
                            ULObj.append('<li>' + value['subcategory_name'] + ' <a class="hideadd" data-id="' + value['subcategory_id'] + '" href="javascript:void(0);" style="color:red;" onclick="myFunction(' + value['subcategory_id'] + ');">Add</a></li>');
                        });


                    }
                    else {
                        ULObj.empty();
                        ULObj.append('<li value="">No subcategory found</li>');
                    }
                }

            });


        });


    });

    function myFunction(id) {
        var subCategory_id = id;
        $.ajax({
            url: '/listing-ajax-handler',
            type: 'post',
            dataType: 'json',
            data: {
                method: 'SubCategory',
                subCategory_id: subCategory_id,

            },
            beforeSend: function () {
//                    alert("ADSF");
            },
            success: function (response) {

                var append_sub_cat = '<option value=""></option>';
                $.each(response, function (index, value) {
                    console.log(response);
                    append_sub_cat += '<option class="hidesubcategory" value="' + value['subcategory_id'] + '">' + value['subcategory_name'] + '</option>';
                });
                $('.display_category').append(append_sub_cat);
            }

        });

    }
</script>
<script>
    $(document).ready(function () {
        $('#hello').click(function () {
//           console.log($(this).val());
            console.log($('.hidesubcategory').value());
        });
    });

</script>
{{--<script>--}}
{{--$(document).ready(function(){--}}
{{--$("p").click(function(){--}}
{{--console.log($(this));--}}
{{--$(this).hide();--}}
{{--});--}}
{{--});--}}
{{--</script>--}}

{{--<script>--}}
{{----}}
{{----}}
{{--</script>--}}


