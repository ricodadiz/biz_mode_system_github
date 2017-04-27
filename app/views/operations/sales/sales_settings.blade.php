@extends('layout.in_app')
@section('content')
<!-- Main Content -->
    <div class="block">
        <ul class="nav nav-tabs nav-justified push-20" data-toggle="tabs">
            <li>
                <a href="#tab-unit"><i class="fa fa-fw fa-pencil"></i> Unit</a>
            </li>
            <li>
                <a href="#tab-vat"><i class="fa fa-fw fa-pencil"></i> VAT</a>
            </li>
            <li>
                <a href="#tab-payment"><i class="fa fa-fw fa-pencil"></i> Payment Type</a>
            </li>
        </ul>
        <div class="block-content tab-content">
            <!-- Units Tab -->
            <div class="tab-pane fade in active" id="tab-unit">
                <div class="row items-push">
                            <!-- Login Forms -->
                            <div class="row">
                                @if($user->can('add_unit'))
                                <div class="col-lg-3">
                                    <!-- Material Login -->
                                    <div class="block block-themed">
                                        <div class="block-header bg-primary">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul> 
                                            <h3 class="block-title">Add Unit</h3>
                                        </div>
                                        <div class="block-content">
                                            @if(Session::get('add_error_unit'))
                                                <div class="alert alert-error alert-danger">
                                                @foreach(Session::get('add_error_unit')["messages"]->all() as $m)
                                                {{$m}}
                                                @endforeach
                                                </div>
                                            @endif
                                            @if(Session::get('message_add_unit'))
                                                <div class="alert alert-success">
                                                {{Session::get('message_add_unit')["message"]}}
                                                </div>
                                            @endif
				                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_unit')}}" method="post">
				                                <div class="form-group">
				                                <label class="col-xs-12" for="add-unit">Unit Name</label>
				                                    <div class="col-xs-12">
				                                        <div class="form-material">
				                                            <input class="form-control" type="text" id="add-unit" name="add-unit" placeholder="Enter new unit..">
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="form-group">
				                                    <div class="col-xs-12">
				                                        <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Add Unit</button>
				                                    </div>
				                                </div>
				                            </form>
                                        </div>
                                    </div>
                                <!-- END Material Login -->
                                </div>
                                @endif
                                @if($user->can('edit_unit'))
                                <div class="col-lg-3">
                                <!-- Material Login -->
                                    <div class="block block-themed">
                                        <div class="block-header bg-success">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Edit Unit</h3>
                                        </div>
                                        <div class="block-content">
                                            @if(Session::get('edit_error_unit'))
                                                <div class="alert alert-error alert-danger">
                                                {{Session::get('edit_error_unit')["messages"]->first("unit_name")}}
                                                </div>
                                            @endif
                                            @if(Session::get('message_edit_unit'))
                                                <div class="alert alert-success">
                                                {{Session::get('message_edit_unit')["message"]}}
                                                </div>
                                            @endif
				                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/edit_unit')}}" method="post">
				                                <div class="form-group">
				                                    <div class="col-xs-12">
				                                        <div class="form-material">
				                                            <select class="form-control" id="existing_unit" name="existing_unit" size="1" required>
				                                                @if(count($units) > 0)
				                                                    @foreach($units as $un)
				                                                            <option value="{{$un->id}}">{{$un->unit_name}}</option>
				                                                    @endforeach
				                                                @else
				                                                    <option selected disabled>Add More Units!</option>
				                                                @endif
				                                            </select>
				                                            <label for="existing_unit">Choose Existing Unit</label>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="form-group">
				                                    <div class="col-xs-12">
				                                        <div class="form-material">
				                                            <input class="form-control" type="text" id="new_unit" name="new_unit" placeholder="Enter New Unit Name.." required>
				                                            <label for="new_unit">New Unit Name </label>
				                                        </div>
				                                    </div>
				                                </div>
				                                <div class="form-group">
				                                    <div class="col-xs-12">
				                                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Edit Unit</button>
				                                    </div>
				                                </div>
				                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                        <!-- END Material Login -->
                                        <!-- Material Login -->
                                @if($user->can('delete_unit'))
                                <div class="col-lg-3">
                                    <div class="block block-themed">
                                        <div class="block-header bg-danger">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Delete Unit</h3>
                                        </div>
                                        <div class="block-content">
                                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/delete_unit')}}" method="post">
                                                <div class="form-group">
                                                    @if(Session::get('delete_error_unit'))
                                                        <div class="alert alert-error alert-danger">
                                                        {{Session::get('delete_error_unit')["messages"]->first("unit_name")}}
                                                        </div>
                                                    @endif
                                                    @if(Session::get('message_delete_unit'))
                                                        <div class="alert alert-success">
                                                        {{Session::get('message_delete_unit')["message"]}}
                                                        </div>
                                                    @endif
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <select class="form-control" id="delete_unit" name="delete_unit" size="1" required>
                                                            @if(count($units) > 0)
                                                                @foreach($units as $un)
                                                                    <option value="{{$un->id}}">{{$un->unit_name}}</option>
                                                                @endforeach
                                                            @else
                                                                <option selected disabled>Add More Units!</option>
                                                            @endif
                                                            </select>
                                                            <label for="existing_unit">Choose Existing Unit</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Delete Selected VAT</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                    <!-- END Material Login -->
                                @if($user->can('view_unit'))
                                <div class="col-lg-3">
                                    <div class="block">
                                        <div class="block-header bg-default">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle" style="color: #ffffff"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title" style="color: #ffffff">Unit List</h3>
                                        </div>
                                        <div class="block-content">
                                            <table class="table table-striped table-borderless table-header-bg">
<!--                                                 <thead>
                                                    <tr>
                                                        <th style="width: 30%;">Unit Name</th>
                                                    </tr>
                                                </thead> -->
                                                <tbody>
                                                    @if(count($units) > 0)
                                                        @foreach($units as $un)
                                                            <tr>
                                                                <td>{{$un->unit_name}}</td>
                                                                <!-- <td>{{$un->status}}</td> -->
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
            <div class="tab-pane fade" id="tab-vat">
                <div class="row items-push">
                            <!-- Login Forms -->
                            <div class="row">
                                @if($user->can('add_vat'))
                                <div class="col-lg-3">
                                    <!-- Material Login -->
                                    <div class="block block-themed">
                                        <div class="block-header bg-primary">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Add VAT</h3>
                                        </div>
                                        <div class="block-content">
                                            @if(Session::get('add_error_vat'))
                                                <div class="alert alert-error alert-danger">
                                                {{Session::get('add_error_vat')["messages"]->first("vat_value")}}
                                                </div>
                                            @endif
                                            @if(Session::get('message_add_vat'))
                                                <div class="alert alert-success">
                                                {{Session::get('message_add_vat')["message"]}}
                                                </div>
                                            @endif
                                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_vat')}}" method="post">
                                                <div class="form-group">
                                                <label class="col-xs-12" for="add-vat">VAT (%)</label>
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <input class="form-control" type="text" id="add-vat" name="add-vat" placeholder="Enter new vat..">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Add VAT</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                <!-- END Material Login -->
                                </div>
                                @endif
                                @if($user->can('edit_vat'))
                                <div class="col-lg-3">
                                <!-- Material Login -->
                                    <div class="block block-themed">
                                        <div class="block-header bg-success">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Edit VAT</h3>
                                        </div>
                                        <div class="block-content">
                                            @if(Session::get('edit_error_vat'))
                                                <div class="alert alert-error alert-danger">
                                                {{Session::get('edit_error_vat')["messages"]->first("vat_value")}}
                                                </div>
                                            @endif
                                            @if(Session::get('message_edit_vat'))
                                                <div class="alert alert-success">
                                                {{Session::get('message_edit_vat')["message"]}}
                                                </div>
                                            @endif
                                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/edit_vat')}}" method="post">
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <select class="form-control" id="existing_vat" name="existing_vat" size="1">
                                                            @if(count($vats) > 0)
                                                                @foreach($vats as $vt)
                                                                        <option value="{{$vt->id}}">{{$vt->vat_value}}%</option>
                                                                @endforeach
                                                            @else
                                                                <option selected disabled>Add More VAT!</option>
                                                            @endif
                                                            </select>
                                                            <label for="existing_vat">Choose Existing VAT</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <input class="form-control" type="text" id="new_vat" name="new_vat" placeholder="Enter New VAT Value..">
                                                            <label for="new_vat">New VAT Value </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Edit VAT</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                        <!-- END Material Login -->
                                        <!-- Material Login -->
                                @if($user->can('delete_vat'))
                                <div class="col-lg-3">
                                    <div class="block block-themed">
                                        <div class="block-header bg-danger">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Delete VAT</h3>
                                        </div>
                                        <div class="block-content">
                                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/delete_vat')}}" method="post">
                                                <div class="form-group">
                                                    @if(Session::get('delete_error_vat'))
                                                        <div class="alert alert-error alert-danger">
                                                        {{Session::get('delete_error_vat')["messages"]->first("vat_value")}}
                                                        </div>
                                                    @endif
                                                    @if(Session::get('message_delete_vat'))
                                                        <div class="alert alert-success">
                                                        {{Session::get('message_delete_vat')["message"]}}
                                                        </div>
                                                    @endif
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <select class="form-control" id="delete_vat" name="delete_vat" size="1" required>
                                                            @if(count($vats) > 0)
                                                                @foreach($vats as $vt)
                                                                        <option value="{{$vt->id}}">{{$vt->vat_value}}%</option>
                                                                @endforeach
                                                            @else
                                                                <option selected disabled>Add More VAT!</option>
                                                            @endif
                                                            </select>
                                                            <label for="existing_vat">Choose Existing VAT</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Delete Selected VAT</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                    <!-- END Material Login -->
                                @if($user->can('view_vat'))
                                <div class="col-lg-3">
                                    <div class="block">
                                        <div class="block-header bg-default">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle" style="color: #ffffff"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title" style="color: #ffffff">VAT List</h3>
                                        </div>
                                        <div class="block-content">
                                            <table class="table table-striped table-borderless table-header-bg">
<!--                                                <thead>
                                                    <tr>
                                                        <th style="width: 100%;">VAT Name</th>
                                                    </tr>
                                                </thead> -->
                                                <tbody>
                                                @if(count($vats) > 0)
                                                    @foreach($vats as $vt)
                                                        <tr>
                                                            <td>{{$vt->vat_value}}%</td>
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
		            <div class="tab-pane fade" id="tab-payment">
		                <div class="row items-push">
		                    <!-- Login Forms -->
					        <div class="row">
					        	@if($user->can('add_payment'))
					            <div class="col-lg-3">
					                <!-- Material Login -->
					                <div class="block block-themed">
					                    <div class="block-header bg-primary">
					                        <ul class="block-options">
					                            <li>
					                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
					                            </li>
					                        </ul>
					                        <h3 class="block-title">Add Payment Type</h3>
					                    </div>
					                    <div class="block-content">
				                            @if(Session::get('add_error_payment'))
				                                <div class="alert alert-error alert-danger">
				                                {{Session::get('add_error_payment')["messages"]->first("payment_name")}}
				                                </div>
				                            @endif
				                            @if(Session::get('message_add_payment'))
				                                <div class="alert alert-success">
				                                {{Session::get('message_add_payment')["message"]}}
				                                </div>
				                            @endif
					                        <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_payment')}}" method="post">
					                            <div class="form-group">
					                            <label class="col-xs-12" for="add-payment">Payment Type Name</label>
					                                <div class="col-xs-12">
					                                    <div class="form-material">
					                                        <input class="form-control" type="text" id="add-payment" name="add-payment" placeholder="Enter new payment..">
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="form-group">
					                                <div class="col-xs-12">
					                                    <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Add Payment Type</button>
					                                </div>
					                            </div>
					                        </form>
					                    </div>
					                </div>
					            <!-- END Material Login -->
					            </div>
					            @endif
					            @if($user->can('edit_payment'))
					            <div class="col-lg-3">
					            <!-- Material Login -->
					                <div class="block block-themed">
					                    <div class="block-header bg-success">
					                        <ul class="block-options">
					                            <li>
					                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
					                            </li>
					                        </ul>
					                        <h3 class="block-title">Edit Payment Type</h3>
					                    </div>
					                    <div class="block-content">
				                            @if(Session::get('edit_error_payment'))
				                                <div class="alert alert-error alert-danger">
				                                {{Session::get('edit_error_payment')["messages"]->first("payment_name")}}
				                                </div>
				                            @endif
				                            @if(Session::get('message_edit_payment'))
				                                <div class="alert alert-success">
				                                {{Session::get('message_edit_payment')["message"]}}
				                                </div>
				                            @endif
					                        <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/edit_payment')}}" method="post">
					                            <div class="form-group">
					                                <div class="col-xs-12">
					                                    <div class="form-material">
					                                        <select class="form-control" id="existing_payment" name="existing_payment" size="1">
			                                                @if(count($payments) > 0)
			                                                    @foreach($payments as $payt)
			                                                            <option value="{{$payt->id}}">{{$payt->payment_name}}</option>
			                                                    @endforeach
			                                                @else
			                                                    <option selected disabled>Add More Payment Type!</option>
			                                                @endif
					                                        </select>
					                                        <label for="existing_payment">Choose Existing Payment Type</label>
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="form-group">
					                                <div class="col-xs-12">
					                                    <div class="form-material">
					                                        <input class="form-control" type="text" id="new_payment" name="new_payment" placeholder="Enter New Payment Type Name..">
					                                        <label for="new_payment">New Payment Type Name </label>
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="form-group">
					                       	        <div class="col-xs-12">
					                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Edit Payment Type</button>
					                                </div>
					                            </div>
					                        </form>
					                    </div>
					                </div>
					            </div>
					            @endif
					                    <!-- END Material Login -->
					                    <!-- Material Login -->
					            @if($user->can('delete_payment'))
					            <div class="col-lg-3">
					                <div class="block block-themed">
					                    <div class="block-header bg-danger">
					                        <ul class="block-options">
					                            <li>
					                                <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
					                            </li>
					                        </ul>
					                        <h3 class="block-title">Delete Payment Type</h3>
					                    </div>
					            	    <div class="block-content">
					                        <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/delete_payment')}}" method="post">
					                            <div class="form-group">
				                                    @if(Session::get('delete_error_payment'))
				                                        <div class="alert alert-error alert-danger">
				                                        {{Session::get('delete_error_payment')["messages"]->first("payment_name")}}
				                                        </div>
				                                    @endif
				                                    @if(Session::get('message_delete_payment'))
				                                        <div class="alert alert-success">
				                                        {{Session::get('message_delete_payment')["message"]}}
				                                        </div>
				                                    @endif
					                                <div class="col-xs-12">
					                                    <div class="form-material">
					                                        <select class="form-control" id="delete_payment" name="delete_payment" size="1" required>
			                                                @if(count($payments) > 0)
			                                                    @foreach($payments as $payt)
			                                                            <option value="{{$payt->id}}">{{$payt->payment_name}}</option>
			                                                    @endforeach
			                                                @else
			                                                    <option selected disabled>Add More Payment Type!</option>
			                                                @endif
					                                        </select>
					                                        <label for="existing_payment">Choose Existing Payment Type</label>
					                                    </div>
					                                </div>
					                            </div>
					                            <div class="form-group">
					                                <div class="col-xs-12">
					                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-arrow-right push-5-r"></i> Delete Selected Payment Type</button>
					                	            </div>
					                            </div>
					                        </form>
					                    </div>
					                </div>
					            </div>
					            @endif
					                <!-- END Material Login -->
					            @if($user->can('view_payment'))
								<div class="col-lg-3">
								    <div class="block">
								        <div class="block-header bg-default">
								            <ul class="block-options">
					                            <li>
					                                <button type="button" data-toggle="block-option" data-action="content_toggle" style="color: #ffffff"></button>
					                            </li>
					                        </ul>
								            <h3 class="block-title" style="color: #ffffff">Payment Type List</h3>
								        </div>
								        <div class="block-content">
								            <table class="table table-striped table-borderless table-header-bg">
<!-- 								                <thead>
								                    <tr>
								                        <th style="width: 100%;">Payment Type Name</th>
								                    </tr>
								                </thead> -->
								                <tbody>
				                                @if(count($payments) > 0)
				                                    @foreach($payments as $payt)
				                                        <tr>
				                                            <td>{{$payt->payment_name}}</td>
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
<!-- UNIT -->
	@if(Session::get("message_add_unit")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_add_unit')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('add_error_unit')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('add_error_unit')['tab']}}").toggleClass('in active');
	</script>
	@endif
	@if(Session::get("message_edit_unit")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_edit_unit')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('edit_error_unit')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('edit_error_unit')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_delete_unit")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_delete_unit')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('delete_error_unit')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('delete_error_unit')['tab']}}").toggleClass('in active');
	</script>
	@endif
<!-- UNIT -->
<!-- VAT -->
	@if(Session::get("message_add_vat")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_add_vat')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('add_error_vat')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('add_error_vat')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_edit_vat")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_edit_vat')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('edit_error_vat')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('edit_error_vat')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_delete_vat")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_delete_vat')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('delete_error_vat')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('delete_error_vat')['tab']}}").toggleClass('in active');
	</script>
	@endif
<!-- VAT -->
<!-- PAYMENT -->
	@if(Session::get("message_add_payment")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_add_payment')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('add_error_payment')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('add_error_payment')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_edit_payment")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_edit_payment')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('edit_error_payment')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('edit_error_payment')['tab']}}").toggleClass('in active');
	</script>
	@endif

	@if(Session::get("message_delete_payment")['tab'])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('message_delete_payment')['tab']}}").toggleClass('in active');
	</script>
	@elseif(Session::get('delete_error_payment')["messages"])
	<script type="text/javascript">
		$(".tab-pane").removeClass('in active');
		$("{{Session::get('delete_error_payment')['tab']}}").toggleClass('in active');
	</script>
	@endif
<!-- PAYMENT -->
@stop