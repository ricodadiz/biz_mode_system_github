@extends('layout.in_app')
@section('content')
<div class="row">
    <div class="col-lg-4">
        <a class="block block-link-hover2" href="{{URL::to('message/'.$company->id)}}">
            <div class="block-content block-content-full bg-primary clearfix">
                <i class="si si-envelope fa-2x text-white pull-right"></i>
                <span class="h4 font-w700 text-white">{{ $count_unread_messages }}</span> <span class="h4 text-white-op"> unread messages</span>
            </div>
        </a>
    </div>
    <div class="col-lg-4">
        <a class="block block-link-hover2" href="{{URL::to('company_members_list/'.$company->id)}}">
            <div class="block-content block-content-full bg-city clearfix">
                <i class="si si-users fa-2x text-white pull-right"></i>
                <span class="h4 font-w700 text-white">{{ $count_company_members }}</span> <span class="h4 text-white-op">members</span>
            </div>
        </a>
    </div>
    <div class="col-lg-4">
        <a class="block block-link-hover2" href="{{URL::to('sales/'.$company->id.'/client_list')}}">
            <div class="block-content block-content-full bg-flat clearfix">
                <i class="si si-user-follow fa-2x text-white pull-right"></i>
                <span class="h4 font-w700 text-white">{{ $count_client }}</span> <span class="h4 text-white-op">clients</span>
            </div>
        </a>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
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
    </div>
    <div class="col-lg-4">
        <div class="block block-bordered">
            <div class="block-header">
                <ul class="block-options">
                    {{-- <li>
                        <button type="button" data-toggle="block-option" data-action="fullscreen_toggle"><i class="si si-size-fullscreen"></i></button>
                    </li>
                    <li>
                        <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                    </li>
                    <li>
                        <button type="button" data-toggle="block-option" data-action="content_toggle"><i class="si si-arrow-up"></i></button>
                    </li> --}}
                </ul>
                <h3 class="block-title">Calendar</h3>
            </div>
            <div class="block-content">
                <div class="pull-r-l pull-t push">
                    <table class="block-table text-center bg-gray-lighter border-b">
                        <tbody>
                            <tr>
                                <td class="border-r" style="width: 50%;">
                                    <div id="event_count" class="h1 font-w700"></div>
                                    <div class="h5 text-muted text-uppercase push-5-t">Events</div>
                                </td>
                                <td>
                                    <a href="{{URL::to('sysapp/'.$company->id.'/calendar')}}">
                                        <div class="push-30 push-30-t">
                                            <i class="si si-calendar fa-3x text-black-op"></i>
                                            <br>
                                            Go to Calendar
                                        </div>
                                    </a>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <ul id="eventlist" class="list list-activity push" style="height: 182px; overflow-y: scroll;">
                        
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        event = {{ $count_event }};
        $("#event_count").html(event.length);
        $("ul#eventlist").html('');
        if(event.length == 0)
        {
            $("ul#eventlist").append('<li><div class="font-w600">No Events</div><div><small class="text-muted">Use the calendar to add</small></div></li>');
        }
        $.each(event, function(index, val) {
            $("ul#eventlist").append('<li><div class="font-w600">'+event[index].title+'</div><div><small class="text-muted">'+event[index].start+'</small></div></li>');
        });
    </script>
</div>


<div class="row">
    <div class="col-lg-3">
        <a class="block block-bordered block-link-hover3" href="{{URL::to('warehouse/'.$company->id.'/manage_warehouse')}}">
            <table class="block-table text-center">
                <tbody>
                    <tr>
                        <td class="bg-gray-lighter border-r" style="width: 50%;">
                            <div class="push-30 push-30-t">
                                <i class="si si-home fa-3x text-black-op"></i>
                            </div>
                        </td>
                        <td style="width: 50%;">
                            <div class="h1 font-w700"><span class="h2 text-muted">+</span> {{$count_warehouse}}</div>
                            <div class="h5 text-muted text-uppercase push-5-t">Warehouse</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </a>
    </div>
    <div class="col-lg-3">
        <a class="block block-bordered block-link-hover3" href="{{URL::to('warehouse/'.$company->id.'/product_list')}}">
            <table class="block-table text-center">
                <tbody>
                    <tr>
                        <td class="bg-gray-lighter border-r" style="width: 50%;">
                            <div class="push-30 push-30-t">
                                <i class="si si-basket-loaded fa-3x text-black-op"></i>
                            </div>
                        </td>
                        <td style="width: 50%;">
                            <div class="h1 font-w700"><span class="h2 text-muted">+</span> {{$count_products}}</div>
                            <div class="h5 text-muted text-uppercase push-5-t">Products</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </a>
    </div>
    <div class="col-lg-3">
        <a class="block block-bordered block-link-hover3" href="{{URL::to('sales/'.$company->id.'/delivery_list')}}">
            <table class="block-table text-center">
                <tbody>
                    <tr>
                        <td class="bg-gray-lighter border-r" style="width: 50%;">
                            <div class="push-30 push-30-t">
                                <i class="fa fa-truck fa-3x text-black-op"></i>
                            </div>
                        </td>
                        <td style="width: 50%;">
                            <div class="h1 font-w700"><span class="h2 text-muted">+</span> {{$count_delivery}}</div>
                            <div class="h5 text-muted text-uppercase push-5-t">Delivery</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </a>
    </div>
    <div class="col-lg-3">
        <a class="block block-bordered block-link-hover3" href="{{URL::to('sales/'.$company->id.'/order_list')}}">
            <table class="block-table text-center">
                <tbody>
                    <tr>
                        <td class="bg-gray-lighter border-r" style="width: 50%;">
                            <div class="push-30 push-30-t">
                                <i class="fa fa-clipboard fa-3x text-black-op"></i>
                            </div>
                        </td>
                        <td style="width: 50%;">
                            <div class="h1 font-w700"><span class="h2 text-muted">+</span> {{$count_orders}}</div>
                            <div class="h5 text-muted text-uppercase push-5-t">Order</div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </a>
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