

    <!-- Courses Start -->
    <div class="container-xxl courses my-6 py-6 pb-0">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h6 class="text-primary text-uppercase mb-2">Taxi Seguro</h6>
                <h1 class="display-6 mb-4">Choferes Registrados</h1>
            </div>
            <div class="row g-4 justify-content-center">
                <?php if($chofer){ 
                    foreach($chofer as $registro){
                        if($registro->estado_cho =="ACTIVO"){
                    ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="courses-item d-flex flex-column bg-white overflow-hidden h-100">
                        <div class="text-center p-4 pt-0">
                            <h5 class="mb-3"><?php echo $registro->nombres_cho." ".$registro->apellidos_cho ?></h5>
                          
                            
                            <ol class="breadcrumb justify-content-center mb-0">
                            <h6>Direccion: <?php echo $registro->direccion_cho ?></h6>
                            </ol>
                            <ol class="breadcrumb justify-content-center mb-0">
                            <h6>Experiencia: <?php echo $registro->experiencia_cho ?></h6>
                            </ol>
                        </div>
                        <div class="position-relative mt-auto">
                            <img class="img-fluid" src="<?php echo base_url("/uploads/chofer/") ?><?php echo $registro->foto_cho ?>" alt="" style="width: 450px;height: 300px;">
                            <div class="courses-overlay">
                                <a target="_blank" class="btn btn-outline-primary border-2" href="https://wa.me/<?php echo '593' . substr($registro->telefono_cho, 1); ?>">Contactar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } else{

                   echo ' <!-- Testimonial Start -->
    <div class="container-xxl py-6">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <p class="fs-4">Actualmente no hay choferes activos.</p>

                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->';
                } } }else{?>
              
    <!-- Testimonial Start -->
    <div class="container-xxl py-6">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-lg-8 wow fadeInUp" data-wow-delay="0.1s">
                <p class="fs-4">Actualmente no hay choferes registrados.</p>

                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
     <?php } ?>
                
                
            </div>
        </div>
    </div>
    <!-- Courses End -->

