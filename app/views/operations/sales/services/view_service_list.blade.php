@extends('layout.in_app')
@section('content')
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
                            <h3 class="block-title">Service List</h3>
                        </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_service_list')}}" method="post">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <strong>Service Report Type</strong>         
                                                  <p>{{$services->report_type}}</p>
                                            </div>
                                        </div>
                                    </div>                                  
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <strong>Station/Location</strong>
                                                <p>{{$services->station_location}}</p>
                                            </div>
                                            <div class="col-xs-6">
                                                <strong>Contact Person</strong>
                                                <p>{{$services->contact_person}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <strong>Contact Number(s)</strong>
                                                <p>{{$services->contact_nos}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <strong>Service Date</strong>
                                                <p>{{$services->service_date}}</p>
                                            </div>
                                            <div class="col-xs-6">
                                                <strong>Pump Phone-in Concern</strong>
                                                <p>{{$services->pump_phone_in_concern}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <strong>Phone-In By</strong>
                                                <p>{{$services->phone_in_by}}</p>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <strong>Call Slip Number</strong>
                                                <p> {{$services->call_slip_no}} </p>
                                            </div>
                                            <div class="col-xs-6">
                                                <strong>Time Start</strong>
                                                <p> {{$services->time_start}} </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <strong>Time End</strong>
                                                <p>{{$services->time_end}}</p>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <strong>Pump Manufacturer</strong>
                                                <p>{{$services->pump_manufacturer}}</p>
                                            </div>
                                            <div class="col-xs-6">
                                                <strong>Pump Model</strong>
                                                <p> {{$services->pump_model}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <strong>Pump Serial Number</strong>
                                                <p>{{$services->pump_serial_no}}</p>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <strong>Service By</strong>
                                                <p>{{$services->service_by}}</p>
                                            </div>
                                            <div class="col-xs-6">
                                                <strong>Pump Number</strong>
                                                <p>{{$services->pump_no}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <strong>Hose Number</strong>
                                                <p>{{$services->hose_no}}</p>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                               <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <strong>Product</strong>
                                                <p>{{$services->product}}</p>
                                            </div>
                                            <div class="col-xs-6">
                                                <strong>Totalizer Before Service (LTRS)</strong>
                                                <p>{{$services->totalizer_before_service}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <strong>Totalizer After Service (LTRS)</strong>
                                               <p>{{$services->totalizer_after_service}}</p>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <strong>Total LTRS used</strong>
                                               <p>{{$services->total_ltrs_used}}</p>
                                            </div>
                                            <div class="col-xs-6">
                                                <strong>Pump Condition Before Repair</strong>
                                                <p>{{$services->pump_condition_before_repair}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                               </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <strong>Work Details</strong>
                                                <p>{{$services->work_details}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <strong>Remarks/Result</strong>
                                                <p> {{$services->remarks_result}}</p>
                                            </div>
                                        </div>
                                    </div>
                               </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <strong>Final Counter Measure</strong>
                                                <p>{{$services->final_counter_measure}} </p>
                                            </div>
                                            <div class="col-xs-6">
                                                <strong>10 LTRS Calibration Check</strong>
                                                <p>{{$services->ten_ltrs_calibration_check}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <strong>1 LTR Calibration Check</strong>
                                                <p>{{$services->one_ltr_calibration_check}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-12" style="width:50%";>
                                                <strong>QTY/UNIT</strong>
                                                <p> {{$services->qty_unit}} </p>
                                            </div>
                                            <div class="col-xs-12" style="width:50%";>
                                                <strong>Replaced Parts</strong>
                                                <p>{{$services->replace_parts}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                             <div class="col-xs-12" style="width:50%";>
                                                <strong>Unit Cost</strong>
                                                <p>{{$services->unit_cost}}</p>
                                            </div>
                                            <div class="col-xs-12" style="width:50%";>
                                                <strong>Total</strong>
                                                <p>{{$services->qty_unit * $services->unit_cost }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-12" style="width:33%">
                                                <strong>Under Warranty</strong>
                                                 <p>{{$services->under_warranty}}</p>
                                            </div>
                                            <div class="col-xs-12" style="width:33%">
                                                <strong>Charge to</strong>
                                                <p>{{$services->charge_to}}</p>
                                            </div>
                                            <div class="col-xs-12" style="width:33%">
                                                <strong>Conforme</strong>
                                                <p>{{$services->conforme}}</p>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-12" style="width:50%">
                                                <strong>Service Charge</strong>
                                                <p>{{$services->service_charge}}</p>
                                            </div>
                                            <div class="col-xs-12" style="width:50%">
                                                <strong>Total</strong>
                                                <p>{{$services->service_charge + $services->qty_unit * $services->unit_cost }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>   

                              
                            </form>
                        </div>
                    </div>
@stop