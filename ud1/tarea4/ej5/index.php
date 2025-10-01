<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuerza gravitacional</title>
</head>

<body>
    <h3>Calculo de fuerza gravitacional entre dos masas</h3>
    <form action="" method="post">
        <label for="masaOne">Introduzca primera masa (en kg): </label>
        <input type="number" id="masaOne" name="masaOne" min="0" step="1" required />
        <p></p>
        <label for="masaTwo">Introduzca segunda masa (en kg): </label>
        <input type="number" id="masaTwo" name="masaTwo" min="0" step="1" required />
        <p></p>
        <label for="distancia">Introduzca distancia (en m): </label>
        <input type="number" id="distancia" name="distancia" min="0" step="1" required />
        <p></p>
        <button type="submit" name="calcular">Calcular fuerza gravitacional!</button>
    </form>

</body>
</html>
<?php
if (isset($_POST["calcular"])) {
    $m1 = $_POST["masaOne"];
    $m2 = $_POST["masaTwo"];
    $r = $_POST["distancia"];
    echo "<p>El valor de la fuerza de atracción gravitacional las masas dadas de " . $m1 ." kg y ".$m2. " kg y una distancia de ".$r." metros, es: </p>";
    echo "<p>Resultado = " .calfuerzaAtraccion($m1,$m2,$r) . "</p>";
}
?>
<?php
function calfuerzaAtraccion($m1,$m2,$r){
    return gravedad()*(($m1*$m2)/(pow($r,2)));
}
function gravedad(){
    return 6.67*(pow(10,-11));
}