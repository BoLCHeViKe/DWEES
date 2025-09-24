<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego</title>
</head>
<body>
    <?php 
    echo $_SESSION["first_gambling"];
    ?>
    <!-- Hacer metodo/funcion y comentar la apuesta, ganancia etc aquí-->
    <!--Hacer formulario para preguntar si quiere volver a tirar una moneda-->
    <form action="game.php" method="post">
        <button type="submit" name="logout">¡Dejar de jugar/Salir!</button>
    </form>
    <?php 
    if (isset($_POST["logout"])) {
        session_destroy();
        header("Location: index.php");
        # code...
    }
    ?>

    
</body>
</html>