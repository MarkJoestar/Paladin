<?php

require_once '../../class/Sensor.php';

const SIN_ACCION = 0;
const SENSOR_GUARDADO = 1;
const SENSOR_MODIFICADO = 2;
const SENSOR_ELIMINADO = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoSensor = Sensor::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Sensor</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<div class="container">
	<br>
	<br>

	<a href="alta.php"><div class="add"><img src="../../imagenes/mas.png">Agregar Nuevo</div></a>
	<br><br>

	<?php if ($mensaje == SENSOR_GUARDADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Sensor Guardado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == SENSOR_MODIFICADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Sensor Modificado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == SENSOR_ELIMINADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Sensor Eliminado</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th><div class="columna"> Modelo</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadoSensor as $sensor): ?>

			<tr>
				<td><div class="dato"> <?php echo $sensor->getModelo(); ?> </td>
				<td><a href="detalle.php?id=<?php echo $sensor->getIdSensor()?>"><img src="../../imagenes/detalle.png"></a>
				<a href="modificar.php?id=<?php echo $sensor->getIdSensor()?>"><img src="../../imagenes/ajustes.png"></a>
				<a href="procesar/eliminar.php?id=<?php echo $sensor->getIdSensor()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>
		<?php endforeach ?>
	</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>