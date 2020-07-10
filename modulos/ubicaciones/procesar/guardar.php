<?php  
require_once "../../../class/Ubicacion.php";

$descripcion = $_POST['txtDescripcion'];

if (empty(trim($descripcion))) {
	echo "ERROR DESCRIPCION VACIO";
	header("location: ../alta.php");
	exit;
}


$ubicacion = new Ubicacion($descripcion);

$ubicacion->guardar();


highlight_string(var_export($ubicacion, true));
header('Location: ../listado.php?mensaje=1');