<?php 
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
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" id="usuario" required placeholder="Indique aquí su el usuario"/>
        <p></p>
        <label for="passw">Contraseña:</label>
        <input type="password" name="passw" id="passw" required placeholder="Indique su contraseña"/>
        <p></p>
        <button type=submit name="enviar">Acceder</button>

    <?php 
    if (isset($_POST["enviar"])) {
        $usu= $_POST["usuario"];
        $pass= $_POST["passw"];
        $dwes = crearConexionDBMySqli();
        // echo $dwes?"<p>Hemos conectado perfectamente a la bd</p>":"No hemos podido conectar"; //Confirmación de conexión correcta
        $sql="SELECT * FROM usuarios WHERE usuario = '$usu' AND pass = '$pass';";
        try {
            $resultado = $dwes->query($sql); //comprobamos que el usuario existe
            $res= $resultado->fetch_all(MYSQLI_BOTH);
            if (count($res)!=0) {
                foreach ($res as $row) { //Si no encuentra ningún registro, se lo salta
                    echo "<p>¡Bienvenido $usu!</p>";
                    echo "<p>Su email es: ".$row['email']. "</p>";
                }
            } else {
                echo "<p>Usuario o contraseña no reconocido</p>";
            }

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        mysqli_close($dwes);
        // echo (mysqli_close($dwes)?"<p>Se ha cerrado la conexión correctamente</p>":"No se ha podido cerrar la sesión"); //Verificador de conexion 
    }
?>
    
</body>
</html>

