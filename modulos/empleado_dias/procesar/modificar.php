<?php

require_once "../../../class/Empleado_dia.php";

$id = $_POST['txtId'];
$lunes = $_POST['chkLunes'];
$martes = $_POST['chkMartes'];
$miercoles = $_POST['chkMiercoles'];
$jueves = $_POST['chkJueves'];
$viernes = $_POST['chkViernes'];
$sabado = $_POST['chkSabado'];
$domingo = $_POST['chkDomingo'];

if (isset($_POST['chkLunes'])){
	$lunes = 1;
} else {
		$lunes = 0;
}
if (isset($_POST['chkMartes'])){
	$martes = 1;
}
	else {
		$martes = 0;
}

if (isset($_POST['chkMiercoles'])){
	$miercoles = 1;
}
	else {
		$miercoles = 0;
}

if (isset($_POST['chkJueves'])){
	$jueves = 1;
}
	else {
		$jueves = 0;
}

if (isset($_POST['chkViernes'])){
	$viernes = 1;
}
	else {
		$viernes = 0;
}
if (isset($_POST['chkSabado'])){
	$sabado = 1;
}
	else {
		$sabado = 0;
}

if (isset($_POST['chkDomingo'])){
	$domingo = 1;
}
	else {
		$domingo = 0;
}

$empleadoDia = EmpleadoDia::obtenerPorId($id);
$empleadoDia->setLunes($lunes);
$empleadoDia->setMartes($martes);
$empleadoDia->setMiercoles($miercoles);
$empleadoDia->setJueves($jueves);
$empleadoDia->setViernes($viernes);
$empleadoDia->setSabado($sabado);
$empleadoDia->setDomingo($domingo);

$empleadoDia->actualizar();

//highlight_string(var_export($empleadoDia, true));
header('Location: ../listado.php?mensaje=2');

?>