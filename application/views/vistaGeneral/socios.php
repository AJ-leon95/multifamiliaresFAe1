<!-- Courses Start -->
<div class="container-xxl py-6">
    <div class="container">
        <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h6 class="text-primary text-uppercase mb-2">Lista de Socios</h6>
            <h6 class="text-primary text-uppercase mb-2">Taxi Seguro</h6>
            <h1 class="display-6 mb-4">Multifamiliares FAE</h1>
        </div>
        <div class="row g-4">
            <?php foreach ($socios as $registro){ ?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="courses-item d-flex flex-column bg-light overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <h5 class="mb-3"><?php echo $registro->nombres." ".$registro->apellidos ?></h5>
                            <p><?php echo $registro->perfil ?></p>
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item small"><i class="fa fa-signal text-primary me-2"></i>Número de contacto: <?php echo $registro->telefono ?></li>
                            </ol>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="<?php echo base_url("/uploads/usuarios/$registro->foto") ?>" alt="" style="width: 100%; height: 250px; object-fit: cover;">
                            <div class="courses-overlay">
                                <a class="btn btn-outline-primary border-2" href="https://wa.me/<?php echo '593' . substr($registro->telefono, 1); ?>" target="_blank">Contactar</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Courses End -->
