<?php
require_once '../../class/Sensor.php';

$id = $_GET['id'];
$sensor = Sensor::obtenerPorId($id);

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
	<?php echo $sensor;?>
	<br><br><br>
	<?php echo $sensor->getIdSensor();?>
	<br><br>
	<?php echo $sensor->getModelo();?>
	</div>  
	<br><br><br><br><br><br>
	<a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
</div>
</body>
</html>