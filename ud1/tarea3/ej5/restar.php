<?php
session_start()
?>
<?php //Cargamos variables de la sesion
$numeradorOne = $_SESSION["numeradorOne"];
$denominadorOne = $_SESSION["denominadorOne"];
$numeradorTwo = $_SESSION["numeradorTwo"];
$denominadorTwo = $_SESSION["denominadorTwo"];
?>
<?php 
include_once("utilidades.php"); //Como incluir funciones de otro php
?>
<?php
showHeader("Restar"); //Metodo para mostrar la cabeza del html

showFraccion("Primera fracción: ",$numeradorOne,$denominadorOne);
echo "<p>-</p>";
showFraccion("Segunda fracción: ",$numeradorTwo,$denominadorTwo);

$resulNumerador;
$resulDenominador;
if ($denominadorOne != $denominadorTwo) {
    //Primero multiplicamos las fracciones por el denominador de la fraccion contraria (para tener el mismo denominador)
    $numeradorOne *= $denominadorTwo;
    $auxDenOne = $denominadorOne; //Salvamos el denominador uno para luego multiplicar la segunda fraccion
    $denominadorOne *= $denominadorTwo;
    $numeradorTwo *= $auxDenOne;
    $denominadorTwo *= $auxDenOne;
    //Conseguimos el mismo denominador
}
$resulNumerador = $numeradorOne - $numeradorTwo;
$resulDenominador = $denominadorOne;
echo "<p></p>";
echo "<p>=</p>";
echo "<p></p>";
//showFraccion("El resultado normal es: ",$resulNumerador,$resulDenominador); //Muestra la fraccion sin reducir
showFracReduction("El resultado ya reducido es: ",$resulNumerador,$resulDenominador); //Muestra la fracción reducida

showEnd(); //Metodo para mostrar el boton "logout" y el final del html
?>
<?php
if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: index.php");
}
?>