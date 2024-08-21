// Función para enviar la ubicación
function enviarUbicacion() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            console.log("Geolocalización obtenida:", position);
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;

            // Verificar que las coordenadas se obtienen correctamente
            console.log("Latitud: " + lat + ", Longitud: " + lng);

            var ultimaLat = localStorage.getItem('ultimaLat');
            var ultimaLng = localStorage.getItem('ultimaLng');

            if (ultimaLat !== lat.toString() || ultimaLng !== lng.toString()) {
                $.ajax({
                    type: "POST",
                    url: baseUrl + "index.php/ubicacion_vehiculo_controller/insertarVehiculoCarro",
                    data: {
                        latitud: lat,
                        longitud: lng
                    },
                    success: function(response) {
                        console.log("Ubicación registrada correctamente a las " + new Date().toLocaleString());
                        localStorage.setItem('ultimaLat', lat.toString());
                        localStorage.setItem('ultimaLng', lng.toString());
                        localStorage.setItem('ubicacionRegistrada', 'true'); 

                    
                        iziToast.success({
                            title: 'Exito',
                            message: 'Ubicación registrada correctamente a las ' + new Date().toLocaleString(),
                            position: 'topRight'
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al registrar la ubicación a las " + new Date().toLocaleString() + ": " + xhr.responseText);

                        // Mostrar notificación iziToast de error
                        iziToast.error({
                            title: 'Error',
                            message: 'Error al registrar la ubicación: ' + xhr.responseText,
                            position: 'topRight'
                        });
                    }
                });
            } else {
                console.log("La ubicación no ha cambiado. No se registrará una nueva entrada.");
            }
        }, function(error) {
            console.error("Error al obtener la geolocalización: ", error);

            // Mostrar notificación iziToast de error
            var errorMessage = '';
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    errorMessage = "El usuario ha denegado la solicitud de geolocalización.";
                    break;
                case error.POSITION_UNAVAILABLE:
                    errorMessage = "La información de ubicación no está disponible.";
                    break;
                case error.TIMEOUT:
                    errorMessage = "La solicitud para obtener la ubicación ha caducado.";
                    break;
                default:
                    errorMessage = "Ha ocurrido un error desconocido al obtener la geolocalización.";
                    break;
            }

            iziToast.error({
                title: 'Error',
                message: errorMessage,
                position: 'topRight'
            });
        });
    } else {
        console.log("La geolocalización no está disponible en este navegador.");

        iziToast.error({
            title: 'Error',
            message: "La geolocalización no está disponible en este navegador.",
            position: 'topRight'
        });
    }
}

// Función para solicitar permisos de geolocalización
function solicitarPermisoGeolocalizacion() {
    iziToast.info({
        title: 'Información',
        message: "Esta aplicación necesita acceso a su ubicación para funcionar correctamente. Por favor, permita el acceso a su ubicación.",
        position: 'topRight'
    });
    enviarUbicacion();
}

// Verificar si la ubicación ya se ha registrado previamente
var ubicacionRegistrada = localStorage.getItem('ubicacionRegistrada') === 'true';
if (!ubicacionRegistrada) {
    solicitarPermisoGeolocalizacion();
}

// Enviar ubicación cada 5 minutos (300000 ms)
setInterval(function() {
    enviarUbicacion();
}, 300000);
