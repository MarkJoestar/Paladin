<!DOCTYPE html>
<html>
<head>
	<title>Nueva Camara</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
	<script type="text/javascript">
            
            function validarDatos() {
                var modelo = document.getElementById("txtModelo").value;
                if (modelo.trim() == "") {
                    alert("El modelo no debe estar vacio");
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
			<label><div class="titulo"> Modelo:</div></label>
		    <input type="text" class="forma" name="txtModelo" id="txtModelo">
			<br><br>
		    <input type="submit" name="btnGuardar" value="Guardar" onclick="validarDatos();"></div>
		</form>
</body>
</html>