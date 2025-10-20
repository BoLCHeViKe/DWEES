<?php
session_start(); //Arrancamos sesión
include_once("crearConexion.php"); //Para utilizar crearConexion
include_once("showHF.php");
?>

<?php 
    showHead("Seleccion");
?>
<!--Hasta aquí contenido compartido-->



<!--Reaunda el contenido compartido-->
<?php 
    include_once("./comp/botonVolver.php");
?>

<?php 
    showFooter();
?>