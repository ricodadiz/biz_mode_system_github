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
                                    <a href="{{URL::to('sales/'.$company->id.'/technician_allowance')}}">
                                    <button class="btn btn-default" type="button"><i class="fa fa-arrow-left"></i> Technician Allowance List</button>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="block-title">Add Technician Allowance</h3>
                        </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_service_report')}}" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Date</label>
                                                <input class="form-control input-lg" type="date" id="date" name="date">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Name of Technician</label>
                                                <input class="form-control input-lg" type="text" id="name" name="name" placeholder="Enter Technician Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Particulars</label>
                                                <input class="form-control input-lg" type="text" id="particular" name="particular" placeholder="Enter Location or  Station">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Transpo</label>
                                                <input class="form-control input-lg" type="text" id="transpo" name="transpo" placeholder="Enter Transpo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Accommodation</label>
                                                <input class="form-control input-lg" type="text" id="accommodation" name="accommodation" placeholder="Enter Accommodation">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Meals</label>
                                                <input class="form-control input-lg" type="number" id="meals" name="meals"
                                                placeholder="Enter Meals">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Others</label>
                                                <input class="form-control input-lg" type="text" id="others" name="others" placeholder="Others">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Total</label>
                                                <input class="form-control input-lg" type="number" id="technician_total" name="technician_total">
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