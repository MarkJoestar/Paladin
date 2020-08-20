<?php

require_once "../../../class/Barrio.php";


$id = $_GET['id'];

$barrio = Barrio::obtenerPorId($id);

$barrio->eliminar();

highlight_string(var_export($barrio, true));
header('Location: ../listado.php?mensaje=3');

?>