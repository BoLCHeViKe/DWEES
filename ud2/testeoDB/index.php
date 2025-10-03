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
    $server = "192.168.11.173:3306";
    $user = "user";
    $pass = "1234";
    $dbname = "entorno";
    //utilizando procimental (funciones)
    $dwes = mysqli_connect($server,$user,$pass,$dbname);
    echo ($dwes?"Metodo  función: hemos conectado perfectamente a la bd $dbname con el user $user !!":"No hemos podido conectar a $dbname")."<p></p>";
    //Vamos a hacer la consulta
    $sql="SELECT * FROM alumno WHERE curso='DAM';"; //Ya preparada la consulta
    $resultado = $dwes->query($sql); //ejecutamos la sentencia anteriormente creada
    echo '<table>';
    echo '<tr><th>usuario</th><th>Contraseña</th><th>Curso</th></tr>';
    while ($res = $resultado->fetch_array()) {
        echo '<tr>';
        echo '<td>'.$res["usuario"].'</td>';
        echo '<td>'.$res["pass"].'</td>';
        echo '<td>'.$res["curso"].'</td>';
        echo '</tr>';
    }
    echo '</table>';






    echo (mysqli_close($dwes)?"Se ha cerrrado la conexión correctamente":"No se ha podido cerrar la sesión")."<p></p>";
    //Utilizando constructor de clases (objetos)
    $dwes2 = new mysqli($server,$user,$pass,$dbname);
    echo ($dwes2?"Metodo  objetos: hemos conectado perfectamente a la bd $dbname con el user $user !!":"No hemos podido conectar a $dbname")."<p></p>";
    echo (($dwes2->close())?"Se ha cerrrado la conexión correctamente":"No se ha podido cerrar la sesión");
    ?>

</body>
</html>

