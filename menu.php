<?php

require_once "class/Usuario.php";

session_start();

if (!isset($_SESSION['usuario'])) {
	header('location: formulario_login.php');
}

$usuario = $_SESSION['usuario'];

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
		<div class="menu"><?php echo $usuario ?>
<br><br>
<a href="/PaladinC/modulos/empleados/listado.php"><div class="enlace">Empleados</div></a>
<br><br>
<a href="/PaladinC/modulos/usuarios/listado.php"><div class="enlace">Usuarios</div></a>
<br><br>
<a href="/PaladinC/modulos/funciones/listado.php"><div class="enlace">Funciones</div></a>
<br><br>
<a href="/PaladinC/modulos/modulos/listado.php"><div class="enlace">Modulos</div></a>
<br><br>
<a href="/PaladinC/modulos/perfiles/listado.php"><div class="enlace">Perfiles</div></a>
<br><br>
<a href="/PaladinC/modulos/sensores/listado.php"><div class="enlace">Sensores</div></a>
<br><br>
<a href="/PaladinC/modulos/ubicaciones/listado.php"><div class="enlace">Ubicaciones</div></a>
<br><br>
<a href="/PaladinC/modulos/camaras/listado.php"><div class="enlace">Camaras</div></a>
<br><br>
<a href="/PaladinC/modulos/empleado_dias/listado.php"><div class="enlace">Empleado Dias</div></a>
<br><br><br><br><br><br><br><br>
<a href="/PaladinC/logout.php"><div class="out">Salir</div></a></div>
</body>
</html>