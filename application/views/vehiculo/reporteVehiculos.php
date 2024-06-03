<br>
<?php if ($vehUsuario) { ?>
    <div class="row">
        <?php foreach ($vehUsuario as $registro) { ?>
            <div class="col-4">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <center>

                                <h5><i class="fas fa-car-alt"></i>  Unidad numero # <?php echo $registro->numero ?></h5>
                            </center>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <!-- Post -->
                                <div class="post">


                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm" src="<?php echo base_url("/uploads/usuarios/$registro->foto") ?>" alt="User Image">
                                            <span class="username">
                                                <a href="#"><?php echo $registro->nombres . " " . $registro->apellidos ?></a>
                                                <!-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> -->
                                            </span>
                                            <span class="description">Propietario/a</span>
                                            <span class="description">Este vehiculo se encuentra <b> <?php echo $registro->status_veh ?></b></span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="row mb-3">
                                            <div class="col-sm-6">
                                                <img class="img-fluid"  src="<?php echo base_url("/uploads/vehiculos/$registro->foto_veh") ?>" alt="Photo">
                                            </div>
                                            <!-- /.col -->
                                            <div class="col-sm-10">
                                                <div class="row">
                                                    <div class="col-sm-11">
                                                       El año de fabricacion es de <b><?php echo $registro->anio_veh ?></b>.
                                                      <br> La marca de este vehiculo es <b> <?php echo $registro->marca_veh ?></b>.
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col-4">
                                                            <?php $id_usu=$this->session->userdata("conectado")->id_usu == $registro->id_usu ?>
                                                            <a href="<?php echo site_url("/carerras_encomiendas_controller/nuevaEncomienda/$registro->id_veh/$id_usu") ?>" class="btn btn-primary">Carrera</a>
                                                        </div>&amp;
                                                            <div class="col-4">
                                                                <!-- <a href="<?php echo site_url("/carerras_encomiendas_controller/nuevaEncomienda/$registro->id_veh/$id_usu") ?>" class="btn btn-success">Encomienda</a> -->
                                                                
                                                            </div>
                                                            <div class="col-4">
                                                            <?php if($this->session->userdata("conectado")->id_usu == $registro->id_usu) {?>
                                                               <a href="<?php echo site_url("/vehiculos_controller/editarVehiculoPersonal/$registro->id_veh") ?>" class="btn btn-warning">Editar</a>
                                                            <?php } ?>
                                                            </div>
                                                        </div>
                                                    
                                                    <!-- /.col -->
                                                    
                                                    <!-- /.col -->
                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.col -->
                                        </div>

                                    </div>
                                    <!-- /.post -->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    <?php }
    } ?>
    </div>