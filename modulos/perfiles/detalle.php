<?php
require_once '../../class/Perfil.php';

$id = $_GET['id'];
$perfil = Perfil::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>
    <?php require_once "../../menu.php"; ?>
    <div class="container">
	<div class="detalle">
	<?php echo $perfil;?>
	<br><br><br>
	<?php echo $perfil->getIdPerfil();?>
	<br><br>
	<?php echo $perfil->getNombre();?>
	<br><br>
	<?php foreach ($perfil->arrModulos as $modulo) : ?>

		<?php echo $modulo; ?>

		<a href="/PaladinC/modulos/modulos/eliminar.php?id=<?php echo $modulo->getIdPerfilModulo(); ?>">
		    Eliminar
		</a>

		<br>

	<?php endforeach ?>
	</div>  
	<br><br><br><br><br><br>
	<a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
</div>
</body>
</html>