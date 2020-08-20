<?php  
require_once "../../../class/Barrio.php";

$descripcion = $_POST['txtDescripcion'];

if (empty(trim($descripcion))) {
	echo "ERROR DESCRIPCION VACIO";
	header("location: ../alta.php");
	exit;
}


$barrio = new Barrio($descripcion);

$barrio->guardar();


highlight_string(var_export($barrio, true));
header('Location: ../listado.php?mensaje=1');