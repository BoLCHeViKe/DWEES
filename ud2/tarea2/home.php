<?php
session_start(); //Arrancamos sesión
include_once("crearConexion.php"); //Para utilizar crearConexion
include_once("showHF.php");
?>

<?php 
    showHead("Home");
?>
<!--Hasta aquí contenido compartido-->
    <p>¿Que desea hacer?</p>
    <form action="" method="post">
        <button type="submit" name="selectPac">Buscar pacientes atendidos por el Dr.</button>
        <p></p>
        <button type="submit" name="selectAllFact">Mostrar todas las Facturas</button>
        <p></p>
        <button type="submit" name="selectAllPac">Mostrar todos los Pacientes</button>
        <p></p>
        <p>Opciones Paciente: </p>
        <button type="submit" name="insertPac">Crear Paciente</button>
        <p></p>
        <button type="submit" name="updatePac">Actualizar Paciente</button>
        <p></p>
        <button type="submit" name="deletePac">Eliminar Paciente</button>
        </form>
    <?php
    if (isset($_POST["selectPac"])) {
            header("Location:selectPac.php");
    } else if (isset($_POST["selectAllFact"])) {
        header("Location:selectAllFact.php");
    } else if (isset($_POST["selectAllPac"])) {
        header("Location:selectAllPac.php");
    }else if (isset($_POST["insertPac"])) {
        header("Location:insertPac.php");
    } else if (isset($_POST["updatePac"])) {
        header("Location:updatePac.php");
    }else if (isset($_POST["deletePac"])) {
        header("Location:deletePac.php");
    }
    ?>
    <p></p>
    <p>Logout: </p>
    <form action="" method="post">
        <button type="submit" name="logout" id="logout">Cerrar sesión</button>
    </form>
    <?php
    if (isset($_POST["logout"])) {
        session_destroy();
        header("Location: index.php");
    }
    ?>
<?php 
    showFooter();
?>