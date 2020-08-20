<?php

require_once '../../class/Barrio.php';

const SIN_ACCION = 0;
const BARRIO_GUARDADO = 1;
const BARRIO_MODIFICADO = 2;
const BARRIO_ELIMINADO = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoBarrio = Barrio::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Barrio</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<div class="container">
	<br>
	<br>

	<a href="alta.php"><div class="add"><img src="../../imagenes/mas.png">Agregar Nuevo</div></a>
	<br><br>

	<?php if ($mensaje == BARRIO_GUARDADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Barrio Guardada</h3>
		<br>
		<br>
	<?php elseif ($mensaje == BARRIO_MODIFICADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Barrio Modificada</h3>
		<br>
		<br>
	<?php elseif ($mensaje == BARRIO_ELIMINADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Barrio Eliminada</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th><div class="columna"> Descripcion</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadoBarrio as $barrio): ?>

			<tr>
				<td><div class="dato"><?php echo $barrio->getDescripcion(); ?> </div></td>
				<td><a href="detalle.php?id=<?php echo $barrio->getIdBarrio()?>"><img src="../../imagenes/detalle.png"></a>
				<a href="modificar.php?id=<?php echo $barrio->getIdBarrio()?>"><img src="../../imagenes/ajustes.png"></a>
				<a href="procesar/eliminar.php?id=<?php echo $barrio->getIdBarrio()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>

</body>
</html>