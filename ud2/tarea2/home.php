<?php
session_start(); //Arrancamos sesión
include_once("crearConexion.php"); //Para utilizar crearConexion
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <?php
    echo "<p>¡Bienvenido Sr./Sra. ".$_SESSION["rowUser"]['apellido1']." ".$_SESSION["rowUser"]['apellido2']."!</p>";
    ?>
    <p>¿Que desea hacer?</p>
    <form action="" method="post">
        <button type="submit" name="selectPac">Buscar pacientes atendidos</button>
    </form>
    <form action="" method="post">
        <button type="submit" name="selectFac">Buscar Facturas</button>
    </form>
    <?php
    if (isset($_POST["selectPac"])) {
            header("Location:selectPac.php");
    } else if (isset($_POST["selectFac"])) {
        header("Location:selectFact.php");
    }    
    ?>
    <p></p>
    <form action="" method="post">
        <button type="submit" name="logout">Cerrar sesión</button>
    </form>
    <?php
    if (isset($_POST["logout"])) {
        session_destroy();
        header("Location: index.php");
    }
    ?>
</body>
</html>