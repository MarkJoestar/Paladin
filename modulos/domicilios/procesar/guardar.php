<?php  
require_once "../../../class/Domicilio.php";
require_once "../../../class/Barrio.php";

$idPersona = $_POST['txtIdPersona'];
$idLlamada = $_POST['txtIdLlamada'];
//$idEmpleado = $_POST['txtIdEmpleado'];
//$idBarrio = $_POST['txtBarrio'];
$calle = $_POST['txtCalle'];
$manzana = $_POST['txtManzana'];
$numeroCasa = $_POST['txtNumeroCasa'];
$piso = $_POST['txtPiso'];
$torre = $_POST['txtTorre'];
$sector = $_POST['txtSector'];
$modulo = $_POST['txtModulo'];
//$barrio = $_POST['cboBarrio'];



if (empty(trim($calle))) {
	echo "ERROR CALLE VACIO";
	header("location: ../alta.php");
	exit;
}




$domicilio = new Domicilio();
$domicilio->setCalle($calle);
$domicilio->setManzana($manzana);
$domicilio->setNumeroCasa($numeroCasa);
$domicilio->setPiso($piso);
$domicilio->setTorre($torre);
$domicilio->setSector($sector);
$domicilio->setIdPersona($idPersona);
//$domicilio->getIdBarrio($barrio);

$domicilio->guardar();

//highlight_string(var_export($domicilio, true));
header("location: /Paladin/modulos/$modulo/detalle.php?id=$idLlamada");


?>