<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Series</title>
</head>

<body>
    <h3>Calculo de series</h3>
    <form action="" method="post">
        <label for="serie">Introduzca el valor del término n-ésimo para calcular en la serie: </label>
        <input type="number" id="serie" name="serie" min="0" step="1" required />
        <p></p>
        <button type="submit" name="calcular">Calcular valor de la serie!</button>
    </form>

</body>
</html>
<?php
if (isset($_POST["calcular"])) {
    $n = $_POST["serie"];
    echo "<p>La serie con el valor " . $n . " como término n-esimo es: </p>";
    echo "<p>Resultado = " . calcSerie($n) . "</p>";
}
?>
<?php
function calcSerie($n){
    if ($n==2) {
        return 2;
    }else if ($n==1) {
        return 1;
    } else {
        return calcSerie($n-2)+calcSerie($n-1);
    }

}