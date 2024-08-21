<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
		parent::__construct();
		    
        $this->load->library('session');
        if (!$this->session->userdata('conectado')) {
            redirect('/vista_general/login'); 
        }
		$this->load->model("kpi");
		
	}


	public function index()
	{
		$data["cantidad_vehiculos"]= $this->kpi->CantidadAutos();
		$data["Cantidad_Socios"]= $this->kpi->CantidadSocios();
		$data["Cantidad_Clientes"]= $this->kpi->cantidadClientes();
		$data["Cantidad_Chofer"]= $this->kpi->cantidadChofer();
		$data["taxitas_masCarreras"]= $this->kpi->taxistaConMasCarreras();
		$data["taxitas_masEncomiendas"]= $this->kpi->taxistaConMasEncomiendas();
		$this->load->view('administracion/header');
		$this->load->view('welcome_message',$data);
		$this->load->view('administracion/footer');
	}
}
