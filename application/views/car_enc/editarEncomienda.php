<script>
    $("#menu_car_enc").addClass("active");
</script>

<div class="container">
    <div class="row">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Editar Encomienda</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url('/carerras_encomiendas_controller/Actualizar') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <input hidden value="<?php echo $carrera->id_car ?>" type="text" class="form-control" name="id_car" id="id_car" aria-describedby="helpId" placeholder="" />
                        <!-- Formulario de Fecha y Hora -->
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="fecha_carrera" class="form-label">Fecha Carrera</label><br>
                                <input value="<?php echo $carrera->fecha_carrera ?>" type="date" class="form-control" name="fecha_carrera" id="fecha_carrera" aria-describedby="helpId" placeholder="" />
                                <p style="color: red;"><?php echo form_error('fecha_carrera') ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="hora_carrera" class="form-label">Hora Carrera</label><br>
                                <input value="<?php echo $carrera->hora_carrera ?>" type="time" class="form-control" name="hora_carrera" id="hora_carrera" placeholder="" />
                                <p style="color: red;"><?php echo form_error('hora_carrera') ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="fecha_entrega" class="form-label">Fecha Entrega</label><br>
                                <input value="<?php echo $carrera->fecha_entrega ?>" type="date" class="form-control" name="fecha_entrega" id="fecha_entrega" aria-describedby="helpId" placeholder="" />
                                <p style="color: red;"><?php echo form_error('fecha_entrega') ?></p>
                            </div>
                            <div class="mb-3">
                                <label for="hora_entrega" class="form-label">Hora Entrega</label><br>
                                <input value="<?php echo $carrera->hora_entrega ?>" type="time" class="form-control" name="hora_entrega" id="hora_entrega" placeholder="" />
                                <p style="color: red;"><?php echo form_error('hora_entrega') ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Mapa de Inicio -->
                        <div class="col-6">
                            <input hidden value="<?php echo $id_usu ?>" type="text" class="form-control" name="fk_car_usu" id="fk_car_usu" aria-describedby="helpId" placeholder="" />
                            <input hidden value="<?php echo $carrera->latitud_carrera ?>" type="text" class="form-control" name="latitud_carrera" id="latitud_carrera" aria-describedby="helpId" placeholder="" />
                            <input hidden value="<?php echo $carrera->longitud_carrera ?>" type="text" class="form-control" name="longitud_carrera" id="longitud_carrera" aria-describedby="helpId" placeholder="" />
                            <input hidden value="ENCOMIENDA" type="text" class="form-control" name="tipo_ce" id="tipo_ce" aria-describedby="helpId" placeholder="" />
                            <input hidden value="POR ACEPTAR" type="text" class="form-control" name="estadoCarrera" id="estadoCarrera" aria-describedby="helpId" placeholder="" />
                            <input id="searchBox" type="text" class="form-control" aria-describedby="helpId" placeholder="Busca el lugar" />
                            <label for="" class="form-label">Escoja la ubicación inicial de la carrera</label>
                            <div id="mapaCarrera" style="width:100%; height:250px; border:2px solid black;" class="col-12"></div>
                            <button type="button" class="btn btn-dark col-6" onclick="obtenerUbicacionActual()">Obtener Ubicación Actual</button>
                            <p style="color: red;"><?php echo form_error('latitud_carrera') ?></p>
                            <p style="color: red;"><?php echo form_error('longitud_carrera') ?></p>
                        </div>
                        <!-- Mapa de Entrega -->
                        <div class="col-6">
                            <input hidden value="<?php echo $carrera->latitud_entrega ?>" type="text" class="form-control" name="latitud_entrega" id="latitud_entrega" aria-describedby="helpId" placeholder="" />
                            <input hidden value="<?php echo $carrera->longitud_entrega ?>" type="text" class="form-control" name="longitud_entrega" id="longitud_entrega" aria-describedby="helpId" placeholder="" />
                            <input id="searchBoxFin" type="text" class="form-control" aria-describedby="helpId" placeholder="Busca el lugar" />
                            <label for="" class="form-label">Escoja la ubicación del destino de la carrera</label>
                            <div id="mapaFin" style="width:100%; height:250px; border:2px solid black;" class="col-12"></div>
                            <button type="button" class="btn btn-dark col-6" onclick="obtenerUbicacionActualFin()">Obtener Ubicación Actual de Entrega</button>
                            <p style="color: red;"><?php echo form_error('latitud_entrega') ?></p>
                            <p style="color: red;"><?php echo form_error('longitud_entrega') ?></p>
                        </div>
                    </div>

                    <!-- Descripción, Vehículo y Precio -->
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-6">
                                <label for="descripcion_encomienda" class="form-label">Ingrese la descripción de la encomienda</label>
                                <textarea name="descripcion_encomienda" id="descripcion_encomienda" cols="30" rows="10"><?php echo $carrera->descripcion_encomienda ?></textarea>
                                <p style="color: red;"><?php echo form_error('descripcion_encomienda') ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-6">
                                <label for="fk_car_veh" class="form-label">Escoja un nuevo vehículo si desea</label>
                                <select class="form-select form-select" name="fk_car_veh" id="fk_car_veh">
                                    <option value="<?php echo $carrera->fk_car_veh ?>" selected><?php echo "Placa: " . $carrera->placa_veh ?></option>
                                    <?php foreach ($vehiculo as $registro) { ?>
                                        <option value="<?php echo $registro->id_veh ?>"><?php echo "Placa: " . $registro->placa_veh . " Propietario: " . $registro->nombres . " " . $registro->apellidos ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3">
                              <!-- Mostrar Distancia y Precio Calculado -->
                                <div class="col-12">
                                    <div class="mb-3">
                                        <p id="mostrar_distancia">Distancia anterior: <?php echo $carrera->precio_carrera ?> - km</p>
                                        <p id="mostrar_precio">Precio anterior:   $ <?php echo $carrera->distancia ?></p>
                                    </div>
                                </div>
                                <!-- Inputs ocultos para enviar distancia y precio calculados -->
                                <input type="hidden" id="input_distancia" name="distancia" value="">
                                <input type="hidden" id="input_precio" name="precio" value="">
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="row">
                        <center>
                            <br>
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                            <a name="" id="" class="btn btn-danger" href="<?php echo site_url("/vehiculos_controller/reporteVehiculos") ?>" role="button">Cancelar</a>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $("#menu_car_enc").addClass("active");

    ClassicEditor
        .create(document.querySelector('#descripcion_encomienda'))
        .then(editor => {
            console.log(editor);
        })
        .catch(error => {
            console.error(error);
        });

    function initMap() {
        var latCarrera = parseFloat(document.getElementById('latitud_carrera').value) || -1.831239;
        var lngCarrera = parseFloat(document.getElementById('longitud_carrera').value) || -78.183406;
        var latEntrega = parseFloat(document.getElementById('latitud_entrega').value) || -1.831239;
        var lngEntrega = parseFloat(document.getElementById('longitud_entrega').value) || -78.183406;

        // Inicializar el mapa de Carrera
        var mapaCarrera = new google.maps.Map(document.getElementById('mapaCarrera'), {
            center: { lat: latCarrera, lng: lngCarrera },
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marcador = new google.maps.Marker({
            map: mapaCarrera,
            draggable: true,
            position: { lat: latCarrera, lng: lngCarrera },
            icon: "<?php echo base_url('/assets/img/ubicacionNegro.png') ?>"
        });

        google.maps.event.addListener(marcador, 'dragend', function() {
            document.getElementById('latitud_carrera').value = marcador.getPosition().lat();
            document.getElementById('longitud_carrera').value = marcador.getPosition().lng();
            calcularYMostrarPrecio();
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchBox'));
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

        // Inicializar el mapa de Entrega
        var mapaFin = new google.maps.Map(document.getElementById('mapaFin'), {
            center: { lat: latEntrega, lng: lngEntrega },
            zoom: 14,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        var marcadorFin = new google.maps.Marker({
            map: mapaFin,
            draggable: true,
            position: { lat: latEntrega, lng: lngEntrega },
            icon: "<?php echo base_url('/assets/img/ubicacionNegro.png') ?>"
        });

        google.maps.event.addListener(marcadorFin, 'dragend', function() {
            document.getElementById('latitud_entrega').value = marcadorFin.getPosition().lat();
            document.getElementById('longitud_entrega').value = marcadorFin.getPosition().lng();
            calcularYMostrarPrecio();
        });

        var searchBoxFin = new google.maps.places.SearchBox(document.getElementById('searchBoxFin'));
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

    function calcularDistancia(lat1, lng1, lat2, lng2) {
        var R = 6371; // Radio de la tierra en km
        var dLat = (lat2 - lat1) * (Math.PI / 180);
        var dLng = (lng2 - lng1) * (Math.PI / 180);
        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1 * (Math.PI / 180)) * Math.cos(lat2 * (Math.PI / 180)) *
            Math.sin(dLng / 2) * Math.sin(dLng / 2);
        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        var distancia = R * c; // Distancia en km
        return distancia;
    }

    function calcularYMostrarPrecio() {
        var lat1 = parseFloat(document.getElementById('latitud_carrera').value);
        var lng1 = parseFloat(document.getElementById('longitud_carrera').value);
        var lat2 = parseFloat(document.getElementById('latitud_entrega').value);
        var lng2 = parseFloat(document.getElementById('longitud_entrega').value);

        if (isNaN(lat1) || isNaN(lng1) || isNaN(lat2) || isNaN(lng2)) {
            return;
        }

        var distancia = calcularDistancia(lat1, lng1, lat2, lng2);
        document.getElementById('distancia').value = distancia.toFixed(2);

        $.ajax({
            url: '<?php echo site_url('carerras_encomiendas_controller/obtenerPrecioPorDistancia'); ?>',
            type: 'POST',
            data: { distancia: distancia },
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    document.getElementById('precio_carrera').value = 'No se encontró una tarifa para la distancia calculada.';
                } else {
                    var tarifa = response.tarifa.toFixed(2);
                    document.getElementById('precio_carrera').value = tarifa;
                    document.getElementById('mostrar_distancia').innerText = `Distancia: ${distancia.toFixed(2)} km`;
                    document.getElementById('mostrar_precio').innerText = `Precio: $${tarifa}`;
                    document.getElementById('input_distancia').value = distancia.toFixed(2);
                    document.getElementById('input_precio').value = tarifa;
                }
            },
            error: function() {
                console.error('Error al obtener la tarifa.');
            }
        });
    }

    document.addEventListener("DOMContentLoaded", function() {
        initMap();
    });
</script>