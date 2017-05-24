@extends('layout.in_app2')
@section('content')

<!-- Page Content -->
    <div class="content content-boxed">

    <div class="col-sm-12 col-sm-offset-3">
        <div class="col-xs-1 push-10-t text-right">
         <a href="{{URL::to('reports/'.$company->id.'/reports_view')}}" title="Back to Reports"><i class="fa fa-chevron-left fa-2x text-muted"></i></a>
        </div>
        <div class="col-xs-4">
            <div class="h2 text-center hidden-print push-20">Service Report:Summary</div>
        </div>
    </div>

    <div class="row hidden-print push-30">
    	<div class="col-sm-12 col-sm-offset-3">
        	<div class="col-xs-1 push-15-t text-right" style="width: 4%;">From:</div>
    	    <div class="col-xs-2">
    	        <div class="form-material">
    	            <input class="form-control" type="date" name="" value="<?php echo date('Y-m-d'); ?>">
    	        </div>
    	    </div>
    	    <div class="col-xs-1 push-15-t text-left" style="width: 2%;">to:</div>
    	    <div class="col-xs-2">
    	        <div class="form-material">
    	            <input class="form-control" type="date" name="" value="<?php echo date('Y-m-d'); ?>">
    	        </div>
    	    </div>
    	    <div class="col-xs-2">
    	    	<button class="btn btn-minw btn-success push-10-t" type="button">Update</button>
    	    </div>
	    </div>
    </div>

        <!-- Invoice -->
        <div class="block">
            <div class="block-header">
                <ul class="block-options">
                    <li>
                        <!-- Print Page functionality is initialized in App() -> uiHelperPrint() -->
                        <button type="button" onclick="App.initHelper('print-page');"><i class="si si-printer"></i> Print Invoice</button>
                    </li>
                    <li>
                        <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    </li>
                    <li>
                        <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                    </li>
                </ul>
             </div>

             <div class="block">
             		<div class="h2 text-center">Service Report:Summary</div>

	              	<div class="row text-center h4">
				    	{{$page_header}}
				    </div>

				    <div class="row text-center h5">
				    	Created at: <?php echo date('Y-m-d'); ?>
				    </div>

				    <div class="row text-center h4 push-20"><strong>Total Revenue:</strong></div>

				    <div class="block">
                        <div class="block-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-borderless text-center">
                                    <thead>
                                        <tr>
                                      
                                            <th class="text-center">
                                                Technician                                              
                                            </th>
                                            <th class="text-center">
                                                Date
                                            </th>
                                            <th class="text-center">
                                                Particulars
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Rick</td>
                                            <td>20-4-2017</td>
                                            <td>Davao</td>
                                        </tr>
                                        <tr>
                                            <td>Rick</td>
                                            <td>20-4-2017</td>
                                            <td>Davao</td>
                                        </tr>
                                        <tr>
                                            <td>Rick</td>
                                            <td>20-4-2017</td>
                                            <td>Davao</td>
                                        </tr>
                                        <tr>
                                            <td>Rick</td>
                                            <td>20-4-2017</td>
                                            <td>Davao</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        <!-- END Invoice -->
    </div>
    <!-- END Page Content -->

@stop