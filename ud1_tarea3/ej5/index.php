<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculo Fracciones</title>
</head>

<body>
    <form action="" method="post">
        <fieldset>
            <legend>Primera fracción: </legend>
            <label for=numerador1>Numerador:</label>
            <input type="number" id="numerador1" min="1" step="1" name="numeradorOne">
            <p>------------------------------------------------</p>
            <label for=denominador1>Denominador:</label>
            <input type="number" id="denominador1" min="1" step="1" name="denominadorOne">
        </fieldset>
        <fieldset>
            <legend>Segunda fracción: </legend>
            <label for=numerador2>Numerador: </label>
            <input type="number" id="numerador2" min="1" step="1" name="numeradorTwo">
            <p>------------------------------------------------</p>
            <label for=denominador2>Denominador: </label>
            <input type="number" id="denominador2" min="1" step="1" name="denominadorTwo">
        </fieldset>
        <p></p>
        <select name="operacion">
            <optgroup label="Selecciona una operacion: ">
                <option value="sum">Sumar</option>
                <option value="rest">Restar</option>
                <option value="mult">Multiplicar</option>
                <option value="divi">Dividir</option>
            </optgroup>
        </select>
        <button type="submit" name="enviar">Seleccionar</button>
    </form>

</body>

</html>
<?php
if (isset($_POST["enviar"])) {
    $_SESSION["numeradorOne"] = $_POST["numeradorOne"];
    $_SESSION["denominadorOne"] = $_POST["denominadorOne"];
    $_SESSION["numeradorTwo"] = $_POST["numeradorTwo"];
    $_SESSION["denominadorTwo"] = $_POST["denominadorTwo"];
    $operacion = $_POST["operacion"];
    switch ($operacion) {
        case 'sum':
            header("Location: sumar.php");
            break;
        case 'rest':
            header("Location: restar.php");
            break;
        case 'mult':
            header("Location: multiplicar.php");
            break;
        case 'divi':
            header("Location: dividir.php");
            break;
        default:
            break;
    }
}
?>