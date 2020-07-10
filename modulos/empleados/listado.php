<?php

require_once '../../class/Empleado.php';

const SIN_ACCION = 0;
const EMPLEADO_GUARDADO = 1;
const EMPLEADO_MODIFICADO = 2;
const EMPLEADO_ELIMINADO = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoEmpleado = Empleado::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Empleados</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<div class="container">
	<br>
	<br>

	<a href="alta.php"><div class="add"><img src="../../imagenes/mas.png">Agregar Nuevo</div></a>
	<br><br>

	<?php if ($mensaje == EMPLEADO_GUARDADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Emplado Guardado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == EMPLEADO_MODIFICADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Empleado Modificado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == EMPLEADO_ELIMINADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Empleado Eliminado</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th><div class="columna">Nombre</div></th>
			<th><div class="columna">Apellido</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadoEmpleado as $empleado): ?>

			<tr>
				<td><div class="dato"><?php echo $empleado->getNombre(); ?></div></td>
				<td><div class="dato"><?php echo $empleado->getApellido(); ?></div></td>
				<td><a href="detalle.php?id=<?php echo $empleado->getIdEmpleado()?>"><img src="../../imagenes/detalle.png"></a>
				<a href="modificar.php?id=<?php echo $empleado->getIdEmpleado()?>"><img src="../../imagenes/ajustes.png"></a>
				<a href="eliminar.php?id<?php echo $empleado->getIdEmpleado()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>

		<?php endforeach ?>

	</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>