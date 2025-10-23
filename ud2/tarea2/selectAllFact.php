<?php
session_start(); //Arrancamos sesión
include_once("crearConexion.php"); //Para utilizar crearConexion
include_once("showHF.php");
?>

<?php 
    showHead("Seleccionar Factura");
?>
<!--Hasta aquí contenido compartido-->

    <h3>Menú mostrar Facturas</h3>
<?php
        //Conexion
        $dwes=null;
        openDB($dwes,true);

        //Sentencia y ejecucción
        $sql="SELECT f.num_fact AS NUM, f.fecha AS FECHA, UPPER(CONCAT(p.apellido1,' ',p.apellido2,', ', p.nombre)) AS NOMBRE,SUM(lf.total) AS 'TOTAL FACTURA'
        FROM lineafactura AS lf
        JOIN factura AS f ON f.num_fact = lf.num_fact
        JOIN paciente AS p ON p.id_paciente = f.id_paciente
        GROUP BY f.num_fact
        ORDER BY f.num_fact ASC;";       
        //$sql="INSERT INTO usuarios (usuario,pass,email) VALUES (?,?,?);"; //Hacemos sentencia        
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