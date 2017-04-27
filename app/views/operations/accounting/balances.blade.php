@extends('layout.in_app')
@section('content')
                    <div class="row">

                        <div class="col-sm-6 col-md-3">
                            @if($user->can('view_add_balances'))
                            <a class="block block-link-hover3 text-center" href="{{URL::to('accounting/'.$company->id.'/add_account_balance')}}">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Add Starting Balance</div>
                            </a>
                            @endif
                        </div>

                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="{{$current_debit}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-danger font-w600">Current Debit</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="{{$current_credit}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Current Credit</div>
                            </a>
                        </div>
                    </div>

                <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Starting Balances</h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="hidden-xs">Balance Name</th>
                                        <th class="hidden-xs" style="width: 10%;"">Debit</th>
                                        <th class="text-center" style="width: 10%;">Credit</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($balance_list as $ba)
                                    <tr>
                                        <td>{{$ba->name}}</td>
                                        <td class="font-w600">₱ {{$ba->total_debit}}</td>
                                        <td class="font-w600">₱ {{$ba->total_credit}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                {{-- <a href="" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Invoice"><i class="fa fa-info-circle text-info"></i></a> --}}
                                                <a href="{{URL::to('accounting/'.$company->id.'/view_balance/'.$ba->id)}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Info"><i class="fa fa-eye text-info"></i></a>

                                                <a data-toggle="modal" data-target="#modal-popout-delete-{{$ba->id}}" class="btn btn-xs btn-default" type="button" title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="modal-popout-delete-{{$ba->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Confirm Delete Balance</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        Are you sure you want to delete this Balance?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                                                    <a href="{{URL::to('accounting/'.$company->id.'/delete_balance/'.$ba->id)}}">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i>Yes</button>
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

        <script type="text/javascript" src="assets/js/plugins/select2/select2.full.min.js"></script>
        <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });
        </script>


        <script type="text/javascript">
            $(".js-select2").select2();
            $('.js-dataTable-full').dataTable({
                pageLength: 10,
                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
            });
        </script>
@stop