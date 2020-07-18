<?php

require_once '../../class/Horario.php';

const SIN_ACCION = 0;
const HORARIO_GUARDADO = 1;
const HORARIO_MODIFICADO = 2;
const HORARIO_ELIMINADO = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoHorario = Horario::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Horarios</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<div class="container">
	<br>
	<br>

	<a href="alta.php"><div class="add"><img src="../../imagenes/mas.png">Agregar Nuevo</div></a>
	<br><br>

	<?php if ($mensaje == HORARIO_GUARDADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Horario Guardado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == HORARIO_MODIFICADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Horario Modificado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == HORARIO_ELIMINADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Horario Eliminado</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th><div class="columna"> Hora Entrada</div></th>
			<th><div class="columna"> Hora Salida</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadohorario as $horario): ?>

			<tr>
				<td><div class="dato"> <?php echo $horario->getHoraEntrada(); ?> </td>
				<td><div class="dato"> <?php echo $horario->getHoraSalida(); ?> </td>
				<td><a href="detalle.php?id=<?php echo $horario->getIdHorario()?>"><img src="../../imagenes/detalle.png"></a>
				<a href="modificar.php?id=<?php echo $horario->getIdHorario()?>"><img src="../../imagenes/ajustes.png"></a>
				<a href="procesar/eliminar.php?id=<?php echo $horario->getIdHorario()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>
		<?php endforeach ?>
	</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>