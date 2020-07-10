<?php

require_once '../../class/Camara.php';

const SIN_ACCION = 0;
const CAMARA_GUARDADA = 1;
const CAMARA_MODIFICADA = 2;
const CAMARA_ELIMINADA = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoCamara = Camara::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Camara</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>
	<?php require_once "../../menu.php"; ?>
	<div class="container">
	<br>
	<br>

	<a href="alta.php"><div class="add"><img src="../../imagenes/mas.png">Agregar Nueva</div></a>
	<br><br>

	<?php if ($mensaje == CAMARA_GUARDADA): ?>
		<h3><img src="../../imagenes/pulgar.png">Camara Guardada</h3>
		<br>
		<br>
	<?php elseif ($mensaje == CAMARA_MODIFICADA): ?>
		<h3><img src="../../imagenes/pulgar.png">Camara Modificada</h3>
		<br>
		<br>
	<?php elseif ($mensaje == CAMARA_ELIMINADA): ?>
		<h3><img src="../../imagenes/pulgar.png">Camara Eliminada</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th><div class="columna">Modelo</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadoCamara as $camara): ?>

			<tr>
				<td> <div class="dato"><?php echo $camara->getModelos();?></div></td>
				<td><a href="detalle.php?id=<?php echo $camara->getIdCamara()?>"><img src="../../imagenes/detalle.png"></a>---------
				<a href="modificar.php?id=<?php echo $camara->getIdCamara()?>"><img src="../../imagenes/ajustes.png"></a>-------
				<a href="procesar/eliminar.php?id=<?php echo $camara->getIdCamara()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>

		<?php endforeach ?>

	</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>