<?php 
function showHead($tittleName){
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$tittleName.'</title>
</head>
<body>
<p>¡Bienvenido Sr./Sra. '.$_SESSION["rowUser"]['apellido1'].' '.$_SESSION["rowUser"]['apellido2'].'!</p>';
};


function showFooter(){
echo '
</body>
</html>';

};
?>

