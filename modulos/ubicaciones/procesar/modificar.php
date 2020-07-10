<?php

require_once "../../../class/Ubicacion.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];


if (empty(trim($descripcion))) {
	echo "ERROR DESCRIPCION VACIO";
	header("location: ../alta.php");
	exit;
}

$ubicacion = Ubicacion::obtenerPorId($id);
$ubicacion->setDescripcion($descripcion);

$ubicacion->actualizar();

highlight_string(var_export($ubicacion, true));
header('Location: ../listado.php?mensaje=2');