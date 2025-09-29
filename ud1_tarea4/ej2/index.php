<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo Seguro</title>
</head>

<body>
    <h3>Seguros de salud</h3>
    <form action="" method="post">
        <label for="edad">Introduzca su edad: </label>
        <input type="number" id="edad" name="edad" min="0" step="1" required />
        <p></p>
        <label for="acci">Introduzca los accidentes sufridos: </label>
        <input type="number" id="acci" name="accidentes" min="0" step="1" required />
        <p></p>
        <label>Estado de salud: </label>
        <input type="radio" id="salud_si" name="salud" value="sano" />
        <label for="salud_si">Sano</label>
        <input type="radio" id="salud_no" name="salud" value="enfermo" />
        <label for="salud_no">Enfermo</label>
        <p></p>
        <button type="submit" name="calcular">Valoracion del seguro!</button>
    </form>

</body>

</html>

<?php
if (isset($_POST["calcular"])) {
    $salud = $_POST["salud"];
    $numAccidentes = $_POST["accidentes"];
    $edad = $_POST["edad"];
    echo "<p>Teniendo " . $edad . " años, estando " . $salud . ", y habiendo sufrido " . $numAccidentes . " Accidentes...</p>";
    echo "<p>La decisión del seguro = " . valoracionSeguro($salud, $numAccidentes, $edad) . "</p>";
}

?>
<?php

function valoracionSeguro($salud, $numAccidentes, $edad)
{
    if ($salud == "sano" && $numAccidentes == 0) {
        return $edad < 30 ? "Seguro tipo A" : "Seguro tipo B";
    } elseif ($salud != "sano" && $numAccidentes != 0) {
        return "No hacer seguro";
    } else {
        return "Llamar a experto";
    }
}
?>