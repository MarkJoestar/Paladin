<?php
require_once '../../class/Barrio.php';

$id = $_GET['id'];
$barrio = Barrio::obtenerPorId($id);

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
	<?php echo $barrio;?>
	<br><br><br>
	<?php echo $barrio->getIdBarrio();?>
	<br><br>
	<?php echo $barrio->getDescripcion();?>
	</div>  
	<br><br><br><br><br><br>
	<a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
</div>

</body>
</html>