<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
  * Esta clase representa la Autenticacion
  */
class Autenticacion extends CI_Controller {
   /**
    * @ignore
    */
	public function __construct () {
		parent::__construct ();
		$this->load->helper('ssl');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model ('autenticacion_model');
		force_ssl ();
	}
	public function index()
	{
		$this->load->view ('autenticacion/login');
	}
	public function loguearse () {
		$nombre = $this->input->post("usuario");
		$password = $this->input->post("password");
		$recordar = $this->input->post("recordarme");
		$esCorrecto = $this->autenticacion_model->autenticar ($nombre, $password);
		
		if ($esCorrecto) {
			$this->session->set_userdata(array('nombre'  => $nombre));
			if (! $recordar)
				$this->session->mark_as_temp('nombre', 120);
			$this->load->view ('autenticacion/logged');
		}
		else
			$this->load->view ('autenticacion/login');	
	}
}
