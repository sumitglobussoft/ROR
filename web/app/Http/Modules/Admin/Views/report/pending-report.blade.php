@extends('Admin/Layouts/adminlayout')

@section('title', 'Report')


@section('content')
<!-- Start Main Container -->
<style>
    .padd-10 {
        padding-left: 10px;
        padding-right: 10px
    }
</style>
<div class="main-container">
    <div class="page-header no-breadcrumb font-header">Pending Reports</div>
    <span class="error">{!! $errors->first('errMsg') !!}</span>
    <div class="content-wrap">


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-striped font-12" id="datatable">
                                <thead>
                                    <tr>
                                        <th>Sl. No.</th>
                                        <th>Report Id</th>
                                        <th>Reported By</th>
                                        <th>Topic</th>
                                        <th>Category</th>
                                        <th>Company or Individual Name</th>
                                        <th>AKA's</th>
                                        <th>Web Address</th>
                                        <th>Report Title</th>
                                        <th>Status</th>
                                        <th>Change Status</th>
                                        <th>Edit/Delete</th>
                                        <th>Actions</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(isset($pending_report_data))
                                    @if(sizeof($pending_report_data) > 0)
                                    <?php $index = 1; ?>
                                    @foreach($pending_report_data as $data)                                    
                                    <tr>
                                        <td> <?php echo $index; ?></td>
                                        <td>{{$data->report_id}}</td>
                                        <td>{{$data->display_name}}</td>
                                        <td>{{$data->category_name}}</td>
                                        <td>{{$data->subcategory_name}}</td>
                                        <td>{{$data->company_or_individual_name}}</td>
                                        <td>{{$data->company_or_individual_aka}}</td>
                                        <td>{{$data->web_address}}</td>
                                        <td>{{$data->report_title}}</td>
                                        <td class="text-center">                                            
                                            @if($data->status==0)
                                            <label class="label label-danger">Pending</label>
                                            @endif
                                            @if($data->status==1)
                                            <label class="label label-success">Approved</label>
                                            @endif
                                            @if($data->status==2)
                                            <label class="label label-success">UnApproved</label>
                                            @endif
                                        </td>
                                        <td>
                                            <select id="changestatus" data-report-id="{{$data->report_id}}" class="changestatus" name="changestatus">
                                                <option selected disabled value="default">change status</option>
                                                @if($data->status!=0)
                                                <option value="0">Pending</option>
                                                @endif
                                                @if($data->status!=1)
                                                <option value="1">Approved</option>
                                                @endif
                                                @if($data->status!=2)
                                                <option value="2">Unapproved</option>
                                                @endif
                                            </select>
                                        </td>
                                        <td class="btn-group text-center">
                                            <a href="javascript:;" data-toggle="modal" id="{{$data->report_id}}"  class="btn btn-info edit-report padd-10"> <i class="fa fa-pencil"></i> </a>
                                            <a href="javascript:;" data-toggle="modal" id="{{$data->report_id}}"   class="btn btn-danger delete-report padd-10"> <i class="fa fa-trash"></i> </a>
                                            <!--<a href="/admin/subcategory/{{$data->category_id}}" data-toggle="modal" id="{{$data->category_id}}" data-category="{{$data->category_name}}" data-status ="{{$data->status}}" class="btn btn-info"> <i class="fa">View Sub-Category </i> </a>-->
                                           
                                        </td>
                                        <td>
                                             <a href="/admin/review/{{$data->report_id}}" class="btn btn-info "> <i class="fa">View Reviews</i> </a>
                                        </td>
                                        <td>
                                         <a href="/admin/viewreport/{{$data->report_id}}" class="btn btn-info "> <i class="fa">View Details</i> </a>
                                        </td>
                                    </tr>
                                    <?php $index++; ?>
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


<div class="modal modal-scale fade" id="deleteModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title font-header text-dark">Delete Report</h4>
            </div>
            <form action="/admin/deletereport" method="post" role="form">
                <div class="modal-body">
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="hidden" id="deletereportid" name="deletereportid" class="form-control input-lg font-14" />
                    </div>
                    <div class="form-group form-input-group m-t-5 m-b-5">
                        <p> Do you want to delete this Report? </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-main">Delete</button>
                    <button type="button" class="btn btn-dark" id="delete-no" >Cancel</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal modal-scale fade" id="statusModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title font-header text-dark">Confirm</h4>
            </div>
            <form action="/admin/changereportstatus" method="post" role="form">
                <div class="modal-body">
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="hidden" id="changereportid" name="changereportid" class="form-control input-lg font-14" />
                    </div>
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="hidden" id="currentstatus" name="currentstatus" class="form-control input-lg font-14" />
                    </div>

                    <div class="form-group form-input-group m-t-5 m-b-5">
                        <p> Do you want to <span id="selectedstatus"></span> this report ? </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-main">Yes</button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal">No</button>
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
        $('#datatable').DataTable();
        
        
    });
    $(document).ready(function () {
        $('.changestatus').on('change', function () {
            console.log($(this).attr('data-report-id'))
            var reportid=$(this).attr('data-report-id');
            var selected=$(this).val();
            if(selected == "0"){
                $("#selectedstatus").html("draft")
                $("#currentstatus").val("0");
            }
            else if(selected == "1"){
                $("#selectedstatus").html("approve")
                $("#currentstatus").val("1");
            }
            else if(selected == "2"){
                $("#selectedstatus").html("unApprove")
                $("#currentstatus").val("3");
            }
        
            $("#changereportid").val(reportid);
            $("#statusModal").modal("show");
 
            //            document.location = "/admin/filereport?step=5";
        
        });
        $('.delete-report').on('click', function () {
            var reportid=$(this).attr("id");
            $('#deletereportid').val(reportid);            
            $('#deleteModal').modal('show');           
        });
        $('#delete-no').on('click', function () {
            var deletereportid=$('#deletereportid').val(); 
            $('#changestatus option[value="default"]').prop("selected", true);
            //            $('#deleteModal').modal('hide');           
        });
        $('.edit-report').on('click', function () {
            var reportid=$(this).attr("id");
            document.location = "/admin/storesession/"+reportid;
            //             $.ajax({
            //                url: '/admin/ajaxaction',
            //                type: 'POST',
            //                dataType: 'json',
            //                data: {
            //                    method:"editreport",
            //                    reportid:reportid
            //                },
            //                success: function (response) {
            //                    console.log(response);  
            //                    
            //                }
            //            }); 
            //           $('.editCategory').show();
        });
        
    });
</script>
@endsection
