<?php  
require_once "../../../class/Horario.php";

$horaEntrada = $_POST['txtHoraEntrada'];
$horaSalida = $_POST['txtHoraSalida'];

if (empty(trim($horaEntrada))) {
	echo "ERROR HORA DE ENTRADA VACIO";
	header("location: ../alta.php");
	exit;
}
if (empty(trim($horaSalida))) {
	echo "ERROR HORA DE SALIDA VACIO";
	header("location: ../alta.php");
	exit;
}


$horario = Horario::obtenerPorId($id);
$horario->setHoraEntrada($horaEntrada);
$horario->setHoraSalida($horaSalida);

$horario->actualizar();


highlight_string(var_export($horario, true));
header('Location: ../listado.php?mensaje=1');