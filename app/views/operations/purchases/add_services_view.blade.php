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

            <div class="col-sm-10 col-sm-offset-1">
                <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 text-info font-w700" data-toggle="countTo" data-to="{{$service_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Number of Products or Services</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-6">
                                <a class="block block-link-hover3 text-center" href="{{URL::to('purchases/'.$company->id.'/products_services_view')}}">
                                    <div class="block-content block-content-full">
                                        <div class="h4 font-w50 text-info"><i class="glyphicon glyphicon-list fa-2x"></i></div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Back to Products & Services list</div>
                                </a>
                            </div>
                    </div>
              </div>  

                    <div class="col-sm-10 col-sm-offset-1">
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
                                    <h3 class="block-title">Add Product or Service</h3>
                                </div>
                                <div class="block-content">
                                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('purchases/'.$company->id.'/add_services_view')}}" method="post">
                                        <div class="form-group">
                                            <div class="col-xs-8">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="register5-firstname" name="services-name" placeholder="Enter the product or service..">
                                                    <label for="register5-firstname">Product or Service</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <input class="form-control" type="number" id="register5-firstname" name="services-price" placeholder="Enter the price..">
                                                    <label for="register5-firstname">Price</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material">
                                                    <textarea class="form-control" id="contact2-msg" name="services-description" rows="3"></textarea>
                                                    <label for="contact2-msg">Description</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <select class="form-control" id="contact2-subject" name="services-income" size="1">
                                                        <option value="" selected disabled>Select your option...</option>
                                                        @foreach($income as $i)
                                                        <option value="{{$i->name}}">{{$i->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="contact2-subject">Income Account</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <select class="form-control" id="contact2-subject" name="services-expense" size="1" value="Choose" >
                                                        <option value="" selected disabled>Select your option...</option>
                                                         @foreach($expense as $e)
                                                        <option value="{{$e->name}}">{{$e->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="contact2-subject">Expense Account</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <select class="form-control" id="contact2-subject" name="services-tax" size="1" value="Choose" >
                                                        <option value="" selected disabled>Select your option...</option>
                                                        @foreach($vats as $v)
                                                        <option value="{{$v->id}}">{{$v->vat_value}}%</option>
                                                        @endforeach
                                                    </select>
                                                    <label for="contact2-subject">Sales tax</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-warning" type="submit"><i class="fa fa-check push-5-r"></i> Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>  




       <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });
        </script>

        {{HTML::script("assets/js/plugins/select2/select2.full.min.js")}}
        <script type="text/javascript">
            $(".js-select2").select2();
            $('.js-dataTable-full').dataTable({
                pageLength: 10,
                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
            });
        </script>
@stop