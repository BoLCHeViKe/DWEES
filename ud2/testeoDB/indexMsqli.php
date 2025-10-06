<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conexion DB</title>
</head>

<body>
    <h3>Vamos a conectar a la database utilizando MSQLI</h3>
    <?php
    $server = "192.168.11.160:3306";
    $user = "user";
    $pass = "1234";
    $dbname = "entorno";
    //utilizando procimental (funciones)

    $dwes = mysqli_connect($server,$user,$pass,$dbname);
    echo ($dwes?"Metodo  función: hemos conectado perfectamente a la bd $dbname con el user $user !!":"No hemos podido conectar a $dbname")."<p></p>";
    //Consultas
    $tabla ="alumno";
    //Vamos a hacer la consulta consultas nombres
    $sqlColumnSelect="SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".$tabla."' ORDER BY ORDINAL_POSITION ASC;";
    $resultColumnNames=$dwes->query($sqlColumnSelect);

    //Consulta Valores
    $sql="SELECT * FROM $tabla WHERE curso='DAW';"; //Ya preparada la consulta
    $resultado = $dwes->query($sql); //ejecutamos la sentencia anteriormente creada

    //OPCION 1 - fetch_array
    echo "<p>Utilizamos fetch_array</p>";
    echo '<table>';
    echo '<tr>';
    while ($resCN = $resultColumnNames->fetch_array()){
        echo "<th>$resCN[0]</th>"; //Mostrar por 
    }
    echo '</tr>';
    // echo '<tr><th>id</th><th>usuario</th><th>Contraseña</th><th>Curso</th></tr>'; //Preguntar duda si podemos obtener GET values
    while ($res = $resultado->fetch_array()) {
        echo '<tr>';
        echo '<td>'.$res["id"].'</td>';
        echo '<td>'.$res[1].'</td>';
        echo '<td>'.$res[2].'</td>';
        echo '<td>'.$res[3].'</td>';
        echo '</tr>';
    }
    echo '</table>';



    //OPCION 2 - Utilizamos fetch_all
     echo "<p>Utilizamos fetch_array</p>";
     //Vamos a utilizar tambien la variable resultado ya obtenida anteriormente (objeto que tiene la consulta $resulado)
         //Consulta Valores
    $sql="SELECT * FROM $tabla WHERE curso='DAW';"; //Ya preparada la consulta
    $resultado = $dwes->query($sql); //ejecutamos la sentencia anteriormente creada
     $res = $resultado->fetch_all(MYSQLI_BOTH); //Necesario MYSQLI para que me de array numerico tambien
     echo '<table>';
     echo '<tr><th>id</th><th>usuario</th><th>Contraseña</th><th>Curso</th></tr>';
     foreach ($res as $row) {

        //via for
        echo '<tr>';
        for ($i=0; $i < count($row); $i++) { 
        echo "<td>".$row[$i]."</td>";
        }
        echo '</tr>';

        //Via foreach
        // echo '<tr>';
        // foreach ($row as $field) {
        //     echo "<td>".$field."</td>";
        // }
        // echo '</tr>';

     }
      echo '</table>';

    //OPCION 3 - Utilizamos fetch_object
     echo "<p>Utilizamos fetch_object</p>";
     //Vamos a utilizar tambien la variable resultado ya obtenida anteriormente (objeto que tiene la consulta $resulado)
         //Consulta Valores
    $sql="SELECT * FROM $tabla WHERE curso='DAW';"; //Ya preparada la consulta
    $resultado = $dwes->query($sql); //ejecutamos la sentencia anteriormente creada
    echo "<table>";
     echo '<tr><th>id</th><th>usuario</th><th>Contraseña</th><th>Curso</th></tr>';
    while ($res=$resultado->fetch_object()) {
        echo '<tr>';
        echo "<td>".$res->id."</td>";
        echo "<td>".$res->usuario."</td>";
        echo "<td>".$res->pass."</td>";
        echo "<td>".$res->curso."</td>";
        echo '</tr>';
    }
     echo "</table>";


     //Consultas preparadas
     $usu="Antonio";
     $pass="a839372";
   


    echo (mysqli_close($dwes)?"Se ha cerrrado la conexión correctamente":"No se ha podido cerrar la sesión")."<p></p>";
    //Utilizando constructor de clases (objetos)
    $dwes2 = new mysqli($server,$user,$pass,$dbname);
    echo ($dwes2?"Metodo  objetos: hemos conectado perfectamente a la bd $dbname con el user $user !!":"No hemos podido conectar a $dbname")."<p></p>";
    echo (($dwes2->close())?"Se ha cerrrado la conexión correctamente":"No se ha podido cerrar la sesión");
    ?>

</body>
</html>

