<?php
class vehiculos_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("usuario_model");
        $this->load->model("vehiculo_model");
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
        ) {
            $data["vehiculo"] = $this->vehiculo_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("vehiculo/index", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function nuevovehiculo()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["usuario"] = $this->vehiculo_model->obtener_usuarios_sin_vehiculo();
            $data["unidad"] = $this->vehiculo_model->obtener_unidad_con_numero();
            $this->load->view("administracion/header");
            $this->load->view("vehiculo/nuevo", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function editarVehiculo($id_veh)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["usuario"] = $this->vehiculo_model->obtener_usuarios_sin_vehiculo();
            $data["usuarioEditar"] = $this->vehiculo_model->obtenerRegistro($id_veh);
            $this->load->view("administracion/header");
            $this->load->view("vehiculo/editar", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function editarVehiculoPersonal($id_veh)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"||
            $this->session->userdata("conectado")->perfil == "SOCIO"
        ) {
            // $data["usuario"] = $this->vehiculo_model->obtener_usuarios_sin_vehiculo();
            $data["usuarioEditar"] = $this->vehiculo_model->obtenerRegistro($id_veh);
            $this->load->view("administracion/header");
            $this->load->view("vehiculo/editarPersonal", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function reporteVehiculos()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE" ||
            $this->session->userdata("conectado")->perfil == "SOCIO"||
            $this->session->userdata("conectado")->perfil == "CLIENTE"
        ) {
            $data["vehUsuario"] = $this->vehiculo_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("vehiculo/reporteVehiculos", $data);
            $this->load->view("administracion/footer");
        }
    }
 
        public function reglasValidacion(){
            $this->form_validation->set_rules(
                'numero',
                'Numero',
                'required|is_unique[vehiculos.numero]',
                array(
                    'required' => 'Este campo es requerido.',
                    'is_unique' => 'El numero ya esta registrado en la base de datos.'
                ));
            $this->form_validation->set_rules(
                'marca_veh',
                'Marca',
                'required',
                array(
                    'required' => 'Este campo es requerido.',
                ));
            $this->form_validation->set_rules(
                'anio_veh',
                'Año Fabricacion',
                'required',
                array(
                    'required' => 'Este campo es requerido.',
                ));
            $this->form_validation->set_rules(
                'modelo_veh',
                'Modelo',
                'required',
                array(
                    'required' => 'Este campo es requerido.',
                ));
            $this->form_validation->set_rules(
                'status_veh',
                'Status',
                'required',
                array(
                    'required' => 'Este campo es requerido.',
                ));
            $this->form_validation->set_rules(
                'fk_veh_usu',
                'Propietario',
                'required',
                array(
                    'required' => 'Este campo es requerido.',
                ));
                $this->form_validation->set_rules(
                    'placa_veh',
                    'Placa',
                    'required|regex_match[/^[A-Z]{3}-\d{3}$/]|is_unique[vehiculos.placa_veh]',
                    array(
                        'required' => 'Este campo es requerido.',
                        'regex_match' => 'La placa debe tener el formato AAA-123.',
                        'is_unique' => 'La paca ingresada ya esta registrada.'
                    )
                );
                
        }

     
    public function guardarVeiculo()
    {
        try {
            $data = array(
                "placa_veh" => $this->input->post("placa_veh"),
                "marca_veh" => $this->input->post("marca_veh"),
                "anio_veh" => $this->input->post("anio_veh"),
                "modelo_veh" => $this->input->post("modelo_veh"),
                "status_veh" => $this->input->post("status_veh"),
                "fk_veh_usu" => $this->input->post("fk_veh_usu"),
                "numero" => $this->input->post("numero"),
                // "foto" => $this->input->post("foto"),

            );
           $this->reglasValidacion();

            if ($this->form_validation->run() == false) {
            $this->nuevovehiculo();
            } else {
                $this->load->library("upload");
                $new_name = "foto_Auto" . time() . "_" . rand(1, 5000);
                $config['file_name'] = $new_name . '_1';
                $config['upload_path'] = FCPATH . 'uploads/vehiculos';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 1024 * 5;
                $this->upload->initialize($config);

                if ($this->upload->do_upload("foto_veh")) {
                    $dataSubida = $this->upload->data();
                    $data["foto_veh"] = $dataSubida['file_name'];
                    // print_r($data["foto"]);

                }
                if ($this->vehiculo_model->insertar($data)) {
                    $this->session->set_flashdata('correcto', "Registro Creado");
                } else {
                    echo "hubo un error !!";
                }
                redirect("vehiculos_controller/index");
            }
            // redirect("vehiculos_controller/nuevovehiculo");
            //  print_r($data);

        } catch (\Throwable $th) {
        }
    }

    public function eliminarVehiculo($id_veh)
    {
        if ($this->vehiculo_model->borrar($id_veh)) {
            $this->session->set_flashdata('eliminar', "Registro eliminado");
        } else {
            echo "ocurrio un error";
        }
        redirect("vehiculos_controller/index");
    }
    public function actualizar()
    {
        $data = array(
            "placa_veh" => $this->input->post("placa_veh"),
            "marca_veh" => $this->input->post("marca_veh"),
            "anio_veh" => $this->input->post("anio_veh"),
            "modelo_veh" => $this->input->post("modelo_veh"),
            "status_veh" => $this->input->post("status_veh"),
            "fk_veh_usu" => $this->input->post("fk_veh_usu"),
        );

        $id_veh = $this->input->post("id_veh");
        $vehiculo = $this->vehiculo_model->obtenerRegistro($id_veh);
        //foto
        $this->load->library("upload");
        $new_name = "new_vehiculo" . time() . "_" . rand(1, 5000);
        $config['file_name'] = $new_name . '_1';
        $config['upload_path'] = FCPATH . 'uploads/vehiculos/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 1024 * 5;
        $this->upload->initialize($config);

        if ($this->upload->do_upload("foto_veh")) {
            $dataSubida = $this->upload->data();
            $data["foto_veh"] = $dataSubida['file_name'];

            $ruta_fotoAntigua = 'uploads/vehiculos/' . $vehiculo->foto_veh;
            echo ($ruta_fotoAntigua);
            if (file_exists($ruta_fotoAntigua)) {
                unlink($ruta_fotoAntigua);
            } else {
                echo "no hay";
            }
        }
        if ($this->vehiculo_model->procesoActu($id_veh, $data)) {
            $this->session->set_flashdata("actualizar", "Registro Actualizado correctamente.");
        } else {
            $this->session->set_flashdata("eliminar", "algo salio mal intente otra ves.");
            echo "no se pudo actualizar";
        }
        redirect("vehiculos_controller/index");
    }
}
