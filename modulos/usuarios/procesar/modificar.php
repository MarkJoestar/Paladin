<?php

require_once "../../../class/Usuario.php";

$id = $_POST['txtId'];
$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$fechaNacimiento = $_POST['txtFechaNacimiento'];
$tipoDocumento = $_POST['cboTipoDocumento'];
$numeroDocumento = $_POST['txtNumeroDocumento'];


if (empty(trim($username))) {
	echo "ERROR USUARIO VACIO";
	header("location: ../alta.php");
	exit;
}
if (empty(trim($password))) {
	echo "ERROR PASSWORD VACIO";
	header("location: ../alta.php");
	exit;
}
if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	header("location: ../alta.php");
	exit;
}

if (empty(trim($apellido))) {
	echo "ERROR APELLIDO VACIO";
	header("location: ../alta.php");
	exit;
}

if (strlen(trim($nombre)) < 3) {
	echo"El nombre debe contener al menos 3 caracteres";
	header("location: ../alta.php");
	exit;
}
if (empty(trim($fechaNacimiento))) {
	echo "ERROR FECHA DE NACIMIENO VACIO";
	header("location: ../alta.php");
	exit;
}
if (empty(trim($numeroDocumento))) {
	echo "ERROR NUMERO DE DOCUMENTO VACIO";
	header("location: ../alta.php");
	exit;
}

if ((int) $tipoDocumento == 0) {
	echo"Debe seleccionar el un tipo de documento";
	header("location: ../alta.php");
	exit;
}

//$usuario = new Empleado($nombre, $apellido);
$usuario = Usuario::obtenerPorId($id);
$usuario->setUsername($username);
$usuario->setPassword($password);
$usuario->setNombre($nombre);
$usuario->setApellido($apellido);
$usuario->setFechaNacimiento($fechaNacimiento);
$usuario->setIdTipoDocumento($tipoDocumento);
$usuario->setNumeroDocumento($numeroDocumento);

$usuario->actualizar();

highlight_string(var_export($usuario, true));
header('Location: ../listado.php?mensaje=2');



?>