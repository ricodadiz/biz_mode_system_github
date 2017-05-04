
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
                           
                            <div class="h5 text-right"><strong>NO.</strong></div>
                         
                            <div class="h3 text-center "><strong>PROVISIONAL RECEIPT</strong></div>
                            <hr class="hidden-print">

                            <div class="row">
                            <div class="block">
                                <div class="block-content">
                                    <div class="row">
                                        <p class="text-right">Date:<input type="text" style="border-top: none;border-left: none;border-right: none;width: 150px;">.20<input type="text" style="border-top: none;border-left: none;border-right: none;width: 50px;"></p>
                                        <p style="line-height: 20px;">RECEIVED from <input type="text" style="border-top: none;border-left: none;border-right: none;width: 230px;">Address <input type="text" style="border-top: none;border-left: none;border-right: none;width: 230px;">the sum of <input type="text" style="border-top: none;border-left: none;border-right: none;width: 300px;">(P<input type="text" style="border-top: none;border-left: none;border-right: none;width: 150px;">)as full/partial payment of<input type="text" style="border-top: none;border-left: none;border-right: none;width: 250px;"></p>
                                    </div>
                                </div>
                            </div>
                                <!-- END Company Info -->
                            </div>
                            <!-- END Invoice Info -->

                            <!-- Table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" style="width: 500px;margin: 0px auto;">
                                    <thead>
                                        <tr>
                                            <th class="text-center bg-info text-white" colspan="3" style="padding-top: 1px;padding-bottom: 1px;">IN PAYMENT OF THE FOLLOWING</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>   
                                            <th style="width: 300px;"></th>
                                            <th class="text-center" style="padding-top: 1px;padding-bottom: 1px;" colspan="1">Pesos</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="width: 300px;"></td>
                                            <td style="width: 130px;"></td>
                                            <td style="width: 70px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 300px;"></td>
                                            <td style="width: 130px;"></td>
                                            <td style="width: 70px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 300px;"></td>
                                            <td style="width: 130px;"></td>
                                            <td style="width: 70px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 300px;"></td>
                                            <td style="width: 130px;"></td>
                                            <td style="width: 70px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 300px;"></td>
                                            <td style="width: 130px;"></td>
                                            <td style="width: 70px;"></td>
                                        </tr>
                                        <tr>
                                            <td class="info text-center" colspan="3" style="padding-top: 1px;padding-bottom: 1px;">FORM OF PAYMENT</td>
                                        </tr>
                                        <tr>
                                            <td style="width: 300px;padding-top: 1px;padding-bottom: 1px;">CASH</td>
                                            <td class="text-center" style="width: 130px;padding-top: 1px;padding-bottom: 1px;">PESOS</td>
                                            <td style="width: 70px;padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 300px;padding-top: 1px;padding-bottom: 1px;">CHECK NO.</td>
                                            <td style="width: 130px;"></td>
                                            <td style="width: 70px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 300px;"></td>
                                            <td style="width: 130px;"></td>
                                            <td style="width: 70px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="width: 300px;"></td>
                                            <td style="width: 130px;"></td>
                                            <td style="width: 70px;"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right" style="width: 300px;padding-top: 1px;padding-bottom: 1px;">TOTAL</td>
                                            <td style="width: 130px;"></td>
                                            <td style="width: 70px;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table -->

                            <!-- Footer -->
                          
                            <div class="block">
                                <div class="row" style="margin-top: 50px;">
                                    <div class="text-center">By:_____________________________________</div>
                                </div>
                                <div class="row">
                                    <div class="text-center">Authorized Signiture</div>
                                </div>
                            </div>
                           
                            <!-- END Footer -->
                        </div>
                    </div>
                    <!-- END Invoice -->
                </div>
                <!-- END Page Content -->
     

@stop