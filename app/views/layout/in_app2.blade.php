<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>{{$title}}</title>

        <meta name="description" content="Beezmode Solutions">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{asset('fav.ico')}}">

        <!-- <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-96x96.png" sizes="96x96">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-160x160.png" sizes="160x160">
        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-192x192.png" sizes="192x192">

        <link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicons/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicons/apple-touch-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicons/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicons/apple-touch-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicons/apple-touch-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicons/apple-touch-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicons/apple-touch-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicons/apple-touch-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png"> -->
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <!-- Page JS Plugins CSS -->
        <!-- <link rel="stylesheet" href="assets/js/plugins/slick/slick.min.css"> -->
        {{HTML::style("assets/js/plugins/slick/slick.min.css")}}
        <!-- <link rel="stylesheet" href="assets/js/plugins/slick/slick-theme.min.css"> -->
        {{HTML::style("assets/js/plugins/slick/slick-theme.min.css")}}

        <!-- Bootstrap and OneUI CSS framework -->
        <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
        {{HTML::style("assets/css/bootstrap.min.css")}}
        <!-- <link rel="stylesheet" id="css-main" href="assets/css/oneui.css"> -->
        {{HTML::style("assets/css/oneui.css")}}
        {{HTML::style("assets/js/plugins/datatables/jquery.dataTables.css")}}

        {{HTML::script("assets/js/core/jquery.min.js")}}
        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
        
        {{HTML::style("assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css")}}
        {{HTML::style("assets/js/plugins/select2/select2.min.css")}}
        {{HTML::style("assets/js/plugins/fullcalendar/fullcalendar.min.css")}}
        {{HTML::style("assets/js/plugins/select2/select2-bootstrap.min.css")}}
        {{HTML::style("assets/js/plugins/dropzonejs/dropzone.min.css")}}
        {{HTML::style("assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css")}}
       

        {{HTML::script("assets/js/plugins/dropzonejs/dropzone.min.js")}}
        
        {{HTML::script("assets/js/plugins/ckeditor/ckeditor.js")}}
        {{HTML::script("assets/js/plugins/select2/select2.full.min.js")}}
        {{HTML::script("assets/js/plugins/select2/select2.min.js")}}
        {{HTML::script("assets/js/plugins/datatables/jquery.dataTables.min.js")}}
        {{HTML::script("assets/js/plugins/flot/jquery.flot.stack.min.js")}}
        {{HTML::script("assets/js/plugins/flot/jquery.flot.min.js")}}

        {{HTML::script("assets/js/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js")}}
        {{HTML::script("assets/js/plugins/jquery-validation/jquery.validate.min.js")}}
        
        {{HTML::script("assets/js/plugins/jquery-ui/jquery-ui.min.js")}}
        {{HTML::script("assets/js/plugins/fullcalendar/moment.min.js")}}
        {{HTML::script("assets/js/plugins/fullcalendar/fullcalendar.min.js")}}
        {{HTML::script("assets/js/plugins/fullcalendar/gcal.min.js")}}
        {{HTML::script("assets/js/plugins/slick/slick.min.js")}}
    </head>
    <body>
        <!-- Page Container -->
        <!--
            Available Classes:

            'enable-cookies'             Remembers active color theme between pages (when set through color theme list)

            'sidebar-l'                  Left Sidebar and right Side Overlay
            'sidebar-r'                  Right Sidebar and left Side Overlay
            'sidebar-mini'               Mini hoverable Sidebar (> 991px)
            'sidebar-o'                  Visible Sidebar by default (> 991px)
            'sidebar-o-xs'               Visible Sidebar by default (< 992px)

            'side-overlay-hover'         Hoverable Side Overlay (> 991px)
            'side-overlay-o'             Visible Side Overlay by default (> 991px)

            'side-scroll'                Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (> 991px)

            'header-navbar-fixed'        Enables fixed header
        -->
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Overlay Scroll Container -->
                <div id="side-overlay-scroll">
                    <!-- Side Header -->
                    <div class="side-header side-content">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default pull-right" type="button" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times"></i>
                        </button>
                        <span>
                        @if($user->profile_photo === NULL)
                            <img class="img-avatar img-avatar32" src="{{asset('assets/img/avatars/avatar1.jpg')}}" alt="">
                        @else
                            <img class="img-avatar img-avatar32" src="{{$user->profile_photo}}" alt="">
                        @endif
                            <span class="font-w600 push-10-l">{{$user->username}}!</span>
                        </span>
                    </div>
                    <!-- END Side Header -->

                    <!-- Side Content -->
                    <div class="side-content remove-padding-t">
                        <!-- Side Overlay Tabs -->
                        <div class="block pull-r-l border-t">
                            <ul class="nav nav-tabs nav-tabs-alt nav-justified" data-toggle="tabs">
                                <li class="active">
                                    <a href="#tabs-side-overlay-overview">{{-- <i class="fa fa-fw fa-coffee"></i> --}} Overview</a>
                                </li>
                                <li>
                                    <a href="#tabs-side-overlay-sales">{{-- <i class="fa fa-fw fa-line-chart"> --}}</i>Friends</a>
                                </li>
                            </ul>
                            <div class="block-content tab-content">
                                <!-- Overview Tab -->
                                <div class="tab-pane fade fade-right in active" id="tabs-side-overlay-overview">
                                    <!-- Activity -->
                                    <div class="block pull-r-l">
                                        <div class="block-header bg-gray-lighter">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                                </li>
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Recent Activity</h3>
                                        </div>
                                        <div class="block-content">
                                            <!-- Activity List -->
                                            <ul class="list list-activity">
                                                <li>
                                                    <i class="si si-wallet text-success"></i>
                                                    <div class="font-w600">New sale ($15)</div>
                                                    <div><a href="javascript:void(0)">Admin Template</a></div>
                                                    <div><small class="text-muted">3 min ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="si si-pencil text-info"></i>
                                                    <div class="font-w600">You edited the file</div>
                                                    <div><a href="javascript:void(0)"><i class="fa fa-file-text-o"></i> Documentation.doc</a></div>
                                                    <div><small class="text-muted">15 min ago</small></div>
                                                </li>
                                                <li>
                                                    <i class="si si-close text-danger"></i>
                                                    <div class="font-w600">Project deleted</div>
                                                    <div><a href="javascript:void(0)">Line Icon Set</a></div>
                                                    <div><small class="text-muted">4 hours ago</small></div>
                                                </li>
                                            </ul>
                                            <!-- END Activity List -->
                                        </div>
                                    </div>
                                    <!-- END Activity -->
                                </div>
                                <!-- END Overview Tab -->

                                <!-- Sales Tab -->
                                <div class="tab-pane fade fade-left" id="tabs-side-overlay-sales">
                                    <div class="block pull-r-l">
                                        <div class="block-header bg-gray-lighter">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                                                </li>
                                                <li>
                                                    <button type="button" data-toggle="block-option" data-action="content_toggle"></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Online Friends</h3>
                                        </div>
                                        <div class="block-content block-content-full">
                                            <!-- Users Navigation -->
                                            <ul class="nav-users remove-margin-b">
                                                <li>
                                                    <a href="base_pages_profile.html">
                                                        <img class="img-avatar" src="assets/img/avatars/avatar7.jpg" alt="">
                                                        <i class="fa fa-circle text-success"></i> Ashley Welch
                                                        <div class="font-w400 text-muted"><small>Copywriter</small></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_profile.html">
                                                        <img class="img-avatar" src="assets/img/avatars/avatar13.jpg" alt="">
                                                        <i class="fa fa-circle text-success"></i> Dennis Ross
                                                        <div class="font-w400 text-muted"><small>Web Developer</small></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_profile.html">
                                                        <img class="img-avatar" src="assets/img/avatars/avatar3.jpg" alt="">
                                                        <i class="fa fa-circle text-success"></i> Amber Walker
                                                        <div class="font-w400 text-muted"><small>Web Designer</small></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_profile.html">
                                                        <img class="img-avatar" src="assets/img/avatars/avatar2.jpg" alt="">
                                                        <i class="fa fa-circle text-warning"></i> Rebecca Gray
                                                        <div class="font-w400 text-muted"><small>Photographer</small></div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="base_pages_profile.html">
                                                        <img class="img-avatar" src="assets/img/avatars/avatar16.jpg" alt="">
                                                        <i class="fa fa-circle text-warning"></i> Roger Hart
                                                        <div class="font-w400 text-muted"><small>Graphic Designer</small></div>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- END Users Navigation -->
                                        </div>



                                </div>
                                <!-- END Sales Tab -->
                            </div>
                        </div>
                        <!-- END Side Overlay Tabs -->
                    </div>
                    <!-- END Side Content -->
                </div>
                <!-- END Side Overlay Scroll Container -->
            </aside>
            <!-- END Side Overlay -->

            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content bg-white-op">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                            <div class="btn-group pull-right">
<!--                                 <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                                    <i class="si si-drop"></i>
                                </button> -->
                                <ul class="dropdown-menu dropdown-menu-right font-s13 sidebar-mini-hide">
                                    <li>
                                        <a data-toggle="theme" data-theme="default" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-default pull-right"></i> <span class="font-w600">Default</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/amethyst.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-amethyst pull-right"></i> <span class="font-w600">Amethyst</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/city.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-city pull-right"></i> <span class="font-w600">City</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/flat.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-flat pull-right"></i> <span class="font-w600">Flat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/modern.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-modern pull-right"></i> <span class="font-w600">Modern</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="theme" data-theme="assets/css/themes/smooth.min.css" tabindex="-1" href="javascript:void(0)">
                                            <i class="fa fa-circle text-smooth pull-right"></i> <span class="font-w600">Smooth</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                <!-- Beezmode logo goes here -->
                            <a class="h5 text-white" href="{{URL::to('/')}}">
                            <img src="{{asset('img/logotrans2.png')}}" style="width:10%;">
                               <!--  <i class="fa fa-circle-o-notch text-primary"></i> --><span class="h4 font-w600 sidebar-mini-hide">eezMode</span>
                            </a>
                        </div>
                        <!-- END Side Header -->
<!-- ==================CONTENT RECYCLE================== -->
                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
                                <li>
                                    <a class="active" href="{{URL::to('dashboard/'.$company->id)}}"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">{{$company->company_name}}</span></a>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">User Profile</span></li>
                                <li>
                                    <a href="{{URL::to('user_profile/'.$company->id.'/'.$user->username)}}"><i class="si si-user"></i><span class="sidebar-mini-hide">{{$user->username}}</span></a>
                                </li>
                                <li>
                                    <a href="{{URL::to('user_profile_settings/'.$company->id)}}"><i class="si si-settings"></i><span class="sidebar-mini-hide">Profile Settings</span></a>
                                </li>
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">Company Menu</span></li>
                                @if($user->can('view_company_member'))
                                <li>
                                    <a href="{{URL::to('company')}}"><i class="fa fa-briefcase"></i><span class="sidebar-mini-hide">Company List</span></a>
                                </li>
                                @endif
                                <li>
                                    <a href="{{URL::to('company_profile/'.$company->id)}}"><i class="si si-book-open"></i><span class="sidebar-mini-hide">Company Profile</a>
                                </li>
                                @if($user->can('view_company_member'))
                                <li>
                                    <a href="{{URL::to('company_members_list/'.$company->id)}}"><i class="si si-list"></i><span class="sidebar-mini-hide">Company Member List</a>
                                </li>
                                @endif
                                @if($user->can('view_warehouse'))
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">Process and Operations</span></li>
                                @endif
                                <li>
                                @if($user->can('view_warehouse'))
                                    <a class="nav-submenu" data-toggle="nav-submenu"><i class="fa fa-building"></i><span class="sidebar-mini-hide">Warehouse</span></a> @endif
                                    <ul>
                                                                    
<!--                                         <li>
                                            <a href="{{URL::to('warehouse/'.$company->id.'/warehouse_summary')}}">Warehouse Summary</a>
                                        </li> -->
<!-- ===================== PREMIUM ===================== -->
<!--                                         <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Documents</a>
                                            <ul>
                                                <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/incoming_shipments')}}">Incoming Shipments</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/outgoing_shipments')}}">Outgoing Shipments</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/inventory_adjustments')}}">Inventory Adjustments</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/reports_warehouse')}}">Reports</a>
                                                </li>
                                            </ul>
                                        </li> 

                                        <li>
                                            <a href="{{URL::to('warehouse/'.$company->id.'/product_cost')}}">Product Cost</a>
                                        </li> -->
<!-- ===================== PREMIUM ===================== -->
<!--                                         <li>
                                        <a class="nav-submenu" data-toggle="nav-submenu" href="#">Manage Warehouse</a>
                                        <ul>
                                            @if($user->can('view_warehouse'))
                                            <li>
                                                <a href="{{URL::to('warehouse/'.$company->id.'/warehouse_list')}}">Warehouse List</a>
                                            </li>
                                            @endif
                                            @if($user->can('view_category'))
                                            <li>
                                                <a href="{{URL::to('warehouse/'.$company->id.'/category_list')}}">Category List</a>
                                            </li>
                                            @endif
                                            @if($user->can('view_brand'))
                                            <li>
                                                <a href="{{URL::to('warehouse/'.$company->id.'/brand_list')}}">Brand List</a>
                                            </li>
                                            @endif
                                        </ul>
                                        </li> -->
                                        <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu">Inventory</a>
                                            <ul>
                                                {{-- <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/inventory_summary')}}">Inventory Summary</a>
                                                </li> --}}
                                                @if($user->can('view_product'))
                                                <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/product_list')}}">Product List</a>
                                                </li>
                                                @endif
                                                {{-- <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/manage_inventory')}}">Manage Inventory</a>
                                                </li> --}}


<!-- ===================== PREMIUM ===================== -->
<!--                                                 <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/current_inventory')}}">Current Inventory</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/stock_movement')}}">Stock Movement</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/product_movement')}}">Product Movement</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('warehouse/'.$company->id.'/reports_inventory_warehouse')}}">Reports</a>
                                                </li> -->
<!-- ===================== PREMIUM ===================== -->
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    @if($user->can('view_sales'))
                                    <a class="nav-submenu" data-toggle="nav-submenu"><i class="fa fa-credit-card-alt"></i><span class="sidebar-mini-hide">Sales</span></a>
                                    @endif
                                    <ul>

                                        @if($user->can('view_sales_summary'))
                                        <li>
                                            <a href="{{URL::to('pos_sales/'.$company->id)}}">Sales Summary</a>
                                        </li>
                                        @endif
                                    
                                        <li>
                                            @if($user->can('view_client'))
                                            <a href="{{URL::to('sales/'.$company->id.'/client_list')}}">Client List</a>
                                          <!--   <ul>
                                                <li>
                                                    <a href="{{URL::to('sales/'.$company->id.'/prospect_clients')}}">Prospects</a>
                                                </li>
                                                <li>
                                                    <a href="#">Client List</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('sales/'.$company->id.'/client_list_dynamic')}}">Client List (Dynamic)</a>
                                                </li>
                                            </ul> -->
                                            @endif
                                        </li>
                                        <li>
                                        @if($user->can('view_order'))
                                        <a class="nav-submenu" data-toggle="nav-submenu">Product Order</a>
                                        <ul>
                                            @endif
                                                <!-- <li>
                                                    <a href="{{URL::to('sales/'.$company->id.'/process_order')}}">Process Order</a>
                                                </li> -->
                                                
                                                <li>
                                                    @if($user->can('view_order'))
                                                    <a href="{{URL::to('sales/'.$company->id.'/order_list_generic')}}">Order List</a>
                                                    @endif
                                                </li>
                                            </ul>
                                
                                        </li>
<!--                                         <li>
                                            <a class="nav-submenu" data-toggle="nav-submenu" href="#">Documents</a>
                                            <ul>
                                                <li>
                                                    <a href="{{URL::to('sales/'.$company->id.'/alldocs_sales')}}">All Documents</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('sales/'.$company->id.'/approval_sales')}}">Waiting for Approval</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('sales/'.$company->id.'/payment_sales')}}">Waiting for Payment</a>
                                                </li>
                                                <li>
                                                    <a href="{{URL::to('sales/'.$company->id.'/invoice_sales')}}">Repeating Invoices</a>
                                                </li>
                                            </ul>
                                        </li>
 -->
                                        <li>
                                            @if($user->can('view_service'))
                                            <a class="nav-submenu" data-toggle="nav-submenu">Service Order</a> 
                                            @endif
                                            <ul>
                                                @if($user->can('view_service'))
                                                <li>
                                                    <a class="nav-submenu" data-toggle="nav-submenu" >Services</a>
                                                   <ul>
                                                    @endif
                                                        @if($user->can('view_service'))
                                                        <li>
                                                            <a href="{{URL::to('sales/'.$company->id.'/service_list')}}">Service</a>
                                                        </li>
                                                        @endif
                                                        @if($user->can('view_service'))
                                                        <li>
                                                            <a href="{{URL::to('sales/'.$company->id.'/technician_allowance')}}">Technician Allowance</a>
                                                        </li>
                                                        @endif
                                                    </ul> 
                                                </li>
                                                @if($user->can('view_service'))
                                                <li>
                                                    <a class="nav-submenu" data-toggle="nav-submenu">Expenses</a>
                                                   <ul>
                                                    @endif
                                                        @if($user->can('view_service'))
                                                        <li>
                                                            <a href="{{URL::to('sales/'.$company->id.'/expense_service_list')}}">Service</a>
                                                        </li>
                                                        @endif
                                                        @if($user->can('view_service'))
                                                        <li>
                                                            <a href="{{URL::to('sales/'.$company->id.'/expense_technician')}}">Technician Allowance</a>
                                                        </li>
                                                        @endif
                                                    </ul> 
                                                </li>
                                                @if($user->can('view_delivery'))
                                                <li>
                                                    <a href="{{URL::to('sales/'.$company->id.'/delivery_list')}}">Delivery List</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </li>
                                        <li>
                                            @if($user->can('view_client'))
                                            <a href="{{URL::to('sales/'.$company->id.'/invoice')}}">Invoice</a>
                                            @endif
                                        </li>
                                    </ul>                                   
                                </li>
{{-- START OF ACCOUNTING MENU--}}
                                @if($user->can('view_accounting'))
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-balance-scale"></i><span class="sidebar-mini-hide">Accounting</span></a>
                                @endif
                                    <ul>
                                        @if($user->can('view_transaction_list'))
                                        <li>
                                            <a href="{{URL::to('accounting/'.$company->id.'/transaction_list')}}">Transactions</a>
                                        </li>
                                        @endif
                                        @if($user->can('view_accounts_list'))
                                        <li>
                                            <a href="{{URL::to('accounting/'.$company->id.'/accounts_list')}}">Chart of Accounts</a>
                                        </li>
                                        @endif
                                        @if($user->can('view_journal'))
                                        <li>
                                            <a href="{{URL::to('accounting/'.$company->id.'/journal_list')}}">Journal Transactions</a>
                                        </li>
                                        @endif
                                        @if($user->can('view_balances'))
                                        <li>
                                            <a href="{{URL::to('accounting/'.$company->id.'/balance_list')}}">Balances</a>
                                        </li>
                                        @endif
                                    </ul>                                   
                                </li>

                                @if($user->can('view_purchase'))
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-shopping-cart"></i><span class="sidebar-mini-hide">Purchases</span></a> 
                                    @endif
                                    <ul>
                                    @if($user->can('view_bill'))
                                        <li>
                                            <a href="{{URL::to('purchases/'.$company->id.'/bill_view')}}">Bills</a>
                                        </li>
                                    @endif
                                    @if($user->can('view_retailer'))
                                        <li>
                                            <a href="{{URL::to('purchases/'.$company->id.'/retailer_view')}}">Retailers</a>
                                        </li>
                                    @endif
                                    @if($user->can('view_product_service'))
                                        <li>
                                            <a href="{{URL::to('purchases/'.$company->id.'/products_services_view')}}">Products & Servises</a>
                                        </li>
                                    @endif                                   
                                    </ul>
                                </li> <!-- End of Purchases -->

                                <li>
                                    <a href="{{URL::to('reports/'.$company->id.'/reports_view')}}"><i class="fa fa-file"></i><span class="sidebar-mini-hide">Reports</span></a> 
                                </li>

                                @if($user->can('view_roles')  || $user->hasRole('Owner'))
                                <li class="nav-main-heading"><span class="sidebar-mini-hide">Administration</span></li>
<!--                                 <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-wrench"></i><span class="sidebar-mini-hide">General Settings</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{URL::to('company_profile/'.$company->id)}}">Company Profile</a>
                                        </li>    
                                        <li>
                                            <a href="{{URL::to('user_profile_settings/'.$company->id)}}">Account Settings</a>
                                        </li>
                                        <li>
                                            <a href="{{URL::to('gensettings/'.$company->id.'/customer_support')}}">Customer Support</a>
                                        </li>                           
                                    </ul>
                                </li> --> @endif
                                @if($user->can('view_roles')  || $user->hasRole('Owner'))

                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-settings"></i><span class="sidebar-mini-hide">Setup</span></a>
                                    <ul>
                                        @if($user->can('view_sales_setup'))
                                        <li>
                                         <a href="{{URL::to('sales/'.$company->id.'/sales_settings')}}">Sales Setup</a>
                                        </li>
                                        @endif

                                        <li>
                                            <a href="{{URL::to('warehouse/'.$company->id.'/manage_warehouse')}}">Warehouse Setup</a>
                                        </li>        

                                        <li>
                                            <a href="{{URL::to('sales/'.$company->id.'/add_client_view')}}">Client Setup</a>
                                        </li>

                                        <li>
                                            <a href="{{URL::to('warehouse/'.$company->id.'/add_product_view')}}">Product Setup</a>
                                        </li>            
                                    </ul>
                                </li>
                                @endif


                                @if($user->can('view_roles')  || $user->hasRole('Owner'))

                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-cogs"></i><span class="sidebar-mini-hide">User Management</span></a>
                                    <ul>
<!--                                         <li>
                                            <a href="{{URL::to('umgtsettings/'.$company->id.'/umgt_setup')}}">Set Up</a>
                                        </li> -->
                                        <li>
                                            <a href="{{URL::to('umgtsettings/'.$company->id.'/umgt_roles')}}">Roles</a>
                                        </li>
                                    </ul>
                                </li>
                                @endif

<!-- MORE -->
                            @if($user->can('view_report'))
                                <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="glyphicon glyphicon-alert"></i><span class="sidebar-mini-hide">Report Issues</span></a>
                                    <ul>
                                        <li>
                                            <a href="{{URL::to('report_issues/'.$company->id.'/business_issue_list')}}">Business</a>
                                        </li>
                                        <li>
                                            <a href="{{URL::to('report_issues/'.$company->id.'/technical_issue_list')}}">Technical</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif
<!--                                 <li class="nav-main-heading"><span class="sidebar-mini-hide">More</span></li>
                                <li>
                                    <a href="frontend_home.html"><i class="si si-rocket"></i><span class="sidebar-mini-hide">Whats New?</span></a>
                                </li>
                                <li>
                                    <a href="frontend_home.html"><i class="fa fa-facebook-square"></i><span class="sidebar-mini-hide">Connect with Facebook</span></a>
                                </li>
                                <li>
                                    <a href="frontend_home.html"><i class="si si-list"></i><span class="sidebar-mini-hide">Logs</span></a> 
                                </li> -->
<!-- MORE -->
                                <br>
                                <br>
                            </ul>
                        </div>
                        <!-- END Side Content -->
<!-- ==================CONTENT RECYCLE================== -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full">
                <!-- Header Navigation Right -->
                <ul class="nav-header pull-right">
                    <li>
                        <div class="btn-group">
                            <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                            @if($user->profile_photo === NULL)
                                <img src="{{asset('assets/img/avatars/avatar1.jpg')}}" alt="">
                                <span class="caret"></span>
                            @else
                                <img src="{{$user->profile_photo}}" alt="Avatar">
                                <span class="caret"></span>
                            @endif
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li class="dropdown-header">Profile</li>
                                <li>
                                    <a tabindex="-1" href="{{URL::to('message/'.$company->id)}}">
                                        <i class="si si-envelope-open pull-right"></i>
                                        @if(Messages::where('receiver',Confide::user()->id)->count() > 0)
                                        <span class="badge badge-primary pull-right">{{Messages::where('receiver',Confide::user()->id)->where('read_receipt',0)->count()}}</span>
                                        @endif
                                        Inbox
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="{{URL::to('user_profile/'.$company->id.'/'.$user->username)}}">
                                        <i class="si si-user pull-right"></i>
                                        {{$user->username}}
                                    </a>
                                </li>

                                <li class="divider"></li>
                                <li class="dropdown-header">Account</li>
<!--                                 <li>
                                    <a tabindex="-1" href="base_pages_lock.html">
                                        <i class="si si-lock pull-right"></i>Lock Account
                                    </a>
                                </li> -->
                                <li>
                                    <a tabindex="-1" href="{{URL::to('user_profile_settings/'.$company->id)}}">
                                        <i class="si si-settings pull-right"></i>Settings
                                    </a>
                                </li>
                                <li>
                                    <a tabindex="-1" href="{{URL::to('users/logout')}}">
                                        <i class="si si-logout pull-right"></i>Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                            <i class="fa fa-tasks"></i>
                        </button>
                    </li>
                </ul>
                <!-- END Header Navigation Right -->

                <!-- Header Navigation Left -->
                <ul class="nav-header pull-left">
                    <li class="hidden-md hidden-lg">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                            <i class="fa fa-navicon"></i>
                        </button>
                    </li>
                    <li class="hidden-xs hidden-sm">
                        <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                        <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                    </li>
                    <li>
                        <!-- Opens the Apps modal found at the bottom of the page, before including JS code -->
                        <button class="btn btn-default pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
                            <i class="si si-grid"></i>
                        </button>
                    </li>
                    <li class="visible-xs">
                        <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                        <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </li>
                   
                </ul>
                <!-- END Header Navigation Left -->
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Header -->
                <!-- END Page Header -->

                <!-- Stats -->
                <!-- <div class="content bg-white border-b">
                    <div class="row items-push text-uppercase">
                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                            <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">300</a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Product Sales</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month</small></div>
                            <a class="h2 font-w300 text-primary animated flipInX" 
                            href="base_comp_charts.html">8,790</a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Total Earnings</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                            <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">₱ 93,880</a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <div class="font-w700 text-gray-darker animated fadeIn">Average Sale</div>
                            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                            <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">₱ 270</a>
                        </div>
                    </div>
                </div> -->
                <!-- END Stats -->

                <!-- Page Content -->
                <div class="content">
                    @yield('content')
                </div>              <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div class="pull-right">
      
                </div>
                {{-- <div class="pull-left">
                    <a class="font-w600" href="dashboard" target="_blank">Beezmode Solutions</a> &copy; 
                    <span>2016-17</span>
                </div> --}}
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <!-- Apps Modal -->
        <!-- Opens from the button in the header -->
        <div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-sm modal-dialog modal-dialog-top">
                <div class="modal-content">
                    <!-- Apps Block -->
                    <div class="block block-themed block-transparent">
                        <div class="block-header bg-primary-dark">
                            <ul class="block-options">
                                <li>
                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                </li>
                            </ul>
                            <h3 class="block-title">Report Issue</h3>
                        </div>
                        <div class="block-content">
                            <div class="row text-center">
                                <div class="col-xs-6">
                                <a data-toggle="modal" data-target="#modal-popout-1" class="block block-rounded" type="button" title="Report Business">
                                   {{--  <a class="block block-rounded" href="index.html"> --}}
                                        <div class="block-content text-white bg-default">
                                            <i class="si si-speedometer fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Business</div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-xs-6">
                                 <a data-toggle="modal" data-target="#modal-popout-2" class="block block-rounded" type="button" title="Report Technical">
                                        <div class="block-content text-white bg-modern">
                                            <i class="si si-rocket fa-2x"></i>
                                            <div class="font-w600 push-15-t push-15">Technical</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Apps Block -->
                </div>


            </div>
        </div>
        <!-- END Apps Modal -->
        <div class="modal fade" id="modal-popout-1" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Send Business Issue</h3>
                                                    </div>
                                                    
        <form action="{{URL::to('add_business_report/{id}')}}" method="post" enctype="multipart/form-data">
                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="username1">Your Username </label>
                                                            <input class="form-control" type="text" id="username1" name="username1" value="{{$user->username}}"  readonly="readonly">
                                                        </div>
                                                    </div>

                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="email1">Your email </label>
                                                            <input class="form-control" type="text" id="email1" name="email1" value="{{$user->email}}" readonly="readonly" >
                                                        </div>
                                                    </div>

                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="date1">Date </label>
                                                            <input class="form-control" type="date" id="date1" name="date1" value="<?php echo date('Y-m-d'); ?>"  readonly="readonly">
                                                        </div>                                                 
                                                    </div>

                                                    <div class="block-content">
                                                       <textarea class="form-control input-lg" rows="15" placeholder="Enter your concern here..." name="message1"></textarea>
                                                    </div>
                                                    <div class="block-content">
                                                        <label for="profile-photo">Attach File</label>
                                                        <input type="file" name="image1" id="image1">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    
                                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i> Submit</button>
                                                    
                                                </div> 

                                            </div>

                                        </div>
        </form>
        </div>

        <div class="modal fade" id="modal-popout-2" tabindex="-1" role="dialog" aria-hidden="true">
                                       <div class="modal-dialog modal-dialog-popout">
                                            <div class="modal-content">
                                                <div class="block block-themed block-transparent remove-margin-b">
                                                    <div class="block-header bg-primary-dark">
                                                        <ul class="block-options">
                                                            <li>
                                                                <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                            </li>
                                                        </ul>
                                                        <h3 class="block-title">Send Technical Issue</h3>
                                                    </div>
                                                    
        <form action="{{URL::to('add_technical_report/{id}')}}" method="post" enctype="multipart/form-data">
                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="username2">Your Username </label>
                                                            <input class="form-control" type="text" id="username2" name="username2" value="{{$user->username}}" readonly="readonly">
                                                        </div>
                                                    </div>

                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="email2">Your email </label>
                                                            <input class="form-control" type="text" id="email2" name="email2" value="{{$user->email}}" readonly="readonly">
                                                        </div>
                                                    </div>

                                                    <div class="block-content">
                                                        <div class="form-material">
                                                            <label for="date2">Date </label>
                                                            <input class="form-control" type="date" id="date2" name="date2" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
                                                        </div>                                                 
                                                    </div>

                                                    <div class="block-content">
                                                       <textarea class="form-control input-lg" rows="15" placeholder="Enter your concern here..." name="message2"></textarea>
                                                    </div>
                                                    <div class="block-content">
                                                        <label for="profile-photo">Attach File</label>
                                                        <input type="file" name="image2" id="image1">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                                                    
                                                    <button class="btn btn-sm btn-success" type="submit"><i class="fa fa-check"></i> Submit</button>
                                                    
                                                </div> 

                                            </div>

                                        </div>
        </form>
        </div>

        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
      
        
        <!-- <script src="assets/js/core/jquery.min.js"></script> -->
        {{HTML::script("assets/js/core/bootstrap.min.js")}}
        <!-- <script src="assets/js/core/bootstrap.min.js"></script> -->
        {{HTML::script("assets/js/core/jquery.slimscroll.min.js")}}
        <!-- <script src="assets/js/core/jquery.slimscroll.min.js"></script> -->
        {{HTML::script("assets/js/core/jquery.scrollLock.min.js")}}
        <!-- <script src="assets/js/core/jquery.scrollLock.min.js"></script> -->
        {{HTML::script("assets/js/core/jquery.appear.min.js")}}
        <!-- <script src="assets/js/core/jquery.appear.min.js"></script> -->
        {{HTML::script("assets/js/core/jquery.countTo.min.js")}}
        <!-- <script src="assets/js/core/jquery.countTo.min.js"></script> -->
        {{HTML::script("assets/js/core/jquery.placeholder.min.js")}}
        <!-- <script src="assets/js/core/jquery.placeholder.min.js"></script> -->
        {{HTML::script("assets/js/core/js.cookie.min.js")}}
        <!-- <script src="assets/js/core/js.cookie.min.js"></script> -->
        {{HTML::script("assets/js/app.js")}}
        <!-- <script src="assets/js/app.js"></script> -->


        <!-- Page Plugins -->
        
        <!-- <script src="assets/js/plugins/slick/slick.min.js"></script> -->
        {{HTML::script("assets/js/plugins/chartjs/Chart.min.js")}}
        
        <!-- <script src="assets/js/plugins/chartjs/Chart.min.js"></script> -->

        <!-- Page JS Code -->
        {{HTML::script("assets/js/pages/base_pages_dashboard.js")}}
        {{HTML::script("assets/js/plugins/datatables/jquery.dataTables.js")}}
        
        {{HTML::script("assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js")}}
        {{HTML::script("assets/js/pages/base_tables_datatables.js")}}

        <!-- <script src="assets/js/pages/base_pages_dashboard.js"></script> -->
                                    <!-- Page JS Code -->
        <script>
            var d = new Date();
            document.getElementById("date").innerHTML = d.toDateString();
        </script>

        <script>
            var d = new Date();
            document.getElementById("date2").innerHTML = d.toDateString();
        </script>
                                     
        <script>
            jQuery(function () {
                // Init page helpers (Slick Slider plugin)
                App.initHelpers(['slick','tags-inputs','datepicker', 'datetimepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'ckeditor',]);
            });
        </script>
    </body>
</html>