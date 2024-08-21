<?php 
class vista_general extends CI_Controller {
    public function __construct() {
        parent::__construct();
        
        $this->load->model("empresa_model");
        $this->load->model("usuario_model");
        $this->load->model("vehiculo_model");
        $this->load->model("chofer_model");
        $this->load->library('form_validation');

    }

        public function index() {
            $data['current_page'] = 'index'; // Define la página actual
        $data["empresa"]=$this->empresa_model->obtenerDatos();
        $this->load->view("/administracion/headerCli",$data);
        $this->load->view("/vistaGeneral/index");
        $this->load->view("/administracion/footerCli");
    }
        public function socios() {
            $data['current_page'] = 'socios'; // Define la página actual
            $data["empresa"]=$this->empresa_model->obtenerDatos();
        $data["socios"]=$this->usuario_model->correosSocios();
        $this->load->view("/administracion/headerCli",$data);
        $this->load->view("/vistaGeneral/socios",$data);
        $this->load->view("/administracion/footerCli");
    }
        public function vehiculos() {
            $data['current_page'] = 'vehiculos'; // Define la página actual
            $data["empresa"]=$this->empresa_model->obtenerDatos();
        $data["vehiculo"]=$this->vehiculo_model->obtenerVehiculo();
        $this->load->view("/administracion/headerCli",$data);
        $this->load->view("/vistaGeneral/vehiculos",$data);
        $this->load->view("/administracion/footerCli");
    }
        public function choferes() {
            $data['current_page'] = 'choferes'; // Define la página actual
            $data["empresa"]=$this->empresa_model->obtenerDatos();
        $data["chofer"]=$this->chofer_model->obtenerDatos();
        $this->load->view("/administracion/headerCli",$data);
        $this->load->view("/vistaGeneral/choferes",$data);
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
   
//funcion para iniciar session 
public function iniciarSesion() {

    $correo = $this->input->post('correo');
    $contrasenia = $this->input->post('contrasenia');
    //  print_r($correo." " .$contrasenia);
    $usuarioConectado = $this->usuario_model->obtenerPorEmailPassword($correo,$contrasenia);
    if ($usuarioConectado) {

        echo'esta correcto';
        $this->session->set_userdata("conectado",$usuarioConectado);
        $this->session->set_flashdata("bienvenida","Hola Sr/a." ."<b>".$usuarioConectado->nombres." ".$usuarioConectado->apellidos." querido ".$usuarioConectado->perfil );
        redirect('Welcome/index');
        } else {
            
            $this->session->set_flashdata("error","El usuario o contraseña estan incorrectas porfavor intente otra ves." );
       
   
        redirect('vista_general/login');
    }
}

public function cerrarSession(){
    $this->session->sess_destroy();
    redirect("vista_general/index");
}

public function recovery()
{
    $this->load->view("/usuarios/recovery");
}
public function frmRecuperarContra($id_usu)
{

    $data["correo"] = $this->usuario_model->obtenerRegistro($id_usu);

    // $this->load->view("/viws_cli/headerCli");
    $this->load->view("/usuarios/recuperarContra", $data);
    // $this->load->view("/viws_cli/footerCli");
}
}


?>