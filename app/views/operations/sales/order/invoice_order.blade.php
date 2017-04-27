@extends('layout.in_app')
@section('content')

	<main id="main-container" style="min-height: 751px;">
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
                            <div class="h1 text-center push-30-t push-30 hidden-print">INVOICE</div>
                            <hr class="hidden-print">
                            <div class="row items-push-2x">
                                <!-- Company Info -->
                                <div class="col-xs-6 col-sm-4 col-lg-3">
                                    <p class="h1 font-w400 push-5">{{$company->company_name}}</p>
                                    <p class="h4 font-w400 push-5">{{$order->recipient_name}}</p>
                                    <address>
                                        <b>Shipping Address: </b>{{$clients->client_shipping_address}}<br>
                                        <b>Billing Address: </b>{{$clients->client_billing_address}}<br><br>
                                        <i class="si si-call-end"> {{$clients->client_contact_number}}</i><br>
                                        <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{$clients->client_email_address}}</a>
                                    </address>
                                    @if($order->tin == '')
                                    <p> </p>
                                    @else
                                    <p>TIN: {{$order->tin}}</p>
                                    @endif
                                </div>
                                <!-- END Company Info -->
                            </div>
                            <!-- END Invoice Info -->

                            <!-- Table -->
                            <div class="table-responsive push-50">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">Product ID</th>
                                            <th>Product</th>
                                            <th class="text-center" style="width: 100px;">Quantity</th>
                                            <th class="text-right" style="width: 120px;">Product Cost</th>
                                            <th class="text-right" style="width: 120px;">Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $totalprice=0; ?>
                                    @foreach($product_in_orders as $pio)
                                        <tr>
                                            <td class="text-center">{{Products::find($pio->product_id)->model_code}}</td>
                                            <td>
                                            <p class="font-w600 push-10">{{Products::find($pio->product_id)->product_name}}</p>
                                               <!--  <div class="text-muted">Design/Development of iOS and Android application</div> -->
                                            </td>
                                            <td class="text-center"><span class="badge badge-primary">{{$pio->qty}}</span></td>
                                            <td class="text-right">₱ {{Products::find($pio->product_id)->product_price}}</td>
                                            <td class="text-right">₱ {{Products::find($pio->product_id)->product_price * $pio->qty}}</td>
                                        </tr>
                                    <?php $totalprice += Products::find($pio->product_id)->product_price * $pio->qty ;?>
                                    @endforeach
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
                                         <tr>
                                            <td colspan="4" class="text-right"><strong>Sub Total Price:</strong></td>
                                            <?php $ft = $totalprice; ?>
                                            <td class="text-right">{{$totalprice}} + {{$vat*100}}% as vat</td>
                                        </tr>
                                            <?php 
                                                $totalprice *= $vat;
                                                $subt = $totalprice + $ft; 
                                            ?>
                                        <tr>
                                            <td colspan="4" class="font-w600 text-right">Total Price</td>
                                            <td class="text-right">₱ {{$subt}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4" class="font-w600 text-right">Amount Paid</td>
                                            <td class="text-right">₱ {{$order->paid}}</td>
                                        </tr>
                                        <tr class="active">
                                         @if($order->paid > $subt)
                                            <td colspan="4" class="text-right text-uppercase"><strong>Change:</strong></td>
                                            <td class="text-right"><strong>₱ {{$order->paid - $subt }}</strong></td>
                                        @elseif ($order->paid < $subt)
                                            <td colspan="4" class="text-right text-uppercase"><strong>Balance:</strong></td>
                                            <td class="text-right"><strong>₱ {{$order->paid - $subt}}</strong></td>
                                        @endif
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table -->

                            <!-- Footer -->
                            <hr class="hidden-print">
                            <p class="text-muted text-center"><small>Thank you very much for doing business with us. We look forward to working with you again!</small></p>
                            <!-- END Footer -->
                        </div>
                    </div>
                    <!-- END Invoice -->
                </div>
                <!-- END Page Content -->
            </main>

@stop