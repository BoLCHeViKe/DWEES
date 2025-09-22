<?php
if (isset($_REQUEST['enviar'])) {
    echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">'; //Cargamos boostrap!! Ojo, con comillas simples, no dobles!!!
    if (empty($_REQUEST['user'])) {     // Comprueba que usuario no este vacio
        echo show_yellow_warning("¡Usuario vacío!");
    }elseif (empty($_REQUEST['pass'])) {// Comprueba que password no este vacio
        echo show_yellow_warning("¡Contraseña vacía!");
    }else { // Finalmente, comprueba que el usuario y pass esten validados
    $usu=$_REQUEST['user'];
    $pas=$_REQUEST['pass'];
    if ($resultado=comprobar_usuario($usu,$pas)) {
        echo show_green_warning("Login correcto, ¡Bienvenido ".ucfirst($usu)."!");

    }else {
        echo show_red_warning("¡¡Login incorrecto!!");
    }
    }
}
?>
<?php 
//Creamos funcion que me comprueba el user
function comprobar_usuario($user,$pass){
    $array_users=["julio"=> "1234","pepelu" => "123","luis" => "12"];
    foreach ($array_users as $us => $pa) {
        if ($us==$user&&$pa==$pass) {
            return true;
        }
    }
    return false;
}
//Creamos funciones con clases linkeadas de boostrap
    //Aviso amarillo
function show_yellow_warning($mi_aviso){
    echo "<div class='alert alert-warning' role='alert'>$mi_aviso</div>";
}
    //Aviso rojo
function show_red_warning($mi_aviso){
    echo "<div class='alert alert-danger' role='alert'>$mi_aviso</div>";
}
    //Aviso verde
function show_green_warning($mi_aviso){
    echo "<div class='alert alert-success' role='alert'>$mi_aviso</div>";
}
?>