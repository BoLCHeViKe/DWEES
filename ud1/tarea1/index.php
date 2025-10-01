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
        <form class="vh-100 gradient-custom" name="login" action="bienvenido.php" method="post">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <div class="mb-md-5 mt-md-4 pb-5">
                                    <h2 class="fw-bold mb-2 text-uppercase">Bienvenido</h2>
                                    <p class="text-white-50 mb-5">Por favor, introduzca usuario:</p>
                                    <div data-mdb-input-init class="form-outline form-white mb-4">
                                        <input type="text" id="typeEmailX" class="form-control form-control-lg" name="user" placeholder="introduce usuario" required/>
                                        <label class="form-label" for="typeEmailX">Usuario</label>
                                    </div>
                                    <button data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-light btn-lg px-5" type="submit" name="enviar">Comprobar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <!-- Enlace al archivo JavaScript de Bootstrap (y Popper.js si lo usas) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8V1bggQ2W0U7s0jA6Y8C/x6Yv5Q3W2k5R0P9L5f5x6N8X2n2e5W1N2y4g5J1" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbvrj0x9u0+5E5J9c9x8G4Y5g5V6/v5z8l5pW3h5Q0c4H3e5H1H5x5m5X5g5o5l5v5o5o5o5o5o5o5o5o5o5o5o5o5o" crossorigin="anonymous"></script>
</body>

</html>