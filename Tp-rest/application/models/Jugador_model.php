<?php

	class Jugador_model extends CI_Model {
		public function __construct () {
			parent::__construct ();
			$this->load->database();
		}


		public function get_jugadores ($id=FALSE) {/*
			if ($this->input->get('campo')!=null && $this->input->get('orden')!=null) {
				$this->db->select('jugador.id,nombre,posicion, clubActual, costoPase, comentario, fecha');
				$this->db->from('jugador');
				$this->db->join('ojeo', 'jugador.id = ojeo.idJugador', 'left');
				$this->db->order_by($this->input->get('campo'), $this->input->get('orden'));
				$query = $this->db->get ();
				return $query->row_array ();			
			}			*/
			if ($this->input->get('nombre')!=null) {
				$this->db->select('id,nombre,posicion');
				$this->db->like("nombre", $this->input->get('nombre'));
				$query = $this->db->get ('jugador');
				return $query->row_array ();			
			}
			if ($this->input->get('club')!=null) {
				$this->db->select('distinct jugador.id,nombre,posicion');
				$this->db->from('jugador');
				$this->db->join('ojeo', 'ojeo.idJugador = jugador.id');
				$this->db->like("clubActual", $this->input->get('club'));
				$query = $this->db->get ();
				return $query->row_array ();			
			}
			if ($this->input->get('posicion')!=null) {
				$this->db->select('id,nombre,posicion, clubActual');
				$this->db->like("posicion", $this->input->get('posicion'));
				$query = $this->db->get ('jugador');
				return $query->row_array ();			
			}
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
			return $query->row_array ();
        }

        public function modificar_jugador ($id, $nombre, $posicion) {
			$data = array ('nombre'=>$nombre, 'posicion'=>$posicion);
			$this->db->update('jugador', $data, array('id' => $id));
			$query = $this->db->get_where ('jugador', array ('id'=>$id, 'nombre'=>$nombre, 'posicion'=>$posicion));
			return $query->row_array ();
        }

		public function eliminar_jugador ($id) {
			$query = $this->db->get_where ('jugador', array ('id'=>$id));
			$this->db->delete('jugador', array('id' => $id));
			return $query->row_array ();
		}

	}

?>
