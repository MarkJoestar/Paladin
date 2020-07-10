<?php

require_once "../../../class/Sensor.php";


$id = $_GET['id'];

$sensor = Sensor::obtenerPorId($id);

$sensor->eliminar();

highlight_string(var_export($sensor, true));
header('Location: ../listado.php?mensaje=3');

?>
