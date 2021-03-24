<?php

	session_start();
	if(!isset($_SESSION['sesion_correo_usuario']))
	{
		header('Location: ../login/index.php');
	}

?>


<!doctype html>
<html class="fixed">

<head>

    <!-- Basic -->
    <meta charset="UTF-8">

    <title>Comercializadora Los Chinitos</title>
    <meta name="keywords" content="HTML5 Admin Template" />
    <meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
    <meta name="author" content="JSOFT.net">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- Web Fonts  -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

    <!-- Specific Page Vendor CSS -->
    <link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
    <link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/vendor/morris/morris.css" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/stylesheets/theme.css" />

    <!-- Skin CSS -->
    <link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/stylesheets/skins/default.css" />

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="../Plantilla/octopus/octopus/assets/stylesheets/theme-custom.css">

    <!-- Head Libs -->
    <script src="../Plantilla/octopus/octopus/assets/vendor/modernizr/modernizr.js"></script>

</head>

<body>
    <section class="body">
        <!-- start: header -->
        <header class="header">
            <div class="logo-container">
                <a href="../" class="logo">
                    <img src="../Plantilla/octopus/octopus/assets/images/logo.png" height="35" alt="JSOFT Admin" />
                </a>
                <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>

            <div class="header-right">
                <span class="separator"></span>

                <div id="userbox" class="userbox">
                    <a href="#" data-toggle="dropdown">
                        <figure class="profile-picture">
                            <img src="../Plantilla/octopus/octopus/assets/images/user.png" alt="Joseph Doe" class="img-circle" data-lock-picture="../Plantilla/octopus/octopus/assets/images/!logged-user.jpg" />
                        </figure>
                        <div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@JSOFT.com">
                            <span class="name"><?php echo $_SESSION['sesion_nombres_usuario'] ?></span>
                            <span class="role"><?php echo $_SESSION['sesion_perfil_usuario'] ?></span>
                        </div>
                        <i class="fa custom-caret"></i>
                    </a>

                    <div class="dropdown-menu">
                        <ul class="list-unstyled">
                            <li class="divider"></li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="pages-user-profile.html"><i class="fa fa-user"></i> My Profile</a>
                            </li>
                            <li>
                                <a role="menuitem" tabindex="-1" href="../controlador/logout.php"><i class="fa fa-power-off"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- end: search & user box -->
        </header>
        <!-- end: header -->

        <div class="inner-wrapper">
            <!-- start: sidebar -->
            <aside id="sidebar-left" class="sidebar-left">

                <div class="sidebar-header">
                    <div class="sidebar-title">
                        <h4 style="color: white;">Menú</h4>
                    </div>
                    <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
                        <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                    </div>
                </div>

                <div class="nano">
                    <div class="nano-content">
                        <nav id="menu" class="nav-main" role="navigation">
                            <ul class="nav nav-main" id="menu_principal">
                                <li class="nav-active">
                                    <a href="#">
                                        <i class="fa fa-home" aria-hidden="true"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="nav-parent" id="menu_personal" style="display: none;">
                                    <a href="#">
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        <span>Personal</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a href="#">
                                                <i class="fa fa-columns" ></i>
                                                <span>Administración tablas</span>
                                            </a>
                                            <ul class="nav nav-children" id="menu_personal_tablas" style="display: none;">
                                                
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-gears"></i>
                                                Procesos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-file-pdf-o"></i>
                                                Reportes
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent" id="menu_comercializacion" style="display: none;">
                                    <a href="#">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span>Comercialización</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a href="#">
                                                <i class="fa fa-columns" ></i>
                                                <span>Administración tablas</span>
                                            </a>
                                            <ul class="nav nav-children" id="menu_comercializacion_tablas" style="display: none;">
                                                
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-gears"></i>
                                                Procesos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-file-pdf-o"></i>
                                                Reportes
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent" id="menu_finanzas" style="display: none;">
                                    <a href="#">
                                        <i class="fa fa-money" aria-hidden="true"></i>
                                        <span>Finanzas</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a href="#">
                                                <i class="fa fa-columns" ></i>
                                                <span>Administración tablas</span>
                                            </a>
                                            <ul class="nav nav-children" id="menu_finanzas_tablas" style="display: none;">
                                                
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-gears"></i>
                                                Procesos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-file-pdf-o"></i>
                                                Reportes
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-parent" id="menu_seguridad" style="display: none;">
                                    <a href="#">
                                        <i class="fa fa-laptop" aria-hidden="true"></i>
                                        <span>Seguridad</span>
                                    </a>
                                    <ul class="nav nav-children">
                                        <li class="nav-parent">
                                            <a href="#">
                                                <i class="fa fa-columns" ></i>
                                                <span>Administración tablas</span>
                                            </a>
                                            <ul class="nav nav-children" id="menu_seguridad_tablas" style="display: none;">
                                                
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-gears"></i>
                                                Procesos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-file-pdf-o"></i>
                                                Reportes
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </aside>
            <!-- end: sidebar -->

            <section role="main" class="content-body" id="contenido_principal">
                <header class="page-header">
                    <h2>Dashboard</h2>

                    <div class="right-wrapper pull-right">
                        <ol class="breadcrumbs">
                            <li>
                                <a href="index.html">
                                    <i class="fa fa-home"></i>
                                </a>
                            </li>
                            <li><span>Dashboard</span></li>
                        </ol>

                        <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                    </div>
                </header>

                <div class="row">
                    <section class="panel panel-primary" id="panel-1" data-portlet-item="">
                        <header class="panel-heading portlet-handler">
                            <div class="panel-actions">
                                <a href="#" class="fa fa-caret-down"></a>
                                <a href="#" class="fa fa-times"></a>
                            </div>
                            <h2 class="panel-title">Index Principal</h2>
                        </header>
                        <div class="panel-body">
                            Aquí va la primera parte
                        </div>
                    </section>
                </div>
            </section>
        </div>

        <aside id="sidebar-right" class="sidebar-right">
            <div class="nano">
                <div class="nano-content">
                    <a href="#" class="mobile-close visible-xs">
                        Collapse <i class="fa fa-chevron-right"></i>
                    </a>

                    <div class="sidebar-right-wrapper">

                        <div class="sidebar-widget widget-calendar">
                            <h6>Upcoming Tasks</h6>
                            <div data-plugin-datepicker data-plugin-skin="dark"></div>

                            <ul>
                                <li>
                                    <time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
                                    <span>Company Meeting</span>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-widget widget-friends">
                            <h6>Friends</h6>
                            <ul>
                                <li class="status-online">
                                    <figure class="profile-picture">
                                        <img src="../Plantilla/octopus/octopus/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-online">
                                    <figure class="profile-picture">
                                        <img src="../Plantilla/octopus/octopus/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-offline">
                                    <figure class="profile-picture">
                                        <img src="../Plantilla/octopus/octopus/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                                <li class="status-offline">
                                    <figure class="profile-picture">
                                        <img src="../Plantilla/octopus/octopus/assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
                                    </figure>
                                    <div class="profile-info">
                                        <span class="name">Joseph Doe Junior</span>
                                        <span class="title">Hey, how are you?</span>
                                    </div>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </aside>
    </section>

    <script src="../js/menu/menu.js"></script>

    <!-- Vendor -->
    <script src="../Plantilla/octopus/octopus/assets/vendor/jquery/jquery.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/nanoscroller/nanoscroller.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/magnific-popup/magnific-popup.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jquery-placeholder/jquery.placeholder.js"></script>

    <!-- Specific Page Vendor -->
    <script src="../Plantilla/octopus/octopus/assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jquery-appear/jquery.appear.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/flot/jquery.flot.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/flot/jquery.flot.pie.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/flot/jquery.flot.categories.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/flot/jquery.flot.resize.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/raphael/raphael.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/morris/morris.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/gauge/gauge.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/snap-svg/snap.svg.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/liquid-meter/liquid.meter.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jqvmap/jquery.vmap.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jqvmap/maps/jquery.vmap.world.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
    <script src="../Plantilla/octopus/octopus/assets/vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="../Plantilla/octopus/octopus/assets/javascripts/theme.js"></script>

    <!-- Theme Custom -->
    <script src="../Plantilla/octopus/octopus/assets/javascripts/theme.custom.js"></script>

    <!-- Theme Initialization Files -->
    <script src="../Plantilla/octopus/octopus/assets/javascripts/theme.init.js"></script>
    <!-- Examples -->
    <script src="../Plantilla/octopus/octopus/assets/javascripts/dashboard/examples.dashboard.js"></script>

    <script>
        $(document).ready(function() {
            let codigo_perfil = <?php echo $_SESSION['sesion_codigo_perfil'] ?>;
            Menus(codigo_perfil);
        });
        function CargarContenido(contenedor,contenido)
        {
            $("#"+contenedor).load(contenido);
        }
    </script>

</body>

</html>