<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Обработчик рабочеговремени</title>

    <!-- Bootstrap core CSS -->

    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="../fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="../css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../css/maps/jquery-jvectormap-2.0.3.css"/>
    <link href="../css/icheck/flat/green.css" rel="stylesheet"/>
    <link href="../css/floatexamples.css" rel="stylesheet" type="text/css"/>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/nprogress.js"></script>

    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


<body class="nav-md">

<div class="container body">


    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href="index.php" class="site_title"><i class="fa fa-paw"></i> <span>Калькулятор</span></a>
                </div>
                <div class="clearfix"></div>


                <br/>

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                            <li><a><i class="fa fa-home"></i> Главная <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu" style="display: none">
                                    <li><a href="../index.php">Панель управления</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /sidebar menu -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                               aria-expanded="false">
                                <img src="../images/user.png" alt="">Админ
                                <span class=" fa fa-angle-down"></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->


        <!-- page content -->
        <div class="right_col" role="main">

            <!-- top tiles -->
            <div class="row tile_count">
                <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                    <div class="left"></div>
                    <div class="right">
                        <span class="count_top"><i class="fa fa-user"></i> Всего записей приход/уход</span>
                        <div class="count"><?php echo count($bigdata) ?></div>
                    </div>
                </div>
                <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                    <div class="left"></div>
                    <div class="right">
                        <span class="count_top"><i class="fa fa-clock-o"></i> Отработано времени</span>
                        <div class="count"><?php echo $time . "ч " . $min . "м"; ?></div>
                        <span class="count_bottom">За заданный период времени</span>
                    </div>
                </div>
                <div class="animated flipInY col-md-2 col-sm-4 col-xs-4 tile_stats_count">
                    <div class="left"></div>
                    <div class="right">
                        <span class="count_top"><i class="fa fa-user"></i> Фамилия и имя</span>
                        <div class="count green"><?php echo $bigdata[1][1] ?></div>
                    </div>
                </div>


            </div>
            <!-- /top tiles -->

            <div class="x_panel tile fixed_height_320"><h2>Данные сотрудника</h2>
                <div class="x_title">



                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>№id</th>
                                <th>ФИО</th>
                                <th>Общее время работы в ч:м:с</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th><?php echo $bigdata[1][0] ?></th>
                                <th><?php echo $bigdata[1][1] ?></th>
                                <th><?php echo $time . ":" . $min . ":" . $sec; ?></th>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="0.php" class="btn btn-primary">Посчитать список</a>

            </div>


            <!-- footer content -->

            <footer>
                <div class="copyright-info">
                    <p class="pull-right">Модуль расчета общего рабочего времени персонала
                    </p>
                </div>
                <div class="clearfix"></div>
            </footer>
            <!-- /footer content -->
        </div>
        <!-- /page content -->

    </div>

</div>

<

<script src="../js/bootstrap.min.js"></script>

<!-- gauge js -->
<script type="text/javascript" src="js/gauge/gauge.min.js"></script>
<script type="text/javascript" src="js/gauge/gauge_demo.js"></script>
<!-- bootstrap progress js -->
<script src="js/progressbar/bootstrap-progressbar.min.js"></script>
<script src="js/nicescroll/jquery.nicescroll.min.js"></script>
<!-- icheck -->
<script src="js/icheck/icheck.min.js"></script>
<!-- daterangepicker -->
<script type="text/javascript" src="js/moment/moment.min.js"></script>
<script type="text/javascript" src="js/datepicker/daterangepicker.js"></script>
<!-- chart js -->
<script src="js/chartjs/chart.min.js"></script>

<script src="../js/custom.js"></script>

</body>

</html>
