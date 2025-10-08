<?php
function crearConexionDBMySqli()
{
    $config = parse_ini_file('./config.inc.ini');
    return mysqli_connect($config['server'],$config['user'],$config['pass'],$config['dbname']);
    //return new mysqli($config["server"], $config["user"], $config["pass"], $config["dbname"]);
    // $server = "192.168.11.160:3306";
    // $user = "user";
    // $pass = "1234";
    // $dbname = "entorno";
    // //utilizando procimental (funciones)

    // return mysqli_connect($server,$user,$pass,$dbname);
}
