<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo impuestos</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="salario">¿Cual es el salario bruto?</label>
        <input type="number" name="sb" min="0.01" step="0.01" id="salario" required placeholder="Introducir salario bruto"/>
        <p></p>
        <label for="hijos">¿Cuantos hijos tienes?</label>
        <input type="number" name="number_childs" min="0" max="30" id="hijos" required placeholder="Indicar numero de hijos"/>
        <p></p>
        <button type=submit name="enviar">Calcular</button>
    </form>
    <?php 
    if (isset($_POST["enviar"])) {
        $salario=$_POST["sb"];
        $num_hijos=$_POST["number_childs"];
        echo "Los impuestos a pagar teniendo $num_hijos y un salario bruto de $salario son de:";
        // echo "<p>El anio ".$anio." ".(cal_anio_bis($anio)?"SI":"NO")." es bisiesto</p>";
    }
    ?>
</body>
</html>
<?php
function cal_anio_bis($anio){
    if($anio%4==0){
        if ($anio%100==0&&$anio%400!=0) {
            return false;
        }
        return true;
    }
    return false;


} 

?>