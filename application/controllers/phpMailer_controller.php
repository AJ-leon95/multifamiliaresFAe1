<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class phpMailer_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model("empresa_model");
        $this->load->model("notificacion_model");
        $this->load->model("reunion_model");
        $this->load->model("deporte_model");
    }

    public function RegistrarCliente()
    {
        $this->form_validation->set_rules('nombres', 'Nombre', 'required', array('required' => 'El campo Nombre es obligatorio.'));
        $this->form_validation->set_rules('apellidos', 'Apellidos', 'required', array('required' => 'El campo Apellidos es obligatorio.'));
        $this->form_validation->set_rules('correo', 'Correo', 'required|valid_email|is_unique[usuarios.correo]', array(
            'required' => 'El campo Correo es obligatorio.',
            'valid_email' => 'El campo Correo debe contener un correo electrónico válido.',
            'check_unique_email' => 'El correo electrónico ya fue registrado con anterioridad.', // Mensaje personalizado para el correo duplicado
            'is_unique' => 'La direccion de correo electrono ya se encuentra registrado con anterioridad.'
        ));
        $this->form_validation->set_rules('contrasenia', 'Contraseña', 'required|min_length[8]|regex_match[/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[\W]).+$/]', array(
            'required' => 'El campo Contraseña es obligatorio.',
            'min_length' => 'La contraseña debe tener al menos 8 caracteres.',
            'regex_match' => 'La contraseña debe contener al menos un número, una letra mayúscula, una letra minúscula y un carácter especial.',
        ));
        $this->form_validation->set_rules('direccion', 'Direccion', 'required', array('required' => 'El campo Dirección es obligatorio.'));
        $this->form_validation->set_rules('telefono', 'Telefono', 'required', array('required' => 'El campo Teléfono es obligatorio.'));


        if ($this->form_validation->run() == FALSE) {
            $data["datosEmpresa"] = $this->empresa_model->obtenerDatos();
            $this->load->view("/administracion/headerCli");
            $this->load->view("/vistaGeneral/registro", $data);
            $this->load->view("/administracion/footerCli");
        } else {
            $nombres = $this->input->post('nombres');
            $apellidos = $this->input->post('apellidos');
            $fk_usu_emp = $this->input->post('fk_usu_emp');
            $telefono = $this->input->post('telefono');
            $direccion = $this->input->post('direccion');
            $correo = $this->input->post('correo');
            $contrasenia = $this->input->post('contrasenia');
            $perfil = $this->input->post('perfil');
            $confirmation_code = bin2hex(random_bytes(16)); // Generar un código de confirmación aleatorio

            $user_data = array(
                'nombres' => $nombres,
                'apellidos' => $apellidos,
                'correo' => $correo,
                'fk_usu_emp' => $fk_usu_emp,
                'telefono' => $telefono,
                'direccion' => $direccion,
                'contrasenia' => $contrasenia,
                'perfil' => $perfil,
                'confirmation_code' => $confirmation_code,
                'is_confirmed' => 0 // Agregar el campo 'is_confirmed' por defecto como no confirmado
            );


            if ($this->send_confirmation_email($correo, $confirmation_code, $nombres, $apellidos)) {
                // Aquí NO insertamos los datos del usuario aún, solo guardamos en la sesión
                $this->session->set_userdata('user_data', $user_data);
                $this->session->set_flashdata('correcto', "Por favor, revise su correo para confirmar su registro.");
                // redirect("/vista_general/registarseCli");
                $data["datosEmpresa"] = $this->empresa_model->obtenerDatos();
                $this->load->view("/administracion/headerCli");
                $this->load->view("/vistaGeneral/registro", $data);
                $this->load->view("/administracion/footerCli");
            } else {
                $this->session->set_flashdata('error', "No se pudo enviar el correo de confirmación. Por favor, intente nuevamente.");
                redirect("/vista_general/registarseCli");
            }
        }
    }

    private function send_confirmation_email($correo, $confirmation_code, $nombres, $apellidos)
    {
        // Asegúrate de incluir el autoload de Composer
        require_once APPPATH . '../vendor/autoload.php';

        try {
            set_time_limit(300); // 300 segundos = 5 minutos
            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'faemultifamiliares@gmail.com';
            $mail->Password = 'rlwbuxiougljhljd'; // Usa tu contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // Puerto correcto para TLS

            //Recipients
            $mail->setFrom('faemultifamiliares@gmail.com', 'Multifamiliares-FAE Nª26');
            $mail->addAddress($correo);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Confirmación de Correo Electrónico';

            $confirm_url = site_url('phpMailer_controller/confirm/' . $confirmation_code);
            $mail->CharSet = 'UTF-8';

            $mail->Body = '
            <html>
            <head>
              <meta charset="UTF-8">
              <style>
                .button {
                  display: inline-block;
                  padding: 10px 20px;
                  font-size: 16px;
                  cursor: pointer;
                  text-align: center;
                  text-decoration: none;
                  outline: none;
                  color: #fff;
                  background-color: #4CAF50;
                  border: none;
                  border-radius: 15px;
                  box-shadow: 0 9px #999;
                }
                .button:hover {background-color: #3e8e41}
                .button:active {
                  background-color: #3e8e41;
                  box-shadow: 0 5px #666;
                  transform: translateY(4px);
                }
              </style>
            </head>
            <body>
              <h1>Confirmación de Correo Electrónico</h1>
              <h4>Hola ' . $nombres . " " . $apellidos . '</h4>
              <p>Haga clic en el siguiente botón para confirmar su correo electrónico:</p>
              <a href="' . $confirm_url . '" class="button">Confirmar Correo</a>
            </body>
            </html>
            ';

            $mail->AltBody = 'Haga clic en este enlace para confirmar su correo: ' . $confirm_url;
            $mail->send();
            return true;
        } catch (Exception $e) {
            log_message('error', "No se pudo enviar el mensaje. Error de PHPMailer: {$mail->ErrorInfo}");
            return false;
        }
    }

    public function confirm($confirmation_code)
    {
        // Iniciar buffer de salida
        ob_start();

        $user_data = $this->session->userdata('user_data');
        if ($user_data && $user_data['confirmation_code'] === $confirmation_code) {
            $user_data['is_confirmed'] = 1;
            if ($this->usuario_model->insertar($user_data)) {
                // Confirmación exitosa, establecer mensaje flash
                $this->session->set_flashdata('correcto', "Su correo ha sido confirmado. Ahora puede iniciar sesión.");
                // Redireccionar a la página de inicio de sesión
                ob_end_clean(); // Limpiar el buffer antes de redirigir
                redirect('vista_general/login');
            } else {
                // Error al confirmar el registro
                $this->session->set_flashdata('error', "Error al confirmar su registro. Por favor, intente nuevamente.");
                // Redireccionar a la página de registro
                ob_end_clean(); // Limpiar el buffer antes de redirigir
                $data["datosEmpresa"] = $this->empresa_model->obtenerDatos();
                $this->load->view("/administracion/headerCli");
                $this->load->view("/vistaGeneral/registro", $data);
                $this->load->view("/administracion/footerCli");
            }
        } else {
            // Código de confirmación inválido
            $this->session->set_flashdata('error', "Código de confirmación inválido.");
            // Redireccionar a la página de registro
            ob_end_clean(); // Limpiar el buffer antes de redirigir
            $data["datosEmpresa"] = $this->empresa_model->obtenerDatos();
            $this->load->view("/administracion/headerCli");
            $this->load->view("/vistaGeneral/registro", $data);
            $this->load->view("/administracion/footerCli");
        }
    }
    public function enviarReuniones($id_reu)
    {
        $datos = $this->reunion_model->obtenerRegistro($id_reu);
        $socios = $this->usuario_model->correosSocios();
        $url = site_url('/vista_general/login');
        set_time_limit(300); // 300 segundos = 5 minutos
        // Asegúrate de incluir el autoload de Composer
        require_once APPPATH . '../vendor/autoload.php';

        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();

        // Configuración del servidor SMTP
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'faemultifamiliares@gmail.com';
        $mail->Password = 'rlwbuxiougljhljd'; // Usa tu contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Puerto correcto para TLS

        $enviados = 0;
        $errores = 0;

        foreach ($socios as $registro) {
            try {
                // Configuración del destinatario
                $mail->clearAllRecipients(); // Limpiar destinatarios anteriores
                $mail->addAddress($registro->correo);

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Convocatoria';
                $mail->CharSet = 'UTF-8';
                $mail->Body = '
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convocatoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        h1 {
            color: #333;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        h4 {
            color: #555;
            margin-bottom: 20px;
            font-size: 18px;
        }
        p {
            color: #666;
            line-height: 1.6;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #050404;
            background-color: #FFC107;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #ECE1BE;
        }
        .order-list {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }
        .order-list li {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Convocatoria</h1>
        <h4>Hola ' . $registro->nombres . ' ' . $registro->apellidos . ', querido ' . $registro->perfil . '.</h4>
        <p>
            Mediante el presente, la cooperativa de transporte de pasajeros en Taxis, <b>CONVOCA</b>
            a una reunión que se llevará a cabo el día ' . $datos->fecha_reu . ' 
            a las ' . $datos->hora_reu . ', en <b>' . $datos->lugar_reu . '</b>, 
            donde se tratará el asunto: 
            <span>' . str_replace(["<p>", "</p>"], "", $datos->asunto_reu) . '</span>
        </p>
        <p>Con el siguiente orden del día:</p>
        <ul class="order-list">
            <li>' . str_replace(["<p>", "</p>"], "", $datos->punto1) . '</li>
            <li>' . str_replace(["<p>", "</p>"], "", $datos->punto2) . '</li>
            <li>' . str_replace(["<p>", "</p>"], "", $datos->punto3) . '</li>
            <li>' . str_replace(["<p>", "</p>"], "", $datos->punto4) . '</li>
            <li>' . str_replace(["<p>", "</p>"], "", $datos->punto5) . '</li>
            <li>' . str_replace(["<p>", "</p>"], "", $datos->punto6) . '</li>
        </ul>
        <a href="' . $url . '" class="button">Revisar en el sistema</a>
    </div>
</body>
</html>
';


                if ($mail->send()) {
                    $enviados++;
                } else {
                    $errores++;
                }
            } catch (Exception $e) {
                log_message('error', "No se pudo enviar el mensaje a {$registro->correo}. Error de PHPMailer: {$mail->ErrorInfo}");
                $errores++;
            }
        }

        if ($enviados > 0 && $errores == 0) {
            $this->session->set_flashdata('correcto', 'Todos los correos fueron enviados exitosamente.');
        } elseif ($enviados > 0 && $errores > 0) {
            $this->session->set_flashdata('alerta', 'Algunos correos fueron enviados exitosamente. Errores: ' . $errores);
        } else {
            $this->session->set_flashdata('error', 'No se pudo enviar ningún correo.');
        }

        redirect('/reuniones_controller/index'); // Redirige a la página deseada después de enviar el correo
    }

    public function enviarNotificacion($id_not)
    {
        $datos = $this->notificacion_model->obtenerRegistro($id_not);
        $url = site_url('/vista_general/login');
        // Asegúrate de incluir el autoload de Composer
        require_once APPPATH . '../vendor/autoload.php';
        set_time_limit(300); // 300 segundos = 5 minutos
        try {
            $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            // Configuración del servidor SMTP
            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'faemultifamiliares@gmail.com';
            $mail->Password = 'rlwbuxiougljhljd'; // Usa tu contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // Puerto correcto para TLS

            // Configuración del destinatario
            $mail->setFrom('faemultifamiliares@gmail.com', 'Multifamiliares-FAE Nª26');
            $mail->addAddress($datos->correo);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Notificación';
            $mail->CharSet = 'UTF-8'; 
            $mail->Body = '
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificación Personal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        h4 {
            color: #555;
            margin-bottom: 20px;
        }
        p {
            color: #666;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #050404;
            background-color: #FFC107;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #ECE1BE;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Notificación Personal</h1>
        <h4>Dirigida a ' . $datos->nombres . " " . $datos->apellidos . '</h4>
        <p>
            Mediante el presente, la cooperativa de transporte de pasajeros en Taxis' . $datos->nombre . ', <b>NOTIFICA</b> 
            al Sr/Sra. ' . $datos->nombres . " " . $datos->apellidos . ', con CI:' . $datos->cedula_usu . ', socio de la institución con carácter 
            de ' . $datos->caracter  . ',con fecha: ' . $datos->fecha_not . ', con la siguiente descripción: ' . $datos->mensaje . '.
        </p>
        <a href="' . $url . '" class="button">Revisar en el sistema</a>
    </div>
</body>
</html>
    ';

            if ($mail->send()) {

                $this->session->set_flashdata('correcto', 'Correo enviado exitosamente.');
            } else {

                $this->session->set_flashdata('error', 'No se pudo enviar el correo.');
            }
        } catch (Exception $e) {
            log_message('error', "No se pudo enviar el mensaje. Error de PHPMailer: {$mail->ErrorInfo}");
            $this->session->set_flashdata('error', 'No se pudo enviar el correo. Error de PHPMailer.');
        }

        redirect('/notificaciones_controller/index'); // Redirige a la página deseada después de enviar el correo
    }


    public function recuperarContrasenia()
    {
        $usuario = $this->input->post('correo');
        set_time_limit(300); // 300 segundos = 5 minutos
        if ($this->usuario_model->comprobarCorreo($usuario)) {
            $id_usu = $this->usuario_model->recuperarID($usuario);
            $url = site_url('/vista_general/frmRecuperarContra/');
            require_once APPPATH . '../vendor/autoload.php';
            $this->load->library('phpmailer_lib');

            $mail = $this->phpmailer_lib->load();

            $mail->SMTPDebug = SMTP::DEBUG_OFF;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'faemultifamiliares@gmail.com';
            $mail->Password = 'rlwbuxiougljhljd'; // Usa tu contraseña de aplicación
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587; // Puerto correcto para TLS

            $mail->setFrom('faemultifamiliares@gmail.com', 'Multifamiliares Fae');
            $mail->addReplyTo('faemultifamiliares@gmail.com', 'Multifamiliares Fae');
            $mail->addAddress($usuario);

            $mail->Subject = 'Multifamiliares Fae';
            $mail->CharSet = 'UTF-8'; 
            $mail->isHTML(true);

            $mailContent = '
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Recuperación de Contraseña</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        padding: 20px;
                        margin: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        overflow: hidden;
                    }
                    h1 {
                        color: #333;
                        text-align: center;
                        font-size: 24px;
                        margin-bottom: 20px;
                    }
                    p {
                        color: #666;
                        line-height: 1.6;
                        font-size: 16px;
                        margin-bottom: 20px;
                        text-align: center;
                    }
                    a {
                        color: #050404;
                        background-color: #FFC107;
                        padding: 10px 20px;
                        text-decoration: none;
                        border-radius: 5px;
                        display: inline-block;
                        margin-top: 20px;
                    }
                    a:hover {
                        background-color: #ECE1BE;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <h1>Recuperación de Contraseña</h1>
                    <p>Hola, este es un correo generado por Multifamiliares Fae para recuperar su contraseña. Si fue un error, ignore este correo y su contraseña no cambiará.</p>
                    <p>De lo contrario, haga clic en el siguiente enlace para recuperar su contraseña:</p>
                    <p><a href="' . $url . $id_usu->id_usu . '">Enlace de recuperación</a></p>
                </div>
            </body>
            </html>
            ';

            $mail->Body = $mailContent;

            if (!$mail->send()) {
                $this->session->set_flashdata("error", "No se pudo enviar el correo. Intente nuevamente.");
            } else {
                $this->session->set_flashdata("correcto", "Por favor revise su correo.");
            }
            redirect("/vista_general/recovery");
        } else {
            $this->session->set_flashdata("error", "El correo ingresado no se encuentra registrado.");
            redirect("/vista_general/recovery");
        }
    }
    public function enviardeporte($id_dep)
    {
        $datos = $this->deporte_model->obtenerRegistro($id_dep);
        $socios = $this->usuario_model->correosSocios();
        $url = site_url('/vista_general/login');
        set_time_limit(300); // 300 segundos = 5 minutos
        // Asegúrate de incluir el autoload de Composer
        require_once APPPATH . '../vendor/autoload.php';

        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();

        // Configuración del servidor SMTP
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'faemultifamiliares@gmail.com';
        $mail->Password = 'rlwbuxiougljhljd'; // Usa tu contraseña de aplicación
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Puerto correcto para TLS

        $enviados = 0;
        $errores = 0;

        foreach ($socios as $registro) {
            try {
                // Configuración del destinatario
                $mail->clearAllRecipients(); // Limpiar destinatarios anteriores
                $mail->addAddress($registro->correo);

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Convocatoria Deportiva';
                $mail->CharSet = 'UTF-8';  
                $mail->Body = '
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                  

    <title>Convocatoria</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        h1 {
            color: #333;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        h4 {
            color: #555;
            margin-bottom: 20px;
            font-size: 18px;
        }
        p {
            color: #666;
            line-height: 1.6;
            font-size: 16px;
            margin-bottom: 20px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #050404;
            background-color: #FFC107;
            border-radius: 5px;
            transition: background-color 0.3s;
            margin-top: 20px;
        }
        .button:hover {
            background-color: #ECE1BE;
        }
        .order-list {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }
        .order-list li {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Convocatoria</h1>
        <h4>Hola ' . $registro->nombres . ' ' . $registro->apellidos . ', querido ' . $registro->perfil . '.</h4>
        <p>
            Mediante el presente, la cooperativa de transporte de pasajeros en Taxis, <b>CONVOCA</b>
            a una actividad deportiva que se llevará a cabo el día ' . $datos->fecha_dep . ' 
            a las ' . $datos->hora_dep . ', en <b>' . $datos->lugar_dep . '</b>.
           
        </p>
        <a href="' . $url . '" class="button">Revisar en el sistema</a>
    </div>
</body>
</html>
';


                if ($mail->send()) {
                    $enviados++;
                } else {
                    $errores++;
                }
            } catch (Exception $e) {
                log_message('error', "No se pudo enviar el mensaje a {$registro->correo}. Error de PHPMailer: {$mail->ErrorInfo}");
                $errores++;
            }
        }

        if ($enviados > 0 && $errores == 0) {
            $this->session->set_flashdata('correcto', 'Todos los correos fueron enviados exitosamente.');
        } elseif ($enviados > 0 && $errores > 0) {
            $this->session->set_flashdata('alerta', 'Algunos correos fueron enviados exitosamente. Errores: ' . $errores);
        } else {
            $this->session->set_flashdata('error', 'No se pudo enviar ningún correo.');
        }

        redirect('/deportes_controller/index'); // Redirige a la página deseada después de enviar el correo
    }
}
