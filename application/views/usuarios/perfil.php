<!-- Main content -->
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

                        <h3 class="profile-username text-center"><?php echo $perfil_ver->nombres." " .$perfil_ver->apellidos ?></h3>

                        <p class="text-muted text-center"><?php echo $perfil_ver->perfil ?></p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Cedula</b> <a class="float-right"><?php echo $perfil_ver->cedula_usu ?></a>
                            </li>
                            <li class="list-group-item">
                                <b>Correo</b> <a class="float-right"><?php echo $perfil_ver->correo ?></a>
                            </li>
                           
                        </ul>

                        <a href="<?php echo site_url("/usuarios_controller/editarPerfilPersonal/$perfil_ver->id_usu") ?>" class="btn btn-warning btn-block"><b>Editar mi perfil entero</b></a>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
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
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        
                            <!-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                            <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> -->
                           <center><h4><b>Atajos</b></h4></center>
                       
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <div class="tab-content">

                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <div class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-danger">
                                            10 Feb. 2014
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-envelope bg-primary"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-user bg-info"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                                            <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                                            </h3>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-comments bg-warning"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                            <div class="timeline-body">
                                                Take me to your leader!
                                                Switzerland is small and neutral!
                                                We are more like Germany, ambitious and misunderstood!
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <div class="time-label">
                                        <span class="bg-success">
                                            3 Jan. 2014
                                        </span>
                                    </div>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <div>
                                        <i class="fas fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                            <div class="timeline-body">
                                                <img src="https://placehold.it/150x100" alt="...">
                                                <img src="https://placehold.it/150x100" alt="...">
                                                <img src="https://placehold.it/150x100" alt="...">
                                                <img src="https://placehold.it/150x100" alt="...">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END timeline item -->
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->

                            <div class="active tab-pane" id="settings">
                                <div class="row">
                                    <div class="col-6">
                                        <center>
                                            <h5 ><b>Cambiar contraseña</b></h5>
                                        </center>
                               
                                            <form class="form-horizontal" method="post" action="<?php echo site_url("/usuarios_controller/ActualizarDatos") ?>" class="d-flex" id="frmNuevaContra">
                                            <input type="text" value="<?php echo $perfil_ver->id_usu ?>" hidden class="form-control" name="id_usu" id="id_usu" aria-describedby="helpId" placeholder="">

                                            <div class="col">
                                                    <div class="mb-3">
                                                        <label for="contraActual" class="form-label">Contraseña Actual</label>
                                                        <input type="text" name="contraActual" id="contraActual" class="form-control" placeholder="ingrese su contraseña actualizar" aria-describedby="helpId" />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="primeraContra" class="form-label">Nueva Contraseña</label>
                                                        <input type="text" name="primeraContra" id="primeraContra" class="form-control" placeholder="ingrese su contraseña actualizar" aria-describedby="helpId" />
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="segundaContra" class="form-label">Repita la Contraseña</label>
                                                        <input type="text" name="segundaContra" id="segundaContra" class="form-control" placeholder="ingrese su contraseña actualizar" aria-describedby="helpId" />
                                                    </div>
                                                </div>
                                           

                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-warning">Cambiar</button>
                                                </div>
                                            </div>
                                        </form>
                                        <script type="text/javascript">
  
        $("#frmNuevaContra").validate({
            rules: {
                contraActual: {
                    required: true,
                },
                primeraContra: {
                    required: true,
                    minlength: 8,
                    strongPassword: true
                },
                segundaContra: {
                    required: true,
                    minlength: 8,
                    strongPassword: true
                }
            },
            messages: {
                primeraContra: {
                    required: "Por favor, ingrese su contraseña",
                    minlength: "La contraseña debe tener al menos 8 caracteres",
                    strongPassword: "La contraseña debe contener al menos una mayúscula y un carácter especial"
                },
                segundaContra: {
                    required: "Por favor, ingrese su contraseña",
                    minlength: "La contraseña debe tener al menos 8 caracteres",
                    strongPassword: "La contraseña debe contener al menos una mayúscula y un carácter especial"
                }
            }
        });


     

</script>
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
        language: "es"
    
    });
</script>
