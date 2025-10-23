<?php
session_start(); //Arrancamos sesión
include_once("crearConexion.php"); //Para utilizar crearConexion
include_once("showHF.php");
?>

<?php 
    showHead("Mostrar Pacientes");
?>
<!--Hasta aquí contenido compartido-->

    <h3>Menú mostrar todos los pacientes</h3>
<?php
        //Conexion
        $dwes=null;
        openDB($dwes,true);

        //Sentencia y ejecucción
        $sql="SELECT id_paciente AS ID, dni AS DNI, UPPER(CONCAT(p.apellido1,' ',p.apellido2,', ', p.nombre)) AS PACIENTE, fecha_nac AS 'FECHA NAC', telf AS TELEFONO, nhc AS 'NUM HIS.CLINC'
        FROM paciente AS p
        ORDER BY id_paciente ASC;";             
        $resultado=$dwes->prepare($sql); //preparamos

        try {
            $resultado->execute();
            echo '<p class=sentenok>La sentencia se ha ejecutado</p>';

            showTable($resultado); //Hay que pasarlo como PDOStatement

        } catch (Exception $ex) {
            echo $ex->getMessage();
        } //Realiza execute y ademas muestra confirmacion (o error en su defecto)ç

        //Cerramos conexion con la db
        closeDB($dwes,true);
    
?>

<!--Reaunda el contenido compartido-->
<?php 
    include_once("./comp/botonVolver.php");
?>

<?php 
    showFooter();
?>