@extends('layout.in_app')
@section('content')
<!-- Main Content -->
    <div class="block">
        <ul class="nav nav-tabs nav-justified push-20" data-toggle="tabs">
            <li>
                <a href="#tab-warehouse"><i class="fa fa-fw fa-pencil"></i> Warehouse</a>
            </li>
            <li>
                <a href="#tab-category"><i class="fa fa-fw fa-pencil"></i> Categories</a>
            </li>
            <li>
                <a href="#tab-brand"><i class="fa fa-fw fa-pencil"></i> Brands</a>
            </li>
        </ul>
        <div class="block-content tab-content">
            <!-- Units Tab -->
            <div class="tab-pane fade in active" id="tab-warehouse">
                <div class="row items-push">
                            <!-- Login Forms -->
                            <div class="row">
                                @if($user->can('add_warehouse'))
                                <div class="col-lg-4">
                                    <!-- Material Login -->
                                    <div class="block block-themed">
                                        <div class="block-header bg-primary">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Add Warehouse</h3>
                                        </div>
                                        <div class="block-content">
                                            @if(Session::get('add_error_warehouse'))
                                                <div class="alert alert-error alert-danger">
                                                @foreach(Session::get('add_error_warehouse')["messages"]->all() as $m)
                                                {{$m}}
                                                @endforeach
                                                </div>
                                            @endif
                                            @if(Session::get('message_add_warehouse'))
                                                <div class="alert alert-success">
                                                {{Session::get('message_add_warehouse')["message"]}}
                                                </div>
                                            @endif
				                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/add_warehouse')}}" method="post">
				                                <div class="form-group">
				                                <label class="col-xs-12" for="add-warehouse">Warehouse Name</label>
				                                    <div class="col-xs-12">
				                                        <div class="form-material">
				                                            <input class="form-control" type="text" id="add-warehouse" name="add-warehouse" placeholder="Enter new warehouse..">
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="form-group">
				                                <label class="col-xs-12" for="add-warehouse">Warehouse Address</label>
				                                    <div class="col-xs-12">
				                                        <div class="form-material">
				                                            <input class="form-control" type="text" id="add-warehouse-address" name="add-warehouse-address" placeholder="Enter warehouse address..">
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="form-group">
				                                    <div class="col-xs-12">
				                                        <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Add Warehouse</button>
				                                    </div>
				                                </div>
				                            </form>
                                        </div>
                                    </div>
                                <!-- END Material Login -->
                                </div>
                                @endif
                                @if($user->can('edit_warehouse'))
                                <div class="col-lg-4">
                                <!-- Material Login -->
                                    <div class="block block-themed">
                                        <div class="block-header bg-success">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Edit Warehouse</h3>
                                        </div>
                                        <div class="block-content">
                                            @if(Session::get('edit_error_warehouse'))
                                                <div class="alert alert-error alert-danger">
                                                {{Session::get('edit_error_warehouse')["messages"]->first("warehouse_name")}}
                                                </div>
                                            @endif
                                            @if(Session::get('message_edit_warehouse'))
                                                <div class="alert alert-success">
                                                {{Session::get('message_edit_warehouse')["message"]}}
                                                </div>
                                            @endif
				                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/edit_warehouse')}}" method="post">
				                                <div class="form-group">
				                                    <div class="col-xs-12">
				                                        <div class="form-material">
				                                            <select class="form-control" id="existing_warehouse" name="existing_warehouse" size="1" required>
				                                                @if(count($warehouse) > 0)
				                                                    @foreach($warehouse as $wh)
				                                                            <option value="{{$wh->id}}">{{$wh->warehouse_name}}</option>
				                                                    @endforeach
				                                                @else
				                                                    <option selected disabled>Add More Warehouses!</option>
				                                                @endif
				                                            </select>
				                                            <label for="existing_warehouse">Choose Existing Warehouse</label>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="form-group">
				                                    <div class="col-xs-12">
				                                        <div class="form-material">
				                                            <input class="form-control" type="text" id="new_warehouse" name="new_warehouse" placeholder="Enter New Warehouse Name.." required>
				                                            <label for="new_warehouse">New Warehouse Name </label>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="form-group">
				                                    <div class="col-xs-12">
				                                        <div class="form-material">
				                                            <input class="form-control" type="text" id="new_warehouse_address" name="new_warehouse_address" placeholder="Enter New Warehouse Address.." required>
				                                            <label for="new_warehouse">New Warehouse Address </label>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="form-group">
				                                    <div class="col-xs-12">
				                                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Edit Warehouse</button>
				                                    </div>
				                                </div>
				                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                        <!-- END Material Login -->
                                        <!-- Material Login -->
                                @if($user->can('delete_warehouse'))
                                <div class="col-lg-4">
                                    <div class="block block-themed">
                                        <div class="block-header bg-danger">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Delete Warehouse</h3>
                                        </div>
                                        <div class="block-content">
                                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/delete_warehouse')}}" method="post">
                                                <div class="form-group">
                                                    @if(Session::get('delete_error_warehouse'))
                                                        <div class="alert alert-error alert-danger">
                                                        {{Session::get('delete_error_warehouse')["messages"]->first("warehouse_name")}}
                                                        </div>
                                                    @endif
                                                    @if(Session::get('message_delete_warehouse'))
                                                        <div class="alert alert-success">
                                                        {{Session::get('message_delete_warehouse')["message"]}}
                                                        </div>
                                                    @endif
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <select class="form-control" id="delete_warehouse" name="delete_warehouse" size="1" required>
                                                            @if(count($warehouse) > 0)
                                                                @foreach($warehouse as $wh)
                                                                        <option value="{{$wh->id}}">{{$wh->warehouse_name}}</option>
                                                                @endforeach
                                                            @else
                                                                <option selected disabled>Add More Warehouses!</option>
                                                            @endif
                                                            </select>
                                                            <label for="existing_warehouse">Choose Existing Warehouse</label>
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
                                </div>
                                @endif
                                    <!-- END Material Login -->
                                @if($user->can('view_warehouse'))
                                <div class="col-lg-12">
                                    <div class="block">
                                        <div class="block-header bg-default">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle" style="color: #ffffff"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title" style="color: #ffffff">Warehouse List</h3>
                                        </div>
                                        <div class="block-content">
                                            <table class="table table-striped table-borderless table-header-bg">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 30%;">Warehouse Name</th>
                                                        <th style="width: 70%;">Location</th>
                                                        <!-- <th style="width: 20%;">Status</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(count($warehouse) > 0)
                                                        @foreach($warehouse as $wh)
                                                            <tr>
                                                                <td>{{$wh->warehouse_name}}</td>
                                                                <td>{{$wh->warehouse_address}}</td>
                                                                <!-- <td>{{$wh->status}}</td> -->
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
                </div>
            </div>
            <!-- END Personal Tab -->
            <!-- Password Tab -->
            <div class="tab-pane fade" id="tab-category">
                <div class="row items-push">
                            <!-- Login Forms -->
                            <div class="row">
                                @if($user->can('add_category'))
                                <div class="col-lg-3">
                                    <!-- Material Login -->
                                    <div class="block block-themed">
                                        <div class="block-header bg-primary">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Add Category</h3>
                                        </div>
                                        <div class="block-content">
                                            @if(Session::get('add_error_category'))
                                                <div class="alert alert-error alert-danger">
                                                @foreach(Session::get('add_error_category')["messages"]->all() as $m)
                                                {{$m}}
                                                @endforeach
                                                </div>
                                            @endif
                                            @if(Session::get('message_add_category'))
                                                <div class="alert alert-success">
                                                {{Session::get('message_add_category')["message"]}}
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
                                                        <div class="form-material">
                                                            <select class="form-control" id="choose-unit" name="choose-unit" size="1">
                                                            @if(count($units) > 0)
                                                                    @foreach($units as $un)
                                                                            <option value="{{$un->id}}">{{$un->unit_name}}</option>
                                                                    @endforeach
                                                            @endif
                                                            </select>
                                                            <label for="choose-unit">Choose Unit</label>
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
                                <!-- END Material Login -->
                                </div>
                                @endif
                                @if($user->can('edit_category'))
                                <div class="col-lg-3">
                                <!-- Material Login -->
                                    <div class="block block-themed">
                                        <div class="block-header bg-success">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Edit Category</h3>
                                        </div>
                                        <div class="block-content">
                                            @if(Session::get('edit_error_category'))
                                                <div class="alert alert-error alert-danger">
                                                {{Session::get('edit_error_category')["messages"]->first("category_name")}}
                                                </div>
                                            @endif
                                            @if(Session::get('message_edit_category'))
                                                <div class="alert alert-success">
                                                {{Session::get('message_edit_category')["message"]}}
                                                </div>
                                            @endif
                                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/edit_category')}}" method="post">
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <select class="form-control" id="existing_category" name="existing_category" size="1">
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
                                                            <input class="form-control" type="text" id="new_category" name="new_category" placeholder="Enter New Category Name..">
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
                                </div>
                                @endif
                                        <!-- END Material Login -->
                                        <!-- Material Login -->
                                @if($user->can('delete_category'))
                                <div class="col-lg-3">
                                    <div class="block block-themed">
                                        <div class="block-header bg-danger">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Delete Category</h3>
                                        </div>
                                        <div class="block-content">
                                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/delete_category')}}" method="post">
                                                <div class="form-group">
                                                    @if(Session::get('delete_error_category'))
                                                        <div class="alert alert-error alert-danger">
                                                        {{Session::get('delete_error_category')["messages"]->first("category_name")}}
                                                        </div>
                                                    @endif
                                                    @if(Session::get('message_delete_category'))
                                                        <div class="alert alert-success">
                                                        {{Session::get('message_delete_category')["message"]}}
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
                                </div>
                                @endif
                                    <!-- END Material Login -->
                                @if($user->can('view_category'))
                                <div class="col-lg-3">
                                    <div class="block">
                                        <div class="block-header bg-default">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle" style="color: #ffffff"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title" style="color: #ffffff">Category List</h3>
                                        </div>
                                        <div class="block-content">
                                            <table class="table table-striped table-borderless table-header-bg">
<!--                                                <thead>
                                                    <tr>
                                                        <th style="width: 100%;">Category Name</th>
                                                    </tr>
                                                </thead> -->
                                                <tbody>
                                                @if(count($categories) > 0)
                                                    @foreach($categories as $cat)
                                                        <tr>
                                                            <td>{{$cat->category_name}}</td>
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
                </div>
            </div>
            <!-- END Password Tab -->

		            <!-- Privacy Tab -->
		            <div class="tab-pane fade" id="tab-brand">
		                <div class="row items-push">
		                    <!-- Login Forms -->
					        <div class="row">
					        	@if($user->can('add_brand'))
					            <div class="col-lg-3">
					                <!-- Material Login -->
					                <div class="block block-themed">
					                    <div class="block-header bg-primary">
					                        <ul class="block-options">
					                            <li>
					                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
					                            </li>
					                        </ul>
					                        <h3 class="block-title">Add Brand</h3>
					                    </div>
					                    <div class="block-content">
				                            @if(Session::get('add_error_brand'))
				                                <div class="alert alert-error alert-danger">
				                                {{Session::get('add_error_brand')["messages"]->first("brand_name")}}
				                                </div>
				                            @endif
				                            @if(Session::get('message_add_brand'))
				                                <div class="alert alert-success">
				                                {{Session::get('message_add_brand')["message"]}}
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
					            <!-- END Material Login -->
					            </div>
					            @endif
					            @if($user->can('edit_brand'))
					            <div class="col-lg-3">
					            <!-- Material Login -->
					                <div class="block block-themed">
					                    <div class="block-header bg-success">
					                        <ul class="block-options">
					                            <li>
					                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
					                            </li>
					                        </ul>
					                        <h3 class="block-title">Edit Brand</h3>
					                    </div>
					                    <div class="block-content">
				                            @if(Session::get('edit_error_brand'))
				                                <div class="alert alert-error alert-danger">
				                                {{Session::get('edit_error_brand')["messages"]->first("brand_name")}}
				                                </div>
				                            @endif
				                            @if(Session::get('message_edit_brand'))
				                                <div class="alert alert-success">
				                                {{Session::get('message_edit_brand')["message"]}}
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
					                            <div class="form-group">
					                       	        <div class="col-xs-12">
					                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Edit Brand</button>
					                                </div>
					                            </div>
					                        </form>
					                    </div>
					                </div>
					            </div>
					            @endif
					                    <!-- END Material Login -->
					                    <!-- Material Login -->
					            @if($user->can('delete_brand'))
					            <div class="col-lg-3">
					                <div class="block block-themed">
					                    <div class="block-header bg-danger">
					                        <ul class="block-options">
					                            <li>
					                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
					                            </li>
					                        </ul>
					                        <h3 class="block-title">Delete Brand</h3>
					                    </div>
					            	    <div class="block-content">
					                        <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/delete_brand')}}" method="post">
					                            <div class="form-group">
				                                    @if(Session::get('delete_error_brand_brand'))
				                                        <div class="alert alert-error alert-danger">
				                                        {{Session::get('delete_error_brand_brand')["messages"]->first("brand_name")}}
				                                        </div>
				                                    @endif
				                                    @if(Session::get('message_delete_brand_brand'))
				                                        <div class="alert alert-success">
				                                        {{Session::get('message_delete_brand_brand')["message"]}}
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
					            </div>
					            @endif
					                <!-- END Material Login -->
					            @if($user->can('view_brand'))
								<div class="col-lg-3">
								    <div class="block">
								        <div class="block-header bg-default">
								            <ul class="block-options">
					                            <li>
					                                <button type="button" data-toggle="block-option" data-action="content_toggle" style="color: #ffffff"></button>
					                            </li>
					                        </ul>
								            <h3 class="block-title" style="color: #ffffff">Brand List</h3>
								        </div>
								        <div class="block-content">
								            <table class="table table-striped table-borderless table-header-bg">
<!-- 								                <thead>
								                    <tr>
								                        <th style="width: 100%;">Brand Name</th>
								                    </tr>
								                </thead> -->
								                <tbody>
				                                @if(count($brands) > 0)
				                                    @foreach($brands as $br)
				                                        <tr>
				                                            <td>{{$br->brand_name}}</td>
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
					    </div>
					<!-- END Login Forms -->
                    </div>
                </div>
            </div>
            <!-- END Privacy Tab -->
        </div>
	</div>
<!-- END Main Content -->
<!-- WAREHOUSE -->
	@if(Session::get("message_add_category")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_add_category')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('add_error_category')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('add_error_category')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_edit_category")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_edit_category')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('edit_error_category')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('edit_error_category')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_delete_category")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_delete_category')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('delete_error_category')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('delete_error_category')['tab']}}").toggleClass('in active');
	</script>
	@endif
<!-- WAREHOUSE -->
<!-- CATEGORY -->
	@if(Session::get("message_add_category")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_add_category')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('add_error_category')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('add_error_category')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_edit_category")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_edit_category')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('edit_error_category')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('edit_error_category')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_delete_category")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_delete_category')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('delete_error_category')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('delete_error_category')['tab']}}").toggleClass('in active');
	</script>
	@endif
<!-- CATEGORY -->
<!-- BRAND -->
	@if(Session::get("message_add_brand")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_add_brand')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('add_error_brand')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('add_error_brand')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_edit_brand")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_edit_brand')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('edit_error_brand')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('edit_error_brand')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_delete_brand")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_delete_brand')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('delete_error_brand')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('delete_error_brand')['tab']}}").toggleClass('in active');
	</script>
	@endif
<!-- BRAND -->
@stop