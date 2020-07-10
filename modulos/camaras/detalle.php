<?php
require_once '../../class/Camara.php';

$id = $_GET['id'];
$camara = Camara::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body><?php require_once "../../menu.php"; ?>
<div class="container"> 
	<div class="detalle">
    <?php echo $camara;?>
	<br><br><br>
	<?php echo $camara->getIdCamara();?>
	<br><br>
	<?php echo $camara->getModelos();?>
	<br><br>
</div>  
	<br><br><br><br><br><br>
	<a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
</div>
</body>
</html>