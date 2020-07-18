<?php

require_once "../../../class/Perfil.php";
require_once '../../../class/PerfilModulo.php';

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];
$listaModulos = $_POST['cboModulos'];


if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	header("location: ../modificar.php");
	exit;
}

$perfil = Perfil::obtenerPorId($id);
$perfil->setNombre($nombre);

$perfil->actualizar();

foreach ($listaModulos as $modulo_id) {
	$perfilModulo = PerfilModulo::obtenerPorId($id);
	$perfilModulo->setIdPerfil($perfil->getIdPerfil());
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->actualizar();
}

//highlight_string(var_export($perfil, true));
header('Location: ../listado.php?mensaje=2');