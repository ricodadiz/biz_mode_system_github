@extends('layout.in_app')
@section('content')

                <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <a class="block block-link-hover3 text-center" href="{{URL::to('accounting/'.$company->id.'/balance_list')}}">
                                <div class="block-content block-content-full">
                                    <span class="item item-circle bg-success-light"><i class="fa fa-arrow-circle-left text-success"></i></span>
                                </div>
                                <div class="block-content block-content-full block-content-mini bg-gray-lighter text-success font-w600">Back to Balance List</div>
                            </a>
                        </div>
                       
                </div> 
                <div class="block">
                         <div class="block-header bg-gray-lighter">
                            <h3 class="block-title">
                            @foreach($balance_list as $bl)
                                {{$bl->name}}
                             @endforeach    
                            </h3>
                        </div>

                        <div class="block-content">
                            <div class="table-responsive">
                                <table class="table table-borderless table-striped table-vcenter">
                                    <thead>
                                        <tr>
                                            <th>Account Name</th>
                                            <th class="text-right" style="width: 10%;">Credit</th>
                                            <th class="text-right" style="width: 10%;">Debit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach($balance_info as $bi)
                                        <tr>
                                            <td>{{$bi->account_name}}</td>
                                            <td class="text-right">{{$bi->credit}}</td>
                                            <td class="text-right">{{$bi->debit}}</td>
                                        </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="2" class="text-right"><strong>TOTAL CREDIT</strong></td>
                                            <td class="text-right"><strong>TOTAL DEBIT</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="text-right">{{$bl->total_credit}}</td>
                                            <td class="text-right">{{$bl->total_debit}}</td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>


@stop

@stop