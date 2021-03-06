<?php

require_once '../../class/Empleado_dia.php';

const SIN_ACCION = 0;
const EMPLEADO_DIA_GUARDADO = 1;
const EMPLEADO_DIA_MODIFICADO = 2;
const EMPLEADO_DIA_ELIMINADO = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}
$listadoEmpleadoDia = EmpleadoDia::obtenerTodos();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Empleado-Dia/s</title>

    <!-- Fontfaces CSS-->
    <link href="../../static/CoolAdmin/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../static/CoolAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
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
    <link href="../../static/CoolAdmin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <?php require_once "../../menu.php"; ?>

    <div class="page-wrapper">
        <div class="page-container">
            <div class="main-content">
                
                <div class="section__content section__content--p30">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Empleado-Dia</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-right">
                                    		<?php if ($mensaje == EMPLEADO_DIA_GUARDADO): ?>
                                    			<h3><img src="../../imagenes/pulgar.png">Empleado-dia Guardado</h3>
                                    			<br>
                                    			<br>
                                    		<?php elseif ($mensaje == EMPLEADO_DIA_MODIFICADO): ?>
                                    			<h3><img src="../../imagenes/pulgar.png">Empleado-Dia Modificado</h3>
                                    			<br>
                                    			<br>
                                    		<?php elseif ($mensaje == EMPLEADO_DIA_ELIMINADO): ?>
                                    			<h3><img src="../../imagenes/pulgar.png">Empleado-dia Eliminado</h3>
                                    			<br>
                                    			<br>
                                    		<?php endif ?>
                                            <a href="alta.php">
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>Agregar Nuevo</button></a>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <div class="col-md-12">
                                <!-- DATA TABLE-->
                                <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Lunes</th>
                                                <th>Martes</th>
                                                <th>Miercoles</th>
                                                <th>Jueves</th>
                                                <th>Viernes</th>
                                                <th>Sabado</th>
                                                <th>Domingo</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listadoEmpleadoDia as $empleadoDia): ?>
                                                <tr>
                                                    <td><strong><?php echo $empleadoDia->getIdEmpleadoDia();?></strong></td>
                                                    <td><?php echo $empleadoDia->getLunes();?></td>
                                                    <td><?php echo $empleadoDia->getMartes();?></td>
                                                    <td><?php echo $empleadoDia->getMiercoles();?></td>
                                                    <td><?php echo $empleadoDia->getJueves();?></td>
                                                    <td><?php echo $empleadoDia->getViernes();?></td>
                                                    <td><?php echo $empleadoDia->getSabado();?></td>
                                                    <td><?php echo $empleadoDia->getDomingo();?></td>
                                                    <td><a href="detalle.php?id=<?php echo $empleadoDia->getIdEmpleadoDia()?>"><img src="../../imagenes/detalle.png"></a> <a href="modificar.php?id=<?php echo $empleadoDia->getIdEmpleadoDia()?>"><img src="../../imagenes/ajustes.png"></a> <a href="procesar/eliminar.php?id=<?php echo $empleadoDia->getIdEmpleadoDia()?>"><img src="../../imagenes/dejar.png"></a></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
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
    <script src="../../static/CoolAdmin/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="../../static/CoolAdmin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../static/CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../static/CoolAdmin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../static/CoolAdmin/vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="../../static/CoolAdmin/js/main.js"></script>
</body>

</html>