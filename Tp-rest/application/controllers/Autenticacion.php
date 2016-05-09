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
		//$this->load->helper('cookie');
		//$this->output->cache(5);
		$this->load->helper('form');
		force_ssl ();
	}
	public function index()
	{
		$this->load->view ('autenticacion/login');
	}
	public function loguearse () {
		if ($this->input->post("usuario")=="Eric" && $this->input->post("password")=="9500") 
			$this->load->view ('autenticacion/logged');
		else
			$this->load->view ('autenticacion/login');	
	}
}
