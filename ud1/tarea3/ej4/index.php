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
        $salariob=$_POST["sb"];
        $num_hijos=$_POST["number_childs"];
        echo "<p>Los impuestos a pagar teniendo </p><p>$num_hijos hijo/s </p><p>Y un salario bruto de $salariob € </p><p>Son de: </p>";
        $impuestos_totales=cal_impuestos($salariob, $num_hijos);
        echo "<p>".$impuestos_totales." € de impuestos</p>";
        echo "<p>".$salariob - $impuestos_totales." € salario Neto</p>";
        // echo "<p>El anio ".$anio." ".(cal_anio_bis($anio)?"SI":"NO")." es bisiesto</p>";
    }
    ?>
</body>
</html>
<?php
function cal_impuestos($salario,$num_hijos){
    $impuestos_acu=0;
    $tramo=4600; //Tramo mayor a 4600
    $imp = 0.25;  //Impuesto 25%
    $dto_hijo = 0.015; //1,5% por hijo
    $dto_max_hijos=descuento_hijos_max($dto_hijo); //Se establece el maximo en 15% 
    if ($salario>$tramo) {   
        $impuestos_acu+=($salario - $tramo) * ($imp - (($num_hijos*$dto_hijo)>$dto_max_hijos?$dto_max_hijos:$num_hijos*$dto_hijo));
        $salario=$tramo;
    }

    $tramo=3000; //Tramo mayor a 3000 a 4600 (Actualizamos)
    $imp = 0.20; //Impuesto 20% (Actualizamos)
    $dto_hijo = 0.01; //1% por hijo (Mantendremos!)
    $dto_max_hijos=descuento_hijos_max($dto_hijo); //Se establece el maximo en 10% (Mantendremos!) 
    if ($salario>$tramo) {   
        $impuestos_acu+=($salario - $tramo) * ($imp - (($num_hijos*$dto_hijo)>$dto_max_hijos?$dto_max_hijos:$num_hijos*$dto_hijo));
        $salario=$tramo;
    }

    $tramo=1600; //Tramo mayor a 1600 a 3000 (Actualizamos)
    $imp = 0.15; //Impuesto 15% (Actualizamos)
    if ($salario>$tramo) {   
        $impuestos_acu+=($salario - $tramo) * ($imp - (($num_hijos*$dto_hijo)>$dto_max_hijos?$dto_max_hijos:$num_hijos*$dto_hijo));
        $salario=$tramo;
    }

    $tramo=1000; //Tramo mayor a 1000 a 1600 (Actualizamos)
    $imp = 0.1; //Impuesto 10% (Actualizamos)
    if ($salario>$tramo) {   
        $impuestos_acu+=($salario - $tramo) * ($imp - (($num_hijos*$dto_hijo)>$dto_max_hijos?$dto_max_hijos:$num_hijos*$dto_hijo));
        $salario=$tramo;
    }
    return $impuestos_acu;
}
function descuento_hijos_max($descuento){
    return $descuento*10;
} 

?>