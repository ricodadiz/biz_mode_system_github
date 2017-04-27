@extends('layout.in_app')
@section('content')
        <!-- Login Forms -->
        <div class="row">
            <div class="col-lg-4">
                <!-- Material Login -->
                    @if($user->can('add_warehouse'))
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
                            <h3 class="block-title">Add Warehouse</h3>
                        </div>
                        <div class="block-content">
                            @if(Session::get('add_error'))
                                <div class="alert alert-error alert-danger">
                                {{Session::get('add_error')->first("warehouse_name")}}
                                </div>
                            @endif
                            @if(Session::get('message_add'))
                                <div class="alert alert-success">
                                {{Session::get('message_add')["message"]}}
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
                    @endif
                    <!-- END Material Login -->
                    <!-- Material Login -->
                    @if($user->can('edit_warehouse'))
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
                            <h3 class="block-title">Edit Warehouse</h3>
                        </div>
                        <div class="block-content">
                            @if(Session::get('edit_error'))
                                <div class="alert alert-error alert-danger">
                                {{Session::get('edit_error')->first("warehouse_name")}}
                                </div>
                            @endif
                            @if(Session::get('message_edit'))
                                <div class="alert alert-success">
                                {{Session::get('message_edit')["message"]}}
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
                    @endif
                    <!-- END Material Login -->
                    <!-- Material Login -->
                    @if($user->can('delete_warehouse'))
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
                            <h3 class="block-title">Delete Warehouse</h3>
                        </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('warehouse/'.$company->id.'/delete_warehouse')}}" method="post">
                                <div class="form-group">
                                    @if(Session::get('delete_error'))
                                        <div class="alert alert-error alert-danger">
                                        {{Session::get('delete_error')->first("warehouse_name")}}
                                        </div>
                                    @endif
                                    @if(Session::get('message_delete'))
                                        <div class="alert alert-success">
                                        {{Session::get('message_delete')["message"]}}
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
                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Delete Selected Warehouse</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endif
                <!-- END Material Login -->
            </div>

            <div class="col-md-8">

            @if($user->can('view_warehouse'))
            <div class="col-md-6">

                <div class="block">
                    <div class="block-header">
                        <div class="block-options">
                            <small>*This will be the list of Warehouses</small>
                        </div>
                        <h3 class="block-title">Warehouse List</h3>
                    </div>
                    <div class="block-content">
                        <table class="table table-striped table-borderless table-header-bg">
                            <thead>
                                <tr>
                                    <th style="width: 20%;">Warehouse Name</th>
                                    <th style="width: 60%;">Location</th>
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

@stop