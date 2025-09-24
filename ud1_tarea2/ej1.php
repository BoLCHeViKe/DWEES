<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi formulario</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="p-3 mb-2 bg-secondary text-white"> <!-- Fondo bg-secondary a todo el contenedor en body -->
        <form class="vh-100 gradient-custom" name="seleccion" action="" method="post">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase">Bienvenido</h2>
                                    <p class="text-white-50 mb-5">Seleccionar figura para calcular área:</p>
                                    <select name="figura" class="form-select" aria-label="Default select example">
                                        <option selected name="figura">Selecciona aquí la figura</option>
                                        <option value="square">Cuadrado</option>
                                        <option value="circle">Circulo</option>
                                        <option value="triangle">Triangulo</option>
                                    </select>
                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="enviar">Seleccionar</button>
                                </div>
                                <?php
                                if (isset($_REQUEST['enviar'])) { //Formulario principal
                                    $mifigura = $_REQUEST['figura'];
                                    echo '<p class="text-white-50 mb-5">Ha seleccionado ' . ucfirst($mifigura) . '</p>';
                                    switch ($mifigura) {
                                        case 'square':
                                            ask_figure_one_parameter($mifigura,"lado"); //Recoge datos del cuadrado
                                            break;
                                        case 'circle':
                                            ask_figure_one_parameter($mifigura,"radio"); //Recoge datos del circulo
                                            break;
                                        case 'triangle':
                                            ask_triangle(); //Recoge datos de triangulo
                                            break;
                                        

                                    }
                                    
                                }
                                if (isset($_REQUEST['enviar_triangle'])) {
                                    $tri_base = $_REQUEST['base'];
                                    $tri_altura = $_REQUEST['altura'];
                                    echo '<p class="text-white-50 mb-5">El área de un triangulo con ' . $tri_base . " cm de base y " . "$tri_altura" . " cm de altura son:" . '</p>';
                                    echo '<h2 class="fw-bold mb-2">' . calc_area_tri($tri_base, $tri_altura) . " cm" . '</h2>';
                                } elseif (isset($_REQUEST['enviar_square'])) {
                                    $squa_lado = $_REQUEST['lado'];
                                    echo '<p class="text-white-50 mb-5">El área de un cuadrado con ' . $squa_lado . " cm de lado son:" . '</p>';
                                    echo '<h2 class="fw-bold mb-2">' . calc_area_squ($squa_lado) . " cm" . '</h2>';
                                } elseif (isset($_REQUEST['enviar_circle'])) {
                                    $cir_radio = $_REQUEST['radio'];
                                    echo '<p class="text-white-50 mb-5">El área de un circulo con ' . $cir_radio . " cm de radio son:" . '</p>';
                                    echo '<h2 class="fw-bold mb-2">' . calc_area_cir($cir_radio) . " cm" . '</h2>';
                                }
                                ?>
                                <div>
                                    <p class="mb-0">Creado por Julio A. Fernández <a href="mailto:admin_julio@admin.com" class="text-white-50 fw-bold">¡Contacta conmigo!</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- funciones para recoger valores del usuario -->
    <?php
    function ask_triangle()
    {
        echo '<form class="vh-100 gradient-custom" name="triangle_form" action="" method="post">
        <div data-mdb-input-init class="form-outline form-white mb-4">
            <input type="number" min="0.01" step="0.01" id="typeEmailX" class="form-control form-control-lg" name="base" placeholder="Base" required />
            <label class="form-label" for="typeEmailX">Base</label>
        </div>
        <div data-mdb-input-init class="form-outline form-white mb-4">
            <input type="number" min="0.01" step="0.01" id="typePasswordX" class="form-control form-control-lg" name="altura" placeholder="Altura" required />
            <label class="form-label" for="typePasswordX">Altura</label>
        </div>
        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="enviar_triangle">¡Calcular!</button>
        </div>
        <div>

    </form>';
    }
        function ask_figure_one_parameter($figura,$medida)
    {
        echo '<form class="vh-100 gradient-custom" name="'.$figura.'_form" action="" method="post">
        <div data-mdb-input-init class="form-outline form-white mb-4">
            <input type="number" min="0.01" step="0.01" id="typeEmailX" class="form-control form-control-lg" name="'.$medida.'" placeholder="'.ucfirst($medida).'" required />
            <label class="form-label" for="typeEmailX">'.ucfirst($medida).'</label>
        </div>
        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="enviar_'.$figura.'">¡Calcular!</button>
        </div>
        <div>
    </form>';
    }
    ?>

    <!-- Funciones para calculo -->
    <?php
    function calc_area_tri($base, $altura)
    {
        return ($base * $altura) / 2;
    }
    function calc_area_squ($lado)
    {
        return $lado**2;
    }
    function calc_area_cir($radio)
    {
        return number_format(($radio**2)*pi(),2);
    }
    ?>


    <!-- Enlace al archivo JavaScript de Bootstrap (y Popper.js si lo usas) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8V1bggQ2W0U7s0jA6Y8C/x6Yv5Q3W2k5R0P9L5f5x6N8X2n2e5W1N2y4g5J1" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbvrj0x9u0+5E5J9c9x8G4Y5g5V6/v5z8l5pW3h5Q0c4H3e5H1H5x5m5X5g5o5l5v5o5o5o5o5o5o5o5o5o5o5o5o5o" crossorigin="anonymous"></script>
</body>

</html>