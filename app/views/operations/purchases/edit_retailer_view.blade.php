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
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 text-info font-w700" data-toggle="countTo" data-to="{{$retailer_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Number of Retailers</div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                                <a class="block block-link-hover3 text-center" href="{{URL::to('purchases/'.$company->id.'/retailer_view')}}">
                                    <div class="block-content block-content-full">
                                        <div class="h4 font-w50 text-info"><i class="glyphicon glyphicon-list fa-2x"></i></div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Back to Order list</div>
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
                                    <h3 class="block-title">Edit Retailer</h3>
                                </div>
                                <div class="block-content">
                                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('purchases/'.$company->id.'/edit_retailer/'.$purchase->id)}}" method="post">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="register5-firstname" name="retailer-firstname" value="{{$purchase->retailer_firstname}}">
                                                    <label for="register5-firstname">Firstname</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="register5-lastname" name="retailer-lastname" value="{{$purchase->retailer_lastname}}">
                                                    <label for="register5-lastname">Lastname</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="register5-account" name="retailer-name" value="{{$purchase->retailer_name}}">
                                                    <label for="register5-account">Retailer</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <div class="form-material input-group">
                                                    <input class="form-control" type="email" id="register5-email" name="retailer-email" value="{{$purchase->retailer_email}}">
                                                    <label for="register5-email">Email</label>
                                                    <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-material input-group">
                                                    <input class="form-control" type="number" id="register5-password" name="retailer-contact" value="{{$purchase->retailer_contact}}">
                                                    <label for="register5-password">Contact Number</label>
                                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
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