<?php if ($carreras) { ?>
    <section class="content">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">
                    <center>
                        <h4>MIS ENCOMIENDAS</h4><br>
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
                                        fecha entrega: <?php echo $registro->fecha_entrega ?>
                                        hora entrega: <?php echo $registro->hora_entrega ?><br>
                                    </center>
                                    <center>
                                        Placa: <?php echo $registro->placa_veh?><br>
                                       Propietario: <?php echo $registro->nombres." ".$registro->apellidos ?>

                                    </center>
                                    <?php if($registro->estadoCarrera =="POR ACEPTAR" ){?>
                                        <h6 style="color:darkblue;"> <?php echo $registro->estadoCarrera ?></h6>
                                    <?php } if ($registro->estadoCarrera == "PENDIENTE") { ?>
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
                                    <div ><?php echo $registro->descripcion_encomienda ?></div>
                                </div>
                                <div class="card-footer">
                                    <?php $fecha_actual = date("Y-m-d"); $hora_actual = date("H:i:s");?>
                                    <?php if( $fecha_actual < $registro->fecha_entrega || $hora_actual < $registro->hora_entrega){ ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <a name="" id="" class="btn btn-primary" href="<?php echo site_url("/carerras_encomiendas_controller/editarEncomienda/$registro->id_car") ?>" role="button">Editar</a>
                                        </div>
                                        <div class="justify-content-end col-6">
                                            <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/carerras_encomiendas_controller/cancelar/$registro->id_car") ?>" role="button">Cancelar</a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <br>
                                    <div class="row">
                                            <center>
                                            <div class="col-6">
                                                
                                                <button class="btn btn-success" onclick="openGoogleMaps(<?php echo $registro->latitud_carrera ?>, <?php echo $registro->longitud_carrera ?>, <?php echo $registro->latitud_entrega ?>, <?php echo $registro->longitud_entrega ?>)">Abrir en Google Maps</button>
                                            </div>
                                        </center>
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
<?php } else {
    echo "no tiene carreras";
} ?>

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
