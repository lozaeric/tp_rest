<?php

	class Jugador_model extends CI_Model {
		public function __construct () {
			parent::__construct ();
			$this->load->database();
		}


		public function get_jugadores ($id=FALSE) {
			if ($id===FALSE) {
				$query = $this->db->get ('jugador');
				return $query->result_array();
			}
			$query = $this->db->get_where ('jugador', array ('id'=>$id));
			return $query->row_array ();
		}

                public function agregar_jugador ($nombre, $posicion) {
			$data = array ("nombre"=>$nombre, "posicion"=>$posicion);
			$this->db->insert('jugador', $data);
			$query = $this->db->get_where ('jugador', $data);
			if (empty($query->row_array ()))
				return null;
			return true;
                }

                public function modificar_jugador ($id, $nombre, $posicion) {
			$data = array ('nombre'=>$nombre, 'posicion'=>$posicion);
			$this->db->update('jugador', $data, array('id' => $id));
			$query = $this->db->get_where ('jugador', array ('id'=>$id, 'nombre'=>$nombre, 'posicion'=>$posicion));
			if (empty($query->row_array ()))
				return null;
			return true;
                }

		public function eliminar_jugador ($id) {
			$query = $this->db->get_where ('jugador', array ('id'=>$id));
			if (empty($query->row_array ()))
				return null;
			return $this->db->delete('jugador', array('id' => $id));
		}

	}

?>
