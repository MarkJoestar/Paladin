<?php

require_once "../../../class/Perfil.php";
require_once '../../../class/PerfilModulo.php';

$id = $_POST['txtId'];
$nombre = $_POST['txtNombre'];


if (empty(trim($nombre))) {
	echo "ERROR NOMBRE VACIO";
	header("location: ../alta.php");
	exit;
}

$perfil = Perfil::obtenerPorId($id);
$perfil->setNombre($nombre);

$perfil->actualizar();

foreach ($listaModulos as $modulo_id) {
	$perfilModulo = new PerfilModulo();
	$perfilModulo->setIdPerfil($perfil->getIdPerfil());
	$perfilModulo->setIdModulo($modulo_id);
	$perfilModulo->guardar();
}

highlight_string(var_export($perfil, true));
header('Location: ../listado.php?mensaje=2');