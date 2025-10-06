<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO</title>
</head>
<body>
        <h3>Vamos a conectar a la database utilizando PDO</h3>
        <?php 
        $dwes =null; //Creamos conexin nula
        $config = parse_ini_file('./config.inc.ini');//Cargamos archivo de configuracion como array
        try {
            $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
            $dsn = 'mysql:host='.$config['server'].';dbname='.$config['dbname'];
            $dwes = new PDO($dsn,$config['user'],$config['pass'],$opc);
            $dwes ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p>Hemos conseguido crear la conexion con ".$config['dbname']."</p>";
        } catch (Exception $ex) {
            throw $ex;
            echo "$ex";
        }
        echo "Cerramos conexion con".$config['dbname']."</p>";
        $dwes=null;
        ?>

    
</body>
</html>