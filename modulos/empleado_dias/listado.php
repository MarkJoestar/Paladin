<?php

require_once '../../class/Empleado_dia.php';

const SIN_ACCION = 0;
const EMPLEADO_DIA_GUARDADO = 1;
const EMPLEADO_DIA_MODIFICADO = 2;
const EMPLEADO_DIA_ELIMINADO = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoEmpleadoDia = EmpleadoDia::obtenerTodos();

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

	<?php if ($mensaje == EMPLEADO_DIA_GUARDADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Empleado-Dia Guardado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == EMPLEADO_DIA_MODIFICADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Empleado-Dia Modificado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == EMPLEADO_DIA_ELIMINADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Empleado-Dia Eliminado</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th><div class="columna"> ID</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadoEmpleadoDia as $empleadoDia): ?>

			<tr>
				<td><div class="dato"><?php echo $empleadoDia->getIdEmpleadoDia(); ?> </div></td>
				<td><a href="detalle.php?id=<?php echo $empleadoDia->getIdEmpleadoDia()?>"><img src="../../imagenes/detalle.png"></a>
				<a href="modificar.php?id=<?php echo $empleadoDia->getIdEmpleadoDia()?>"><img src="../../imagenes/ajustes.png"></a>
				<a href="procesar/eliminar.php?id=<?php echo $empleadoDia->getIdEmpleadoDia()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>

		<?php endforeach ?>

	</table>

</body>
</html>