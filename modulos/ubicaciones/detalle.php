<?php
require_once '../../class/Ubicacion.php';

$id = $_GET['id'];
$ubicacion = Ubicacion::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>
    <?php require_once "../../menu.php"; ?>
    <div class="container">
    <div class="detalle">
	<?php echo $ubicacion;?>
	<br><br><br>
	<?php echo $ubicacion->getIdUbicacion();?>
	<br><br>
	<?php echo $ubicacion->getDescripcion();?>
	</div>  
	<br><br><br><br><br><br>
	<a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
</div>

</body>
</html>