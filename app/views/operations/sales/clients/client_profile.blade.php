@extends('layout.in_app')
@section('content')

	
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Header Tiles -->
                    <div class="row">
                        <div class="col-sm-6">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-info" data-toggle="countTo" data-to="{{$client_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">No. of Clients</div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('sales/'.$company->id.'/client_list')}}">
                                <div class="block-content block-content-full">
                                    <div class="h4 font-w700 text-info"><i class="glyphicon glyphicon-list fa-2x"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Back to Client list</div>
                            </a>
                        </div>
                    </div>
                    <!-- END Header Tiles -->

                    <!-- Customer Info -->
                    <div class="block">
                        <!-- Basic Info -->
                      @foreach($client as $cli)
                        <div class="block-content text-center overflow-hidden">
                            <div class="push-50 animated fadeInUp">
                                <h2 class="h4 font-w600 push-5 push-30-t">
                                    {{$cli->client_customer_name}}</i>
                                </h2>
                              		 <h3 class="h5 text-muted">Customer Name</h3>
                              	<h2 class="h4 font-w600 push-5 push-30-t">
                                    {{$cli->client_company_name}}</i>
                                </h2>
                              		 <h3 class="h5 text-muted">Company Name</h3>
                            </div>
                        </div>
                        <!-- END Basic Info -->

                        <!-- Stats -->
                        <div class="block-content text-center bg-gray-lighter">
                            <div class="row items-push text-uppercase">
                                <div class="col-xs-6 col-sm-3">
                                    <div class="font-w700 text-gray-darker animated fadeIn">Orders</div>
                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">5</a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="font-w700 text-gray-darker animated fadeIn">Orders Value</div>
                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">$3.580</a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="font-w700 text-gray-darker animated fadeIn">Cart</div>
                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">4</a>
                                </div>
                                <div class="col-xs-6 col-sm-3">
                                    <div class="font-w700 text-gray-darker animated fadeIn">Referred</div>
                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">3</a>
                                </div>
                            </div>
                        </div>
                        <!-- END Stats -->
                    </div>
                    <!-- END Customer Info -->

                    <!-- Addresses -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Addresses</h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <!-- Billing Address -->
                                    <div class="block block-bordered">
                                        <div class="block-header">
                                            <h3 class="block-title">Billing Address</h3>
                                        </div>
                                        <div class="block-content block-content-full">
                                            <address>
                                                {{$cli->client_billing_address}}<br><br>
                                                <span>Contact Number:</span> {{$cli->client_contact_number}}<br>
                                                <i class="fa fa-envelope-o"></i>{{$cli->client_email_address}}
                                            </address>
                                        </div>
                                    </div>
                                    <!-- END Billing Address -->
                                </div>
                                <div class="col-lg-6">
                                    <!-- Shipping Address -->
                                    <div class="block block-bordered">
                                        <div class="block-header">
                                            <h3 class="block-title">Shipping Address</h3>
                                        </div>
                                        <div class="block-content block-content-full">
                                            <address>
                                                {{$cli->client_shipping_address}}<br><br>
                                                <span>Contact Person:</span> {{$cli->client_contact_person}}<br>
                                                <i class="fa fa-envelope-o"></i>{{$cli->client_email_address}}
                                            </address>
                                        </div>
                                    </div>
                                    <!-- END Shipping Address -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- END Addresses -->

                    <!-- Orders -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Orders <small>(5)</small></h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-borderless table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">ID</th>
                                        <th class="hidden-xs text-center">Submitted</th>
                                        <th>Status</th>
                                        <th class="visible-lg text-center">Products</th>
                                        <th class="hidden-xs text-right">Value</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00950</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">25/08/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">2</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$151,54</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00949</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">12/02/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">9</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$465,54</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00948</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">04/09/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">6</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$592,58</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00947</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">09/02/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">5</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$1030,43</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00946</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">11/07/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">2</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$49,61</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Orders -->

                     <!-- Cart -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Services <small>(4)</small></h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-borderless table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">ID</th>
                                        <th class="visible-lg">Product</th>
                                        <th class="hidden-xs text-center">Added</th>
                                        <th>Status</th>
                                        <th class="hidden-xs text-right">Value</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_product_edit.html">
                                                <strong>PID.0154</strong>
                                            </a>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_product_edit.html">Product #4</a>
                                        </td>
                                        <td class="hidden-xs text-center">09/02/2015</td>
                                        <td>
                                            <span class="label label-success">Available</span>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$84,00</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_product_edit.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_product_edit.html">
                                                <strong>PID.0153</strong>
                                            </a>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_product_edit.html">Product #3</a>
                                        </td>
                                        <td class="hidden-xs text-center">23/02/2015</td>
                                        <td>
                                            <span class="label label-success">Available</span>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$59,00</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_product_edit.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_product_edit.html">
                                                <strong>PID.0152</strong>
                                            </a>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_product_edit.html">Product #2</a>
                                        </td>
                                        <td class="hidden-xs text-center">15/01/2015</td>
                                        <td>
                                            <span class="label label-danger">Out of Stock</span>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$70,00</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_product_edit.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_product_edit.html">
                                                <strong>PID.0151</strong>
                                            </a>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="base_pages_ecom_product_edit.html">Product #1</a>
                                        </td>
                                        <td class="hidden-xs text-center">04/04/2015</td>
                                        <td>
                                            <span class="label label-success">Available</span>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$38,00</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_product_edit.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END Cart -->

                    <!-- Referred Members -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Referred Members <small>(3)</small></h3>
                        </div>
                        <div class="block-content">
                            <div class="row">
                                <div class="col-sm-6 col-lg-4">
                                    <a class="block block-rounded block-bordered block-link-hover3" href="javascript:void(0)">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="pull-right">
                                                <img class="img-avatar" src="assets/img/avatars/avatar3.jpg" alt="">
                                            </div>
                                            <div class="pull-left push-10-t">
                                                <div class="font-w600 push-5">Susan Elliott</div>
                                                <div class="text-muted">4 Orders</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <a class="block block-rounded block-bordered block-link-hover3" href="javascript:void(0)">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="pull-right">
                                                <img class="img-avatar" src="assets/img/avatars/avatar15.jpg" alt="">
                                            </div>
                                            <div class="pull-left push-10-t">
                                                <div class="font-w600 push-5">Joshua Munoz</div>
                                                <div class="text-muted">5 Orders</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-sm-6 col-lg-4">
                                    <a class="block block-rounded block-bordered block-link-hover3" href="javascript:void(0)">
                                        <div class="block-content block-content-full clearfix">
                                            <div class="pull-right">
                                                <img class="img-avatar" src="assets/img/avatars/avatar1.jpg" alt="">
                                            </div>
                                            <div class="pull-left push-10-t">
                                                <div class="font-w600 push-5">Susan Elliott</div>
                                                <div class="text-muted">3 Orders</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Referred Members -->

                    <!-- Private Notes -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Private Notes</h3>
                        </div>
                        <div class="block-content">
                            <p class="alert alert-info"><i class="fa fa-fw fa-info push-5-r"></i> This note will not be displayed to the customer.</p>
                            <form class="form-horizontal push-30-t push-30" action="base_pages_ecom_customer.html" method="post" onsubmit="return false;">
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="form-material form-material-primary">
                                            <textarea class="form-control" id="product-customer-notes" name="product-customer-notes" rows="3"></textarea>
                                            <label for="product-customer-notes">Note</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-sm btn-primary" type="submit">Add Note</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Private Notes -->
                </div>
                <!-- END Page Content -->
         

@stop