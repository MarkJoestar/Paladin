<?php

require_once "../../class/Modulo.php";
require_once "../../class/Perfil.php";


$idPerfil = $_GET['id'];

$perfil = Perfil::obtenerPorId($idPerfil);
$listadoModulos = Modulo::obtenerTodos();


//highlight_string(var_export($perfil, true));
//exit;

?>


<!DOCTYPE html>
<html>
<head>
    <title>Modificacion de Perfil</title>
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
    <br>
    <br>

    <h4>Modificacion de Perfil</h4>
    <br>

        <form name="frmDatos" method="POST" action="procesar/modificar.php">

            <input type="hidden" name="txtIdPerfil" value="<?php echo $idPerfil; ?>">

            <label><div class="titulo">Nombre:</div></label>
            <input type="text" name="txtNombre" class="forma" value="<?php echo $perfil->getNombre(); ?> ">
            <br><br>

            <select name="cboModulos[]" multiple style="width: 250px; height: 250px;" class="forma" >

                 <?php foreach ($listadoModulos as $modulo) :?>

                    <?php

                    $selected = '';
                    $idModulo = $modulo->getIdModulo();

                    if ($perfil->tieneModulo($idModulo)) {
                        $selected = "SELECTED";
                    }

                    ?>

                    <option value="<?php echo $modulo->getIdModulo(); ?>" <?php echo $selected ?> >
                        <?php echo $modulo ?>
                    </option>

                 <?php endforeach ?>

            </select>
            <br><br>

            <input type="submit" name="btnGuardar" value="Guardar">         

        </form></div>

</body>
</html>