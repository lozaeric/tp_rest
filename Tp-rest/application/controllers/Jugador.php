<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jugador extends CI_Controller {
	public function __construct () {
			parent::__construct ();
			$this->load->model ('jugador_model');
            $this->load->model ('ojeo_model');
			$this->load->helper('ssl');
			force_ssl ();
	}
	public function index()
	{
			$data['jugadores'] = $this->jugador_model->get_jugadores ();
			if (empty ($data['jugadores']))
				show_404 ();
			$this->load->view ('jugador/index', $data);
	}
	public function ver($id)
	{
			$data['jugadores'] = $this->jugador_model->get_jugadores ($id);
			if (empty ($data['jugadores']))
				show_404 ();
			$this->load->view ('jugador/index', $data);
	}

        public function verOjeos($id)
	{
			$data['ojeos'] = $this->ojeo_model->get_ojeos_jugador ($id);
			if (empty ($data['ojeos']))
				show_404 ();
			$this->load->view ('ojeo/index', $data);
	}

        public function agregar($nombre, $posicion) {
			$data['agregado'] = $this->jugador_model->agregar_jugador ($nombre, $posicion);
			if (empty ($data['agregado']))
				show_404 ();
			$this->load->view ('jugador/agregado', $data);
        }

       public function modificar($id, $nombre, $posicion) {
			$data['modificado'] = $this->jugador_model->modificar_jugador ($id, $nombre, $posicion);
			if (empty ($data['modificado'])||$data['modificado']==null)
				show_404 ();
			$this->load->view ('jugador/modificado', $data);
        }

	public function eliminar($id)
	{
			$data['eliminado'] = $this->jugador_model->eliminar_jugador ($id);
			if (empty ($data['eliminado'])||$data['eliminado']==null)
				show_404 ();
			$this->load->view ('jugador/eliminado', $data);
	}
}
