<?php
class empresas_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("empresa_model");
        // $this->load->model("empresa_model");
    }
    public function index()
    {
        
        $data["emp"] = $this->empresa_model->obtenerDatos();
        $this->load->view("administracion/header");
            $this->load->view("empresa/index", $data);
            $this->load->view("administracion/footer");
        
    }
    public function editarEmp($id_emp)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) { 
        $data["emp"] = $this->empresa_model->obtenerEmpresa($id_emp);
        $this->load->view("administracion/header");
            $this->load->view("empresa/editar", $data);
            $this->load->view("administracion/footer");
        }
        
    }
    public function ActualizarDatos()
    {
        $nuevosDatosEmp = array(
            "nombre" => $this->input->post("nombre"),
            "ruc" => $this->input->post("ruc"),
            "direccion_emp" => $this->input->post("direccion_emp"),
            "descripcion" => $this->input->post("descripcion"),
            "facebook_emp" => $this->input->post("facebook_emp"),
            "correo_emp" => $this->input->post("correo_emp"),
            "mision" => $this->input->post("mision"),
            "vision" => $this->input->post("vision"),
            // "logo_emp" => $this->input->post("logo_emp"),
        );
        $id_emp = $this->input->post("id_emp");
        $empresa = $this->empresa_model->obtenerEmpresa($id_emp);
        //foto
        $this->load->library("upload");
        $new_name = "new_logo" . time() . "_" . rand(1, 5000);
        $config['file_name'] = $new_name . '_1';
        $config['upload_path'] = FCPATH . 'uploads/empresa/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 1024 * 5;
        $this->upload->initialize($config);

        if ($this->upload->do_upload("logo_emp")) {
            $dataSubida = $this->upload->data();
            $nuevosDatosEmp["logo_emp"] = $dataSubida['file_name'];

            $ruta_fotoAntigua = 'uploads/empresa/' . $empresa->logo_emp;
            echo ($ruta_fotoAntigua);
            if (file_exists($ruta_fotoAntigua)) {
                unlink($ruta_fotoAntigua);
            } else {
                echo "no hay";
            }
        }

        if ($this->empresa_model->actualizar($id_emp, $nuevosDatosEmp)) {
            $this->session->set_flashdata("actualizar", "Registro Actualizado correctamente.");
            redirect("/empresas_controller/index");
        } else {
            echo "error al actualizar";
            $this->session->set_flashdata("eliminar", "error algo salio mal al actualizar.");
        }
    }
   
}
