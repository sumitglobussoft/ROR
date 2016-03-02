@extends('User/Layouts/userlayout')

@section('title', 'Users')

@section('content')

<section id="main">
    <div id="div1" class="col-md-2 col-md-offset-9 text-center col-xs-12">
        <h2> Resources <br>for Buisness</h2>
        <p>Warn other buisnesses about custoners
            <br> that step over the line, late payments and
            <br> more.</p>
        <a href="#">File A Report</a>
    </div>
    <div id="div2" class="col-md-2 col-md-offset-9 col-xs-12">
        <h3>The Customer is <br>Not Always Right</h3>
        <p><a href="#">BadCustomer.org</a></p>
    </div>
</section>
<!--Main Section Ends Here-->

<section id="search">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="wrap">
                    <form action="/search_report" method="get">
                        <input id="search" class="form-control" name="search" type="text"
                               placeholder="Search Reports by Company, Individual or Report Number"/>
                        <input id="search_submit" value="search" type="submit"/>


                        {{--<button type="submit" >Submit</button>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Searchbox Ends Here-->

<section id="browse">
    <h3>Browse By Category</h3>
</section>
<!--Browse Ends Here-->

<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4>About BadCustomer.org</h4>
                <hr class="hr1">
                <p>Lorem ipsum dolor sit amet, per modus perpetua instructior ne. Nam agam error pertinacia id, ea
                    graeco commodo recteque eam. Id eos oportere senserit, ut nec tantas sanctus definitiones. Laoreet
                    admodum ut duo. Salutatus definitionem cu duo.
                </p>

                <p>Te delenit perfecto usu, mei esse ferri quidam in. Tantas scripta debitis vim no, ex nam unum magna,
                    assum minimum cu vis. Vis error interpretaris no. Sit ei maluisset gubergren, ea debitis scripserit
                    mei. Te cibo liberavisse eum. Luptatum constituam id mei, per eu eius melius principes, tamquam
                    scribentur eu eos.
                </p>
            </div>
            <div class="col-md-4">
                <h4>Guidlines for Reporting</h4>
                <hr class="hr2">
                <ul>
                    <li>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit.</li>
                    <li>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit.</li>
                    <li>Lorem ipsum dolor sit amet,Lorem ipsum dolor sit.</li>
                </ul>
            </div>
            <div class="col-md-4">
                <h4>Frequenly Asked</h4>
                <hr class="hr1">
                <div id="question">
                    <button type="button" class="btn" data-toggle="collapse" data-target="#demo">What is a
                        question?<span><img src="assets/images/arrow.png"></span></button>
                    <div id="demo" class="collapse">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <button type="button" class="btn" data-toggle="collapse" data-target="#demo2">What is a
                        question?<span><img src="assets/images/arrow.png"></span></button>
                    <div id="demo2" class="collapse">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <button type="button" class="btn" data-toggle="collapse" data-target="#demo3">What is a
                        question?<span><img src="assets/images/arrow.png"></span></button>
                    <div id="demo3" class="collapse">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <button type="button" class="btn" data-toggle="collapse" data-target="#demo4">What is a question?
                        <span><img src="assets/images/arrow.png"></span></button>
                    <div id="demo4" class="collapse">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <button type="button" class="btn" data-toggle="collapse" data-target="#demo5">What is a
                        Questionj?<span><img src="assets/images/arrow.png"></span></button>
                    <div id="demo5" class="collapse">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat.
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
<section id="report">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-center">
                    <h2>Latest Reports</h2>
                </div>

                @if(sizeof($result) > 0)
                    <?php $index=1; ?>
                    @foreach($result as $data)

                <div class="columns" style="margin-top:3%;">
                    <div class="col-md-6">
                        <div class="panel panel-theme">
                            <div class="panel-heading">
                                <h5 class="title text-white">
                                    <span>{{$data->updated_date}}</span> | <b>{{$data->display_name}}</b> | <span>{{$data->city}}</span>
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
                   No Media Here!!
                @endif

            </div>
        </div>
    </div>
</section>
<!--Report Ends Here-->

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
                        <img src="assets/images/logo.png" style="width: 55%;" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

