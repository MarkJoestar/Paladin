<?php

require_once '../../class/Perfil.php';

const SIN_ACCION = 0;
const PERFIL_GUARDADO = 1;
const PERFIL_MODIFICADO = 2;
const PERFIL_ELIMINADO = 3;


if (isset($_GET['mensaje'])) {
	$mensaje = $_GET['mensaje'];
} else {
	$mensaje = SIN_ACCION;
}

$listadoPerfil = Perfil::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Listado Perfil</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>

	<?php require_once "../../menu.php"; ?>
	<div class="container">
	<br>
	<br>

	<a href="alta.php"><div class="add"><img src="../../imagenes/mas.png">Agregar Nuevo</div></a>
	<br><br>

	<?php if ($mensaje == PERFIL_GUARDADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Perfil Guardado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == PERFIL_MODIFICADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Perfil Modificado</h3>
		<br>
		<br>
	<?php elseif ($mensaje == PERFIL_ELIMINADO): ?>
		<h3><img src="../../imagenes/pulgar.png">Perfil Eliminado</h3>
		<br>
		<br>
	<?php endif ?>

	<table border="1">
		<tr>
			<th><div class="columna">Descripcion</div></th>
			<th><div class="columna">Acciones</div></th>
		</tr>

		<?php foreach ($listadoPerfil as $perfil): ?>

			<tr>
				<td><div class="dato"><?php echo $perfil->getNombre(); ?></div></td>
				<td><a href="detalle.php?id=<?php echo $perfil->getIdPerfil()?>"><img src="../../imagenes/detalle.png"></a>
				<a href="modificar.php?id=<?php echo $perfil->getIdPerfil()?>"><img src="../../imagenes/ajustes.png"></a>
				<a href="procesar/eliminar.php?id=<?php echo $perfil->getIdPerfil()?>"><img src="../../imagenes/dejar.png"></a>
				</td>
			</tr>
		<?php endforeach ?>
	</table><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</div>
</body>
</html>