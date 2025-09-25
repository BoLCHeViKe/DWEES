<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anios biniestos</title>
</head>
<body>   
    <?php 
    echo "<p>Los anios bisiestos son: </p>";
    for ($i=1900; $i <= date('Y'); $i++) {
        if ( cal_anio_bis($i)) {
            echo "<p> $i</p>";
        }
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