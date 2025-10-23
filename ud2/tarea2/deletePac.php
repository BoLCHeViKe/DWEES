<?php
session_start(); //Arrancamos sesión
include_once("crearConexion.php"); //Para utilizar crearConexion
include_once("showHF.php");
?>

<?php
showHead("Eliminar Paciente");
?>
<!--Hasta aquí contenido compartido-->

<h3>Menú Eliminar</h3>

    <form action="" method="post">
    <label for="dni">DNI del paciente a eliminar:</label>
    <input type="text" name="dni" id="dni" required placeholder="Indique aquí el dni" value="DNI"/>
    <p></p>
        <button type=submit class="eliminar" name="enviar">Eliminar paciente</button>
    <p></p>

    <?php
    
    if (isset($_POST["enviar"])) {
        $dni= $_POST["dni"];

        //Conexion
        $dwes=null;
        openDB($dwes,true);

        //Preparamos la consulta
        $sql="DELETE FROM paciente WHERE dni = ?;"; //Hacemos sentencia        
        $res=$dwes->prepare($sql); //preparamos

        try {
            $res->execute([$dni]);
            echo $res->rowCount()>0?"El paciente con DNI $dni ha sido eliminado":"El paciente con DNI $dni no ha sido encontrado";
            

        } catch (Exception $ex) {
            echo $ex->getMessage();
        } //Realiza execute y ademas muestra confirmacion (o error en su defecto)

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