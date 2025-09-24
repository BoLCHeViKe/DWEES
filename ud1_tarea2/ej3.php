<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis billetes</title>
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
                                <h2 class="fw-bold mb-2 text-uppercase">Bienvenido</h2>
                                <p class="text-white-50 mb-5">Introduzca información del viajero:</p>
                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <label class="form-label" for="preciob">Precio del billete</label>
                                    <input type="number" min="0.01" step="0.01" id="preciob" class="form-control form-control-lg" name="pricet" placeholder="Precio del billete" required />
                                    <label class="form-label" for="edadc">Edad</label>
                                    <input type="number" min="0" max="110" step="1" id="edadc" class="form-control form-control-lg" name="age" placeholder="Edad" required />
                                    <fieldset>
                                        <legend>¿Eres estudiante?</legend>
                                        <div>
                                            <input type="radio" id="est_si" name="studient" value="si" />
                                            <label for="est_si">Si</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="est_no" name="studient" value="no" checked />
                                            <label for="est_no">No</label>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <legend>¿Eres miembro de familia numerosa?</legend>
                                        <div>
                                            <input type="radio" id="big_fam_si" name="numfam" value="si" />
                                            <label for="big_fam_si">Si</label>
                                        </div>
                                        <div>
                                            <input type="radio" id="big_fam_no" name="numfam" value="no" checked />
                                            <label for="big_fam_no">No</label>
                                        </div>
                                    </fieldset>

                                </div>
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="enviar">Seleccionar</button>
                                <?php
                                if (isset($_REQUEST['enviar'])) { //Formulario principal
                                    $price = $_REQUEST['pricet'];
                                    $age = $_REQUEST['age'];
                                    $student = $_REQUEST['studient'] == 'si' ? true : false; //convertimos a boolean
                                    $big_fam = $_REQUEST['numfam'] == 'si' ? true : false;
                                    $unit_price_disc = calc_descuento($age, $student, $big_fam);
                                    echo '<p class="text-white-50 mb-5">El precio del billete pagando el ' . ($unit_price_disc * 100) . '% es: </p>';
                                    echo '<h2 class="fw-bold mb-2">' . round($price * $unit_price_disc, 2) . " €" . '</h2>';
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

    <!-- Funcion para calculo -->
    <?php
    function calc_descuento($age, $student, $big_fam)
    {
        // //Hecho con if
        // $appli_discounts = [1]; //partimos de que todos pagan la unidad
        // if ($age<4) {
        //     array_push($appli_discounts, 0); //Pagan el 0%
        // } elseif ($age>=4&&$age<=7) {
        //     array_push($appli_discounts,0.5); //Pagan el 50%
        // } elseif ($age>65) {
        //     array_push($appli_discounts,0.4); //Pagan el 40%
        // }
        //Hecho con el operador ternario
        $pay_with_disc = []; //o tambien array();
        array_push($pay_with_disc, ($age < 4 ? 0 : ($age <= 7 ? 0.5 : ($age > 65 ? 0.4 : 1)))); //Aplicamos descuento por edades.. si no.. 1 (paga la unidad)
        array_push($pay_with_disc, $student ? 0.45 : 1);
        array_push($pay_with_disc, $big_fam ? 0.7 : 1);
        sort($pay_with_disc);
        return array_shift($pay_with_disc);
    }
    ?>
    <!-- Enlace al archivo JavaScript de Bootstrap (y Popper.js si lo usas) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8V1bggQ2W0U7s0jA6Y8C/x6Yv5Q3W2k5R0P9L5f5x6N8X2n2e5W1N2y4g5J1" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbvrj0x9u0+5E5J9c9x8G4Y5g5V6/v5z8l5pW3h5Q0c4H3e5H1H5x5m5X5g5o5l5v5o5o5o5o5o5o5o5o5o5o5o5o5o" crossorigin="anonymous"></script>
</body>

</html>