@extends('layout.in_app')
@section('content')

<div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('accounting/'.$company->id.'/journal_list')}}">
                                <div class="block-content block-content-full">
                                    <span class="item item-circle bg-success-light"><i class="fa fa-arrow-circle-left text-success"></i></span>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Back to Journal List</div>
                            </a>
                        </div>
</div> 
                    @if(Session::get('message_error'))
                        <div class="alert alert-error alert-danger">
                        @foreach(Session::get('message_error')->all() as $m)
                            {{$m}}<br>    
                        @endforeach
                        </div>
                    @endif
                    @if(Session::get('message_add'))
                        <div class="alert alert-success">
                        {{Session::get('message_add')["message"]}}
                        </div>
                    @endif

<div class="block block-bordered">
                        <div class="block-header bg-gray-lighter">
                            <ul class="block-options">
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                </li>
                                <li>
                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Add Journal Transactions</h3>
                        </div>
                        <div class="block-content">
                            <form class="form-horizontal push-10-t push-10" action="{{URL::to('accounting/{id}/add_journal')}}" method="post" id="form_id">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <label for="mega-firstname">Journal Name</label>
                                                <input class="form-control input-lg" type="text" id="journal_name" name="journal_name" placeholder="---------------">
                                            </div>
                                            <div class="col-xs-12">
                                                <label for="mega-lastname">Date</label>
                                                 <input class="form-control input-lg" type="date" id="date" name="date" value="<?php echo date('Y-m-d'); ?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-7">

                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Account</label>
                                                    <select class="form-control input-lg" id="account_name" name="account_name[]" size="1">
                                                    <option disabled selected></option>
                                                    @foreach($category as $c)
                                                    <option style="font-weight: bolder" disabled>{{$c}}</option>
                                                        @foreach($account_name as $an)
                                                            @if($c===$an->category)
                                                                <option>&nbsp;&nbsp;&nbsp;{{$an->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    {{-- <option value="1">Support</option>  --}}
                                                    @endforeach
                                                    </select>

                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Description</label>
                                                <input class="form-control input-lg" type="text" id="description" name="description[]" placeholder="---------------">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Debit</label>
                                                <input class="form-control input-lg" type="text" id="debit" name="debit[]" onkeyup="Listener_Debit()" value="0">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Credit</label>
                                                <input class="form-control input-lg" type="text" id="credit" name="credit[]" onkeyup="Listener_Credit()" value="0">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-firstname">Account</label>
                                                    <select class="form-control input-lg" id="account_name" name="account_name[]" size="1">
                                                    <option disabled selected></option>
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
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Description</label>
                                                <input class="form-control input-lg" type="text" id="description" name="description[]" placeholder="---------------">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Debit</label>
                                                <input class="form-control input-lg" type="text" onkeyup="Listener_Debit()" id="debit" name="debit[]" value="0">
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="mega-lastname">Credit</label>
                                                <input class="form-control input-lg" type="text" id="credit" name="credit[]" onkeyup="Listener_Credit()" value="0">
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-sm-7 new"></div>
                                <div class="col-sm-5 new2"></div>
{{--                                 COMPUTE THE TOTAL DEBIT AND CREDIT --}}
                                <div class="col-sm-7">
                                        <div class="form-group">
                                            <div class="col-xs-6">
                                                <label for="total_debit">Total Debit</label>
                                                <input class="form-control input-lg" type="text" id="total_debit" name="total_debit">
                                                
                                            </div>
                                            <div class="col-xs-6">
                                                <label for="total_credit">Total Credit</label>
                                                <input class="form-control input-lg" type="text" id="total_credit" name="total_credit">
                                            </div>
                                        </div>
                                </div>

                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <button class="btn btn-success" type="submit" id="newline"><i class="fa fa-plus-circle push-5-r"></i> Add new line</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-7">
                                    <div class="form-group">
                                        <div class="col-xs-12">
                                            <button class="btn btn-success" type="submit" id="btn-save"><i class="fa fa-check push-5-r"></i> Save</button>
                                        </div>
                                    </div>
                                </div>
                                </form>

                        </div>
                    </div>

    <script type="text/javascript">
    var submit=0;
        $("#newline").click(function(){
                            $(".new").append('<div class="form-group">'+'<div class="col-xs-6">'+'<label for="mega-firstname">Account</label>'+'<select class="form-control input-lg" id="contact1-subject" name="account_name[]" size="1">'+'<option disabled selected></option>' +'@foreach($category as $c)'+'<option style="font-weight: bolder" disabled>{{$c}}</option>'+'@foreach($account_name as $an)'+'@if($c===$an->category)'+'<option>&nbsp;&nbsp;&nbsp;{{$an->name}}</option>'+'@endif'+'@endforeach'+'@endforeach'+'</select>'+'</div>'+'<div class="col-xs-6">'+'<label for="mega-lastname">Description</label>'+' <input class="form-control input-lg" type="text" id="description" name="description[]" placeholder="---------------">'+'</div>');

                             $(".new2").append('<div class="form-group">'+'<div class="col-xs-6">'+'<label for="mega-lastname">Debit</label>'+'<input class="form-control input-lg" type="text" id="debit" name="debit[]" onkeyup="Listener_Debit()" value="0">' + '</div>'+'<div class="col-xs-6">'+'<label for="mega-lastname">Credit</label>'+'<input class="form-control input-lg" type="text" id="credit" name="credit[]" onkeyup="Listener_Credit()" value="0">'+'</div>');
        });

    $('#form_id').submit(function(e){
                            if (submit !=0)
                            {
                                return true;
                            }
                            else
                            {
                                e.preventDefault();
                            }
                        });
                        $('#btn-save').click(function(){
                            submit=1;
                            $('#form_id').submit()
    });

    
    var Listener_Debit = function()
        {
            $(this).change(function(event) {
                     var totalDebit = 0;
                $('input[name^="debit"]').each(function() {
                     totalDebit = totalDebit + parseInt($(this).val()); 
                     // console.log($(this).val());
                     $('#total_debit').val(totalDebit);
                });
            });
    }

    var Listener_Credit = function()
    {
        $(this).change(function(event) {
                 var totalCredit = 0;
            $('input[name^="credit"]').each(function() {
                 totalCredit = totalCredit + parseInt($(this).val()); 
                 // console.log($(this).val());
                 $('#total_credit').val(totalCredit);
            });
        });
    }



    </script>
@stop