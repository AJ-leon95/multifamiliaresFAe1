self.addEventListener('install', function(event) {
    event.waitUntil(
        caches.open('v1').then(function(cache) {
            return cache.addAll([
                '/',
             
                '/uploads/empresa/new_logo1714327226_1256_1.jpg'
            ]).then(function() {
                console.log('Todos los recursos han sido cacheados.');
            }).catch(function(error) {
                console.error('Error al agregar archivos a la caché:', error);
            });
        })
    );
});

self.addEventListener('fetch', function(event) {
    event.respondWith(
        caches.match(event.request).then(function(response) {
            return response || fetch(event.request).catch(function(error) {
                console.error('Error al manejar la solicitud:', error);
            });
        })
    );
});
