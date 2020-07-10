<?php
require_once '../../class/Empleado.php';

$id = $_GET['id'];
$empleado = Empleado::obtenerPorId($id);

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
	<?php echo $empleado;?>
	<br><br><br>
	<?php echo $empleado->getNumeroDocumento();?>
	<br><br>
	<?php echo $empleado->getFechaNacimiento();?>
	</div>  
	<br><br><br><br><br><br>
	<a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
</div>

</body>
</html>