<?php 
include_once("crearConexion.php"); //Para utilizar crearConexion
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuarios</title>
</head>
<body>
    <h3>Menú crear usuarios</h3>
        <form action="" method="post">
        <label for="usuario">Nuevo nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario" required placeholder="Indique aquí su nuevo usuario"/>
        <p></p>
        <label for="passw">Contraseña a establecer:</label>
        <input type="password" name="passw" id="passw" required placeholder="Nueva contrasenia"/>
        <p></p>
        <label for="email">Email a establecer:</label>
        <input type="email" name="email" id="email" required placeholder="Introducir email"/>
        <p></p>
        <button type=submit name="enviar">Crear usuario</button>

    <?php
    
    if (isset($_POST["enviar"])) {
        $usu= $_POST["usuario"];
        $pass= $_POST["passw"];
        $email= $_POST["email"];

        //Conexion
        $dwes=null;
        try {
            $dwes = crearConexionDBPdo();
            echo "<p>Hemos conseguido crear la conexion a la bd</p>";
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }

        //Preparamos la consulta
        $sql="INSERT INTO usuarios (usuario,pass,email) VALUES (:user,:pass,:email);"; //Hacemos sentencia
        $res=$dwes->prepare($sql); //preparamos
        
        //Unimos parametros
        $res->bindParam(":user",$usu);
        $res->bindParam(":pass",$pass);
        $res->bindParam(":email",$email);

        //$res->execute(); //Ejecutamos
        executeConfirm($res,$usu); //Realiza execute y ademas muestra confirmacion (o error en su defecto)

        //Cerramos conexion con la db
        echo "<p>Cerramos conexion con la bd</p>";
        $dwes=null;
    }
    
function executeConfirm(&$res,$usu){
    try {
    $res->execute();
    echo "<p>Hemos creado perfectamente a $usu</p>";
} catch (Exception $ex) {
    echo $ex->getMessage();
}
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

