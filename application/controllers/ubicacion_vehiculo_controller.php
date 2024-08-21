<?php
date_default_timezone_set('America/Guayaquil');
?>
<?php
class Ubicacion_vehiculo_controller extends CI_Controller
{
    public function __construct()
    {
      parent::__construct();
        $this->load->model('ubicacion_vehiculo_model');
        $this->load->model('vehiculo_model');
        $this->load->library('curl');
        $this->load->library('session');
        $this->load->library("form_validation");
    }

    public function index()
    {
        $usuario = $this->session->userdata("conectado");

        if ($usuario && in_array($usuario->perfil, ["ADMINISTRADOR", "PRESIDENTE", "SECRETARIO", "GERENTE", "SOCIO","CLIENTE"])) {
            $data["ultima_ubicacion"] = $this->ubicacion_vehiculo_model->ultimaUbicacion();
            $data["id_usu"] = $usuario->id_usu;
            $data["id_veh"] = $this->vehiculo_model->obtenerDatos();

            $this->load->view("administracion/header");
            $this->load->view("carreras/index", $data);
            $this->load->view("administracion/footer");
        }
    }

    public function insertarVehiculoCarro()
    {
        $usuario = $this->session->userdata("conectado");

        if (!$usuario) {
            echo json_encode(["error" => "Usuario no está conectado."]);
            return;
        }

        $id_usu = $usuario->id_usu;

        if (!$id_usu) {
            echo json_encode(["error" => "ID de usuario no disponible."]);
            return;
        }

        $vehiculo = $this->vehiculo_model->obtener_vehiculo($id_usu);

        if (empty($vehiculo)) {
            echo json_encode(["error" => "No se encontró un vehículo asociado para este usuario."]);
            return;
        }

        $id_veh = $vehiculo->id_veh; // Asegúrate de que 'id_veh' está siendo retornado correctamente

        $data = array(
            'latitud_ubi' => $this->input->post('latitud'),
            'longitud_ubi' => $this->input->post('longitud'),
            'fecha_ubi' => date('Y-m-d'),
            'hora_ubi' => date('H:i:s'),
            'fk_ubi_veh' => $id_veh // Asigna el ID del vehículo correctamente
        );

        log_message('debug', 'Datos a insertar: ' . json_encode($data));

        $insert_result = $this->ubicacion_vehiculo_model->insertar_ubicacion($data);

        if ($insert_result) {
            echo json_encode(["success" => "Ubicación registrada correctamente."]);
            $this->session->set_flashdata("correcto", "Su contraseña ha sido actualizada correctamente.");
            $this->session->set_flashdata('correcto', "Registro Creado");

        } else {
            echo json_encode(["error" => "Error al registrar la ubicación."]);
        }
    }
}
