<!DOCTYPE html>
<html>

@extends('User/Layouts/userlayout')

@section('title', 'Users')

@section('content')

<body>
<section id="search" style="margin-top:5.3%;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="wrap">
                    <form action="" autocomplete="on">
                        <input id="search" class="form-control" name="search" type="text" placeholder="Search Reports by Company, Individual or Report Number" />
                        <input id="search_submit" value="search" type="submit" />
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
                <h3>Search Results for "<b>{{$search}}</b>"</h3>
            </div>
        </div>
    </div>
</section>
<!--Title Ends Here-->

<section id="details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <strong>Displaying <span>{{$totalcount}}</span> of <span>100</span> Results</strong>

                @if(sizeof($Reportresult) > 0)
                    <?php $index=1; ?>
                        @foreach($Reportresult as $data)
                <div class="row" style="margin-top:3%;">
                    <div class="col-md-6">
                        <div class="panel panel-theme">
                            <div class="panel-heading">
                                <h5 class="title text-white">
                                    <span>{{$data->submitted_date}}</span> | <b> {{$data->display_name}}</b> | <span>{{$data->city}}</span>
                                </h5>
                            </div>
                            <div class="panel-body">
                                <strong>{{$data->report_title}}</strong>
                                <p>{{$data->descriptive_words}}</p>
                                <p class="text-center" style="margin-bottom: 0px;"><a href="/details/{{$data->report_id}}"> Read More </a></p>
                            </div>
                        </div>
                    </div>
                  </div>
                            <?php $index++; ?>
                        @endforeach
                @else
                  No Media Here
                @endif

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
                <div class="text-center" style="margin-bottom: 5%;">
                    <a href="javascript:;" class="social fb">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="javascript:;" class="social twt">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="javascript:;" class=" ">
                        <img src="assets/images/logo.png" style="width: 55%;" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
</body>

</html>