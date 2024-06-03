<?php
date_default_timezone_set('America/Guayaquil');
?>
<style>
    #mapa {
        width: 100%;
        height: 500px;
        border: 2px solid black;
    }
</style>

<div class="container">
    <div class="row">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Nueva Encomienda</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url("/carerras_encomiendas_controller/guardarCarrera") ?>" method="post">
                    <center>
                        <h1><b>Mapa de ubicaciones</b></h1>
                    </center>
                    <div class="row">
                        <div class="col-12">
                            <div id="mapa"></div>
                        </div>
                    </div>
                    <input hidden type="text" class="form-control" name="latitud_carrera" id="latitud_carrera" aria-describedby="helpId" placeholder="" />
                    <input hidden type="text" class="form-control" name="longitud_carrera" id="longitud_carrera" aria-describedby="helpId" placeholder="" />
                    <input hidden value="CARRERA" type="text" class="form-control" name="tipo_ce" id="tipo_ce" aria-describedby="helpId" placeholder="" />
                    <input hidden value="POR ACEPTAR" type="text" class="form-control" name="estadoCarrera" id="estadoCarrera" aria-describedby="helpId" placeholder="" />
                    <input hidden value="<?php echo $id_usu ?>" type="text" class="form-control" name="fk_car_usu" id="fk_car_usu" aria-describedby="helpId" placeholder="" />
                    <input hidden value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" name="fecha_carrera" id="fecha_carrera" aria-describedby="helpId" placeholder="" />
                    <input hidden value="<?php echo date('H:i'); ?>" type="time" class="form-control" name="hora_carrera" id="hora_carrera" placeholder="" />
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="fk_car_veh" class="form-label">Escoja a un chofer</label>
                                <select class="form-select form-select" name="fk_car_veh" id="fk_car_veh">
                                    <option disabled selected>Escoja uno</option>
                                    <?php foreach ($id_veh as $registro) { ?>
                                        <option value="<?php echo $registro->id_veh ?>"><?php echo "Placa: " . $registro->placa_veh . " Propietario: " . $registro->nombres . " " . $registro->apellidos ?></option>
                                    <?php } ?>
                                </select>
                                <p style="color: red;"><?php echo form_error('fk_car_veh') ?></p>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-warning">Pedir taxi</button>
                            </div>
                        </div>
                        <div class="col-6">
                            <input hidden type="text" class="form-control" name="latitud_entrega" id="latitud_entrega" aria-describedby="helpId" placeholder="" />
                            <input hidden type="text" class="form-control" name="longitud_entrega" id="longitud_entrega" aria-describedby="helpId" placeholder="" />
                            <input id="searchBox" type="text" class="form-control" aria-describedby="helpId" placeholder="Busca el lugar" />
                            <label>Escoja el lugar de llegada de la carrera</label>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><script type="text/javascript">
    function obtenerUbicacionActual(mapa, marcadorDestino) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var coordenadaActual = { lat: lat, lng: lng };

                var marcadorActual = new google.maps.Marker({
                    position: coordenadaActual,
                    title: "Ubicación Actual",
                    map: mapa,
                    icon: {
                        url: "https://maps.google.com/mapfiles/ms/icons/blue-dot.png",
                        scaledSize: new google.maps.Size(40, 40)
                    }
                });

                mapa.setCenter(coordenadaActual);
                document.getElementById('latitud_carrera').value = lat;
                document.getElementById('longitud_carrera').value = lng;
            }, function(error) {
                console.error("Error al obtener la geolocalización: ", error);
            });
        } else {
            console.log("La geolocalización no está disponible en este navegador.");
        }
    }

    function initMap() {
        var coordenada = { lat: -0.9180290761980233, lng: -78.62030968134943 };
        var mapa = new google.maps.Map(document.getElementById('mapa'), {
            center: coordenada,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.HYBRID
        });

        obtenerUbicacionActual(mapa);

        var cordenadaFinal = new google.maps.LatLng(-0.9180487872636021, -78.62032359810698);
        var marcadorDestino = new google.maps.Marker({
            position: cordenadaFinal,
            map: mapa,
            title: "Seleccione la dirección de llegada",
            draggable: true,
        });

        google.maps.event.addListener(marcadorDestino, 'dragend', function() {
            document.getElementById('latitud_entrega').value = this.getPosition().lat();
            document.getElementById('longitud_entrega').value = this.getPosition().lng();
        });

        var input = document.getElementById('searchBox');
        var searchBox = new google.maps.places.SearchBox(input);
        mapa.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();
            if (places.length == 0) return;

            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) return;
                marcadorDestino.setPosition(place.geometry.location);
                document.getElementById('latitud_entrega').value = place.geometry.location.lat();
                document.getElementById('longitud_entrega').value = place.geometry.location.lng();
                if (place.geometry.viewport) bounds.union(place.geometry.viewport);
                else bounds.extend(place.geometry.location);
            });
            mapa.fitBounds(bounds);
        });

        <?php if (!empty($ultima_ubicacion)) { ?>
            <?php foreach ($ultima_ubicacion as $ubicacion) { ?>
                (function() {
                    var coordenadaVehiculo = new google.maps.LatLng(<?php echo $ubicacion->latitud_ubi; ?>, <?php echo $ubicacion->longitud_ubi; ?>);
                    var marcadorVehiculo = new google.maps.Marker({
                        position: coordenadaVehiculo,
                        title: "Unidad: <?php echo $ubicacion->numero; ?>",
                        map: mapa,
                        icon: {
                            url: "<?php echo base_url('/uploads/usuarios/'); ?><?php echo $ubicacion->foto ?>",
                            scaledSize: new google.maps.Size(40, 40)
                        }
                    });

                    var infoWindowContent = `
                        <div style="text-align: center;">
                            <img src="<?php echo base_url('/uploads/vehiculos/'); ?><?php echo $ubicacion->foto_veh ?>" alt="Imagen del vehículo" style="width: 40px; height: 40px;">
                            <p>Unidad: <?php echo $ubicacion->numero; ?></p>
                            <p>Propietario: <?php echo $ubicacion->nombres . " " . $ubicacion->apellidos; ?></p>
                            <p>Fecha: <?php echo $ubicacion->fecha_ubi; ?></p>
                            <p>Hora: <?php echo $ubicacion->hora_ubi; ?></p>
                        </div>
                    `;

                    var infoWindow = new google.maps.InfoWindow({ content: infoWindowContent });

                    // Evento para mostrar el cuadro emergente al pasar el mouse
                    marcadorVehiculo.addListener('mouseover', function() {
                        infoWindow.open(mapa, marcadorVehiculo);
                    });

                    // Evento para esconder el cuadro emergente al quitar el mouse
                    marcadorVehiculo.addListener('mouseout', function() {
                        infoWindow.close();
                    });

                    // Evento para anclar el cuadro emergente al hacer clic
                    marcadorVehiculo.addListener('click', function() {
                        infoWindow.open(mapa, marcadorVehiculo);
                    });
                })();
            <?php } ?>
        <?php } else { ?>
            console.log("No se encontraron ubicaciones de vehículos.");
        <?php } ?>
    }

    document.addEventListener('DOMContentLoaded', function() {
        if (typeof google === 'object' && typeof google.maps === 'object') {
            initMap();
        } else {
            console.error('La API de Google Maps no está disponible.');
        }
    });
</script>
