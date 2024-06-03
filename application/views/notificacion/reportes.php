<!-- Main content -->
<br>
<?php if ($notificacion) { ?>
    <section class="content">
        <div class="container-fluid">

            <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12">
                    <?php
                    $contador = 1;
                    foreach ($notificacion as $registro) { ?>
                        <!-- The time line -->
                        <div class="timeline">
                            <!-- timeline time label -->
                            <div class="time-label">
                                <span class="bg-green"><?php echo $registro->fecha_not ?></span>
                            </div>
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <div>
                                <i class="fas fa-envelope bg-blue"></i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fas fa-clock"></i> <?php echo $registro->hora_not ?></span>
                                    <h3 class="timeline-header"> Notificaciòn # <?php echo $contador; ?> </h3>

                                    <div class="timeline-body">
                                        <?php echo $registro->mensaje ?>
                                    </div>

                                </div>
                            </div>

                            <!-- END timeline item -->
                            <!-- timeline time label -->
                            <!-- <div class="time-label">
                        <span class="bg-green">3 Jan. 2014</span>
                    </div> -->
                            <!-- /.timeline-label -->
                            <!-- timeline item -->
                            <!-- <div>
                        <i class="fa fa-camera bg-purple"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> 2 days ago</span>
                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>
                            <div class="timeline-body">
                                <img src="https://placehold.it/150x100" alt="...">
                                <img src="https://placehold.it/150x100" alt="...">
                                <img src="https://placehold.it/150x100" alt="...">
                                <img src="https://placehold.it/150x100" alt="...">
                                <img src="https://placehold.it/150x100" alt="...">
                            </div>
                        </div>
                    </div> -->

                            <!-- <div>
                        <i class="fas fa-clock bg-gray"></i>
                    </div> -->
                        </div>
                    <?php
                        $contador++;
                    } ?>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.timeline -->


    </section>

<?php } else { ?>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Timelime example  -->
            <div class="row">
                <div class="col-md-12">
                    <!-- The time line -->
                    <div class="timeline">
                        <!-- timeline time label -->
                   
                        <!-- /.timeline-label -->
                        <!-- timeline item -->
                   
                        <!-- END timeline item -->
                        <!-- timeline item -->
                      
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                            <i class="fas fa-comments bg-yellow"></i>
                            <div class="timeline-item">
                                <span class="time"><i class="fas fa-clock"></i> <?php echo date('H:i:s')  ?></span>
                                <h3 class="timeline-header"> Notificacion </h3>
                                <div class="timeline-body">
                                    Buenas estiamdo socio <?php  $usuario = $this->session->userdata("conectado")->nombres;
                                        echo $usuario;
                                    ?>  usted no tiene ninguna notificación. siga portandose bien :)
                                </div>
                         
                            </div>
                        </div>
             
                      
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
        <!-- /.timeline -->

    </section>
    <!-- /.content -->
<?php } ?>