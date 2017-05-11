@extends('layout.in_app')
@section('content')
                            @if(isset(Session::get('add_service_list_success')["message"]))
                                    <div class="alert alert-success">
                                        {{Session::get('add_service_list_success')["message"]}}
                                    </div>
                                @endif
                                @if(Session::get('add_service_list_error'))
                                    <div class="alert alert-error alert-danger">
                                    @foreach(Session::get('add_service_list_error')->all() as $m)
                                        {{$m}}<br>    
                                    @endforeach
                                    </div>
                            @endif
                        <div class="block block-bordered">
                            <div class="block-header bg-gray-lighter">
                                <ul class="block-options">
                                    {{-- <li>
                                        <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                    </li> --}}
                                    <li>
                                        <a href="{{URL::to('sales/'.$company->id.'/order_list_generic')}}">
                                                <button class="btn btn-default" type="button"><i class="fa fa-arrow-left"></i> Product Order List</button>
                                        </a> 
                                    </li>
                                </ul>
                                <h3 class="block-title">Add Service</h3>
                            </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_service_report/'.$order_service->id)}}" method="post" id="formid">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Customer Name</label>
                                                <input class="form-control input-lg" type="text" id="customer_name" name="customer_name"  value="{{$clients->client_customer_name}}" readonly>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Service Date</label>
                                                <input class="form-control input-lg" type="date" id="service_date" name="service_date">
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">SR. No.</label>
                                                <input class="form-control input-lg" type="number" id="sr_no" name="sr_no" placeholder="Enter Ref. No.">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-firstname">Station/Location</label>
                                                <input class="form-control input-lg" type="text" id="station_location" name="station_location" placeholder="Enter Station/Location">
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Address</label>
                                                <input class="form-control input-lg" type="text" id="address" name="address" placeholder="Enter Address">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Service By</label>
                                                <input class="form-control input-lg" type="text" id="service_by" name="service_by" placeholder="Service By">
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <textarea class="form-control" id="work_details" name="work_details" rows="2" placeholder="Enter Work Details"></textarea>
                                                <label for="material-textarea-small">Work Details</label>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <textarea class="form-control" id="remarks_result" name="remarks_result" rows="2" placeholder="Enter Work Details"></textarea>
                                                <label for="material-textarea-small">Remarks/Result</label>
                                              </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                               
                        <h5 style="margin-top: -20px;margin-bottom: 25px;">SPARE PARTS</h5>
                              
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="example2-select2">Item</label>   
                                                <select class="form-control" id="item-0" name="item[]" style="width: 100%;" onchange="item_listener(0)">
                                                        <option selected disabled>Select Item</option>
                                                @foreach($orders_product as $op)                                          
                                                        <option value="{{$op->id}}">{{$op->products}}</option>
                                                @endforeach
                                                     
                                                </select>
                                               {{--  @foreach($orders_product as $op)
                                                        <input class="form-control input-lg" type="text" id="item" name="item" value="{{$op->products}}">
                                                @endforeach
                                                <label for="example2-select2">Item</label> --}}
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Unit Cost</label>
                                                    <input class="form-control input-lg" type="text" name="unit-cost[]" id="unit-cost-0">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-firstname">Quantity</label>
                                                <input class="form-control input-lg" type="text" name="qty[]" id="qty-0"  placeholder="Enter Quantity" onkeypress="total_amount(0)">
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Amount</label>
                                                <input class="form-control input-lg" type="text" name="total[]" id="total-0">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="new"></div>
                                    <div class="col-xs-2">
                                        <div class="form-material">
                                            <label for="mega-lastname">Service Charge</label>
                                            <input class="form-control input-lg" type="text" id="service_charge" name="service_charge">
                                        </div>
                                    </div>
                                </div>
                                
                              
                                <div class="row">
                                  <div class="col-sm-6">
                                    <div class="form-group">
                                        {{-- <div class="col-xs-3">
                                            <div class="form-material">
                                                <button class="btn btn-success newline"><i class="fa fa-plus push-5-r"></i> Add New Line</button>
                                            </div>
                                        </div> --}}

                                        <div class="col-xs-6">
                                            <div class="form-material">
                                            <button class="btn btn-warning" type="submit" id="btnsave"><i class="fa fa-check push-5-r"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>


    <script type="text/javascript">
        var submit=0;
        var id=1;
        var json = {{json_encode($orders_product)}};

        $(".newline").click(function(){
            var elements='<div class="col-sm-6">'+'<div class="form-group">'+'<div class="col-xs-6">'+'<div class="form-material">'+'<label for="example2-select2">Item</label>'+'<select class="form-control" id="item-'+id+'" name="item[]" style="width: 100%;" onchange="item_listener('+id+')">'+'<option selected disabled>Select Item</option></select>'+'</div>'+'</div>'+'<div class="col-xs-6">'+'<div class="form-material">'+'<label for="mega-lastname">Unit Cost</label>'+'<input class="form-control input-lg" type="number" id="unit-cost-'+id+'" name="unit-cost[]">'+'</div>'+'</div>'+'</div>'+'</div>'+'<div class="col-sm-6">'+'<div class="form-group">'+'<div class="col-xs-6">'+'<div class="form-material">'+'<label for="mega-firstname">Quantity</label>'+'<input class="form-control input-lg" type="number" id="qty-'+id+'" name="qty[]" placeholder="Enter Quantity" onkeypress="total_amount('+id+')">'+'</div>'+'</div>'+'<div class="col-xs-6">'+'<div class="form-material">'+'<label for="mega-lastname">Amount</label>'+'<input class="form-control input-lg" type="number" id="total-'+id+'" name="total[]">'+'</div>'+'</div>'+'</div>'+'</div>';
                $(".new").append(elements);
            $.each(json, function(index, val) {
                //console.log($('#bill-item-'+id));
                $('#item-'+id).append('<option value="'+val.id+'">'+val.products+'</option>');
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
                    if($('#item-'+id).val() == val.id)
                    {
                        $('#unit-cost-'+id).val(val.price);
                        $('#qty-'+id).val(val.quantity);
                        $('#total-'+id).val(val.amount);
                    }
                });

             });
        };

        // var total_amount = function(id)
        //     {
        //         $(this).change(function(event) {
        //             totalAmount = 0;

        //             $('#qty-'+id).each(function() {
        //                  // unitTotal = parseInt($('#unit_cost-'+id).val());
        //                  unitTotal= ($(this).val() * $('#unit-cost-'+id).val());
        //                  $('#total-'+id).val(unitTotal);
        //             });
        //             $.each($('input[name^="total"]'), function() {
        //                 totalAmount += parseInt($(this).val());
        //             });
        //                 $('#total-amount').val(totalAmount);
        //         });
        //     }
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