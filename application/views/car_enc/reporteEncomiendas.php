<script>
    $("#reportEnc").addClass("active");
</script>
<?php if ($carreras) { ?>
    <section class="content">
    <div class="card card-solid">
        <div class="card-body pb-0">
            <center>
                <h4>MIS ENCOMIENDAS</h4><br>
            </center>
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($carreras as $index => $registro) { ?>
                        <div class="col-12 col-sm-6 col-md-6 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    <center>
                                        fecha: <?php echo $registro->fecha_carrera ?><br>
                                        hora: <?php echo $registro->hora_carrera ?><br>
                                        fecha entrega: <?php echo $registro->fecha_entrega ?><br>
                                        hora entrega: <?php echo $registro->hora_entrega ?><br>
                                        Placa: <?php echo $registro->placa_veh ?><br>
                                        Propietario: <?php echo $registro->nombres . " " . $registro->apellidos ?><br>
                                        Precio estimado: $ <?php echo $registro->precio_carrera ?><br>
                                        Distancia: <?php echo $registro->distancia . " km." ?>
                                    </center>
                                    <?php
                                    $estadoCarreraColor = 'darkblue';
                                    if ($registro->estadoCarrera == "PENDIENTE") {
                                        $estadoCarreraColor = 'green';
                                    } else if ($registro->estadoCarrera == "CULMINADO") {
                                        $estadoCarreraColor = 'darkslategray';
                                    } else if ($registro->estadoCarrera == "CANCELADO") {
                                        $estadoCarreraColor = 'red';
                                    }
                                    ?>
                                    <center>
                                        <h6 style="color: <?php echo $estadoCarreraColor; ?>;"> <?php echo $registro->estadoCarrera ?></h6>
                                    </center>
                                </div>
                                <div class="card-body pt-0">
                                    <div id="misCarreras-<?php echo $index; ?>" style="width:100%; height:250px; border:2px solid black;" class="col-12"></div>
                                    <div id="distancia-<?php echo $index; ?>"></div>
                                    <div><?php echo $registro->descripcion_encomienda ?></div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <?php 
                                        $fecha_actual = date("Y-m-d");
                                        $hora_actual = date("H:i:s");
                                        if ($fecha_actual < $registro->fecha_entrega || $hora_actual < $registro->hora_entrega) { ?>
                                            <div class="col-6">
                                                <!-- Opción de editar si es necesario -->
                                            </div>
                                            <div class="col-6 text-right">
                                                <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/carerras_encomiendas_controller/cancelar/$registro->id_car") ?>" role="button">Cancelar</a>
                                            </div>
                                        <?php } ?>
                                        <div class="col-12 mt-2">
                                            <center>

                                                <button class="btn btn-success" onclick="openGoogleMaps(<?php echo $registro->latitud_carrera ?>, <?php echo $registro->longitud_carrera ?>, <?php echo $registro->latitud_entrega ?>, <?php echo $registro->longitud_entrega ?>)">Abrir en Google Maps</button>
                                            </center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
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
                                    Buenas estiamd@ <?php $usuario = $this->session->userdata("conectado")->nombres;
                                                    echo $usuario;
                                                    ?> usted no ha generado ninguna Encomienda para generar una deve ir al apartado de vehiculos exoger uno y solisitarla.
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
        <?php foreach ($carreras as $index => $registro) { ?>
            <?php if ($registro->tipo_ce == "ENCOMIENDA") { ?>
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

                // Crear un DirectionsService y DirectionsRenderer para cada mapa
                var directionsService<?php echo $index; ?> = new google.maps.DirectionsService();
                var directionsRenderer<?php echo $index; ?> = new google.maps.DirectionsRenderer({
                    map: misCarreras<?php echo $index; ?>
                });

                // Definir las direcciones de solicitud
                var request = {
                    origin: coordenadaInicio,
                    destination: coordenadaLlegada,
                    travelMode: 'DRIVING'
                };

                // Solicitar la ruta al DirectionsService
                directionsService<?php echo $index; ?>.route(request, function(result, status) {
                    if (status == 'OK') {
                        directionsRenderer<?php echo $index; ?>.setDirections(result);
                        var distancia = result.routes[0].legs[0].distance.text;
                        document.getElementById('distancia-<?php echo $index; ?>').innerText = 'Distancia: ' + distancia;
                    } else {
                        console.error('Directions request failed due to ' + status);
                    }
                });

                // Añadir el botón para abrir Google Maps
                var buttonHtml = '<button onclick="openGoogleMaps(' + <?php echo $registro->latitud_carrera ?> + ', ' + <?php echo $registro->longitud_carrera ?> + ', ' + <?php echo $registro->latitud_entrega ?> + ', ' + <?php echo $registro->longitud_entrega ?> + ')">Abrir en Google Maps</button>';
                document.getElementById('misCarreras-<?php echo $index; ?>').insertAdjacentHTML('beforeend', buttonHtml);

            <?php } ?>
        <?php } ?>
    }

    // Función para abrir Google Maps con las coordenadas de inicio y llegada
    function openGoogleMaps(latInicio, lngInicio, latLlegada, lngLlegada) {
        var url = 'https://www.google.com/maps/dir/?api=1&origin=' + latInicio + ',' + lngInicio + '&destination=' + latLlegada + ',' + lngLlegada + '&travelmode=driving';
        window.open(url, '_blank');
    }

    // Llama a initMaps cuando la página esté cargada
    window.onload = initMaps;
</script>