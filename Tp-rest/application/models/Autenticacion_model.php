<?php

	class Autenticacion_model extends CI_Model {
		public function __construct () {
			parent::__construct ();
			$this->load->database();
		}

		public function autenticar ($nombre, $password) {
				$this->db->select('nombre');
				$this->db->from('usuario');
				$this->db->where('nombre', $nombre);
				$this->db->where('password', $password);
				$query = $this->db->get ();
				return $query->row_array ()['nombre']!=null && $query->row_array ()['nombre']==$nombre;	
		}

	}

?>
