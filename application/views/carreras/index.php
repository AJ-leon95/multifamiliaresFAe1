<style>
    #mapa {
        width: 100%;
        height: 500px;
        border: 2px solid black;
    }

    .status-dot {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 15px;
        height: 15px;
        border-radius: 50%;
        z-index: 1000;
    }

    .status-dot.libre {
        background-color: green;
    }

    .status-dot.ocupado {
        background-color: red;
    }
</style>
<script>
    $("#pedir_taxi").addClass("active");
</script>


<?php date_default_timezone_set('America/Guayaquil');
?>

<div class="container">
    <div class="row">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Nueva Carrera</h3>
            </div>
            <div class="card-body">
                <form action="<?php echo site_url("/carerras_encomiendas_controller/guardarCarrera") ?>" method="post" onsubmit="return mostrarPrecioFormulario()">
                    <center>
                        <h1><b>Mapa</b></h1>
                    </center>
                    <div class="row">
                        <div class="col-12">
                            <div id="mapa"></div>
                        </div>
                    </div>
                    <input hidden type="text" class="form-control" name="latitud_carrera" id="latitud_carrera" />
                    <input hidden type="text" class="form-control" name="longitud_carrera" id="longitud_carrera" />
                    <input hidden value="CARRERA" type="text" class="form-control" name="tipo_ce" id="tipo_ce" />
                    <input hidden value="POR ACEPTAR" type="text" class="form-control" name="estadoCarrera" id="estadoCarrera" />
                    <input hidden value="<?php echo $id_usu ?>" type="text" class="form-control" name="fk_car_usu" id="fk_car_usu" />
                    <input hidden value="<?php echo date('Y-m-d') ?>" type="date" class="form-control" name="fecha_carrera" id="fecha_carrera" />
                    <input hidden value="<?php echo date('H:i'); ?>" type="time" class="form-control" name="hora_carrera" id="hora_carrera" />

                    <!-- Inputs ocultos para distancia y precio -->
                    <input hidden type="text" class="form-control" name="distancia" id="input_distancia" />
                    <input hidden type="text" class="form-control" name="precio_carrera" id="input_precio" />

                    <br>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="fk_car_veh" class="form-label">Escoja a un chofer</label>
                                <select class="form-select" name="fk_car_veh" id="fk_car_veh">
                                    <option disabled selected>Escoja uno</option>
                                    <?php foreach ($id_veh as $registro) { ?>
                                        <option value="<?php echo $registro->id_veh ?>"><?php echo "Placa: " . $registro->placa_veh . " Propietario: " . $registro->nombres . " " . $registro->apellidos ?></option>
                                    <?php } ?>
                                </select>
                                <p style="color: red;"><?php echo form_error('fk_car_veh') ?></p>
                            </div>

                        </div>
                        <div class="row">

                            <div class="col-4">
                                <button id="btnGuardar" type="submit" class="btn btn-warning">Pedir taxi</button>
                            </div>
                            <div class="col-4">
                                <p id="precio_carrera" style="font-weight: bold;"></p>
                            </div>
                            <div class="col-4">
                                <p id="distancia_carrera" style="font-weight: bold;"></p>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-4">
                                <input hidden type="text" class="form-control" name="latitud_entrega" id="latitud_entrega" />
                                <input hidden type="text" class="form-control" name="longitud_entrega" id="longitud_entrega" />
                                <input id="searchBox" type="text" class="form-control" placeholder="Busca el lugar" />
                            </div>


                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#latitud_carrera, #longitud_carrera, #latitud_entrega, #longitud_entrega').on('change', function() {
            var distancia = calcularDistancia(
                $('#latitud_carrera').val(), $('#longitud_carrera').val(),
                $('#latitud_entrega').val(), $('#longitud_entrega').val()
            );

            $.ajax({
                url: '<?php echo site_url('carerras_encomiendas_controller/obtenerPrecioPorDistancia'); ?>',
                type: 'POST',
                data: {
                    distancia: distancia
                },
                dataType: 'json',
                success: function(response) {
                    $('#precio_carrera').text('Precio estimado del viaje: $' + response.precio.toFixed(2));
                }
            });
        });
    });
    $('#fk_car_veh').select2();
</script>

<script>
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
    // Función para calcular la distancia entre dos puntos geográficos
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

    // Función para obtener la ubicación actual del usuario
    function obtenerUbicacionActual(mapa, marcadorDestino) {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lng = position.coords.longitude;
                var coordenadaActual = {
                    lat: lat,
                    lng: lng
                };

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

                // Calcular el precio inicial cuando se obtiene la ubicación actual
                calcularYMostrarPrecio(lat, lng, marcadorDestino.getPosition().lat(), marcadorDestino.getPosition().lng());
            }, function(error) {
                console.error("Error al obtener la geolocalización: ", error);
            });
        } else {
            console.log("La geolocalización no está disponible en este navegador.");
        }
    }

    // Función para calcular y mostrar el precio de la carrera
    function calcularYMostrarPrecio(lat1, lng1, lat2, lng2) {
        // Validar si ambas ubicaciones están dentro de Cotopaxi
        if (!estaDentroDeCotopaxi(lat1, lng1) || !estaDentroDeCotopaxi(lat2, lng2)) {
            iziToast.error({
                title: 'Error',
                message: 'El destino solo debe estar dentro de Ecuador.',
                position: 'topRight', //posición: topRight, topLeft, bottomRight, bottomLeft, etc.
            });
            document.getElementById('btnGuardar').disabled = true;
        } else {
            document.getElementById('btnGuardar').disabled = false;
        }
        var distancia = calcularDistancia(lat1, lng1, lat2, lng2);
        $.ajax({
            url: '<?php echo site_url('carerras_encomiendas_controller/obtenerPrecioPorDistancia'); ?>',
            type: 'POST',
            data: {
                distancia: distancia
            },
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    $('#precio_carrera').text('No se encontró una tarifa para la distancia calculada.');
                } else {
                    $('#precio_carrera').text('Precio estimado del viaje: $' + response.tarifa.toFixed(2));
                    $('#input_precio').val(response.tarifa.toFixed(2));
                }
                $('#distancia_carrera').text('Distancia: ' + distancia.toFixed(2) + ' km');
                $('#input_distancia').val(distancia.toFixed(2));
            },
            error: function() {
                console.error('Error al obtener la tarifa.');
            }
        });
    }


    // Inicialización del mapa
    function initMap() {
        var coordenada = {
            lat: -0.9180290761980233,
            lng: -78.62030968134943
        };
        var mapa = new google.maps.Map(document.getElementById('mapa'), {
            center: coordenada,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.Híbrido
        });
        //  // Definir los vértices del polígono
        //  var verticesCotopaxi = [
        //     { lat: -0.4829, lng: -78.3253 },
        //     { lat: -0.4829, lng: -79.0469 },
        //     { lat: -1.1933, lng: -79.0469 },
        //     { lat: -1.1933, lng: -78.3253 }
        // ];

        // // Crear el polígono para el área no seleccionable
        // var poligonoCotopaxi = new google.maps.Polygon({
        //     paths: verticesCotopaxi,
        //     strokeColor: '#FF0000', // Color del borde en rojo
        //     strokeOpacity: 0.8,
        //     strokeWeight: 2,
        //     fillColor: '#FF0000',   // Color de relleno en rojo
        //     fillOpacity: 0.35
        // });
        // poligonoCotopaxi.setMap(mapa);

        // // Crear un polígono inverso para el área seleccionable
        // var verticesSeleccionable = [
        //     { lat: -0.4829, lng: -78.3253 },
        //     { lat: -0.4829, lng: -79.0469 },
        //     { lat: -1.1933, lng: -79.0469 },
        //     { lat: -1.1933, lng: -78.3253 }
        // ];

        // var poligonoSeleccionable = new google.maps.Polygon({
        //     paths: verticesSeleccionable,
        //     strokeColor: '#00FF00', // Color del borde en verde
        //     strokeOpacity: 0.8,
        //     strokeWeight: 2,
        //     fillColor: '#00FF00',   // Color de relleno en verde
        //     fillOpacity: 0.35
        // });
        // poligonoSeleccionable.setMap(mapa);


        var coordenadaFinal = new google.maps.LatLng(-0.9180487872636021, -78.62032359810698);
        var marcadorDestino = new google.maps.Marker({
            position: coordenadaFinal,
            map: mapa,
            title: "Seleccione la dirección de llegada",
            draggable: true,
        });

        obtenerUbicacionActual(mapa, marcadorDestino);

        google.maps.event.addListener(marcadorDestino, 'dragend', function() {
            var lat1 = parseFloat(document.getElementById('latitud_carrera').value);
            var lng1 = parseFloat(document.getElementById('longitud_carrera').value);
            var lat2 = this.getPosition().lat();
            var lng2 = this.getPosition().lng();
            document.getElementById('latitud_entrega').value = lat2;
            document.getElementById('longitud_entrega').value = lng2;
            calcularYMostrarPrecio(lat1, lng1, lat2, lng2);
        });

      // Inicializar el SearchBox
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
            var lat1 = parseFloat(document.getElementById('latitud_carrera').value);
            var lng1 = parseFloat(document.getElementById('longitud_carrera').value);
            var lat2 = place.geometry.location.lat();
            var lng2 = place.geometry.location.lng();
            document.getElementById('latitud_entrega').value = lat2;
            document.getElementById('longitud_entrega').value = lng2;
            calcularYMostrarPrecio(lat1, lng1, lat2, lng2);
            if (place.geometry.viewport) bounds.union(place.geometry.viewport);
            else bounds.extend(place.geometry.location);
        });
        mapa.fitBounds(bounds);
    });
        <?php if (!empty($ultima_ubicacion)) { ?>
            <?php foreach ($ultima_ubicacion as $ubicacion) { ?>
                    (function() {
                        var coordenadaVehiculo = new google.maps.LatLng(<?php echo $ubicacion->latitud_ubi; ?>, <?php echo $ubicacion->longitud_ubi; ?>);
                        var estadoVehiculo = "<?php echo $ubicacion->estado; ?>";
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
                            <span class="status-dot ${estadoVehiculo}"></span>
                        </div>
                    `;

                        var infoWindow = new google.maps.InfoWindow({
                            content: infoWindowContent
                        });

                        marcadorVehiculo.addListener('mouseover', function() {
                            infoWindow.open(mapa, marcadorVehiculo);
                        });

                        marcadorVehiculo.addListener('mouseout', function() {
                            infoWindow.close();
                        });

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