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
                            <h3 class="block-title">Service Report</h3>
                        </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_service_list')}}" method="post">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Service Report Type</label>         
                                                    <select class="form-control" id="report_type" name="report_type">
                                                        <option value=""></option>
                                                        <option value="Emergency Repair">Emergeny Repair</option>
                                                        <option value="Scheduled Repair">Scheduled Repair</option>
                                                        <option value="Preventive Maint">Preventive Maint</option>
                                                        <option value="Monitoring">Monitoring</option>
                                                        <option value="Comissioning">Comissioning</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Station/Location</label>
                                                <input class="form-control input-lg" type="text" id="station_location" name="station_location" placeholder="Enter your station or location">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Contact Person</label>
                                                <input class="form-control input-lg" type="text" id="contact_person" name="contact_person" placeholder="Enter Contact Person">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Contact Number(s)</label>
                                                <input class="form-control input-lg" type="text" id="contact_nos" name="contact_nos" placeholder="Enter Contact number">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Service Date</label>
                                                <input class="form-control input-lg" type="date" id="service_date" name="service_date">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Pump Phone-in Concern</label>
                                                <input class="form-control input-lg" type="text" id="pump_phone_in_concern" name="pump_phone_in_concern" placeholder="Enter your pump phone-in concern">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Phone-In By</label>
                                                <input class="form-control input-lg" type="text" id="phone_in_by" name="phone_in_by" placeholder="Enter phone in by">
                                            </div>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Call Slip No</label>
                                                <input class="form-control input-lg" type="text" id="call_slip_no" name="call_slip_no" placeholder="Enter Call Slip No">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Time Start</label>
                                                <input class="form-control input-lg" type="time" id="time_start" name="time_start">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Time End</label>
                                                <input class="form-control input-lg" type="time" id="time_end" name="time_end">
                                            </div>
                                        </div>
                                    </div>
                               </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Pump Manufacturer</label>
                                                <input class="form-control input-lg" type="text" id="pump_manufacturer" name="pump_manufacturer" placeholder="Enter Pump Manufacturer">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Pump Model</label>
                                                <input class="form-control input-lg" type="text" id="pump_model" name="pump_model" placeholder="Enter Pump Model">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Pump Serial Number</label>
                                                <input class="form-control input-lg" type="text" id="pump_serial_no" name="pump_serial_no" placeholder="Enter Pump Serial Number">
                                            </div>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Service By</label>
                                                <input class="form-control input-lg" type="text" id="service_by" name="service_by" placeholder="Enter Pump Manufacturer">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Pump Number</label>
                                                <input class="form-control input-lg" type="number" id="pump_no" name="pump_no" placeholder="Enter Hose Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Hose Number</label>
                                                <input class="form-control input-lg" type="number" id="hose_no" name="hose_no" placeholder="Enter Hose Number">
                                            </div>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Product</label>
                                                <div class="checkbox">
                                                    @foreach($products as $p)
                                                    <label>
                                                        <input type="checkbox" id="product" name="product[]" value="{{$p->product_name}}">{{$p->product_name}}
                                                    </label>
                                                    @endforeach 
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Totalizer Before Service (LTRS)</label>
                                                <input class="form-control input-lg" type="text" id="totalizer_before_service" name="totalizer_before_service" placeholder="Enter Totalizer Before Service (LTRS)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Totalizer After Service (LTRS)</label>
                                                <input class="form-control input-lg" type="text
                                                " id="totalizer_after_service" name="totalizer_after_service" placeholder="Enter Totalizer After Service (LTRS)">
                                            </div>
                                        </div>
                                    </div>
                               </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Total LTRS used</label>
                                                <input class="form-control input-lg" type="text" id="total_ltrs_used" name="total_ltrs_used" placeholder="Enter Total LTRS used">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Pump Condition Before Repair</label>
                                                <input class="form-control input-lg" type="text" id="pump_condition_before_repair" name="pump_condition_before_repair" placeholder="Enter Pump Condition Before Repair">
                                            </div>
                                        </div>
                                    </div>
                               </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Work Details</label>
                                                <textarea class="form-control input-lg" id="work_details" name="work_details" rows="10" placeholder="Enter Work Details"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Remarks/Result</label>
                                                <textarea class="form-control input-lg" id="remarks_result" name="remarks_result" rows="10" placeholder="Enter Remakrs/Result"></textarea>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Final Counter Measure</label>
                                                <input class="form-control input-lg" type="text" id="final_counter_measure" name="final_counter_measure" placeholder="Enter Final Counter Measure">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname" class="col-xs-12">10 LTRS Calibration Check</label>
                                                <label class="css-input css-radio css-radio-warning push-10-r">
                                                <input type="radio" name="ten_ltrs_calibration_check" value="Slow"><span></span> Slow
                                                </label>
                                                <label class="css-input css-radio css-radio-warning">
                                                    <input type="radio" name="ten_ltrs_calibration_check" value="Medium"><span></span> Medium
                                                </label>
                                                <label class="css-input css-radio css-radio-warning">
                                                    <input type="radio" name="ten_ltrs_calibration_check" value="Fast"><span></span>
                                                    Fast
                                                </label> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                    
                                        <div class="form-group">
                                            <div class="col-xs-12" style="width:100px";>
                                                <label for="mega-lastname">QTY/UNIT</label>
                                                <input class="form-control input-lg" type="number" id="qty_unit" name="qty_unit">
                                            </div>
                                            <div class="col-xs-12" style="width:200px";>
                                                <label for="mega-lastname">Replaced Parts</label>
                                                <input class="form-control input-lg" type="text" id="replace_parts" name="replace_parts" placeholder="Enter Replace Parts">
                                            </div>
                                            <div class="col-xs-12" style="width:200px";>
                                                <label for="mega-lastname">Unit Cost</label>
                                                <input class="form-control input-lg" type="number" id="unit_cost" name="unit_cost">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-lastname" class="col-xs-12">1 LTR Calibration Check</label>
                                                <label class="css-input css-radio css-radio-warning push-10-r">
                                                    <input type="radio" name="one_ltr_calibration_check" value="Slow"><span></span> Slow
                                                </label>
                                                <label class="css-input css-radio css-radio-warning">
                                                    <input type="radio" name="one_ltr_calibration_check" value="Medium"><span></span> Medium
                                                </label>
                                                <label class="css-input css-radio css-radio-warning">
                                                    <input type="radio" name="one_ltr_calibration_check" value="Fast"><span></span>
                                                    Fast
                                                </label> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-12" style="width:170px">
                                                <label for="mega-lastname" class="col-xs-12">Under Warranty</label>
                                                <label class="css-input css-radio css-radio-warning push-10-r">
                                                    <input type="radio" name="under_warranty" value="Yes"><span></span>Yes
                                                </label>
                                                <label class="css-input css-radio css-radio-warning push-10-r">
                                                    <input type="radio" name="under_warranty" value="No"><span></span>No
                                                </label>
                                            </div>
                                            <div class="col-xs-12" style="width:180px">
                                                <label for="mega-lastname">Charge to</label>
                                                <input class="form-control input-lg" type="text" id="charge_to" name="charge_to" placeholder="Enter Charge to">
                                            </div>
                                            <div class="col-xs-12" style="width:180px">
                                                <label for="mega-lastname">Conforme</label>
                                                <input class="form-control input-lg" type="text" id="conforme" name="conforme" placeholder="Enter conforme">
                                            </div>
                                            <div class="col-xs-12" style="width:170px">
                                                <label for="mega-lastname">Service Charge</label>
                                                <input class="form-control input-lg" type="number" id="service_charge" name="service_charge">
                                            </div>
                                        </div>  
                                    </div>                                   
                                </div>   

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button class="btn btn-warning" type="submit"><i class="fa fa-check push-5-r"></i>Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
@stop