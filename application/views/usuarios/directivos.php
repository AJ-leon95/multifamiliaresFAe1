<script>
    $("#menu_directivos").addClass("active");    
</script>
<br>
<section class="content">

    <!-- Default box -->
    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center">LISTA DE DIRECTIVOS</h4><br>
                </div>
                <?php foreach ($directivos as $directivo) {
                    if ($directivo->perfil == "PRESIDENTE" || $directivo->perfil == "GERENTE" || $directivo->perfil == "SECRETARIO") {
                ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    <center><b><?php echo $directivo->perfil ?></b></center>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b><?php echo $directivo->nombres ?><br><?php echo $directivo->apellidos ?></b></h2>
                                            <p class="text-muted text-sm"><b>Correo:</b> <?php echo $directivo->correo ?></p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-building"></i></span> Dirección: <?php echo $directivo->direccion ?></li><br>
                                                <li class="small"><span class="fa-li"><i class="fas fa-phone"></i></span> Teléfono #: <?php echo $directivo->telefono ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <img src="<?php echo base_url("/uploads/usuarios/$directivo->foto") ?>" alt="user-avatar" class="img-circle img-lg">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <?php if($this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
                                            $this->session->userdata("conectado")->perfil ==  "PRESIDENTE" || 
                                            $this->session->userdata("conectado")->perfil == "GERENTE" || 
                                            $this->session->userdata("conectado")->perfil ==  "SECRETARIO"){ ?>
                                        <div class="text-right">
                                            <a href="<?php echo site_url("/usuarios_controller/editarUsuario/$directivo->id_usu") ?>" class="btn btn-sm bg-teal">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

</section>
