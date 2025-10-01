<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numero Pi</title>
</head>

<body>
    <h3>Aproximacion de Pi a N terminos</h3>
    <form action="" method="post">
        <label for="serie">Introduzca cuantos terminos de serie quiere calcular PI: </label>
        <input type="number" id="serie" name="serie" min="0" step="1" required />
        <p></p>
        <button type="submit" name="calcular">Calcular Pi!</button>
    </form>

</body>

</html>

<?php
if (isset($_POST["calcular"])) {
    $n = $_POST["serie"];
    echo "<p>El numero PI con " . $n . " terminos de serie es: </p>";
    echo "<p>PI = " . calcPi($n) . "</p>";
}
?>
<?php
function calcPi($n){
    $sumario=0;
    for ($i=0; $i <=$n ; $i++) { 
        $sumario+=pow(-1,$i)*(1/(2*$i+1));
    }
    return 4*$sumario;
}