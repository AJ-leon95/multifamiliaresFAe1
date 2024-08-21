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

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/fontawesome-free/css/all.min.css") ?>">

    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css") ?>">

    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/icheck-bootstrap/icheck-bootstrap.min.css") ?>">

    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/jqvmap/jqvmap.min.css") ?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/dist/css/adminlte.min.css?v=3.2.0") ?>">

    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css") ?>">

    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/daterangepicker/daterangepicker.css") ?>">

    <!-- Summernote -->
    <link rel="stylesheet" href="<?php echo base_url("/plntAdmin/plugins/summernote/summernote-bs4.min.css") ?>">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- IMPORTACION SOLO DE JQUERY -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <!-- IMPORTACION DE JQUERY VALIDATE -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Importación de Fileinput -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/js/fileinput.min.js" integrity="sha512-XxRivO6jA7xU9a0ozATMIFQFdNySyRrB8uE1QctFmjTTGSGUj9tC7CpnVf7xq1e/QeVhbY9ZLbxEzPFIWpW+xA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/css/fileinput.min.css" integrity="sha512-sHiVTDN234pgseKqjDwH39VjS9DkyffX4S00kuAWWq+FrTq7HlFjPoWbfX/QFAxkdG9i9/1ftdG2sS+XWLcJmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/js/locales/es.min.js" integrity="sha512-q2lXTQuccVsDwaOpJNHbGDL2c5DEK706u1MCjKuGAG4zz+q1Sja3l2RuymU3ySE6RfmTYZ/V4wY5Ol71sRvvWA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <!-- Responsive DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.dataTables.min.css">

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- Responsive DataTables JS -->
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Izitoast -->
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet">

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- FullCalendar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.11/index.global.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.11/index.global.min.js" integrity="sha512-WPqMaM2rVif8hal2KZZSvINefPKQa8et3Q9GOK02jzNL51nt48n+d3RYeBCfU/pfYpb62BeeDf/kybRY4SJyyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.4/locales/es.js"></script>

    <!-- Google Maps API -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDI3RHYCCjPLRLrRV5LDUGu46DEkTJhVGs&libraries=places&callback=initMap"></script>    <!-- PWA -->
<link rel="manifest" href="<?php echo base_url('/assets/manifest.json'); ?>">

<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('<?php echo base_url("assets/js/service-worker.js"); ?>')
        .then(function(registration) {
            console.log('Service Worker registrado con éxito:', registration.scope);
        }).catch(function(error) {
            console.log('Error al registrar el Service Worker:', error);
        });
    }
</script>



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

    <?php if ($this->session->userdata("conectado")->perfil == "PRESIDENTE" || $this->session->userdata("conectado")->perfil == "SECRETARIO" || $this->session->userdata("conectado")->perfil == "GERENTE" || $this->session->userdata("conectado")->perfil == "SOCIO") { ?>
        <script>
            var baseUrl = "<?php echo base_url(); ?>";
        </script>
        <script src="<?php echo base_url('/assets/js/ubicacion.js?v=1.1'); ?>"></script>

    <?php } ?>

    <!-- jQuery Validation Custom Method -->
    <script type="text/javascript">
        jQuery.validator.addMethod("letras", function(value, element) {
            return this.optional(element) || /^[A-Za-zÁÉÍÑÓÚáé íñó]*$/.test(value);
        }, "Este campo solo acepta letras");
    </script>
    <style>
        /* Estilo para el menú "Servicios" activo */
        .nav-link.servicios-active {
            background-color: #ffeb3b;
            /* Color de fondo amarillo */
            color: #000;
            /* Color de texto negro */
        }

        /* Asegúrate de que el icono también cambie de color si es necesario */
        .nav-link.servicios-active .nav-icon {
            color: #000;
            /* Color del icono negro */
        }

        .servicios-active {
            background-color: #ffd700;
            /* Ejemplo: amarillo dorado */
            color: #000000;
            /* Ejemplo: texto negro */
        }
    </style>
</head>

<!-- Configuraciones del iziToast -->
<?php if ($this->session->flashdata('bienvenida')) : ?>
    <?php $bienvenida_message = $this->session->flashdata('bienvenida'); ?>
    <script>
        $(document).ready(function() {
            iziToast.show({
                title: "<?php echo $bienvenida_message; ?>",
                position: 'topRight',
                timeout: 3000, // Tiempo en milisegundos
                theme: 'light', // Tema: dark, light
                progressBarColor: '#2ECC71' // Color de la barra de progreso
            });
        });
    </script>
    <?php $this->session->set_flashdata("bienvenida", ""); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('correcto')) : ?>
    <?php $correcto_message = $this->session->flashdata('correcto'); ?>
    <script>
        $(document).ready(function() {
            iziToast.success({
                title: "<?php echo $correcto_message; ?>",
                position: 'topRight',
                timeout: 3000,
                theme: 'light',
                progressBarColor: '#2ECC71'
            });
        });
    </script>
    <?php $this->session->set_flashdata("correcto", ""); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('eliminar')) : ?>
    <?php $eliminar_message = $this->session->flashdata('eliminar'); ?>
    <script>
        $(document).ready(function() {
            iziToast.error({
                title: "<?php echo $eliminar_message; ?>",
                position: 'topRight',
                timeout: 3000,
                theme: 'light',
                progressBarColor: '#E74C3C'
            });
        });
    </script>
    <?php $this->session->set_flashdata("eliminar", ""); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('actualizar')) : ?>
    <?php $actualizar_message = $this->session->flashdata('actualizar'); ?>
    <script>
        $(document).ready(function() {
            iziToast.warning({
                title: "<?php echo $actualizar_message; ?>",
                position: 'topRight',
                timeout: 3000,
                theme: 'light',
                progressBarColor: '#F39C12'
            });
        });
    </script>
    <?php $this->session->set_flashdata("actualizar", ""); ?>
<?php endif; ?>
<!-- Fin de las configuraciones del iziToast -->

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo base_url("/uploads/empresa/new_logo1714327226_1256_1.jpg") ?>" alt="MULTIFAMILIARES-FAE" height="60" width="60">
        </div>

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Toggler para mostrar el menú en dispositivos pequeños -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Botón de salir alineado a la derecha -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="<?php echo site_url('/vista_general/cerrarSession') ?>" class="nav-link logout-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p class="d-none d-md-inline">Salir</p>
                    </a>
                </li>
            </ul>
        </nav>
        <?php
        $current_uri = $this->uri->uri_string();
        $active_class = function ($uri) use ($current_uri) {
            return $current_uri == $uri ? 'active servicios-active' : '';
        };
        ?>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Encuentra el elemento del menú activo
                var activeLink = document.querySelector('.nav-link.active');

                if (activeLink) {
                    // Abre el submenú de los elementos activos
                    var parent = activeLink.closest('.nav-treeview');
                    if (parent) {
                        parent.closest('.nav-item').classList.add('menu-open');
                    }
                }
            });
        </script>

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
                        <center>

                        <a href="<?php echo site_url("/usuarios_controller/perfil") ?>" class="d-block">
    <?php echo $this->session->userdata("conectado")->nombres . "<br> " . $this->session->userdata("conectado")->apellidos; ?>
</a>
                        </center>
                    </div>
                </div>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


                    <li class="nav-item <?php echo $active_class('servicios'); ?> " id="servicios">
                        <a href="#" class="nav-link <?php echo $active_class('servicios'); ?>">
                            <i class="nav-icon fas fa-tools"></i>

                            <p>
                                Servicios
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <?php if (
                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" ||
                                $this->session->userdata("conectado")->perfil == "SOCIO"
                            ) { ?>
                                <li class="nav-item">
                                    <a href="#" class="nav-link" onclick="enviarUbicacion(); return false;">
                                        <i class="nav-icon fas fa-map-marker-alt"></i>

                                        <p>Actualizar Ubicación</p>
                                    </a>
                                </li>
                            <?php } ?>
                            <!-- <?php if (
                                        $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                        $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                        $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                        $this->session->userdata("conectado")->perfil == "GERENTE"
                                    ) { ?>
                                <li class="nav-item">
                                    <a  href="<?php echo site_url("/PrecioCarreras_controller/index/") ?>" class="nav-link">
                                    <i class="nav-icon fas fa-money-bill-alt"></i>

                                        <p>Precios Carreras</p>
                                    </a>
                                </li>
                            <?php } ?> -->

                            <li class="nav-item">
                                <a id="menu_empresa" href="<?php echo site_url("empresas_controller/index") ?>" class="nav-link">
                                    <i class="nav-icon  fas fa-building"></i>

                                    <p>Empresa</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a id="menu_directivos" href="<?php echo site_url("usuarios_controller/directivos") ?>" class="nav-link">
                                    <i class=" nav-icon fas fa-user-tie"></i>
                                    <p>Directivos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="reportEnc" href="<?php echo site_url("/carerras_encomiendas_controller/reporteEncomiendas/") ?><?php echo $this->session->userdata("conectado")->id_usu ?>" class="nav-link">
                                    <i class="nav-icon fas fa-box"></i>

                                    <p>Mis Encomiendas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a id="reportCarrera" href="<?php echo site_url("/carerras_encomiendas_controller/reporteCarreras/") ?><?php echo $this->session->userdata("conectado")->id_usu ?>" class="nav-link ">
                                    <i class="nav-icon fas fa-car"></i>

                                    <p>Mis Carreras</p>
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
                                    <a id="menu_vehiculos" href="<?php echo site_url("vehiculos_controller/reporteVehiculos") ?>" class="nav-link">
                                        <i class="nav-icon fas fa-taxi"></i>

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
                                    <a id="pedir_taxi" href="<?php echo site_url("Ubicacion_vehiculo_controller/index") ?>" class="nav-link">
                                        <i class="nav-icon fas fa-taxi"></i>

                                        <p>
                                            Pedir un taxi
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (

                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" ||
                                $this->session->userdata("conectado")->perfil == "SOCIO"
                            ) { ?>
                                <li class="nav-item">
                                    <a id="menu_carreras" href="<?php echo site_url("/carerras_encomiendas_controller/reporteMisCarreras/") ?><?php echo $this->session->userdata("conectado")->id_usu ?>" class="nav-link">
                                        <i class="nav-icon fas fa-history"></i>

                                        <p>
                                            Carreras
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                            <?php if (

                                $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                                $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                                $this->session->userdata("conectado")->perfil == "GERENTE" ||
                                $this->session->userdata("conectado")->perfil == "SOCIO"
                            ) { ?>
                                <li class="nav-item">
                                    <a id="menu_encomiendas" href="<?php echo site_url("/carerras_encomiendas_controller/reporteMisEncomiendas/") ?><?php echo $this->session->userdata("conectado")->id_usu ?>" class="nav-link">
                                        <i class="nav-icon fas fa-box-open"></i>


                                        <p>
                                            ENCOMIENDAS
                                        </p>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                    <?php if (
                        $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                        $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                        $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                        $this->session->userdata("conectado")->perfil == "GERENTE"
                    ) { ?>
                        <li class="nav-header">ADMINISTRACION</li>

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-handshake <?php echo $active_class('cooperativa'); ?>"></i>

                                <p>
                                    COOPERATIVA
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
                                        <a id="reunion" href="<?php echo site_url("reuniones_controller/index") ?>" class="nav-link">
                                            <i class="fas fas fa-users""></i>

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
                                    $this->session->userdata("conectado")->perfil == "GERENTE"
                                ) { ?>
                                    <li class=" nav-item">
                                                <a id="deporte" href="<?php echo site_url("deportes_controller/index") ?>" class="nav-link">
                                                    <i class="fas fas fa-futbol"></i>
                                                    <p>
                                                        GESTION DE DEPORTES
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
                                            <i class="fas fas fa-bell"></i>
                                            <p>
                                                GESTION DE NOTIFICACIONES
                                            </p>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>
                    <?php } ?>
                    <!-- JCCJ -->

                    <?php if (
                        $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                        $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                        $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                        $this->session->userdata("conectado")->perfil == "GERENTE" ||
                        $this->session->userdata("conectado")->perfil == "SOCIO"

                    ) { ?>
                        <li class="nav-header">REPORRTES PERSONALES</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-clipboard-list"></i>
                                <p>
                                    REPORTES
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
                                        <a id="horarioDeporte" href="<?php echo site_url("deportes_controller/deporte") ?>" class="nav-link">
                                            <i class="fas fas fa-clock"></i>
                                            <p>
                                                HORARIOS DE DEPORTES
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
                                        <a id="horarioReuniones" href="<?php echo site_url("reuniones_controller/reuniones") ?>" class="nav-link">
                                            <i class="fas fas fa-file-alt"></i>
                                            <p>
                                                REUNIONES
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
                                        <a id="reporteNotificaciones" href="<?php echo site_url("notificaciones_controller/reportes") ?>" class="nav-link">
                                            <i class="fas fas fa-bell"></i>
                                            <p>
                                                NOTIFICACIONES
                                            </p>
                                        </a>
                                    </li>
                                <?php } ?>

                            </ul>
                        </li>
                    <?php } ?>
                    <?php if (
                        $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                        $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                        $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                        $this->session->userdata("conectado")->perfil == "GERENTE"
                    ) { ?>
                        <li class="nav-header">ADMINISTRACION USUARIOS</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-shield"></i>
                                <p>
                                    USUARIOS
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
                                        <a id="admin" href="<?php echo site_url("usuarios_controller/indexAdmin") ?>" class="nav-link">
                                            <i class="fas fa-user-shield"></i>
                                            <p>ADMINISTRADORES</p>
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
                                            <i class="nav-icon fas fa-user-friends"></i>
                                            <p>SOCIOS</p>
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
                                            <i class="nav-icon fas fa-user-tie"></i>
                                            <p>CHOFERES</p>
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
                                        <a id="menu_clientes" href="<?php echo site_url("usuarios_controller/indexCli") ?>" class="nav-link">
                                            <i class="nav-icon fas fa-user"></i>
                                            <p>CLIENTES</p>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>

                    <?php if (
                        $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                        $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                        $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                        $this->session->userdata("conectado")->perfil == "GERENTE"
                    ) { ?>
                        <li class="nav-header">ADMINISTRACION DE VEHICULOS</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-car-side"></i>
                                <p>
                                    VEHICULOS
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
                                            <i class="nav-icon fas fa-car"></i>

                                            <p>
                                                VEHICULOS
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

                                        <a id="asignacion" href="<?php echo site_url("veh_cho_controller/index") ?>" class="nav-link">
                                            <i class="nav-icon fas fa-user-check"></i>

                                            <p>
                                                ASIGNACION DE CHOFER A VEHICULO
                                            </p>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>

                    <?php } ?>
                    </nav>

            </div>

        </aside>

        <div class="content-wrapper">