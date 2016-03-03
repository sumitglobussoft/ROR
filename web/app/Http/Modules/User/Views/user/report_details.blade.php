<!DOCTYPE html>

<html>
<head xmlns="http://www.w3.org/1999/html">

    <head>
        <meta charset="UTF-8">
        <title>RoR</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="AllThatIsRam">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Stylesheets-->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet"/>
        <link href="/assets/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="/assets/css/custom.css" rel="stylesheet"/>

        <style>
            @media (max-width: 767px) {
                section#search {
                    margin-top: 17% !important;
                }

                section#search .form-control {
                    font-size: 12px;
                }
            }

        </style>

    </head>

<body>
<nav class="nav navbar navbar-fixed-top navbar-content">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="/assets/images/logo.png"></a>
        </div>

        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:;">Home</a></li>
                <li><a href="javascript:;">Directory</a></li>
                <li><a href="javascript:;">Resources</a></li>
                <li><a href="javascript:;">FAQ</a></li>
                <li><a href="javascript:;">Contact Us</a></li>
                <li><a href="register.html"><strong>Register</strong></a></li>
                <li><a href="login.html"><strong>Login</strong></a></li>
                <li><a href="javascript:;" class="find">File A Report</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- Navigation Ends Here-->

<section id="search" style="margin-top:5.3%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="wrap">
                    <form action="/search_report" autocomplete="on">
                        <input id="search" class="form-control" name="search" type="text"
                               placeholder="Search Reports by Company, Individual or Report Number"/>
                        <input id="search_submit" value="search" type="submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Searchbox Ends Here-->

<section id="title">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Customer Reports</h3>
            </div>
        </div>
    </div>
</section>
<!--Title Ends Here-->

<section id="details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><b> {{$TotalReportresult[0]->display_name}} </b> |
                    <span>{{$TotalReportresult[0]->street_address}}</span></h1>
                <span class="help-block">{{$TotalReportresult[0]->updated_date}}</span>
                <div style="margin-top: 3%;">
                    <strong>{{$TotalReportresult[0]->report_title}}</strong>
                    <p>
                        {{$TotalReportresult[0]->descriptive_words}}
                    </p>

                </div>

                <div class="row" style="margin-top: 3%;">

                    <div class="col-md-12">


                        <h3>Gallery (<span><?php echo count($result);?></span>)</h3>
                        <hr class="hr1">

                        <div class="row" style="margin-top: 3%;">
                            @if(sizeof($result) > 0)
                                <?php $index = 1; ?>
                                @foreach($result as $data)
                                    <div class="col-md-3">
                                        @if($data->file_type ==0)
                                            <a href="javascript:;"><img src="{{$data->file_path}}"
                                                                        class="img-responsive img-report"/></a>
                                        @elseif($data->file_type == 1)
                                            <video controls width="228">
                                                <source src="{{$data->file_path}}" type="video/webm">
                                                <source src="{{$data->file_path}}" type="video/ogg">
                                                <source src="{{$data->file_path}}" type="video/mp4">
                                                <source src="{{$data->file_path}}" type="video/3gp">
                                                Your browser does not support HTML5 video.
                                            </video>
                                        @endif

                                    </div>
                                    <?php $index++; ?>
                                @endforeach
                            @else
                                No Media files!!
                            @endif

                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: 3%;">
                    <div class="col-md-12">
                        <h3>Comments(<span>{{$totalresultreviewcount}}</span>)

                            <small><a data-toggle="collapse" href="#post" aria-expanded="false" aria-controls="post">Post
                                    Comment</a></small>
                        </h3>
                        <hr class="hr2">

                        <div class="row" style="margin-top: 3%;margin-bottom: 3%;">
                            <div class="col-md-12">
                                @if(Auth::user())
                                    <form method="post">
                                        <div class="post-comment collapse" id="post">
                                            <div class="form-group">
                                                <textarea class="form-control" name="comment" id="comment"></textarea>
                                            </div>
                                            <div class="form-group text-right">
                                                <button type="submit" class="btn btn-theme post_comment">POST COMMENT
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                @endif

                                @if(sizeof($resultreviewData) >0)

                                    <?php $index = 1; ?>
                                        <div class="comment-section">
                                    @foreach($resultreviewData as $reviewData)
 <div class="row"><strong>{{$reviewData->full_name}}</strong><strong>{{$reviewData->created_date}}</strong>
                                                    <p>{{$reviewData->review_text}}</p>
                                                </div>
                                        <?php $index++; ?>
                                    @endforeach
                                        </div>
                                @else
                                    No comments!!
                                @endif

                                    @if(count($resultreviewData) >= 5)

                                    <small><a id="view_more" data-id="{{$reviewData->report_id}}">VIEW   MORE</a></small>
                                    @endif

                                {{--@endif--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Details Ends Here-->

<section id="badge"></section>
<section id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li><a href="javascript:;"> home </a></li>
                    <li><a href="javascript:;"> directory </a></li>
                    <li><a href="javascript:;"> resources </a></li>
                    <li><a href="javascript:;"> faq </a></li>
                    <li><a href="javascript:;"> terms &amp; conditions </a></li>
                    <li><a href="javascript:;"> privcy policy </a></li>
                    <li><a href="javascript:;"> contact us </a></li>
                </ul>
            </div>
            <div class="col-md-6 text-center" id="filereport" style="margin-top: 7%;">
                <a href="#">File A Report</a>
            </div>
            <div class="col-md-3" style="margin-top: 6.2%;">
                <div class="">
                    <a href="javascript:;" class="social fb">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="javascript:;" class="social twt">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="javascript:;" class=" ">
                        <img src="/assets/images/logo.png" style="width: 55%;"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Footer Ends Here-->

<footer>
    &copy; 2016 <a href="/index.html">BadCustomer.org</a>. All Rights Reserved.
</footer>

<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function () {

    });
</script>
</body>

</html>
<script>

    $(document).ready(function () {
        var limit = 5;
        var offset = 5;
        $('#view_more').click(function () {
            var obj = $(this);
            var report_id = $(this).attr('data-id');
//            var offset = $(this).attr('offset');
            $.ajax({

                url: '/user-ajax-handler',
                type: 'post',
                dataType: 'json',
                data: {

                    method: 'appendComment',
                    report_id: report_id,
                    offset: offset,
                    limit: limit

                },
                beforeSend: function () {
                },
                success: function (response) {
                    if (response != '') {
                        console.log(response);

                        $.each(response, function (index, value) {
                            $(".comment-section").append('<div class="row"><strong>' + value['full_name'] + ' </strong><strong>' + value['created_date'] + ' </strong><p>' + value['review_text'] + ' </p></div>');
                          });
                        offset = offset + limit;
                    }
                    else {

//                        $(".comment-section").append('<div class="row"><strong> No Comments found </strong></div>');

                    }
                }
              });
       });


    });


</script>