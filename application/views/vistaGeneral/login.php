<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/fontawesome-free/css/all.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/dist/css/adminlte.min.css") ?>">
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet">
    <style>
        body {
            background: url('<?php echo base_url("/assets/img/fae1.jpeg") ?>') no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            width: 100vw;
        }
        .login-box {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px; /* Ajusta este valor según sea necesario */
            max-width: 100%;
        }
        .btn-primary {
            background-color: #ffc107 !important;
            border-color: #ffc107 !important;
            color: #000 !important;
        }
        .btn-primary:hover {
            background-color: #e0a800 !important;
            border-color: #d39e00 !important;
        }
        .card-header a {
            color: #333;
            text-decoration: none;
        }
        .card-header a:hover {
            color: #000;
        }
    </style>
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-warning">
            <div class="card-header text-center">
                <a href="<?php echo site_url("/vista_general/index") ?>" class="h1"><b>MULTIFAMILIARES <br>FAE</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Iniciar sesión</p>
                <form action="<?php echo site_url("/vista_general/iniciarSesion") ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Usuario" name="correo" id="correo" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña" name="contrasenia" id="contrasenia" required>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <span id="toggleIcon" class="fas fa-eye-slash"></span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                    </div>
                </form>
                <br><br>
                <p class="mb-1"><a href="<?php echo site_url("/vista_general/recovery") ?>">Olvidé mi contraseña</a></p>
                </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show iziToast messages
            <?php if ($this->session->flashdata('correcto')) { ?>
                iziToast.success({
                    title: 'Éxito',
                    message: '<?php echo $this->session->flashdata('correcto'); ?>',
                    position: 'topRight'
                });
            <?php } ?>
            <?php $this->session->set_flashdata("correcto", ""); ?>
            <?php if ($this->session->flashdata('contraseña')) { ?>
                iziToast.success({
                    title: 'Éxito',
                    message: '<?php echo $this->session->flashdata('contraseña'); ?>',
                    position: 'topRight'
                });
            <?php } ?>
            <?php $this->session->set_flashdata("contraseña", ""); ?>
            <?php if ($this->session->flashdata('error')) { ?>
                iziToast.error({
                    title: 'Error',
                    message: '<?php echo $this->session->flashdata('error'); ?>',
                    position: 'topRight'
                });
            <?php } ?>
            <?php $this->session->set_flashdata("error", ""); ?>

            // Toggle password visibility
            $('#togglePassword').on('click', function() {
                const passwordField = $('#contrasenia');
                const passwordFieldType = passwordField.attr('type');
                const toggleIcon = $('#toggleIcon');

                if (passwordFieldType === 'password') {
                    passwordField.attr('type', 'text');
                    toggleIcon.removeClass('fa-eye-slash').addClass('fa-eye');
                } else {
                    passwordField.attr('type', 'password');
                    toggleIcon.removeClass('fa-eye').addClass('fa-eye-slash');
                }
            });
        });
    </script>
</body>
</html>
