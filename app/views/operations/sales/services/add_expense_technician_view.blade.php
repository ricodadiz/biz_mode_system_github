@extends('layout.in_app')
@section('content')
                            @if(isset(Session::get('add_technician_success')["message"]))
                                    <div class="alert alert-success">
                                        {{Session::get('add_technician_success')["message"]}}
                                    </div>
                                @endif
                                @if(Session::get('add_technician_error'))
                                    <div class="alert alert-error alert-danger">
                                    @foreach(Session::get('add_technician_error')->all() as $m)
                                        {{$m}}<br>    
                                    @endforeach
                                    </div>
                            @endif
                        <div class="block block-bordered">
                        <div class="block-header bg-gray-lighter">
                            <ul class="block-options">
                                <li>
                                    <a href="{{URL::to('sales/'.$company->id.'/expense_technician_list')}}">
                                    <button class="btn btn-default" type="button"><i class="fa fa-arrow-left"></i> Technician Allowance List</button>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="block-title">Add Technician Allowance</h3>
                        </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_expense_technician')}}" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                <label for="mega-lastname">Date</label>
                                                <input class="form-control input-lg" type="date" id="expense_date" name="expense_date">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                <label for="mega-firstname">Name of Technician</label>
                                                <input class="form-control input-lg" type="text" id="name" name="expense_name" placeholder="Enter Technician Name">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                <label for="mega-lastname">Particulars</label>
                                                <input class="form-control input-lg" type="text" id="expense_particular" name="expense_particular" placeholder="Enter Location or  Station">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                <label for="mega-lastname">Transpo</label>
                                                <input class="form-control input-lg" type="text" id="expense_transpo" name="expense_transpo" placeholder="Enter Transpo">
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
                                                <label for="mega-lastname">Accommodation</label>
                                                <input class="form-control input-lg" type="text" id="expense_accommodation" name="expense_accommodation" placeholder="Enter Accommodation">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                <label for="mega-lastname">Meals</label>
                                                <input class="form-control input-lg" type="number" id="expense_meals" name="expense_meals"
                                                placeholder="Enter Meals">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                <label for="mega-lastname">Others</label>
                                                <input class="form-control input-lg" type="text" id="expense_others" name="expense_others" placeholder="Others">
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                <label for="mega-lastname">Total</label>
                                                <input class="form-control input-lg" type="number" id="expense_total" name="expense_total">
                                                </div>
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