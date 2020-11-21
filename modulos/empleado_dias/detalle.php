<?php
require_once '../../class/Empleado_dia.php';

$id = $_GET['id'];
$empleadoDia = EmpleadoDia::obtenerPorId($id);
$check = "check.png";
/*highlight_string(var_export($empleado, true));
exit;*/

?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Empleado-Dia</title>

    <!-- Fontfaces CSS-->
    <link href="../../static/CoolAdmin/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../static/CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../static/CoolAdmin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../static/CoolAdmin//css/theme.css" rel="stylesheet" media="all">

</head>
<body class="animsition">
	<?php require_once "../../menu.php"; ?>
    <div class="page-wrapper">
    	<div class="page-container">
    		<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Sensor</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label"><strong>ID:</strong></label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?php echo $empleadoDia->getIdEmpleadoDia();?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label"><strong>Lunes:</strong></label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?php echo $empleadoDia->getLunes();?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label"><strong>Martes:</strong></label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?php echo $empleadoDia->getMartes();?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label"><strong>Miercoles:</strong></label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?php echo $empleadoDia->getMiercoles();?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label"><strong>Jueves:</strong></label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?php echo $empleadoDia->getJueves();?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label"><strong>Viernes:</strong></label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?php echo $empleadoDia->getViernes();?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label"><strong>Sabado:</strong></label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?php echo $empleadoDia->getSabado();?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body card-block">
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label class=" form-control-label"><strong>Domingo:</strong></label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <p class="form-control-static"><?php echo $empleadoDia->getDomingo();?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <script src="../../static/CoolAdmin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../static/CoolAdmin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../static/CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../static/CoolAdmin/vendor/slick/slick.min.js">
    </script>
    <script src="../../static/CoolAdmin/vendor/wow/wow.min.js"></script>
    <script src="../../static/CoolAdmin/vendor/animsition/animsition.min.js"></script>
    <script src="../../static/CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../static/CoolAdmin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../static/CoolAdmin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../static/CoolAdmin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../static/CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../static/CoolAdmin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../static/CoolAdmin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../../static/CoolAdmin/js/main.js"></script>
</body>
</html>