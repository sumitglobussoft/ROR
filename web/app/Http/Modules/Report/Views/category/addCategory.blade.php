@extends('Admin/Layouts/adminlayout')

@section('title', 'New Category') {{--TITLE GOES HERE--}}

@section('headcontent')
    {{--OPTIONAL--}}
    {{--PAGE STYLES OR SCRIPTS LINKS--}}
    <link href="/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    {{--PAGE CONTENT GOES HERE--}}


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-white">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title">Category Details</h4>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="category_name" name="category_name"
                                       value="{{old('category_name')}}">
                                <span class="error">{!! $errors->first('category_name') !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Parent Category</label>

                            <div class="col-sm-4">
                                <select name="parent_category" class="form-control m-b-sm">
                                    <option value="0">-Root level-</option>
                                    <?php
                                    function treeView($array, $id = 0)
                                    {
                                        for ($i = 0; $i < count($array); $i++) {
                                            if ($array[$i]->parent_category_id == $id) {
                                                echo '<option value="' . $array[$i]->category_id . '">' . $array[$i]->display_name . $array[$i]->category_name . '</option>';
                                                treeView($array, $array[$i]->category_id);
                                            }
                                        }
                                    }
                                    ?>
                                    @if(isset($allCategories))
                                        <?php treeView($allCategories);  ?>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-placeholder" class="col-sm-2 control-label">Description</label>

                            <div class="col-sm-4">
                                <textarea name="category_desc" class="form-control">{{old('category_desc')}}</textarea>
                                <span class="error">{!! $errors->first('category_desc') !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Status</label>

                            <div class="col-sm-4">
                                <input type="radio" name="status" value="1" checked>Active
                                <input type="radio" name="status" value="0">Inactive
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image</label>

                            <div class="col-sm-4">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail"
                                         style="width: 200px; height: 150px;">
                                        <img src="/assets/images/no-image.png" alt=""/>
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                         style="max-width: 200px; max-height: 150px;">
                                    </div>
                                    <div>
                                                            <span class="btn btn-circle default btn-file">
                                                                <span class="fileinput-new">
                                                                    Select image </span>
                                                                <span class="fileinput-exists">
                                                                    Change </span>
                                                                <input type="file" name="category_image"
                                                                       accept="image/*">
                                                            </span>
                                        <a href="#" class="btn btn-circle default fileinput-exists"
                                           data-dismiss="fileinput">
                                            Remove </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        Meta Data
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Page title</label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="page_title"
                                       value="{{old('category_name')}}">
                                <span class="error">{!! $errors->first('page_title') !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Meta description</label>

                            <div class="col-sm-4">
                                <textarea name="meta_desc" class="form-control">{{old('meta_desc')}}</textarea>
                                <span class="error">{!! $errors->first('meta_desc') !!}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Meta keywords</label>

                            <div class="col-sm-4">
                                <textarea name="meta_keywords" class="form-control">{{old('meta_keywords')}}</textarea>
                                <span class="error">{!! $errors->first('meta_keywords') !!}</span>
                            </div>
                        </div>
                        <div class="form-actions" align="center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection


@section('pagejavascripts')
    <script src="/assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
@endsection
