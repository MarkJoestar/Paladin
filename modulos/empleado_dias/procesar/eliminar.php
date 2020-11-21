<?php

require_once "../../../class/Empleado_dia.php";


$id = $_GET['id'];

$empleadoDia = EmpleadoDia::obtenerPorId($id);

$empleadoDia->eliminar();

highlight_string(var_export($empleadoDia, true));
header('Location: ../listado.php?mensaje=3');

?>