<?php 
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
class vista_general extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model("empresa_model");
        $this->load->model("usuario_model");
    }

    public function enviarCorreoVerificacion($correo){
       
        $this->load->library('phpmailer_lib');
            $mail = $this->phpmailer_lib->load();
            $mail->isSMTP();
            $mail->Host     = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'good.service.machachi@gmail.com';
            $mail->Password = 'jbtbqbritlxjenkh';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port     = 465;
            $mail->setFrom('good.service.machachi@gmail.com', 'Good Service');
            $mail->addReplyTo('good.service.machachi@gmail.com', 'Good Service');
            $mail->addAddress($correo);
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
            $mail->Subject = 'Good Service';
            $mail->isHTML(true);
            $mailContent = '<h1>Recuperación de Contraseña</h1>
            <p>Hola, este es un correo generado por Good Service para recuperar su contraseña. Si fue un error, ignore este correo y su contraseña no cambiará. Caso contrario, ingrese al enlace:
             <br>.</p>'; //<a href="http://localhost/goodService/index.php/vista_cliente/frmRecuperarContra/' . $id_usu->id_usu . '">enlace de recuperación</a>s

            $mail->Body = $mailContent;
                
             
            if(!$mail->send()){
                echo 'Message could not be sent.';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
                // redirect("/vista_cliente/login?mensaje=error");
            }else{
                // $this->session->set_flashdata("EnviarCorreo", "Revise su correo.");
                // redirect("/vista_cliente/login?mensaje=ok");
                echo "revise su correo";
            }
       
    }
    public function index() {
        
        $this->load->view("/administracion/headerCli");
        $this->load->view("/vistaGeneral/index");
        $this->load->view("/administracion/footerCli");
    }
    public function login() {
        
        // $this->load->view("/administracion/headerCli");
        $this->load->view("/vistaGeneral/login");
        // $this->load->view("/administracion/footerCli");
    }
    public function registarseCli() {
        $data["datosEmpresa"]=$this->empresa_model->obtenerDatos();
        $this->load->view("/administracion/headerCli");
        $this->load->view("/vistaGeneral/registro", $data);
        $this->load->view("/administracion/footerCli");
    }
    public function RegistrarCliente() {
        $correo = $this->input->post("correo");
        print_r($correo);
        
      $this->enviarCorreoVerificacion($correo);
        

        $data = array(
            "fk_usu_emp" => $this->input->post("fk_usu_emp"),
            "perfil" => $this->input->post("perfil"),
            "correo" => $this->input->post("correo"),
            "contrasenia" => $this->input->post("contrasenia"),
            "telefono" => $this->input->post("telefono"),
            "direccion" => $this->input->post("direccion"),
            // "foto"=> $this->input->post("foto"),
        );
        // $this->load->library("upload");
        // $new_name = "foto_usuario" . time() . "_" . rand(1, 5000);
        // $config['file_name'] = $new_name . '_1';
        // $config['upload_path'] = FCPATH . 'uploads/usuarios/';
        // $config['allowed_types'] = 'jpeg|jpg|png';
        // $config['max_size'] = 1024 * 5;
        // $this->upload->initialize($config);

        // if ($this->upload->do_upload("foto")) {
        //     $dataSubida = $this->upload->data();
        //     $data["foto"] = $dataSubida['file_name'];
        // }
        // if ($this->usuario_model->insertar($data)) {
        //     $this->session->set_flashdata('correcto', "Registro Creado");
        // } else {
        //     echo "hubo un error !!";
        // }
        // redirect("automovil_controller/nuevo");
}
//funcion para iniciar session 
public function iniciarSesion() {

    $correo = $this->input->post('correo');
    $contrasenia = $this->input->post('contrasenia');
    //  print_r($correo." " .$contrasenia);
    $usuarioConectado = $this->usuario_model->obtenerPorEmailPassword($correo,$contrasenia);
    if ($usuarioConectado) {

        echo'esta correcto';
        $this->session->set_userdata("conectado",$usuarioConectado);
        $this->session->set_flashdata("bienvenida","Bienvenido al sistema Sr." ."<b>".$usuarioConectado->nombres." ".$usuarioConectado->apellidos." UD tiene el perfil de ".$usuarioConectado->perfil_usu );
        redirect('Welcome/index');
    } else {

        echo "el usuario o contraseña estan incorrectas porfavor intente otra ves";
        $this->session->set_flashdata("bienvenida","el usuario o la contraseña esta mal" );
        redirect('vista_general/login');
    }
}
}


?>