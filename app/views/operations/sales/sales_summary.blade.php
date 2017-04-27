@extends('layout.in_app')
@section('content')
        <!-- Error Content -->
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <!-- Error Titles -->
                    <center>
                    <h1 class="font-s128 font-w300 text-smooth animated rollIn">503</h1>
                    <h2 class="h3 font-w300 push-50 animated fadeInUp">We are sorry but this service is currently not available..</h2>
                    <h5 class="h3 font-w300 push-50 animated fadeInUp">This Page is Under Construction</h4>
                    Would you like to let us know about it?<br>
                    <a class="link-effect" href="{{URL::to('dashboard/'.$company->id)}}">Go Back to {{$company->company_name}}</a>
                    </center>
                    <!-- END Error Titles -->
                </div>
            </div>
        <!-- END Error Content -->

        <!-- Error Footer -->
        <div class="content pulldown text-muted text-center">

        </div>
        <!-- END Error Footer -->
@stop