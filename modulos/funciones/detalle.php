<?php
require_once '../../class/Funcion.php';

$id = $_GET['id'];
$funcion = Funcion::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>
    <?php require_once "../../menu.php"; ?>
    <div class="container">
	<div class="detalle">
	<?php echo $funcion;?>
	<br><br><br>
	<?php echo $funcion->getIdFuncion();?>
	<br><br>
	<?php echo $funcion->getDescripcion();?>
	</div>  
	<br><br><br><br><br><br>
	<a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
</div>
</body>
</html>