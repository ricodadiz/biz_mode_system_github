@extends('layout.in_app')
@section('content')
                            @if(isset(Session::get('add_spareparts_success')["message"]))
                                    <div class="alert alert-success">
                                        {{Session::get('add_spareparts_success')["message"]}}
                                    </div>
                                @endif
                                @if(Session::get('add_spareparts_error'))
                                    <div class="alert alert-error alert-danger">
                                    @foreach(Session::get('add_spareparts_error')->all() as $m)
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
                                    <a href="{{URL::to('sales/'.$company->id.'/spare_part')}}">
                                            <button class="btn btn-default" type="button"><i class="fa fa-arrow-left"></i> Spare Parts List</button>
                                    </a>
                                </li>
                            </ul>
                            <h3 class="block-title">Spare Parts Report</h3>
                        </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('sales/'.$company->id.'/add_sparepart')}}" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Date</label>
                                                <input class="form-control input-lg" type="date" id="date" name="date">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Account Name</label>
                                                <input class="form-control input-lg" type="text" id="account_name" name="account_name" placeholder="Enter Client Name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Product</label>
                                                <input class="form-control input-lg" type="type" id="product" name="product" placeholder="Enter Product Code">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Amount</label>
                                                <input class="form-control input-lg" type="number" id="amount" name="amount" placeholder="Enter Amount">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Qty</label>
                                                <input class="form-control input-lg" type="number" id="qty" name="qty" placeholder="Enter Product Qty">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Total</label>
                                                <input class="form-control input-lg" type="number" id="total" name="total">
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