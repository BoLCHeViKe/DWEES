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
showHeader("Multiplicar"); //Metodo para mostrar la cabeza del html

showFraccion("Primera fracción: ",$numeradorOne,$denominadorOne);
echo "<p>*</p>";
showFraccion("Segunda fracción: ",$numeradorTwo,$denominadorTwo);

$resulNumerador = $numeradorOne * $numeradorTwo;
$resulDenominador = $denominadorOne * $denominadorTwo;
echo "<p></p>";
echo "<p>=</p>";
echo "<p></p>";
//showFraccion("El resultado normal es: ",$resulNumerador,$resulDenominador); //Muestra la fraccion sin reducir
showFracReduction("El resultado ya reducido es: ",$resulNumerador,$resulDenominador);
showEnd(); //Metodo para mostrar el boton "logout" y el final del html
?>
<?php
if (isset($_POST["logout"])) {
    session_destroy();
    header("Location: index.php");
}
?>