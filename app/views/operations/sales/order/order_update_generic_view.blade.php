@extends('layout.in_app')
@section('content')


            <main id="main-container" style="min-height: 751px;">
                <!-- Page Content -->
                <div class="content content-boxed">

                        <div class="row">
                            <div class="col-xs-6 col-sm-4">
                                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                    <div class="block-content block-content-full">
                                        <div class="h1 font-w700" data-toggle="countTo" data-to="250">250</div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Products</div>
                                </a>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                    <div class="block-content block-content-full">
                                        <div class="h1 font-w700" data-toggle="countTo" data-to="29">29</div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Available</div>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <a class="block block-link-hover3 text-center" href="{{URL::to('sales/'.$company->id.'/order_list_generic')}}">
                                    <div class="block-content block-content-full">
                                        <div class="h4 font-w50 text-info"><i class="glyphicon glyphicon-list fa-2x"></i></div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Back to Order list</div>
                                </a>
                            </div>
                        </div>

                    <div class="block block-themed">
                                     @if(Session::get('add_error'))
                                        <div class="alert alert-error alert-danger">
                                        @foreach(Session::get('add_error')->all() as $m)
                                            {{$m}}<br>    
                                        @endforeach
                                        </div>
                                     @endif
                                     @if(Session::get('message_add'))
                                        <div class="alert alert-success">
                                        {{Session::get('message_add')["message"]}}
                                        </div>
                                     @endif
                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/order_update_generic/'.$order->id)}}" method="post">
                       <div class="col-lg-12">
                            <!-- Simple Wizard (.js-wizard-simple class is initialized in js/pages/base_forms_wizard.js) -->
                            <!-- For more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/ -->
                            <div class="js-wizard-simple block">
                                <!-- Step Tabs -->
                                <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                                    <li class="active">
                                        <a href="#simple-step1" data-toggle="tab">1. Personal</a>
                                    </li>
                                    <li>
                                        <a href="#simple-step2" data-toggle="tab">2. Details</a>
                                    </li>
                                    <li>
                                        <a href="#simple-step3" data-toggle="tab">3. Extra</a>
                                    </li>
                                </ul>
                                <!-- END Step Tabs -->

                                <!-- Form -->
                                <form class="form-horizontal" action="base_forms_wizard.html" method="post">
                                    <!-- Steps Content -->
                                    <div class="block-content tab-content">
                                        <!-- Step 1 -->
                                        <div class="tab-pane fade in push-30-t push-50 active" id="simple-step1">
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="text" id="simple-firstname" name="order-name" value="{{$order->recipient_name}}">
                                                        <label for="simple-firstname">Recipient Name</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="date" id="simple-lastname" name="order-date" value="{{$order->date_order}}">
                                                        <label for="simple-lastname">Order date</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 ">
                                                    <div class="form-material">
                                                        <input class="form-control" type="text" id="simple-email" name="order-address" value="{{$order->shipping_address}}">
                                                        <label for="simple-email">Shipping Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="number" id="simple-email" name="order-contact" value="{{$order->contact_number}}">
                                                        <label for="simple-email">Contact #</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-material">
                                                        <input class="form-control" type="email" id="simple-email" name="order-email" value="{{$order->email}}">
                                                        <label for="simple-email">Email</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step 1 -->

                                        <!-- Step 2 -->
                                        <div class="tab-pane fade push-30-t push-50" id="simple-step2">
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <select class="js-select2 form-control select2-hidden-accessible" id="example2-select2-multiple" name="order-products" style="width: 100%;" data-placeholder="Products" multiple="" tabindex="-1" aria-hidden="true">
                                                        <!-- <option></option>Required for data-placeholder attribute to work with Select2 plugin
                                                        @foreach($products as $p)
                                                        <option value="{{$p->product_name}}">{{$p->product_name}}</option>
                                                        @endforeach -->
                                                        @foreach($products as $p)
                                                            @if($order->product == $p->product_name)
                                                                <option value="{{$p->product_name}}" selected>{{$p->product_name}}</option>
                                                            @else
                                                                <option value="{{$p->product_name}}">{{$p->product_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <label for="example2-select2-multiple">Products</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-material">
                                                        <input class="form-control" type="text" id="simple-firstname" name="order-unit" value="{{$order->unit}}">
                                                        <label for="simple-firstname">Unit</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="number" id="simple-lastname" name="order-qty" value="{{$order->qty}}">
                                                        <label for="simple-lastname">Qty</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4 ">
                                                    <div class="form-material">
                                                        <input class="form-control" type="number" id="simple-email" name="order-total" value="{{$order->total}}">
                                                        <label for="simple-email">Total</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="number" id="simple-email" name="order-sub-total" value="{{$order->sub_total}}">
                                                        <label for="simple-email">Sub Total</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-material">
                                                        <input class="form-control" type="number" id="simple-email" name="order-net-total" value="{{$order->net_total}}">
                                                        <label for="simple-email">Net Total</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="number" id="simple-email" name="order-vat" value="{{$order->vat}}">
                                                        <label for="simple-email">Vat</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-material">
                                                        <input class="form-control" type="number" id="simple-email" name="order-discount" value="{{$order->discount}}">
                                                        <label for="simple-email">Discount</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step 2 -->

                                        <!-- Step 3 -->
                                        <div class="tab-pane fade push-30-t push-50" id="simple-step3">
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-material">
                                                    <select class="form-control" id="simple-skills" name="order-payment" size="1">
                                                        <option value="{{$order->payment_type}}">{{$order->payment_type}}</option>
                                                    </select>
                                                    <label for="contact3-subject">Payment Type</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-material">
                                                        <select class="form-control" id="simple-skills" name="order-warehouse" size="1">
                                                            <option value="{{$order->warehouse_address}}">{{$order->warehouse_address}}</option>
                                                        </select>
                                                        <label for="simple-skills">Warehouse Address</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="number" id="simple-email" name="order-paid" value="{{$order->paid}}">
                                                        <label for="simple-email">Paid</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-material">
                                                        <input class="form-control" type="text" id="simple-email" name="order-due" value="{{$order->due}}">
                                                        <label for="simple-email">Due</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="text" id="simple-email" name="order-terms" value="{{$order->terms}}">
                                                        <label for="simple-email">Terms</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-material">
                                                        <input class="form-control" type="number" id="simple-email" name="order-tin" value="{{$order->tin}}">
                                                        <label for="simple-email">Tin</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="number" id="simple-email" name="order-pwd" value="{{$order->pwd_id_no}}">
                                                        <label for="simple-email">OSCA/PWD ID #</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-material">
                                                        <input class="form-control" type="type" id="simple-email" name="order-business-style" value="{{$order->business_style}}">
                                                        <label for="simple-email">Business Style</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step 3 -->
                                    </div>
                                    <!-- END Steps Content -->

                                    <!-- Steps Navigation -->
                                    <div class="block-content block-content-mini block-content-full border-t">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <button class="wizard-prev btn btn-warning" type="button"><i class="fa fa-arrow-circle-o-left"></i> Previous</button>
                                            </div>
                                            <div class="col-xs-6 text-right">
                                                <button class="wizard-next btn btn-success" type="button">Next <i class="fa fa-arrow-circle-o-right"></i></button>
                                                <button class="wizard-finish btn btn-primary" type="submit"><i class="fa fa-check-circle-o"></i> Update</button>
                                                <a href="{{URL::to('sales/'.$company->id.'/invoice_order')}}" class="wizard-finish btn btn-primary" type="submit">INVOICE</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Steps Navigation -->
                                </form>
                                <!-- END Form -->
                            </div>
                            <!-- END Simple Wizard -->
                        </div>
                    </form>
                               
                </div>
            </div>
                <!-- END Page Content -->
          </main>          

                    {{HTML::script("assets/js/plugins/select2/select2.full.min.js")}}
                    <script type="text/javascript">
                        $(".js-select2").select2();
                        $('.js-dataTable-full').dataTable({
                            pageLength: 10,
                            lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
                        });

                        $('.js-wizard-simple').bootstrapWizard({
                            'tabClass': '',
                            'firstSelector': '.wizard-first',
                            'previousSelector': '.wizard-prev',
                            'nextSelector': '.wizard-next',
                            'lastSelector': '.wizard-last',
                            'onTabShow': function($tab, $navigation, $index) {
                        var $total      = $navigation.find('li').length;
                        var $current    = $index + 1;
                        var $percent    = ($current/$total) * 100;

                                // Get vital wizard elements
                                var $wizard     = $navigation.parents('.block');
                                var $progress   = $wizard.find('.wizard-progress > .progress-bar');
                                var $btnPrev    = $wizard.find('.wizard-prev');
                                var $btnNext    = $wizard.find('.wizard-next');
                                var $btnFinish  = $wizard.find('.wizard-finish');

                                // Update progress bar if there is one
                        if ($progress) {
                                    $progress.css({ width: $percent + '%' });
                                }

                        // If it's the last tab then hide the last button and show the finish instead
                        if($current >= $total) {
                                    $btnNext.hide();
                                    $btnFinish.show();
                        } else {
                                    $btnNext.show();
                                    $btnFinish.hide();
                        }
                            }
                        });
                                    </script>
@stop