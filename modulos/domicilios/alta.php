<?php

require_once "../../class/Barrio.php";

$listadoBarrio = Barrio::obtenerTodos();

$idPersona = $_GET['idPersona'];
$idLlamada = $_GET['idLlamada'];
$moduloLlamada = $_GET['modulo'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Domiclio</title>
    <link rel="stylesheet" type="text/css" href="../../style.css">
    </style>
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
    <?php require_once "../../menu.php";?>
    <div class="container">

		<form name="frmDatos" method="POST" action="procesar/guardar.php">
            <input type="hidden" name="txtIdPersona" value='<?php echo $idPersona ?>'>
            <input type="hidden" name="txtModulo" value='<?php echo $moduloLlamada ?>'>
            <input type="hidden" name="txtIdLlamada" value='<?php echo $idLlamada ?>'>

	        <label><div class="titulo">Calle:</div></label>
		    <input type="text" name="txtCalle" class="forma" id="txtCalle">
		    <br><br> 

            <label><div class="titulo">Manzana:</div></label>
            <input type="text" class="forma" name="txtManzana" id="txtManzana">
            <br><br> 

            <label><div class="titulo">Numero de Casa:</div></label>
            <input type="text" class="forma" name="txtNumeroCasa" id="txtNumeroCasa">
            <br><br> 

		    <label><div class="titulo">Torre:</div></label>
		    <input type="text" name="txtTorre" class="forma" id="txtTorre">
		    <br><br>

		    <label><div class="titulo">Piso:</div></label>
		    <input type="text" class="forma" name="txtPiso">
			<br><br> 

            <label><div class="titulo">Sector:</div></label>
            <input type="text" class="forma" name="txtSector" id="txtSector">
            <br><br> 

		    <input type="submit" name="btnGuardar" value="Guardar" onclick="validarDatos();">			
		</form></div><br><br><br><br><br><br><br>
</body>
</html>