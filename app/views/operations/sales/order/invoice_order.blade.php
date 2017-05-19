
@extends('layout.in_app2')
@section('content')

	
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Invoice -->
                    <div class="block">
                        <div class="block-header">
                            <ul class="block-options">
                                <li>
                                    <!-- Print Page functionality is initialized in App() -> uiHelperPrint() -->
                                    <button type="button" onclick="App.initHelper('print-page');"><i class="si si-printer"></i> Print Invoice</button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                            </ul>
                            <!-- <h3 class="block-title">#INV0625</h3> -->
                        </div>
                        <div class="block-content block-content-narrow">
                            <!-- Invoice Info -->
                            <div class="h1 text-center">JOYTRADE INDUSTRIAL MARKETING</div>
                            <div class="h5 text-center">206 Lot 1 Block 93, Sadawa Road, brgy. Bucana, Davao City</div>
                            <div class="h5 text-center"><strong>JOYVILYN B. BASA</strong> -Prop</div>
                            <div class="h5 text-center push-30">Vat Reg. TIN 307-378-697-000</div>
                            @foreach($orders_generic as $og)
                            <div class="h5 text-right"><strong>NO.{{$og->reference_no}}</strong></div>
                            @endforeach
                            <div class="h3 text-center "><strong>SALES INVOICE</strong></div>
                            <hr class="hidden-print">
                            <div class="row items-push-2x">
                                <!-- Company Info -->
                            <p class="h4 font-w400 push-5"></p>
                            <div class="block">
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="text-center"><b>Sold to:</b>{{$clients->client_customer_name}}</div>
                                    </div>
                                    <div class="col-xs-6">
                                         @foreach($orders_generic as $og)
                                            <div class="text-center"><b>Date:</b>{{$og->date_order}}</div>
                                         @endforeach
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="text-center"><b>Shipping Address: </b>{{$clients->client_shipping_address}}</div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="text-center"><b>Billing Address: </b>{{$clients->client_billing_address}}</div>
                                    </div>
                                </div>
                            </div>
                            </div>
                               {{--  @if($order->tin == '')
                                <p> </p>
                                @else
                                <p>TIN: {{$order->tin}}</p>
                                @endif --}}
                                <!-- END Company Info -->
                            </div>
                            <!-- END Invoice Info -->

                            <!-- Table -->
                            <div class="table-responsive ">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th class="text-center" style="width: 100px;">Quantity</th>
                                            <th class="text-right" style="width: 120px;">Product Cost</th>
                                            <th class="text-right" style="width: 120px;">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders_product as $op)
                                        <tr>
                                            <td>
                                            <p class="font-w600 push-10">{{$op->products}}</p>
                                               <!--  <div class="text-muted">Design/Development of iOS and Android application</div> -->
                                            </td>
                                            <td class="text-center"><span class="badge badge-primary">{{$op->quantity}}</span></td>
                                            <td class="text-right">₱ {{$op->price}}</td>
                                            <td class="text-right">₱ {{$op->amount}}</td>
                                        @endforeach
                                        </tr>
                                        <!-- <tr>
                                            <td colspan="4" class="font-w600 text-right">Subtotal</td>
                                            <td class="text-right">$ 27.500,00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="font-w600 text-right">Vat Rate</td>
                                            <td class="text-right">20%</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="font-w600 text-right">Vat Due</td>
                                            <td class="text-right">$ 5.500,00</td>
                                        </tr>
                                        <tr class="active">
                                            <td colspan="4" class="font-w700 text-uppercase text-right">Total Due</td>
                                            <td class="font-w700 text-right">$ 33.000,00</td>
                                        </tr> -->
                                        @foreach($orders_generic as $og)   
                                        <tr>
                                            <td colspan="3" class="font-w600 text-right">Less.VAT</td>
                                            <td class="text-right">₱</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="font-w600 text-right">Amount: Net of VAT</td>
                                            <td class="text-right">₱</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="font-w600 text-right">Total Price</td>
                                            <td class="text-right">₱ {{$og->total_amount}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="font-w600 text-right">Amount Paid</td>
                                            <td class="text-right">₱ {{$og->amount_paid}}</td>
                                        </tr>
                                        <tr class="active">
                                         @if($og->amount_paid > $og->total_amount)
                                            <?php $change = $og->amount_paid - $og->total_amount; ?>
                                            <td colspan="3" class="text-right text-uppercase"><strong>Change:</strong></td>
                                            <td class="text-right"><strong>₱ {{$change}}</strong></td>
                                        @else
                                        <?php $balance= $og->amount_paid - $og->total_amount ; ?>
                                            <td colspan="3" class="text-right text-uppercase"><strong>Balance:</strong></td>
                                            <td class="text-right"><strong>₱ {{$balance}}</strong></td>
                                        @endif
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table -->

                            <!-- Footer -->
                            <hr class="hidden-print">
                            <div class="block">
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 text-right">_____________________________________</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 text-right">Cashier/Authorized Representative</div>
                                </div>
                            </div>
                            <p class="text-muted text-center"><small>"THIS INVOICE SHALL BE VALID FOR (5)YEARS FROM THE DATE OF ATP."</small></p>
                            <!-- END Footer -->
                        </div>
                    </div>
                    <!-- END Invoice -->
                </div>
                <!-- END Page Content -->
     

@stop