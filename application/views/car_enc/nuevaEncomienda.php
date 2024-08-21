<?php
date_default_timezone_set('America/Guayaquil');
?>

<script>
    $("#reportEnc").addClass("active");
</script>

<div class="container">
    <div class="row">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Nueva Encomienda</h3>
            </div>

            <div class="card-body">
                <form action="<?php echo site_url("/carerras_encomiendas_controller/guardar") ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="fecha_carrera" class="form-label">Fecha Carrera</label><br>
                                <input value="<?php echo set_value('fecha_carrera', date('Y-m-d')); ?>" type="date" class="form-control" name="fecha_carrera" id="fecha_carrera" aria-describedby="helpId" placeholder="" />
                                <p style="color: red;"><?php echo form_error('fecha_carrera') ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="hora_carrera" class="form-label">Hora Carrera</label><br>
                                <input value="<?php echo set_value('hora_carrera', date('H:i')); ?>" type="time" class="form-control" name="hora_carrera" id="hora_carrera" placeholder="" />
                                <p style="color: red;"><?php echo form_error('hora_carrera') ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="fecha_entrega" class="form-label">Fecha Entrega</label><br>
                                <input value="<?php echo set_value('fecha_entrega'); ?>" type="date" class="form-control" name="fecha_entrega" id="fecha_entrega" aria-describedby="helpId" placeholder="" />
                                <p style="color: red;"><?php echo form_error('fecha_entrega') ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="hora_entrega" class="form-label">Hora Entrega</label><br>
                                <input value="<?php echo set_value('hora_entrega'); ?>" type="time" class="form-control" name="hora_entrega" id="hora_entrega" placeholder="" />
                                <p style="color: red;"><?php echo form_error('hora_entrega') ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <input type="text" class="form-control" name="fk_car_usu" id="fk_car_usu" value="<?php echo set_value('fk_car_usu', $id_usu); ?>" hidden />
                            <input type="text" class="form-control" name="fk_car_veh" id="fk_car_veh" value="<?php echo set_value('fk_car_veh', $id_card); ?>" hidden />
                            <input type="text" class="form-control" name="latitud_carrera" id="latitud_carrera" value="<?php echo set_value('latitud_carrera'); ?>" hidden />
                            <input type="text" class="form-control" name="longitud_carrera" id="longitud_carrera" value="<?php echo set_value('longitud_carrera'); ?>" hidden />
                            <input type="text" class="form-control" name="tipo_ce" id="tipo_ce" value="<?php echo set_value('tipo_ce', 'ENCOMIENDA'); ?>" hidden />
                            <input type="text" class="form-control" name="estadoCarrera" id="estadoCarrera" value="<?php echo set_value('estadoCarrera', 'POR ACEPTAR'); ?>" hidden />
                            <input id="searchBox" type="text" class="form-control" aria-describedby="helpId" placeholder="Busca el lugar" value="<?php echo set_value('searchBox'); ?>" />
                            <label for="" class="form-label">Escoja la ubicacion inicial de la carrera</label>
                            <div id="mapaCarrera" style="width:100%; height:250px; border:2px solid black;" class="col-12"></div>
                            <button type="button" class="btn btn-dark col-6" onclick="obtenerUbicacionActual()">Obtener Ubicación Actual</button>
                            <p style="color: red;"><?php echo form_error('latitud_carrera') ?></p>
                            <p style="color: red;"><?php echo form_error('longitud_carrera') ?></p>
                        </div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="latitud_entrega" id="latitud_entrega" value="<?php echo set_value('latitud_entrega'); ?>" hidden />
                            <input type="text" class="form-control" name="longitud_entrega" id="longitud_entrega" value="<?php echo set_value('longitud_entrega'); ?>" hidden />
                            <input id="searchBoxFin" type="text" class="form-control" aria-describedby="helpId" placeholder="Busca el lugar" value="<?php echo set_value('searchBoxFin'); ?>" />
                            <label for="" class="form-label">Escoja la ubicacion del destino de la carrera</label>
                            <div id="mapaFin" style="width:100%; height:250px; border:2px solid black;" class="col-12"></div>
                            <p style="color: red;"><?php echo form_error('latitud_entrega') ?></p>
                            <p style="color: red;"><?php echo form_error('longitud_entrega') ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="descripcion_encomienda" class="form-label">Ingrese la descripcion de la encomienda</label>
                                <textarea name="descripcion_encomienda" id="descripcion_encomienda" cols="30" rows="10"><?php echo set_value('descripcion_encomienda'); ?></textarea>
                                <p style="color: red;"><?php echo form_error('descripcion_encomienda') ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="precio_carrera" class="form-label">Precio Estimado $</label><br>
                                <!-- Campo para mostrar el valor -->
                                <p id="precio_carrera_display"><?php echo set_value('precio_carrera'); ?></p>
                                <!-- Campo oculto para enviar el valor -->
                                <input type="hidden" name="precio_carrera" id="precio_carrera" value="<?php echo set_value('precio_carrera'); ?>" />
                                <p style="color: red;"><?php echo form_error('precio_carrera') ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="distancia" class="form-label">Distancia (km)</label><br>
                                <!-- Campo para mostrar el valor -->
                                <p id="distancia_display"><?php echo set_value('distancia'); ?></p>
                                <!-- Campo oculto para enviar el valor -->
                                <input type="hidden" name="distancia" id="distancia" value="<?php echo set_value('distancia'); ?>" />
                                <p style="color: red;"><?php echo form_error('distancia') ?></p>
                            </div>
                        </div>


                    </div>

                    <div class="row">
                        <center>
                            <br>
                            <button id="btnGuardar" type="submit" class="btn btn-warning">Guardar</button>
                            <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/vehiculos_controller/reporteVehiculos") ?>" role="button">Cancelar</a>
                        </center>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
    ClassicEditor
        .create(document.querySelector('#descripcion_encomienda'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

    // Límites geográficos de la provincia de Cotopaxi
    var ecuadorLimites = {
                norte: 1.4599, // Límite norte cerca de la frontera con Colombia
                sur: -4.9591, // Límite sur cerca de la frontera con Perú
                este: -75.1865, // Límite este cerca de la frontera con Perú y Colombia
                oeste: -81.0789 // Límite oeste en la costa del Océano Pacífico
            };

            // Función para verificar si una coordenada está dentro de los límites
            function estaDentroDeCotopaxi(lat, lng) {
                return lat <= ecuadorLimites.norte && lat >= ecuadorLimites.sur &&
                    lng <= ecuadorLimites.este && lng >= ecuadorLimites.oeste;
            }

    // Inicialización de variables para los mapas y los marcadores
    var mapaCarrera, marcador;
    var mapaFin, marcadorFin;
    var searchBox, searchBoxFin;

    // Función para inicializar los mapas y los buscadores de lugares
    function initMap() {
        var cordenadaInicial = new google.maps.LatLng(-0.9180487872636021, -78.62032359810698);

        // Inicialización del mapa para la ubicación de inicio
        mapaCarrera = new google.maps.Map(document.getElementById('mapaCarrera'), {
            center: cordenadaInicial,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.Híbrido
        });
        

        marcador = new google.maps.Marker({
            position: cordenadaInicial,
            map: mapaCarrera,
            title: "Seleccione la dirección",
            draggable: true,
            icon: "<?php echo base_url('/assets/img/ubicacionNegro.png') ?>"
        });

        google.maps.event.addListener(marcador, 'dragend', function() {
            document.getElementById('latitud_carrera').value = this.getPosition().lat();
            document.getElementById('longitud_carrera').value = this.getPosition().lng();
            calcularYMostrarPrecio();
        });

        searchBox = new google.maps.places.SearchBox(document.getElementById('searchBox'));
        mapaCarrera.controls[google.maps.ControlPosition.TOP_LEFT].push(document.getElementById('searchBox'));

        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) {
                return;
            }
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                marcador.setPosition(place.geometry.location);
                document.getElementById('latitud_carrera').value = place.geometry.location.lat();
                document.getElementById('longitud_carrera').value = place.geometry.location.lng();
                if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            mapaCarrera.fitBounds(bounds);
            calcularYMostrarPrecio();
        });

        // Inicialización del mapa para la ubicación de destino
        mapaFin = new google.maps.Map(document.getElementById('mapaFin'), {
            center: cordenadaInicial,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        marcadorFin = new google.maps.Marker({
            position: cordenadaInicial,
            map: mapaFin,
            title: "Seleccione la dirección",
            draggable: true,
            icon: "<?php echo base_url('/assets/img/ubicacionNegro.png') ?>"
        });

        google.maps.event.addListener(marcadorFin, 'dragend', function() {
            document.getElementById('latitud_entrega').value = this.getPosition().lat();
            document.getElementById('longitud_entrega').value = this.getPosition().lng();
            calcularYMostrarPrecio();
        });

        searchBoxFin = new google.maps.places.SearchBox(document.getElementById('searchBoxFin'));
        mapaFin.controls[google.maps.ControlPosition.TOP_LEFT].push(document.getElementById('searchBoxFin'));

        searchBoxFin.addListener('places_changed', function() {
            var places = searchBoxFin.getPlaces();
            if (places.length == 0) {
                return;
            }
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                marcadorFin.setPosition(place.geometry.location);
                document.getElementById('latitud_entrega').value = place.geometry.location.lat();
                document.getElementById('longitud_entrega').value = place.geometry.location.lng();
                if (place.geometry.viewport) {
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            mapaFin.fitBounds(bounds);
            calcularYMostrarPrecio();
        });
    }

    // Función para obtener la ubicación actual del usuario
    function obtenerUbicacionActual() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                marcador.setPosition(pos);
                document.getElementById('latitud_carrera').value = pos.lat;
                document.getElementById('longitud_carrera').value = pos.lng;
                mapaCarrera.setCenter(pos);
                calcularYMostrarPrecio();
            });
        } else {
            alert("Tu navegador no soporta geolocalización");
        }
    }

    // Función para calcular la distancia usando la fórmula de Haversine
    function calcularDistancia(lat1, lng1, lat2, lng2) {
        lat1 = parseFloat(lat1);
        lng1 = parseFloat(lng1);
        lat2 = parseFloat(lat2);
        lng2 = parseFloat(lng2);

        var R = 6371; // Radio de la Tierra en kilómetros
        var dLat = (lat2 - lat1) * Math.PI / 180;
        var dLng = (lng2 - lng1) * Math.PI / 180;
        var a = 0.5 - Math.cos(dLat) / 2 + Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) * (1 - Math.cos(dLng)) / 2;
        return R * 2 * Math.asin(Math.sqrt(a));
    }

    // Función para calcular y mostrar el precio
    function calcularYMostrarPrecio() {
        var lat1 = parseFloat(document.getElementById('latitud_carrera').value);
        var lng1 = parseFloat(document.getElementById('longitud_carrera').value);
        var lat2 = parseFloat(document.getElementById('latitud_entrega').value);
        var lng2 = parseFloat(document.getElementById('longitud_entrega').value);

        if (isNaN(lat1) || isNaN(lng1) || isNaN(lat2) || isNaN(lng2)) {
            console.error('Datos inválidos para el cálculo de distancia.');
            return;
        }

        // Validar si ambas ubicaciones están dentro de Cotopaxi
        if (!estaDentroDeCotopaxi(lat1, lng1) || !estaDentroDeCotopaxi(lat2, lng2)) {
            iziToast.error({
                title: 'Error',
                message: 'Ambas ubicaciones deben estar dentro de Ecuador.',
                position: 'topRight', //posición: topRight, topLeft, bottomRight, bottomLeft, etc.
            });
            document.getElementById('btnGuardar').disabled = true;
        } else {
            document.getElementById('btnGuardar').disabled = false; 
        }

        var distancia = calcularDistancia(lat1, lng1, lat2, lng2);
        console.log('Distancia calculada: ' + distancia); // Depuración
        document.getElementById('distancia').value = distancia.toFixed(2);
        document.getElementById('distancia_display').innerText = distancia.toFixed(2);

        $.ajax({
            url: '<?php echo site_url('carerras_encomiendas_controller/obtenerPrecioPorDistancia'); ?>',
            type: 'POST',
            data: {
                distancia: distancia
            },
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    document.getElementById('precio_carrera').value = 'No se encontró una tarifa para la distancia calculada.';
                    document.getElementById('precio_carrera_display').innerText = 'No se encontró una tarifa para la distancia calculada.';
                } else {
                    var tarifa = response.tarifa.toFixed(2);
                    document.getElementById('precio_carrera').value = tarifa;
                    document.getElementById('precio_carrera_display').innerText = tarifa;
                }
            },
            error: function() {
                console.error('Error al obtener la tarifa.');
            }
        });
    }
</script>

