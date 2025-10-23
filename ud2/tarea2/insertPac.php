<?php
session_start(); //Arrancamos sesión
include_once("crearConexion.php"); //Para utilizar crearConexion
include_once("showHF.php");
?>

<?php
showHead("Crear Paciente");
?>
<!--Hasta aquí contenido compartido-->

<h3>Menú Crear Pacientes</h3>

    <form action="" method="post">
    <label for="dni">DNI:</label>
    <input type="text" name="dni" id="dni" required placeholder="Indique aquí el dni" value="DNI"/>
    <p></p>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre" required placeholder="Indique aquí el nombre" value="Nombre"/>
    <p></p>
    <label for="apellido1">Apellido 1:</label>
    <input type="text" name="apellido1" id="apellido1" required placeholder="Indique aquí el apellido 1" value="Apellido1"/>
    <p></p>
    <label for="apellido2">Apellido 2:</label>
    <input type="text" name="apellido2" id="apellido2" required placeholder="Indique aquí el apellido 2" value="Apellido2"/>
    <p></p>
    <label for="fechaNac" class="fechaNac">Fecha de nacimiento: </label>
    <input type="date" id="fechaNac" name="fechaNac" class="fechaNac" value=<?php echo date("Y-m-d") ?> required max=<?php echo date("Y-m-d") ?>>
    <p></p>
    <label for="telf">Telefono:</label>
    <input type="text" name="telf" id="telf" required placeholder="Indique aquí su telefono" value="950202020"/>
    <p></p>
    <button type=submit name="enviar">Crear paciente</button>
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
        // $sql="INSERT INTO usuarios (usuario,pass,email) VALUES (:user,:pass,:email);"; //Hacemos sentencia para bindParam
        $sql="INSERT INTO paciente (dni, nombre, apellido1, apellido2, fecha_nac, telf) 
        VALUES (?, ?, ?, ?, ?, ?);"; //Hacemos sentencia        
        $res=$dwes->prepare($sql); //preparamos

        try {
            $res->execute([$dni, $nombre,$apellido1,$apellido2,$fechaNac,$telf]);
            echo $res->rowCount()>0?"El paciente con DNI $dni se ha creado satisfactoriamente":"El paciente con DNI $dni no ha podido ser creado";


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