<?php 
    function showHeader($operacion){
        echo 
'<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$operacion.'</title>
</head>

<body>' ;
    }
    function showEnd(){
        echo'<p></p>
            <form action="" method="post">
        <button type="submit" name="logout">Salir/Volver a calcular/reiniciar</button>
    </form>
</body>

</html>';
    }
function showFraccion($mensaje,$num,$den){
    echo "<fieldset>
        <legend>".$mensaje."</legend>";
    echo "<p></p>";
    echo $num;
    echo "<p>-----</p>";
    echo $den;
    echo "<p></p>";
    echo "</fieldset>";

    }
function showFracReduction($mensaje,$num, $den){
    //$arrayPrimos = [2,3,5,7,11,13,17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,89,97]; 
    //Ampliamos a los numeros primos de 1 a 1000
    $arrayPrimos=[2,3,5,7,11,13,17,19,23,29,31,37,41,43,47,53,59,61,67,71,73,79,83,89,97,101,103,107,109,113,127,131,137,139,149,151,157,163,167,173,179,181,191,193,197,199,211,223,227,229,233,239,241,251,257,263,269,271,277,281,283,293,307,311,313,317,331,337,347,349,353,359,367,373,379,383,389,397,401,409,419,421,431,433,439,443,449,457,461,463,467,479,487,491,499,503,509,521,523,541,547,557,563,569,571,577,587,593,599,601,607,613,617,619,631,641,643,647,653,659,661,673,677,683,691,701,709,719,727,733,739,743,751,757,761,769,773,787,797,809,811,821,823,827,829,839,853,857,859,863,877,881,883,887,907,911,919,929,937,941,947,953,967,971,977,983,991,997];
    foreach ($arrayPrimos as $primo) {
        if ($primo <= $num && $primo <= $den) {
            while ($num % $primo == 0 && $den % $primo == 0) {
                $num /= $primo;
                $den /= $primo;
            }
        }
    }
    showFraccion($mensaje,$num,$den);
}

?>