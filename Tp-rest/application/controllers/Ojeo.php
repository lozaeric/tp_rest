<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador extends CI_Controller {
	public function __construct () {
			parent::__construct ();
			$this->load->model ('ojeo_model');
	}
	public function index()
	{
			$data['ojeos'] = $this->ojeo_model->get_ojeos ();
			if (empty ($data['ojeos']))
				show_404 ();
			$this->load->view ('ojeo/index', $data);
	}
	public function ver($id)
	{
			$data['ojeos'] = $this->ojeo_model->get_ojeos ($id);
			if (empty ($data['ojeos']))
				show_404 ();
			$this->load->view ('ojeo/index', $data);
	}
	public function eliminar($id)
	{
			$data['eliminado'] = $this->ojeo_model->eliminar ($id);
			if (empty ($data['eliminado']))
				show_404 ();
			$this->load->view ('ojeo/eliminado', $data);
	}
}
