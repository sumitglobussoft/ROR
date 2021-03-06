@extends('Admin/Layouts/adminlayout')

@section('title', 'Category')


@section('content')
        <!-- Start Main Container -->
<div class="main-container">
    <div class="page-header no-breadcrumb font-header">Sub-Categories</div>
    <span class="error">{!! $errors->first('errMsg') !!}</span>
    <div class="content-wrap">
        <div class="row editSubCategory">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="title">Edit Sub-Category</div>
                    </div>
                    <div class="panel-body">
                        <form action="/admin/updatesubcategory" method="post" role="form">
                            <div class="form-group form-input-group m-t-30 m-b-5">
                                <input type="hidden" name="editcategoryid" id="editcategoryid"
                                       class="form-control input-lg font-14" placeholder="User ID" value=""/>
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5">
                                <input type="hidden" name="editsubcategoryid" id="editsubcategoryid"
                                       class="form-control input-lg font-14" placeholder="User ID" value=""/>
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5">
                                <input type="text" name="editsubcategoryname" id="editsubcategoryname"
                                       class="form-control input-lg font-14" placeholder="Username" value="" required/>
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5">
                                <select class="form-control input-lg font-14" name="editsubcategorystatus"
                                        id="editsubcategorystatus">
                                    <option disabled> Status</option>
                                    <option value="1"> Active</option>
                                    <option value="0"> Inactive</option>
                                </select>
                            </div>
                            <div class="form-group form-input-group m-t-30 m-b-5">
                                <button type="submit" class="btn btn-main">Edit Sub-Category</button>
                                <button type="button" class="btn btn-dark edit-subtoggle">Cancel</button>
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
                        <div class="text-left">
                            <a href="/admin/category" class="btn btn-primary"> <i class="fa fa-back"></i>Back to
                                Category </a>
                        </div>
                        <div class="text-left">
                            <h2> Category : {{$category_name}} </h2>
                        </div>
                        <div class="text-right">
                            <a class="btn btn-primary addsubcategory" data-toggle="modal" id="{{$category_id}}"> <i
                                        class="fa fa-plus"></i> Add sub-Category </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped font-12" id="datatable">
                                <thead>
                                <tr>
                                    <th>Sl. No.</th>
                                    <th>Created By</th>
                                    <th>Sub-Category Name</th>
                                    <th>Status</th>
                                    <!--<th>Status Change</th>-->
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(sizeof($subcategory_data) > 0)
                                    <?php $index = 1; ?>
                                    @foreach($subcategory_data as $data)
                                        <tr>
                                            <td> <?php echo $index; ?></td>
                                            <td>{{$data->display_name}}</td>
                                            <td>{{$data->subcategory_name}}</td>
                                            <td class="text-center">
                                                @if($data->status==0)
                                                    <label class="label label-danger">InActive</label>
                                                @endif
                                                @if($data->status==1)
                                                    <label class="label label-success">Active</label>
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
                                                   id="{{$data->subcategory_id}}"
                                                   data-category-id="{{$data->category_id}}"
                                                   data-subcategory="{{$data->subcategory_name}}"
                                                   data-substatus="{{$data->status}}"
                                                   class="btn btn-info edit-subcategory"> <i class="fa fa-pencil"></i>
                                                </a>
                                                <a href="javascript:;" data-toggle="modal"
                                                   id="{{$data->subcategory_id}}"
                                                   data-category-id="{{$data->category_id}}"
                                                   data-subcategory="{{$data->subcategory_name}}"
                                                   data-substatus="{{$data->status}}"
                                                   class="btn btn-danger delete-subcategory"> <i
                                                            class="fa fa-trash"></i> </a>

                                            </td>
                                        </tr>
                                        <?php $index++; ?>
                                    @endforeach
                                @else
                                    No Category Data!!
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
                <h4 class="modal-title font-header text-dark">Add Sub-Category</h4>
            </div>
            <form action="/admin/addsubcategory" method="post" role="form">
                <div class="modal-body">
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="text" name="subcategory" class="form-control input-lg font-14"
                               placeholder="Category Name" required>
                    </div>
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="hidden" name="addcategoryid" id="addcategoryid"
                               class="form-control input-lg font-14" placeholder="Sub Category Name" required>
                    </div>
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <select class="form-control input-lg font-14" name="subcategorystatus">
                            <option disabled> Status</option>
                            <option value="1" selected> Active</option>
                            <option value="0"> Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-main">Add Sub-Category</button>
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
                <h4 class="modal-title font-header text-dark">Delete Category</h4>
            </div>
            <form action="/admin/deletesubcategory" method="post" role="form">
                <div class="modal-body">
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="hidden" id="deletesubcategoryid" name="deletesubcategoryid"
                               class="form-control input-lg font-14"/>
                    </div>
                    <div class="form-group form-input-group m-t-30 m-b-5">
                        <input type="hidden" id="deletecategoryid" name="deletecategoryid"
                               class="form-control input-lg font-14"/>
                    </div>
                    <div class="form-group form-input-group m-t-5 m-b-5">
                        <p> Do you want to delete this Sub-Category ? </p>
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
            $('#datatable').DataTable();
        });
    </script>
@endsection
