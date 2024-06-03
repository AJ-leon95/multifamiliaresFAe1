<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de session</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/fontawesome-free/css/all.min.css") ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/dist/css/adminlte.min.css") ?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url("/assets/css/estilosLogin.css") ?>"> -->
    <!-- izitoast -->

    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet">
    <!-- IMPORTACION SOLO DE JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <!-- IMPORTACION DE JQUERY VALIDATE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        jQuery.validator.addMethod("letras", function(value, element) {
            //return this.optional(element) || /^[a-z]+$/i.test(value);
            return this.optional(element) || /^[A-Za-zÁÉÍÑÓÚáé íñó]*$/.test(value);

        }, "Este campo solo acepta letras");
    </script>
</head>


<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-warning">
            <div class="card-header text-center">
                <a href="<?php echo site_url("/vista_general/index") ?>" class="h1"><b>MULTIFAMILIARES <br>FAE</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Iniciar session</p>

                <form action="<?php echo site_url("/vista_general/iniciarSesion") ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Usuario" name="correo" id="correo">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="contrasenia" id="contrasenia">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <span id="toggleIcon" class="fas fa-eye-slash"></span>
                            </button>
                        </div>
                    </div>

                    <div class="row">
                        <!-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
                <br>
                <?php if (isset($_GET["mensaje"])) { ?>
                    <div class="alert alert-success" role="alert">
                        <?php
                        $mensaje = $_GET["mensaje"];
                        switch ($mensaje) {
                            case "cambio":
                                echo "Su contraseña cambió, ahora ingrese.";
                                break;
                            case "ok":
                                echo "Se le envió un correo, por favor revíselo.";
                                break;
                            case "error":
                                echo "Algo salió mal, inténtelo de nuevo.";
                                break;
                            default:
                                echo "Mensaje no reconocido.";
                        }
                        ?>
                    </div>
                <?php } ?>

                <!-- <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> -->
                <!-- /.social-auth-links -->
                <br><br>
                <p class="mb-1">

                    <a href="<?php echo site_url("vista_general/recovery") ?>">Olvidé mi contraseña</a>
                </p>
                <!-- <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> -->
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->
    <script>
        $(document).ready(function() {
            // Obtener el campo de contraseña y el botón de alternancia
            var passwordField = $('#contrasenia');
            var toggleButton = $('#togglePassword');

            // Manejar el clic en el botón de alternancia
            toggleButton.on('click', function() {
                var passwordFieldType = passwordField.attr('type');
                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    $('#toggleIcon').removeClass('fas fa-eye-slash').addClass('fas fa-eye');
                } else {
                    passwordField.attr('type', 'password');
                    $('#toggleIcon').removeClass('fas fa-eye').addClass('fas fa-eye-slash');
                }
            });
        });
    </script>

    <!-- jQuery -->
    <script src="<?php echo base_url("/plntAdmin/plugins/jquery/jquery.min.js/") ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url("/plntAdmin/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url("/plntAdmin/dist/js/adminlte.min.js") ?>"></script>
</body>

</html>