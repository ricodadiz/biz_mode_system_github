
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
                                    <button type="button" onclick="App.initHelper('print-page');"><i class="si si-printer"></i> Print Receipt</button>
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
                            <div class="h5 text-center">Door 206 D & D Bldg,Ponciano Reyes St. Brgy.34-D Davao City</div>
                            <div class="h5 text-center"><strong>JOYVILYN B. BASA</strong> -Prop</div>
                            <div class="h5 text-center push-30">Vat Reg. TIN 907-378-697-000</div>
                           
                            <div class="h5 text-right"><strong>NO. </strong></div>
                         
                            <div class="h3 text-center "><strong>Delivery Receipt</strong></div>
                            {{-- <hr class="hidden-print"> --}}
                            <div class="row items-push-2x">
                                <!-- Company Info -->
                            <p class="h4 font-w400 push-5"></p>
                            <div class="block">
                            <div class="block-content">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="text-left"><b>Delivery to: </b><input type="text" style="border-top: none;border-left: none;border-right: none;width: 220px;" value=" {{$client->client_customer_name}}"></div>
                                    </div>
                                    <div class="col-xs-6">
                                        
                                            <div class="text-left"><b>Date:</b><input type="text" style="border-top: none;border-left: none;border-right: none;width: 250px;" value=" {{$date}}"></div>
                                      
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="text-left"><b>Address:</b><input type="text" style="border-top: none;border-left: none;border-right: none;width: 240px;" value=" {{$client->client_shipping_address}}"></div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="text-left"><b>Terms: </b><input type="text" style="border-top: none;border-left: none;border-right: none;width: 235px;"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="text-left"><b>TIN:</b><input type="text" style="border-top: none;border-left: none;border-right: none;width: 272px;"></div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="text-left"><b>Salesman: </b><input type="text" style="border-top: none;border-left: none;border-right: none;width: 213px;"></div>
                                    </div>
                                </div>
                            </div>
                            </div>
                                <!-- END Company Info -->
                            </div>
                            <!-- END Invoice Info -->

                            <!-- Table -->
                            <div class="table-responsive ">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 100px;">Quantity</th>
                                            <th class="text-center" style="width: 100px;">Unit</th>
                                            <th class="text-center">Articles</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($delivery_product as $dp)
                                        <tr>
                                            <td class="text-center" style="padding: 18px;">{{$dp->quantity}}</td>
                                            <td class="text-center">{{$dp->unit}}</td>
                                            <td class="text-center">{{$products->product_name}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table -->

                            <!-- Footer -->
                            {{-- <hr class="hidden-print"> --}}
                            <div class="block">
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 text-right">_____________________________________</div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8"></div>
                                    <div class="col-md-4 text-right">Customer's Name & Signature</div>
                                </div>
                            </div>
                            <p class="text-muted text-center" style="margin-bottom: 0;"><small>"THIS DOCUMENT IS NOT VALID FOR CLAIMING INPUT TAXES"</small></p>
                            <p class="text-muted text-center" style="margin-bottom: 0;""><small>"THIS DELIVERY RECEIPT SHALL BE VALID FOR (5)YEARS FROM THE DATE OF ATP."</small></p>
                            <!-- END Footer -->
                        </div>
                    </div>
                    <!-- END Invoice -->
                </div>
                <!-- END Page Content -->
     

@stop