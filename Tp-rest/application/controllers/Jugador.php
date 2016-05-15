<?php
defined('BASEPATH') OR exit('No direct script access allowed');
  /**
  * Esta clase representa a cada Jugador. 
  */
class Jugador extends CI_Controller {
   /**
    * @ignore
    */
	public function __construct () {
		parent::__construct ();
		$this->load->model ('jugador_model');
        $this->load->model ('ojeo_model');
		$this->load->helper('ssl');
		$this->load->library('session');
		force_ssl ();
	}
  /**
  * Este metodo muestra en formato JSON los datos (id,nombre,posicion) de todos los jugadores.
  *
  * Un ejemplo de uso es : .../jugadores/  . Utiliza el verbo HTTP GET.
  *
  * Es posible aplicar un filtro segun el club, posicion o nombre del jugador. 
  * Por ejemplo: .../jugadores?nombre=Lionel  , .../jugadores?posicion=Delantero o .../jugadores?club=Barcelona
  * 
  * A su vez, se puede ordenar el resultado ascendentemente o descendentemente teniendo en cuenta algun campo. 
  * Por ejemplo: .../jugadores?nombre=Lionel&campo=nombre&orden=ASC
  * 
  *
  * @api
  * @return void
  */
	public function index()
	{
			$data['jugadores'] = $this->jugador_model->get_jugadores ();
			if (! $this->autenticar ())
				show_error('No estás autorizado para acceder a esta página', 403, '403 Forbidden');
			if (empty ($data['jugadores'])||$data['jugadores']==null)
				show_404 ();
			$this->load->view ('jugador/index', $data);
	}
  /**
  * Este metodo permite ver en formato JSON los datos (id,nombre,posicion) de un jugador en particular.
  *
  * Un ejemplo de uso es : .../jugadores/$id . Utiliza el verbo HTTP GET.
  *
  * @param int $id ID del Jugador
  *
  * @api
  * @return void
  */
	public function ver($id)
	{
		$data['jugadores'] = $this->jugador_model->get_jugadores ($id);
		if (! $this->autenticar ())
			 show_error('No estás autorizado para acceder a esta página', 403, '403 Forbidden');
		if (empty ($data['jugadores'])||$data['jugadores']==null)
			show_404 ();
		$this->load->view ('jugador/index', $data);
	}
  /**
  * Este metodo permite ver en formato JSON los ojeos (id,nombre,posicion) de un jugador en particular.
  *
  * Un ejemplo de uso es : .../jugadores/$id/ojeos . Utiliza el verbo HTTP GET.
  *
  * @param int $id ID del Jugador
  *
  * @api
  * @return void
  */	
    public function verOjeos($id)
	{
		$data['ojeos'] = $this->ojeo_model->get_ojeos_jugador ($id);
		if (! $this->autenticar ())
			 show_error('No estás autorizado para acceder a esta página', 403, '403 Forbidden');
		if (empty ($data['ojeos'])||$data['ojeos']==null)
			show_404 ();
		$this->load->view ('ojeo/index', $data);
	}
  /**
  * Este metodo permite agregar un nuevo jugador.
  *
  * En caso de que sea agregado correctamente, devuelve sus datos (id,nombre,posicion) en formato JSON.
  *
  *  Un ejemplo de uso es : .../jugadores/$nombre/$posicion . Utiliza el verbo HTTP POST.
  *
  * @param string $nombre Nombre del Jugador
  * @param string $posicion Posicion del Jugador 
  *
  * @api
  * @return void
  */	
    public function agregar($nombre, $posicion) {
		$data['agregado'] = $this->jugador_model->agregar_jugador ($nombre, $posicion);
		if (! $this->autenticar ())
			 show_error('No estás autorizado para acceder a esta página', 403, '403 Forbidden');
		if (empty ($data['agregado'])||$data['agregado']==null)
			show_404 ();
		$this->load->view ('jugador/agregado', $data);
    }
  /**
  * Este metodo permite modificar un  jugador.
  *
  * En caso de que sea modificado correctamente, devuelve sus datos actualizados (id,nombre,posicion) en formato JSON.
  *
  * Un ejemplo de uso es : .../jugadores/$id/$nombre/$posicion . Utiliza el verbo HTTP POST.
  *
  * @param int $id ID del Jugador
  * @param string $nombre Nombre del Jugador
  * @param string $posicion Posicion del Jugador 
  *
  * @api
  * @return void
  */	
    public function modificar($id, $nombre, $posicion) {
		$data['modificado'] = $this->jugador_model->modificar_jugador ($id, $nombre, $posicion);
		if (! $this->autenticar ())
			 show_error('No estás autorizado para acceder a esta página', 403, '403 Forbidden');
		if (empty ($data['modificado'])||$data['modificado']==null)
			show_404 ();
		$this->load->view ('jugador/modificado', $data);
    }
  /**
  * Este metodo permite eliminar un jugador.
  *
  * En caso de que sea eliminado correctamente, devuelve sus datos (id,nombre,posicion) en formato JSON.
  *
  * Un ejemplo de uso es : .../jugadores/$id . Utiliza el verbo HTTP DELETE.
  *
  * @param int $id ID del Jugador
  *
  * @api
  * @return void
  */	
	public function eliminar($id)
	{
		$data['eliminado'] = $this->jugador_model->eliminar_jugador ($id);
		if (! $this->autenticar ())
			 show_error('No estás autorizado para acceder a esta página', 403, '403 Forbidden');
		if (empty ($data['eliminado'])||$data['eliminado']==null)
			show_404 ();
		$this->load->view ('jugador/eliminado', $data);
	}
	public function verPorFecha()
	{
		$data['jugadores'] = $this->jugador_model->ver_por_fecha ();
		if (! $this->autenticar ())
			 show_error('No estás autorizado para acceder a esta página', 403, '403 Forbidden');
		if (empty ($data['jugadores'])||$data['jugadores']==null)
			show_404 ();
		$this->load->view ('jugador/index', $data);
	}
	
	public function autenticar () {
		return $this->session->nombre != null;
	}
}
