<?php

require_once '../../class/Barrio.php';

$id = $_GET['id'];

$barrio = Barrio::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Barrio</title>
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

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="txtId" value="<?php echo $barrio->getIdBarrio(); ?>">
			<label><div class="titulo">Descripcion:</div></label>
		    <input type="text" name="txtDescripcion" class="forma" id="txtDescripcion" value="<?php echo $barrio->getDescripcion(); ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar" onclick="validarDatos();">		
		</form></div>
</body>
</html>