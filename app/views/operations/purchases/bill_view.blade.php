@extends('layout.in_app')
@section('content')

                <div class="row">
                		<div class="col-sm-6 col-md-3">
                        @if($user->can('view_add_bill'))
                            <a class="block block-link-hover3 text-center" href="{{URL::to('purchases/'.$company->id.'/add_bill_view')}}">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Create Bill</div>
                            </a>
                            @endif
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 text-info font-w700" data-toggle="countTo" data-to="{{$bill_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">Number of Bills</div>
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
                            <h3 class="block-title">All Bills</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 150px;">Bill ID</th>
                                        <th>Retailer</th>
                                        <th class="hidden-xs">Submitted</th>
                                        <th class="hidden-xs">Total</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                @foreach($bill as $b)
                                <tbody>
                                
                                    <tr>
                                        <td class="text-center">{{$b->id}}</td>
                                        <td class="font-w600">{{$b->bill_retailer}}</td>
                                        <td class="hidden-xs">{{$b->bill_date}}</td>
                                        <td class="hidden-xs">{{$b->bill_supertotal}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                               <a href="{{URL::to('purchases/'.$company->id.'/edit_bill_view/'.$b->id)}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View"><i class="fa fa-eye text-info"></i></a>
                                                <a data-toggle="modal" data-target="#modal-popout-{{$b->id}}" class="btn btn-xs btn-default" type="button" title="Remove Order"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-popout-{{$b->id}}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                        You are about to delete Bill number {{$b->id}}".
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    <a href="{{URL::to('purchases/'.$company->id.'/bill_delete/'.$b->id)}}">
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