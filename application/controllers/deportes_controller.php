<?php
class deportes_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('conectado')) {
            redirect('/vista_general/login');
        }
        $this->load->model("empresa_model");
        $this->load->model("deporte_model");
        $this->load->library("form_validation");
    }
    public function index()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["deporte"] = $this->deporte_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("deporte/index", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function nuevoDeporte()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["empresa"] = $this->empresa_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("deporte/nuevo", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function editarDeporte($id_dep)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["empresa"] = $this->empresa_model->obtenerDatos();
            $data["deporte"] = $this->deporte_model->obtenerRegistro($id_dep);
            $this->load->view("administracion/header");
            $this->load->view("deporte/editar", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function reglasValidacion()
    {
        $this->form_validation->set_rules(
            'lugar_dep',
            'Ligar',
            'required',
            array(
                'required' => 'Este campo es requerido.',

            )
        );
        $this->form_validation->set_rules(
            'fecha_dep',
            'Fecha',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
        $this->form_validation->set_rules(
            'hora_dep',
            'Hora',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
    }
    public function guardarDeporte()
    {
        try {
            $data = array(
                "lugar_dep" => $this->input->post("lugar_dep"),
                "fk_dep_emp" => $this->input->post("fk_dep_emp"),
                "fecha_dep" => $this->input->post("fecha_dep"),
                "hora_dep" => $this->input->post("hora_dep"),
            );
            $this->reglasValidacion();

            if ($this->form_validation->run() == false) {
                $this->nuevoDeporte();
            } else {
                if ($this->deporte_model->insertar($data)) {
                    $this->session->set_flashdata('correcto', "Registro Creado");
                } else {
                    echo "hubo un error !!";
                }
                redirect("deportes_controller/index");
            }
        } catch (\Throwable $th) {
            echo "el correo ya esta registrado.";
        }
    }
    public function eliminarDeporte($id_dep)
    {
        if ($this->deporte_model->borrar($id_dep)) {
            $this->session->set_flashdata('eliminar', "Registro eliminado");
        } else {
            echo "ocurrio un error";
        }
        redirect("deportes_controller/index");
    }
    public function ActualizarDeporte()
    {
        try {
            $data = array(
                "lugar_dep" => $this->input->post("lugar_dep"),
                "fk_dep_emp" => $this->input->post("fk_dep_emp"),
                "fecha_dep" => $this->input->post("fecha_dep"),
                "hora_dep" => $this->input->post("hora_dep"),
            );
            $id_dep = $this->input->post("id_dep");
            $this->reglasValidacion();

            if ($this->form_validation->run() == false) {
                $this->editarDeporte($id_dep);
            } else {
                if ($this->deporte_model->procesoActu($id_dep, $data)) {
                    $this->session->set_flashdata('actualizar', "Registro Actualizado");
                } else {
                    echo "hubo un error !!";
                }
                redirect("deportes_controller/index");
            }
        } catch (\Throwable $th) {
            echo "el correo ya esta registrado.";
        }
    }
    public function deporte()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE" ||
            $this->session->userdata("conectado")->perfil == "SOCIO"
        ) {
            $data["deporte"] = $this->deporte_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("deporte/deporte", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function obtenerEventos() {
        
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE" ||
            $this->session->userdata("conectado")->perfil == "SOCIO"
        ) {
            $datos = $this->deporte_model->obtenerDatos();
    
            if ($datos) {
                echo json_encode($datos);
            } else {
                echo json_encode([]);
            }
        } else {
            
            echo json_encode(['error' => 'Acceso no autorizado']);
        }
    }
}
