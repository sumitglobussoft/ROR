@extends('Admin/Layouts/adminlayout')

@section('title', 'Review')


@section('content')
        <!-- Start Main Container -->
<div class="main-container">
    <div class="page-header no-breadcrumb font-header">All Reviews</div>
    <span class="error">{!! $errors->first('errMsg') !!}</span>
    <div class="content-wrap">
        <div class="row editReview">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="title">Edit Review</div>
                    </div>
                    <div class="panel-body">
                        <form action="/admin/updatereview" method="post" role="form">

                            <div class="form-group form-input-group m-t-30 m-b-5">
                                <input type="hidden" name="editreviewid" id="editreviewid"
                                       class="form-control input-lg font-14" value=""/>
                                <input type="hidden" name="editreportid" id="editreportid"
                                       class="form-control input-lg font-14" value=""/>
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5 col-md-10">
                                <label>Review Title</label>
                                <input type="text" name="editreviewtitle" id="editreviewtitle"
                                       class="form-control input-lg font-14" placeholder="Review Title" value=""
                                       required/>
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5 col-md-10">
                                <label>Review Body</label>
                                <textarea class="editorDemo" name="editreviewtext" id="editreviewtext"></textarea>
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5 col-md-10">
                                <label>Original Report</label>
                                <span id="originalreport"></span>
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5 col-md-10">
                                <label>Review Status</label>
                                <select class="form-control input-lg font-14" name="editreviewstatus"
                                        id="editreviewstatus">
                                    <option disabled> Status</option>
                                    <option value="2"> UnApproved</option>
                                    <option value="1"> Approved</option>
                                    <option value="0"> Pending</option>
                                </select>
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5 col-md-10">
                                <button type="submit" class="btn btn-main">Update Review</button>
                                <button type="button" class="btn btn-dark edit-toggle">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row addReview">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="title">Add Review</div>
                    </div>
                    <div class="panel-body">
                        <form action="/admin/addreview" method="post" role="form">

                            <div class="form-group form-input-group m-t-30 m-b-5">
                                <input type="hidden" name="addreportid" id="addreportid"
                                       class="form-control input-lg font-14" value="">
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5">
                                <input type="text" name="reviewtitle" id="reviewtitle"
                                       class="form-control input-lg font-14" placeholder="Review Title" value=""
                                       required/>
                            </div>
                            <textarea class="editorDemo" name="reviewtext" id="reviewtext"></textarea>
                            <div class="form-group form-input-group m-t-30 m-b-5">
                                <select class="form-control input-lg font-14" name="reviewstatus" id="reviewstatus">
                                    <option disabled> Status</option>
                                    <option value="1"> Active</option>
                                    <option value="0"> Inactive</option>
                                </select>
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5">
                                <button type="submit" class="btn btn-main">Add Review</button>
                                <button type="button" class="btn btn-dark edit-toggle">Cancel</button>
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
                            <!--<button class="btn btn-primary add-review" data-toggle="modal" > <i class="fa fa-plus"></i> Add Review </button>-->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped font-12" id="datatable">
                                <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Created By</th>
                                    <th>Report Id</th>
                                    <th>Report Title</th>
                                    <th>Review Title</th>
                                    <!--<th>Review Text</th>-->
                                    <th>Status</th>
                                    <!--<th>Status Change</th>-->
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($reviewdata))
                                    @if(sizeof($reviewdata) > 0 )
                                        <?php $index = 1; ?>
                                        @foreach($reviewdata as $data)
                                            @if($data->review_id)
                                                <tr>
                                                    <td> <?php echo $index; ?></td>
                                                    <td>{{$data->display_name}}</td>
                                                    <td>{{$data->report_id}}</td>
                                                    <td>{{$data->report_title}}</td>
                                                    <td>{{$data->review_title}}</td>
                                                    <!--<td>{{$data->review_text}}</td>-->
                                                    <td class="text-center">
                                                        @if($data->status==0)
                                                            <label class="label label-warning">Pending</label>
                                                        @endif
                                                        @if($data->status==1)
                                                            <label class="label label-success">Approved</label>
                                                        @endif
                                                        @if($data->status==2)
                                                            <label class="label label-success">UnApproved</label>
                                                        @endif
                                                    </td>

                                                    <!--                                        <td class="text-center">
                                                                                                <label class="switch-toggle m-l-5 switch-green">
                                                                                                    <input type="checkbox" checked="" />
                                                                                                    <span></span>
                                                                                                </label>
                                                                                            </td>-->
                                                    <td class="text-center">
                                                        <a href="javascript:;" data-toggle="modal"
                                                           id="{{$data->review_id}}"
                                                           data-category="{{$data->review_title}}"
                                                           data-status="{{$data->status}}"
                                                           class="btn btn-info edit-review"> <i
                                                                    class="fa fa-pencil"></i> </a>
                                                        <a href="javascript:;" data-toggle="modal"
                                                           id="{{$data->review_id}}" report-id="{{$data->report_id}}"
                                                           class="btn btn-danger delete-review"> <i
                                                                    class="fa fa-trash"></i> </a>

                                                    </td>
                                                </tr>
                                                <?php $index++; ?>
                                            @endif
                                        @endforeach
                                    @else
                                        No Category Data!!
                                    @endif
                                @endif

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

@endsection
        <!-- /.wrapper -->
@section('modalcontent')
        <!-- Start Modal -->
<div class="modal modal-scale fade" id="addModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title font-header text-dark">Add Review</h4>
            </div>
            <form action="/admin/addreview" method="post" role="form">
                <div class="modal-body">
                    <input type="text" name="addreportid" id="addreportid" class="form-control input-lg font-14"
                           value="">
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="text" name="reviewtitle" id="reviewtitle" class="form-control input-lg font-14"
                               placeholder="Review Title" required>
                    </div>
                    <textarea class="editorDemo" name="reviewtext" id="reviewtext"></textarea>
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <select class="form-control input-lg font-14" name="reviewstatus">
                            <option disabled> Status</option>
                            <option value="1" selected> Active</option>
                            <option value="0"> Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-main">Add Review</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal modal-scale fade" id="deleteModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title font-header text-dark">Delete Review</h4>
            </div>
            <form action="/admin/deletereview" method="post" role="form">
                <div class="modal-body">
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="hidden" id="deletereviewid" name="deletereviewid"
                               class="form-control input-lg font-14"/>
                        <input type="hidden" id="deletereportid" name="deletereportid"
                               class="form-control input-lg font-14"/>
                    </div>
                    <div class="form-group form-input-group m-t-5 m-b-5">
                        <p> Do you want to delete this Review ? </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-main">Delete</button>
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
@section('pagescript')
    <script>
        $(function () {
            $('.editorDemo').summernote();
            $('#datatable').DataTable();
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.add-review').on('click', function () {
                $('.addReview').show();
            })
            $('.edit-review').on('click', function () {
                var reviewid = $(this).attr("id");
                $.ajax({
                    url: '/admin/ajaxaction',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        method: "getreviewdetails",
                        reviewid: reviewid
                    },
                    success: function (response) {
                        console.log(response);
                        $('#editreviewid').val(response.review_id);
                        $('#editreportid').val(response.report_id);
                        $('#editreviewtitle').val(response.review_title);
                        $('#editreviewtext').code(response.review_text);
                        $('#editreviewstatus').val(response.status);
                        $('#originalreport').html(response.report_text);
                        $('.editReview').show();
                    }
                }); //End of  ajax

            });
            $('.edit-toggle').on('click', function () {
                $('.editReview').hide();
                $('.addReview').hide();
            });
            $('.delete-review').on('click', function () {
                var reviewid = $(this).attr("id");
                var reportid = $(this).attr("report-id");
                $('#deletereviewid').val(reviewid);
                $('#deletereportid').val(reportid);
                $('#deleteModal').modal('show');
            });
        });
    </script>
@endsection
