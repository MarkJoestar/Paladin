<?php

require_once '../../class/Funcion.php';

const SIN_ACCION = 0;
const FUNCION_GUARDADA = 1;
const FUNCION_MODIFICADA = 2;
const FUNCION_ELIMINADA = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoFuncion = Funcion::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Funcion</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<div class="container">
	<br>
	<br>

	<a href="alta.php"><div class="add"><img src="../../imagenes/mas.png">Agregar Nuevo</div></a>
	<br><br>

	<?php if ($mensaje == FUNCION_GUARDADA): ?>
		<h3><img src="../../imagenes/pulgar.png">Funcion Guardada</h3>
		<br>
		<br>
	<?php elseif ($mensaje == FUNCION_MODIFICADA): ?>
		<h3><img src="../../imagenes/pulgar.png">Funcion Modificada</h3>
		<br>
		<br>
	<?php elseif ($mensaje == FUNCION_ELIMINADA): ?>
		<h3><img src="../../imagenes/pulgar.png">Funcion Eliminada</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th><div class="columna">Descripcio</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadoFuncion as $funcion): ?>

			<tr>
				<td><div class="dato"> <?php echo $funcion->getDescripcion(); ?></div> </td>
				<td><a href="detalle.php?id=<?php echo $funcion->getIdFuncion()?>"><img src="../../imagenes/detalle.png"></a>
				<a href="modificar.php?id=<?php echo $funcion->getIdFuncion()?>"><img src="../../imagenes/ajustes.png"></a>
				<a href="procesar/eliminar.php?id=<?php echo $funcion->getIdFuncion()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>

		<?php endforeach ?>

	</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

</div>
</body>
</html>