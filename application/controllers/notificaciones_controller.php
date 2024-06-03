<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
class notificaciones_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("empresa_model");
        $this->load->model("usuario_model");
        $this->load->model("notificacion_model");
    }
    public function index()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["notificacion"] = $this->notificacion_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("notificacion/index", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function reportes()
    {       
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE" ||
            $this->session->userdata("conectado")->perfil == "SOCIO"
        ) {
            $fk_not_usu = $this->session->userdata("conectado")->id_usu;

            $data["notificacion"] = $this->notificacion_model->notificacionesPersonales($fk_not_usu);
            $this->load->view("administracion/header");
            $this->load->view("notificacion/reportes", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function nuevoNotificacion()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            // $data["dataUsu"] = $this->empresa_model->obtenerDatosUsu();
            $data["empresa"] = $this->empresa_model->obtenerDatos();
            $data["usuario"] = $this->usuario_model->obtenerDatosUsu();
            $this->load->view("administracion/header");
            $this->load->view("notificacion/nuevo", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function editarNotificacion($id_not)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["notificacion"] = $this->notificacion_model->obtenerRegistro($id_not);
            $data["empresa"] = $this->empresa_model->obtenerDatos();
            $data["usuario"] = $this->usuario_model->obtenerDatosUsu();
            $this->load->view("administracion/header");
            $this->load->view("notificacion/editar", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function guardarNotificacion()
    {
        try {
            $data = array(
                "caracter" => $this->input->post("caracter"),
                "fecha_not" => $this->input->post("fecha_not"),
                "hora_not" => $this->input->post("hora_not"),
                "mensaje" => $this->input->post("mensaje"),
                "fk_not_usu" => $this->input->post("fk_not_usu"),
            );
            print_r($data);
            if ($this->notificacion_model->insertar($data)) {
                $this->session->set_flashdata('correcto', "Registro Creado");
            } else {
                echo "hubo un error !!";
            }
            redirect("notificaciones_controller/index");
        } catch (\Throwable $th) {
            echo "el correo ya esta registrado.";
        }
    }
    public function enviarNotificacion(){
        $this->load->library('phpmailer_lib');
        $mail = $this->phpmailer_lib->load();
        $mail->isSMTP();
        $mail->SMTPDebug = 2; // Cambiar a valor numérico para la depuración SMTP
        $mail->Host     = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'faemultifamiliares@gmail.com';
        $mail->Password = 'ncjdsncjs';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port     = 465;
        $mail->setFrom('faemultifamiliares@gmail.com', 'Multifamiliares FAE');
        $mail->addReplyTo('faemultifamiliares@gmail.com', 'Multifamiliares FAE');
        $mail->addAddress("jhonatan15leon@gmail.com");
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');
        $mail->Subject = 'Multifamiliares FAE';
        $mail->isHTML(true);
        $mailContent = '<h1>NOTIFICACION PERSONAL</h1>
        <p>Hola, este es un correo generado por Good Service para recuperar su contraseña. Si fue un error, ignore este correo y su contraseña no cambiará. Caso contrario, ingrese al enlace:
         <br>.</p>'; //<a href="http://localhost/goodService/index.php/vista_cliente/frmRecuperarContra/' . $id_usu->id_usu . '">enlace de recuperación</a>s
        
        $mail->Body = $mailContent;
            
         
        if(!$mail->send()){
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        //  redirect("/notificaciones_controller/index");
        }else{
            $this->session->set_flashdata("EnviarCorreo", "Revise su correo.");
            redirect("/notificaciones_controller/index");
            echo "revise su correo";
        }
        
    }

    public function eliminarNotificacion($id_not)
    {
        if ($this->notificacion_model->borrar($id_not)) {
            $this->session->set_flashdata('eliminar', "Registro eliminado");
        } else {
            echo "ocurrio un error";
        }
        redirect("notificaciones_controller/index");
    }
    public function ActualizarNotificacion()
    {
        $data = array(
            "caracter" => $this->input->post("caracter"),
            "fecha_not" => $this->input->post("fecha_not"),
            "hora_not" => $this->input->post("hora_not"),
            "mensaje" => $this->input->post("mensaje"),
            "fk_not_usu" => $this->input->post("fk_not_usu"),
            // "foto"=> $this->input->post("foto"),
        );
        $id_not = $this->input->post("id_not"); 
        print_r($id_not);
        if ($this->notificacion_model->procesoActu($id_not, $data)) {
            $this->session->set_flashdata("actualizar", "Registro Actualizado correctamente.");
        } else {
            $this->session->set_flashdata("eliminar", "algo salio mal intente otra ves.");
            echo "no se pudo actualizar";
        }
        redirect("notificaciones_controller/index");
    }
}
