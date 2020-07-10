<?php

require_once '../../class/Ubicacion.php';

const SIN_ACCION = 0;
const UBICACION_GUARDADA = 1;
const UBICACION_MODIFICADA = 2;
const UBICACION_ELIMINADA = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoUbicacion = Ubicacion::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Ubicacion</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<div class="container">
	<br>
	<br>

	<a href="alta.php"><div class="add"><img src="../../imagenes/mas.png">Agregar Nuevo</div></a>
	<br><br>

	<?php if ($mensaje == UBICACION_GUARDADA): ?>
		<h3><img src="../../imagenes/pulgar.png">Ubicacion Guardada</h3>
		<br>
		<br>
	<?php elseif ($mensaje == UBICACION_MODIFICADA): ?>
		<h3><img src="../../imagenes/pulgar.png">Ubicacion Modificada</h3>
		<br>
		<br>
	<?php elseif ($mensaje == UBICACION_ELIMINADA): ?>
		<h3><img src="../../imagenes/pulgar.png">Ubicacion Eliminada</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th><div class="columna"> Descripcion</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadoUbicacion as $ubicacion): ?>

			<tr>
				<td><div class="dato"><?php echo $ubicacion->getDescripcion(); ?> </div></td>
				<td><a href="detalle.php?id=<?php echo $ubicacion->getIdUbicacion()?>"><img src="../../imagenes/detalle.png"></a>
				<a href="modificar.php?id=<?php echo $ubicacion->getIdUbicacion()?>"><img src="../../imagenes/ajustes.png"></a>
				<a href="procesar/eliminar.php?id=<?php echo $ubicacion->getIdUbicacion()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>

</body>
</html>