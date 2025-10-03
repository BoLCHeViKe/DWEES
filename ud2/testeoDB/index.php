<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion DB</title>
</head>

<body>
    <h3>Vamos a conectar a la database</h3>
    <?php
    $server = "192.168.11.160:3306";
    $user = "user";
    $pass = "1234";
    $dbname = "entorno";
    $dwes = mysqli_connect($server,$user,$pass,$dbname);
    $dwes?"hemos conectado perfectamente a la bd $dbname con el user $user !!":"No hemos podido conectar a $dbname";
    ?>
</body>
</html>

