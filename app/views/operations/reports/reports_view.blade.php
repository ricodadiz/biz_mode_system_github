@extends('layout.in_app')
@section('content')


	<div class="col-sm-6 col-lg-4">
        <a class="block block-link-hover2" href="{{URL::to('reports/'.$company->id.'/sales_report')}}">
            <div class="block-content block-content-full text-center">
                <div class="h3 push-15-t push-5 text-info">Sales Report</div>
                <div>See the sales tax you paid and colleted.</div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-4">
        <a class="block block-link-hover2" href="{{URL::to('reports/'.$company->id.'/service_report')}}">
            <div class="block-content block-content-full text-center">
                <div class="h3 push-15-t push-5 text-info">Service Report</div>
                <div>See the sales tax you paid and colleted.</div>
            </div>
        </a>
    </div>
    <div class="col-sm-6 col-lg-4">
        <a class="block block-link-hover2" href="#">
            <div class="block-content block-content-full text-center">
                <div class="h3 push-15-t push-5 text-info">Product Report</div>
                <div>See the sales tax you paid and colleted.</div>
            </div>
        </a>
    </div>




@stop