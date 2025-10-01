<?php
if (isset($_REQUEST['enviar'])) {
    echo '<head><title>Resultado</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>'; //Cargamos boostrap!! Ojo, con comillas simples, no dobles!!!ç
    echo '<body>';
    $usu=$_REQUEST['user'];
        echo show_green_warning("Login correcto, ¡Bienvenido ".ucfirst($usu)."!");
    echo "</body>";
}
?>
<?php 
//Creamos funciones con clases linkeadas de boostrap
    //Aviso rojo
function show_red_warning($mi_aviso){
    echo "<div class='d-flex justify-content-center align-items-center' style='height: 300px;'><div class='alert alert-danger' role='alert'>$mi_aviso</div></div>";
}
    //Aviso verde
function show_green_warning($mi_aviso){
    echo "<div class='d-flex justify-content-center align-items-center' style='height: 300px;'><div class='alert alert-success' role='alert'>$mi_aviso</div></div>";
}
?>