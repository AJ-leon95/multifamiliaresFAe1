<script>
    $("#menu_vehiculos").addClass("active");
</script>
<br>
<?php if ($vehUsuario) { ?>
    <div class="row">
        <?php foreach ($vehUsuario as $registro) { ?>
            <?php if ($registro->status_veh == "ACTIVO") { ?>
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-header p-2 text-center">
                            <h5><i class="fas fa-car-alt"></i> Unidad número # <?php echo $registro->numero ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="<?php echo base_url("/uploads/usuarios/$registro->foto") ?>" alt="User Image" style="width: 75px;height: 75px;">
                                <span class="username">
                                    <span style="font-weight: bold; font-size: 18px; color: #333; text-transform: capitalize;">
                                        <?php echo $registro->nombres . "<br> " . $registro->apellidos ?>
                                    </span>
                                </span>
                                <span class="description">Propietario/a</span>
                                <span class="description">Este vehículo se encuentra <b><?php echo $registro->status_veh ?></b></span>
                            </div>
                            <div class="mt-3">
                                <img class="img-fluid w-100" src="<?php echo base_url("/uploads/vehiculos/$registro->foto_veh") ?>" alt="Photo" style="width: 75px;height: 250px;">
                            </div>
                            <div class="mt-2">
                                El año de fabricación es de <b><?php echo $registro->anio_veh ?></b>.<br>
                                La marca de este vehículo es <b><?php echo $registro->marca_veh ?></b>.
                            </div>
                            <div class="mt-3 d-flex justify-content-between">
                                <?php $id_usu = $this->session->userdata("conectado")->id_usu == $registro->id_usu ?>
                                <a href="<?php echo site_url("/carerras_encomiendas_controller/nuevaEncomienda/$registro->id_veh/$id_usu") ?>" class="btn btn-primary">ENCOMIENDA</a>
                                <?php if ($this->session->userdata("conectado")->id_usu == $registro->id_usu) { ?>
                                    <a href="<?php echo site_url("/vehiculos_controller/editarVehiculoPersonal/$registro->id_veh") ?>" class="btn btn-warning">Editar</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
<?php } ?>
