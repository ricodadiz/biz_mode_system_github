@extends('layout.in_app')
@section('content')
<div class="content content-boxed">
                    

                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('sales/'.$company->id.'/add_client_view')}}">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Add New Client</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-danger" data-toggle="countTo" data-to="{{$client_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">No. of Clients</div>
                            </a>
                        </div>
                        {{-- <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="100"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Top Sellers</div>
                            </a>
                        </div> --}}
                        {{-- <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="8750"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Products</div>
                            </a>
                        </div> --}}
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
                            <h3 class="block-title">Client List</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th class="hidden-xs">Email</th>
                                        <th class="hidden-xs">Shipping Address</th>
                                        <th class="hidden-xs" style="width: 15%;">Status</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($client as $cli)
                                    <tr>
                                        <td class="font-w600">{{$cli->client_company_name}}</td>
                                        <td class="hidden-xs">{{$cli->client_email_address}}</td>
                                        <td class="hidden-xs">{{$cli->client_shipping_address}}</td>
                                        <td class="hidden-xs">
                                            <span class="label label-success">Active</span>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{URL::to('sales/'.$company->id.'/client_edit_view/'.$cli->id)}}" class="btn btn-xs btn-default" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></a>
                                                <a class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal-fadein-{{$cli->id}}" title="View Client Profile"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-xs btn-default" type="button" data-toggle="modal" data-target="#modal-popout-{{$cli->id}}" title="Remove Client"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <div class="modal fade" id="modal-fadein-{{$cli->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Client Info</h3>
                                                    </div>
                                                    <div class="block-content">
                                                    <div class="row"><center>
                                                        <div class="block">
                                                        <!-- Basic Info -->
                                                        <div class="block-content text-center overflow-hidden">
                                                            <div class="push-30-t push animated fadeInDown">
                                                                <img class="img-responsive" src="{{$cli->product_photo}}">
                                                            </div>
                                                            <div class="push-30 animated fadeInUp">
                                                                <h2 class="h4 font-w600 push-5">
                                                                  Customer Name: {{$cli->client_customer_name}}
                                                                </h2>
                                                            </div>
                                                            <div class="push-30 animated fadeInUp">
                                                                <h2 class="h4 font-w600 push-5">
                                                                  Contact Person: {{$cli->client_contact_person}}
                                                                </h2>
                                                            </div>
                                                            <div class="push-30 animated fadeInUp">
                                                                <h2 class="h4 font-w600 push-5">
                                                                  Contact Number: {{$cli->client_contact_number}}
                                                                </h2>
                                                            </div>
                                                        </div>
                                                        <!-- Stats -->
                                                        <!-- <div class="block-content text-center bg-gray-lighter">
                                                            <div class="row items-push text-uppercase">
                                                                <div class="col-xs-6 col-sm-3">
                                                                    <div class="font-w700 text-gray-darker animated fadeIn">Orders</div>
                                                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">{{$client_order_count}}</a>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-3">
                                                                    <div class="font-w700 text-gray-darker animated fadeIn">Orders Value</div>
                                                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">$3.580</a>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-3">
                                                                    <div class="font-w700 text-gray-darker animated fadeIn">Cart</div>
                                                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">4</a>
                                                                </div>
                                                                <div class="col-xs-6 col-sm-3">
                                                                    <div class="font-w700 text-gray-darker animated fadeIn">Referred</div>
                                                                    <a class="h2 font-w300 text-primary animated flipInX" href="javascript:void(0)">3</a>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                        <!-- END Stats -->
                                                    </div>
                                                     <div class="block">
                                                            <div class="block-header bg-gray-lighter">
                                                                <h3 class="block-title">Addresses</h3>
                                                            </div>
                                                            <div class="block-content">
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <!-- Billing Address -->
                                                                        <div class="block block-bordered">
                                                                            <div class="block-header">
                                                                                <h3 class="block-title">Billing Address</h3>
                                                                            </div>
                                                                            <div class="block-content block-content-full">
                                                                                <address>
                                                                                    {{$cli->client_billing_address}}<br><br>
                                                                                    <i class="fa fa-phone"></i> {{$cli->client_contact_number}}<br>
                                                                                    <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{$cli->client_email_address}}</a>
                                                                                </address>
                                                                            </div>
                                                                        </div>
                                                                        <!-- END Billing Address -->
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <!-- Shipping Address -->
                                                                        <div class="block block-bordered">
                                                                            <div class="block-header">
                                                                                <h3 class="block-title">Shipping Address</h3>
                                                                            </div>
                                                                            <div class="block-content block-content-full">
                                                                                <address>
                                                                                    {{$cli->client_shipping_address}}<br><br>
                                                                                    <i class="fa fa-phone"></i> {{$cli->client_contact_number}}<br>
                                                                                    <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">{{$cli->client_email_address}}</a>
                                                                                </address>
                                                                            </div>
                                                                        </div>
                                                                        <!-- END Shipping Address -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
                                <div class="modal fade" id="modal-popout-{{$cli->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Confirm Delete</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        You are about to delete {{$cli->client_name}} client.
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    <a href="{{URL::to('sales/'.$company->id.'/client_delete/'.$cli->id)}}">
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