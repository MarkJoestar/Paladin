<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Empleado-Dia</title>
	<link rel="stylesheet" type="text/css" href="../../style.css">
</head>
<body>
    <?php require_once "../../menu.php"; ?>
    <div class="container">
  <form name="frmDatos" action="procesar/guardar.php" method="POST" target="_blank" >
    <label><div class="titulo"> Lunes:</div></label>
    <input type="checkbox" class="forma" name="cb-lun" value="1"/>
    <label><div class="titulo"> Martes:</div></label>
    <input type="checkbox" class="forma"  name="cb-mar" value="1"/>
    <label><div class="titulo"> Miercoles:</div></label>
    <input type="checkbox" class="forma" name="cb-mie" value="1"/>
    <label><div class="titulo"> Jueves:</div></label>
    <input type="checkbox" class="forma" name="cb-jue" value="1"/>
    <label><div class="titulo"> Viernes:</div></label>
    <input type="checkbox" class="forma" name="cb-vie" value="1"/>
    <label><div class="titulo"> Sabado:</div></label>
    <input type="checkbox" class="forma" name="cb-sab" value="1"/>
    <label><div class="titulo"> Domingo:</div></label>
    <input type="checkbox" class="forma" name="cb-dom" value="1"/>
    <br>
    <input type="submit" id="submit" name="submit"  />
    </form></div>
</body>
</html>