@extends('layout.in_app')
@section('content')
        <!-- Login Forms -->
        <div class="row">
            <div class="col-lg-6">
                <!-- Material Login -->
                    @if($user->can('add_brand'))
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
                            <h3 class="block-title">Add Brand</h3>
                        </div>
                        <div class="block-content">
                            @if(Session::get('add_error'))
                                <div class="alert alert-error alert-danger">
                                {{Session::get('add_error')->first("brand_name")}}
                                </div>
                            @endif
                            @if(Session::get('message_add'))
                                <div class="alert alert-success">
                                {{Session::get('message_add')["message"]}}
                                </div>
                            @endif
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/add_brand')}}" method="post">
                                <div class="form-group">
                                <label class="col-xs-12" for="add-brand">Brand Name</label>
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="add-brand" name="add-brand" placeholder="Enter new brand..">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Add Brand</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    <!-- END Material Login -->
                    <!-- Material Login -->
                    @if($user->can('edit_brand'))
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
                            <h3 class="block-title">Edit Brand</h3>
                        </div>
                        <div class="block-content">
                            @if(Session::get('edit_error'))
                                <div class="alert alert-error alert-danger">
                                {{Session::get('edit_error')->first("brand_name")}}
                                </div>
                            @endif
                            @if(Session::get('message_edit'))
                                <div class="alert alert-success">
                                {{Session::get('message_edit')["message"]}}
                                </div>
                            @endif
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/edit_brand')}}" method="post">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <select class="form-control" id="existing_brand" name="existing_brand" size="1">
                                                @if(count($brands) > 0)
                                                    @foreach($brands as $br)
                                                            <option value="{{$br->id}}">{{$br->brand_name}}</option>
                                                    @endforeach
                                                @else
                                                    <option selected disabled>Add More Brands!</option>
                                                @endif
                                            </select>
                                            <label for="existing_brand">Choose Existing Brand</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <input class="form-control" type="text" id="new_brand" name="new_brand" placeholder="Enter New Brand Name..">
                                            <label for="new_brand">New Brand Name </label>
                                        </div>
                                    </div>
                                </div>
<!--                                         <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material">
                                                    <select class="form-control" id="new_brand_status" name="new_brand_status" size="1">
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                    <label for="contact2-subject">Where?</label>
                                                </div>
                                            </div>
                                        </div> -->
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Edit Brand</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                    <!-- END Material Login -->
                    <!-- Material Login -->
                    @if($user->can('delete_brand'))
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
                            <h3 class="block-title">Delete Brand</h3>
                        </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/delete_brand')}}" method="post">
                                <div class="form-group">
                                    @if(Session::get('delete_error'))
                                        <div class="alert alert-error alert-danger">
                                        {{Session::get('delete_error')->first("brand_name")}}
                                        </div>
                                    @endif
                                    @if(Session::get('message_delete'))
                                        <div class="alert alert-success">
                                        {{Session::get('message_delete')["message"]}}
                                        </div>
                                    @endif
                                    <div class="col-xs-12">
                                        <div class="form-material">
                                            <select class="form-control" id="delete_brand" name="delete_brand" size="1" required>
                                                @if(count($brands) > 0)
                                                    @foreach($brands as $br)
                                                            <option value="{{$br->id}}">{{$br->brand_name}}</option>
                                                    @endforeach
                                                @else
                                                    <option selected disabled>Add More Brands!</option>
                                                @endif
                                            </select>
                                            <label for="existing_brand">Choose Existing Brand</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Delete Selected Brand</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                <!-- END Material Login -->
            </div>
            @if($user->can('view_brand'))
            <div class="col-md-6">
                <div class="block">
                    <div class="block-header">
                        <div class="block-options">
                            <small>*This will be the list of Product Brands</small>
                        </div>
                        <h3 class="block-title">Brand List</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-borderless table-header-bg">
                            <thead>
                                <tr>
                                    <th style="width: 80%;">Brand Name</th>
                                    <th style="width: 20%;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($brands) > 0)
                                    @foreach($brands as $br)
                                        <tr>
                                            <td>{{$br->brand_name}}</td>
                                            <td>{{$br->status}}</td>
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