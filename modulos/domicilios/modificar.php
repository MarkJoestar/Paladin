<?php

require_once '../../class/Domicilio.php';

$idDomicilio = $_GET['idDomicilio'];
$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];

$domicilio = Domicilio::obtenerPorIdPersona($idPersona);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Modificar Domicilio</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
	<script type="text/javascript">
            
            function validarDatos() {
                var calle = document.getElementById("txtCalle").value;
                if (calle.trim() == "") {
                    alert("La calle no debe estar vacio");
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

			<input type="hidden" name="txtId" value="<?php echo $domicilio->getIdDomicilio(); ?>">
            <input type="hidden" name="txtIdPersona" value='<?php echo $idPersona ?>'>
            <input type="hidden" name="txtIdLlamada" value='<?php echo $idLlamada ?>'>
			<label><div class="titulo">Calle:</div></label>
		    <input type="text" name="txtCalle" class="forma" id="txtCalle" value="<?php echo $domicilio->getCalle();?>">
		    <br><br>
		    <label><div class="titulo">Manzana:</div></label>
		    <input type="text" name="txtManzana" class="forma" id="txtManzana" value="<?php echo $domicilio->getManzana(); ?>">
		    <br><br>
	        <label><div class="titulo">Numero de Casa:</div></label>
		    <input type="text" name="txtNumeroCasa" class="forma" id="txtNumeroCasa" value="<?php echo $domicilio->getNumeroCasa(); ?>">
		    <br><br> <!-- Este es un comentario -->
		    <label><div class="titulo">Torre:</div></label>
		    <input type="text" name="txtTorre" class="forma" id="txtTorre" value="<?php echo $domicilio->getTorre(); ?>">
		    <br><br>
		    <label><div class="titulo">Piso:</div></label>
		    <input type="text" name="txtPiso" class="forma" id="txtPiso" value="<?php echo $domicilio->getPiso(); ?>">
			<br><br> <!-- Salto de lineas -->
		    <label><div class="titulo">Sector:</div></label>
		    <input type="text" name="txtSector" class="forma" id="txtSector" value="<?php echo $domicilio->getSector(); ?>">
			<br><br> <!-- Salto de lineas -->

		    <input type="submit" name="btnGuardar" value="Actualizar" onclick="validarDatos();">			
		</form></div>
</body>
</html>