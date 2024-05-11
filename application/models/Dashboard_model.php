<?php

/**
 * @property $db
 */
class Dashboard_model extends CI_Model
{
	public function get_total_atlet() {
		$this->db->select('COUNT(*) AS total_atlet');
		$this->db->from('atlet');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result['total_atlet'];
		} else {
			return 0;
		}
	}

	public function get_total_dojang() {
		$this->db->select('COUNT(*) AS total_dojang');
		$this->db->from('dojang');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result['total_dojang'];
		} else {
			return 0;
		}
	}

	public function get_total_pelatih() {
		$this->db->select('COUNT(*) AS total_pelatih');
		$this->db->from('dojang');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result['total_pelatih'];
		} else {
			return 0;
		}
	}
	public function get_total_user() {
		$this->db->select('COUNT(*) AS total_user');
		$this->db->from('user');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			return $result['total_user'];
		} else {
			return 0;
		}
	}
}
