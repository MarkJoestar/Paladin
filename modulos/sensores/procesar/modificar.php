<?php

require_once "../../../class/Sensor.php";

$id = $_POST['txtId'];
$modelo = $_POST['txtModelo'];


if (empty(trim($modelo))) {
	echo "ERROR MODELO VACIO";
	header("location: ../alta.php");
	exit;
}


$sensor = Sensor::obtenerPorId($id);
$sensor->setModelo($modelo);

$sensor->actualizar();

highlight_string(var_export($sensor, true));
header('Location: ../listado.php?mensaje=2');