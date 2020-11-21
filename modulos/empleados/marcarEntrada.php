<?php

require_once "../../class/Empleado.php";



$numeroDocumento = $_POST['txtNumeroDocumento'];
$horario = $_POST['cboHorarios'];


$empleado = Empleado::marcar($numeroDocumento);
$empleado->setIdHorario($horario);

//highlight_string(var_export($usuario, true));
//exit;

if ($empleado->confirmar()) {
	$empleado->marcarEntrada();
	//header("location: ../../dashboard.php");
} else {
	header("location: ../../entrada.php");
}