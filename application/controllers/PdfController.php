<?php
class PdfController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Cargar la librería Pdf
        
        $this->load->library('Pdf');
        $this->load->model('notificacion_model');
        $this->load->model('reunion_model');
        $this->load->model('datosPdf_model');
        $this->load->model('usuario_model');
        $this->load->model('empresa_model');
        $this->load->model('chofer_model');
        $this->load->model('deporte_model');
        $this->load->model('vehiculo_model');
    }

    public function pdfSociosGeneral()
    {
        
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            // Obtener datos de la base de datos
            $data["empresa"] = $this->empresa_model->obtenerDatos();
            $data["socios"] = $this->usuario_model->obtenerDatosUsu();
            // Cargar la vista del PDF
            $this->pdf->load_view('usuarios/pdfGeneral', $data);

            // Generar y renderizar el PDF
            $this->pdf->stream("Lista_Socios.pdf", array("Attachment" => 0));
        } else {
            
            show_error('No tienes permisos para acceder a esta página.', 403, 'Acceso Denegado');
        }
    }
    public function pdfChoferGeneral()
    {
        
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            // Obtener datos de la base de datos
            $data["empresa"] = $this->empresa_model->obtenerDatos();
            $data["chofer"] = $this->chofer_model->obtenerDatos();
            // Cargar la vista del PDF
            $this->pdf->load_view('choferes/pdfChoferesGeneral', $data);

            // Generar y renderizar el PDF
            $this->pdf->stream("Lista_Choferes.pdf", array("Attachment" => 0));
        } else {
            
            show_error('No tienes permisos para acceder a esta página.', 403, 'Acceso Denegado');
        }
    }
    public function pdfClienteGeneral()
    {
        
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            // Obtener datos de la base de datos
            $data["empresa"] = $this->empresa_model->obtenerDatos();
            $data["cliente"] = $this->usuario_model->obtenerDatosUsu();
            // Cargar la vista del PDF
            $this->pdf->load_view('usuarios/pdfClienteGeneral', $data);

            // Generar y renderizar el PDF
            $this->pdf->stream("Lista_Clientes.pdf", array("Attachment" => 0));
        } else {
            
            show_error('No tienes permisos para acceder a esta página.', 403, 'Acceso Denegado');
        }
    }
    public function pdfVehiculoGeneral()
    {
        
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            // Obtener datos de la base de datos
            $data["empresa"] = $this->empresa_model->obtenerDatos();
            $data["vehiculo"] = $this->vehiculo_model->obtenerDatos();
            // Cargar la vista del PDF
            $this->pdf->load_view('vehiculo/pdfVehiculoGeneral', $data);

            // Generar y renderizar el PDF
            $this->pdf->stream("Lista_Vehiculos.pdf", array("Attachment" => 0));
        } else {
            
            show_error('No tienes permisos para acceder a esta página.', 403, 'Acceso Denegado');
        }
    }
    public function reunion($id_reu)
    {
        // Verificar el perfil del usuario
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            // Obtener datos de la base de datos
            $data["reunion"] = $this->reunion_model->obtenerRegistro($id_reu);
            $data["socios"] = $this->datosPdf_model->obtenerTodosSocios();
            $data["gerente"] = $this->datosPdf_model->obtenerUsuariosGerentes();
            $data["presidente"] = $this->datosPdf_model->obtenerUsuarioPresidente();
            $data["secretario"] = $this->datosPdf_model->obtenerUsuariosSecretario();


            // Cargar la vista del PDF
            $this->pdf->load_view('reunion/pdf', $data);

            // Generar y renderizar el PDF
            $this->pdf->stream("reunion_$id_reu.pdf", array("Attachment" => 0));
        } else {
            // Manejar el caso donde el usuario no tiene permisos
            show_error('No tienes permisos para acceder a esta página.', 403, 'Acceso Denegado');
        }
    }
    public function deporte($id_dep)
    {
        // Verificar el perfil del usuario
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            // Obtener datos de la base de datos
            $data["deporte"] = $this->deporte_model->obtenerRegistro($id_dep);
            $data["socios"] = $this->datosPdf_model->obtenerTodosSocios();
            $data["gerente"] = $this->datosPdf_model->obtenerUsuariosGerentes();
            $data["presidente"] = $this->datosPdf_model->obtenerUsuarioPresidente();
            $data["secretario"] = $this->datosPdf_model->obtenerUsuariosSecretario();


            // Cargar la vista del PDF
            $this->pdf->load_view('deporte/pdf', $data);

            // Generar y renderizar el PDF
            $this->pdf->stream("deporte_$id_dep.pdf", array("Attachment" => 0));
        } else {
            // Manejar el caso donde el usuario no tiene permisos
            show_error('No tienes permisos para acceder a esta página.', 403, 'Acceso Denegado');
        }
    }
    public function notificacion($id_not)
    {
        // Verificar el perfil del usuario
        if (
            $this->session->userdata("conectado")->perfil == "ADMINISTRADOR" ||
            $this->session->userdata("conectado")->perfil == "PRESIDENTE" ||
            $this->session->userdata("conectado")->perfil == "SECRETARIO" ||
            $this->session->userdata("conectado")->perfil == "GERENTE"
        ) {
            // Obtener datos de la base de datos
            $data["notificacion"] = $this->notificacion_model->obtenerRegistro($id_not);
            $data["gerente"] = $this->datosPdf_model->obtenerUsuariosGerentes();
            $data["presidente"] = $this->datosPdf_model->obtenerUsuarioPresidente();
            $data["secretario"] = $this->datosPdf_model->obtenerUsuariosSecretario();


            // Cargar la vista del PDF
            $this->pdf->load_view('notificacion/pdf', $data);

            // Generar y renderizar el PDF
            $this->pdf->stream("notificacion_$id_not.pdf", array("Attachment" => 0));
        } else {
            // Manejar el caso donde el usuario no tiene permisos
            show_error('No tienes permisos para acceder a esta página.', 403, 'Acceso Denegado');
        }
    }
}
