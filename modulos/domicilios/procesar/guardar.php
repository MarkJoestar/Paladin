<?php  
require_once "../../../class/Domicilio.php";

$idPersona = $_POST['txtIdPersona'];
$idEmpleado = $_POST['txtIdEmpleado'];
$calle = $_POST['txtCalle'];
$manzana = $_POST['txtManzana'];
$numeroCasa = $_POST['txtNumeroCasa'];
$piso = $_POST['txtPiso'];
$torre = $_POST['txtTorre'];
$sector = $_POST['txtSector'];
$barrio = $_POST['cboBarrio'];


if (empty(trim($calle))) {
	echo "ERROR CALLE VACIO";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($manzana))) {
	echo "ERROR MANZANA VACIO";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($numeroCasa))) {
	echo "ERROR NUMERO DE CASA VACIO";
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
$domicilio->setIdBarrio($idBarrio);

$domicilio->guardar();

//highlight_string(var_export($domicilio, true));
header("location: /PaladinC/modulos/$modulo/detalle.php?id=$idLlamada");


?>