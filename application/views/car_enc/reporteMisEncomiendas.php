<script>
    $("#menu_encomiendas").addClass("active");    
</script>
<br>
<?php if ($carreras) { ?>
    <section class="content">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <center>
                        <h4>MIS CARRERAS</h4><br>
                    </center>
                    <?php foreach ($carreras as $index => $registro) { ?>
                        <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    <center>
                                        fecha: <?php echo $registro->fecha_carrera ?>
                                        hora: <?php echo $registro->hora_carrera ?><br>
                                    </center>

                                    <center>
                                        carrera solicitada por:
                                        <?php echo $registro->solicitante_nombres . " " . $registro->solicitante_apellidos ?><br>
                                        numero de telefono: <?php echo $registro->solicitante_telefono ?>
                                        Precio estimado:$ <?php echo $registro->precio_carrera ?><br>
                                        Distancia: <?php echo $registro->distancia." km." ?>
                                    </center>
                                    <?php if ($registro->estadoCarrera == "POR ACEPTAR") { ?>
                                        <h6 style="color:darkblue;"> <?php echo $registro->estadoCarrera ?></h6>
                                    <?php }
                                    if ($registro->estadoCarrera == "PENDIENTE") { ?>
                                        <h6 style="color: green;"> <?php echo $registro->estadoCarrera ?></h6>
                                    <?php } else if ($registro->estadoCarrera == "CULMINADO") { ?>
                                        <h6 style="color: darkslategray;"> <?php echo $registro->estadoCarrera ?></h6>
                                    <?php } else if ($registro->estadoCarrera == "CANCELADO") { ?>
                                        <h6 style="color: red;"> <?php echo $registro->estadoCarrera ?></h6>
                                    <?php } ?>

                                </div>
                                <div class="card-body pt-0">
                                    <div id="misCarreras-<?php echo $index; ?>" style="width:100%; height:250px; border:2px solid black;" class="col-12"></div>
                                    <div id="distancia-<?php echo $index; ?>"></div>
                                    <div><?php echo $registro->descripcion_encomienda ?></div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        
                                            <div class="col-4">
                                                <a name="" id="" class="btn btn-warning" href="<?php echo site_url("/carerras_encomiendas_controller/Aceptar/$registro->id_car") ?>" role="button">Aceptar</a>

                                            </div>
                                            <div class="col-4">

                                                <button class="btn btn-success" onclick="openGoogleMaps(<?php echo $registro->latitud_carrera ?>, <?php echo $registro->longitud_carrera ?>, <?php echo $registro->latitud_entrega ?>, <?php echo $registro->longitud_entrega ?>)">Abrir en Google Maps</button>
                                            </div>
                                            <div class="col-4">
                                                <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/carerras_encomiendas_controller/Rechazar/$registro->id_car") ?>" role="button">Rechazar</a>

                                            </div>
                                     
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
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
                                <h3 class="timeline-header"> Encomiendas </h3>
                                <div class="timeline-body">
                                    Buenas estiamd@ <?php  $usuario = $this->session->userdata("conectado")->nombres;
                                        echo $usuario;
                                    ?>  Por el momento usted no cuneta con nigun pedido de servicio de Encomiendas.
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



     <script type="text/javascript">
    function initMaps() {
        console.log('initMaps se ha llamado correctamente');
        <?php foreach ($carreras as $index => $registro) { ?>
            var coordenada<?php echo $index; ?> = new google.maps.LatLng(-0.9180487872636021, -78.62032359810698);
            var misCarreras<?php echo $index; ?> = new google.maps.Map(
                document.getElementById('misCarreras-<?php echo $index; ?>'), {
                    center: coordenada<?php echo $index; ?>,
                    zoom: 12,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                }
            );

            var coordenadaInicio = new google.maps.LatLng(<?php echo $registro->latitud_carrera ?>, <?php echo $registro->longitud_carrera ?>);
            var marcadorInicio = new google.maps.Marker({
                position: coordenadaInicio,
                title: "Salida",
                map: misCarreras<?php echo $index; ?>,
                icon: "<?php echo base_url('/assets/img/ubicacionNegro.png') ?>"
            });

            var coordenadaLlegada = new google.maps.LatLng(<?php echo $registro->latitud_entrega ?>, <?php echo $registro->longitud_entrega ?>);
            var marcadorLlegada = new google.maps.Marker({
                position: coordenadaLlegada,
                title: "Llegada",
                map: misCarreras<?php echo $index; ?>
            });

            var directionsService<?php echo $index; ?> = new google.maps.DirectionsService();
            var directionsRenderer<?php echo $index; ?> = new google.maps.DirectionsRenderer({
                map: misCarreras<?php echo $index; ?>
            });

            var request = {
                origin: coordenadaInicio,
                destination: coordenadaLlegada,
                travelMode: 'DRIVING'
            };

            directionsService<?php echo $index; ?>.route(request, function(result, status) {
                if (status == 'OK') {
                    directionsRenderer<?php echo $index; ?>.setDirections(result);
                    var distancia = result.routes[0].legs[0].distance.text;
                    document.getElementById('distancia-<?php echo $index; ?>').innerText = 'Distancia: ' + distancia;
                } else {
                    console.error('Directions request failed due to ' + status);
                }
            });

        <?php } ?>
    }

    function openGoogleMaps(latInicio, lngInicio, latLlegada, lngLlegada) {
        var url = 'https://www.google.com/maps/dir/?api=1&origin=' + latInicio + ',' + lngInicio + '&destination=' + latLlegada + ',' + lngLlegada + '&travelmode=driving';
        window.open(url, '_blank');
    }

    window.onload = initMaps;
</script>
