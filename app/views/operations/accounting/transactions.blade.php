@extends('layout.in_app')
@section('content')
            <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700" data-toggle="countTo" data-to="{{$income_count}}"></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Transactions</div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <a data-toggle="modal" data-target="#modal-popout-transaction" class="block block-link-hover3 text-center" href="">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Add New Transaction</div>
                            </a>
                        </div>
            </div>

                        <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">All Transactions</h3>
                        </div>
                        <div class="block-content">
                            <!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/base_tables_datatables.js -->
                            <table class="table table-bordered table-striped js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 150px;">Date</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th class="hidden-xs">Amount</th>
                                        <th class="hidden-xs">Description</th>
                                        <th class="text-center" style="width: 10%;">Account</th>
                                        <th class="text-center" style="width: 10%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($transaction as $t)
                                    <tr>
                                        <td class="text-center">
                                            {{$t->date}}
                                        </td>
                                        <td class="font-w600">{{$t->category}}</td>
                                        <td>
                                            @if($t->type=="Income")
                                            <span class="label label-success">
                                            {{$t->type}}
                                            </span>
                                            @else
                                            <span class="label label-danger">
                                            {{$t->type}}
                                            </span>
                                            @endif
                                        </td>
                                        <td class="hidden-xs">
                                            ₱ {{$t->amount}}
                                        </td>
                                        <td class="hidden-xs">
                                            {{$t->description}}
                                        </td>
                                        <td>{{$t->account}}</td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a data-toggle="modal" data-target="#modal-popout-delete" class="btn btn-xs btn-default" type="button" title="Remove Order"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                {{-- DELETE INCOME MODAL --}}
                                <div class="modal fade" id="modal-popout-delete" tabindex="-1" role="dialog" aria-hidden="true">
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
                                                        Do you want to delete this transaction?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                                                    <a href="{{URL::to('accounting/'.$company->id.'/delete_transac/'.$t->id)}}">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i>Yes</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                @endforeach       
                                    {{-- APP MODAL 1 --}}
                                <div class="modal fade" id="modal-popout-transaction" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Add New Transaction</h3>
                                                    </div>
                                                    
                                    <form action="{{URL::to('accounting/{id}/add_transac')}}" method="post" enctype="multipart/form-data">
                                                    <div class="block-content form-group">
                                                        <div class="form-material">
                                                            <label for="date">Date </label>
                                                            <input class="form-control" type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" >
                                                        </div>                                                 
                                                    </div>
                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="category">Category</label>
                                                            <select class="form-control" id="category" name="category" style="width: 100%;">
                                                            <option></option>
                                                            @foreach($category as $c)
                                                            <option style="font-weight: bolder" disabled>{{$c}}</option>
                                                                @foreach($account_name as $an)
                                                                     @if($c===$an->category)
                                                                        <option>&nbsp;&nbsp;&nbsp;{{$an->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                             @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="category">Type</label>
                                                            <select class="form-control" id="type" name="type" style="width: 100%;">
                                                            <option></option>
                                                            <option value="Income">Income</option>
                                                            <option value="Expense">Expense</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="amount">Amount</label>
                                                            <input class="form-control" type="text" id="amount" name="amount" value="0.00" >
                                                        </div>
                                                    </div>
                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="username1">Description </label>
                                                            <input class="form-control" type="text" id="description" name="description">
                                                        </div>
                                                    </div>
                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="username1">Account</label>
                                                            <select class="form-control" id="account" name="account" style="width: 100%;">
                                                            <option></option>
                                                            @foreach($account as $a)
                                                            <option style="font-weight: bolder" disabled>{{$a}}</option>
                                                                @foreach($account_name as $an)
                                                                     @if($a===$an->category)
                                                                        <option>&nbsp;&nbsp;&nbsp;{{$an->name}}</option>
                                                                    @endif
                                                                @endforeach
                                                             @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    
                                                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i> Submit</button>
                                                    </div> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
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

        <script type="text/javascript">
            $('.js-dataTable-full').dataTable({
                pageLength: 10,
                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
            });
        </script>


@stop