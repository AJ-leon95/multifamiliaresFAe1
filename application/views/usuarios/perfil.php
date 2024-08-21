<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="card card-warning card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-xl img-bordered" src="<?php echo base_url("/uploads/usuarios/$perfil_ver->foto") ?>" alt="User profile picture">
                        </div>

                        <h3 class="profile-username text-center"><?php echo $perfil_ver->nombres . " " . $perfil_ver->apellidos ?></h3>

                        <p class="text-muted text-center"><?php echo $perfil_ver->perfil ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Cedula</b> <a class="float-right"><?php echo $perfil_ver->cedula_usu ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Correo</b> <a class="float-right"><?php echo $perfil_ver->correo ?></a>
                            </li>

                        </ul>

                        <a href="<?php echo site_url("/usuarios_controller/editarPerfilPersonal/") ?>" class="btn btn-warning btn-block"><b>Editar mi perfil entero</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <?php if (

                    $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
                    $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
                    $this->session->userdata("conectado")->perfil == "GERENTE"
                ) { ?>
                    <div class="card card-warning">
                        <div class="card-header">
                            <h3 class="card-title"><b>Mis Datos</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Profesión</strong>

                            <p class="text-muted">
                                Chofer profesional.
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Direccion</strong>

                            <p class="text-muted"><?php echo $perfil_ver->direccion ?></p>

                            <hr>
                            <strong><i class="far fa-file-alt mr-1"></i>Numero de telefono</strong>

                            <p class="text-muted"><?php echo $perfil_ver->telefono ?></p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <?php } ?>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">

                        <!-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                        <center>
                            <h4><b>Atajos</b></h4>
                        </center>

                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <!-- /.tab-pane -->
              
                            <!-- /.tab-pane -->

                            <div class="active tab-pane" id="settings">
                                <div class="row">
                                    <div class="col-6">
                                        <center>
                                            <h5><b>Cambiar contraseña</b></h5>
                                        </center>

                                        <form class="form-horizontal" method="post" action="<?php echo site_url("/usuarios_controller/ActualizarDatos") ?>" class="d-flex" id="frmNuevaContra">
                                            <input type="text" value="<?php echo $perfil_ver->id_usu ?>" hidden class="form-control" name="id_usu" id="id_usu" aria-describedby="helpId" placeholder="">

                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="contraActual" class="form-label">Contraseña Actual</label>
                                                    <input value="<?php echo set_value("contraActual") ?>" type="text" name="contraActual" id="contraActual" class="form-control" placeholder="ingrese su contraseña actualizar" aria-describedby="helpId" />
                                                    <p style="color: red;"><?php echo form_error('contraActual') ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="primeraContra" class="form-label">Nueva Contraseña</label>
                                                    <input value="<?php echo set_value("primeraContra") ?>" type="text" name="primeraContra" id="primeraContra" class="form-control" placeholder="ingrese su contraseña actualizar" aria-describedby="helpId" />
                                                    <p style="color: red;"><?php echo form_error('primeraContra') ?></p>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="segundaContra" class="form-label">Repita la Contraseña</label>
                                                    <input value="<?php echo set_value("segundaContra") ?>" type="text" name="segundaContra" id="segundaContra" class="form-control" placeholder="ingrese su contraseña actualizar" aria-describedby="helpId" />
                                                    <p style="color: red;"><?php echo form_error('segundaContra') ?></p>
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-warning">Cambiar</button>
                                                </div>
                                            </div>
                                        </form>
                                   
                                    </div>
                                    <div class="col-6">
                                        <form class="form-horizontal" action="<?php echo site_url("/usuarios_controller/actualizarFoto") ?>" method="post" enctype="multipart/form-data">
                                            <input type="text" value="<?php echo $perfil_ver->id_usu ?>" hidden class="form-control" name="id_usu" id="id_usu" aria-describedby="helpId" placeholder="">

                                            <center>
                                                <h5><b>Cambiar Foto</b></h5>
                                            </center>
                                            <div class="mb-3">
                                                <label for="foto" class="form-label">Foto</label>
                                                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="|" />
                                            </div>

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-warning">Actualizar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                    
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

<script type="text/javascript">
    $("#foto").fileinput({
        language: "es",
        initialPreview: [
            "<img src='<?php echo base_url("/uploads/usuarios/") ?><?php echo $perfil_ver->foto ?>' alt='Imagen Actual' height='100px'> "
        ],
        allowedFileExtensions: ["jpeg", "jpg", "png"],
        showCaption: false,
        dropZoneEnabled: true
    });
</script>