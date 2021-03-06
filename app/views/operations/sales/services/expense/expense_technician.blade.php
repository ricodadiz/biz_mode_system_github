@extends('layout.in_app')
@section('content')
<!-- Main Container -->
                <!-- Page Content -->
                <div class="content content-boxed">
                    <!-- Header Tiles -->
                    <div class="row">
                        <div class="col-sm-6">
                        @if($user->can('add_service'))
                            <a class="block block-link-hover3 text-center" href="{{URL::to('sales/'.$company->id.'/add_expense_technician_view')}}">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Add New Technician Allowance</div>
                            </a>
                        @endif
                        </div>
                        <div class="col-sm-6">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-info" data-toggle="countTo" data-to="{{$technician_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-info font-w600">All Technician Allowance</div>
                            </a>
                        </div>
                    </div>
                    <!-- END Header Tiles -->
                    <!-- All Products -->
                    <div class="block">
                        <div class="block-header bg-gray-lighter">
                            {{-- <ul class="block-options">
                                <li class="dropdown">
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
                                </li>
                            </ul> --}}
                            <h3 class="block-title">All Technician Allowance</h3>
                        </div>
                        <div class="block-content">
                        @if(isset(Session::get('delete_technician_success')["message"]))
                                    <div class="alert alert-success">
                                        {{Session::get('delete_expense_technician_success')["message"]}}
                                    </div>
                                @endif
                                @if(Session::get('delete_technician_error'))
                                    <div class="alert alert-error alert-danger">
                                    @foreach(Session::get('delete_expense_technician_error')->all() as $m)
                                        {{$m}}<br>    
                                    @endforeach
                                    </div>
                        @endif
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 150px;">date</th>
                                        <th class="visible-lg">name of technician</th>
                                        <th class="hidden-xs text-center">Particulars</th>
                                        <th class="hidden-xs text-center">Total</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($expense as $e)
                                    <tr>
                                        <td class="text-center"><strong>{{$e->expense_date}}</strong></a></td>
                                        <td class="text-left">{{$e->expense_name}}</a></td>
                                        <td class="text-center">{{$e->expense_particular}}</td>
                                        <td class="hidden-xs text-center">{{$e->expense_total}}</td>
                                        <td class="text-center">
                                            <div class="btn-group btn-group-xs">

                                                <a href="" title="View or Update Service" class="btn btn-default"><i class="fa fa-eye"></i></a>
                                               
                                                <a data-toggle="modal" data-target="#modal-popout-{{$e->id}}" title="Delete" class="btn btn-default"><i class="fa fa-times text-danger"></i></a>
                                               
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-popout-{{$e->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Confirm Delete Service</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        Do you want to proceed?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <a href="{{URL::to('sales/{id}/delete_expense_technician/'.$e->id)}}">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i> Ok</button>
                                                    </a>
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                  @endforeach
                                </tbody>
                              <!--   <thead>
                                        <tr class="info">
                                            <td></td>
                                            <td></td>
                                            <td class="text-right"> <strong >Total:</strong></td>
                                            <td></td>
                                            <td>
                                              
                                            </td>
                                        </tr>
                                    </thead> -->
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
                </div>
                <!-- END Page Content -->
         

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