<?php
class usuarios_controller    extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("empresa_model");
        $this->load->model("usuario_model");
        $this->load->model("settings_model");
        // print_r($this->session->userdata("conectado"));
    }
    public function indexAdmin()
    {
        if ($this->session->userdata("conectado")->perfil == "ADMINISTRADOR"||
        $this->session->userdata("conectado")->perfil == "PRESIDENTE"||
        $this->session->userdata("conectado")->perfil == "SECRETARIO"||
        $this->session->userdata("conectado")->perfil == "GERENTE") {
            $data["dataUsu"] = $this->usuario_model->obtenerDatosUsu();
            $this->load->view("administracion/header");
            $this->load->view("usuarios/indexAdmin", $data);
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
    public function perfil($id_usu)
    {
        
            $data["perfil_ver"] = $this->usuario_model->obtenerRegistro($id_usu);
            $this->load->view("administracion/header");
            $this->load->view("usuarios/perfil", $data);
            $this->load->view("administracion/footer");
        
    }
    public function editarPerfilPersonal($id_usu)
    {
        
        $data["emp"] = $this->empresa_model->obtenerDatos();
        $data["datosEmpresa"]=$this->empresa_model->obtenerDatos();
        $data["usuario"]=$this->usuario_model->obtenerRegistro($id_usu);
            $this->load->view("administracion/header");
            $this->load->view("usuarios/editarperfil", $data);
            $this->load->view("administracion/footer");
        
    }
    public function indexSocio()
    {
        if ($this->session->userdata("conectado")->perfil == "ADMINISTRADOR"||
        $this->session->userdata("conectado")->perfil == "PRESIDENTE"||
        $this->session->userdata("conectado")->perfil == "SECRETARIO"||
        $this->session->userdata("conectado")->perfil == "GERENTE") {
            $data["dataUsu"] = $this->usuario_model->obtenerDatosUsu();
            $this->load->view("administracion/header");
            $this->load->view("usuarios/indexSocio", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function nuevoAdmin()
    {
        if ($this->session->userdata("conectado")->perfil == "ADMINISTRADOR"||
        $this->session->userdata("conectado")->perfil == "PRESIDENTE"||
        $this->session->userdata("conectado")->perfil == "SECRETARIO"||
        $this->session->userdata("conectado")->perfil == "GERENTE") {
            $data["emp"] = $this->empresa_model->obtenerDatos();
            $data["datosEmpresa"]=$this->empresa_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("usuarios/nuevoAdmin", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function nuevoSocio()
    {
        if ($this->session->userdata("conectado")->perfil == "ADMINISTRADOR"||
        $this->session->userdata("conectado")->perfil == "PRESIDENTE"||
        $this->session->userdata("conectado")->perfil == "SECRETARIO"||
        $this->session->userdata("conectado")->perfil == "GERENTE") {
            $data["emp"] = $this->empresa_model->obtenerDatos();
            $data["datosEmpresa"]=$this->empresa_model->obtenerDatos();
            $this->load->view("administracion/header");
            $this->load->view("usuarios/nuevoSocio", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function editarUsuario($id_usu)
    {
        if ($this->session->userdata("conectado")->perfil == "ADMINISTRADOR"||
        $this->session->userdata("conectado")->perfil == "PRESIDENTE"||
        $this->session->userdata("conectado")->perfil == "SECRETARIO"||
        $this->session->userdata("conectado")->perfil == "GERENTE") {
            
            $data["emp"] = $this->empresa_model->obtenerDatos();
            $data["datosEmpresa"]=$this->empresa_model->obtenerDatos();
            $data["usuario"]=$this->usuario_model->obtenerRegistro($id_usu);
            $this->load->view("administracion/header");
            $this->load->view("usuarios/editarAdmin", $data);
            $this->load->view("administracion/footer");
        }
    }
    function ActualizarDatos(){
        $contraActual = $this->input->post("contraActual");
        $id = $this->input->post("id_usu");
        $usuario = $this->usuario_model->obtenerRegistro($id);
        if($contraActual==$usuario->contrasenia){

        echo "si es igual";
        $contra1= $this->input->post("primeraContra");
        $contra2= $this->input->post("segundaContra");
        if($contra1==$contra2){
            $contra= $this->input->post("segundaContra");
            $id = $this->input->post("id_usu");
            if($this->settings_model->ActualizarContraBBDD($id,$contra)){
                $id = $this->input->post("id_usu");
                $this->session->set_flashdata("actualizar", "Se actualizo su contraseña correctamente.");
                redirect("/usuarios_controller/perfil/$id");
            }else{
                $id = $this->input->post("id_usu");
                $this->session->set_flashdata("actualizar", "Se actualizo su contraseña correctamente.");
                redirect("/usuarios_controller/perfil/$id");
                
            }
        }else{
            $id = $this->input->post("id_usu");
            $this->session->set_flashdata("eliminar", "las contraseñas no coiciden.");
            
        }
    }else{
        $this->session->set_flashdata("eliminar", "No es la contraseña actual.");

    }
    redirect("/usuarios_controller/perfil/$id");

    }
    function actualizarFoto(){
        $fotoNueva = array(
            "id_usu"=> $this->input->post("id_usu"),
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
            $fotoNueva1=$dataSubida['file_name'];
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
            echo "hubo un error !!";
        }
        redirect("usuarios_controller/indexAdmin");
      } catch (\Throwable $th) {
        echo "el correo ya esta registrado.";
      }  
       
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
        $id_usu = $this->input->post("id_usu");
        $usuario = $this->usuario_model->obtenerRegistro($id_usu);
        // print_r($data);

        //foto
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
            echo ($ruta_fotoAntigua);
            if (file_exists($ruta_fotoAntigua)) {
                unlink($ruta_fotoAntigua);
            } else {

                echo "no hay";
            }
        }
        if ($this->usuario_model->procesoActu($id_usu, $data)) {
            $this->session->set_flashdata("actualizar", "Registro Actualizado correctamente.");
        } else {
            $this->session->set_flashdata("eliminar", "algo salio mal intente otra ves.");
            echo "no se pudo actualizar";
        }
        redirect("usuarios_controller/indexAdmin");
    }


    
  }