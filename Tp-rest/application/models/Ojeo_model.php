<?php

	class Ojeo_model extends CI_Model {
		public function __construct () {
			parent::__construct ();
			$this->load->database();
		}

		public function get_ojeos ($id=FALSE) {
			if ($id===FALSE) {
				$query = $this->db->get ('ojeo');
				return $query->result_array();
			}
			$query = $this->db->get_where ('ojeo', array ('id'=>$id));
			return $query->row_array ();
		}

		public function eliminar ($id) {
			$query = $this->db->get_where ('ojeo', array ('id'=>$id));
			if (empty($query->row_array ()))
				return null;
			return $this->db->delete('ojeo', array('id' => $id));
		}

                public function get_ojeos_jugador ($idJugador) {
			$query = $this->db->get_where ('ojeo', array ('idJugador'=>$idJugador));
			return $query->row_array ();
                }
	}

?>
