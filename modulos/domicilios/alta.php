<?php

require_once "../../class/Barrio.php";

$listadoBarrio = Barrio::obtenerTodos();

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];


?>
<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Domicilio</title>
        <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Forms</title>

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
    <link href="../../static/CoolAdmin/css/theme.css" rel="stylesheet" media="all">
    <script type="text/javascript">
            
            function validarDatos() {
                var calle = document.getElementById("txtCalle").value;
                if (calle.trim() == "") {
                    alert("La calle no debe estar vacio");
                    return;
                }
                var form = document.getElementById("frmDatos");
                form.submit();
            }
        </script>
</head>
<body class="animsition">
    <?php require_once "../../menu.php"; ?>
    <div class="page-wrapper">
        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Domicilio</strong> Alta
                                    </div>
                                    <div class="card-body card-block">
                                        <form id="frmDatos" name="frmDatos" action="procesar/guardar.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                            <input type="hidden" name="txtIdPersona" value='<?php echo $idPersona ?>'>
                                            <input type="hidden" name="txtModulo" value='<?php echo $moduloLlamada ?>'>
                                            <input type="hidden" name="txtIdLlamada" value='<?php echo $idLlamada ?>'>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Calle</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="txtCalle" name="txtCalle" placeholder="Ingrese calle" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Numero de Casa</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="txtNumeroCasa" name="txtNumeroCasa" placeholder="Ingrese el numero casa" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Manzana</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="txtManzana" name="txtManzana" placeholder="Si no tiene, dejar en blanco" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Torre</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="txtTorre" name="txtTorre" placeholder="Si no tiene, dejar en blanco" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Piso</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="txtPiso" name="txtPiso" placeholder="Si no tiene, dejar en blanco" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label class=" form-control-label">Sector</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="txtSector" name="txtSector" placeholder="Si no tiene, dejar en blanco" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
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