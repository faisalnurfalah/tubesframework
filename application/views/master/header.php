<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 1.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Materialize - Material Design Admin Template</title>

    <!-- Favicons-->
    <link rel="icon" href="<?= base_url() ?>assets/images/favicon/favicon-32x32.png" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?= base_url() ?>assets/images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="<?= base_url() ?>assets/images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->
    <link href="<?= base_url() ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url() ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?= base_url() ?>assets/js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url() ?>assets/js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="<?= base_url() ?>assets/js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">


</head>

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="cyan">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="index.html" class="brand-logo darken-1"><img src="images/materialize-logo.png" alt="materialize logo"></a> <span class="logo-text">Materialize</span></h1>
                    <ul class="right hide-on-med-and-down">
                        <li class="search-out">
                            <input type="text" class="search-out-text">
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-block waves-light show-search"><i class="mdi-action-search"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-social-notifications"></i></a>
                        </li>
                        <!-- Dropdown Trigger -->
                        <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                    <li class="user-details cyan darken-2">
                        <div class="row">
                            <div class="col col s4 m4 l4">
                                <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                            </div>
                            <div class="col col s8 m8 l8">
                                <ul id="profile-dropdown" class="dropdown-content">
                                    <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="mdi-action-lock-outline"></i> Lock</a>
                                    </li>
                                    <li><a href="#"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                    </li>
                                </ul>
                                <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">John Doe<i class="mdi-navigation-arrow-drop-down right"></i></a>
                                <p class="user-roal">Administrator</p>
                            </div>
                        </div>
                    </li>
                    <li class="bold"><a href="../assets/index.html" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="bold"><a href="../assets/app-email.html" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Mailbox <span class="new badge">4</span></a>
                    </li>
                    <li class="bold"><a href="../assets/app-calendar.html" class="waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Calender</a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-invert-colors"></i> CSS</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="../assets/css-typography.html">Typography</a>
                                        </li>
                                        <li><a href="../assets/css-icons.html">Icons</a>
                                        </li>
                                        <li><a href="../assets/css-shadow.html">Shadow</a>
                                        </li>
                                        <li><a href="../assets/css-media.html">Media</a>
                                        </li>
                                        <li><a href="../assets/css-sass.html">Sass</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-image-palette"></i> UI Elements</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="../assets/ui-buttons.html">Buttons</a>
                                        </li>
                                        <li><a href="../assets/ui-badges.html">Badges</a>
                                        </li>
                                        <li><a href="../assets/ui-cards.html">Cards</a>
                                        </li>
                                        <li><a href="../assets/ui-collections.html">Collections</a>
                                        </li>
                                        <li><a href="../assets/ui-accordions.html">Accordian</a>
                                        </li>
                                        <li><a href="../assets/ui-navbar.html">Navbar</a>
                                        </li>
                                        <li><a href="../assets/ui-pagination.html">Pagination</a>
                                        </li>
                                        <li><a href="../assets/ui-preloader.html">Preloader</a>
                                        </li>
                                        <li><a href="../assets/ui-modals.html">Modals</a>
                                        </li>
                                        <li><a href="../assets/ui-media.html">Media</a>
                                        </li>
                                        <li><a href="../assets/ui-toasts.html">Toasts</a>
                                        </li>
                                        <li><a href="../assets/ui-tooltip.html">Tooltip</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a href="../assets/app-widget.html" class="waves-effect waves-cyan"><i class="mdi-device-now-widgets"></i> Widgets <span class="new badge"></span></a>
                            </li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-border-all"></i> Tables</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="../assets/table-basic.html">Basic Tables</a>
                                        </li>
                                        <li><a href="../assets/table-data.html">Data Tables</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-editor-insert-comment"></i> Forms</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="../assets/form-elements.html">Form Elements</a>
                                        </li>
                                        <li><a href="../assets/form-layouts.html">Form Layouts</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-social-pages"></i> Pages</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="../assets/page-login.html">Login</a>
                                        </li>
                                        <li><a href="../assets/page-register.html">Register</a>
                                        </li>
                                        <li><a href="../assets/page-lock-screen.html">Lock Screen</a>
                                        </li>
                                        <li><a href="../assets/page-invoice.html">Invoice</a>
                                        </li>
                                        <li><a href="../assets/page-404.html">404</a>
                                        </li>
                                        <li><a href="../assets/page-500.html">500</a>
                                        </li>
                                        <li><a href="../assets/page-blank.html">Blank</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-chart"></i> Charts</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="../assets/charts-chartjs.html">Chart JS</a>
                                        </li>
                                        <li><a href="../assets/charts-chartist.html">Chartist</a>
                                        </li>
                                        <li><a href="../assets/charts-morris.html">Morris Charts</a>
                                        </li>
                                        <li><a href="../assets/charts-xcharts.html">xCharts</a>
                                        </li>
                                        <li><a href="../assets/charts-flotcharts.html">Flot Charts</a>
                                        </li>
                                        <li><a href="../assets/charts-sparklines.html">Sparkline Charts</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="li-hover">
                        <div class="divider"></div>
                    </li>
                    <li class="li-hover">
                        <p class="ultra-small margin more-text">MORE</p>
                    </li>
                    <li><a href="../assets/css-grid.html"><i class="mdi-image-grid-on"></i> Grid</a>
                    </li>
                    <li><a href="../assets/css-color.html"><i class="mdi-editor-format-color-fill"></i> Color</a>
                    </li>
                    <li><a href="../assets/css-helpers.html"><i class="mdi-communication-live-help"></i> Helpers</a>
                    </li>
                    <li><a href="../assets/changelogs.html"><i class="mdi-action-swap-vert-circle"></i> Changelogs</a>
                    </li>
                    <li class="li-hover">
                        <div class="divider"></div>
                    </li>
                    <li class="li-hover">
                        <p class="ultra-small margin more-text">Daily Sales</p>
                    </li>
                    <li class="li-hover">
                        <div class="row">
                            <div class="col s12 m12 l12">
                                <div class="sample-chart-wrapper">
                                    <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->



            <!-- //////////////////////////////////////////////////////////////////////////// -->
            <!-- START RIGHT SIDEBAR NAV-->
            <aside id="right-sidebar-nav">
                <ul id="chat-out" class="side-nav rightside-navigation">
                    <li class="li-hover">
                        <a href="#" data-activates="chat-out" class="chat-close-collapse right"><i class="mdi-navigation-close"></i></a>
                        <div id="right-search" class="row">
                            <form class="col s12">
                                <div class="input-field">
                                    <i class="mdi-action-search prefix"></i>
                                    <input id="icon_prefix" type="text" class="validate">
                                    <label for="icon_prefix">Search</label>
                                </div>
                            </form>
                        </div>
                    </li>
                    <li class="li-hover">
                        <ul class="chat-collapsible" data-collapsible="expandable">
                            <li>
                                <div class="collapsible-header teal white-text active"><i class="mdi-social-whatshot"></i>Recent Activity</div>
                                <div class="collapsible-body recent-activity">
                                    <div class="recent-activity-list chat-out-list row">
                                        <div class="col s3 recent-activity-list-icon"><i class="mdi-action-add-shopping-cart"></i>
                                        </div>
                                        <div class="col s9 recent-activity-list-text">
                                            <a href="#">just now</a>
                                            <p>Jim Doe Purchased new equipments for zonal office.</p>
                                        </div>
                                    </div>
                                    <div class="recent-activity-list chat-out-list row">
                                        <div class="col s3 recent-activity-list-icon"><i class="mdi-device-airplanemode-on"></i>
                                        </div>
                                        <div class="col s9 recent-activity-list-text">
                                            <a href="#">Yesterday</a>
                                            <p>Your Next flight for USA will be on 15th August 2015.</p>
                                        </div>
                                    </div>
                                    <div class="recent-activity-list chat-out-list row">
                                        <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                                        </div>
                                        <div class="col s9 recent-activity-list-text">
                                            <a href="#">5 Days Ago</a>
                                            <p>Natalya Parker Send you a voice mail for next conference.</p>
                                        </div>
                                    </div>
                                    <div class="recent-activity-list chat-out-list row">
                                        <div class="col s3 recent-activity-list-icon"><i class="mdi-action-store"></i>
                                        </div>
                                        <div class="col s9 recent-activity-list-text">
                                            <a href="#">Last Week</a>
                                            <p>Jessy Jay open a new store at S.G Road.</p>
                                        </div>
                                    </div>
                                    <div class="recent-activity-list chat-out-list row">
                                        <div class="col s3 recent-activity-list-icon"><i class="mdi-action-settings-voice"></i>
                                        </div>
                                        <div class="col s9 recent-activity-list-text">
                                            <a href="#">5 Days Ago</a>
                                            <p>Natalya Parker Send you a voice mail for next conference.</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header light-blue white-text active"><i class="mdi-editor-attach-money"></i>Sales Repoart</div>
                                <div class="collapsible-body sales-repoart">
                                    <div class="sales-repoart-list  chat-out-list row">
                                        <div class="col s8">Target Salse</div>
                                        <div class="col s4"><span id="sales-line-1"></span>
                                        </div>
                                    </div>
                                    <div class="sales-repoart-list chat-out-list row">
                                        <div class="col s8">Payment Due</div>
                                        <div class="col s4"><span id="sales-bar-1"></span>
                                        </div>
                                    </div>
                                    <div class="sales-repoart-list chat-out-list row">
                                        <div class="col s8">Total Delivery</div>
                                        <div class="col s4"><span id="sales-line-2"></span>
                                        </div>
                                    </div>
                                    <div class="sales-repoart-list chat-out-list row">
                                        <div class="col s8">Total Progress</div>
                                        <div class="col s4"><span id="sales-bar-2"></span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="collapsible-header red white-text"><i class="mdi-action-stars"></i>Favorite Associates</div>
                                <div class="collapsible-body favorite-associates">
                                    <div class="favorite-associate-list chat-out-list row">
                                        <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                        </div>
                                        <div class="col s8">
                                            <p>Eileen Sideways</p>
                                            <p class="place">Los Angeles, CA</p>
                                        </div>
                                    </div>
                                    <div class="favorite-associate-list chat-out-list row">
                                        <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                        </div>
                                        <div class="col s8">
                                            <p>Zaham Sindil</p>
                                            <p class="place">San Francisco, CA</p>
                                        </div>
                                    </div>
                                    <div class="favorite-associate-list chat-out-list row">
                                        <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                        </div>
                                        <div class="col s8">
                                            <p>Renov Leongal</p>
                                            <p class="place">Cebu City, Philippines</p>
                                        </div>
                                    </div>
                                    <div class="favorite-associate-list chat-out-list row">
                                        <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img online-user valign profile-image">
                                        </div>
                                        <div class="col s8">
                                            <p>Weno Carasbong</p>
                                            <p>Tokyo, Japan</p>
                                        </div>
                                    </div>
                                    <div class="favorite-associate-list chat-out-list row">
                                        <div class="col s4"><img src="images/avatar.jpg" alt="" class="circle responsive-img offline-user valign profile-image">
                                        </div>
                                        <div class="col s8">
                                            <p>Nusja Nawancali</p>
                                            <p class="place">Bangkok, Thailand</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <!-- LEFT RIGHT SIDEBAR NAV-->

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->
    <!-- START CONTENT -->
    <section id="content">

        <!--start container-->
        <div class="container">

            <!-- -->