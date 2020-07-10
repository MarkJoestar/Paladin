<?php

require_once '../../class/Ubicacion.php';

$id = $_GET['id'];

$ubicacion = Ubicacion::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Ubicacion</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
	<script type="text/javascript">
            
            function validarDatos() {
                var descripcion = document.getElementById("txtDescripcion").value;
                if (descripcion.trim() == "") {
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

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="txtId" value="<?php echo $ubicacion->getIdUbicacion(); ?>">
			<label><div class="titulo">Descripcion:</div></label>
		    <input type="text" name="txtDescripcion" class="forma" id="txtDescripcion" value="<?php echo $ubicacion->getDescripcion(); ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar" onclick="validarDatos();">		
		</form></div>
</body>
</html>