<?php

	class Jugador_model extends CI_Model {
		private $jugadores;

		public function __construct () {
				parent::__construct ();
				$this->jugadores = array( array("nombre"=>"martin palermo", "posicion"=>"delantero") , 
                                                          array("nombre"=>"lionel messi", "posicion"=>"delantero") );
		}

                
		public function get_jugadores ($id=FALSE) {
			if ($id===FALSE)
				return $this->jugadores;
			return $this->jugadores[$id];
		}

                public function agregar_jugador ($nombre, $posicion) {
                    $this->jugadores[] = array ("nombre"=>$nombre, "posicion"=>$posicion);
                }
                
                public function modificar_jugador ($id, $nombre, $posicion) {
                    $this->jugadores[$id] = array ("nombre"=>$nombre, "posicion"=>$posicion);
                }
                
		public function eliminar_jugador ($id) {
			if (isset ($this->jugadores[$id])) {
                            unset ($this->jugadores[$id]);
                            return true;
                        }
			return false;
		}
              
	}

?>
