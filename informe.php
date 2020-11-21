<?php

require_once "class/MySQL.php";
require_once "class/Empleado.php";

$listadoEmpleado = Empleado::obtenerTodos();


if (isset($_GET['txtFechaDesde'])) {
    $fechaDesde = $_GET['txtFechaDesde'];
}

if (isset($_GET['txtFechaHasta'])) {
    $fechaHasta = $_GET['txtFechaHasta'];
}

if (isset($_GET['cboEmpleados'])) {
    $empleado = $_GET['cboEmpleados'];
}

$datos = NULL;

if (isset($fechaDesde) && isset($fechaHasta)) {
    if (!empty($fechaDesde) && !empty($fechaHasta)) {
        $sql = "SELECT persona.nombre, persona.apellido, asistencia.fecha_hora_ingreso, horario.hora_ingreso, "
            . "SEC_TO_TIME(SUM(TIME_TO_SEC(horario.hora_ingreso) - TIME_TO_SEC(asistencia.fecha_hora_ingreso))) AS timediff "
            . "FROM asistencia "
            . "INNER JOIN horario ON asistencia.id_horario = horario.id_horario "
            . "INNER JOIN empleado ON asistencia.id_empleado = empleado.id_empleado "
            . "INNER JOIN persona ON empleado.id_persona = persona.id_persona "
            . "WHERE asistencia.fecha_hora_ingreso BETWEEN '$fechaDesde' AND '$fechaHasta' AND empleado.id_empleado = '$empleado' "
            . "GROUP BY asistencia.id_asistencia";

        $mysql = new MySQL();
        $datos = $mysql->consultar($sql);
    }
}

//echo $datos->num_rows;
//echo "<br><br>";

//highlight_string(var_export($datos, true));
//exit;

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
    <title>Puntualidad</title>

    <!-- Fontfaces CSS-->
    <link href="static/CoolAdmin/css/font-face.css" rel="stylesheet" media="all">
    <link href="static/CoolAdmin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="static/CoolAdmin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="static/CoolAdmin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="static/CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="static/CoolAdmin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="static/CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="static/CoolAdmin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="static/CoolAdmin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="static/CoolAdmin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="static/CoolAdmin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="static/CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="static/CoolAdmin/css/theme.css" rel="stylesheet" media="all">

</head>
<body>
    <?php require_once "menu.php"; ?>

    <div class="page-wrapper">
        <div class="page-container">
            <div class="main-content">
                
                <div class="section__content section__content--p30">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Informe de Puntualidad</h3>
                                <form method='GET'>
                                    Desde: <input type='date' name='txtFechaDesde'>
                                    &nbsp;&nbsp;
                                    Hasta: <input type='date' name='txtFechaHasta'>
                                    <br><br>
                                    Empleado: <select name='cboEmpleados'>
                                        <option value="0">Seleccionar</option>
                                        <?php foreach ($listadoEmpleado as $empleado): ?>
					                        <option value="<?php echo $empleado->getIdEmpleado(); ?>">
                                                <?php echo $empleado; ?>
                                            </option>
                                        <?php endforeach ?>
                                        </select>
                                    <input type='submit' value='Consultar'>
                                </form>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <?php if (!is_null($datos)): ?>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <!-- DATA TABLE-->
                                    <div class="table-responsive m-b-40">
                                        <table class="table table-borderless table-data3">
                                            <thead>
                                                <tr>
                                                    <th>Nombre</th>
                                                    <th>Apellido</th>
                                                    <th>Hora de Entrada</th>
                                                    <th>Puntualidad</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while($row = $datos->fetch_assoc()): ?>
                                                    <tr>
                                                    <td><?php echo $row['nombre'] ?></td>
                                                    <td><?php echo $row['apellido'] ?></td>
                                                    <td><?php echo $row['hora_ingreso'] ?></td>
                                                    <?php if ($row['timediff'] > '-00:05:00'):?>
                                                        <td><span class="status--denied"><?php echo "Llego {$row['timediff']} tarde";?></span></td>
                                                    <?php elseif($row['timediff'] > '05:00:00' ):?>
                                                        <td><span class="status--process"><?php echo "Llego {$row['timediff']} antes";?></span></td>
                                                    <?php else:?>
                                                        <td><span class="status--process"><?php echo "Llego puntual";?></span></td>
                                                    <?php endif?>
                                                </tr>
                                                <?php endwhile ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END DATA TABLE-->
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Jquery JS-->
    <script src="static/CoolAdmin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="static/CoolAdmin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="static/CoolAdmin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="static/CoolAdmin/vendor/slick/slick.min.js">
    </script>
    <script src="static/CoolAdmin/vendor/wow/wow.min.js"></script>
    <script src="static/CoolAdmin/vendor/animsition/animsition.min.js"></script>
    <script src="static/CoolAdmin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="static/CoolAdmin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="static/CoolAdmin/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="static/CoolAdmin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="static/CoolAdmin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="static/CoolAdmin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="static/CoolAdmin/vendor/select2/select2.min.js"></script>

    <!-- Main JS-->
    <script src="static/CoolAdmin/js/main.js"></script>

</body>
</html>