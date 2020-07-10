<?php
require_once '../../class/Usuario.php';

$id = $_GET['id'];
$usuario = Usuario::obtenerPorId($id);

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
	<?php echo $usuario;?>
	<br><br><br>
	<?php echo $usuario->getUsername();?>
	<br><br>
	<?php echo $usuario->getPassword();?>
	</div>  
	<br><br><br><br><br><br>
	<a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
</div>

</body>
</html>