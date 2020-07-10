<?php

require_once '../../class/Perfil.php';

$id = $_GET['id'];

$perfil = Perfil::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Perfil</title>
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

		<form name="frmDatos" method="POST" action="procesar/modificar.php">

			<input type="hidden" name="txtId" value="<?php echo $perfil->getIdPerfil(); ?>">
			<label><div class="titulo">Nombre:</div></label>
		    <input type="text" name="txtNombre" class="forma" id="txtNombre" value="<?php echo $perfil->getNombre(); ?>">
		    <br><br>

		    <input type="submit" name="btnGuardar" value="Actualizar" onclick="validarDatos();">	
		</form></div>
</body>
</html>