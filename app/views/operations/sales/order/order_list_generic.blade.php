@extends('layout.in_app')
@section('content')

                <div class="row">
                        <div class="col-sm-6">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('sales/'.$company->id.'/order_generic')}}">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Process Order</div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-info" data-toggle="countTo" data-to="{{$orders_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">All Orders</div>
                            </a>
                        </div>
                    </div>

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
                <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">All Orders</h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 150px;">Order ID</th>
                                        <th>Customer Name</th>
                                        <th class="hidden-xs">Order Date</th>
                                        {{-- <th class="hidden-xs">Warranty Status</th> --}}
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($orders_generic as $og)
                                    <tr>
                                        <td class="text-center">{{$og->id}}</td>
                                        <td class="font-w600">{{$og->customer_name}}</td>
                                        <td class="font-w600">{{$og->date_order}}</td>
                                        <?php 
                                              $date = new DateTime(); 
                                              $result = $date->format('Y-m-d');
                                        ?> 
                                        {{-- @if(OrdersProduct::where('order_id',$og->id)->first()->order_product_warranty_date == $result)
                                            <td><strong class="label label-danger">Out of Warranty</strong></td>
                                        @else
                                            <td><strong class="label label-success">Under Warranty</strong></td>
                                        @endif --}}
                                        <td class="text-center">
                                            <div class="btn-group">
                                               <!--  <a href="{{URL::to('sales/'.$company->id.'/order_update_generic_view/'.$og->id)}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Order"><i class="fa fa-pencil text-primary"></i></a> -->
                                               
                                                <a href="{{URL::to('sales/'.$company->id.'/invoice_order/'.$og->id)}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Sales Invoice"><i class="si si-printer text-info"></i></a>

                                                <a href="{{URL::to('sales/'.$company->id.'/official_receipt/')}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Official Receipt"><i class="si si-printer text-success"></i></a>

                                                <a href="{{URL::to('sales/'.$company->id.'/provisional_receipt/')}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Provisional Receipt"><i class="si si-printer text-warning"></i></a>

                                                <a href="{{URL::to('sales/'.$company->id.'/view_order/'.$og->id)}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Order Info"><i class="fa fa-eye text-info"></i></a>
                                                <a data-toggle="modal" data-target="#modal-popout-{{$og->id}}" class="btn btn-xs btn-default" type="button" title="Remove Order"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-popout-{{$og->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Confirm Delete Order</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        You are about to delete order ID "{{$og->id}}".
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    <a href="{{URL::to('sales/'.$company->id.'/delete_order/'.$og->id)}}">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i> Ok</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  @endforeach
                                </tbody>
                            </table>
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