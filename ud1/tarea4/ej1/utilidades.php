<?php
function factorial($valor)
{
    if ($valor >= 2) {
        $resultado = $valor;
        for ($i = ($valor - 1); $i >= 2; $i--) {
            $resultado *= $i;
        }
        return $resultado;
    } elseif ($valor >= 0) {
        return 1;
    } else {
        return null;
    }
}

function factorialRecur($valor){
    if ($valor<=1) {
        return 1;
    }
    else {
        return $valor*factorialRecur($valor-1);
    }


}
?>