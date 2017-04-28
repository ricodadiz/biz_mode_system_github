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
                                        <a href="{{URL::to('sales/'.$company->id.'/service_list')}}">
                                                <button class="btn btn-default" type="button"><i class="fa fa-arrow-left"></i> Service List</button>
                                        </a> 
                                    </li>
                                </ul>
                                <h3 class="block-title">Add Services</h3>
                            </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/update_service_report/'.$services->id)}}" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Service Date</label>
                                                <input class="form-control input-lg" type="date" id="service_date" name="service_date" value="{{$services->service_date}}">
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">SR. No.</label>
                                                <input class="form-control input-lg" type="number" id="sr_no" name="sr_no" value="{{$services->sr_no}}">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-firstname">Station/Location</label>
                                                <input class="form-control input-lg" type="text" id="station_location" name="station_location" value="{{$services->station_location}}">
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Address</label>
                                                <input class="form-control input-lg" type="text" id="address" name="address" value="{{$services->address}}">
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
                                                <input class="form-control input-lg" type="text" id="service_by" name="service_by" value="{{$services->service_by}}">
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <textarea class="form-control" id="work_details" name="work_details" rows="2">{{$services->work_details}}</textarea>
                                                <label for="material-textarea-small">Work Details</label>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <textarea class="form-control" id="remarks_result" name="remarks_result" rows="2">{{$services->remarks_result}}</textarea>
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
                                                <select class="js-select2 form-control" id="item" name="item" style="width: 100%;" data-placeholder="Choose one..">
                                                        <option selected disabled>Select Item</option>
                                                        @foreach($product as $p)
                                                            @if($services->item == $p->product_name)
                                                            <option value="{{$p->product_name}}" selected>{{$p->product_name}}</option>
                                                            @else
                                                                <option value="{{$p->product_name}}">{{$p->product_name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                    <label for="example2-select2">Item</label>
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Unit Cost</label>
                                                <input class="form-control input-lg" type="number" id="unit_cost" name="unit_cost" value="{{$services->unit_cost}}">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-firstname">Quantity</label>
                                                <input class="form-control input-lg" type="number" id="qty" name="qty" value="{{$services->qty}}">
                                              </div>
                                            </div>
                                            <div class="col-xs-6">
                                              <div class="form-material">
                                                <label for="mega-lastname">Service Charge</label>
                                                <input class="form-control input-lg" type="number" id="service_charge" name="service_charge" value="{{$services->service_charge}}">
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
                                                    <label for="mega-lastname">Total</label>
                                                    <input class="form-control input-lg" type="number" id="total" name="total" value="{{$services->total}}">
                                            </div>
                                        </div>
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
@stop