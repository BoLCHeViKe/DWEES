<?php 
include_once("crearConexion.php"); //Para utilizar crearConexion
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CrearTablaUsers</title>
</head>
<body>
    <?php 
$dwes = crearConexionDBMySqli();
echo $dwes?"Hemos conectado perfectamente a la bd<p></p>":"No hemos podido conectar";
$sql = "CREATE TABLE IF NOT EXISTS usuario (
	id INT NOT NULL AUTO_INCREMENT,
	usuario VARCHAR(25) NOT NULL,
    pass VARCHAR(25) NOT NULL,
    email VARCHAR(25) NOT NULL,
    CONSTRAINT usu_id_pk PRIMARY KEY (id)
);
";
try {
    $resultado = $dwes->query($sql);
    echo "<p>Se ha creado o estaba creada la tabla sin problema</p>";
} catch (Exception $ex) {
    echo $ex;
    //throw $ex;
}

    echo (mysqli_close($dwes)?"Se ha cerrado la conexión correctamente":"No se ha podido cerrar la sesión")."<p></p>";
?>
    
</body>
</html>

