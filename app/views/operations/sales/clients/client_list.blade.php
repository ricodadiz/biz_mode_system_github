@extends('layout.in_app')
@section('content')
<div class="content content-boxed">
                    

                    <div class="row">
                        <div class="col-sm-6">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('sales/'.$company->id.'/add_client_view')}}">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Add New Client</div>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-info" data-toggle="countTo" data-to="{{$client_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">No. of Clients</div>
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
                                                <a href="{{URL::to('sales/'.$company->id.'/client_profile/'.$cli->id)}}" class="btn btn-xs btn-default" data-toggle="tooltip" title="Client Profile"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-xs btn-default" type="button" data-toggle="modal" data-target="#modal-popout-{{$cli->id}}" title="Remove Client"><i class="fa fa-times"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                               
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