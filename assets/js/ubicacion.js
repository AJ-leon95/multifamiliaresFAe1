// Función para enviar la ubicación
function enviarUbicacion() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            console.log("Geolocalización obtenida:", position);
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;

            // Aquí puedes verificar que las coordenadas se obtienen correctamente
            console.log("Latitud: " + lat + ", Longitud: " + lng);

            // Obtener la última ubicación registrada del almacenamiento local
            var ultimaLat = localStorage.getItem('ultimaLat');
            var ultimaLng = localStorage.getItem('ultimaLng');

            // Verificar si la ubicación es diferente de la última registrada
            if (ultimaLat !== lat.toString() || ultimaLng !== lng.toString()) {
                // Enviar las coordenadas al controlador usando AJA X
                $.ajax({
                    type: "POST",
                    url: baseUrl + "index.php/ubicacion_vehiculo_controller/insertarVehiculoCarro",
                    data: {
                        latitud: lat,
                        longitud: lng
                    },
                    success: function(response) {
                        console.log("Ubicación registrada correctamente a las " + new Date().toLocaleString());
                        // Actualizar la última ubicación registrada en el almacenamiento local
                        localStorage.setItem('ultimaLat', lat.toString());
                        localStorage.setItem('ultimaLng', lng.toString());
                        localStorage.setItem('ubicacionRegistrada', 'true'); // Marcar la ubicación como registrada en el almacenamiento local

                        // Mostrar mensaje emergente de éxito
                        alert("Ubicación registrada correctamente a las " + new Date().toLocaleString());
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al registrar la ubicación a las " + new Date().toLocaleString() + ": " + xhr.responseText);

                        // Mostrar mensaje emergente de error
                        alert("Error al registrar la ubicación: " + xhr.responseText);
                    }
                });
            } else {
                console.log("La ubicación no ha cambiado. No se registrará una nueva entrada.");
            }
        }, function(error) {
            console.error("Error al obtener la geolocalización: ", error);

            // Mostrar mensaje emergente de error
            switch(error.code) {
                case error.PERMISSION_DENIED:
                    alert("El usuario ha denegado la solicitud de geolocalización.");
                    break;
                case error.POSITION_UNAVAILABLE:
                    alert("La información de ubicación no está disponible.");
                    break;
                case error.TIMEOUT:
                    alert("La solicitud para obtener la ubicación ha caducado.");
                    break;
                default:
                    alert("Ha ocurrido un error desconocido al obtener la geolocalización.");
                    break;
            }
        });
    } else {
        console.log("La geolocalización no está disponible en este navegador.");

        // Mostrar mensaje emergente de error
        alert("La geolocalización no está disponible en este navegador.");
    }
}

// Función para solicitar permisos de geolocalización de forma amigable
function solicitarPermisoGeolocalizacion() {
    alert("Esta aplicación necesita acceso a su ubicación para funcionar correctamente. Por favor, permita el acceso a su ubicación.");
    enviarUbicacion();
}

// Verificar si la ubicación ya se ha registrado previamente
var ubicacionRegistrada = localStorage.getItem('ubicacionRegistrada') === 'true';
if (!ubicacionRegistrada) {
    // Si no se ha registrado previamente, solicitar permisos de geolocalización
    solicitarPermisoGeolocalizacion();
}

// Enviar ubicación cada 10 minutos (600000 ms)
setInterval(function() {
    // Registrar la ubicación sin importar si se ha registrado previamente
    enviarUbicacion();
}, 600000);
