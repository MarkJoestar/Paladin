<?php

require_once "../../../class/Horario.php";


$id = $_GET['id'];

$horario = Horario::obtenerPorId($id);

$horario->eliminar();

highlight_string(var_export($horario, true));
header('Location: ../listado.php?mensaje=3');

?>
