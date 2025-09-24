<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apuestas</title>
</head>
<body>
    <form action="index.php" method="post">
        <label id="apuesta">Apuesta:</label>
        <input type="number" min="0.01" step="0.01" name="calling" for="apuesta"/>
        <button type="submit" name="apostar">¡Tira la moneda!</button>
    </form>
    <?php
    if (isset($_POST["apostar"])) {
        if (!empty($_POST["calling"])) {
            $_SESSION["first_gambling"] = $_POST["calling"];
            header("Location:game.php");
        }
        else {
            echo "¡Debe de hacer una apuesta!";
        } 
    }
?>
    
</body>
</html>
