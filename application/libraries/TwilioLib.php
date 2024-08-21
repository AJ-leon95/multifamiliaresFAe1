<?php
require 'vendor/autoload.php'; // Asegúrate de que este es el camino correcto al autoload de Composer

use Twilio\Rest\Client;

class TwilioLib {
    private $sid;
    private $token;
    private $client;

    public function __construct() {
        // Credenciales de Twilio
        $this->sid = 'ACb9e36cd392f55aba90ad64a5b5741b5e';
        $this->token = '0d5293281f08625fad25cf64176f0235';

        // Crear cliente de Twilio
        $this->client = new Client($this->sid, $this->token);
    }

    public function send_whatsapp_message($to, $from, $body) {
        try {
            $message = $this->client->messages->create($to, [
                'from' => $from,
                'body' => $body
            ]);

            return 'Mensaje enviado con éxito! SID: ' . $message->sid;
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
