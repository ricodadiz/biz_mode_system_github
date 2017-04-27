@extends('layout.in_app')
@section('content')

		<main id="main-container" style="min-height: 751px;">
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Header Tiles -->
                    <div class="row">
                        <div class="col-xs-6 col-sm-4">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="{{$client_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">No. of Clients</div>
                            </a>
                        </div>
                        {{-- <div class="col-xs-6 col-sm-4">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to=""></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Total Available Stock</div>
                            </a>
                        </div> --}}
                        <div class="col-xs-12 col-sm-4">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('sales/'.$company->id.'/client_list')}}">
                                <div class="block-content block-content-full">
                                    <div class="h4 font-w50 text-info"><i class="glyphicon glyphicon-list fa-2x"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Back to Client list</div>
                            </a>
                        </div>
                    </div>
                    <!-- END Header Tiles -->
                    
                    <!-- Info -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Info</h3>
                        </div>
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
                        <div class="block-content block-content-full">
                            <div class="row">
                                <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
                                    <form class="form-horizontal push-30-t push-30" action="{{URL::to('sales/'.$company->id.'/add_client_view')}}" method="post">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="company-name" value="">
                                                    <label for="product-id">Company Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="add-product" name="customer-name" value="">
                                                    <label for="product-id">Customer Name</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="stock-product" name="client-billing">
                                                    <label for="product-name">Billing Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" step="0.05" id="price-product" name="client-shipping">
                                                    <label for="product-price">Shipping Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" id="price-product" name="client-contact-person">
                                                    <label for="product-price">Contact Person</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="number" step="0.05" id="price-product" name="client-contact">
                                                    <label for="product-price">Contact Number</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material form-material-primary">
                                                    <input class="form-control" type="text" step="0.05" id="price-product" name="client-email">
                                                    <label for="product-price">Email Address</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <button class="btn btn-sm btn-primary" type="submit">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Info -->
                    <!-- Images -->
                    <!-- END Images -->
                </div>
                <!-- END Page Content -->
            </main>

            <script type="text/javascript">
                // uiHelperCkeditor();
                CKEDITOR.disableAutoInline = true;

                if (jQuery('#js-ckeditor-inline').length) {
                    CKEDITOR.inline('js-ckeditor-inline');
                }

                // Init full text editor
                if (jQuery('#js-ckeditor').length) {
                    CKEDITOR.replace('js-ckeditor');
                }

                $('.js-select2').select2();
            </script>

            <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });
        </script>        
@stop