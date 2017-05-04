
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
                         
                            <div class="h3 text-center "><strong>OFFICIAL RECEIPT</strong></div>
                            <hr class="hidden-print">

                            <div class="row">
                            <div class="block">
                                <div class="block-content">
                                    <div class="row">
                                        <p style="line-height: 20px;">RECEIVED from <input type="text" style="border-top: none;border-left: none;border-right: none;width: 230px;"> with TIN <input type="text" style="border-top: none;border-left: none;border-right: none;width: 150px;"> add address at <input type="text" style="border-top: none;border-left: none;border-right: none;width: 230px;"> engaged in the business style of <input type="text" style="border-top: none;border-left: none;border-right: none;width: 200px;"> the sum of <input type="text" style="border-top: none;border-left: none;border-right: none;width: 300px;">pesos (P<input type="text" style="border-top: none;border-left: none;border-right: none;width: 150px;">) In partial/full payment for <input type="text" style="border-top: none;border-left: none;border-right: none;width: 280px;">.</p>
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
                                            <th class="text-center bg-info text-white" colspan="2" style="padding-top: 1px;padding-bottom: 1px;">In Settlement of the following</th>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 250px;padding-top: 1px;padding-bottom: 1px;">Invoice No.</th>
                                            <th class="text-center" style="width: 250px;padding-top: 1px;padding-bottom: 1px;">Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 1px;padding-bottom: 1px;">Total Sales (Vat Inclusive)</td>
                                            <td style="padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 1px;padding-bottom: 1px;">Less: VAT</td>
                                            <td style="padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 1px;padding-bottom: 1px;">Total</td>
                                            <td style="padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 1px;padding-bottom: 1px;">Less: Withholding Tax</td>
                                            <td style="padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 1px;padding-bottom: 1px;">Amount Due</td>
                                            <td style="padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 1px;padding-bottom: 1px;">VATable Sales</td>
                                            <td style="padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 1px;padding-bottom: 1px;">VAT-Exempt Sales</td>
                                            <td style="padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 1px;padding-bottom: 1px;">Zero Rated</td>
                                            <td style="padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td style="padding-top: 1px;padding-bottom: 1px;">VAT Amount</td>
                                            <td style="padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr class="info">
                                            <td style="padding-top: 1px;padding-bottom: 1px;">Total Sales</td>
                                            <td style="padding-top: 1px;padding-bottom: 1px;"></td>
                                        </tr>
                                        <tr>
                                            <td class="bg-info text-white text-center" colspan="2" style="padding-top: 1px;padding-bottom: 1px;">FORM OF PAYMENT</td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="padding-top: 1px;padding-bottom: 1px;"><div class="form-group">
                                            <div class="col-sm-6 col-sm-offset-4">
                                                <label class="css-input css-radio css-radio-warning push-10-r">
                                                    <input type="radio" name="mega-gender-group"><span></span> Cash
                                                </label>
                                                <label class="css-input css-radio css-radio-warning">
                                                    <input type="radio" name="mega-gender-group"><span></span> Check
                                                </label>
                                            </div>
                                        </div></td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <!-- END Table -->

                            <!-- Footer -->
                          
                            <div class="block">
                                <div class="row" style="margin-top: 20px;">
                                    <div class="text-center">_____________________________________</div>
                                </div>
                                <div class="row">
                                    <div class="text-center">Cashier/Authorized Representative</div>
                                </div>
                            </div>
                            <p class="text-muted text-center"><small>"THIS OFFICIAL RECEIPT SHALL BE VALID FOR (5)YEARS FROM THE DATE OF ATP."</small></p>
                            <!-- END Footer -->
                        </div>
                    </div>
                    <!-- END Invoice -->
                </div>
                <!-- END Page Content -->
     

@stop