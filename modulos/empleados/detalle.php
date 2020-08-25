<?php
require_once '../../class/Empleado.php';

$id = $_GET['id'];
$empleado = Empleado::obtenerPorId($id);

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>
    <?php require_once "../../menu.php"; ?>
    <div class="container">
	<div class="detalle">
	<?php echo $empleado;?>
	<br><br><br>
	<?php echo $empleado->getNumeroDocumento();?>
	<br><br>
	<?php echo $empleado->getFechaNacimiento();?>
	<br><br>
	<?php foreach ($empleado->getFunciones() as $funcion): ?>

		<?php echo $funcion->getDescripcion(); ?>

	<?php endforeach ?>
    <?php

    if (is_null($empleado->domicilio)) : ?>    

        <a href="/Paladin/modulos/domicilios/alta.php?idPersona=<?php echo $empleado->getIdPersona(); ?>&idLlamada=<?php echo $empleado->getIdEmpleado(); ?>&modulo=empleados">
            Agregar Domiclio
        </a>
    <?php else:?>

        <?php echo $empleado->domicilio; ?>
        <a href="/Paladin/modulos/domicilios/modificar.php?idDomicilio=<?php echo $empleado->domicilio->getIdDomicilio(); ?>">
            Modificar Domicilio
        </a>

    <?php endif ?>

</div>

<br><br><br><br><br><br>
<a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
</div>
</body>
</html>
