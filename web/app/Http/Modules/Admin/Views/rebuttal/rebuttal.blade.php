@extends('Admin/Layouts/adminlayout')

@section('content')

        <!-- Start Main Container -->
<div class="main-container">
    <div class="page-header no-breadcrumb font-header">File Rebuttal</div>

    <div class="content-wrap">
        <div class="row">
            <div class="col-lg-12">
                <div class="file-rebuttal">
                    <div class="board">
                        <!-- <h2>Welcome to IGHALO!<sup>™</sup></h2>-->
                        <div class="board-inner">
                            <ul class="nav nav-tabs" id="myTab">
                                <div class="liner"></div>
                                <li class="active">
                                    <a href="#1" id="rebuttaltab1" data-toggle="tab">
                                        <span class="round-tabs one"> 1 </span>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <h3> Rebuttal Guidelines </h3>
                                    </a>
                                </li>

                                <li>
                                    <a href="#2" id="rebuttaltab2" data-toggle="tab">
                                        <span class="round-tabs two"> 2 </span>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <h3> Write your Report </h3>
                                    </a>
                                </li>
                                <li>
                                    <a href="#3" id="rebuttaltab3" data-toggle="tab">
                                        <span class="round-tabs three"> 3 </span>
                                        <br/>
                                        <br/>
                                        <br/>
                                        <h3> Review &amp; Submit </h3>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="1">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form role="form" method="post" enctype="multipart/form-data">
                                            <p>If you have a complaint about the company or person mentioned, you may
                                                want to file your own report. To file a new Ripoff Report please <a
                                                >CLICK HERE</a>. Please note that all
                                                reports, updates and rebuttals must comply with RoR Report's <a
                                                >Terms of Service</a>.</p>

                                            <p>If you want to file a rebuttal / update as a comment to an existing
                                                report, please continue with this form.</p>

                                            <h3 class="text-danger">REBUTTAL / UPDATE GUIDELINES</h3>
                                            <p>If you represent the company or person who is the subject of the report,
                                                your rebuttal CAN include the following:</p>
                                            <ul class="">
                                                <li>Your side of the story;</li>
                                                <li>Positive references showing that you have a good reputation;</li>
                                                <li>An explanation that you believe the report is not accurate in some
                                                    way (PLEASE BE SPECIFIC – If you think the report is a hoax, please
                                                    say so and demand that the author provide some proof that the
                                                    transaction/event really happened);
                                                </li>
                                                <li>Contact information for people to reach you if they want more
                                                    information;
                                                </li>
                                                <li>Any other useful information which you believe an interested reader
                                                    needs to know about you or your business.
                                                </li>
                                            </ul>

                                            <p class="m-top-md">If you are a consumer who has something to say about the
                                                person or company reported, your rebuttal CAN include the following:</p>
                                            <ul class="">
                                                <li>Comments explaining any similar experience(s) you have had with this
                                                    person or company;
                                                </li>
                                                <li>Information which you believe supports or contradicts the complaint
                                                    described in the report;
                                                </li>
                                                <li>Any other useful information which you believe an interested reader
                                                    needs to know about the person or business described in the report.
                                                </li>
                                            </ul>

                                            <p class="m-top-md">Please note that rebuttals should NOT contain any of the
                                                following:</p>
                                            <ul class="">
                                                <li>Profanity, obscenity, threats of violence, racist remarks, false
                                                    statements, personal information (i.e., social security numbers,
                                                    credit card numbers, home address(es) or phone numbers), or any
                                                    other information which violates Ripoff Report's <a
                                                            href="javascript:;">Terms of Service</a>;
                                                </li>
                                                <li>Rumors, speculation, or innuendo unless you have personal knowledge
                                                    that your statements are true;
                                                </li>
                                                <li>Trivial comments (i.e., “Nice report!”) which do not add anything
                                                    useful to the discussion.
                                                </li>
                                            </ul>

                                            <h3 class="text-danger">NOTICE: Limit the number of rebuttals filed against
                                                a single company/individual to one per every 8 hours. If you file more
                                                than 1 REBUTTAL in an 8 hour period this will be considered spam and
                                                your rebuttals will be rejected.</h3>
                                            <p class="text-danger">Items marked with ** must be completed or your
                                                REBUTTAL / UPDATE will NOT be posted.</p>

                                            <h3 class="text-danger">Your relationship to the company or individual.</h3>
                                            <label>Be sure to select the best category for your situation.</label>

                                            <ul class="list-unstyled">
                                                <li>
                                                    <input type="radio" name="relationship_to_company" value="1"/>
                                                    &nbsp; &nbsp; I am the Owner of the Company reported
                                                </li>
                                                <li>
                                                    <input type="radio" name="relationship_to_company" value="2"/>
                                                    &nbsp; &nbsp; I am the Individual reported.
                                                </li>
                                                <li>
                                                    <input type="radio" name="relationship_to_company" value="3"/>
                                                    &nbsp; &nbsp; I am an Employee of the company.
                                                </li>
                                                <li>
                                                    <input type="radio" name="relationship_to_company" value="4"/>
                                                    &nbsp; &nbsp; I am an Employee of the company with inside
                                                    information.
                                                </li>
                                                <li>
                                                    <input type="radio" name="relationship_to_company" value="5"/>
                                                    &nbsp; &nbsp; I am an Ex-Employee of the company reported.
                                                </li>
                                                <li>
                                                    <input type="radio" name="relationship_to_company" value="6"/>
                                                    &nbsp; &nbsp; I have a Consumer Comment
                                                </li>
                                            </ul>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success btn-outline-rounded green"
                                                        href="" data-toggle=""> Continue <span
                                                            class="glyphicon glyphicon-send"
                                                            style="margin-left:10px;"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="2">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form role="form" action="/admin/rebuttal/step2" method="post">
                                            <h3 class="text-danger">Write Your Rebuttal</h3>

                                            <p>To help format our reports to be more easily read:</p>
                                            <p class="text-danger">PLEASE...</p>
                                            <p><span class="text-danger">DO NOT</span> use all capital letters, it makes
                                                it hard to read.</p>
                                            <p><span class="text-danger">DO NOT</span> indent paragraphs.</p>
                                            <p><span class="text-danger">DO NOT</span> write your report all in one
                                                paragraph. Use 2 or 3 sentences to each paragraph and leave a space
                                                between each paragraph.</p>
                                            <p><span class="text-danger">DO NOT</span> sign your name, or include any
                                                e-mail addresses in the report.</p>

                                            <h3 class="text-danger">Rebuttal Title:</h3>
                                            <input type="text" class="form-control" name="rebuttal_title"
                                                   id="rebuttal_title"/>

                                            <h3 class="text-danger">Rebuttal Body:</h3>
                                            <textarea class="editorDemo" id="rebuttal_body"
                                                      name="rebuttal_body"></textarea>

                                            <legend class="heading-report">Enter YOUR first name ONLY and your City and
                                                State:
                                            </legend>
                                            <p>This will automatically place your display name, your City and State at
                                                the very end of your report and will add credibility to your Ripoff
                                                Report. If you are afraid of retaliation and/or would like to remain
                                                anonymous, please change your first name, city, and state here.</p>
                                            <div class="form-group m-top-lg row">
                                                <label class="col-xs-3 control-label">Display name only :</label>
                                                <div class="col-xs-5">
                                                    <input type="text" class="form-control" name="displayname"
                                                           id="displayname"/>
                                                </div>
                                                <div class="col-xs-4">
                                                    &nbsp;
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xs-3 control-label">City :</label>
                                                <div class="col-xs-5">
                                                    <input type="text" class="form-control" name="city" id="city"
                                                    />
                                                </div>
                                                <div class="col-xs-4">
                                                    &nbsp;
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xs-3 control-label">Country :</label>
                                                <div class="col-xs-5">
                                                    <input type="text" class="form-control" name="country" id="country"
                                                           value=""/>
                                                </div>
                                                <div class="col-xs-4">
                                                    &nbsp;
                                                </div>
                                            </div>
                                            <div class="form-group m-bottom-lg row">
                                                <label class="col-xs-3 control-label">State :</label>
                                                <div class="col-xs-5">
                                                    <select class="form-control" name="state" id="state">
                                                        <option disabled> Choose the State</option>
                                                        <option value="1"> 1</option>
                                                        <option value="1"> 2</option>
                                                        <option value="3"> 3</option>
                                                        <option value="4"> 4</option>
                                                        <option> 1</option>
                                                    </select>
                                                </div>
                                                <div class="col-xs-4">
                                                    &nbsp;
                                                </div>
                                            </div>

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success btn-outline-rounded green"
                                                        data-toggle=""> Continue <span
                                                            class="glyphicon glyphicon-send"
                                                            style="margin-left:10px;"></span></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="" role="form" action="/admin/rebuttal/step3" method="post"
                                              enctype="multipart/form-data">
                                            <h3 class="text-danger">(Optional) Add documents to your RoR Report</h3>
                                            <legend class="heading-report">Please ensure that any photos or videos that
                                                you are uploading do not contain any of the generally prohibited items
                                                outlined in:
                                            </legend>
                                            <strong><a href="javascript:;"> Section 2 of the Terms of
                                                    Service. </a></strong>

                                            <legend class="heading-report">What would you like to attach?</legend>
                                            <div class="form-group m-left-lg m-bottom-lg">
                                                <input type="radio" name="upload" checked value="image"
                                                       onclick="test(this.value);"/> &nbsp; &nbsp;
                                                Upload an Image
                                                <br/>
                                                <input type="radio" name="upload" value="video"
                                                       onclick="test(this.value);"/> &nbsp; &nbsp; Upload a
                                                Video
                                                <br/>
                                                <input type="radio" name="upload" value="youtube_video"
                                                       onclick="test(this.value);"/> &nbsp; &nbsp;
                                                Attach a YouTube Video
                                            </div>

                                            <div id="image_tab" class="upload_tab">
                                                <strong>How to upload an Image: </strong>
                                                <small>Photos are optional. If you have photos or images that you would
                                                    like to add to your report you can upload them now. Click Browse to
                                                    find a picture on your computer and then click upload to add the
                                                    photo to your report.
                                                </small>
                                                <br/>
                                                <br/>
                                                <small>Don't have photos handy? No problem, you can add them to your
                                                    report later.
                                                </small>
                                                <br/>
                                                <small><b>NOTICE: Do not post an image or video that was created by
                                                        someone other than you unless you have permission from the
                                                        photographer or creator to post it. Please refer to our Terms of
                                                        Use regarding violation of the intellectual property rights of
                                                        others. If you have any trouble at all uploading your photos,
                                                        please email us for support and include your photos with a
                                                        caption for each photo you include.</b> <i>Send your email to <a
                                                                href="javascript:;">support@rorreport.com</a></i>
                                                </small>

                                                <div class="form-group m-top-lg row">
                                                    <label class="col-xs-3 control-label">Photo File :</label>
                                                    <div class="col-xs-5">
                                                        <input type="file" class="form-control" name="picture"
                                                               style="height:inherit;"/>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xs-3 control-label">Caption :</label>
                                                    <div class="col-xs-5">
                                                        <textarea class="form-control" name="desp"></textarea>
                                                        <br/>
                                                        <button type="submit" class="btn btn-primary">Upload your
                                                            Image
                                                        </button>
                                                        <br/>
                                                        <small><i>Supported files include: png, jpg, jpeg, gif, tif </i>
                                                        </small>
                                                        <small><i>If you dont see your file format please email <a
                                                                        href="javascript:;"> support@rorreport
                                                                    .com</a></i></small>
                                                        <small><i>To upload a PDF or Audio file please email <a
                                                                        href="javascript:;"> support_media@rorreport
                                                                    .com</a></i></small>
                                                    </div>
                                                </div>
                                                <strong class="text-danger">Just click continue if you don't have
                                                    anything to upload </strong>

                                                <div class="text-right">
                                                    <button type="submit"
                                                            class="btn btn-success btn-outline-rounded green"> Continue
                                                        <span class="glyphicon glyphicon-send"
                                                              style="margin-left:10px;"></span></button>
                                                </div>
                                            </div>


                                            <div>
                                                <table border="1" style="padding:10px">

                                                    <tr>

                                                        <Td>Upload Video</td>
                                                    </tr>

                                                    <Tr>
                                                        <td><input type="file" name="fileToUpload" id="name"/></td>
                                                    </tr>

                                                    <tr>
                                                        <td>

                                                            <input type="submit" value="Uplaod Video" name="upd"/>

                                                            {{--<input type="submit" value="Display Video" name="disp"/>--}}

                                                        </td>
                                                    </tr>

                                                </table>
                                            </div>


                                            <div id="video_tab" class="upload_tab">


                                                <div class="form-group row">
                                                    <label class="col-xs-3 control-label">Caption :</label>
                                                    <div class="form-group m-top-lg row">
                                                        <label class="col-xs-3 control-label">images File :</label>
                                                        <div class="col-xs-5">
                                                            <input type="file" id="image" class="form-control"
                                                                   name="manage_image"
                                                                   style="height:inherit;">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-xs-3 control-label">Caption :</label>
                                                        <div class="col-xs-5">
                                                            <textarea class="form-control"
                                                                      name="caption_name"></textarea>
                                                            <br/>
                                                            <button type="submit" class="btn btn-primary">Upload your
                                                                images
                                                            </button>
                                                            <br/>
                                                            <small><i>Supported files include: png, jpg, jpeg, gif,
                                                                    tif </i>
                                                            </small>
                                                            <small><i>If you dont see your file format please email <a
                                                                            href="javascript:;"> support@rorreport
                                                                        .com</a></i></small>
                                                            <small><i>To upload a PDF or Audio file please email <a
                                                                            href="javascript:;"> support_media@rorreport
                                                                        .com</a></i></small>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div>
                                                    <strong class="text-danger">Just click continue if you don't have
                                                        anything to upload </strong>
                                                </div>
                                            </div>


                                            <div id="youtube_video_tab" class="upload_tab">youtube video</div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
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


@endsection
<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>


<script>

    $(document).ready(function () {
        var query = window.location.search.substring(1);
        var vars = query.split("=");
        if (vars[0] == "step") {
            var stepno = vars[1];
            $("#rebuttaltab" + stepno).trigger('click');
        }


//        $(document.body).on('click', $("input[name=upload]"), function () {
//            var obj = $(this);
//            console.log(obj);
//            console.log(obj.val());
//        });

    });
    function test(value) {
        $(".upload_tab").hide();
        $("#" + value + "_tab").show();
//        document.getElementById("answer").value = browser;
//        console.log(value);
    }

</script>