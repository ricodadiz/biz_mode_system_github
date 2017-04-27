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
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/update_service')}}" method="post">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Station/Location</label>
                                                <input class="form-control input-lg" type="text" id="station_location" name="station_location" value="{{$services->station_location}}">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Service Date</label>
                                                <input class="form-control input-lg" type="date" id="service_date" name="service_date" value="{{$services->service_date}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Ref. No.</label>
                                                <input class="form-control input-lg" type="number" id="contact_person" name="contact_person" value="{{$services->contact_person}}">
                                            </div>
                                            <div class="col-xs-4" style="width:200px";>
                                                <label for="mega-lastname">Total</label>
                                                <input class="form-control input-lg" type="number" id="service_total" value="{{$services->service_total}}">
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