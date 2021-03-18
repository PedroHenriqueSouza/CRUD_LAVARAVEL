<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud - Laravel</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/template/images/favicon-32x32.png">

    <!-- ========== COMMON STYLES ========== -->
    <link rel="stylesheet" href="template/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="template/css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="template/css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="template/css/lobipanel/lobipanel.min.css" media="screen">

    <!-- ========== PAGE STYLES ========== -->
    <link rel="stylesheet" href="template/css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" href="template/css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="template/css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="template/css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="template/css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="template/css/bootstrap-tour/bootstrap-tour.css">
    <link rel="stylesheet" type="text/css" href="template/js/DataTables/datatables.min.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="../template/images/favicon-32x32.png">
    <!-- ========== THEME CSS ========== -->
    <link rel="stylesheet" href="template/css/main.css" media="screen">

    <!-- ========== MODERNIZR ========== -->
    <script src="template/js/modernizr/modernizr.min.js"></script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Jquery Form -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.js" integrity="sha512-RTxmGPtGtFBja+6BCvELEfuUdzlPcgf5TZ7qOVRmDfI9fDdX2f1IwBq+ChiELfWt72WY34n0Ti1oo2Q3cWn+kw==" crossorigin="anonymous"></script>

    <!--Jquery Mask (formatação de campos) -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <nav class="navbar top-navbar bg-white box-shadow">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header no-padding">
                        <a class="navbar-brand" href="{{route('inicio')}}">
                            <img src="template/images/logomarca.png" alt="Crud" class="logo" width="100" >
                        </a>
                        <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <button type="button" class="navbar-toggle mobile-nav-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- /.navbar-header -->

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="hidden-sm hidden-xs"><a href="#" class="user-info-handle"><i class="fa fa-user"></i></a></li>
                            <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>

                        </ul>
                        <!-- /.nav navbar-nav -->

                        <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="dropdown tour-two">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador</a>
                               
                            </li>
                            <!-- /.dropdown -->
                        </ul>
                        <!-- /.nav navbar-nav navbar-right -->
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <div class="left-sidebar fixed-sidebar bg-black-300 box-shadow tour-three">
                    <div class="sidebar-content">
                        <div class="user-info closed">
                            <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                            <h6 class="title">Administrador</h6>
                        </div>
                        <!-- /.user-info -->

                        <div class="sidebar-nav">                          
                            <ul class="side-nav color-gray">
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-user"></i> <span>Usuários</span><i class="fa fa-angle-right arrow"></i></a>   
                                    <ul class="child-nav">
                                        <li><a href="{{route('usuarios-cadastrar')}}"><i class="fa fa-pencil"></i> <span>Cadastrar </span></a></li>
                                        <li><a href="{{route('usuarios')}}"><i class="fa fa-list"></i> <span>Visualizar</span></a></li>
                                    </ul>                                     
                                </li>

                            </ul>                           

                        </div>
                        <!-- /.sidebar-nav -->
                    </div>
                    <!-- /.sidebar-content -->
                </div>
                <!-- /.left-sidebar -->

                <div class="main-page">
                    <div class="container-fluid">
                        @yield('conteudo')
                    </div>
                </div>

                

            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="template/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="template/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="template/js/bootstrap/bootstrap.min.js"></script>
    <script src="template/js/pace/pace.min.js"></script>
    <script src="template/js/lobipanel/lobipanel.min.js"></script>
    <script src="template/js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="template/js/prism/prism.js"></script>
    <script src="template/js/waypoint/waypoints.min.js"></script>
    <script src="template/js/counterUp/jquery.counterup.min.js"></script>
    <script src="template/js/amcharts/amcharts.js"></script>
    <script src="template/js/amcharts/serial.js"></script>
    <script src="template/js/amcharts/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="template/js/amcharts/plugins/export/export.css" type="text/css" media="all" />
    <script src="template/js/amcharts/themes/light.js"></script>
    <script src="template/js/toastr/toastr.min.js"></script>
    <script src="template/js/icheck/icheck.min.js"></script>
    <script src="template/js/bootstrap-tour/bootstrap-tour.js"></script>
    <script src="template/js/DataTables/datatables.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="template/js/main.js"></script>
    <script src="template/js/production-chart.js"></script>
    <script src="template/js/traffic-chart.js"></script>
    <script src="template/js/task-list.js"></script>   

</body>

</html>