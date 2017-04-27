@extends('layout.in_app')
@section('content')

                

				<div class="row">
                            <div class="col-xs-6 col-sm-4">
                                <a class="block block-link-hover3 text-center" href="javascript:void(0)">
                                    <div class="block-content block-content-full">
                                        <div class="h1 font-w700" data-toggle="countTo" data-to="{{$bill_count}}"></div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">All Bills</div>
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <a class="block block-link-hover3 text-center" href="{{URL::to('purchases/'.$company->id.'/bill_view')}}">
                                    <div class="block-content block-content-full">
                                        <div class="h4 font-w50 text-info"><i class="glyphicon glyphicon-list fa-2x"></i></div>
                                    </div>
                                    <div class="block-content block-content-full block-content-mini bg-gray-lighter text-muted font-w600">Back to Bill list</div>
                                </a>
                            </div>
                        </div>

                         
                        <div class="col-sm-12">
                     <div class="block block-bordered">
                                <div class="block-header bg-gray-lighter">
                                    <ul class="block-options">
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                        </li>
                                        <li>
                                            <button type="button" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                                        </li>
                                    </ul>
                                    <h3 class="block-title">View Bill</h3>
                                </div>
                                <div class="block-content">
                                    <form class="form-horizontal push-10-t push-10" action="{{URL::to('purchases/'.$company->id.'/edit_bill_view')}}" id="formid" method="post">
                                    @foreach($bill as $b)
                                        <div class="form-group">
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="login2-username" name="login2-username" value="{{$b->bill_retailer}}">
                                                    <label for="login2-username">Retailer</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="login2-username" name="login2-username" value="{{$b->bill_date}}">
                                                    <label for="login2-username">Date</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-4">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="login2-username" name="login2-username" value="{{$b->bill_due_date}}">
                                                    <label for="login2-username">Due Date</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <div class="form-material">
                                                    <textarea class="form-control" name="bill-note" rows="2">{{$b->bill_note}}</textarea>
                                                    <label for="contact2-msg">Note</label>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                   
                                     @foreach($bill2 as $bill)
                                        <div class="form-group">
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                
                                                    <input class="form-control" type="text" id="login2-username" name="login2-username" value="{{$bill->bill_item}}">
                                                
                                                    <label for="login2-username">Item</label>
                                                </div>
                                            </div>
                                   
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="login2-username" name="login2-username" value="{{$bill->bill_expense_category}}">
                                                    <label for="login2-username">Expense Category</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <textarea class="form-control" name="bill-description" rows="1">{{$bill->bill_description}}</textarea>
                                                    <label for="contact2-msg">Description</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="bill-qty" value="{{$bill->bill_qty}}">
                                                    <label for="register5-lastname">Quantity</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-1">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="bill-price" value="{{$bill->bill_price}}">
                                                    <label for="register5-lastname">Price</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" id="login2-username" name="login2-username" value="{{$bill->bill_tax}}">
                                                    <label for="login2-username">Tax%</label>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                    <input class="form-control" type="text" name="bill-amount" value="{{$bill->bill_amount}}">
                                                    <label for="register5-lastname">Amount</label>
                                                </div>
                                            </div>
                                        </div>
                                         @endforeach
                                        <div class="new"></div>
                                        
                                        <div class="form-group">
                                            <div class="col-xs-2 col-sm-offset-8 " style="padding-left: 130px;">
                                                <div class="form-material">
                                                <h3>Total:</h3>
                                                </div>
                                            </div>
                                            <div class="col-xs-2">
                                                <div class="form-material">
                                                
                                                    <input class="form-control" class="form-control" type="text" name="bill-total-amount" id="bill-total-amount" value="{{$b->bill_supertotal}}">
                                            
                                                </div>
                                            </div>
                                        </div>
                                     </form>
                                       
                                </div>
                            </div>
                          </div>



     



        <script type="text/javascript">
                // uiHelperCkeditor();
                CKEDITOR.disableAutoInline = true;

                if (jQuery('#js-ckeditor-inline').length) {
                    CKEDITOR.inline('js-ckeditor-inline');
                }

                // Init full text editor
                if (jQuery('#js-ckeditor').length) {
                    CKEDITOR.replace('js-ckeditor');
                }

                $('.js-select2').select2();
            </script>

            <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });
        </script>
                                        
@stop