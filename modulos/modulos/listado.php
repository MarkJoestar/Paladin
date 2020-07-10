<?php

require_once '../../class/Modulo.php';

const SIN_ACCION = 0;
const MODULO_GUARDADO = 1;
const MODULO_MODIFICADO = 2;
const MODULO_ELIMINADO = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoModulo = Modulo::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Modulo</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<div class="container">
	<br>
	<br>

	<a href="alta.php"><div class="add"><img src="../../imagenes/mas.png">Agregar Nuevo</div></a>
	<br><br>

	<?php if ($mensaje == MODULO_GUARDADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Modulo Guardado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == MODULO_MODIFICADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Modulo Modificado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == MODULO_ELIMINADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Modulo Eliminado</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th><div class="columna">Descripcion</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadoModulo as $modulo): ?>

			<tr>
				<td><div class="dato"><?php echo $modulo->getNombre(); ?></div></td>
				<td><a href="detalle.php?id=<?php echo $modulo->getIdModulo()?>"><img src="../../imagenes/detalle.png"></a>
				<a href="modificar.php?id=<?php echo $modulo->getIdModulo()?>"><img src="../../imagenes/ajustes.png"></a>
				<a href="procesar/eliminar.php?id=<?php echo $modulo->getIdModulo()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>
		<?php endforeach ?>
	</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>