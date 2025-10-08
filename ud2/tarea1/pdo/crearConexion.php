<?php
function crearConexionDBPdo()
{
    $config = parse_ini_file('./config.inc.ini'); //Importamos
    //Creamos conexión
    $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    $dsn = 'mysql:host='.$config['server'].';dbname='.$config['dbname'];
    $dwes = new PDO($dsn,$config['user'],$config['pass'],$opc);
    $dwes ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dwes;
}
