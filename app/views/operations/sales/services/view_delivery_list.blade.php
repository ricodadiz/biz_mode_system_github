@extends('layout.in_app')
@section('content')
    <div class="content bg-gray-lighter hidden-print">
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Invoice -->
                    <div class="block">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <!-- Print Page functionality is initialized in App() -> uiHelperPrint() -->
                                    <button type="button" onclick="App.initHelper('print-page');"><i class="si si-printer"></i> Print Delivery</button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                                </li>
                            </ul>
                            <h3 class="block-title">{{$deliveries->delivery_code}}</h3>
                        </div>
                        <div class="block-content block-content-narrow">
                            <!-- Invoice Info -->
                            <div class="h1 text-center push-30-t push-30 hidden-print">Delivery Invoice</div>
                            <hr class="hidden-print">
                            <div class="row items-push-2x">
                                <!-- Company Info -->
                                <div class="col-xs-6 col-sm-4 col-lg-3">
                                    <p class="h2 font-w400 push-5">{{$company->company_name}}</p>
                                    <address>
                                        Address: {{$company->company_address}} 
                                        <br>                                      
                                        <i class="si si-call-end"></i> {{$company->company_contact}}
                                    </address>
                                </div>
                                <!-- END Company Info -->

                                <!-- Client Info -->
                                <div class="col-xs-6 col-sm-4 col-sm-offset-4 col-lg-3 col-lg-offset-6 text-right">
                                    <p class="h2 font-w400 push-5">Customer Name: {{$deliveries->delivered_to}}</p>
                                    <address>
                                        Address: {{$deliveries->delivery_address}}
                                        <br>
                                        <i class="si si-call-end">{{$order->contact_number}}</i><br>
                                        <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{$order->email}}</a> <br>
                                        Date: {{$deliveries->delivery_date}}
                                    </address>
                                </div>
                                <!-- END Client Info -->
                            </div>
                            <!-- END Invoice Info -->

                            <!-- Table -->
                            <div class="table-responsive push-50">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;"></th>
                                            <th>Product</th>
                                            <th class="text-center" style="width: 100px;">Quantity</th>
                                            <th class="text-right" style="width: 120px;">Unit</th>
                                            <th class="text-right" style="width: 120px;">Product Price</th>
                                            <th class="text-right" style="width: 120px;">Amount Paid</th>
                                            <th class="text-right" style="width: 120px;">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $total = 0;?>
                                    @foreach($product_deliveries as $pd)
                                        <tr>
                                            <td class="text-center">{{$pd->id}}</td>    
                                            <td>
                                                <p class="font-w600 push-10">
                                                {{Products::find($pd->product_id)->product_name}}
                                                </p>
                                                <div class="text-muted">
                                                {{Products::find($pd->product_id)->description}}
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-primary">
                                                    {{$pd->quantity}}
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-primary">{{$pd->unit}}</span>
                                            </td>
                                            <td class="text-center">
                                                ₱ {{Products::find($pd->product_id)->product_price}}
                                            </td> 
                                            <td class="text-center">
                                                ₱ {{$order->paid}}
                                            </td>                                           
                                            <td class="text-center">
                                                ₱ {{Products::find($pd->product_id)->product_price * $pd->quantity}}
                                                <?php $total+= Products::find($pd->product_id)->product_price * $pd->quantity ;?>  
                                            </td> 
                                        </tr>

                                        <tr class="active">
                                            <td colspan="6" class="font-w700 text-uppercase text-right">Total Due</td>
                                            <td class="font-w700 text-right">₱ {{$total}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="font-w600 text-uppercase text-right">Change</td>
                                            <td class="text-right">₱  {{$order->paid - Products::find($pd->product_id)->product_price * $pd->quantity }}</td>
                                        </tr>
                                    @endforeach   
                                    </tbody>
                                </table>

                                <a href="{{URL::to('sales/'.$company->id.'/delivery_list')}}">
                                    <button class="btn btn-success" type="button"><i class="fa fa-arrow-left"></i> Delivery List</button>
                                </a>
                            </div>
                            <!-- END Table -->


@stop