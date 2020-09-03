<?php  
require_once "../../../class/Empleado_dia.php";

$lunes = $_POST['cb-lun'];
$martes = $_POST['cb-mar'];
$miercoles = $_POST['cb-mie'];
$jueves = $_POST['cb-jue'];
$viernes = $_POST['cb-vie'];
$sabado = $_POST['cb-sab'];
$domingo = $_POST['cb-dom'];


$empleadoDia = new EmpleadoDia();
$empleadoDia->setLunes($lunes);
$empleadoDia->setMartes($martes);
$empleadoDia->setMiercoles($miercoles);
$empleadoDia->setJueves($jueves);
$empleadoDia->setViernes($viernes);
$empleadoDia->setSabado($sabado);
$empleadoDia->setDomingo($domingo);

$empleadoDia->guardar();


highlight_string(var_export($empleadoDia, true));
//header('Location: ../listado.php?mensaje=1');