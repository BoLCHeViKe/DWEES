<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anio biniesto</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="aniof">¿Que anio quiere comprobar?</label>
        <input type="number" name="anio" min="1900" max="<?php echo date('Y')?>"  id="aniof" required placeholder="Introducir anio"/>
        <button type=submit name="enviar">Calcular</button>
    </form>
    <?php 
    if (isset($_POST["enviar"])) {
        $anio=$_POST["anio"];
        echo "<p>El anio ".$anio." ".(cal_anio_bis($anio)?"SI":"NO")." es bisiesto</p>";
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