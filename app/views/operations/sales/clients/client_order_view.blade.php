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
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">No. of Orders</div>
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
                        <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Orders <small>(5)</small></h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-borderless table-striped table-vcenter">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 100px;">ID</th>
                                        <th class="hidden-xs text-center">Submitted</th>
                                        <th>Status</th>
                                        <th class="visible-lg text-center">Products</th>
                                        <th class="hidden-xs text-right">Value</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_order.html">
                                                <strong>ORD.00950</strong>
                                            </a>
                                        </td>
                                        <td class="hidden-xs text-center">25/08/2015</td>
                                        <td>
                                            <span class="label label-success">Delivered</span>
                                        </td>
                                        <td class="text-center visible-lg">
                                            <a href="javascript:void(0)">2</a>
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>$151,54</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                <a href="base_pages_ecom_order.html" data-toggle="tooltip" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-toggle="tooltip" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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