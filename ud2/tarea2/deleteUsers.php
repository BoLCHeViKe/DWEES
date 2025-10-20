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

        //Conexion
        $dwes=null;
        try {
            $dwes = crearConexionDBPdo();
            echo "<p>Hemos conseguido crear la conexion a la bd</p>";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        //Ejecuccion sentencia SELECT
        $sql="SELECT * FROM usuarios WHERE usuario = '$usu' AND pass = '$pass';";
        try {
            $resultado = $dwes->query($sql); //comprobamos que el usuario existe
            $res= $resultado->fetchAll();
            if (count($res)!=0) {
                foreach ($res as $row) { //Si no encuentra ningún registro, se lo salta
                    $senten="DELETE FROM usuarios WHERE usuario = '$usu';";
                    $dwes->exec($senten); //Tambien podemos utilizar query($senten) que nos devuelve el numero de registros alterados
                    echo "<p>¡Se ha eliminado al usuario $usu satisfactoriamente!</p>";
                    
                }
            } else {
                echo "<p>Usuario o contraseña no reconocido</p>";
            }

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        //Cerramos conexion con la db
        echo "<p>Cerramos conexion con la bd</p>";
        $dwes=null;
        
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

