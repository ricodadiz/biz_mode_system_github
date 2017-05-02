@extends('layout.in_app')
@section('content')
		
		<div class="content content-boxed">
                    <!-- Header Tiles -->
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <span class="item item-circle bg-success-light"><i class="fa fa-shopping-cart fa-1.5x"></i></span>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Reference No: {{$ref_no}} </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <span class="item item-circle bg-success-light"><i class="fa fa-check text-success"></i></span>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Payment</div>
                            </a>
                        </div>
                        {{-- <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <span class="item item-circle bg-warning-light"><i class="si si-settings fa-spin text-warning"></i></span>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-warning font-w600">Packaging</div>
                            </a>
                        </div> --}}
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('sales/'.$company->id.'/order_list_generic')}}">
                                <div class="block-content block-content-full">
                                    <span class="item item-circle text-info"><i class="glyphicon glyphicon-list fa-2x"></i></span>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Back to Order List</div>
                            </a>
                        </div>
                    </div>
                    <!-- END Header Tiles -->
                <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/view_order/')}}" method="post">
                    <!-- Products -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Order Information</h3>
                        </div>
                        <div class="block-content">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-left">Product Name</th>
                                            <th class="text-left">Warranty Status</th>
                                            <th class="text-left">ORDER DATE</th>
                                            <th class="text-left">Warehouse</th>
                                            <th class="text-right">Quantity</th>
                                            <th class="text-right" style="width: 10%;">UNIT COST</th>
                                            <th class="text-right" style="width: 10%;">Amount</th>
                                        </tr>
                                   
                                    </thead>
                                    <tbody>
                                    
                                        @foreach($orders_product as $op)
                                        <tr>
                                            <td><strong>{{$op->products}}</strong></td>
                                        <?php 
                                              $date = new DateTime(); 
                                              $result = $date->format('Y-m-d');
                                        ?> 
                                        @if($op->order_product_warranty_date == $result)   
                                            <td><strong class="label label-danger">Out of Warranty</strong></td>
                                        @else
                                            <td><strong class="label label-success">Under Warranty</strong></td>
                                        @endif
                                            <td><strong>{{$date_order}}</strong></td>
                                            <td><strong>{{$op->warehouse}}</strong></td>
                                            <td class="text-right"><strong>{{$op->quantity}}</strong></td>
                                            <td class="text-right"><strong>{{$op->price}}</strong></td>
                                            <td class="text-right"><strong>{{$op->amount}}</strong></td>
                                            {{-- <td class="text-center"><strong>{{$pio->qty}}</strong></td>
                                            <td class="text-right">{{Products::find($pio->product_id)->product_price}}</td>
                                            <td class="text-right">{{Products::find($pio->product_id)->product_price * $pio->qty}}</td> --}}
                                        @endforeach
                                        </tr>
                                        
                                        @foreach($orders_generic as $og)                                           
                                        <tr>
                                            <td colspan="6" class="text-right"><strong>Total Price:</strong></td>
                                            <td class="text-right"> <strong> {{$og->total_amount}} </strong> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-right"><strong>Total Paid:</strong></td>
                                            <td class="text-right"> <strong> {{$og->amount_paid}} </strong></td>
                                        
                                        @endforeach
                                        </tr>
                                        

                                        @if($og->amount_paid > $og->total_amount)
                                        <?php $change = $og->amount_paid - $og->total_amount ; ?>
                                        <tr class="success">
                                            <td colspan="6" class="text-right text-uppercase"><strong>Change:</strong></td>
                                            <td class="text-right"><strong>{{$change}}</strong></td>
                                        </tr>
                                        @else
                                        <?php $debt = $og->amount_paid - $og->total_amount ; ?>
                                        <tr class="danger">
                                            <td colspan="6" class="text-right text-uppercase"><strong>Balance: </strong></td>
                                            <td class="text-right"><strong>{{$debt}}</strong></td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- END Products -->

                    <!-- Customer -->
                    <div class="row">
                        <div class="col-lg-6">
                            <!-- Shipping Address -->
                            <div class="block">
                                <div class="block-header bg-gray-lighter">
                                    <h3 class="block-title">Customer Info</h3>
                                </div>
                                 <div class="block-content block-content-full">
                                   
                                    <div class="h4 push-3"><b>Company Name: {{$clients->client_company_name}}</b></div>
                                    <div class="h4 push-3"><b>Customer Name: {{$clients->client_customer_name}}</b></div>
                                    <address>
                                        <b>Shipping Address: {{$clients->client_shipping_address }}</b><br>
                                        <b>Billing Address:  {{$clients->client_billing_address}}</b><br><br>
                                        <i class="fa fa-phone"></i> {{$clients->client_contact_number}}<br>
                                        <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)"> {{$clients->client_email_address}}</a>
                                    </address>
                                  
                                </div>
                            </div>
                            <!-- END Shipping Address -->
                        </div>
                        
                    </div>
                    <!-- END Customer -->

                    <!-- Log Messages -->
                    <!-- <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Log Messages</h3>
                        </div>
                        <div class="block-content">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-vcenter">
                                    <tbody>
                                        <tr>
                                            <td style="width: 80px;">
                                                <span class="label label-primary">Order</span>
                                            </td>
                                            <td style="width: 220px;">
                                                <span class="font-w600">November 17, 2015 - 18:00</span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)">Support</a>
                                            </td>
                                            <td class="text-success">Order Completed</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary">Order</span>
                                            </td>
                                            <td>
                                                <span class="font-w600">November 17, 2015 - 17:36</span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)">Support</a>
                                            </td>
                                            <td class="text-info">Preparing Order</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-success">Payment</span>
                                            </td>
                                            <td>
                                                <span class="font-w600">November 16, 2015 - 18:10</span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)">John Doe</a>
                                            </td>
                                            <td class="text-success">Payment Completed</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-danger">Email</span>
                                            </td>
                                            <td>
                                                <span class="font-w600">November 16, 2015 - 10:35</span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)">Support</a>
                                            </td>
                                            <td class="text-danger">Missing payment details. Email was sent and awaiting for payment before processing</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary">Order</span>
                                            </td>
                                            <td>
                                                <span class="font-w600">November 15, 2015 - 14:59</span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)">Support</a>
                                            </td>
                                            <td>All products are available</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="label label-primary">Order</span>
                                            </td>
                                            <td>
                                                <span class="font-w600">November 15, 2015 - 14:29</span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0)">John Doe</a>
                                            </td>
                                            <td>Order Submitted</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> -->
                    <!-- END Log Messages -->
                </form>
        </div>

@stop