<?php 
include_once("crearConexion.php"); //Para utilizar crearConexion
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Users</title>
</head>
<body>
        <h3>Menú eliminar usuarios</h3>
        <form action="" method="post">
        <label for="usuario">Usuario a eliminar:</label>
        <input type="text" name="usuario" id="usuario" required placeholder="Indique aquí su el usuario a eliminar"/>
        <p></p>
        <label for="passw">Contraseña:</label>
        <input type="password" name="passw" id="passw" required placeholder="Indique su contraseña"/>
        <p></p>
        <button type=submit name="enviar">Eliminar usuario</button>

    <?php
    
    if (isset($_POST["enviar"])) {
        $usu= $_POST["usuario"];
        $pass= $_POST["passw"];
        $dwes = crearConexionDBMySqli();
        echo $dwes?"<p>Hemos conectado perfectamente a la bd</p>":"No hemos podido conectar";
        $sql="SELECT * FROM usuarios WHERE usuario = '$usu' AND pass = '$pass';";
        try {
            $resultado = $dwes->query($sql); //comprobamos que el usuario existe
            $res= $resultado->fetch_all(MYSQLI_BOTH);
            if (count($res)!=0) {
                foreach ($res as $row) { //Si no encuentra ningún registro, se lo salta
                    $senten="DELETE FROM usuarios WHERE usuario = '$usu';";
                    $dwes->query($senten);
                    echo "¡Se ha eliminado al usuario $usu satisfactoriamente!";
                    
                }
            } else {
                echo "Usuario o contraseña no reconocido";
            }

        } catch (Exception $ex) {
            echo $ex;
        }
        echo (mysqli_close($dwes)?"<p>Se ha cerrado la conexión correctamente</p>":"No se ha podido cerrar la sesión");
        
    }

// // metodo para ver que se ha insertado todo bien
// try {
//     $resultado = $dwes->query($sql);
//     echo "<p>Hemos insertado perfectamente al usuario</p>";
// } catch (Exception $ex) {
//     echo $ex;
//     //throw $ex;
// }


?>
    
</body>
</html>

