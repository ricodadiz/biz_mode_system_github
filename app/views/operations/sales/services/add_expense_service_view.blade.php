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
                                        <a href="{{URL::to('sales/'.$company->id.'/expense_service_list')}}">
                                                <button class="btn btn-default" type="button"><i class="fa fa-arrow-left"></i> Service List</button>
                                        </a> 
                                    </li>
                                </ul>
                                <h3 class="block-title">Add Services</h3>
                            </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_expense_service/'.$order_service->id)}}" method="post">
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
                                                @foreach($orders_product as $op)
                                                        <input class="form-control input-lg" type="text" id="item" name="item" value="{{$op->products}}">
                                                @endforeach
                                                <label for="example2-select2">Item</label>
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Unit Cost</label>
                                                @foreach($orders_product as $op)
                                                    <input class="form-control input-lg" type="number" id="unit_cost-0" name="unit_cost[]" value="{{$op->price}}">
                                                @endforeach
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-firstname">Quantity</label>
                                                <input class="form-control input-lg" type="number" id="qty" name="qty" placeholder="Enter Quantity" onkeypress="NoServiceCost(0)">
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Total</label>
                                                <input class="form-control input-lg" type="number" id="total" name="total" >
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
                                            <button class="btn btn-warning" type="submit"><i class="fa fa-check push-5-r"></i>Save</button>
                                            </div>
                                        </div>
                                    </div>
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>


    <script>
        jQuery(function () {
            // Init page helpers (Appear + CountTo plugins)
            App.initHelpers(['appear', 'appear-countTo']);
        });

        var NoServiceCost = function(id)
            {
                $(this).change(function(event) {
                    total = 0;

                    $('#qty').each(function() {
                         unitTotal = parseInt($('#unit_cost-'+id).val());
                         // total= ($(this).val() * $('#unit_cost-'+id).val());
                         $('#total').val(unitTotal);
                    });
                });
        }



    </script>
@stop