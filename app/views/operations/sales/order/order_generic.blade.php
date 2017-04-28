@extends('layout.in_app')
@section('content')

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

                <div class="row">
                            <div class="col-xs-6 col-sm-4">
                                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                    <div class="block-content block-content-full">
                                        <div class="h1 font-w700" data-toggle="countTo" data-to="{{$orders_count}}"></div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Product Order</div>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <a class="block block-link-hover3 text-center" href="{{URL::to('sales/'.$company->id.'/order_list_generic')}}">
                                    <div class="block-content block-content-full">
                                        <div class="h4 font-w50 text-info"><i class="glyphicon glyphicon-list fa-2x"></i></div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Back to Product Order List</div>
                                </a>
                            </div>
                        </div>

                         
                <div class="col-sm-12">
                     <div class="block block-bordered">
                                <div class="block-header bg-gray-lighter">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                        </li>
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">Add Product Order</h3>
                                </div>
                                <div class="block-content">
                                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_order')}}" id="formid" method="post">
                                        <div class="form-group">
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <select class="js-select2 form-control" name="customer-name" style="width: 100%;">
                                                        <option selected disabled></option>
                                                        @foreach($clients as $c)
                                                            <option value="{{$c->id}}">
                                                                {{$c->client_customer_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="example2-select2">Customer Name</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <input class="form-control" type="date" name="order-date" value="<?php echo date('Y-m-d'); ?>">
                                                    <label for="register5-lastname">Order Date</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="reference-no">
                                                    <label for="register5-lastname">Reference No.</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <select class="form-control" id="product-name-0" name="product-name[]" style="width: 100%;" onchange="item_listener(0)">
                                                        <option selected disabled></option>
                                                        @foreach($products as $p)
                                                            <option value="{{$p->id}}">
                                                                {{$p->product_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="example2-select2">Product</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <textarea class="form-control" name="order-warehouse[]" id="order-warehouse-0" rows="1"></textarea>
                                                    <label for="example2-select2">Warehouse</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="order-category[]" id="order-category-0">
                                                    <label for="register5-lastname">Category</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="order-qty[]" id="order-qty-0" onkeypress="total_amount(0)">
                                                    <label for="register5-lastname">Quantity</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="order-price[]" id="order-price-0">
                                                    <label for="register5-lastname">Price</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">
                                                <div class="form-material">
                                                    <textarea class="form-control" name="order-vat[]" id="order-vat-0" rows="1"></textarea>
                                                    <label for="example2-select2">VAT%</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="order-amount[]" id="order-amount-0">
                                                    <label for="register5-lastname">Amount</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="order-warranty[]" id="order-warranty-0">
                                                    <label for="register5-lastname">Product Warranty (Days)</label>
                                                </div>
                                            </div>

                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <input class="form-control" type="date" name="order-warranty-date[]" id="order-warranty-date-0">
                                                    <label for="register5-lastname">Warranty Date</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="new"></div>

                                        <div class="form-group">
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <select class="form-control" id="order-status" name="order-status" style="width: 100%;">
                                                        <option selected disabled>Select Terms</option>
                                                       
                                                            <option value="S-30">S-30</option>
                                                            <option value="S-45">S-45</option>
                                                            <option value="S-90">S-90</option>
                                                    </select>
                                                    <label for="example2-select2">Status</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                <select class="form-control" id="payment-name" name="payment-name" style="width: 100%;">
                                                        <option selected disabled>Select Mode of Payment</option>
                                                        @foreach($payments as $pay)
                                                            <option value="{{$pay->payment_name}}">
                                                                {{$pay->payment_name}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <label for="contact2-msg">Mode of Payment</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <select class="form-control" id="order-terms" name="order-terms" style="width: 100%;">
                                                        <option selected disabled>Select Status</option>
                                                            <option value="Cash">Cash</option>
                                                            <option value="Charge">Charge</option>
                                                    </select>
                                                    <label for="example2-select2">Terms</label>
                                                </div>
                                            </div>

                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <input class="form-control" type="date" name="order-due-date" >
                                                    <label for="register5-lastname">Due Date</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                 <input class="form-control" type="text" name="amount-paid" id="amount-paid">
                                                 <label for="amount-paid">Amount Paid</label>
                                                </div>
                                            </div>

                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                 <input class="form-control" type="text" name="order-total-amount" id="order-total-amount">
                                                 <label for="register5-lastname">Total Amount</label>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <div class="col-xs-2">
                                                <button class="btn btn-sm btn-success newline"><i class="fa fa-plus push-5-r"></i> Add New Line</button>
                                            </div>
                                            <div class="col-xs-6">
                                                <button class="btn btn-sm btn-warning" type="submit" id="btnsave"><i class="fa fa-check push-5-r"></i> Save</button>
                                            </div>
                                        </div>
                                     </form>
                                       
                                </div>
                            </div>
                          </div>



        <script type="text/javascript">
        var submit=0;
        var id=1;
        var json = {{json_encode($products)}};

        $(".newline").click(function(){
            var elements='<div class="form-group">'+'<div class="col-xs-2">'+'<div class="form-material">'+'<select class="form-control" id="product-name-'+id+'" name="product-name[]" style="width: 100%;" onchange="item_listener('+id+')">'+'<option selected disabled>Select Product</option></select>'+'<label for="example2-select2">Product</label>'+'</div>'+'</div>'+'<div class="col-xs-2">'+'<div class="form-material">'+'<textarea class="form-control" name="order-warehouse[]" id="order-warehouse-'+id+'" rows="1"></textarea>'+'<label for="example2-select2">Warehouse</label>'+'</div>'+'</div>'+'<div class="col-xs-2">'+'<div class="form-material">'+'<input class="form-control" type="text" name="order-category[]" id="order-category-'+id+'">'+'<label for="register5-lastname">Category</label>'+'</div>'+'</div>'+'<div class="col-xs-1">'+'<div class="form-material">'+'<input class="form-control" type="text" name="order-qty[]" id="order-qty-'+id+'" onkeypress="total_amount('+id+')">'+'<label for="register5-lastname">Quantity</label>'+'</div>'+'</div>'+'<div class="col-xs-1">'+'<div class="form-material">'+'<input class="form-control" type="text" name="order-price[]" id="order-price-'+id+'">'+'<label for="register5-lastname">Price</label>'+'</div>'+'</div>'+'<div class="col-xs-1">'+'<div class="form-material">'+'<textarea class="form-control" name="order-vat[]" id="order-vat-'+id+'" rows="1"></textarea>'+'<label for="example2-select2">VAT%</label>'+'</div>'+'</div>'+'<div class="col-xs-2">'+'<div class="form-material">'+'<input class="form-control" type="text" id="order-amount-'+id+'" name="order-amount[]">'+'<label for="register5-lastname">Amount</label>'+'</div>'+'</div>'+'</div>'+'<div class="form-group">'+'<div class="col-xs-2">'+'<div class="form-material">'+'<input class="form-control" type="text" name="order-warranty[]" id="order-warranty-'+id+'">'+'<label for="register5-lastname">Product Warranty</label>'+'</div>'+'</div>'+'<div class="col-xs-2">'+'<div class="form-material">'+'<input class="form-control" type="date" name="order-warranty-date[]" id="order-warranty-date-0">'+'<label for="register5-lastname">Warranty Date</label>'+'</div>'+'</div>'+'</div>';
                $(".new").append(elements);
            $.each(json, function(index, val) {
                //console.log($('#bill-item-'+id));
                $('#product-name-'+id).append('<option value="'+val.id+'">'+val.product_name+'</option>');
            });
            id++;
        });
        $('#formid').submit(function(e){
            if (submit !=0)
            {
                return true;
            }
            else
            {
                e.preventDefault();
            }
        });
        $('#btnsave').click(function(){
            submit=1;
            $('#formid').submit()
        });

        var item_listener = function(id){
            //console.log(1);
            $(this).change(function(event) {
                $.each(json, function(index, val) {
                    if($('#product-name-'+id).val() == val.id)
                    {
                        $('#order-warehouse-'+id).val(val.warehouse);
                        $('#order-category-'+id).val(val.category);
                        $('#order-price-'+id).val(val.product_price);
                        $('#order-warranty-'+id).val(val.warranty);
                    }
                });
                // console.log($('#product-name-'+id).val());
            });
        };
        var total_amount = function(id)
            {
                $(this).change(function(event) {
                    supertotal = 0;

                    $('#order-qty-'+id).each(function() {
                         total = ($(this).val() * $('#order-price-'+id).val()) + (($(this).val() * $('#order-price-'+id).val()) * ($('#order-vat-'+id).val()/100));
                         $('#order-amount-'+id).val(total);
                    });
                    $.each($('input[name^="order-amount"]'), function(index, val) {
                        supertotal += parseInt($(this).val());
                    });
                    $('#order-total-amount').val(supertotal);
                });
        }
    </script>




        <script type="text/javascript">
                // uiHelperCkeditor();
                CKEDITOR.disableAutoInline = true;

                if (jQuery('#js-ckeditor-inline').length) {
                    CKEDITOR.inline('js-ckeditor-inline');
                }

                // Init full text editor
                if (jQuery('#js-ckeditor').length) {
                    CKEDITOR.replace('js-ckeditor');
                }

                $('.js-select2').select2();
            </script>

            <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });
        </script>
                                        
@stop