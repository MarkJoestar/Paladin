<?php

require_once '../../class/Empleado.php';
require_once '../../class/Funcion.php';

$idEmpleado = $_GET['id'];

$empleado = Empleado::obtenerPorId($idEmpleado);
$listadoFunciones = Funcion::obtenerTodos();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Empleado</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
	<script type="text/javascript">
            
            function validarDatos() {
                var nombre = document.getElementById("txtNombre").value;
                if (password.trim() == "") {
                    alert("El nombre no debe estar vacio");
                    return;
                }

                var apelldio = document.getElementById("txtApellido").value;
                if (apelldio.trim() == "") {
                    alert("El apelldio no debe estar vacio");
                    return;
                }

                var fechaNacimiento = document.getElementById("txtFechaNacimiento").value;
                if (fechaNacimiento.trim() == "") {
                    alert("La fecha de nacimiento no debe estar vacio");
                    return;
                }
                var tipoDocumento = document.getElementById("cboTipoDocumento").value;
                if (tipoDocumento.trim() == 0) {
                    alert("El tipo de documento no debe estar vacio");
                    return;
                }
                var numeroDocumento = document.getElementById("txtNumeroDocumento").value;
                if (numeroDocumento.trim() == "") {
                    alert("El numero de documento no debe estar vacio");
                    return;
                }
                var form = document.getElementById("frmDatos");
                form.submit();
            }
        </script>
</head>
<body>
    <?php require_once "../../menu.php"; ?>
    <div class="container">

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="txtId" value="<?php echo $empleado->getIdEmpleado(); ?>">

	        <label><div class="titulo"> Nombre:</div></label>
		    <input type="text" name="txtNombre" class="forma" id="txtNombre" value="<?php echo $empleado->getNombre(); ?>">
		    <br><br> <!-- Este es un comentario -->
		    <label><div class="titulo"> Apellido:</div></label>
		    <input type="text" name="txtApellido" class="forma" id="txtApellido" value="<?php echo $empleado->getApellido(); ?>">
		    <br><br>
		    <label><div class="titulo"> Fecha Nacimiento:</div></label>
		    <input type="date" name="txtFechaNacimiento" class="forma" id="txtFechaNacimiento" value="<?php echo $empleado->getFechaNacimiento(); ?>">
			<br><br> <!-- Salto de lineas -->
			<label><div class="titulo">Tipo Documento:</div> </label>
			<select class="forma" name="cboTipoDocumento" id="cboTipoDocumento">
			    <option value="0">Seleccionar</option>
			    <option value="1">DNI</option>
                <option value="2">Cedula</option>
			</select>
			<br><br> <!-- Salto de lineas -->
		    <label><div class="titulo">Numero Documento:</div></label>
		    <input type="text" name="txtNumeroDocumento" class="forma" id="txtNumeroDocumento" value="<?php echo $empleado->getNumeroDocumento(); ?>">
			<br><br> <!-- Salto de lineas -->
            <label><div class="titulo">Sueldo:</div></label>
            <input type="text" name="txtSueldo" class="forma" id="txtSueldo" value="<?php echo $empleado->getSueldo(); ?>">
            <br><br>
            <select name="cboFunciones[]" multiple style="width: 250px; height: 250px;" class="forma" >

                 <?php foreach ($listadoFunciones as $funcion) :?>
                    <?php
                    $selected = '';
                    $idFuncion = $funcion->getIdFuncion();
                    if ($empleado->tieneFuncion($idFuncion)) {
                        $selected = "SELECTED";
                    }
                    ?>
                    <option value="<?php echo $funcion->getIdFuncion(); ?>" <?php echo $selected ?> >
                        <?php echo $funcion ?>
                    </option>
                 <?php endforeach ?>
            </select>
            <br><br>
		    <input type="submit" name="btnGuardar" value="Actualizar" onclick="validarDatos();">			
		</form>
	</div>
</body>
</html>