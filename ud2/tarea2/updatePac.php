<?php
session_start(); //Arrancamos sesión
include_once("crearConexion.php"); //Para utilizar crearConexion
include_once("showHF.php");
?>

<?php
showHead("Crear Paciente");
?>
<!--Hasta aquí contenido compartido-->

<h3>Menú editar Pacientes</h3>

    <form action="" method="post">
    <label for="dni">DNI del paciente a modificar:</label>
    <input type="text" name="dni" id="dni" required placeholder="Indique aquí el dni" value="DNI"/>
    <p></p>
    <label for="nombre">Nuevo nombre:</label>
    <input type="text" name="nombre" id="nombre" required placeholder="Indique aquí el nombre" value="Nombre"/>
    <p></p>
    <label for="apellido1">Nuevo apellido 1:</label>
    <input type="text" name="apellido1" id="apellido1" required placeholder="Indique aquí el apellido 1" value="Apellido1"/>
    <p></p>
    <label for="apellido2">Nuevo apellido 2:</label>
    <input type="text" name="apellido2" id="apellido2" required placeholder="Indique aquí el apellido 2" value="Apellido2"/>
    <p></p>
    <label for="fechaNac" class="fechaNac">Nueva fecha de nacimiento: </label>
    <input type="date" id="fechaNac" name="fechaNac" class="fechaNac" value=<?php echo date("Y-m-d") ?> required max=<?php echo date("Y-m-d") ?>>
    <p></p>
    <label for="telf">Nuevo telefono:</label>
    <input type="text" name="telf" id="telf" required placeholder="Indique aquí su telefono" value="950202020"/>
    <p></p>
    <button type=submit name="enviar">Editar paciente</button>
    <p></p>
    
    <?php
    
    if (isset($_POST["enviar"])) {
        $dni= $_POST["dni"];
        $nombre= $_POST["nombre"];
        $apellido1= $_POST["apellido1"];
        $apellido2= $_POST["apellido2"];
        $fechaNac= $_POST["fechaNac"];
        $telf= $_POST["telf"];

        //Conexion
        $dwes=null;
        openDB($dwes,true);

        //Preparamos la consulta
        $sql="UPDATE paciente
        SET nombre=?, apellido1=?, apellido2=?, fecha_nac=?, telf=?
        WHERE dni = ?;"; //Hacemos sentencia        
        $res=$dwes->prepare($sql); //preparamos

        try {

            $res->execute([$nombre,$apellido1,$apellido2,$fechaNac,$telf, $dni]);
            echo $res->rowCount()>0?"El paciente con DNI $dni se ha modificado satisfactoriamente":"El paciente con DNI $dni no ha sido modificado/encontrado";


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