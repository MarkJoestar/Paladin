<?php

require_once '../../class/Usuario.php';

$id = $_GET['id'];

$usuario = Usuario::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Usuario</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
	<script type="text/javascript">
            
            function validarDatos() {
                var username = document.getElementById("txtUsername").value;
                if (username.trim() == "") {
                    alert("El username no debe estar vacio");
                    return;
                }

                var password = document.getElementById("txtPassword").value;
                if (password.trim() == "") {
                    alert("El password no debe estar vacio");
                    return;
                }

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
                if (tipoDocumento.trim() == "0") {
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

			<input type="hidden" name="txtId" value="<?php echo $usuario->getIdUsuario(); ?>">
			<label><div class="titulo">Username:</div></label>
		    <input type="text" name="txtUsername" class="forma" value="<?php echo $usuario->getUsername(); ?>">
		    <br><br>
		    <label><div class="titulo">Password:</div></label>
		    <input type="password" name="txtPassrod" class="forma" value="<?php echo $usuario->getPassword(); ?>">
		    <br><br>
	        <label><div class="titulo">Nombre:</div></label>
		    <input type="text" name="txtNombre" class="forma" value="<?php echo $usuario->getNombre(); ?>">
		    <br><br> <!-- Este es un comentario -->
		    <label><div class="titulo">Apellido:</div></label>
		    <input type="text" name="txtApellido" class="forma" value="<?php echo $usuario->getApellido(); ?>">
		    <br><br>
		    <label><div class="titulo">Fecha Nacimiento:</div></label>
		    <input type="date" name="txtFechaNacimiento" class="forma" value="<?php echo $usuario->getFechaNacimiento(); ?>">
			<br><br> <!-- Salto de lineas -->
			<label><div class="titulo">Tipo Documento: </div></label>
			<select class="forma" name="cboTipoDocumento">
			    <option value="0">Seleccionar</option>
			    <option value="1">DNI</option>
                <option value="2">Cedula</option>
			</select>
			<br><br> <!-- Salto de lineas -->
		    <label><div class="titulo">Numero Documento:</div></label>
		    <input type="text" name="txtNumeroDocumento" class="forma" value="<?php echo $usuario->getNumeroDocumento(); ?>">
			<br><br> <!-- Salto de lineas -->

		    <input type="submit" name="btnGuardar" value="Actualizar" onclick="validarDatos();">			
		</form></div>
</body>
</html>
