<?php
date_default_timezone_set('America/Guayaquil');
?>

<?php
class veh_cho_controller extends CI_Controller
{

    public function __construct()
    { 
        parent::__construct();      
        $this->load->library('session');
        if (!$this->session->userdata('conectado')) {
            redirect('/vista_general/login'); 
        }
        $this->load->model("chofer_model");
        $this->load->model("vehiculo_model");
        $this->load->model("veh_cho_model");
        $this->load->library("form_validation");
        // $this->load->helper("/vehiculo_helper/reglas_vehiculo_helper");
    }
    public function index()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
            // ||$this->session->userdata("conectado")->perfil == "SOCIO"
        ) {
            $data["veh_cho"] = $this->veh_cho_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("veh_cho/index", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function nuevo()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
            // ||$this->session->userdata("conectado")->perfil == "SOCIO"
        ) {
            $data["veh_cho"] = $this->veh_cho_model->obtenerDatos();
            $data["dueño"] = $this->veh_cho_model->obtener_vehiculo_no_registrado();
            $data["chofer"] = $this->veh_cho_model->obtener_chofer();
            $this->load->view("administracion/header");
            $this->load->view("veh_cho/nuevo", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function editar($id_veh_cho)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
            // ||$this->session->userdata("conectado")->perfil == "SOCIO"
        ) {
            $data["veh_cho_editar"] = $this->veh_cho_model->obtenerRegistro($id_veh_cho);
            $data["dueño"] = $this->veh_cho_model->obtener_vehiculo_no_registrado();
            $data["chofer"] = $this->veh_cho_model->obtener_chofer();
            $this->load->view("administracion/header");
            $this->load->view("veh_cho/editar", $data);
            $this->load->view("administracion/footer");
        }
    }

    public function validacion() {
        // Validación para la fecha de inicio
        $this->form_validation->set_rules(
            'fecha_inicio',
            'Fecha Inicio',
            'required|callback_fecha_inicio_check', // Callback para verificar la fecha de inicio
            array(
                'required' => 'Este campo es requerido.',
            )
        );
    
        // Validación para la fecha de fin
        $this->form_validation->set_rules(
            'fecha_fin',
            'Fecha Fin',
            'required|callback_fecha_fin_check', // Callback para verificar la fecha de fin
            array(
                'required' => 'Este campo es requerido.',
            )
        );
    
        // Validación para el vehículo
        $this->form_validation->set_rules(
            'fk_vc_veh',
            'Vehículo',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
    
        // Validación para el chofer
        $this->form_validation->set_rules(
            'fk_vc_cho',
            'Chofer',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
    }
    
    // Callback para verificar que la fecha de inicio no sea anterior a la actual
    public function fecha_inicio_check($fecha_inicio) {
        $fecha_actual = date('Y-m-d');
        if ($fecha_inicio < $fecha_actual) {
            $this->form_validation->set_message('fecha_inicio_check', 'La fecha de inicio no puede ser anterior a la fecha actual.');
            return FALSE;
        }
        return TRUE;
    }
    
    // Callback para verificar que la fecha de fin no sea la misma que la fecha de inicio
    public function fecha_fin_check($fecha_fin) {
        $fecha_inicio = $this->input->post('fecha_inicio');
        if ($fecha_fin == $fecha_inicio) {
            $this->form_validation->set_message('fecha_fin_check', 'La fecha de fin no puede ser la misma que la fecha de inicio.');
            return FALSE;
        }
        return TRUE;
    }
    
    public function guardar(){
        $datos=array(
            "fecha_inicio"=> $this->input->post("fecha_inicio"),
            "fecha_fin"=> $this->input->post("fecha_fin"),
            "fk_vc_veh"=> $this->input->post("fk_vc_veh"),
            "fk_vc_cho"=> $this->input->post("fk_vc_cho"),
            "estatus_veh_cho"=> $this->input->post("estatus_veh_cho"),

        );
        $this->validacion();
        if($this->form_validation->run() == FALSE){
            $this->nuevo();
        }else{
            if ($this->veh_cho_model->insertar($datos)) {
                $this->session->set_flashdata('correcto', "Registro Creado");
            } else {
                $this->session->set_flashdata("eliminar", "algo salio mal intente otra ves.");
      
            }
            redirect("veh_cho_controller/index");

        }

    }
    public function Actualizar(){
        $datos=array(
            "fecha_inicio"=> $this->input->post("fecha_inicio"),
            "fecha_fin"=> $this->input->post("fecha_fin"),
            "fk_vc_veh"=> $this->input->post("fk_vc_veh"),
            "fk_vc_cho"=> $this->input->post("fk_vc_cho"),
            "estatus_veh_cho"=> $this->input->post("estatus_veh_cho"),

        );
        $id_veh_cho = $this->input->post("id_veh_cho");
        $this->validacion();
        if($this->form_validation->run() == FALSE){
            $this->editar($id_veh_cho);
        }else{
            if ($this->veh_cho_model->procesoActu($id_veh_cho,$datos)) {
                $this->session->set_flashdata("actualizar", "Registro Actualizado correctamente.");
            } else {
                $this->session->set_flashdata("eliminar", "algo salio mal intente otra ves.");
      
            }
            redirect("veh_cho_controller/index");

        }

    }
    public function eliminar($id_veh_cho){
        if ($this->veh_cho_model->borrar($id_veh_cho)) {
            $this->session->set_flashdata('eliminar', "Registro eliminado");
        } else {
            echo "ocurrio un error";
        }
        redirect("/veh_cho_controller/index");
    }
}