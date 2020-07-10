<?php

require_once "../../../class/Camara.php";


$id = $_GET['id'];

$camara = Camara::obtenerPorId($id);

$camara->eliminar();

highlight_string(var_export($camara, true));
header('Location: ../listado.php?mensaje=3');

?>
