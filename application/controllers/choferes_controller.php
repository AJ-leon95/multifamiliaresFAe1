<?php
class choferes_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();      
        $this->load->library('session');
        if (!$this->session->userdata('conectado')) {
            redirect('/vista_general/login'); 
        }
        
        $this->load->model("chofer_model");
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
            $data["choferes"] = $this->chofer_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("choferes/index", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function nuevoChofer()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {

            $this->load->view("administracion/header");
            $this->load->view("choferes/nuevo");
            $this->load->view("administracion/footer");
        }
    }
    public function editarChofer($id_cho)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["editarChofer"]=$this->chofer_model->obtenerRegistro($id_cho);
            $this->load->view("administracion/header");
            $this->load->view("choferes/editar",$data);
            $this->load->view("administracion/footer");
        }
    }
    public function reglasValidacionEditar()
    {
        
      
        $this->form_validation->set_rules(
            'nombres_cho',
            'Nombres',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
        $this->form_validation->set_rules(
            'apellidos_cho',
            'Apellidos',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
    
        
        $this->form_validation->set_rules(
            'telefono_cho',
            'Telefono',
            'required|numeric|regex_match[/^[0-9]{10}$/]',
            array(
                'required' => 'Este campo es requerido.',
                'numeric' => 'El campo Teléfono debe contener solo números.',
                'regex_match' => 'El campo Teléfono debe tener exactamente 10 dígitos.',
            )
        );
    }
    public function reglasValidacion()
    {
        
       
        $this->form_validation->set_rules(
            'nombres_cho',
            'Nombres',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
        $this->form_validation->set_rules(
            'apellidos_cho',
            'Apellidos',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
      
        
        $this->form_validation->set_rules(
            'telefono_cho',
            'Telefono',
            'required|numeric|regex_match[/^[0-9]{10}$/]|is_unique[usuarios.telefono]|is_unique[chofer.telefono_cho]',//|is_unique[usuarios.telefono]|is_unique[chofer.telefono_cho]
            array(
                'required' => 'Este campo es requerido.',
                'numeric' => 'El campo Teléfono debe contener solo números.',
                'regex_match' => 'El campo Teléfono debe tener exactamente 10 dígitos.',
                'is_unique' => 'El numero de telefono ya esta registrado con aterioridad.'
            )
        );
    }

    public function guardarChofer()
    {
        try {
            $data = array(
                "nombres_cho" => $this->input->post("nombres_cho"),
                "apellidos_cho" => $this->input->post("apellidos_cho"),
                "cedula_cho" => $this->input->post("cedula_cho"),
                "correo_cho" => $this->input->post("correo_cho"),
                "contrasenia_cho" => $this->input->post("contrasenia_cho"),
                "telefono_cho" => $this->input->post("telefono_cho"),
                "direccion_cho" => $this->input->post("direccion_cho"),
                "experiencia_cho" => $this->input->post("experiencia_cho"),
                "estado_cho" => $this->input->post("estado_cho"),
                // "foto"=> $this->input->post("foto"),
            );


            $this->reglasValidacion();

            if ($this->form_validation->run() == false) {

                $this->nuevoChofer();
                
            } else {
                $this->load->library("upload");
                $new_name = "foto_chofer" . time() . "_" . rand(1, 5000);
                $config['file_name'] = $new_name . '_1';
                $config['upload_path'] = FCPATH . 'uploads/chofer';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 1024 * 5;
                $this->upload->initialize($config);

                if ($this->upload->do_upload("foto_cho")) {
                    $dataSubida = $this->upload->data();
                    $data["foto_cho"] = $dataSubida['file_name'];
                }
                if ($this->chofer_model->insertar($data)) {
                    $this->session->set_flashdata('correcto', "Registro Creado");
                } else {
                    echo "hubo un error !!";
                }
                redirect("choferes_controller/index");
             
            }
        } catch (\Throwable $th) {
            echo "el correo ya esta registrado.";
        }
    }

    public function actualizar()
    {
        $data = array(
            "nombres_cho" => $this->input->post("nombres_cho"),
            "apellidos_cho" => $this->input->post("apellidos_cho"),
            "cedula_cho" => $this->input->post("cedula_cho"),
            "correo_cho" => $this->input->post("correo_cho"),
            "contrasenia_cho" => $this->input->post("contrasenia_cho"),
            "telefono_cho" => $this->input->post("telefono_cho"),
            "direccion_cho" => $this->input->post("direccion_cho"),
            "experiencia_cho" => $this->input->post("experiencia_cho"),
            "estado_cho" => $this->input->post("estado_cho"),
            // "foto"=> $this->input->post("foto"),
        );
        $this->reglasValidacionEditar();
        if ($this->form_validation->run() == false) {

            $this->nuevoChofer();
            
        } else {
            $id_cho = $this->input->post("id_cho");
            $chofer = $this->chofer_model->obtenerRegistro($id_cho);
            // print_r($data);
    
            //foto
            $this->load->library("upload");
            $new_name = "nueva_chofer" . time() . "_" . rand(1, 5000);
            $config['file_name'] = $new_name . '_1';
            $config['upload_path'] = FCPATH . 'uploads/chofer/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 1024 * 5;
            $this->upload->initialize($config);
    
            if ($this->upload->do_upload("foto_cho")) {
                $dataSubida = $this->upload->data();
                $data["foto_cho"] = $dataSubida['file_name'];
    
                $ruta_fotoAntigua = 'uploads/chofer/' . $chofer->foto_cho;
                echo ($ruta_fotoAntigua);
                if (file_exists($ruta_fotoAntigua)) {
                    unlink($ruta_fotoAntigua);
                } else {
    
                    echo "no hay";
                }
            }
            if ($this->chofer_model->procesoActu($id_cho, $data)) {
                $this->session->set_flashdata("actualizar", "Registro Actualizado correctamente.");
            } else {
                $this->session->set_flashdata("eliminar", "algo salio mal intente otra ves.");
                echo "no se pudo actualizar";
            }
            redirect("choferes_controller/index");
        }
    }
    public function eliminarChofer($id_cho)
    {

        $chofer = $this->chofer_model->obtenerRegistro($id_cho);
        $ruta = 'uploads/chofer/' . $chofer->foto_cho;
        // print_r($ruta);
        if (file_exists($ruta)) {
            if (unlink($ruta)) {
            }
        } else {
            echo "algo salio mal en la eliminacion de la foto";
        }
        if ($this->chofer_model->borrar($id_cho)) {
            $this->session->set_flashdata('eliminar', "Registro eliminado");
        } else {
            echo "ocurrio un error";
        }
        redirect("/choferes_controller/index");
    }

      
    
}
