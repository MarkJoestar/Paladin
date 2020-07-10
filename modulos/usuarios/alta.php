<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Usuario</title>
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
                if (nombre.trim() == "") {
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

		<form name="frmDatos" method="POST" action="procesar/guardar.php">
			<label><div class="titulo"> Username:</div></label>
		    <input type="text" class="forma" name="txtUsername" id="txtUsername">
			<br><br>
			<label><div class="titulo">Password:</div></label>
		    <input type="password" class="forma" name="txtPassword" id="txtPassword">
			<br><br> 
	        <label><div class="titulo">Nombre:</div></label>
		    <input type="text" class="forma" name="txtNombre" id="txtNombre">
		    <br><br> 
		    <label><div class="titulo">Apellido:</div></label>
		    <input type="text" class="forma" name="txtApellido" id="txtApellido">
		    <br><br>
		    <label><div class="titulo">Fecha Nacimiento:</div></label>
		    <input type="date" class="forma" name="txtFechaNacimiento" id="txtFechaNacimiento">
			<br><br> 
			<label><div class="titulo">Tipo Documento: </div></label>
			<select class="forma" name="cboTipoDocumento" id="cboTipoDocumento">
			    <option value="0">Seleccionar</option>
			    <option value="1">DNI</option>
                <option value="2">Cedula</option>
			</select>
			<br><br>
		    <label><div class="titulo">Numero Documento:</div></label>
		    <input type="text" class="forma" name="txtNumeroDocumento" id="txtNumeroDocumento">
			<br><br> 
			
		    <input type="submit" name="btnGuardar" value="Guardar" onclick="validarDatos();">			
		</form></div>
</body>
</html>
