<?php
session_start(); //Arrancamos sesión
include_once("crearConexion.php"); //Para utilizar crearConexion
include_once("showHF.php");
?>

<?php
showHead("Seleccionar Paciente");
?>
<!--Hasta aquí contenido compartido-->

<h3>Consultar pacientes vistos (validados y/o facturados) por fecha</h3>
<form action="" method="post">
    <label for="fechaIni" class="fechaIni">Fecha inicio: </label>
    <input type="date" id="fechaIni" name="fechaIni" class="fechaIni" value=<?php echo date("Y-m-d") ?> required min="2018-01-01" max=<?php echo date("Y-m-d") ?>>
    <p></p>
    <label for="fechaFin" class="fechaFin">Fecha fin: </label>
    <input type="date" class="fechaFin" id="fechaFin" name="fechaFin" value=<?php echo date("Y-m-d") ?> required > <!--max=<?php echo date("Y-m-d") ?> PODEMOS INCLUIRLO A PARTIR DEL 2025-11-12-->
    <p>Ojo, registros existentes en Noviembre 2025 (poner fecha fin posterior)</p>
    <button type=submit name="enviar">Consultar</button>
    <p></p>

    <?php
    
    if (isset($_POST["enviar"])) {
        $fechaIni= $_POST["fechaIni"];
        $fechaFin= $_POST["fechaFin"];

        //Conexion
        $dwes=null;
        openDB($dwes,true);

        //Sentencia y ejecucción
        $sql="SELECT a.fecha AS ATENDIDO, h_cita AS HORA, UPPER(CONCAT(p.apellido1,' ',p.apellido2,', ', p.nombre)) AS PACIENTE, p.dni AS DNI, c.estado AS ESTADO
        FROM paciente AS p
        JOIN cita AS c ON p.id_paciente=c.id_paciente
        JOIN agenda AS a ON c.id_agenda=a.id_agenda
        WHERE a.fecha BETWEEN ? AND ? AND (c.estado='validado' OR c.estado='facturado') AND a.id_med=?
        ORDER BY a.fecha ASC;";       
        //$sql="INSERT INTO usuarios (usuario,pass,email) VALUES (?,?,?);"; //Hacemos sentencia        
        $resultado=$dwes->prepare($sql); //preparamos

        try {

            $resultado->execute([$fechaIni, $fechaFin,$_SESSION["rowUser"]['id']]);
            echo '<p class=sentenok>La sentencia se ha ejecutado</p>';

            showTable($resultado); //Hay que pasarlo como PDOStatement

        } catch (Exception $ex) {
            echo $ex->getMessage();
        } //Realiza execute y ademas muestra confirmacion (o error en su defecto)ç

        //Cerramos conexion con la db
        closeDB($dwes,true);
    }

?>

    <!--Reaunda el contenido compartido-->
    <?php
    include_once("./comp/botonVolver.php");
    ?>

    <?php
    showFooter();
    ?>