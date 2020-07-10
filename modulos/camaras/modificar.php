<?php

require_once '../../class/Camara.php';

$id = $_GET['id'];

$camara = Camara::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Camara</title>
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

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="txtId" value="<?php echo $camara->getIdCamara(); ?>">
			<label><div class="titulo">Modelo:</div></label>
		    <input type="text" name="txtModelo" class="forma" id="txtModelo" value="<?php echo $camara->getModelos(); ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar" onclick="validarDatos();">			
		</form></div>
</body>
</html>