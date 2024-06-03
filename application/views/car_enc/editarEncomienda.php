<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Encomienda</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
</head>
<body>
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
                <form action="<?php echo site_url("/carerras_encomiendas_controller/Actualizar") ?>" method="post" enctype="multipart/form-data">
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
                            <label for="" class="form-label">Escoja la ubicacion inicial de la carrera</label>
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
                            <label for="" class="form-label">Escoja la ubicacion del destino de la carrera</label>
                            <div id="mapaFin" style="width:100%; height:250px; border:2px solid black;" class="col-12"></div>
                            <p style="color: red;"><?php echo form_error('latitud_entrega') ?></p>
                            <p style="color: red;"><?php echo form_error('longitud_entrega') ?></p>
                        </div>
                    </div>

                    <!-- Descripción y Vehículo -->
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-6">
                                <label for="descripcion_encomienda" class="form-label">Ingrese la descripcion de la encomienda</label>
                                <textarea name="descripcion_encomienda" id="descripcion_encomienda" cols="30" rows="10"><?php echo $carrera->descripcion_encomienda ?></textarea>
                                <p style="color: red;"><?php echo form_error('descripcion_encomienda') ?></p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-6">
                                <label for="fk_car_veh" class="form-label">Escoja un nuevo vehiculo si desea</label>
                                <select class="form-select form-select" name="fk_car_veh" id="fk_car_veh">
                                    <option value="<?php echo $carrera->fk_car_veh ?>" selected><?php echo "Placa: " . $carrera->placa_veh ?></option>
                                    <?php foreach ($vehiculo as $registro) { ?>
                                        <option value="<?php echo $registro->id_veh ?>"><?php echo "Placa: " . $registro->placa_veh . " Propietario: " . $registro->nombres . " " . $registro->apellidos ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="row">
                        <center>
                            <br>
                            <button type="submit" class="btn btn-warning">Guardar</button>
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

    var mapaCarrera, marcador, searchBox;
    var mapaFin, marcadorFin, searchBoxFin;

    function initMap() {
        // Coordenadas iniciales para la ubicación de la carrera
        var latitudCarrera = parseFloat(document.getElementById('latitud_carrera').value);
        var longitudCarrera = parseFloat(document.getElementById('longitud_carrera').value);
        var cordenadaInicial = new google.maps.LatLng(latitudCarrera, longitudCarrera);

        // Inicializar primer mapa
        mapaCarrera = new google.maps.Map(document.getElementById('mapaCarrera'), {
            center: cordenadaInicial,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
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
        });

        var input = document.getElementById('searchBox');
        searchBox = new google.maps.places.SearchBox(input);
        mapaCarrera.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

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
        });

        // Coordenadas iniciales para la ubicación de entrega
        var latitudEntrega = parseFloat(document.getElementById('latitud_entrega').value);
        var longitudEntrega = parseFloat(document.getElementById('longitud_entrega').value);
        var cordenadaFinal = new google.maps.LatLng(latitudEntrega, longitudEntrega);

        // Inicializar segundo mapa
        mapaFin = new google.maps.Map(document.getElementById('mapaFin'), {
            center: cordenadaFinal,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });

        marcadorFin = new google.maps.Marker({
            position: cordenadaFinal,
            map: mapaFin,
            title: "Seleccione la dirección de entrega",
            draggable: true,
            icon: "<?php echo base_url('/assets/img/ubicacionNegro.png') ?>"
        });

        google.maps.event.addListener(marcadorFin, 'dragend', function() {
            document.getElementById('latitud_entrega').value = this.getPosition().lat();
            document.getElementById('longitud_entrega').value = this.getPosition().lng();
        });

        var inputFin = document.getElementById('searchBoxFin');
        searchBoxFin = new google.maps.places.SearchBox(inputFin);
        mapaFin.controls[google.maps.ControlPosition.TOP_LEFT].push(inputFin);

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
        });
    }

    function obtenerUbicacionActual() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var currentPos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                mapaCarrera.setCenter(currentPos);
                marcador.setPosition(currentPos);
                document.getElementById('latitud_carrera').value = position.coords.latitude;
                document.getElementById('longitud_carrera').value = position.coords.longitude;
                alert('Ubicación actual seleccionada:\nLatitud: ' + position.coords.latitude + '\nLongitud: ' + position.coords.longitude);
            }, function() {
                alert('Error al obtener la ubicación actual.');
            });
        } else {
            alert('Geolocalización no es soportada por este navegador.');
        }
    }

    function obtenerUbicacionActualFin() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var currentPos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                mapaFin.setCenter(currentPos);
                marcadorFin.setPosition(currentPos);
                document.getElementById('latitud_entrega').value = position.coords.latitude;
                document.getElementById('longitud_entrega').value = position.coords.longitude;
                alert('Ubicación de entrega actual seleccionada:\nLatitud: ' + position.coords.latitude + '\nLongitud: ' + position.coords.longitude);
            }, function() {
                alert('Error al obtener la ubicación de entrega actual.');
            });
        } else {
            alert('Geolocalización no es soportada por este navegador.');
        }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDUpcfQp9kDxjlCkT8ASzbF5gybmzhvd8U&libraries=places&callback=initMap"></script>

</body>
</html>
