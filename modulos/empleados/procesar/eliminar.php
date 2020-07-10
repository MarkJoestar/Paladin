<?php

require_once "../../class/Empleado.php";

$id = $_GET['id'];

$empleado = Empleado::obtenerPorId($id);

$empleado->eliminar();

header('Location: listado.php?mensaje=3');

?>
