@extends('layout.in_app')
@section('content')

<div class="content content-boxed">
                    <!-- Header Tiles -->
                    @if(Session::get('delete_error'))
                        <div class="alert alert-error alert-danger">
                        @foreach(Session::get('delete_error')->all() as $m)
                            {{$m}}<br>    
                        @endforeach
                        </div>
                    @endif
                    @if(Session::get('message_delete'))
                        <div class="alert alert-success">
                        {{Session::get('message_delete')["message"]}}
                        </div>
                    @endif
                    <div class="row">
                        @if($user->can('add_product'))
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('warehouse/'.$company->id.'/add_product_view')}}">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Add New Product</div>
                            </a>
                        </div>
                        @endif
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                            
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success" data-toggle="countTo" data-to="{{$instock_count}}"> </div>
                                </div>                               
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Total Available Stock</div>
                                
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-danger" data-toggle="countTo" data-to="{{$out_of_stock_count}}"> </div>
                                </div>

                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">Out of Stock</div>
                            </a>
                        </div>
                        {{-- div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="100"> 100 </div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Top Sellers</div>
                            </a>
                        </div> --}}
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="{{$products_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Products</div>
                            </a>
                        </div>
                    </div>
                    <!-- END Header Tiles -->

                    <!-- All Products -->
                    <!-- All Deliveries -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <ul class="block-options">
                                {{-- <li class="dropdown">
                                    <button type="button" data-toggle="dropdown">Filter <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">90</span>New</a>
                                        </li>
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">15</span>Out of Stock</a>
                                        </li>
                                        <li>
                                            <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">8750</span>All</a>
                                        </li>
                                    </ul>
                                </li> --}}
                            </ul>
                            <h3 class="block-title">All Products</h3>
                        </div>

                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <tr>
                                        <th class="text-center" style="width: 150px;">Product Code</th>
                                        <th class="visible-lg">Product Name</th>
                                        <th class="hidden-xs text-center">Category</th>
                                        <th class="hidden-xs text-center">In Stock</th>
                                        <th class="hidden-xs text-center">Status</th>
                                        <th class="hidden-xs text-center">Warranty Status</th>
                                        <th class="hidden-xs text-right">Product Price</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($products as $p)
                                    <tr>
                                        <td class="text-center">
                                            <a class="font-" href="base_pages_ecom_product_edit.html">
                                                <strong>{{$p->product_code}}</strong>
                                            </a>
                                        </td>
                                        <td class="visible-lg">
                                            <a href="">{{$p->product_name}}</a>
                                        </td>
                                        
                                        <td class="hidden-xs text-center">{{$p->category}}</td>
                                        
                                        <td class="hidden-xs text-center">{{$p->in_stock}}</td>

                                        <td>
                                        @if($p->in_stock > 0)
                                            <span class="label label-success">Available</span>
                                        @else
                                            <span class="label label-danger">Out of stock</span>
                                        @endif
                                        </td>
                                        <td class="text-center">
                                        
                                        </td>
                                        <td class="text-right hidden-xs">
                                            <strong>{{$p->product_price}}</strong>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">
                                                @if($user->can('edit_product'))
                                                <a href="{{URL::to('warehouse/'.$company->id.'/update_product_view/'.$p->id)}}" data-toggle="tooltip" title="Update" class="btn btn-default"><i class="fa fa-edit"></i></a>
                                                @endif
                                                <a  data-toggle="modal" data-target="#modal-fadein-{{$p->id}}" title="View" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                                @if($user->can('delete_product'))
                                                <a data-toggle="modal" data-target="#modal-popout-{{$p->id}}" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-fadein-{{$p->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">{{$p->product_name}}</h3>
                                                    </div>
                                                    <div class="block-content">
                                                    <div class="row"><center>
                                                        <img class="img-responsive" src="{{$p->product_photo}}">
                                                        <span><b>Product name:</b> {{$p->product_name}}</span><br>
                                                        <span><b>Product Code:</b> {{$p->product_code}}</span><br>
                                                        <span><b>Model Code:</b> {{$p->model_code}}</span><br>
                                                        <span><b>Supplier Code:</b> {{$p->supplier_code}}</span><br>
                                                        <br>
                                                        <span><b>Product Warranty: </b>{{$p->warranty}} days
                                                        </span><br>
                                                        <span><b>Stock:</b> {{$p->in_stock}}</span><br>
                                                        <span><b>Price:</b> {{$p->product_price}}</span><br>
                                                        <span><b>Status:</b>
                                                        @if($p->in_stock > 0)
                                                            Available
                                                        @else
                                                            Out of Stock
                                                        @endif
                                                        </span><br>
                                                        <span><b>Category:</b> {{$p->category}}</span><br>
                                                        <span><b>Brand:</b> {{$p->brand}}</span><br>
                                                        <span><b>Warehouse:</b> {{$p->warehouse}}</span><br>
                                                        <b>Description:</b> {{$p->description}}
                                                    </center>
                                                    </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> Ok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="modal-popout-{{$p->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Confirm Delete Product</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        You are about to delete {{$p->product_name}} product.
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/delete_product/'.$p->id)}}">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i> Ok</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach    
                            </tbody>
                            </table>
                            <nav class="text-right">
                                <ul class="pagination pagination-sm">
                                    <li class="active">
                                        <a href="javascript:void(0)">1</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">2</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">3</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">4</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">5</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)"><i class="fa fa-angle-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- END All Products -->
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
