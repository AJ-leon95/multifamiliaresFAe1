<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer my-6 mb-0 py-6 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Taxi Seguro Latacunga</h4>
                <h2 class="text-primary mb-4"><i class="fa fa-car text-white me-2"></i>Inicio</h2>
                <?php foreach ($empresa as $registro){ ?>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i><?php echo $registro->direccion_emp ?></p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i><?php echo $registro->correo_emp ?></p>
                <?php } ?>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Páginas</h4>
                <a class="btn btn-link" href="<?php echo site_url("/vista_general/index") ?>">Inicio</a>
                <a class="btn btn-link" href="<?php echo site_url("/vista_general/socios") ?>">Socios</a>
                <a class="btn btn-link" href="<?php echo site_url("/vista_general/vehiculos") ?>">Vehículos</a>
                <a class="btn btn-link" href="<?php echo site_url("/vista_general/choferes") ?>">Choferes</a>
            </div>
            <div class="col-lg-6 col-md-6">
                <h4 class="text-light mb-4">Opciones del Sistema</h4>
                <h6 class="text-light mb-4">Registro</h6>
                <h6 class="text-light mb-4">Encargar encomiendas al taxista de tu preferencia</h6>
                <h6 class="text-light mb-4">Carreras en tiempo real</h6>
                <h6 class="text-light mb-4">Taxi seguro: registrados solo los taxistas de la cooperativa, así puedes estar seguro de quién te ayuda con el servicio.</h6>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url("/planGeneral/")  ?>lib/wow/wow.min.js"></script>
<script src="<?php echo base_url("/planGeneral/")  ?>lib/easing/easing.min.js"></script>
<script src="<?php echo base_url("/planGeneral/")  ?>lib/waypoints/waypoints.min.js"></script>
<script src="<?php echo base_url("/planGeneral/")  ?>lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="<?php echo base_url("/planGeneral/")  ?>js/main.js"></script>
