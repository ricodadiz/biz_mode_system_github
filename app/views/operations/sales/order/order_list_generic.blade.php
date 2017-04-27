@extends('layout.in_app')
@section('content')

                <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('sales/'.$company->id.'/order_generic')}}">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Process Order</div>
                            </a>
                        </div>
                        {{-- <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to=""></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">For Delivery</div>
                            </a>
                        </div> --}}
                        {{-- <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to=""></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Top Orders</div>
                            </a>
                        </div> --}}
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="{{$orders_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Orders</div>
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
                                        <th class="hidden-xs">Submitted</th>
                                       <!--  <th class="hidden-xs">Products</th>
                                        <th class="hidden-xs" style="width: 15%;">Value</th> -->
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($orders as $o)
                                    <tr>
                                        <td class="text-center">{{$o->order_id}}</td>
                                        <td class="font-w600">{{$o->customer_name}}</td>
                                        <td class="hidden-xs">{{$o->date_order}}</td>
                                        {{-- <td>
                                            <span class="label label-info">{{$o->delivery_status}}</span>
                                        </td> --}}
                                        <!-- <td class="hidden-xs">{{$o->products}}</td>
                                        <td class="hidden-xs">
                                            <strong>{{$o->total}}</strong>
                                        </td> -->
                                        <td class="text-center">
                                            <div class="btn-group">
                                               <!--  <a href="{{URL::to('sales/'.$company->id.'/order_update_generic_view/'.$o->id)}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Order"><i class="fa fa-pencil text-primary"></i></a> -->
                                               <a href="{{URL::to('sales/'.$company->id.'/invoice_order/'.$o->order_id)}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Invoice"><i class="fa fa-info-circle text-info"></i></a>
                                                <a href="{{URL::to('sales/'.$company->id.'/view_order/'.$o->order_id)}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Order Info"><i class="fa fa-eye text-info"></i></a>
                                                <a data-toggle="modal" data-target="#modal-popout-{{$o->id}}" class="btn btn-xs btn-default" type="button" title="Remove Order"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-popout-{{$o->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                        You are about to delete order ID "{{$o->order_id}}".
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    <a href="{{URL::to('sales/'.$company->id.'/delete_order/'.$o->id)}}">
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