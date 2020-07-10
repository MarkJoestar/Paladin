<?php

require_once "../../../class/Ubicacion.php";


$id = $_GET['id'];

$ubicacion = Ubicacion::obtenerPorId($id);

$ubicacion->eliminar();

highlight_string(var_export($ubicacion, true));
header('Location: ../listado.php?mensaje=3');

?>