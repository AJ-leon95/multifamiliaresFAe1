<?php if (!$this->session->userdata("conectado")) : ?>
    <script>
        window.location.href = "<?php echo site_url(''); ?>";
    </script>
<?php endif; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MULTIFAMILIARES-FAE</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/fontawesome-free/css/all.min.css") ?>">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") ?>">

    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">

    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/jqvmap/jqvmap.min.css") ?>">

    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/dist/css/adminlte.min.css?v=3.2.0") ?>">

    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") ?>">

    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/daterangepicker/daterangepicker.css") ?>">

    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/summernote/summernote-bs4.min.css") ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    

    <script nonce="a2091c53-ff39-462f-9476-e7566b6ce036">
        (function(w, d) {
            ! function(bb, bc, bd, be) {
                bb[bd] = bb[bd] || {};
                bb[bd].executed = [];
                bb.zaraz = {
                    deferred: [],
                    listeners: []
                };
                bb.zaraz.q = [];
                bb.zaraz._f = function(bf) {
                    return async function() {
                        var bg = Array.prototype.slice.call(arguments);
                        bb.zaraz.q.push({
                            m: bf,
                            a: bg
                        })
                    }
                };
                for (const bh of ["track", "set", "debug"]) bb.zaraz[bh] = bb.zaraz._f(bh);
                bb.zaraz.init = () => {
                    var bi = bc.getElementsByTagName(be)[0],
                        bj = bc.createElement(be),
                        bk = bc.getElementsByTagName("title")[0];
                    bk && (bb[bd].t = bc.getElementsByTagName("title")[0].text);
                    bb[bd].x = Math.random();
                    bb[bd].w = bb.screen.width;
                    bb[bd].h = bb.screen.height;
                    bb[bd].j = bb.innerHeight;
                    bb[bd].e = bb.innerWidth;
                    bb[bd].l = bb.location.href;
                    bb[bd].r = bc.referrer;
                    bb[bd].k = bb.screen.colorDepth;
                    bb[bd].n = bc.characterSet;
                    bb[bd].o = (new Date).getTimezoneOffset();
                    if (bb.dataLayer)
                        for (const bo of Object.entries(Object.entries(dataLayer).reduce(((bp, bq) => ({
                                ...bp[1],
                                ...bq[1]
                            })), {}))) zaraz.set(bo[0], bo[1], {
                            scope: "page"
                        });
                    bb[bd].q = [];
                    for (; bb.zaraz.q.length;) {
                        const br = bb.zaraz.q.shift();
                        bb[bd].q.push(br)
                    }
                    bj.defer = !0;
                    for (const bs of [localStorage, sessionStorage]) Object.keys(bs || {}).filter((bu => bu.startsWith("_zaraz_"))).forEach((bt => {
                        try {
                            bb[bd]["z_" + bt.slice(7)] = JSON.parse(bs.getItem(bt))
                        } catch {
                            bb[bd]["z_" + bt.slice(7)] = bs.getItem(bt)
                        }
                    }));
                    bj.referrerPolicy = "origin";
                    bj.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bb[bd])));
                    bi.parentNode.insertBefore(bj, bi)
                };
                ["complete", "interactive"].includes(bc.readyState) ? zaraz.init() : bb.addEventListener("DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
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
    <!--importacion de file input  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/js/fileinput.min.js" integrity="sha512-XxRivO6jA7xU9a0ozATMIFQFdNySyRrB8uE1QctFmjTTGSGUj9tC7CpnVf7xq1e/QeVhbY9ZLbxEzPFIWpW+xA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/css/fileinput.min.css" integrity="sha512-sHiVTDN234pgseKqjDwH39VjS9DkyffX4S00kuAWWq+FrTq7HlFjPoWbfX/QFAxkdG9i9/1ftdG2sS+XWLcJmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/js/locales/es.min.js" integrity="sha512-q2lXTQuccVsDwaOpJNHbGDL2c5DEK706u1MCjKuGAG4zz+q1Sja3l2RuymU3ySE6RfmTYZ/V4wY5Ol71sRvvWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/localization/messages_es.min.js" integrity="sha512-1a6fjZnSCNfMZYZnW1L2J8NEsb68EFa/Qa+GJVwwarCkZyg6Mtv4RPeLiwXbC6knSfOU5qqQ2xkDy5XR423EPw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- importacion de datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <!-- Ckeditor -->
    <!-- <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script> -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
    <!-- import chart js-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- izitoast -->

    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet">
    <!-- boostrap-select -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Full calendar  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.11/index.global.min.js" integrity="sha512-WPqMaM2rVif8hal2KZZSvINefPKQa8et3Q9GOK02jzNL51nt48n+d3RYeBCfU/pfYpb62BeeDf/kybRY4SJyyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core/locales/es.js"></script>
    <!-- APi de google -->
    <!-- importacion de la API -->

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUpcfQp9kDxjlCkT8ASzbF5gybmzhvd8U&libraries=places&callback=initMap">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php if (
        $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
        $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
        $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
        $this->session->userdata("conectado")->perfil == "GERENTE" ||
        $this->session->userdata("conectado")->perfil == "SOCIO"
    ) { ?>
        <script>
            var baseUrl = "<?php echo base_url(); ?>";
        </script>
        <script src="<?php echo base_url('/assets/js/ubicacion.js'); ?>"></script>
    <?php } ?>

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



<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?php echo base_url("/plntAdmin/index3.html") ?>" class="nav-link">Home</a>
                </li> -->
                <li class="nav-item">
                    <a href="<?php echo site_url("/vista_cliente/cerrarSession") ?>" class="nav-link">
                        <!-- <i class="far fa-circle nav-icon"></i> -->
                        <p>Salir</p>
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">

        </nav>


        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <a href="<?php echo site_url("/Welcome/index") ?>" class="brand-link">
                <center>

                    <img src="<?php echo base_url("/uploads/empresa/new_logo1714327226_1256_1.jpg") ?>" alt="" class="brand-image img-rounded elevation-5">MULTIFAMILIARES <br> FAE<br> <!-- class="brand-image img-circle elevation-3" -->
                </center>
                <span class="brand-text font-weight-light"></span>
            </a>

            <div class="sidebar">

                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo base_url("/uploads/usuarios/") ?><?php echo $this->session->userdata("conectado")->foto ?>" class="img-circle elevation-2" alt="User Image" style="width: 50px; height:50px;">
                    </div>
                    <div class="info">
                        <a href="<?php echo site_url("/usuarios_controller/perfil/") ?><?php echo $this->session->userdata("conectado")->id_usu ?>" class="d-block"><?php echo $this->session->userdata("conectado")->nombres . " " . $this->session->userdata("conectado")->apellidos; ?></a>
                    </div>
                </div>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Servicios
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" ||
                                $this->session->userdata("conectado")->perfil == "SOCIO"
                            ) { ?>
                                <li class="nav-item">
                                    <a id="menu_empresa" href="#" class="nav-link" onclick="enviarUbicacion(); return false;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            Actualizar Ubicacion
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>

                            <li class="nav-item">

                                <a id="menu_empresa" href="<?php echo site_url("empresas_controller/index") ?>" class="nav-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                        <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                    </svg>
                                    <p>
                                        Empresa
                                    </p>
                                </a>
                            </li>


                            <li class="nav-item">
                                <a id="menu_directivos" href="<?php echo site_url("usuarios_controller/directivos") ?>" class="nav-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                        <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                    </svg>
                                    <p>
                                        DIRECTIVOS
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo site_url("/carerras_encomiendas_controller/reporteEncomiendas/") ?><?php echo $this->session->userdata("conectado")->id_usu ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Mis Encomiendas</p>
                                </a>
                            </li>
                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" ||
                                $this->session->userdata("conectado")->perfil == "SOCIO" ||
                                $this->session->userdata("conectado")->perfil == "CLIENTE"
                            ) { ?>
                                <li class="nav-item">
                                    <a id="menu_reporteveh" href="<?php echo site_url("vehiculos_controller/reporteVehiculos") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            Vehiculos
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" ||
                                $this->session->userdata("conectado")->perfil == "SOCIO" ||
                                $this->session->userdata("conectado")->perfil == "CLIENTE"
                            ) { ?>
                                <li class="nav-item">
                                    <a id="menu_reporteveh" href="<?php echo site_url("Ubicacion_vehiculo_controller/index") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            Pedir un taxi
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>

                    <li class="nav-header">ADMINISTRAR REUNIONES</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                REUNIONES
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE"
                            ) { ?>
                                <li class="nav-item">
                                    <a id="menu_socio" href="<?php echo site_url("reuniones_controller/index") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            GESTION DE REUNIONES
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" ||
                                $this->session->userdata("conectado")->perfil == "SOCIO"
                            ) { ?>
                                <li class="nav-item">
                                    <a id="menu_socio" href="<?php echo site_url("reuniones_controller/reuniones") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            Reporte Reuniones
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE"
                            ) { ?>
                                <li class="nav-item">

                                    <a id="menu_admin" href="<?php echo site_url("notificaciones_controller/index") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            GESTION DE NOTIFICACIONES
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" ||
                                $this->session->userdata("conectado")->perfil == "SOCIO"
                            ) { ?>
                                <li class="nav-item">
                                    <a id="menu_socio" href="<?php echo site_url("notificaciones_controller/reportes") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            NOTIFICACIONES
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                ADMINISTRACION DE USUARIOS
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE"
                            ) { ?>
                                <li class="nav-item">

                                    <a id="menu_admin" href="<?php echo site_url("usuarios_controller/indexAdmin") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            GESTION DE ADMINISTRADORES
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE"
                            ) { ?>
                                <li class="nav-item">
                                    <a id="menu_socio" href="<?php echo site_url("usuarios_controller/indexSocio") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                                            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5z" />
                                            <path d="M2 3h10v2H2zm0 3h4v3H2zm0 4h4v1H2zm0 2h4v1H2zm5-6h2v1H7zm3 0h2v1h-2zM7 8h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2zm-3 2h2v1H7zm3 0h2v1h-2z" />
                                        </svg>
                                        <p>
                                            GESTION DE SOCIOS
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>

                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE"
                            ) { ?>
                                <li class="nav-item">

                                    <a id="menu_chofer" href="<?php echo site_url("choferes_controller/index") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            GESTION DE CHOFER
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>



                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                ADMINITRACION DE VEHICULOS
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE"
                            ) { ?>
                                <li class="nav-item">
                                    <a id="menu_vehiculo" href="<?php echo site_url("vehiculos_controller/index") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            GESTION DE VEHICULOS
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>


                            <?php if (
                                $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE"
                            ) { ?>
                                <li class="nav-item">

                                    <a id="menu_veh_cho" href="<?php echo site_url("veh_cho_controller/index") ?>" class="nav-link">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-buildings-fill" viewBox="0 0 16 16">
                                            <path d="M15 .5a.5.5 0 0 0-.724-.447l-8 4A.5.5 0 0 0 6 4.5v3.14L.342 9.526A.5.5 0 0 0 0 10v5.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V14h1v1.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5zM2 11h1v1H2zm2 0h1v1H4zm-1 2v1H2v-1zm1 0h1v1H4zm9-10v1h-1V3zM8 5h1v1H8zm1 2v1H8V7zM8 9h1v1H8zm2 0h1v1h-1zm-1 2v1H8v-1zm1 0h1v1h-1zm3-2v1h-1V9zm-1 2h1v1h-1zm-2-4h1v1h-1zm3 0v1h-1V7zm-2-2v1h-1V5zm1 0h1v1h-1z" />
                                        </svg>
                                        <p>
                                            ASIGNACION DE CHOFER VEHICULO
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>





                <li class="nav-item">
                    <!-- <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tree"></i>
                                <p>
                                    UI Elements
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/UI/general.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/UI/icons.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Icons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/UI/buttons.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Buttons</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/UI/sliders.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/UI/modals.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Modals & Alerts</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/UI/navbar.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Navbar & Tabs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/UI/timeline.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Timeline</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/UI/ribbons.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ribbons</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <!-- <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-edit"></i>
                                <p>
                                    Forms
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/forms/general.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>General Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/forms/advanced.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Advanced Elements</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/forms/editors.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Editors</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/forms/validation.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Validation</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <!-- <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Tables
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/tables/simple.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Simple Tables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/tables/data.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DataTables</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/tables/jsgrid.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>jsGrid</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-header">EXAMPLES</li> -->
                <!-- <li class="nav-item"> -->
                <!-- <a href="<?php echo base_url("/plntAdmin/pages/calendar.html") ?>" class="nav-link">
                                <i class="nav-icon far fa-calendar-alt"></i>
                                <p>
                                    Calendar
                                    <span class="badge badge-info right">2</span>
                                </p>
                            </a> -->
                <!-- </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/gallery.html") ?>" class="nav-link">
                                <i class="nav-icon far fa-image"></i>
                                <p>
                                    Gallery
                                </p>
                            </a>
                        </li> -->

                <li class="nav-item">
                    <!-- <a href="#" class="nav-link">
                                <i class="nav-icon far fa-envelope"></i>
                                <p>
                                    Mailbox
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a> -->
                    <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/mailbox/mailbox.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Inbox</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/mailbox/compose.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Compose</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/mailbox/read-mail.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Read</p>
                                    </a>
                                </li>
                            </ul> -->
                </li>
                <li class="nav-item">
                    <!-- <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    Pages
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/invoice.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Invoice</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/profile.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profile</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/e-commerce.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>E-commerce</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/projects.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Projects</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/project-add.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Add</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/project-edit.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Edit</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/project-detail.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Project Detail</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/faq.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>FAQ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/contact-us.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Contact us</p>
                                    </a>
                                </li>
                            </ul> -->
                </li>
                <li class="nav-item">
                    <!-- <a href="#" class="nav-link">
                                <i class="nav-icon far fa-plus-square"></i>
                                <p>
                                    Extras
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a> -->
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Login & Register v1
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/login.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Login v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/register.htm") ?>l" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/forgot-password.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Forgot Password v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/recover-password.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recover Password v1</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Login & Register v2
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/login-v2.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Login v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/register-v2.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Register v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/forgot-password-v2.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Forgot Password v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/examples/recover-password-v2.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Recover Password v2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/examples/lockscreen.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Lockscreen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/examples/legacy-user-menu.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Legacy User Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/examples/language-menu.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Language Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/examples/404.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 404</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/examples/500.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Error 500</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/examples/pace.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pace</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/pages/examples/blank.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blank Page</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/starter.html") ?>" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Starter Page</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <!-- <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-search"></i>
                                <p>
                                    buscar
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a> -->
                    <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/search/simple.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Simple Search</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo base_url("/plntAdmin/pages/search/enhanced.html") ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Enhanced</p>
                                    </a>
                                </li>
                            </ul> -->
                </li>
                <!-- <li class="nav-header">MISCELLANEOUS</li> -->
                <!-- <li class="nav-item">
                            <a href="<?php echo base_url("/plntAdmin/iframe.html") ?>" class="nav-link">
                                <i class="nav-icon fas fa-ellipsis-h"></i>
                                <p>Tabbed IFrame Plugin</p>
                            </a>
                        </li> -->
                <!-- <li class="nav-item">
                            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Documentation</p>
                            </a>
                        </li> -->
                <!-- <li class="nav-header">MULTI LEVEL EXAMPLE</li> -->
                <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Level 1</p>
                            </a>
                        </li> -->
                <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Level 1
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Level 2
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                            </ul>
                        </li> -->
                <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Level 1</p>
                            </a>
                        </li> -->
                <!-- <li class="nav-header">LABELS</li> -->
                <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p class="text">Important</p>
                            </a>
                        </li> -->
                <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Warning</p>
                            </a>
                        </li> -->
                <!-- <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-circle text-info"></i>
                                <p>Informational</p>
                            </a>
                        </li> -->
                    </ul>
                </nav>

            </div>

        </aside>

        <div class="content-wrapper">

            <!-- <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div> -->


            <!-- <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>150</h3>
                                    <p>New Orders</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                                    <p>Bounce Rate</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>44</h3>
                                    <p>User Registrations</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">

                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>65</h3>
                                    <p>Unique Visitors</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    </div>


                    <div class="row">

                        <section class="col-lg-7 connectedSortable">

                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Sales
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="nav nav-pills ml-auto">
                                            <li class="nav-item">
                                                <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content p-0">

                                        <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                                            <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                                        </div>
                                        <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                                            <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card direct-chat direct-chat-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Direct Chat</h3>
                                    <div class="card-tools">
                                        <span title="3 New Messages" class="badge badge-primary">3</span>
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                            <i class="fas fa-comments"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="card-body">

                                    <div class="direct-chat-messages">

                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                            </div>

                                            <img class="direct-chat-img" src="<?php echo base_url("/plntAdmin/dist/img/user1-128x128.jpg") ?>" alt="message user image">

                                            <div class="direct-chat-text">
                                                Is this template really for free? That's unbelievable!
                                            </div>

                                        </div>


                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                            </div>

                                            <img class="direct-chat-img" src="<?php echo base_url("/plntAdmin/dist/img/user3-128x128.jpg") ?>" alt="message user image">

                                            <div class="direct-chat-text">
                                                You better believe it!
                                            </div>

                                        </div>


                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-left">Alexander Pierce</span>
                                                <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                            </div>

                                            <img class="direct-chat-img" src="<?php echo base_url("/plntAdmin/dist/img/user1-128x128.jpg") ?>" alt="message user image">

                                            <div class="direct-chat-text">
                                                Working with AdminLTE on a great new app! Wanna join?
                                            </div>

                                        </div>


                                        <div class="direct-chat-msg right">
                                            <div class="direct-chat-infos clearfix">
                                                <span class="direct-chat-name float-right">Sarah Bullock</span>
                                                <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                            </div>

                                            <img class="direct-chat-img" src="<?php echo base_url("/plntAdmin/dist/img/user3-128x128.jpg") ?>" alt="message user image">

                                            <div class="direct-chat-text">
                                                I would love to.
                                            </div>

                                        </div>

                                    </div>


                                    <div class="direct-chat-contacts">
                                        <ul class="contacts-list">
                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="<?php echo base_url("/plntAdmin/dist/img/user1-128x128.jpg") ?>" alt="User Avatar">
                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Count Dracula
                                                            <small class="contacts-list-date float-right">2/28/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">How have you been? I was...</span>
                                                    </div>

                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="<?php echo base_url("/plntAdmin/dist/img/user7-128x128.jpg") ?>" alt="User Avatar">
                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Sarah Doe
                                                            <small class="contacts-list-date float-right">2/23/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">I will be waiting for...</span>
                                                    </div>

                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="<?php echo base_url("/plntAdmin/dist/img/user3-128x128.jpg") ?>" alt="User Avatar">
                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Nadia Jolie
                                                            <small class="contacts-list-date float-right">2/20/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">I'll call you back at...</span>
                                                    </div>

                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="<?php echo base_url("/plntAdmin/dist/img/user5-128x128.jpg") ?>" alt="User Avatar">
                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Nora S. Vans
                                                            <small class="contacts-list-date float-right">2/10/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">Where is your new...</span>
                                                    </div>

                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="<?php echo base_url("/plntAdmin/dist/img/user6-128x128.jpg") ?>" alt="User Avatar">
                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            John K.
                                                            <small class="contacts-list-date float-right">1/27/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">Can I take a look at...</span>
                                                    </div>

                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <img class="contacts-list-img" src="<?php echo base_url("/plntAdmin/dist/img/user8-128x128.jpg") ?>" alt="User Avatar">
                                                    <div class="contacts-list-info">
                                                        <span class="contacts-list-name">
                                                            Kenneth M.
                                                            <small class="contacts-list-date float-right">1/4/2015</small>
                                                        </span>
                                                        <span class="contacts-list-msg">Never mind I found...</span>
                                                    </div>

                                                </a>
                                            </li>

                                        </ul>

                                    </div>

                                </div>

                                <div class="card-footer">
                                    <form action="#" method="post">
                                        <div class="input-group">
                                            <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                            <span class="input-group-append">
                                                <button type="button" class="btn btn-primary">Send</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>

                            </div>


                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="ion ion-clipboard mr-1"></i>
                                        To Do List
                                    </h3>
                                    <div class="card-tools">
                                        <ul class="pagination pagination-sm">
                                            <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                            <li class="page-item"><a href="#" class="page-link">1</a></li>
                                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                                            <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <ul class="todo-list" data-widget="todo-list">
                                        <li>

                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>

                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value name="todo1" id="todoCheck1">
                                                <label for="todoCheck1"></label>
                                            </div>

                                            <span class="text">Design a nice theme</span>

                                            <small class="badge badge-danger"><i class="far fa-clock"></i> 2 mins</small>

                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value name="todo2" id="todoCheck2" checked>
                                                <label for="todoCheck2"></label>
                                            </div>
                                            <span class="text">Make the theme responsive</span>
                                            <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value name="todo3" id="todoCheck3">
                                                <label for="todoCheck3"></label>
                                            </div>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value name="todo4" id="todoCheck4">
                                                <label for="todoCheck4"></label>
                                            </div>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value name="todo5" id="todoCheck5">
                                                <label for="todoCheck5"></label>
                                            </div>
                                            <span class="text">Check your messages and notifications</span>
                                            <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <span class="handle">
                                                <i class="fas fa-ellipsis-v"></i>
                                                <i class="fas fa-ellipsis-v"></i>
                                            </span>
                                            <div class="icheck-primary d-inline ml-2">
                                                <input type="checkbox" value name="todo6" id="todoCheck6">
                                                <label for="todoCheck6"></label>
                                            </div>
                                            <span class="text">Let theme shine like a star</span>
                                            <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
                                            <div class="tools">
                                                <i class="fas fa-edit"></i>
                                                <i class="fas fa-trash-o"></i>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="card-footer clearfix">
                                    <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
                                </div>
                            </div>

                        </section>


                        <section class="col-lg-5 connectedSortable">

                            <div class="card bg-gradient-primary">
                                <div class="card-header border-0">
                                    <h3 class="card-title">
                                        <i class="fas fa-map-marker-alt mr-1"></i>
                                        Visitors
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                            <i class="far fa-calendar-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>

                                </div>
                                <div class="card-body">
                                    <div id="world-map" style="height: 250px; width: 100%;"></div>
                                </div>

                                <div class="card-footer bg-transparent">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <div id="sparkline-1"></div>
                                            <div class="text-white">Visitors</div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <div id="sparkline-2"></div>
                                            <div class="text-white">Online</div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <div id="sparkline-3"></div>
                                            <div class="text-white">Sales</div>
                                        </div>

                                    </div>

                                </div>
                            </div>


                            <div class="card bg-gradient-info">
                                <div class="card-header border-0">
                                    <h3 class="card-title">
                                        <i class="fas fa-th mr-1"></i>
                                        Sales Graph
                                    </h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>

                                <div class="card-footer bg-transparent">
                                    <div class="row">
                                        <div class="col-4 text-center">
                                            <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60" data-fgColor="#39CCCC">
                                            <div class="text-white">Mail-Orders</div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60" data-fgColor="#39CCCC">
                                            <div class="text-white">Online</div>
                                        </div>

                                        <div class="col-4 text-center">
                                            <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60" data-fgColor="#39CCCC">
                                            <div class="text-white">In-Store</div>
                                        </div>

                                    </div>

                                </div>

                            </div>


                            <div class="card bg-gradient-success">
                                <div class="card-header border-0">
                                    <h3 class="card-title">
                                        <i class="far fa-calendar-alt"></i>
                                        Calendar
                                    </h3>

                                    <div class="card-tools">

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                                <i class="fas fa-bars"></i>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a href="#" class="dropdown-item">Add new event</a>
                                                <a href="#" class="dropdown-item">Clear events</a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" class="dropdown-item">View calendar</a>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>

                                </div>

                                <div class="card-body pt-0">

                                    <div id="calendar" style="width: 100%"></div>
                                </div>

                            </div>

                        </section>

                    </div>

                </div>
            </section>

        </div> -->
