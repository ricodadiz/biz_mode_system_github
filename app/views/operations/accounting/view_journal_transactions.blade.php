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
				<div class="block">
						 <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">
                            @foreach($journal_transac as $jt)
                            	{{$jt->name}}
                             @endforeach 	
                            </h3>
                        </div>

                        <div class="block-content">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Account Name</th>
                                            <th class="text-center">Description</th>
                                            <th class="text-right" style="width: 10%;">Credit</th>
                                            <th class="text-right" style="width: 10%;">Debit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	
                                        @foreach($journal_account as $ja)
                                        <tr>
                                            <td class="text-center">{{$ja->account_name}}</td>
                                            <td class="text-center">{{$ja->description}}</td>
                                            <td class="text-right">{{$ja->credit}}</td>
                                            <td class="text-right">{{$ja->debit}}</td>
                                        </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="3" class="text-right"><strong>TOTAL CREDIT</strong></td>
                                            <td class="text-right"><strong>TOTAL DEBIT</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" class="text-right">{{$jt->total_credit}}</td>
                                            <td class="text-right">{{$jt->total_debit}}</td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
     			</div>


@stop