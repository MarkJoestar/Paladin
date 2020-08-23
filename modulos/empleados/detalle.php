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
	<?php// foreach ($empleado->getFunciones() as $funcion): ?>

		<?php //echo $funcion->getDescripcion(); ?>

	<?php// endforeach ?>
    <?php if (is_null($empleado->domicilio)) : ?>
    	<a href="/PaladinC/modulos/domicilios/alta.php?idPersona=<?php echo $empleado->getIdPersona(); ?>&idEmpleado=<?php echo $empleado->getIdEmpleado(); ?>&modulo=empleados">
    		<i class="fas fa-plus-circle"></i> Agregar
    	</a>
    <?php else: ?>
     <?php echo $empleado->domicilio; ?>
     <a href="/PaladinC/modulos/domicilios/actualizar.php?idDomicilio=<?php echo $empleado->domicilio->getIdDomicilio(); ?>&idPersona=<?php echo $empleado->getIdPersona(); ?>&idEmpleado=<?php echo $empleado->getIdEmpleado(); ?>">
     	<i class="fas fa-edit" title="Editar dirección"></i>
     </a>
    <?php endif ?>

</div>

<br><br><br><br><br><br>
<a href="listado.php"><div class="back"><img src="../../imagenes/regreso.png"></div></a>
</div>
</body>
</html>