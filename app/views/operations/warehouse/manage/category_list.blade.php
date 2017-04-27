@extends('layout.in_app')
@section('content')
        <!-- Login Forms -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Material Login -->
                    @if($user->can('add_category'))
                    <div class="block block-themed">
                        <div class="block-header bg-primary">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Add Category</h3>
                        </div>
                        <div class="block-content">
                            @if(Session::get('add_error'))
                                <div class="alert alert-error alert-danger">
                                {{Session::get('add_error')->first("category_name")}}
                                </div>
                            @endif
                            @if(Session::get('message_add'))
                                <div class="alert alert-success">
                                {{Session::get('message_add')["message"]}}
                                </div>
                            @endif
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/add_category')}}" method="post">
                                <div class="form-group">
                                <label class="col-xs-12" for="add-category">Category Name</label>
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="add-category" name="add-category" placeholder="Enter new category..">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Add Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    <!-- END Material Login -->
                    <!-- Material Login -->
                    @if($user->can('edit_category'))
                    <div class="block block-themed">
                        <div class="block-header bg-success">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Edit Category</h3>
                        </div>
                        <div class="block-content">
                            @if(Session::get('edit_error'))
                                <div class="alert alert-error alert-danger">
                                {{Session::get('edit_error')->first("category_name")}}
                                </div>
                            @endif
                            @if(Session::get('message_edit'))
                                <div class="alert alert-success">
                                {{Session::get('message_edit')["message"]}}
                                </div>
                            @endif
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/edit_category')}}" method="post">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <select class="form-control" id="existing_category" name="existing_category" size="1" required>
                                                @if(count($categories) > 0)
                                                    @foreach($categories as $cat)
                                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                                    @endforeach
                                                @else
                                                    <option selected disabled>Add More Categories!</option>
                                                @endif
                                            </select>
                                            <label for="existing_category">Choose Existing Category</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="new_category" name="new_category" placeholder="Enter New Category Name.." required>
                                            <label for="new_category">New Category Name </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Edit Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    <!-- END Material Login -->
                    <!-- Material Login -->
                    @if($user->can('delete_category'))
                    <div class="block block-themed">
                        <div class="block-header bg-danger">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Delete Category</h3>
                        </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/delete_category')}}" method="post">
                                <div class="form-group">
                                    @if(Session::get('delete_error'))
                                        <div class="alert alert-error alert-danger">
                                        {{Session::get('delete_error')->first("category_name")}}
                                        </div>
                                    @endif
                                    @if(Session::get('message_delete'))
                                        <div class="alert alert-success">
                                        {{Session::get('message_delete')["message"]}}
                                        </div>
                                    @endif
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <select class="form-control" id="delete_category" name="delete_category" size="1" required>
                                                @if(count($categories) > 0)
                                                    @foreach($categories as $cat)
                                                            <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                                    @endforeach
                                                @else
                                                    <option selected disabled>Add More Categories!</option>
                                                @endif
                                            </select>
                                            <label for="existing_category">Choose Existing Category</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Delete Selected Category</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                <!-- END Material Login -->
            </div>
            @if($user->can('view_category'))
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header">
                        <div class="block-options">
                            <small>*This will be the list of Product Categories</small>
                        </div>
                        <h3 class="block-title">Category List</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-borderless table-header-bg">
                            <thead>
                                <tr>
                                    <th style="width: 80%;">Category Name</th>
                                    <th style="width: 20%;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($categories) > 0)
                                    @foreach($categories as $cat)
                                        <tr>
                                            <td>{{$cat->category_name}}</td>
                                            <td>{{$cat->status}}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="4">No Data</td></tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
        </div>
        <!-- END Login Forms -->

@stop