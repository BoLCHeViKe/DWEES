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
/**
 * Apertura conexión con la DB y podemos enviar un mensaje de confirmacion (true o false), mostrará un mensaje si error
 *
 * @param mixed &$dwes Alojaremos la conexión aquí.
 * @param boolean $showSms true para mostrar mensaje formato parrafo, false para no mostrar nada.
 */
function openDB(&$dwes, $showSms){
            try {
            $dwes = crearConexionDBPdo();
            if ($showSms) {
                echo '<p class="opendb">Conexión a db correcta</p>';
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
}

/**
 * Cierre conexión con la DB y podemos enviar un mensaje de confirmacion (true o false)
 *
 * @param mixed &$dwes Conexión que vamos a cerrar.
 * @param boolean $showSms true para mostrar mensaje formato parrafo, false para no mostrar nada.
 */
function closeDB(&$dwes,$showSms){
    if ($showSms) {
        echo '<p class="closedb">Cierre de conexión db</p>';
    }
        $dwes=null;
}
