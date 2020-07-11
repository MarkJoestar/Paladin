<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Empleado</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    </style>
	<script type="text/javascript">
            
            function validarDatos() {
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

	        <label><div class="titulo">Nombre:</div></label>
		    <input type="text" name="txtNombre" class="forma" id="txtNombre">
		    <br><br> 

		    <label><div class="titulo">Apellido:</div></label>
		    <input type="text" name="txtApellido" class="forma" id="txtApellido">
		    <br><br>

		    <label><div class="titulo">Fecha Nacimiento:</div></label>
		    <input type="date" class="forma" name="txtFechaNacimiento">
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

		    <label><div class="titulo">Sueldo:</div></label>
		    <input type="text" class="forma" name="txtSueldo">
			<br><br>

		    <input type="submit" name="btnGuardar" value="Guardar" onclick="validarDatos();">			
		</form></div><br><br><br><br><br><br><br>
</body>
</html>