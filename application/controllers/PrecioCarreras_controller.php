<?php
class PrecioCarreras_controller extends CI_Controller
{
    public function __construct()
    {
      
        parent::__construct();
        $this->load->model("preciosCarreras_model");
        $this->load->library('form_validation');
    }

    public function reglasPrecioCarrera() {
        $this->form_validation->set_rules(
            'distancia_maxima',
            'Distancia Maxima',
            'required',
            array(
                'required' => 'Este campo es requerido.',
                'regex_match' => 'Por favor, ingrese un número válido.'
            )
        );
        $this->form_validation->set_rules(
            'distancia_minima',
            'Distancia Minima',
            'required',
            array(
                'required' => 'Este campo es requerido.',
                'regex_match' => 'Por favor, ingrese un número válido.'
            )
        );
        $this->form_validation->set_rules(
            'precio',
            'Precio',
            'required',
            array(
                'required' => 'Este campo es requerido.',
                'regex_match' => 'Por favor, ingrese un número válido.'
            )
        );
    }
    

    public function index()
    {
        if ($this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["precioCarrera"] = $this->preciosCarreras_model->obtenerTodosPrecios();
            $this->load->view("administracion/header");
            $this->load->view("peciosCarrera/index", $data);
            $this->load->view("administracion/footer");
        }
    }

    public function nuevo()
    {
        if ($this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $this->load->view("administracion/header");
            $this->load->view("peciosCarrera/nuevo");
            $this->load->view("administracion/footer");
        }
    }

    public function editar($id_precio_carrera)
    {
        if ($this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["pCeditar"]=$this->preciosCarreras_model->obtenerRegistro($id_precio_carrera);
            $this->load->view("administracion/header");
            $this->load->view("peciosCarrera/editar",$data);
            $this->load->view("administracion/footer");
        }
    }

    public function guardar() {
        $this->reglasPrecioCarrera();
        if ($this->form_validation->run() == FALSE) {
            // Volver a cargar la vista de nuevo si hay errores
            $this->nuevo();
        } else {
            $datos = array(
                "distancia_minima" => $this->input->post("distancia_minima"),
                "distancia_maxima" => $this->input->post("distancia_maxima"),
                "precio" => $this->input->post("precio"),
                "descripcion" => $this->input->post("descripcion"),
            ); 
            if($this->preciosCarreras_model->insertar($datos)){
                $this->session->set_flashdata('correcto', "Registro Creado");
            }else{
                $this->session->set_flashdata('error', "Error al insertar");
                
            }
            redirect("/PrecioCarreras_controller/index");
        }
    }
    public function actualizar() {
        $this->reglasPrecioCarrera();
        if ($this->form_validation->run() == FALSE) {
            // Volver a cargar la vista de nuevo si hay errores
            $this->nuevo();
        } else {
            $datos = array(
                "distancia_minima" => $this->input->post("distancia_minima"),
                "distancia_maxima" => $this->input->post("distancia_maxima"),
                "precio" => $this->input->post("precio"),
                "descripcion" => $this->input->post("descripcion"),
            ); 
            $id_precio_carrera =$this->input->post("id_precio_carrera");
            if($this->preciosCarreras_model->procesoActu($id_precio_carrera,$datos)){
                $this->session->set_flashdata('correcto', "Registro Editado");
            }else{
                $this->session->set_flashdata('error', "Error al Editar");
                
            }
            redirect("/PrecioCarreras_controller/index");
        }
    }
    public function eliminar($id_precio_carrera)
    {
        if ($this->preciosCarreras_model->borrar($id_precio_carrera)) {
            $this->session->set_flashdata('eliminar', "Registro eliminado");
        } else {
            echo "ocurrio un error";
        }
        redirect("/PrecioCarreras_controller/index");
    }
}
