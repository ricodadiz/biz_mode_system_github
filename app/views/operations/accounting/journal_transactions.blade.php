@extends('layout.in_app')
@section('content')
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="{{$journal_transac_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Journal Transactions</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            @if($user->can('view_add_journal'))
                            <a class="block block-link-hover3 text-center" href="{{URL::to('accounting/'.$company->id.'/add_journal_transactions')}}">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Add Journal</div>
                            </a>
                            @endif
                        </div>
                    </div>

                <div class="block">
                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">Journal Transactions List</h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 150px;">Date</th>
                                        <th class="hidden-xs">Journal Name</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($journal_transac as $jt)
                                    <tr>
                                        <td class="text-center">{{$jt->date}}</td>
                                        <td class="font-w600">{{$jt->name}}</td>
                                                {{-- <td class="font-w600">
                                                @foreach(JournalAccounts::where('account_id',$jt->id)->get() as $jd)
                                                <ul>
                                                    <li>{{$jd->account_name}}</li>
                                                </ul>
                                                @endforeach
                                                </td>
                                                <td class="font-w600">
                                                @foreach(JournalAccounts::where('account_id',$jt->id)->get() as $jd)
                                                {{$jd->description}}
                                                @endforeach
                                                </td> --}}
                                                <td class="text-center">
                                                <div class="btn-group">
                                                {{-- <a href="" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Invoice"><i class="fa fa-info-circle text-info"></i></a> --}}
                                                <a href="{{URL::to('accounting/'.$company->id.'/view_journal_transactions/'.$jt->id)}}" class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Info"><i class="fa fa-eye text-info"></i></a>
                                                <a data-toggle="modal" data-target="#modal-popout-delete-journal" class="btn btn-xs btn-default" type="button" title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="modal-popout-delete-journal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Confirm Delete Transaction</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        Are you sure you want to delete this Journal?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                                                    <a href="{{URL::to('accounting/'.$company->id.'/delete_journal/'.$jt->id)}}">
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