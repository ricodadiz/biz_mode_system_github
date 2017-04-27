@extends('layout.in_app')
@section('content')
        <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a data-toggle="modal" data-target="#modal-popout-account" class="block block-link-hover3 text-center" href="">
                                <div class="block-content block-content-full">
                                    <div class="h1 font-w700 text-success"><i class="fa fa-plus"></i></div>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Add Account</div>
                            </a>
                        </div>
        </div>              
                        <div class="block">
                        <div class="block-header">
                            {{-- <div class="block-options">
                                <code>.js-table-sections</code>
                            </div> --}}
                            <h3 class="block-title">List of Accounts</h3>
                        </div>
                        <div class="block-content">
                            <table class="js-table-sections table table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 30px;"></th>
                                        <th>Name</th>
                                        <th style="width: 15%;">Actions</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="js-table-sections-header">
                                    <tr>
                                        <td class="text-center">
                                            <i class="fa fa-angle-right"></i>
                                        </td>
                                        <td class="font-w600">Assets</td>
                                        <td> </td>                                        
                                    </tr>
                                </tbody>
                                <tbody>
                                @foreach($asset as $a)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">
                                            {{$a->name}}
                                        </td>
                                        <td>
                                          <div class="btn-group">
                                                <a data-toggle="modal" data-target="#modal-popout-{{$a->id}}" class="btn btn-xs btn-default" type="button" title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>                                        
                                    </tr>
                                    <div class="modal fade" id="modal-popout-{{$a->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Delete Account</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        Do you want to delete this Account?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                                                    <a href="{{URL::to('accounting/'.$company->id.'/delete_asset_account/'.$a->id)}}">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i>Yes</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                
                                @endforeach
                                </tbody>                                
                                 
                                <tbody class="js-table-sections-header">
                                    <tr>
                                        <td class="text-center">
                                            <i class="fa fa-angle-right"></i>
                                        </td>
                                        <td class="font-w600">Liabilities/Credits</td>
                                        <td></td>                                        
                                    </tr>
                                </tbody>
                                <tbody>
                                @foreach($liability as $l)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">
                                              {{$l->name}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a data-toggle="modal" data-target="#modal-popout-{{$l->id}}" class="btn btn-xs btn-default" type="button" title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>                                        
                                    </tr>
                                    <div class="modal fade" id="modal-popout-{{$l->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Delete Account</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        Do you want to delete this Account?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                                                    <a href="{{URL::to('accounting/'.$company->id.'/delete_liability_account/'.$l->id)}}">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i>Yes</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                      
                                @endforeach
                                </tbody>

                                <tbody class="js-table-sections-header">
                                    <tr>
                                        <td class="text-center">
                                            <i class="fa fa-angle-right"></i>
                                        </td>
                                        <td class="font-w600">Income</td>
                                        <td></td>                                        
                                    </tr>
                                </tbody>
                                <tbody>
                                 @foreach($income as $i)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">
                                            {{$i->name}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a data-toggle="modal" data-target="#modal-popout-{{$i->id}}" class="btn btn-xs btn-default" type="button" title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>                                        
                                    </tr>
                                    <div class="modal fade" id="modal-popout-{{$i->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Delete Account</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        Do you want to delete this Account?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                                                    <a href="{{URL::to('accounting/'.$company->id.'/delete_income_account/'.$i->id)}}">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i>Yes</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>             
                                @endforeach
                                </tbody> 


                                <tbody class="js-table-sections-header">
                                    <tr>
                                        <td class="text-center">
                                            <i class="fa fa-angle-right"></i>
                                        </td>
                                        <td class="font-w600">Expense</td>
                                        <td></td>                                        
                                    </tr>
                                </tbody>
                                <tbody>
                                @foreach($expense as $ex)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">
                                            {{$ex->name}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                               <a data-toggle="modal" data-target="#modal-popout-{{$ex->id}}" class="btn btn-xs btn-default" type="button" title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>                                        
                                    </tr>
                                    <div class="modal fade" id="modal-popout-{{$ex->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Delete Account</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        Do you want to delete this Account?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                                                    <a href="{{URL::to('accounting/'.$company->id.'/delete_expense_account/'.$ex->id)}}">
                                                    <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i>Yes</button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>             
                                @endforeach
                                </tbody>


                                <tbody class="js-table-sections-header">
                                    <tr>
                                        <td class="text-center">
                                            <i class="fa fa-angle-right"></i>
                                        </td>
                                        <td class="font-w600">Equity</td>
                                        <td></td>                                        
                                    </tr>
                                </tbody>
                                <tbody>
                                @foreach($equity as $eq)
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="font-w600 text-success">
                                            {{$eq->name}}
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <a data-toggle="modal" data-target="#modal-popout-{{$eq->id}}" class="btn btn-xs btn-default" type="button" title="Delete"><i class="fa fa-times text-danger"></i></a>
                                            </div>
                                        </td>                                        
                                    </tr>
                                    <div class="modal fade" id="modal-popout-{{$eq->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Delete Account</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        Do you want to delete this Account?
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                                                    <a href="{{URL::to('accounting/'.$company->id.'/delete_equity_account/'.$eq->id)}}">
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
                    <!-- END Table Sections -->
                    <div class="modal fade" id="modal-popout-account" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Add New Account</h3>
                                                    </div>
                                                    
                                    <form action="{{URL::to('accounting/{id}/add_account')}}" method="post" enctype="multipart/form-data">
                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="category">Account Categories</label>
                                                            <select class="form-control" id="account_category" name="account_category" size="1">
                                                                <option value="Asset">Asset</option>
                                                                <option value="Liability">Liability</option>
                                                                <option value="Income">Income</option>
                                                                <option value="Expense">Expense</option>
                                                                <option value="Equity">Equity</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="account_name">Account Name</label>
                                                            <input class="form-control" type="text" id="account_name" name="account_name" value="" >
                                                        </div>
                                                    </div>

                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="account_payment">Payment Account</label>
                                                                <input type="checkbox" id="account_payment" name="account_payment" value="1">
                                                        </div>
                                                    </div>
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    
                                                        <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i> Save</button>
                                                    
                                                    </div> 

                                            </div>

                                        </div>
                                    </form>
                        </div>
                                
                


        <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });

            jQuery(function () {
                // Init page helpers (Table Tools helper)
                App.initHelpers('table-tools');
            });
        </script>

        <!-- Page JS Code -->
        <script src="bootstrap-treeview.js"></script>
        <script type="text/javascript">
            $(".js-select2").select2();
            $('.js-dataTable-full').dataTable({
                pageLength: 10,
                lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
            });
        </script>
@stop