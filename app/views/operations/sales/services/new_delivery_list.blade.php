@extends('layout.in_app')
@section('content')
                                @if(Session::get('deliver_message_fail'))
                                            <div class="alert alert-error alert-danger">
                                            @foreach(Session::get('deliver_message_fail')->all() as $m)
                                                {{$m}}<br>    
                                            @endforeach
                                            </div>
                                        @endif
                                        @if(Session::get('deliver_message_success'))
                                            <div class="alert alert-success">
                                            {{Session::get('deliver_message_success')["message"]}}
                                            </div>
                                @endif
                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_delivery')}}" id="delivery-form" method="post">
                       <div class="col-lg-12">
                            <!-- Simple Wizard (.js-wizard-simple class is initialized in js/pages/base_forms_wizard.js) -->
                            <!-- For more examples you can check out http://vadimg.com/twitter-bootstrap-wizard-example/ -->
                            <div class="js-wizard-simple block">
                                <!-- Step Tabs -->
                                <ul class="nav nav-tabs nav-tabs-alt nav-justified">
                                    <li class="active">
                                        <a href="#simple-step1" data-toggle="tab">Delivery Details</a>
                                    </li>
                                </ul>
                                <!-- END Step Tabs -->
                                <div class="block-content tab-content">
                                        <!-- Step 1 -->
                                        <div class="tab-pane fade in push-30-t push-50 active" id="simple-step1">
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <select class="form-control" id="delivered_to" name="delivered_to">
                                                            @foreach($order as $o)
                                                                <option value="{{$o->customer_name}}">{{$o->customer_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <label for="simple-firstname">Delivered to</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <select class="js-select2 form-control select2-hidden-accessible" id="example2-select2-multiple" name="delivery_product[]" style="width: 100%;" data-placeholder="Products" multiple="" tabindex="-1" aria-hidden="true">
                                                        <option></option><!-- Required for data-placeholder attribute to work with Select2 plugin -->
                                                        @foreach($in_stock as $p)
                                                        <option value="{{$p->id}}">{{$p->product_name}}</option>
                                                        @endforeach
                                                        </select>
                                                    <label for="example2-select2-multiple">Products</label>
                                                    </div>
                                                </div>                                                
                                            </div>

                                            <div class="form-group product"></div>

                                            <div class="form-group">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <div class="form-material">
                                                        <input class="form-control" type="date" id="delivery_date" name="delivery_date">
                                                        <label for="simple-lastname">Delivery Date</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END Step 1 -->
                                    <!-- Steps Navigation -->
                                    <div class="block-content block-content-mini block-content-full border-at">
                                        <div class="row">

                                        <div class="col-xs-6">
                                                <button class="wizard-prev btn btn-warning" type="button"><a href="{{URL::to('sales/'.$company->id.'/delivery_list')}}"><i class="fa fa-arrow-circle-o-left"></i> Back to Delivery List </a></button>
                                        </div>

                                            <div class="col-xs-6 text-right">
                                                <button class="wizard-finish btn btn-primary" id="submit-btn" type="submit"><i class="fa fa-check-circle-o"></i>Submit</button>            
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <!-- END Steps Navigation -->
                                <!-- END Form -->
                            </div>
                            <!-- END Simple Wizard -->
                        </div>
  
                <!-- END Page Content -->        

                    {{HTML::script("assets/js/plugins/select2/select2.full.min.js")}}
                    <script type="text/javascript">

                        $(".js-select2").select2();
                        $('.js-dataTable-full').dataTable({
                            pageLength: 10,
                            lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
                        });

                           
                        $("#example2-select2-multiple").change(function(){
                            $(".product").html('');
                            $("#example2-select2-multiple option:selected").each(function(index, val) {
                                $.post('get_products', {product_id: $(this).val()}, function(data, textStatus, xhr) {
                                        $(".product").append('<div class="col-sm-4 col-sm-offset-2"><div class="form-material"><input class="form-control" required id="delivery_quantity'+data.product.id+'" type="number" id="simple-lastname" name="delivery_quantity[]" placeholder="Qty" max="'+data.in_stock+'"><label for="simple-lastname">'+data.product.product_name+' Qty(remaning:'+data.product.in_stock+'):</label></div></div><div class="col-sm-4"><div class="form-material"><select class="form-control" required type="text" id="delivery_unit'+data.product.id+'" name="delivery_unit[]" placeholder="Unit"></select><label for="simple-firstname">'+data.product.product_name+' Unit</label></div></div><br>');
                                        $.each(data.unit, function(index, val) {
                                            $("#delivery_unit"+data.product.id).append("<option>"+data.unit[index].unit_name+"</option>");
                                        });
                                });
                            });
                        });
                    </script>
        <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });
        </script>                    
@stop