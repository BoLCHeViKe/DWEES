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
    <?php //La ponemos arriba para que el calculo que se haga se realice con la variable actualizada!!!!
    if (isset($_POST["apostar2"])) {
        $_SESSION["first_gambling"]=$_POST["calling2"];
        //header("Location: index.php"); si pongo esto, se actualiza doble, cuidado!
    }
    ?>
    <?php
    jugar();
    ?>
    <!-- Hacer metodo/funcion y comentar la apuesta, ganancia etc aquí-->
    <!--Hacer formulario para preguntar si quiere volver a tirar una moneda-->
    <form action="game.php" method="post">
        <label id="apuesta2">Apuesta:</label>
        <input type="number" min="0.01" step="0.01" name="calling2" for="apuesta2" required />
        <button type="submit" name="apostar2">¡Volver a apostar!</button>
    </form>
    <form action="game.php" method="post">
        <button type="submit" name="logout">¡Dejar de jugar/Salir!</button>
    </form>

    <?php
    if (isset($_POST["logout"])) {
        session_destroy();
        header("Location: index.php");
    }
    ?>
</body>

</html>

<?php
//Funciones
//Funciones para que devuelva cara(true) o cruz(false)
function drop_coin()
{
    $random_number = rand(0, 1); // 0 o 1
    return $random_number > 0 ? "cara" : "cruz";
}
function jugar()
{
     echo "<p>Has apostado " . $_SESSION["first_gambling"] . "</p>";
    $coin_result = drop_coin();
    echo "<p>¡ Y ha salido " . strtoupper($coin_result) . " !</p>";

    echo "<p>Tenias " . $_SESSION["acu_gambling"] . " Euros acumulados</p>";

    $_SESSION["acu_gambling"] += $_SESSION["first_gambling"] * ($coin_result == "cara" ? 2 : -1);
    echo "<p>Y ahora " . $_SESSION["acu_gambling"] . " Euros acumulados</p>";

    $_SESSION["acu_games"]++;
    echo "<p>Has jugado " . $_SESSION["acu_games"] . " partida/s</p>";
}
?>