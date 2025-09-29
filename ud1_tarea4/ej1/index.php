<?php 
include_once("utilidades.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Combinatorios</title>
</head>
<body>
    <h3>Combinatorios</h3>
    <form action="" method="post">
        <label for="m">Introduzca m: </label>
        <input type="number" id="m" name="mvalor" min="0" step="1" required/>
        <p></p>
        <label for="n">Introduzca n: </label>
        <input type="number" id="n" name="nvalor" min="0" step="1" required/>
        <p></p>
        <button type="submit" name="calcular">Calcular!</button>
    </form>
    
</body>
</html>

<?php 
if (isset($_POST["calcular"])) {
    $m=$_POST["mvalor"];
    $n=$_POST["nvalor"];
    if ($m>=$n) {
        $resultado = factorial($m)/(factorial($n)*factorial(($m-$n)));
        echo "<p>Siendo m=".$m."y n=".$n." : </p>";
        echo "<p>Resultado = ".$resultado."</p>";
    }else {
        echo "<p>n (".$n.") no puede ser mayor que m!! (".$m.")</p>";
    }

}

?>