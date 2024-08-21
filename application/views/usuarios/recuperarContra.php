<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Iniciar session</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/fontawesome-free/css/all.min.css") ?>">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/dist/css/adminlte.min.css") ?>">
    <!-- <link rel="stylesheet" href="<?php echo base_url("/assets/css/estilosLogin.css") ?>"> -->
</head>


<!-- configuraciones del iziToast -->
<?php if ($this->session->flashdata('bienvenida')) { ?>
    <script>
        $(document).ready(function() {
            iziToast.show({
                id: 'show',
                title: "<?php echo $this->session->flashdata('bienvenida'); ?>",
                position: 'topRight',
                /*  position: 'bottomRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center */

            });
        });
    </script>
    <?php $this->session->set_flashdata("bienvenida", ""); ?>
<?php } ?>

<?php if ($this->session->flashdata('correcto')) { ?>
    <script>
        $(document).ready(function() {
            iziToast.success({
                id: 'success',
                title: "<?php echo $this->session->flashdata('correcto'); ?>",
                position: 'topRight'
            });
        });
    </script>
    <?php $this->session->set_flashdata("correcto", ""); ?>
<?php } ?>
<?php if ($this->session->flashdata('eliminar')) { ?>
    <script>
        $(document).ready(function() {
            iziToast.error({
                id: 'error',
                title: "<?php echo $this->session->flashdata('eliminar'); ?>",
                position: 'bottomRight'
            });
        });
    </script>
    <?php $this->session->set_flashdata("eliminar", ""); ?>
<?php } ?>
<?php if ($this->session->flashdata('actualizar')) { ?>
    <script>
        $(document).ready(function() {
            iziToast.warning({
                id: 'warning',
                title: "<?php echo $this->session->flashdata('actualizar'); ?>",
                position: 'topRight'
            });
        });
    </script>
    <?php $this->session->set_flashdata("actualizar", ""); ?>
<?php } ?>
<!-- fin de las configuraciones del iziToas -->

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?php echo site_url("/vista_general/index") ?>" class="h1"><b>MULTIFAMILIARES </b>FAE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Recuperar Contraseña</p>

                <form action="<?php echo site_url("/usuarios_controller/CambiarContra") ?>" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" value="<?php echo $correo->correo  ?>" readonly placeholder="Usuario" name="correo" id="correo"><br>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="nueva contrasenia" name="nueva_contrasenia" id="nueva_contrasenia">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
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
                            <button type="submit" class="btn btn-primary btn-block">Cambiar Contraseña</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

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
                    <!-- <a href="<?php echo base_url("/plntAdmin/forgot-password.html") ?>">Olvidé mi contraseña</a> -->
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

    <!-- jQuery -->
    <script src="<?php echo base_url("/plntAdmin/plugins/jquery/jquery.min.js/") ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url("/plntAdmin/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url("/plntAdmin/dist/js/adminlte.min.js") ?>"></script>
</body>

</html>