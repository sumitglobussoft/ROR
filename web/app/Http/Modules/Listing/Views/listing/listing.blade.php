@extends('Listing/Layouts/listinglayout')

@section('title', 'Home')

@section('listingcontent')


    <div class="dashboard-container">
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
                            <div class="">
                                <form action="/search" method="get" role="form" class="font-segoe">
                                    <div class="row">
                                        <div class="col-md-5">

                                            <label class="control-label">Keyword
                                                <small><i>(type a keyword or listing name)</i></small>
                                            </label>
                                            <input type="text" class="form-control" name="keyword"/>
                                        </div>
                                        <div class="col-md-5">
                                            <label class="control-label">Where
                                                <small><i>(Address, City, State or Zip Code)</i></small>
                                            </label>
                                            <input type="text" class="form-control" name="where"/>
                                        </div>
                                        {{Session('succmsg')}}
                                        <div class="col-md-2" style="margin-top: 2%;">
                                            <button class="btn btn-success width-full" type="submit"> SEARCH <i
                                                        class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Row End -->

            <!-- Row Start -->
            <div class="row">
                <div class="col-md-4">
                    <div class="widget">
                        <div class="widget-header">
                            <div class="title">Featured Listings</div>
                        </div>
                        <div class="widget-body">
                            <div class="wrapper">
                                <div class="row font-segoe">
                                    <div class="col-md-4">
                                        <a href="javascript:;">
                                            <img src="assets/images/pic.jpg" class="img-responsive img-thumbnail"/>
                                        </a>
                                    </div>
                                    <div class="col-md-8" style="padding-left: 0px; margin-top: 1.5%;">
                                        <h5 class="bold text-ellipsis"><a href="javascript:;">Zeldes &amp;
                                                Haeggquist LLP: Co Limited</a></h5>
                                        <span>by <label>Helen Zeldes</label> in</span>
                                        <br/>
                                        <a href="javascript:;">Lawyers and Law Firms</a>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 1%;">
                                        <p>Have you been a victim of fraud? Misrepresentation or false advertising?
                                            A defective product? </p>
                                    </div>
                                </div>
                            </div>
                            <div class="wrapper">
                                <div class="row font-segoe">
                                    <div class="col-md-4">
                                        <a href="javascript:;">
                                            <img src="assets/images/pic.jpg" class="img-responsive img-thumbnail"/>
                                        </a>
                                    </div>
                                    <div class="col-md-8" style="padding-left: 0px; margin-top: 1.5%;">
                                        <h5 class="bold text-ellipsis"><a href="javascript:;">Zeldes &amp;
                                                Haeggquist LLP: Co Limited</a></h5>
                                        <span>by <label>Helen Zeldes</label> in</span>
                                        <br/>
                                        <a href="javascript:;">Lawyers and Law Firms</a>
                                    </div>
                                    <div class="col-md-12" style="margin-top: 1%;">
                                        <p>Have you been a victim of fraud? Misrepresentation or false advertising?
                                            A defective product? </p>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user())
                                <a type="button" class="btn btn-primary" href="/add_business">Add Your Listing</a>
                            @else
                                <a type="button" class="btn btn-primary" href="/login">Add Your Listing</a>
                            @endif

                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="widget">
                        <div class="widget-header">
                            <div class="widget">
                                <h3 class="title">Categories and sub-categories</h3>
                                {{--{{Session('succmsg')}}--}}
                            </div>
                        </div>
                        <div class="widget-body">
                            <div class="wrapper">
                                <div class="row font-segoe">
                                    {{--<div class="col-md-6">--}}
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
                                                <a class="list-unstyled sub-categories"></a>

                                                <?php $index++; ?>
                                            @endforeach
                                        @else
                                            No Category Data!!
                                        @endif
                                        {{--</div>--}}
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
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
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
                    console.log(response);
                    if (response != '') {

                        $.each(response, function (index, value) {
//                                ULObj.append('<a onclick="mycategory(' + value['subcategory_id'] + ');"><li>' + value['subcategory_name'] + '</li></a>');
                            ULObj.append('<a href="/guide/' + value['category_name'] + '/' + value['subcategory_name'] + '"><li>' + value['subcategory_name'] + '</li></a>');
                        });
                    }
                    else {
                        ULObj.append('<li value="">No subcategory found</li>');
                    }
                }

            });
        });
    });
    //    function mycategory(id) {
    //
    //        var sub_category_id =id;
    //
    //        $.ajax({
    //            url: '/listing-ajax-handler',
    //            type: 'post',
    //            dataType: 'json',
    //            data: {
    //                method: 'GetBusinessByCategory',
    //                sub_category_id: sub_category_id,
    //
    //            },
    //            beforeSend: function () {
    ////                    alert("ADSF");
    //            },
    //            success: function (response) {
    //
    //
    //
    //            }
    //
    //        });
    //    }
</script>
{{--@endsection--}}
