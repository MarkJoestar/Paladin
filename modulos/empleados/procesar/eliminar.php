<?php

require_once "../../../class/Empleado.php";


$id = $_GET['id'];

$empleado = Empleado::obtenerPorId($id);

$empleado->eliminar();

highlight_string(var_export($empleado, true));
header('Location: ../listado.php?mensaje=3');

?>
