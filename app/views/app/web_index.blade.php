<!DOCTYPE html>
<!--[if IE 9]>         <html class="ie9 no-focus"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-focus"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

            @if(Confide::user())
                <title>Welcome {{ Confide::user()->username }}!</title>
            @endif
            @if(!Confide::user())
                <title>Beezmode Solutions</title>
            @endif

        <meta name="description" content="OneUI - Admin Dashboard Template &amp; UI Framework created by pixelcave and published on Themeforest">
        <meta name="author" content="pixelcave">
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
          <link rel="shortcut icon" href="{{asset('fav.ico')}}">

      <!--   <link rel="icon" type="image/png" href="assets/img/favicons/favicon-16x16.png" sizes="16x16">
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
            'header-navbar-transparent'  Enables a transparent header (if also fixed, it will get a solid dark background color on scrolling)
        -->
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
                                    <a href="{{URL::to('/')}}"><i class="si si-home"></i><span class="sidebar-mini-hide">Home</span></a>
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
                                    @if(Confide::user())
                                        <a href="{{URL::to('users/logout')}}"><i class="si si-logout"></i><span class="sidebar-mini-hide">Logout</span></a>
                                    @endif
                                    @if(!Confide::user())
                                    <a href="{{URL::to('users/login')}}"><i class="si si-pencil"></i><span class="sidebar-mini-hide">Login</span></a>
                                    @endif
                                </li>
                                <li>
                                    @if(Confide::user())
                                    <a href="{{URL::to('users/create')}}" style="display:none;"><i class="si si-users"></i><span class="sidebar-mini-hide">Register</span></a>
                                    @endif
                                    @if(!Confide::user())
                                    <a href="{{URL::to('users/create')}}"><i class="si si-users"></i><span class="sidebar-mini-hide">Register</span></a>
                                    @endif
                                </li>
                                <li>
                                    <a href="{{URL::to('/features')}}"><i class="si si-energy"></i><span class="sidebar-mini-hide">Features</span></a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/pricing')}}"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Pricing</span></a>
                                </li>
                                <li>
                                    <a href="{{URL::to('/contact')}}"><i class="si si-envelope-open"></i><span class="sidebar-mini-hide">Contact</span></a>
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
            </header>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero Content -->
                <div class="bg-image" style="background-image: url('assets/img/various/hero1.jpg');">
                    <div class="bg-primary-dark-op">
                        <section class="content content-full content-boxed overflow-hidden">
                            <!-- Section Content -->
                            <div class="push-100-t push-50 text-center">
                                <h1 class="h2 text-white push-10 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">Make Beezmode as your Business Back Office.</h1>
                                <h2 class="h5 text-white-op push-50 visibility-hidden" data-toggle="appear" data-class="animated fadeInDown">Dynamic, Customizable and User-Friendly UI Framework that works for you. Efficient way in managing your business.</h2>
                                <a class="btn btn-rounded btn-noborder btn-lg btn-primary visibility-hidden" data-toggle="appear" data-class="animated bounceIn" data-timeout="800" href="/pricing">Buy Beezmode Cloud-Based System</a>
                            </div>
                            <div class="row visibility-hidden" data-toggle="appear" data-class="animated fadeInUp">
                                <div class="col-sm-8 col-sm-offset-2">
                                    <img class="img-responsive pull-b" src="assets/img/various/promo1.jpg" alt="">
                                </div>
                            </div>
                            <!-- END Section Content -->
                        </section>
                    </div>
                </div>
                <!-- END Hero Content -->

                <!-- Classic Features #1 -->
                <div class="bg-white">
                    <section class="content content-boxed">
                        <!-- Section Content -->
                        <div class="row items-push-3x push-50-t nice-copy">
                            <div class="col-sm-4">
                                <div class="text-center push-30">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-rocket"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Powerful and Dynamic</h3>
                                <p>Beezmode Cloud-Based System (Powered by Beezmode Solutions) is a sleek, intuitive, and powerful mobile ready front-end framework for faster and easier web business management.</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center push">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-screen-smartphone"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Fully Responsive</h3>
                                <p>Beezmode will adjust to any screen size. It will look great on mobile devices, tablets and desktops at the same time. You can manage your business on your mobile devices.</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center push">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-clock"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Save time</h3>
                                <p>Beezmode will help you save time from manual management of your business. You will have less business issues since this system will serve as your automated back office that includes tabulation and processing.</p>
                            </div>
                        </div>
                        <div class="row items-push-3x nice-copy">
                            <div class="col-sm-4">
                                <div class="text-center push">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-check"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Efficiency</h3>
                                <p>Beezmode offers allot of maximized management design to make use of automization at its full extent. Beezmode is also capable of handling not only the business but also the roles of people involve with the business. </p>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center push-30">
                                    <span class="item item-2x item-circle border"><i class="si si-lock"></i></span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Security</h3>
                                <p>Beezmode has remarkable security features to ensure that all the data involving your business is secured.</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center push">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-speedometer"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Speed</h3>
                                <p>This system has the capability to adjust on what medium of technology the user uses to access. Beezmode will ensure speed and quality in business processing and back office management.</p>
                            </div>
                        </div>
                        <!-- END Section Content -->
                    </section>
                </div>
                <!-- END Classic Features #1 -->

                <!-- Mini Stats -->
                <div class="bg-gray-lighter">
                    <section class="content content-boxed">
                        <!-- Section Content -->
                        <div class="row items-push push-20-t push-20 text-center">
                            <div class="col-sm-4">
                                <div class="h1 push-5" data-toggle="countTo" data-to="15760" data-after="+"></div>
                                <div class="font-w600 text-uppercase text-muted">Accounts Today</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="h1 push-5" data-toggle="countTo" data-to="3890" data-after="+"></div>
                                <div class="font-w600 text-uppercase text-muted">Products</div>
                            </div>
                            <div class="col-sm-4">
                                <div class="h1 push-5" data-toggle="countTo" data-to="890" data-after="+"></div>
                                <div class="font-w600 text-uppercase text-muted">Web Apps</div>
                            </div>
                        </div>
                        <!-- END Section Content -->
                    </section>
                </div>
                <!-- END Mini Stats -->

                <!-- Classic Features #2 -->
                <div class="bg-white">
                    <section class="content content-boxed">
                        <!-- Section Content -->
                        <div class="row items-push-3x push-50-t nice-copy">
                            <div class="col-sm-4">
                                <div class="text-center push-30">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-compass"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Cross Browser Support</h3>
                                <p>Beezmode will run nice with all modern browsers such as Chrome, Firefox, Safari, Opera and the latest versions of Internet Explorer (9 and up).</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center push">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-book-open"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Documentation</h3>
                                <p>Documentations like comes packed with a great documentation which covers all the basics to get you familiar with template’s structure and files. It is the best way to get started.</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center push">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-rocket"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">All-In-One</h3>
                                <p>We aim to make your back office an All-in-one system for your business. Combining your Account/Finance, Sales, Inventory, Warehousing, and reports in a syngle Cloud-Based System.</p>
                            </div>
                        </div>
                        <div class="row items-push-3x nice-copy">
                            <div class="col-sm-4">
                                <div class="text-center push-30">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-wrench"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Components</h3>
                                <p>Beezmode Cloud-Based System comes packed with so many unique components. Carefully picked and integrated to enhance and enrich your Business Back Office with great functionality. Use them anywhere you want.</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center push">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-support"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Support</h3>
                                <p>By purchasing a license of Beezmode, you are eligible to email support. Should you get stuck somewhere or come accross any issue, don’t worry because we at Beezmode Solutions is here to provide assistance.</p>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center push">
                                    <span class="item item-2x item-circle border">
                                        <i class="si si-heart"></i>
                                    </span>
                                </div>
                                <h3 class="h5 font-w600 text-uppercase text-center push-10">Crafted With Passion and Love</h3>
                                <p>We at Beezmode Solution would love to make your business ventures as enjoyable as possible. To passionately empower your business experience efficiently, and most of all with love.</p>
                            </div>
                        </div>
                        <!-- END Section Content -->
                    </section>
                </div>
                <!-- END Classic Features #2 -->

                <!-- Ratings -->
                <div class="bg-image" style="background-image: url('assets/img/photos/photo3@2x.jpg');">
                    <div class="bg-primary-dark-op">
                        <section class="content content-full content-boxed">
                            <!-- Section Content -->
                            <div class="row items-push-2x push-50-t text-center">
                                <div class="col-sm-4 visibility-hidden" data-toggle="appear" data-offset="-150">
                                    <img class="img-avatar img-avatar-thumb" src="assets/img/avatars/avatar4.jpg" alt="">
                                    <div class="text-warning push-10-t push-15">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                    </div>
                                    <div class="h4 text-white-op push-5">Professional design in a reliable UI framework! A pure joy to work with!</div>
                                    <div class="h6 text-gray">- Rene Bernaldez</div>
                                </div>
                                <div class="col-sm-4 visibility-hidden" data-toggle="appear" data-offset="-150" data-timeout="150">
                                    <img class="img-avatar img-avatar-thumb" src="assets/img/avatars/avatar11.jpg" alt="">
                                    <div class="text-warning push-10-t push-15">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                    </div>
                                    <div class="h4 text-white-op push-5">Awesome support! Our Web Application looks and works great!</div>
                                    <div class="h6 text-gray">- Jun Basa</div>
                                </div>
                                <div class="col-sm-4 visibility-hidden" data-toggle="appear" data-offset="-150" data-timeout="300">
                                    <img class="img-avatar img-avatar-thumb" src="assets/img/avatars/avatar8.jpg" alt="">
                                    <div class="text-warning push-10-t push-15">
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                        <i class="fa fa-fw fa-star"></i>
                                    </div>
                                    <div class="h4 text-white-op push-5">Incredible value for money, highly recommended!</div>
                                    <div class="h6 text-gray">- Zarah Gaum</div>
                                </div>
                            </div>
                            <!-- END Section Content -->
                        </section>
                    </div>
                </div>
                <!-- END Ratings -->

                <!-- Get Started -->
                <div class="bg-gray-lighter">
                    <section class="content content-full content-boxed">
                        <!-- Section Content -->
                        <div class="push-20-t push-20 text-center">
                            <h3 class="h4 push-20 visibility-hidden" data-toggle="appear">Powerful Cloud-Based System for your Complex Business Process.</h3>
                            <a class="btn btn-rounded btn-noborder btn-lg btn-success visibility-hidden" data-toggle="appear" data-class="animated bounceIn" href="/pricing">Get Started Today</a>
                        </div>
                        <!-- END Section Content -->
                    </section>
                </div>
                <!-- END Get Started -->
            </main>
            <!-- END Main Container -->

            <!-- Footer -->
            <footer id="page-footer" class="bg-white">
                <div class="content content-boxed">
                    <!-- Footer Navigation -->
                    <div class="row push-30-t items-push-2x">
                        <div class="col-sm-4">
                            <h3 class="h5 font-w600 text-uppercase push-20">Company</h3>
                            <ul class="list list-simple-mini font-s13">
                                <li>
                                    <a class="font-w600" href="{{URL::to('/')}}">Home</a>
                                </li>
                                <li>
                                    <a class="font-w600" href="{{URL::to('/features')}}">Features</a>
                                </li>
                                <li>
                                    <a class="font-w600" href="{{URL::to('/pricing')}}">Pricing</a>
                                </li>
{{--                                 <li>
                                    <a class="font-w600" href="frontend_about.html">About Us</a>
                                </li> --}}
                                <li>
                                    <a class="font-w600" href="{{URL::to('/contact')}}">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <h3 class="h5 font-w600 text-uppercase push-20">Support</h3>
                            <ul class="list list-simple-mini font-s13">
                                @if(Confide::user())
                                <li>
                                    <a class="font-w600" href="{{URL::to('users/logout')}}">Log Out</a>
                                </li>
                                @endif
                                @if(!Confide::user())
                                <li>
                                    <a class="font-w600" href="{{URL::to('users/login')}}">Log In</a>
                                </li>
                                @endif
                                <li>
                                    <a class="font-w600" href="{{URL::to('users/create')}}">Sign Up</a>
                                </li>
                                {{-- <li>
                                    <a class="font-w600" href="frontend_support.html">Support Center</a>
                                </li>
                                <li>
                                    <a class="font-w600" href="javascript:void(0)">Privacy Policy</a>
                                </li>
                                <li>
                                    <a class="font-w600" href="javascript:void(0)">Terms &amp; Conditions</a>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <h3 class="h5 font-w600 text-uppercase push-20">Get In Touch</h3>
                            <div class="font-s13 push">
                                <strong>BeezMode Solutions</strong><br>
                                M Place - Tower D,<br>
                                Panay Ave,<br>
                                Quezon City, PH<br>
                                <abbr title="Phone">P:</abbr> (02) 242-7958
                            </div>
                            <div class="font-s13">
                                <i class="si si-envelope-open"></i> biz.mode.noreply@gmail.com
                            </div>
                        </div>
                    </div>
                    <!-- END Footer Navigation -->

                    <!-- Copyright Info -->
                    <div class="font-s12 push-20 clearfix">
                        <hr class="remove-margin-t">
                        <div class="pull-right">
                            <span class="js-year-copy"></span>
                        </div>
                        <div class="pull-left">
                            <a class="font-w600" href="web_index" target="_blank">Beezmode Solutions</a> &copy; All Rights Reserved
                        </div>
                    </div>
                    <!-- END Copyright Info -->
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

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

        <!-- Page JS Code -->
        <script>
            jQuery(function () {
                // Init page helpers (Appear + CountTo plugins)
                App.initHelpers(['appear', 'appear-countTo']);
            });
        </script>
    </body>
</html>