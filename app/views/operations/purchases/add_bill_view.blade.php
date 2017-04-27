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
                                        <div class="h1 font-w700" data-toggle="countTo" data-to="{{$bill_count}}"></div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Bills</div>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <a class="block block-link-hover3 text-center" href="{{URL::to('purchases/'.$company->id.'/bill_view')}}">
                                    <div class="block-content block-content-full">
                                        <div class="h4 font-w50 text-info"><i class="glyphicon glyphicon-list fa-2x"></i></div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Back to Bill list</div>
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
                                    <h3 class="block-title">Add Bill</h3>
                                </div>
                                <div class="block-content">
                                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('purchases/'.$company->id.'/add_bill_view')}}" id="formid" method="post">
                                        <div class="form-group">
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <select class="js-select2 form-control" name="bill-retailer" style="width: 100%;">
                                                        <option selected disabled>Select Retailer</option>
                                                        @foreach($purchase as $p)
                                                            <option value="{{$p->id}}">{{$p->retailer_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="example2-select2">Retailer</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <input class="form-control" type="date" name="bill-date" value="<?php echo date('Y-m-d'); ?>">
                                                    <label for="register5-lastname">Date</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <input class="form-control" type="date" name="bill-due-date" >
                                                    <label for="register5-lastname">Due Date</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material">
                                                    <textarea class="form-control" name="bill-note" rows="2"></textarea>
                                                    <label for="contact2-msg">Note</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <select class="form-control" id="bill-item-0" name="bill-item[]" style="width: 100%;" onchange="item_listener(0)">
                                                        <option selected disabled>Select Item</option>
                                                        @foreach($service as $s)
                                                            <option value="{{$s->id}}">{{$s->product_service}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="example2-select2">Item</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                <textarea class="form-control" name="bill-category[]" id="bill-category-0" rows="1"></textarea>
                                                    <!-- <select class="form-control" name="bill-expense-category" style="width: 100%;">
                                                        <option selected disabled>Select Category</option>
                                                        
                                                            <option value="1">rick</option>
                                                            <option value="2">rico</option>
                                                            <option value="3">nats</option>
                                                            <option value="4">niko</option>
                                                        
                                                    </select> -->
                                                    <label for="example2-select2">Expense Category</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <textarea class="form-control" name="bill-description[]" id="bill-description-0" rows="1"></textarea>
                                                   <!-- <select class="form-control" name="bill-description-list" style="width: 100%;">
                                                    @foreach($service as $s)
                                                            <option value="{{$s->id}}">{{$s->product_service_description}}</option>
                                                        @endforeach
                                                        </select> -->
                                                    <label for="contact2-msg">Description</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="bill-qty[]" id="bill-qty-0" onkeypress="total_amount(0)">
                                                    <label for="register5-lastname">Quantity</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="bill-price[]" id="bill-price-0">
                                                    <!-- <select class="form-control" name="bill-description" style="width: 100%;">
                                                    @foreach($service as $s)
                                                            <option value="{{$s->id}}">{{$s->price}}</option>
                                                        @endforeach
                                                        </select> -->
                                                    <label for="register5-lastname">Price</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <textarea class="form-control" name="bill-tax[]" id="bill-tax-0" rows="1"></textarea>
                                                    <!-- <select class="form-control" name="bill-percent" style="width: 100%;">
                                                        <option selected disabled>Percent</option>
                                                        @foreach($service as $s)
                                                            <option value="{{$s->id}}">{{$s->sales_tax}}</option>
                                                        @endforeach
                                                    </select> -->
                                                    <label for="example2-select2">Tax%</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <input class="form-control" class="form-control" type="text" name="bill-amount[]" id="bill-amount-0">
                                                    <label for="register5-lastname">Amount</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="new"></div>
                                        
                                        <div class="form-group">
                                            <div class="col-xs-2">
                                                <button class="btn btn-sm btn-success newline"><i class="fa fa-plus push-5-r"></i> Add New Line</button>
                                            </div>
                                            <div class="col-xs-6">
                                                <button class="btn btn-sm btn-warning" type="submit" id="btnsave"><i class="fa fa-check push-5-r"></i> Save</button>
                                            </div>
                                            <div class="col-xs-2" style="padding-left: 130px;">
                                                <div class="form-material">
                                                <h3>Total:</h3>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <input class="form-control" class="form-control" type="text" name="bill-total-amount" id="bill-total-amount">
                                                </div>
                                            </div>

                                        </div>
                                     </form>
                                       
                                </div>
                            </div>
                          </div>



        <script type="text/javascript">
        var submit=0;
        var id=1;
        var json = {{json_encode($service)}};

        $(".newline").click(function(){
            var elements='<div class="form-group">'+'<div class="col-xs-2">'+'<div class="form-material">'+'<select class="form-control" id="bill-item-'+id+'" name="bill-item[]" style="width: 100%;" onchange="item_listener('+id+')">'+'<option selected disabled>Select Item</option></select>'+'<label for="example2-select2">Item</label>'+'</div>'+'</div>'+'<div class="col-xs-2">'+'<div class="form-material">'+'<textarea class="form-control" name="bill-category[]" id="bill-category-'+id+'" rows="1"></textarea>'+'<label for="example2-select2">Expense Category</label>'+'</div>'+'</div>'+'<div class="col-xs-2">'+'<div class="form-material">'+'<textarea class="form-control" name="bill-description[]" id="bill-description-'+id+'" rows="1">'+'</textarea>'+'<label for="contact2-msg">Description</label>'+'</div>'+'</div>'+'<div class="col-xs-1">'+'<div class="form-material">'+'<input class="form-control" type="text" name="bill-qty[]" id="bill-qty-'+id+'" onkeyup="total_amount('+id+')">'+'<label for="register5-lastname">Quantity</label>'+'</div>'+'</div>'+'<div class="col-xs-1">'+'<div class="form-material">'+'<input class="form-control" type="text" name="bill-price[]" id="bill-price-'+id+'">'+'<label for="register5-lastname">Price</label>'+'</div>'+'</div>'+'<div class="col-xs-2">'+'<div class="form-material">'+'<textarea class="form-control" name="bill-tax[]" id="bill-tax-'+id+'" rows="1"></textarea>'+'<label for="example2-select2">Tax</label>'+'</div>'+'</div>'+'<div class="col-xs-2">'+'<div class="form-material">'+'<input class="form-control" type="text" id="bill-amount-'+id+'" name="bill-amount[]">'+'<label for="register5-lastname">Amount</label>'+'</div>'+'</div>'+'</div>';
                $(".new").append(elements);
            $.each(json, function(index, val) {
                //console.log($('#bill-item-'+id));
                $('#bill-item-'+id).append('<option value="'+val.id+'">'+val.product_service+'</option>');
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
                    if($('#bill-item-'+id).val() == val.id)
                    {
                        $('#bill-description-'+id).val(val.product_service_description);
                        $('#bill-category-'+id).val(val.expense_account);
                        $('#bill-price-'+id).val(val.price);
                        $('#bill-tax-'+id).val(val.sales_tax);
                    }
                });
                console.log($('#bill-item-'+id).val());
            });
        };
        var total_amount = function(id)
            {
                $(this).change(function(event) {
                    supertotal = 0;

                    $('#bill-qty-'+id).each(function() {
                         total = ($(this).val() * $('#bill-price-'+id).val()) + (($(this).val() * $('#bill-price-'+id).val()) * ($('#bill-tax-'+id).val()/100));
                         $('#bill-amount-'+id).val(total);
                    });
                    $.each($('input[name^="bill-amount"]'), function(index, val) {
                        supertotal += parseInt($(this).val());
                    });
                    $('#bill-total-amount').val(supertotal);
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