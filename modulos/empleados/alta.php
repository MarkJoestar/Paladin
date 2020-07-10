<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Empleado</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    </style>
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

		<form name="frmDatos" method="POST" action="procesar/guardar.php">

	        <label>Nombre:</label>
		    <input type="text" name="txtNombre" class="forma" id="txtNombre">
		    <br><br> 

		    <label>Apellido:</label>
		    <input type="text" name="txtApellido" class="forma" id="txtApellido">
		    <br><br>

		    <label>Fecha Nacimiento:</label>
		    <input type="date" class="forma" name="txtFechaNacimiento">
			<br><br> 

			<label>Tipo Documento: </label>
			<select class="forma" name="cboTipoDocumento" id="cboTipoDocumento">
			    <option value="0">Seleccionar</option>
			    <option value="1">DNI</option>
                <option value="2">Cedula</option>
			</select>
			<br><br>

		    <label>Numero Documento:</label>
		    <input type="text" class="forma" name="txtNumeroDocumento" id="txtNumeroDocumento">
			<br><br> 

		    <label>Sueldo:</label>
		    <input type="text" class="forma" name="txtSueldo">
			<br><br> 

		    <input type="submit" name="btnGuardar" value="Guardar" onclick="validarDatos();">			
		</form></div><br><br><br><br><br><br><br>
</body>
</html>