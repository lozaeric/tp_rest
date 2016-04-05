<?php

	class Ojeo_model extends CI_Model {
		private $ojeos;

		public function __construct () {
				parent::__construct ();
				$this->ojeos = array( array("idJugador"=>1, "comentarios"=>"bueno", "fecha"=>"2016/1/1", "costoPase"=>200000, "clubActual"=>"Boca Juniors"),
                                                      array("idJugador"=>2, "comentarios"=>"dios", "fecha"=>"2016/3/1", "costoPase"=>9999999, "clubActual"=>"Barcelona"));
		}

		public function get_ojeos ($id=FALSE) {
			if ($id===FALSE)
				return $this->ojeos;
			return $this->ojeos[$id];
		}

		public function eliminar_ojeo ($id) {
			if (isset ($this->ojeos[$id])) {
                            unset ($this->ojeos[$id]);
                            return true;
                        }
			return false;
		}
                
                public function get_ojeos_jugador ($idJugador) {
                    $ojeosJugador = array();
                    
                    foreach ($this->ojeos as $o) {
                        if ($o["idJugador"]==$idJugador)
                            $ojeosJugador[] = $o;
                    }
                    
                    return $ojeosJugador;
                }
	}

?>
