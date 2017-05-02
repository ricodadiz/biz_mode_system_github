<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Company List - Beezmode</title>

        <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{asset('fav.ico')}}">

       <!--  <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
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
      <!--   <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700"> -->

        <!-- Bootstrap and OneUI CSS framework -->
        <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
        {{HTML::style("assets/css/bootstrap.min.css")}}
        <!-- <link rel="stylesheet" id="css-main" href="assets/css/oneui.css"> -->
        {{HTML::style("assets/css/oneui.css")}}

        <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
        <!-- <link rel="stylesheet" id="css-theme" href="assets/css/themes/flat.min.css"> -->
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container" class="sidebar-l sidebar-mini sidebar-o side-scroll header-navbar-fixed header-navbar-transparent">
            <!-- Sidebar -->
            <nav id="sidebar">
                <!-- Sidebar Scroll Container -->
                <div id="sidebar-scroll">
                    <!-- Sidebar Content -->
                    <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                    <div class="sidebar-content">
                        <!-- Side Header -->
                        <div class="side-header side-content">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-gray pull-right visible-xs visible-sm" type="button" data-toggle="layout" data-action="sidebar_close">
                                <i class="fa fa-times"></i>
                            </button>
                            <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                            <div class="btn-group pull-right visible-md visible-lg">
                                <!-- <button class="btn btn-link text-gray dropdown-toggle" data-toggle="dropdown" type="button">
                                    <i class="si si-drop"></i>
                                </button>
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
                                </ul> -->
                            </div>
                            <a class="h5 text-white" href="{{URL::to('/')}}">
                               <img src="{{asset('img/logotrans2.png')}}" style="width:10%;"> <!-- <i class="fa fa-circle-o-notch text-primary"></i> --> <span class="h4 font-w600 sidebar-mini-hide">eezMode</span>
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
                             @if(Confide::user())
                                <li>
                                    <a href="{{URL::to('/company')}}"><i class="si si-user"></i><span class="sidebar-mini-hide">Welcome, {{ Confide::user()->username }}!</span></a>

                                </li>
                                @endif
                                <li class="open">
                                    <a href="/"><i class="si si-home"></i><span class="sidebar-mini-hide">Home</span></a>
                                    <!-- 
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-home"></i><span class="sidebar-mini-hide">Home</span></a>
                                    <ul>
                                        <li>
                                            <a class="active" href="frontend_home.html">Default Navigation</a>
                                        </li>
                                        <li>
                                            <a href="frontend_home_header_nav.html">Header Navigation</a>
                                        </li>
                                    </ul>

                                    -->
                                </li>
                                <li>
                                    <a href="{{URL::to('users/logout')}}"><i class="si si-logout"></i><span class="sidebar-mini-hide">Logout</span></a>
                                </li>
                                <li>
                                    <a href="{{URL::to('features')}}"><i class="si si-energy"></i><span class="sidebar-mini-hide">Features</span></a>
                                </li>
                                <li>
                                    <a href="{{URL::to('pricing')}}"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Pricing</span></a>
                                </li>
                                <li>
                                    <a href="{{URL::to('contact')}}"><i class="si si-envelope-open"></i><span class="sidebar-mini-hide">Contact</span></a>
                                </li>
<!--                                 <li>
                                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bag"></i><span class="sidebar-mini-hide">e-Commerce</span></a>
                                    <ul>
                                        <li>
                                            <a href="frontend_ecom_home.html">Home</a>
                                        </li>
                                        <li>
                                            <a href="frontend_ecom_search.html">Search Results</a>
                                        </li>
                                        <li>
                                            <a href="frontend_ecom_products.html">Products List</a>
                                        </li>
                                        <li>
                                            <a href="frontend_ecom_product.html">Product Page</a>
                                        </li>
                                        <li>
                                            <a href="frontend_ecom_checkout.html">Checkout</a>
                                        </li>
                                    </ul>
                                </li> -->
                                <!-- <li class="nav-main-heading"><span class="sidebar-mini-hide">Apps</span></li>
                                <li>
                                    <a href="index.html"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Backend</span></a>
                                </li> -->
                            </ul>
                        </div>
                        <!-- END Side Content -->
                    </div>
                    <!-- Sidebar Content -->
                </div>
                <!-- END Sidebar Scroll Container -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="header-navbar" class="content-mini content-mini-full hidden-md hidden-lg">
                <div class="content-boxed">
                    <!-- Header Navigation Right -->
                    <ul class="nav-header pull-right">
                        <li>
                            <!-- Themes functionality initialized in App() -> uiHandleTheme() -->
                            <div class="btn-group">
                                <button class="btn btn-link text-white dropdown-toggle" data-toggle="dropdown" type="button">
                                    <i class="si si-drop"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right sidebar-mini-hide font-s13">
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
                        </li>
                        <li>
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-link text-white pull-right" type="button" data-toggle="layout" data-action="sidebar_open">
                                <i class="fa fa-navicon"></i>
                            </button>
                        </li>
                    </ul>
                    <!-- END Header Navigation Right -->

                    <!-- Header Navigation Left -->
                    <ul class="nav-header pull-left">
                        <li class="header-content">
                            <a class="h5" href="frontend_home.html">
                                <img src="{{asset('img/logotrans2.png')}}" style="width:28px;">
                                <!-- <i class="fa fa-circle-o-notch text-primary"></i> --> <span class="h4 font-w600 text-white">eezMode</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END Header Navigation Left -->
                </div>
            </div>
        </header>
        <!-- END Header -->

        <!-- Login Content -->
        <div class="main-container">
            <div class="container">
                <!-- Page Header -->
                <!-- <div class="content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-sm-7">
                            <h1 class="page-heading">
                                Draggable Blocks <small>Interactive and easy to set up.</small>
                            </h1>
                        </div>
                        <div class="col-sm-5 text-right hidden-xs">
                            <ol class="breadcrumb push-10-t">
                                <li>UI Elements</li>
                                <li>Blocks</li>
                                <li><a class="link-effect" href="">Draggable</a></li>
                            </ol>
                        </div>
                    </div>
                </div> -->
                <!-- END Page Header -->
                <!-- Page Content -->
                <div class="content">
                
                    <br><br>

                    @if(Confide::user()->can("add_company") || Confide::user()->company_code == 'owner')
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="block">
                                        <div class="block-header">
                                            <ul class="block-options">
                                                <li>
                                                    <button type="button"><i class="si si-settings"></i></button>
                                                </li>
                                            </ul>
                                            <h3 class="block-title">Company Options</h3>
                                        </div>
                                        <div class="block-content block-content-narrow">
                                            @if (Session::get('error'))
                                                <div class="alert alert-error alert-danger">
                                                @foreach(Session::get('error')->all() as $message)
                                                {{$message}}<br>
                                                 @endforeach
                                                </div>
                                            @endif
                                            
                                            @if (Session::get('message_success'))
                                                <div class="alert alert-success">
                                                    {{Session::get('message_success')["message"]}}
                                                 </div>
                                            @endif
                                            <form id="add_company_form" action="add_company" method="post">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input class="form-control" type="text" id="company_txt" name="company_name" placeholder="Company Name" required>

                                                        <input class="form-control" type="number" id="company_txt2" name="company_code" placeholder="Company Code" required>

                                                        <span class="input-group-btn">
                                                            <input class="btn btn-default" id="submit_add_company_form_btn" type="submit" name="ADD" disabled>
                                                        </span>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>      
                        </div>
                    @endif
                        <!-- Draggable Items with jQueryUI (.js-draggable-items class is initialized in App() -> uiHelperDraggableItems()) -->
                        <!-- For more info and examples you can check out https://jqueryui.com/sortable/ -->
                        <div class="row js-draggable-items">
                            <div class="col-sm-12 draggable-column">
                            @if(count($drag_order) < 1)
                                @foreach($companies as $c)
                                    <!-- Block -->
                                <div class="media">
                                    <div class="block draggable-item" id="drag_order_{{$c->id}}">
                                                    @if (Session::get('message_update')["id"] == $c->id)
                                                        <div class="alert alert-error alert-success">{{{ Session::get('message_update')["message"] }}}</div>
                                                    @endif
                                        <div class="block-header">
                                            <ul class="block-options">
                                                    <a href="dashboard/{{$c->id}}"><button class="btn btn-primary">Proceed</button></a>
                                                    @if(Confide::user()->can('edit_company') || Confide::user()->company_code == 'owner')
                                                        <button onclick="show_update({{$c->id}})" class="btn btn-default btn-success" id="submit_edit_company_form_btn_{{$c->id}}">
                                                            Update
                                                        </button>
                                                    @endif
                                                    @if(Confide::user()->can('delete_company') || Confide::user()->company_code == 'owner')
                                                    <button data-toggle="modal" data-target="#delete-modal-small-{{$c->id}}" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                                    @endif
                                                    
                                                <li>
                                                    <span class="draggable-handler text-gray"><i class="si si-cursor-move"></i></span>
                                                </li>
                                            </ul>
                                            <div class="media-left">
                                                @if($c->company_photo === NULL)
                                                    <img src="{{asset('assets/img/avatars/company.png')}}" class="img-avatar img-avatar96 img-avatar-thumb" alt="">
                                                @else
                                                    <img src="{{$c->company_photo}}" class="img-avatar img-avatar96 img-avatar-thumb">
                                                @endif
                                            </div>
                                                <div class="media-body">
                                                    <h3>{{$c->company_name}}</h3>
                                                    <span>Created: {{$c->created_at}}</span>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="block-content">
                                            <p>
                                                <form id="update_form_{{$c->id}}" class="form-inline" action="update_company/{{$c->id}}" method="post" style="display:none;">
                                                    <div class="form-group">
                                                        <input class="form-control" type="text" id="example-if-password" name="company_name" value="{{$c->company_name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <button class="btn btn-success" type="submit">Save Update</button>
                                                    </div>
                                                </form> 
                                            </p>

                                        </div>
                                </div>

                                        <div class="modal" id="delete-modal-small-{{$c->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="block block-themed block-transparent remove-margin-b">
                                                        <div class="block-header bg-primary-dark">
                                                            <ul class="block-options">
                                                                <li>
                                                                    <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                                </li>
                                                            </ul>
                                                            <h3 class="block-title">Confirm Delete Company</h3>
                                                        </div>
                                                        <div class="block-content">
                                                            <p>You are about to delete a company named: <br><h4>{{$c->company_name}}</h4></p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                                                        <a href="delete_company/{{$c->id}}">
                                                            <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i> Yes
                                                            </button> 
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- END Block -->
                                @endforeach    
                            @else
                                @foreach($drag_order as $d)
                                    @foreach($companies as $c)
                                        @if($d->company_id == $c->id)
                                        <!-- Block -->
                                        <div class="media">
                                            <div class="block draggable-item" id="drag_order_{{$c->id}}">
                                                        @if (Session::get('message_update')["id"] == $c->id)
                                                            <div class="alert alert-error alert-success">{{{ Session::get('message_update')["message"] }}}</div>
                                                        @endif
                                            <div class="block-header">
                                                <ul class="block-options">
                                                        <a href="dashboard/{{$c->id}}"><button class="btn btn-primary">Proceed</button></a>
                                                        @if(Confide::user()->can('edit_company') || Confide::user()->company_code == 'owner')
                                                        <button onclick="show_update({{$c->id}})" class="btn btn-default btn-success" id="submit_edit_company_form_btn_{{$c->id}}">
                                                            Update
                                                        </button>
                                                        @endif
                                                        @if(Confide::user()->can('delete_company') || Confide::user()->company_code == 'owner')
                                                        <button data-toggle="modal" data-target="#delete-modal-small-{{$c->id}}" class="btn btn-danger">
                                                            Delete
                                                        </button>
                                                        @endif
                                                        
                                                    <li>
                                                        <span class="draggable-handler text-gray"><i class="si si-cursor-move"></i></span>
                                                    </li>
                                                </ul>
                                            <div class="media-left">
                                                @if($c->company_photo === NULL)
                                                    <img src="{{asset('assets/img/avatars/company.png')}}" class="img-avatar img-avatar96 img-avatar-thumb" alt="">
                                                @else
                                                    <img src="{{$c->company_photo}}" class="img-avatar img-avatar96 img-avatar-thumb">
                                                @endif
                                            </div>
                                                <div class="media-body">
                                                    <h3>{{$c->company_name}}</h3>
                                                    <span>Created: {{$c->created_at}}</span>
                                                </div>

                                            </div>
                                            <div class="block-content">
                                                <p>
                                                    
                                                    <form id="update_form_{{$c->id}}" class="form-inline" action="update_company/{{$c->id}}" method="post" style="display:none;">
                                                        <div class="form-group">
                                                            <input class="form-control" type="text" id="example-if-password" name="company_name" value="{{$c->company_name}}"> 
                                                        </div>
                                                        <div class="form-group">
                                                            <button class="btn btn-success" type="submit">Save Update</button>
                                                        </div>
                                                    </form> 
                                                </p>

                                            </div>
                                        </div>

                                            <div class="modal" id="delete-modal-small-{{$c->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-sm">
                                                    <div class="modal-content">
                                                        <div class="block block-themed block-transparent remove-margin-b">
                                                            <div class="block-header bg-primary-dark">
                                                                <ul class="block-options">
                                                                    <li>
                                                                        <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                                                    </li>
                                                                </ul>
                                                                <h3 class="block-title">Confirm Delete Company</h3>
                                                            </div>
                                                            <div class="block-content">
                                                                <p>You are about to delete a company named: <br><h4>{{$c->company_name}}</h4></p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                                                            <a href="delete_company/{{$c->id}}">
                                                                <button class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i> Yes
                                                                </button> 
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- END Block -->
                                        @endif
                                    @endforeach     
                                @endforeach
                            @endif
                            
                            </div>
                        </div>
                        <!-- END Draggable Items with jQueryUI -->
              
                </div>
                <!-- END Page Content -->
                
            </div>

            
        </div>
        <!-- END Login Content -->

        <!-- Login Footer -->
       {{--  <div class="pulldown push-30-t text-center animated fadeInUp">
            <small class="text-muted"><span class="js-year-copy"></span> &copy; Beezmode Solutions</small>
        </div> --}}
        <!-- END Login Footer -->
         <div class="modal" id="modal-small" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="block block-themed block-transparent remove-margin-b">
                            <div class="block-header bg-primary-dark">
                                <ul class="block-options">
                                    <li>
                                        <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                    </li>
                                </ul>
                                <h3 class="block-title">Confirm Add Company</h3>
                            </div>
                            <div class="block-content">
                                You are about to add a company named: <br><h4 id="render_company_name"></h4>
                            </div>
                            <div class="block-content">
                                You are about to add a company code: <br><h4 id="render_company_code"></h4>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">No</button>
                            <button id="submit_add_company_form" class="btn btn-sm btn-primary" type="button"><i class="fa fa-check"></i> Yes
                            </button>
                        </div>
                    </div>
                </div>
        </div>
        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        {{HTML::script("assets/js/core/jquery.min.js")}}
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

        {{HTML::script("assets/js/plugins/jquery-ui/jquery-ui.min.js")}}
        <script>
            jQuery(function () {
                // Init page helpers (jQueryUI)
                App.initHelpers('draggable-items');
            });
        </script>
        <script type="text/javascript">
            var submit_flag = 0;
            $('#company_txt').keyup(function(event) {
                if($(this).val() != "")
                {
                    $('#submit_add_company_form_btn').removeAttr('disabled');
                }
                else
                {
                    $('#submit_add_company_form_btn').prop('disabled', true);
                    $('#submit_add_company_form_btn').parent().parent().toggleClass('has-error');
                }
            });
            $('#company_txt2').keyup(function(event) {
                if($(this).val() != "")
                {
                    $('#submit_add_company_form_btn').removeAttr('disabled');
                }
                else
                {
                    $('#submit_add_company_form_btn').prop('disabled', true);
                    $('#submit_add_company_form_btn').parent().parent().toggleClass('has-error');
                }
            });
            $('.js-draggable-items > .draggable-column').sortable({
                update : function(event,ui){
                    data_to_pass = $(this).sortable("serialize");
                    console.log(data_to_pass);
                    $.ajax({
                        url: 'company_drag_order',
                        type: 'POST',
                        data: data_to_pass,
                    });
                }
            });
            function change_text(){
                $('#render_company_name').text($('#company_txt').val());
                $('#render_company_code').text($('#company_txt2').val());
                $("#modal-small").modal('show');
            }

            /*$('#add_company_form').keypress(function(e){
                 if(e.which == 13) {
                    if($(this).val() != "")
                    {
                       change_text();
                       alert();
                    }
                    else
                    {
                        alert(1);
                       $('#submit_add_company_form_btn').addClass('has-error');
                        
                    }
                    
                }     
            });*/

            $('#submit_add_company_form_btn').click(function() {
                    change_text();
            });

            $('#add_company_form').submit(function(e) {
                if(submit_flag == 1){
                    return;
                }
                else{
                    $("#submit_add_company_form").focus();
                    e.preventDefault();
                }
            });

            $('#submit_add_company_form').click(function(){
                submit_flag = 1;
                $('#add_company_form').submit();
            });

            function show_update(id){   
                $('#update_form_'+id).toggle('slow');
            }

            

        </script>
        <!-- Page JS Plugins -->
        <!-- <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script> -->

        <!-- Page JS Code -->
        <!-- <script src="assets/js/pages/base_pages_login.js"></script> -->
    </body>
</html>