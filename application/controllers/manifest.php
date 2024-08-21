<?php 
// application/controllers/Manifest.php
class Manifest extends CI_Controller {public function index() {
    // Establece el tipo de contenido como JSON
    header('Content-Type: application/json');

    // Genera el JSON para el manifest
    $manifest = [
        'name' => 'Project',
        'short_name' => 'Project',
        'theme_color' => '#359daf',
        'background_color' => '#359DAF',
        'display' => 'standalone',
        'orientation' => 'portrait',
        'scope' => '/',
        'start_url' => '/',
        'icons' => 
            [
                'src' => base_url('/assets/img/iconos/android-chrome-72x72.png'),
                'sizes' => '72x72',
                'type' => 'image/png'
            ],
            [
                'src' => base_url('/assets/img/iconos/android-chrome-96x96.png'),
                'sizes' => '96x96',
                'type' => 'image/png',
                "purpose"=> "any"
            ],
           
            [
                'src' => base_url('/assets/img/iconos/android-chrome-144x144.png'),
                'sizes' => '144x144',
                'type' => 'image/png',
                "purpose"=> "any"
            ],
            [
                'src' => base_url('/assets/img/iconos/android-chrome-512x512.png'),
                'sizes' => '512x512',
                'type' => 'image/png',
                "purpose"=> "any"
            ]
            
        
    ];

    // Convierte el array a JSON y lo envía como respuesta
    echo json_encode($manifest);
}
}
?>
