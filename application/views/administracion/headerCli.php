<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MULTIFAMILIARES-FAE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url("/planGeneral/img/favicon.ico"); ?>">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url("/planGeneral/lib/animate/animate.min.css"); ?>" rel="stylesheet">
    <link href="<?php echo base_url("/planGeneral/lib/owlcarousel/assets/owl.carousel.min.css"); ?>" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url("/planGeneral/css/bootstrap.min.css"); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url("/planGeneral/css/style.css"); ?>" rel="stylesheet">

    <!-- jQuery and Plugins -->
    <script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/js/fileinput.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/css/fileinput.min.css" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.5.2/js/locales/es.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/localization/messages_es.min.js" crossorigin="anonymous"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- iziToast -->
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>

    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    
    
<!-- PWA -->
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




    </script>

    <script type="text/javascript">
        jQuery.validator.addMethod("letras", function(value, element) {
            return this.optional(element) || /^[A-Za-zÁÉÍÑÓÚáé íñó]*$/.test(value);
        }, "Este campo solo acepta letras");
    </script>

    <!-- iziToast Configurations -->
    <?php if ($this->session->flashdata('bienvenida')) { ?>
        <script>
            $(document).ready(function() {
                iziToast.show({
                    id: 'show',
                    title: "<?php echo $this->session->flashdata('bienvenida'); ?>",
                    position: 'topRight'
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
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary" role="status"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <?php $current_page = basename($_SERVER['PHP_SELF']); // Obtener el nombre del archivo actual ?>
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="<?php echo site_url("/vista_general/index"); ?>" class="navbar-brand d-flex align-items-center border-end px-4 px-lg-5">
            <h2 class="m-0"><i class="fa fa-car text-primary me-2"></i>MULTIFAMILIARES</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?php echo site_url("/vista_general/index"); ?>"
                   class="nav-item nav-link <?php echo ($current_page == 'index') ? 'active' : ''; ?>">Inicio</a>
                <a href="<?php echo site_url("/vista_general/socios"); ?>"
                   class="nav-item nav-link <?php echo ($current_page == 'socios') ? 'active' : ''; ?>">Socios</a>
                <a href="<?php echo site_url("/vista_general/vehiculos"); ?>"
                   class="nav-item nav-link <?php echo ($current_page == 'vehiculos') ? 'active' : ''; ?>">Vehículos</a>
                <!-- <a href="<?php echo site_url("/vista_general/choferes"); ?>"
                   class="nav-item nav-link <?php echo ($current_page == 'choferes') ? 'active' : ''; ?>">Choferes</a> -->
                   <a href="<?php echo site_url("/vista_general/login"); ?>"
                       class="btn btn-primary py-sm-3 px-sm-5">Ingresar</a>
                    <a href="<?php echo site_url("/vista_general/registarseCli"); ?>"
                       class="btn btn-dark py-sm-3 px-sm-5 ms-3">Registrarse</a>
                <div class="wow fadeInUp" data-wow-delay="0.5s">
               
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Additional content and scripts can go here -->

</body>

</html>
