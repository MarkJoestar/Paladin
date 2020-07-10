<?php

require_once '../../class/Usuario.php';

const SIN_ACCION = 0;
const USUARIO_GUARDADO = 1;
const USUARIO_MODIFICADO = 2;
const USUARIO_ELIMINADO = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoUsuario = Usuario::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Usuario</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>
	<?php require_once "../../menu.php"; ?>
	<div class="container">
	<br>
	<br>

	<a href="alta.php"><div class="add"><img src="../../imagenes/mas.png">Agregar Nuevo</div></a>
	<br><br>

	<?php if ($mensaje == USUARIO_GUARDADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Usuario Guardado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == USUARIO_MODIFICADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Usuario Modificado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == USUARIO_ELIMINADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Usuario Eliminado</h3>
		<br>
		<br>
	<?php endif ?>

	<table>
		<tr>
			<th><div class="columna">Nombre</div></th>
			<th><div class="columna">Apellido</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadoUsuario as $usuario): ?>

			<tr>
				<td><div class="dato"> <?php echo $usuario->getNombre(); ?></div> </td>
				<td><div class="dato"> <?php echo $usuario->getApellido(); ?></div> </td>
				<td><a href="detalle.php?id=<?php echo $usuario->getIdUsuario()?>"><img src="../../imagenes/detalle.png"></a>
				<a href="modificar.php?id=<?php echo $usuario->getIdUsuario()?>"><img src="../../imagenes/ajustes.png"></a>
				<a href="procesar/eliminar.php?id<?php echo $usuario->getIdUsuario()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>
		<?php endforeach ?>
	</table><br><br><br><br><br><br><br><br>
</div>
</body>
</html>