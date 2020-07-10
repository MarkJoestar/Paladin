<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Horario</title>
</head>
<body>

		<form name="frmDatos" method="POST" action="procesar/guardar.php">
			<label>Hora de Entrada:</label>
		    <input type="datetime" name="txtHoraEntrada">
			<br><br>
			<label>Hora de Salida:</label>
		    <input type="datetime" name="txtHoraSalida">
			<br><br> 
		    <input type="submit" name="btnGuardar" value="Guardar">			
		</form>
</body>
</html>
