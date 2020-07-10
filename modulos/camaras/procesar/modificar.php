<?php

require_once "../../../class/Camara.php";

$id = $_POST['txtId'];
$modelos = $_POST['txtModelo'];


if (empty(trim($modelos))) {
	echo "ERROR modelos VACIO";
	header("location: ../alta.php");
	exit;
}


$camara = Camara::obtenerPorId($id);
$camara->setModelos($modelos);

$camara->actualizar();

highlight_string(var_export($camara, true));
header('Location: ../listado.php?mensaje=2');