<?php
require_once '../../class/Horario.php';

$id = $_GET['id'];
$horario = Horario::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php echo $horario;?>
	<br>
	<?php echo $horario->getHoraEntrada();?>
	<br>
	<?php echo $horario->getHoraSalida();?>
	<br><br><br>
	<a href="listado.php">Volver al Listado</a>

</body>
</html>