@extends('layout.in_app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">POS Sales Graph</h3>
                </div>
                <div class="block-content block-content-full">
                    <!-- Stacked Chart Container -->
                    <div class="js-flot-stacked" style="height: 330px;"></div>
                </div>
            </div>
            <div class="block" style="overflow-x: scroll;">
                        <div class="block-header">
                            <h3 class="block-title">POS Sales Table</h3>
                        </div>
                        <div class="block-content">
                            <table class="table table-bordered table-striped table-responsive js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th class="text-center">Station ID</th>
                                        <th class="text-center">Customer ID</th>
                                        <th class="text-center">Date</th>
                                        <th class="text-center">Shift</th>
                                        <th class="text-center">Doc Reference</th>
                                        <th class="text-center">Tax Amount</th>
                                        <th class="text-center">Total Amount</th>
<!--                                         
                                        <th class="text-center">Doc Type</th>
                                        <th class="text-center">Tender</th>
                                        <th class="text-center">Pay Tender</th>
                                        <th class="text-center">Pay Change</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Plate Number</th>
                                        <th class="text-center">Station Pump Code</th>
                                        <th class="text-center">SP Description</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Sales Amount</th>
                                        <th class="text-center">Username</th>
                                        <th></th>
                                         -->
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $i=0;
                                ?>
                                @foreach($pos_data as $pd)
                                    <tr>
                                        <td class="text-center">
                                            {{$pd->station_id}}
                                        </td>
                                        <td class="text-center">
                                            {{$pd->customer_id}}
                                        </td>
                                        <td class="text-center">
                                            <a href="#" data-toggle="modal" data-target="#modal-small-{{$i}}" type="button">
                                            {{$pd->salesdate}}
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <span class="label label-primary">
                                                {{$pd->shift}}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            {{$pd->doc_reference}}
                                        </td>
                                        <td class="text-center">
                                            {{$pd->tax_amount}}
                                        </td>
                                        <td class="text-center">
                                            {{$pd->total_amount}}
                                        </td>
                                        
<!--                                         <td class="text-center">
                                            {{$pd->doc_type}}
                                        </td>
                                        <td class="text-center">
                                            {{$pd->tender}}
                                        </td>
                                        <td class="text-center">
                                            <span class="label label-primary">
                                                {{$pd->pay_tender}}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            {{$pd->pay_change}}
                                        </td>
                                        <td class="text-center">
                                            <span class="label label-primary">
                                            {{$pd->status}}
                                            </span>
                                        </td>
                                        <td class="text-center">
                                            {{$pd->plate_number}}
                                        </td>
                                        <td class="text-center">
                                            {{$pd->station_pump_code}}
                                        </td>
                                        <td class="text-center">
                                            {{$pd->sp_description}}
                                        </td>
                                        <td class="text-center">
                                            {{$pd->quantity}}
                                        </td>
                                        <td class="text-center">
                                            {{$pd->price}}
                                        </td>
                                        <td class="text-center">
                                            {{$pd->sales_amount}}
                                        </td>
                                        <td class="text-center">
                                            {{$pd->username}}
                                        </td>
                                        <td>
                                            <a href="#" data-toggle="modal" data-target="#modal-small-{{$i}}" type="button">View Details</a>
                                        </td> -->
                                        
                                    </tr>
                                    <div class="modal" id="modal-small-{{$i}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Document #:{{$pd->doc_reference}}</h3>
                                                    </div>
                                                    <div class="block-content">
                                                        Username: {{$pd->username}}<br>
                                                        Sales Amount: {{$pd->sales_amount}}<br>
                                                        Price: {{$pd->price}}<br>
                                                        Quantity: {{$pd->quantity}}<br>
                                                        Description: {{$pd->sp_description}}<br>
                                                        Station Pump: {{$pd->station_pump_code}}<br>
                                                        Plate Number: {{$pd->plate_number}}<br>
                                                        Status: {{$pd->status}}<br>
                                                        Pay Change: {{$pd->pay_change}}<br>
                                                        Pay Tender: {{$pd->pay_tender}}<br>
                                                        Tender: {{$pd->tender}} <br>
                                                        Doc Type: {{$pd->doc_type}}
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> Ok</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                        $i++;
                                    ?>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
    </div>
    <script type="text/javascript">
        $('.js-dataTable-full').dataTable({
            pageLength: 10,
            lengthMenu: [[5, 10, 15, 20], [5, 10, 15, 20]]
        });
        
        var $flotStacked = $('.js-flot-stacked');
        var $dataDays = <?php echo $data_days;?>;
        var $dataSales = <?php echo $data_earnings;?>;
        $.plot($flotStacked,
            [
                {
                    label: 'Sales',
                    data: $dataSales
                }
            ],
            {
                colors: ['#faad7d', '#fadb7d'],
                series: {
                    stack: true,
                    lines: {
                        show: true,
                        fill: true
                    }
                },
                lines: {show: true,
                    lineWidth: 0,
                    fill: true,
                    fillColor: {
                        colors: [{opacity: 1}, {opacity: 1}]
                    }
                },
                legend: {
                    show: true,
                    position: 'nw',
                    sorted: true,
                    backgroundOpacity: 0
                },
                grid: {
                    borderWidth: 0
                },
                yaxis: {
                    tickColor: '#ffffff',
                    ticks: 10
                },
                /*xaxis: {
                    ticks: $dataDays,
                    tickColor: '#f5f5f5'
                }*/
            }
        );
    </script>
@stop