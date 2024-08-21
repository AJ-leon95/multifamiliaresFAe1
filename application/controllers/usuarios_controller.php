e<?php
class usuarios_controller    extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();      
        $this->load->library('session');
        if (!$this->session->userdata('conectado')) {
            redirect('/vista_general/login'); 
        }
        $this->load->model("empresa_model");
        $this->load->model("usuario_model");
        $this->load->model("settings_model");
        $this->load->library('form_validation');
        // print_r($this->session->userdata("conectado"));
    
    }
    public function reglasValidacionCambiarContra()
    {
        $this->form_validation->set_rules(
            'contraActual',
            'Contraseña Actual',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
        $this->form_validation->set_rules(
            'primeraContra',
            'Nueva Contraseña',
            'required|min_length[8]|regex_match[/^(?=.*[0-9])(?=.*[A-Z])(?=.*[a-z])(?=.*[\W]).+$/]',
            array(
                'required' => 'Este campo es requerido.',
                'min_length' => 'La contraseña debe tener al menos 8 caracteres.',
                'regex_match' => 'La contraseña debe contener al menos un número, una letra mayúscula, una letra minúscula y un carácter especial.',
            )
        );
        $this->form_validation->set_rules(
            'segundaContra',
            'Confirmar Nueva Contraseña',
            'required|matches[primeraContra]',
            array(
                'required' => 'Este campo es requerido.',
                'matches' => 'Las contraseñas no coinciden.',
            )
        );
    }
    public function reglasValidacionUsuario()
    {
        $this->form_validation->set_rules(
            'nombres',
            'Nombres',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
        $this->form_validation->set_rules(
            'apellidos',
            'Apellidos',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
        $this->form_validation->set_rules(
            'cedula_usu',
            'Cédula',
            'required|numeric|exact_length[10]',
            array(
                'required' => 'Este campo es requerido.',
                'numeric' => 'La cédula debe contener solo números.',
                'exact_length' => 'La cédula debe tener exactamente 10 dígitos.'
            )
        );
        $this->form_validation->set_rules(
            'telefono',
            'Teléfono',
            'required|numeric|exact_length[10]',
            array(
                'required' => 'Este campo es requerido.',
                'numeric' => 'El teléfono debe contener solo números.',
                'exact_length' => 'El teléfono debe tener exactamente 10 dígitos.'
            )
        );
        $this->form_validation->set_rules(
            'correo',
            'Correo',
            'required|valid_email',
            array(
                'required' => 'Este campo es requerido.',
                'valid_email' => 'Debe ingresar un correo electrónico válido.'
            )
        );
        $this->form_validation->set_rules(
            'contrasenia',
            'Contraseña',
            'required|min_length[8]',
            array(
                'required' => 'Este campo es requerido.',
                'min_length' => 'La contraseña debe tener al menos 8 caracteres.'
            )
        );
        $this->form_validation->set_rules(
            'direccion',
            'Dirección',
            'required',
            array(
                'required' => 'Este campo es requerido.',
            )
        );
    }


   
    public function indexAdmin()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["dataUsu"] = $this->usuario_model->obtenerDatosUsu();
            $this->load->view("administracion/header");
            $this->load->view("usuarios/indexAdmin", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function indexCli()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["dataUsu"] = $this->usuario_model->obtenerDatosUsu();
            $this->load->view("administracion/header");
            $this->load->view("usuarios/indexCli", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function directivos()
    {

        $data["directivos"] = $this->usuario_model->obtenerDatosUsu();
        $this->load->view("administracion/header");
        $this->load->view("usuarios/directivos", $data);
        $this->load->view("administracion/footer");
    }
    public function perfil()
    {
        $user_id = $this->session->userdata('conectado')->id_usu;
        if ($user_id) {
        $data["perfil_ver"] = $this->usuario_model->obtenerRegistro($user_id);
        $this->load->view("administracion/header");
        $this->load->view("usuarios/perfil", $data);
        $this->load->view("administracion/footer");
        } else {
            redirect("/vista_general/login");
        }
    }
    public function editarPerfilPersonal()
    {
        $user_id = $this->session->userdata('conectado')->id_usu;

        if ($user_id) {

        $data["emp"] = $this->empresa_model->obtenerDatos();
        $data["datosEmpresa"] = $this->empresa_model->obtenerDatos();
        $data["usuario"] = $this->usuario_model->obtenerRegistro($user_id);
        $this->load->view("administracion/header");
        $this->load->view("usuarios/editarperfil", $data);
        $this->load->view("administracion/footer");
        } else {
            redirect("/vista_general/login");
        }
    }
    public function indexSocio()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["dataUsu"] = $this->usuario_model->obtenerDatosUsu();
            $this->load->view("administracion/header");
            $this->load->view("usuarios/indexSocio", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function nuevoAdmin()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["emp"] = $this->empresa_model->obtenerDatos();
            $data["datosEmpresa"] = $this->empresa_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("usuarios/nuevoAdmin", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function nuevoSocio()
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            $data["emp"] = $this->empresa_model->obtenerDatos();
            $data["datosEmpresa"] = $this->empresa_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("usuarios/nuevoSocio", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function editarUsuario($id_usu)
    {
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {

            $data["emp"] = $this->empresa_model->obtenerDatos();
            $data["datosEmpresa"] = $this->empresa_model->obtenerDatos();
            $data["usuario"] = $this->usuario_model->obtenerRegistro($id_usu);
            $this->load->view("administracion/header");
            $this->load->view("usuarios/editarAdmin", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function ActualizarDatos()
    {
        // Definir reglas de validación
        $this->reglasValidacionCambiarContra();

        // Verificar si la validación se ha realizado correctamente
        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, mostrar mensajes de error
            //$this->session->set_flashdata('eliminar', validation_errors());
            $id = $this->input->post('id_usu');
            $this->perfil($id);
        } else {
            // Si la validación pasa, proceder con la lógica actual
            $contraActual = $this->input->post('contraActual');
            $id = $this->input->post('id_usu');
            $usuario = $this->usuario_model->obtenerRegistro($id);

            if ($contraActual == $usuario->contrasenia) {
                $contra1 = $this->input->post('primeraContra');
                $contra2 = $this->input->post('segundaContra');

                if ($contra1 == $contra2) {
                    $contra = $this->input->post('segundaContra');

                    if ($this->settings_model->ActualizarContraBBDD($id, $contra)) {
                        $this->session->set_flashdata('correcto', 'Se actualizó su contraseña correctamente.');
                    } else {
                        $this->session->set_flashdata('correcto', 'Se actualizó su contraseña correctamente.');
                        //$this->session->set_flashdata('actualizar', 'Hubo un error al actualizar su contraseña.');
                    }
                } else {
                    $this->session->set_flashdata('actualizar', 'Las contraseñas no coinciden.');
                }
            } else {
                $this->session->set_flashdata('actualizar', 'No es la contraseña actual.');
            }

            redirect("/usuarios_controller/perfil/$id");
        }
    }

    function actualizarFoto()
    {
        $fotoNueva = array(
            "id_usu" => $this->input->post("id_usu"),
            // "foto"=> $this->input->post("foto"),
        );

        // print_r($fotoNueva);

        $id_usu = $this->input->post("id_usu");
        $usuario = $this->usuario_model->obtenerRegistro($id_usu);
        // print_r($nuevosDatos);

        //foto
        $this->load->library("upload");
        $new_name = "nueva_fotofrm" . time() . "_" . rand(1, 5000);
        $config['file_name'] = $new_name . '_1';
        $config['upload_path'] = FCPATH . 'uploads/usuarios/';
        $config['allowed_types'] = 'jpeg|jpg|png';
        $config['max_size'] = 1024 * 5;
        $this->upload->initialize($config);

        if ($this->upload->do_upload("foto")) {
            $dataSubida = $this->upload->data();
            $fotoNueva["foto"] = $dataSubida['file_name'];

            $ruta_fotoAntigua = 'uploads/usuarios/' . $usuario->foto;
            // echo ($ruta_fotoAntigua);
            if (file_exists($ruta_fotoAntigua)) {
                unlink($ruta_fotoAntigua);
                echo "si hay";

                // print_r($fotoNueva1);

            } else {

                echo "no hay";
            }
            $fotoNueva1 = $dataSubida['file_name'];
            $id_usu = $this->input->post("id_usu");
            if ($this->settings_model->ActualizarFotoBBDD($id_usu, $fotoNueva1)) {
                $this->session->set_flashdata("actualizar", "Registro Actualizado correctamente.");
                echo "si se subio";
            } else {
                $this->session->set_flashdata("actualizar", "Registro Actualizado correctamente.");
            }
            redirect("usuarios_controller/perfil/$id_usu");
        }
    }
    public function guardarUsuario()
    {
        $this->reglasValidacionUsuario();

        // Verificar si la validación se ha realizado correctamente
        if ($this->form_validation->run() == FALSE) {
            $tipo_formulario = $this->input->post('perfil');
            switch ($tipo_formulario) {
                case 'ADMINISTRADOR':
                    $this->nuevoAdmin();
                    break;
                case 'SOCIO':
                    $this->nuevoSocio();
                    break;
            }
        } else {
            try {
                $data = array(
                    "perfil" => $this->input->post("perfil"),
                    "fk_usu_emp" => $this->input->post("fk_usu_emp"),
                    "nombres" => $this->input->post("nombres"),
                    "apellidos" => $this->input->post("apellidos"),
                    "cedula_usu" => $this->input->post("cedula_usu"),
                    "correo" => $this->input->post("correo"),
                    "contrasenia" => $this->input->post("contrasenia"),
                    "telefono" => $this->input->post("telefono"),
                    "direccion" => $this->input->post("direccion"),
                    // "foto"=> $this->input->post("foto"),
                );
                print_r($data);
                $this->load->library("upload");
                $new_name = "foto_usuario" . time() . "_" . rand(1, 5000);
                $config['file_name'] = $new_name . '_1';
                $config['upload_path'] = FCPATH . 'uploads/usuarios';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 1024 * 5;
                $this->upload->initialize($config);

                if ($this->upload->do_upload("foto")) {
                    $dataSubida = $this->upload->data();
                    $data["foto"] = $dataSubida['file_name'];
                }
                if ($this->usuario_model->insertar($data)) {
                    $this->session->set_flashdata('correcto', "Registro Creado");
                } else {
                    $this->session->set_flashdata('error', "Error al insertar");
                }
                redirect("usuarios_controller/indexAdmin");
            } catch (\Throwable $th) {
                echo "el correo ya esta registrado.";
            }
        }
    }

    public function eliminarCli($id_usu)
    {

        $usuario = $this->usuario_model->obtenerRegistro($id_usu);
        $ruta = 'uploads/usuarios/' . $usuario->foto;
        // print_r($ruta);
        if (file_exists($ruta)) {
            if (unlink($ruta)) {
            }
        } else {
            echo "algo salio mal en la eliminacion de la foto";
        }
        if ($this->usuario_model->borrar($id_usu)) {
            $this->session->set_flashdata('eliminar', "Registro eliminado");
        } else {
            echo "ocurrio un error";
        }
        redirect("/usuarios_controller/indexCli");
    }
    public function eliminarUsuario($id_usu)
    {

        $usuario = $this->usuario_model->obtenerRegistro($id_usu);
        $ruta = 'uploads/usuarios/' . $usuario->foto;
        // print_r($ruta);
        if (file_exists($ruta)) {
            if (unlink($ruta)) {
            }
        } else {
            echo "algo salio mal en la eliminacion de la foto";
        }
        if ($this->usuario_model->borrar($id_usu)) {
            $this->session->set_flashdata('eliminar', "Registro eliminado");
        } else {
            echo "ocurrio un error";
        }
        redirect("/usuarios_controller/indexAdmin");
    }


    public function actualizar()
    {
        $this->reglasValidacionUsuario(); // Llamada a las reglas de validación

        if ($this->form_validation->run() == FALSE) {
            // Si la validación falla, mostrar errores
            $id_usu = $this->input->post("id_usu");
            $data['usuario'] = $this->usuario_model->obtenerRegistro($id_usu); // Asegúrate de cargar los datos del usuario para mostrarlos de nuevo
            $data['datosEmpresa'] = $this->empresa_model->obtenerDatos(); // Asegúrate de cargar los datos de la empresa
            $this->editarUsuario($id_usu); // Carga de nuevo la vista con los errores
        } else {
            try {
                $data = array(
                    "perfil" => $this->input->post("perfil"),
                    "fk_usu_emp" => $this->input->post("fk_usu_emp"),
                    "nombres" => $this->input->post("nombres"),
                    "apellidos" => $this->input->post("apellidos"),
                    "cedula_usu" => $this->input->post("cedula_usu"),
                    "correo" => $this->input->post("correo"),
                    "contrasenia" => $this->input->post("contrasenia"),
                    "telefono" => $this->input->post("telefono"),
                    "direccion" => $this->input->post("direccion"),
                );
                // print_r($data);

                $id_usu = $this->input->post("id_usu");
                $usuario = $this->usuario_model->obtenerRegistro($id_usu);

                // Cargar la biblioteca de subida y configurar
                $this->load->library("upload");
                $new_name = "nueva_foto" . time() . "_" . rand(1, 5000);
                $config['file_name'] = $new_name . '_1';
                $config['upload_path'] = FCPATH . 'uploads/usuarios/';
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size'] = 1024 * 5;
                $this->upload->initialize($config);

                if ($this->upload->do_upload("foto")) {
                    $dataSubida = $this->upload->data();
                    $data["foto"] = $dataSubida['file_name'];

                    $ruta_fotoAntigua = 'uploads/usuarios/' . $usuario->foto;
                    if (file_exists($ruta_fotoAntigua)) {
                        unlink($ruta_fotoAntigua);
                    }
                }

                if ($this->usuario_model->procesoActu($id_usu, $data)) {
                    $this->session->set_flashdata("actualizar", "Registro Actualizado correctamente.");
                } else {
                    $this->session->set_flashdata("eliminar", "Algo salió mal, intente otra vez.");
                }
                redirect("usuarios_controller/perfil/$id_usu");
            } catch (\Throwable $th) {
                echo "El correo ya está registrado.";
            }
        }
    }

    public function CambiarContra()
    {
        $usuario = $this->input->post("correo");
        $nueva_pass = $this->input->post("nueva_contrasenia");

        if ($this->usuario_model->CambiarContraBBDD($usuario, $nueva_pass)) {
            $this->session->set_flashdata("contraseña", "Su contraseña ha sido actualizada correctamente.");
        } else {
            $this->session->set_flashdata("contraseña", "Su contraseña ha sido actualizada correctamente.");
        }
        redirect("/vista_general/login");
    }
}
