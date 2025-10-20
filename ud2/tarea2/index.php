<?php
session_start(); //Arrancamos sesión
include_once("crearConexion.php"); //Para utilizar crearConexion
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobar Users</title>
</head>
<body>
        <h3>Menú Login (comprobar usuarios)</h3>
        <form action="" method="post">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required placeholder="Indique aquí su el email"/>
        <p></p>
        <label for="passw">Contraseña:</label>
        <input type="password" name="passw" id="passw" required placeholder="Indique su contraseña"/>
        <p></p>
        <button type=submit name="enviar">Acceder</button>

    <?php 
    if (isset($_POST["enviar"])) {
        $email= $_POST["email"];
        $pass= $_POST["passw"];

        //Conexion
        $dwes=null;
        try {
            $dwes = crearConexionDBPdo();
            // echo "<p>Hemos conseguido crear la conexion a la bd</p>";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        //Ejecuccion sentencia SELECT
        $sql="SELECT * FROM usuario WHERE email = '$email' AND pass = '$pass';";
        try {
            $resultado = $dwes->query($sql); //comprobamos que el usuario existe
            $res= $resultado->fetchAll();
            if (count($res)!=0) {
                foreach ($res as $row) { //Si no encuentra ningún registro, se lo salta
                    $_SESSION["apellidosUser"]= $row['apellido1']." ".$row['apellido2'];
                    $_SESSION["idUser"]=$row['id'];
                    $_SESSION["rowUser"]=$row;
                    header("Location:home.php");
                }
            } else {
                echo "<p>Usuario o contraseña no reconocido</p>";
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        //Cerramos conexion con la db
        //echo "Cerramos conexion con la bd</p>";
        $dwes=null;
    }
?>
    
</body>
</html>

