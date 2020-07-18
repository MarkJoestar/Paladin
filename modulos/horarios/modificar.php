<?php

require_once '../../class/Sensor.php';

$id = $_GET['id'];

$sensor = Sensor::obtenerPorId($id);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Horario</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
	<script type="text/javascript">
            
            function validarDatos() {
                var horaEntrada = document.getElementById("txtHoraEntrada").value;
                if (horaEntrada.trim() == "") {
                    alert("La hora de entrada no debe estar vacio");
                    return;
                var horaSalida = document.getElementById("txtHoraSalida").value;
                if (horaSalida.trim() == "") {
                    alert("La hora de salida no debe estar vacio");
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
			<label><div class="titulo"> Hora de Entreda:</div></label>
		    <input type="time" class="forma" name="txtHoraEntrada" id="txtHoraEntrada">
			<br><br>
			<label><div class="titulo"> Hora de Salida:</div></label>
		    <input type="time" class="forma" name="txtHoraSalida" id="txtHoraSalida">
			<br><br>
		    <input type="submit" name="btnGuardar" value="Guardar" onclick="validarDatos();">			
		</form></div>
</body>
</html>