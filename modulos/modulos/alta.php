<!DOCTYPE html>
<html>
<head>
	<title>Nueva Modulo</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
	<script type="text/javascript">
            
            function validarDatos() {
                var nombre = document.getElementById("txtNombre").value;
                if (nombre.trim() == "") {
                    alert("El nombre no debe estar vacio");
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
		    <input type="text" class="forma" name="txtNombre" id="txtNombre">
			<br><br>
		    <input type="submit" name="btnGuardar" value="Guardar" onclick="validarDatos();">			
		</form></div>
</body>
</html>