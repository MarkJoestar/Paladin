<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Barrio</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
	<script type="text/javascript">
            
            function validarDatos() {
                var descripcion = document.getElementById("txtDescripcion").value;
                if (descripcion.trim() == "") {
                    alert("La descripcion no debe estar vacio");
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
			<label><div class="titulo"> Descripcion:</div></label>
		    <input type="text" class="forma" name="txtDescripcion" id="txtDescripcion">
			<br><br>
		    <input type="submit" name="btnGuardar" value="Guardar" onclick="validarDatos();">			
		</form></div>
</body>
</html>