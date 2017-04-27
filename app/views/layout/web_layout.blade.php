<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>{{$title}}</title>

        <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{asset('fav.ico')}}">

        <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
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
        <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon-180x180.png">

        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">

        <!-- Bootstrap and OneUI CSS framework -->
        <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css"> -->
        {{HTML::style("assets/css/bootstrap.min.css")}}
        <!-- <link rel="stylesheet" id="css-main" href="assets/css/oneui.css"> -->
        {{HTML::style("assets/css/oneui.css")}}
        <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
        {{HTML::script("assets/js/core/jquery.min.js")}}

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
                            <a class="h5 text-white" href="/">
                               <img src="{{asset('img/logotrans2.png')}}" style="width:10%;"> <!-- <i class="fa fa-circle-o-notch text-primary"></i> --> <span class="h4 font-w600 sidebar-mini-hide">eezMode</span>
                            </a>
                        </div>
                        <!-- END Side Header -->

                        <!-- Side Content -->
                        <div class="side-content">
                            <ul class="nav-main">
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
                                    <a href="/users/login"><i class="si si-pencil"></i><span class="sidebar-mini-hide">Login</span></a>
                                </li>
                                <li>
                                    <a href="/users/create"><i class="si si-users"></i><span class="sidebar-mini-hide">Register</span></a>
                                </li>
                                <li>
                                    <a href="/features"><i class="si si-energy"></i><span class="sidebar-mini-hide">Features</span></a>
                                </li>
                                <li>
                                    <a href="/pricing"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Pricing</span></a>
                                </li>
                                <li>
                                    <a href="/contact"><i class="si si-envelope-open"></i><span class="sidebar-mini-hide">Contact</span></a>
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
        @yield('content')
        <!-- END Login Content -->

        <!-- Login Footer -->
        <div class="pulldown push-30-t text-center animated fadeInUp">
            <small class="text-muted"><span class="js-year-copy"></span> &copy; Beezmode Solutions</small>
        </div>
        <!-- END Login Footer -->

        
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

        <!-- Page JS Plugins -->
        <!-- <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script> -->

        <!-- Page JS Code -->
        <!-- <script src="assets/js/pages/base_pages_login.js"></script> -->
    </body>
</html>