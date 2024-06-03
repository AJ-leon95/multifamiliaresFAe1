<?php
class reuniones_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("empresa_model");
        $this->load->model("reunion_model");
    }
    public function index()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["reuniones"] = $this->reunion_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("reunion/index", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function nuevoReunion()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["empresa"] = $this->empresa_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("reunion/nuevo", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function reuniones()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"||
            $this->session->userdata("conectado")->perfil == "SOCIO"
        ) {
            $data["reunion"] = $this->reunion_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("reunion/reuniones", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function editarReunion($id_reu)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["empresa"] = $this->empresa_model->obtenerDatos();
            $data["reunion"] = $this->reunion_model->obtenerRegistro($id_reu);
            $this->load->view("administracion/header");
            $this->load->view("reunion/editar", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function guardarReunion()
    {
        try {
            $data = array(
                "fk_reu_emp" => $this->input->post("fk_reu_emp"),
                "lugar_reu" => $this->input->post("lugar_reu"),
                "fecha_reu" => $this->input->post("fecha_reu"),
                "hora_reu" => $this->input->post("hora_reu"),
                "punto1" => $this->input->post("punto1"),
                "punto2" => $this->input->post("punto2"),
                "punto3" => $this->input->post("punto3"),
                "punto4" => $this->input->post("punto4"),
                "punto5" => $this->input->post("punto5"),
                "punto6" => $this->input->post("punto6"),
                "punto7" => $this->input->post("punto7"),
                "asunto_reu" => $this->input->post("asunto_reu"),
            );
            print_r($data);
            if ($this->reunion_model->insertar($data)) {
                $this->session->set_flashdata('correcto', "Registro Creado");
            } else {
                echo "hubo un error !!";
            }
            redirect("reuniones_controller/index");
        } catch (\Throwable $th) {
            echo "el correo ya esta registrado.";
        }
    }
    public function eliminarReunion($id_reu)
    {
        if ($this->reunion_model->borrar($id_reu)) {
            $this->session->set_flashdata('eliminar', "Registro eliminado");
        } else {
            echo "ocurrio un error";
        }
        redirect("reuniones_controller/index");
    }
    public function actualizarReunion()
    {
        $data = array(
            "fk_reu_emp" => $this->input->post("fk_reu_emp"),
            "lugar_reu" => $this->input->post("lugar_reu"),
            "fecha_reu" => $this->input->post("fecha_reu"),
            "hora_reu" => $this->input->post("hora_reu"),
            "punto1" => $this->input->post("punto1"),
            "punto2" => $this->input->post("punto2"),
            "punto3" => $this->input->post("punto3"),
            "punto4" => $this->input->post("punto4"),
            "punto5" => $this->input->post("punto5"),
            "punto6" => $this->input->post("punto6"),
            "punto7" => $this->input->post("punto7"),
            "asunto_reu" => $this->input->post("asunto_reu"),
        );
        $id_reu = $this->input->post("id_reu"); 
        // print_r($id_not);
        if ($this->reunion_model->procesoActu($id_reu, $data)) {
            $this->session->set_flashdata("actualizar", "Registro Actualizado correctamente.");
        } else {
            $this->session->set_flashdata("eliminar", "algo salio mal intente otra ves.");
            echo "no se pudo actualizar";
        }
        redirect("reuniones_controller/index");
    }
}
