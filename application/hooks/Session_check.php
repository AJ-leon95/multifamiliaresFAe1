<?php
class Session_check {
    public function check() {
        $CI =& get_instance();
        $public_controllers = array('/vista_general/login'); // Agrega aquí los controladores públicos

        // Evitar redirección en controladores públicos
        if (in_array($CI->router->class, $public_controllers)) {
            return;
        }

        if ($CI->session->userdata('conectado') === null) {
            redirect('/vista_general/login');
        }
    }
}


 ?>