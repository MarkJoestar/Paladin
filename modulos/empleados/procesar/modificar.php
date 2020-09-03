<?php

require_once "../../../class/Empleado.php";
require_once "../../../class/EmpleadoFuncion.php";

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];
$sueldo = $_POST['txtSueldo'];
$listaFunciones = $_POST['cboFunciones'];

if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	header("location: ../modificar.php");
	exit;
}

if (empty(trim($apellido))) {
	echo "ERROR APELLIDO VACIO";
	header("location: ../modificar.php");
	exit;
}

if (strlen(trim($nombre)) < 3) {
	echo"El nombre debe contener al menos 3 caracteres";
	header("location: ../modificar.php");
	exit;
}
if (empty(trim($fechaNacimiento))) {
	echo "ERROR FECHA DE NACIMIENO VACIO";
	header("location: ../modificar.php");
	exit;
}
if (empty(trim($numeroDocumento))) {
	echo "ERROR NUMERO DE DOCUMENTO VACIO";
	header("location: ../modificar.php");
	exit;
}

if ((int) $tipoDocumento == 0) {
	echo"Debe seleccionar el un tipo de documento";
	header("location: ../modificar.php");
	exit;
}



//$empleado = new Empleado($nombre, $apellido);
$empleado = Empleado::obtenerPorId($id);
$empleado->setNombre($nombre);
$empleado->setApellido($apellido);
$empleado->setFechaNacimiento($fechaNacimiento);
$empleado->setIdTipoDocumento($tipoDocumento);
$empleado->setNumeroDocumento($numeroDocumento);
$empleado->setSueldo($sueldo);

$empleado->actualizar();

$empleado->eliminarFunciones();

foreach ($listaFunciones as $funcion_id) {
	$empleadoFuncion = new EmpleadoFuncion();
	$empleadoFuncion->setIdEmpleado($empleado->getIdEmpleado());
	$empleadoFuncion->setIdFuncion($funcion_id);
	$empleadoFuncion->guardar();
}

//highlight_string(var_export($empleado, true));
header('Location: ../listado.php?mensaje=2');



?>