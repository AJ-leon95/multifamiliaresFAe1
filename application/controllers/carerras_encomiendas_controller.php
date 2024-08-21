<?php
date_default_timezone_set('America/Guayaquil');
?>

<?php
class carerras_encomiendas_controller extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('conectado')) {
            redirect('/vista_general/login');
        }
        $this->load->model("carreras_encomiendas_model");
        $this->load->model("preciosCarreras_model");
        $this->load->model("vehiculo_model");
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->library('TwilioLib');
        date_default_timezone_set('America/Guayaquil');
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
            $data["carrera"] = $this->carreras_encomiendas_model->obtenerRegistro($id_car);
            $data["vehiculo"] = $this->vehiculo_model->obtenerDatos();
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
            $data["carreras"] = $this->carreras_encomiendas_model->obtenerMisEncomiendas($id_usu);

            $this->load->view("administracion/header");
            $this->load->view("car_enc/reporteEncomiendas", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function reporteCarreras($id_usu)
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
            $this->load->view("car_enc/reporteCarreras", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function reporteMisCarreras($id_usu)
    {
        if (
            // $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE" ||
            $this->session->userdata("conectado")->perfil == "SOCIO"

        ) {

            $data["carreras"] = $this->carreras_encomiendas_model->getCarrerasPorTaxista($id_usu,"CARRERA");

            $this->load->view("administracion/header");
            $this->load->view("car_enc/reporteMisCarreras", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function reporteMisEncomiendas($id_usu)
    {
        if (
            // $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE" ||
            $this->session->userdata("conectado")->perfil == "SOCIO"

        ) {
            $data["carreras"] = $this->carreras_encomiendas_model->getCarrerasPorTaxista($id_usu,"ENCOMIENDA");

            $this->load->view("administracion/header");
            $this->load->view("car_enc/reporteMisEncomiendas", $data);
            $this->load->view("administracion/footer");
        }
    }
    public function reglasValidacion()
    {
        $this->form_validation->set_rules('fecha_carrera', 'Fecha de Carrera', 'required|callback_valid_date', [
            'required' => 'La %s es obligatoria.',
            'callback_valid_date' => 'La %s debe ser una fecha válida y no puede ser anterior a la fecha actual.'
        ]);
        $this->form_validation->set_rules('hora_carrera', 'Hora de Carrera', 'required|callback_valid_time', [
            'required' => 'La %s es obligatoria.'
        ]);
        $this->form_validation->set_rules('fecha_entrega', 'Fecha de Entrega', 'required|callback_valid_date|callback_valid_entrega', [
            'required' => 'La %s es obligatoria.',
            'callback_valid_date' => 'La %s debe ser una fecha válida y no puede ser anterior a la fecha actual.',
            'callback_valid_entrega' => 'La %s debe ser al menos 5 horas después de la carrera.'
        ]);
        $this->form_validation->set_rules('hora_entrega', 'Hora de Entrega', 'required|callback_valid_time', [
            'required' => 'La %s es obligatoria.'
        ]);
        $this->form_validation->set_rules('precio_carrera', 'Precio de Carrera', 'required|numeric', [
            'required' => 'El %s es obligatorio.',
            'numeric' => 'El %s debe ser un valor numérico.'
        ]);
        $this->form_validation->set_rules('distancia', 'Distancia', 'required|numeric', [
            'required' => 'La %s es obligatoria.',
            'numeric' => 'La %s debe ser un valor numérico.'
        ]);
    }

    public function valid_date($date)
    {
        $current_date = date('Y-m-d');
        if (strtotime($date) === false) {
            $this->form_validation->set_message('valid_date', 'La fecha ingresada no es válida.');
            return false;
        }
        if (strtotime($date) < strtotime($current_date)) {
            $this->form_validation->set_message('valid_date', 'La fecha ingresada no puede ser anterior a la fecha actual.');
            return false;
        }
        return true;
    }

    public function valid_time($time)
    {
        // Aquí puedes agregar validaciones adicionales si lo necesitas
        if (strtotime($time) === false) {
            $this->form_validation->set_message('valid_time', 'La hora ingresada no es válida.');
            return false;
        }
        return true;
    }

    public function valid_entrega()
    {
        $fecha_carrera = $this->input->post('fecha_carrera');
        $hora_carrera = $this->input->post('hora_carrera');
        $fecha_entrega = $this->input->post('fecha_entrega');
        $hora_entrega = $this->input->post('hora_entrega');

        $datetime_carrera = strtotime("$fecha_carrera $hora_carrera");
        $datetime_entrega = strtotime("$fecha_entrega $hora_entrega");

        // Verificar que la fecha y hora de entrega sean al menos 5 horas después de la fecha y hora de carrera
        if ($datetime_entrega <= $datetime_carrera) {
            $this->form_validation->set_message('valid_entrega', 'La fecha y hora de entrega deben ser posteriores a la fecha y hora de carrera, o almenos con 5 horas de anticipaciòn.');
            return false;
        }

        if (($datetime_entrega - $datetime_carrera) < 5 * 3600) {
            $this->form_validation->set_message('valid_entrega', 'La fecha y hora de entrega deben ser al menos 5 horas después de la carrera.');
            return false;
        }

        return true;
    }


    public function guardar()
    {
        try {
            // Recopilación de datos desde el formulario
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
                "precio_carrera" => $this->input->post("precio_carrera"),
                "distancia" => $this->input->post("distancia"),
                "descripcion_encomienda" => $this->input->post("descripcion_encomienda"),
            );

            $this->reglasValidacion();

            // Validación del formulario
            if ($this->form_validation->run() == FALSE) {
                // Carga la vista del formulario con los mensajes de error
                $id_car = $this->input->post("fk_car_veh");
                $this->nuevaEncomienda($id_car);
            } else {
                // Procesa los datos si la validación es exitosa
                if ($this->carreras_encomiendas_model->insertar($data)) {
                    // Obtener el número de teléfono del taxista
                    $id_car = $this->input->post("fk_car_veh");
                    $telefono_taxista = $this->carreras_encomiendas_model->obtenerTelefonoTaxista($id_car);
                    $telefono_cliente = $this->session->userdata("conectado")->telefono;

                    // Imprimir los números de teléfono antes de formatear
                    log_message('info', 'Número de teléfono del cliente antes de formatear: ' . $telefono_cliente);
                    log_message('info', 'Número de teléfono del taxista antes de formatear: ' . $telefono_taxista);

                    // Ajustar formato del número de teléfono
                    if (substr($telefono_taxista, 0, 1) == '0') {
                        $telefono_taxista = '+593' . substr($telefono_taxista, 1);
                    }
                    if (substr($telefono_cliente, 0, 1) == '0') {
                        $telefono_cliente = '+593' . substr($telefono_cliente, 1);
                    }

                    // Imprimir los números de teléfono después de formatear
                    log_message('info', 'Número de teléfono del cliente después de formatear: ' . $telefono_cliente);
                    log_message('info', 'Número de teléfono del taxista después de formatear: ' . $telefono_taxista);

                    if ($telefono_taxista) {
                        // Enviar mensaje de WhatsApp al taxista
                        $this->load->library('TwilioLib');

                        $to = 'whatsapp:' . $telefono_taxista; // Número de WhatsApp del taxista (debe incluir el prefijo "whatsapp:")
                        $from = 'whatsapp:+14155238886'; // Número de WhatsApp registrado en Twilio (debe incluir el prefijo "whatsapp:")
                        $body = 'Tienes una nueva solicitud de encomienda. Por favor, revisa los detalles en la aplicación.';

                        echo "to " . $to;
                        echo "from" . $from;
                        echo "body" . $body;
                         try {
                             $mensaje = $this->twiliolib->send_whatsapp_message($to, $from, $body);
                             log_message('info', 'Mensaje de WhatsApp enviado: ' . $mensaje);
                         } catch (Exception $e) {
                             log_message('error', 'Error al enviar mensaje de WhatsApp: ' . $e->getMessage());
                         }
                    }

                    $this->session->set_flashdata('correcto', "Se registró su carrera correctamente.");
                     redirect("carerras_encomiendas_controller/reporteEncomiendas/" . $this->input->post("fk_car_usu"));
                } else {
                    $this->session->set_flashdata('error', "Hubo un error al guardar la encomienda.");
                     redirect("carerras_encomiendas_controller/nuevaEncomienda");
                }
            }
        } catch (\Throwable $th) {
            log_message('error', 'Error inesperado: ' . $th->getMessage());
            $this->session->set_flashdata('error', "Ocurrió un error inesperado.");
            // redirect("carerras_encomiendas_controller/nuevaEncomienda");
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
                "precio_carrera" => $this->input->post("precio_carrera"),
                "distancia" => $this->input->post("distancia"),

            );
            // print_r($data);
            $id_car = $this->input->post("id_car");
            $this->reglasValidacion();
            if ($this->form_validation->run() == false) {
                $id_car = $this->input->post("id_car");
                $this->editarEncomienda($id_car);
            } else {
                $id_usu = $this->input->post("fk_car_usu");
                if ($this->carreras_encomiendas_model->procesoActu($id_car, $data)) {

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
        $id_usu = $this->session->userdata("conectado")->id_usu;
        $nuevoStatusCarrera = "CANCELADO";

        if ($this->carreras_encomiendas_model->status($nuevoStatusCarrera, $id_car)) {
            $this->session->set_flashdata('actualizar', "Se canceló la encomienda correctamente");
        } else {
            $telefono_taxista = $this->carreras_encomiendas_model->obtenerTelefonoTaxistaCarreras($id_car);
            $telefono_cliente = $this->session->userdata("conectado")->telefono;

            // Imprimir los números de teléfono antes de formatear
            log_message('info', 'Número de teléfono del cliente antes de formatear: ' . $telefono_cliente);
            log_message('info', 'Número de teléfono del taxista antes de formatear: ' . $telefono_taxista);

            // Ajustar formato del número de teléfono
            if (substr($telefono_taxista, 0, 1) == '0') {
                $telefono_taxista = '+593' . substr($telefono_taxista, 1);
            }
            if (substr($telefono_cliente, 0, 1) == '0') {
                $telefono_cliente = '+593' . substr($telefono_cliente, 1);
            }

            // Imprimir los números de teléfono después de formatear
            log_message('info', 'Número de teléfono del cliente después de formatear: ' . $telefono_cliente);
            log_message('info', 'Número de teléfono del taxista después de formatear: ' . $telefono_taxista);

            if ($telefono_taxista) {
                // Enviar mensaje de WhatsApp al taxista
                $this->load->library('TwilioLib');

                $to = 'whatsapp:' . $telefono_taxista; // Número de WhatsApp del taxista (debe incluir el prefijo "whatsapp:")
                $from = 'whatsapp:+14155238886'; // Número de WhatsApp registrado en Twilio (debe incluir el prefijo "whatsapp:")
                $body = 'Hay una actualización en encomienda esta fue cancelada. Por favor, revisa los detalles en la aplicación.';

                try {
                    $mensaje = $this->twiliolib->send_whatsapp_message($to, $from, $body);
                    log_message('info', 'Mensaje de WhatsApp enviado: ' . $mensaje);
                } catch (Exception $e) {
                    log_message('error', 'Error al enviar mensaje de WhatsApp: ' . $e->getMessage());
                }
            }
            $this->session->set_flashdata('error', "Algo salió mal");
        }

        redirect("carerras_encomiendas_controller/reporteEncomiendas/$id_usu");
    }



    ///CARRERAS
    public function reglasValidacionCarrera()
    {
        $this->form_validation->set_rules('fk_car_veh', 'taxista', 'required', array('required' => 'Debe escoger un taxista para el servicio.'));
        $this->form_validation->set_rules('latitud_carrera', 'Ubicación inicial', 'required', array('required' => 'Debe escoger la ubicación inicial.'));
        $this->form_validation->set_rules('longitud_carrera', 'Ubicación inicial', 'required', array('required' => 'Debe escoger la ubicación inicial.'));
        $this->form_validation->set_rules('latitud_entrega', 'Ubicación final', 'required', array('required' => 'Debe escoger la ubicación final.'));
        $this->form_validation->set_rules('longitud_entrega', 'Ubicación final', 'required', array('required' => 'Debe escoger la ubicación final.'));
        $this->form_validation->set_rules('distancia', 'Distancia', 'required', array('required' => 'La distancia es obligatoria.'));
        $this->form_validation->set_rules('precio_carrera', 'Precio', 'required', array('required' => 'El precio es obligatorio.'));
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
                "precio_carrera" => $this->input->post("precio_carrera"),
                "distancia" => $this->input->post("distancia"),

            );
            print_r($data);
            $this->reglasValidacionCarrera();
            if ($this->form_validation->run() == false) {

                redirect("/Ubicacion_vehiculo_controller/index");
            } else {
                $id_usu = $this->input->post("fk_car_usu");
                if ($this->carreras_encomiendas_model->insertar($data)) {
                    // Obtener el número de teléfono del taxista
                    $id_car = $this->input->post("fk_car_veh");
                    $telefono_taxista = $this->carreras_encomiendas_model->obtenerTelefonoTaxista($id_car);
                    $telefono_cliente = $this->session->userdata("conectado")->telefono;

                    // Imprimir los números de teléfono antes de formatear
                    log_message('info', 'Número de teléfono del cliente antes de formatear: ' . $telefono_cliente);
                    log_message('info', 'Número de teléfono del taxista antes de formatear: ' . $telefono_taxista);

                    // Ajustar formato del número de teléfono
                    if (substr($telefono_taxista, 0, 1) == '0') {
                        $telefono_taxista = '+593' . substr($telefono_taxista, 1);
                    }
                    if (substr($telefono_cliente, 0, 1) == '0') {
                        $telefono_cliente = '+593' . substr($telefono_cliente, 1);
                    }

                    // Imprimir los números de teléfono después de formatear
                    log_message('info', 'Número de teléfono del cliente después de formatear: ' . $telefono_cliente);
                    log_message('info', 'Número de teléfono del taxista después de formatear: ' . $telefono_taxista);

                    if ($telefono_taxista) {
                        // Enviar mensaje de WhatsApp al taxista
                        $this->load->library('TwilioLib');

                        $to = 'whatsapp:' . $telefono_taxista; // Número de WhatsApp del taxista (debe incluir el prefijo "whatsapp:")
                        $from = 'whatsapp:+14155238886'; // Número de WhatsApp registrado en Twilio (debe incluir el prefijo "whatsapp:")
                        $body = 'Tienes una nueva solicitud de una carrera. Por favor, revisa los detalles en la aplicación.';

                        // echo "to ".$to;
                        // echo "from".$from;
                        // echo "body".$body;
                        try {
                            $mensaje = $this->twiliolib->send_whatsapp_message($to, $from, $body);
                            log_message('info', 'Mensaje de WhatsApp enviado: ' . $mensaje);
                        } catch (Exception $e) {
                            log_message('error', 'Error al enviar mensaje de WhatsApp: ' . $e->getMessage());
                        }
                    }
                    $this->session->set_flashdata('correcto', "Se registro su carrera");
                } else {
                    echo "hubo un error !!";
                }
                redirect("carerras_encomiendas_controller/reporteCarreras/$id_usu");
            }
        } catch (\Throwable $th) {
            echo "el correo ya esta registrado.";
        }
    }
    public function obtenerPrecioPorDistancia()
    {
        $distancia = $this->input->post('distancia');

        if (is_numeric($distancia)) {
            $precio = $this->calcularPrecioPorDistancia($distancia);

            echo json_encode(['tarifa' => $precio]);
        } else {
            echo json_encode(['error' => true]);
        }
    }

    private function calcularPrecioPorDistancia($distancia)
    {
        $tarifaBase = 1.25; 
        $tarifaPorKm = 0.40; 
        $precio = $tarifaBase + ($tarifaPorKm * $distancia);
        return $precio;
    }
    public function Aceptar($id_car)
    {
        $id_usu = $this->session->userdata("conectado")->id_usu;
        $nuevoStatusCarrera = "ACEPTADO";

        if ($this->carreras_encomiendas_model->status($nuevoStatusCarrera, $id_car)) {
            $this->session->set_flashdata('actualizar', "Se acepto la encomienda correctamente");
        } else {
            $telefono_solicitante = $this->carreras_encomiendas_model->obtenerTelefonoSolicitanteEncomienda($id_car);
            $telefono_taxista = $this->session->userdata("conectado")->telefono;

         
            // Ajustar formato del número de teléfono
            if (substr($telefono_taxista, 0, 1) == '0') {
                $telefono_taxista = '+593' . substr($telefono_taxista, 1);
            }
            if (substr($telefono_solicitante, 0, 1) == '0') {
                $telefono_solicitante = '+593' . substr($telefono_solicitante, 1);
            }
            if ($telefono_taxista) {
                // Enviar mensaje de WhatsApp al taxista
                $this->load->library('TwilioLib');

                $to = 'whatsapp:' . $telefono_solicitante; // Número de WhatsApp del taxista (debe incluir el prefijo "whatsapp:")
                $from = 'whatsapp:+14155238886'; // Número de WhatsApp registrado en Twilio (debe incluir el prefijo "whatsapp:")
                $body = 'La encomienda encargada ha sido aceptada, revisa los detalles en la aplicación.';
                // echo $to. " ".$from." ".$body;
                 try {
                     $mensaje = $this->twiliolib->send_whatsapp_message($to, $from, $body);
                     log_message('info', 'Mensaje de WhatsApp enviado: ' . $mensaje);
                 } catch (Exception $e) {
                     log_message('error', 'Error al enviar mensaje de WhatsApp: ' . $e->getMessage());
                 }
            }
             $this->session->set_flashdata('error', "Algo salió mal");
        }

         redirect("carerras_encomiendas_controller/reporteMisEncomiendas/$id_usu");
    }
    public function Rechazar($id_car)
    {
        $id_usu = $this->session->userdata("conectado")->id_usu;
        $nuevoStatusCarrera = "RECHAZADA";

        if ($this->carreras_encomiendas_model->status($nuevoStatusCarrera, $id_car)) {
            $this->session->set_flashdata('actualizar', "Se rechaso la encomienda correctamente");
        } else {
            $telefono_solicitante = $this->carreras_encomiendas_model->obtenerTelefonoSolicitanteEncomienda($id_car);
            $telefono_taxista = $this->session->userdata("conectado")->telefono;

            // Imprimir los números de teléfono antes de formatear
            log_message('info', 'Número de teléfono del cliente antes de formatear: ' . $telefono_taxista);
            log_message('info', 'Número de teléfono del taxista antes de formatear: ' . $telefono_solicitante);

            // Ajustar formato del número de teléfono
            if (substr($telefono_taxista, 0, 1) == '0') {
                $telefono_taxista = '+593' . substr($telefono_taxista, 1);
            }
            if (substr($telefono_solicitante, 0, 1) == '0') {
                $telefono_solicitante = '+593' . substr($telefono_solicitante, 1);
            }

            // Imprimir los números de teléfono después de formatear
            log_message('info', 'Número de teléfono del cliente después de formatear: ' . $telefono_solicitante);
            log_message('info', 'Número de teléfono del taxista después de formatear: ' . $telefono_taxista);

            if ($telefono_taxista) {
                // Enviar mensaje de WhatsApp al taxista
                $this->load->library('TwilioLib');

                $to = 'whatsapp:' . $telefono_solicitante; // Número de WhatsApp del taxista (debe incluir el prefijo "whatsapp:")
                $from = 'whatsapp:+14155238886'; // Número de WhatsApp registrado en Twilio (debe incluir el prefijo "whatsapp:")
                $body = 'La encomienda encargada ha sido aceptada, revisa los detalles en la aplicación.';

                try {
                    $mensaje = $this->twiliolib->send_whatsapp_message($to, $from, $body);
                    log_message('info', 'Mensaje de WhatsApp enviado: ' . $mensaje);
                } catch (Exception $e) {
                    log_message('error', 'Error al enviar mensaje de WhatsApp: ' . $e->getMessage());
                }
            }
            $this->session->set_flashdata('error', "Algo salió mal");
        }

        redirect("carerras_encomiendas_controller/reporteMisEncomiendas/$id_usu");
    }
}
