<?php
class carerras_encomiendas_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("carreras_encomiendas_model");
        $this->load->model("vehiculo_model");
        $this->load->library("form_validation");
        $this->load->library('pagination');
    }

    public function nuevaEncomienda($id_car)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE" ||
            $this->session->userdata("conectado")->perfil == "SOCIO" ||
            $this->session->userdata("conectado")->perfil == "CLIENTE"
        ) {
            $data["id_usu"] = $this->session->userdata("conectado")->id_usu;
            $data["id_card"] = $id_car;
            $this->load->view("administracion/header");
            $this->load->view("car_enc/nuevaEncomienda", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function editarEncomienda($id_car)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE" ||
            $this->session->userdata("conectado")->perfil == "SOCIO" ||
            $this->session->userdata("conectado")->perfil == "CLIENTE"
        ) {
            $data["carrera"]= $this->carreras_encomiendas_model->obtenerRegistro($id_car);
            $data["vehiculo"]= $this->vehiculo_model->obtenerDatos();
            $data["id_usu"] = $this->session->userdata("conectado")->id_usu;
            $data["id_card"] = $id_car;
            $this->load->view("administracion/header");
            $this->load->view("car_enc/editarEncomienda", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function reporteEncomiendas($id_usu)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE" ||
            $this->session->userdata("conectado")->perfil == "SOCIO" ||
            $this->session->userdata("conectado")->perfil == "CLIENTE"
        ) {
            $data['fecha_actual'] = date("Y-m-d");
            $data['hora_actual'] = date("H:i:s");
            $data["carreras"] = $this->carreras_encomiendas_model->obtenerMisCarreras($id_usu);

            $this->load->view("administracion/header");
            $this->load->view("car_enc/reporteEncomiendas", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function reglasValidacion()
    {
        $this->form_validation->set_rules(
            'fecha_carrera',
            'Fecha inicio',
            'required',
            array(
                'required' => 'Este campo es requerido.',

            )
        );
        $this->form_validation->set_rules(
            'hora_carrera',
            'Hora inicio',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
        $this->form_validation->set_rules(
            'latitud_carrera',
            'Ubicacion inicial',
            'required',
            array(
                'required' => 'Debe escojer la ubicacion inicial obligatoriamente.',
            )
        );
        $this->form_validation->set_rules(
            'longitud_carrera',
            'Ubicacion inicial',
            'required',
            array(
                'required' => 'Debe escojer la ubicacion inicial obligatoriamente.',
            )
        );
        $this->form_validation->set_rules(
            'latitud_entrega',
            'Ubicacion inicial',
            'required',
            array(
                'required' => 'Debe escojer la ubicacion final obligatoriamente.',
            )
        );
        $this->form_validation->set_rules(
            'longitud_entrega',
            'Ubicacion inicial',
            'required',
            array(
                'required' => 'Debe escojer la ubicacion final obligatoriamente.',
            )
        );
        $this->form_validation->set_rules(
            'fecha_entrega',
            'Fecha de entrega',
            'required',
            array(
                'required' => 'Debe ingresar la fecha de entrega obligatoriamente.',
            )
        );
        $this->form_validation->set_rules(
            'hora_entrega',
            'Hora de entrega',
            'required',
            array(
                'required' => 'Debe ingresar la hora de la entrega obligatoriamente.',
            )
        );
        $this->form_validation->set_rules(
            'descripcion_encomienda',
            'Desripcion de la entrega',
            'required',
            array(
                'required' => 'Debe ingresar la descripcion de la encomienda obligatoriamente.',
            )
        );
    }
    public function guardar()
    {
        try {
            $data = array(
                "fecha_carrera" => $this->input->post("fecha_carrera"),
                "hora_carrera" => $this->input->post("hora_carrera"),
                "fk_car_usu" => $this->input->post("fk_car_usu"),
                "fk_car_veh" => $this->input->post("fk_car_veh"),
                "latitud_carrera" => $this->input->post("latitud_carrera"),
                "longitud_carrera" => $this->input->post("longitud_carrera"),
                "latitud_entrega" => $this->input->post("latitud_entrega"),
                "longitud_entrega" => $this->input->post("longitud_entrega"),
                "tipo_ce" => $this->input->post("tipo_ce"),
                "estadoCarrera" => $this->input->post("estadoCarrera"),
                "fecha_entrega" => $this->input->post("fecha_entrega"),
                "hora_entrega" => $this->input->post("hora_entrega"),
                "descripcion_encomienda" => $this->input->post("descripcion_encomienda"),

            );
            // print_r($data);
            $this->reglasValidacion();
            if ($this->form_validation->run() == false) {
                $id_car = $this->input->post("fk_car_veh");
                $this->nuevaEncomienda($id_car);
            } else {
                $id_usu = $this->input->post("fk_car_usu");
                if ($this->carreras_encomiendas_model->insertar($data)) {
                    $this->session->set_flashdata('correcto', "Se registro su carrera");
                } else {
                    echo "hubo un error !!";
                }
                redirect("carerras_encomiendas_controller/reporteEncomiendas/$id_usu");
            }
        } catch (\Throwable $th) {
            echo "el correo ya esta registrado.";
        }
    }
    public function Actualizar()
    {
        try {
            $data = array(
                "fecha_carrera" => $this->input->post("fecha_carrera"),
                "hora_carrera" => $this->input->post("hora_carrera"),
                "fk_car_usu" => $this->input->post("fk_car_usu"),
                "fk_car_veh" => $this->input->post("fk_car_veh"),
                "latitud_carrera" => $this->input->post("latitud_carrera"),
                "longitud_carrera" => $this->input->post("longitud_carrera"),
                "latitud_entrega" => $this->input->post("latitud_entrega"),
                "longitud_entrega" => $this->input->post("longitud_entrega"),
                "tipo_ce" => $this->input->post("tipo_ce"),
                "estadoCarrera" => $this->input->post("estadoCarrera"),
                "fecha_entrega" => $this->input->post("fecha_entrega"),
                "hora_entrega" => $this->input->post("hora_entrega"),
                "descripcion_encomienda" => $this->input->post("descripcion_encomienda"),

            );
            // print_r($data);
            $id_car = $this->input->post("id_car");
            $this->reglasValidacion();
            if ($this->form_validation->run() == false) {
                $id_car = $this->input->post("fk_car_veh");
                $this->nuevaEncomienda($id_car);
            } else {
                $id_usu = $this->input->post("fk_car_usu");
                if ($this->carreras_encomiendas_model->procesoActu($id_car,$data)) {
                    $this->session->set_flashdata('actualizar', "Se actualizo su Encomienda ");
                } else {
                    echo "hubo un error !!";
                }
                redirect("carerras_encomiendas_controller/reporteEncomiendas/$id_usu");
            }
        } catch (\Throwable $th) {
            echo "el correo ya esta registrado.";
        }
    }
    public function cancelar($id_car)
    {
        $id_usu =  $this->session->userdata("conectado")->id_usu;
        $nuevoStatusCarrera = "CANCELADO";
        if($this->carreras_encomiendas_model->cancelar($nuevoStatusCarrera,$id_car)){
            $this->session->set_flashdata('actualizar', "Se cancelo la encomienda correctamente");
        }else{
            $this->session->set_flashdata('error', "Algo salio mal");

        }
        redirect("carerras_encomiendas_controller/reporteEncomiendas/$id_usu");
    }


    ///CARRERAS
    public function reglasValidacionCarrera()
    {
    
        $this->form_validation->set_rules(
            'fk_car_veh',
            'taxista',
            'required',
            array(
                'required' => 'Debe escojer un taxista para el servicio.',
            )
        );
       
      
        $this->form_validation->set_rules(
            'latitud_entrega',
            'Ubicacion inicial',
            'required',
            array(
                'required' => 'Debe escojer la ubicacion final obligatoriamente.',
            )
        );
        $this->form_validation->set_rules(
            'longitud_entrega',
            'Ubicacion inicial',
            'required',
            array(
                'required' => 'Debe escojer la ubicacion final obligatoriamente.',
            )
        );
       
       
      
    }
    public function guardarCarrera()
    {
        try {
            $data = array(
                "fecha_carrera" => $this->input->post("fecha_carrera"),
                "hora_carrera" => $this->input->post("hora_carrera"),
                "fk_car_usu" => $this->input->post("fk_car_usu"),
                "fk_car_veh" => $this->input->post("fk_car_veh"),
                "latitud_carrera" => $this->input->post("latitud_carrera"),
                "longitud_carrera" => $this->input->post("longitud_carrera"),
                "latitud_entrega" => $this->input->post("latitud_entrega"),
                "longitud_entrega" => $this->input->post("longitud_entrega"),
                "tipo_ce" => $this->input->post("tipo_ce"),
                "estadoCarrera" => $this->input->post("estadoCarrera"),

            );
             print_r($data);
            $this->reglasValidacionCarrera();
            if ($this->form_validation->run() == false) {
            
                redirect("/Ubicacion_vehiculo_controller/index");
            } else {
                $id_usu = $this->input->post("fk_car_usu");
                if ($this->carreras_encomiendas_model->insertar($data)) {
                    $this->session->set_flashdata('correcto', "Se registro su carrera");
                } else {
                    echo "hubo un error !!";
                }
                redirect("carerras_encomiendas_controller/reporteEncomiendas/$id_usu");
            }
        } catch (\Throwable $th) {
            echo "el correo ya esta registrado.";
        }
    }
}
