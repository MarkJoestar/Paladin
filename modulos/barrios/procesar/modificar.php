<?php

require_once "../../../class/Barrio.php";

$id = $_POST['txtId'];
$descripcion = $_POST['txtDescripcion'];


if (empty(trim($descripcion))) {
	echo "ERROR DESCRIPCION VACIO";
	header("location: ../alta.php");
	exit;
}

$barrio = Barrio::obtenerPorId($id);
$barrio->setDescripcion($descripcion);

$barrio->actualizar();

highlight_string(var_export($barrio, true));
header('Location: ../listado.php?mensaje=2');