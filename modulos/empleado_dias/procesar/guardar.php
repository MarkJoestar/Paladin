<?php
require_once "../../../class/Empleado_dia.php";

$lunes = $_POST['chkLunes'];
$martes = $_POST['chkMartes'];
$miercoles = $_POST['chkMiercoles'];
$jueves = $_POST['chkJueves'];
$viernes = $_POST['chkViernes'];
$sabado = $_POST['chkSabado'];
$domingo = $_POST['chkDomingo'];/**/
//$yes = "../../../imagenes/check.png";
//$no = "../../../imagenes/cross.png";

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

$empleadoDia = new EmpleadoDia();
$empleadoDia->setLunes($lunes);
$empleadoDia->setMartes($martes);
$empleadoDia->setMiercoles($miercoles);
$empleadoDia->setJueves($jueves);
$empleadoDia->setViernes($viernes);
$empleadoDia->setSabado($sabado);
$empleadoDia->setDomingo($domingo);

$empleadoDia->guardar();
/*echo $lunes;
echo $martes;
echo $miercoles;
echo $jueves;
echo $viernes;
echo $sabado;
echo $domingo;*/


//highlight_string(var_export($empleadoDia, true));
header('Location: ../listado.php?mensaje=1');