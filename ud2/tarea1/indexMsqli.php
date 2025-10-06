<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion usuarios</title>
</head>
<body>
        <form action="index.php" method="post">
        <label for="salario">¿Cual es el salario bruto?</label>
        <input type="number" name="sb" min="0.01" step="0.01" id="salario" required placeholder="Introducir salario bruto"/>
        <p></p>
        <label for="hijos">¿Cuantos hijos tienes?</label>
        <input type="number" name="number_childs" min="0" max="30" id="hijos" required placeholder="Indicar numero de hijos"/>
        <p></p>
        <button type=submit name="enviar">Calcular</button>
    </form>
</body>
</html>
<?php 
    function crearConexionDB(){
        $config=parse_ini_file('config.inc.ini'); //Cargamos la config del server

    }
    function cerrarConexionDB(){
        $config=parse_ini_file('config.inc.ini'); //Cargamos la config del server

    };

//Incluir
?>