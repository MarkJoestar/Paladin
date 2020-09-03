<?php

require_once "../../../class/Domicilio.php";

$idDomicilio = $_POST['txtId'];
$idPersona = $_POST['txtIdPersona'];
$idLlamada = $_POST['txtIdLlamada'];
$calle = $_POST['txtCalle'];
$torre = $_POST['txtTorre'];
$piso = $_POST['txtPiso'];
$manzana = $_POST['txtManzana'];
$sector = $_POST['txtSector'];
$numeroCasa = $_POST['txtNumeroCasa'];


if (empty(trim($calle))) {
	echo "ERROR, EL CAMPO CALLE ESTÁ VACIO";
	exit;
}

?>

<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
<?php

$domicilio = Domicilio::obtenerPorIdPersona($idPersona);
$domicilio->setCalle($calle);
$domicilio->setManzana($manzana);
$domicilio->setPiso($piso);
$domicilio->setSector($sector);
$domicilio->setNumeroCasa($numeroCasa);
$domicilio->setTorre($torre);

$domicilio->actualizar($idDomicilio);

//highlight_string(var_export($domicilio, true));
//exit;

header("location: /Paladin/modulos/empleados/detalle.php?id=$idLlamada");

?>
