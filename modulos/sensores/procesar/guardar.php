<?php  
require_once "../../../class/Sensor.php";

$modelo = $_POST['txtModelo'];

if (empty(trim($modelo))) {
	echo "ERROR MODELO VACIO";
	header("location: ../alta.php");
	exit;
}


$sensor = new Sensor($modelo);

$sensor->guardar();


highlight_string(var_export($sensor, true));
header('Location: ../listado.php?mensaje=1');