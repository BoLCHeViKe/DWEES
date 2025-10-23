<?php 
function showHead($tittleName){
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$tittleName.'</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
</head>
<body>
<h4 class="saludodr">¡Bienvenid@ Dr./Dra. '.$_SESSION["rowUser"]['apellido1'].' '.$_SESSION["rowUser"]['apellido2'].'!</h4>';
};


function showFooter(){
echo '
</body>
</html>';

};

function showTable($resultado){
            //Imprimimos la tabla
            echo '<table class="mitabla">';

                //Imprimimos nombre columnas
                echo '<tr>';
                for ($i=0; $i < $resultado->columnCount(); $i++) {
                    $col = $resultado->getColumnMeta($i);
                echo "<th>".$col['name']."</th>";
                }
                echo '</tr>';

                //Imprimir filas y valores celdas
            $res=$resultado->fetchAll();
            foreach ($res as $row) {
                //via for
                echo '<tr>';
                for ($i=0; $i < count($row); $i++) {
                    if (!is_null($row[$i])) {//Imprime solo los not null
                echo "<td>".$row[$i]."</td>";
                    }
                }
                echo '</tr>';
            }
            echo '</table>';
}

?>

