<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
  * Esta clase representa a cada Ojeo. 
  */
class Ojeo extends CI_Controller {
	/**
    * @ignore
    */
	public function __construct () {
		parent::__construct ();
		$this->load->model ('ojeo_model');
		$this->load->helper('ssl');
		//$this->output->cache(5);
		force_ssl ();
	}
  /**
  * Este metodo muestra en formato JSON los datos (id,idJugador,comentario,fecha,costoPase,clubActual) de todos los ojeos.
  *
  * Un ejemplo de uso es : .../ojeos/  . Utiliza el verbo HTTP GET.
  *
  * @api
  * @return void
  */
	public function index()
	{
		$data['ojeos'] = $this->ojeo_model->get_ojeos ();
		if (empty ($data['ojeos'])||$data['ojeos']==null)
			show_404 ();
		$this->load->view ('ojeo/index', $data);
	}
  /**
  * Este metodo muestra en formato JSON los datos (id,idJugador,comentario,fecha,costoPase,clubActual) de un ojeo en particular.
  *
  * Un ejemplo de uso es : .../ojeos/$id . Utiliza el verbo HTTP GET.
  *
  * @param int $id ID del Ojeo
  *
  * @api
  * @return void
  */
	public function ver($id)
	{
		$data['ojeos'] = $this->ojeo_model->get_ojeos ($id);
		if (empty ($data['ojeos'])||$data['ojeos']==null)
			show_404 ();
		$this->load->view ('ojeo/index', $data);
	}
  /**
  * Este metodo permite eliminar un ojeo.
  *
  * En caso de que sea eliminado correctamente, devuelve sus datos (id,idJugador,comentario,fecha,costoPase,clubActual) en formato JSON.
  *
  * Un ejemplo de uso es : .../ojeos/$id . Utiliza el verbo HTTP DELETE.
  *
  * @param int $id ID del Ojeo
  *
  * @api
  * @return void
  */	
	public function eliminar($id)
	{
		$data['eliminado'] = $this->ojeo_model->eliminar ($id);
		if (empty ($data['eliminado'])||$data['eliminado']==null)
			show_404 ();
		$this->load->view ('ojeo/eliminado', $data);
	}
	
	public function autenticar () {
		return $this->input->post('usuario')=="Eric" && $this->input->post('password')="9500";
	}
}
