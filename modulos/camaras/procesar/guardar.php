<?php  
require_once "../../../class/Camara.php";

$modelos = $_POST['txtModelo'];

if (empty(trim($modelos))) {
	echo "ERROR MODELO VACIO";
	header("location: ../alta.php");
	exit;
}


$camara = new Camara($modelos);

$camara->guardar();


highlight_string(var_export($camara, true));
header('Location: ../listado.php?mensaje=1');
?>