<!-- About Start -->
<div class="container-xxl py-6">
    <div class="container">
        <?php for ($i = 0; $i < count($vehiculo); $i++) { ?>
        <div class="row g-5 mb-5">
            <?php if ($i % 2 == 0) { // Si el índice es par, coloca la foto a la izquierda ?>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="<?php echo 0.1 + $i * 0.2; ?>s">
                <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="<?php echo base_url("/uploads/vehiculos/") ?><?php echo $vehiculo[$i]->foto_veh ?>" alt="" style="object-fit: cover;">
                    <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="<?php echo base_url("/uploads/usuarios/") ?><?php echo $vehiculo[$i]->foto ?>" alt="" style="width: 200px; height: 200px;">
                </div>
            </div>
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="<?php echo 0.5 + $i * 0.2; ?>s">
                <div class="h-100">
                    <h6 class="text-primary text-uppercase mb-2">Placa del vehiculo: <?php echo $vehiculo[$i]->placa_veh; ?></h6>
                    <h1 class="display-6 mb-4">Unidad N°<?php echo $vehiculo[$i]->numero ?></h1>
                    <p>Pertenece a: <?php echo $vehiculo[$i]->nombres . " " . $vehiculo[$i]->apellidos ?><br>
                        Telefono: <?php echo $vehiculo[$i]->telefono ?> <br>
                        Conductor: <?php echo $vehiculo[$i]->nombres_chofer." ".$vehiculo[$i]->apellidos_chofer ?><br>
                        Telefono Chofer:<?php echo $vehiculo[$i]->telefono_chofer ?><br>
                        <img src="<?php echo base_url("/uploads/chofer/") ?><?php echo $vehiculo[$i]->foto_chofer  ?>" alt="">
                    </p>
                    <p class="mb-4"></p>
                </div>
            </div>
            <?php } else { // Si el índice es impar, coloca la foto a la derecha ?>
            <div class="col-lg-6 order-lg-last wow fadeInUp" data-wow-delay="<?php echo 0.1 + $i * 0.2; ?>s">
                <div class="position-relative overflow-hidden ps-5 pt-5 h-100" style="min-height: 400px;">
                    <img class="position-absolute w-100 h-100" src="<?php echo base_url("/uploads/vehiculos/") ?><?php echo $vehiculo[$i]->foto_veh ?>" alt="" style="object-fit: cover;">
                    <img class="position-absolute top-0 start-0 bg-white pe-3 pb-3" src="<?php echo base_url("/uploads/usuarios/") ?><?php echo $vehiculo[$i]->foto ?>" alt="" style="width: 200px; height: 200px;">
                </div>
            </div>
            <div class="col-lg-6 order-lg-first wow fadeInUp" data-wow-delay="<?php echo 0.5 + $i * 0.2; ?>s">
                <div class="h-100">
                    <h6 class="text-primary text-uppercase mb-2">Placa del vehiculo: <?php echo $vehiculo[$i]->placa_veh; ?></h6>
                    <h1 class="display-6 mb-4">Unidad N°<?php echo $vehiculo[$i]->numero ?></h1>
                    <p>Pertenece a: <?php echo $vehiculo[$i]->nombres . " " . $vehiculo[$i]->apellidos ?><br>
                        Telefono: <?php echo $vehiculo[$i]->telefono ?><br>
                        Conductor: <?php echo $vehiculo[$i]->nombres_chofer." ".$vehiculo[$i]->apellidos_chofer ?>
                        Telefono Chofer:<?php echo $vehiculo[$i]->telefono_chofer ?>
                        <img src="<?php echo base_url("/uploads/chofer/") ?><?php echo $vehiculo[$i]->foto_chofer  ?>" alt="">
                    </p>
                    <p class="mb-4"></p>
                </div>
            </div>
            <?php } ?>
        </div>
        <?php } ?>
    </div>
</div>
<!-- About End -->
