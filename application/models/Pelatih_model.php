<?php

/**
 * @property $db
 */
class Pelatih_model extends CI_Model
{
	public function get_all_pelatih()
	{
		return $this->db->get('pelatih')->result();
	}

	public function get_all_join_pelatih()
	{
		$this->db->select('*');
		$this->db->select('pelatih.email as email_pelatih');
		$this->db->from('pelatih');
		$this->db->join('dojang', 'pelatih.id_dojang=dojang.id_dojang', 'left');
		return $this->db->get()->result();
	}

	public function get_join_id_pelatih($id_pelatih)
	{
		$this->db->select('*');
		$this->db->select('pelatih.email as email_pelatih');
		$this->db->from('pelatih');
		$this->db->join('dojang', 'pelatih.id_dojang=dojang.id_dojang', 'left');
		$this->db->where('pelatih.id_pelatih', $id_pelatih);
		return $this->db->get()->row_array();
	}

	public function get_pelatih_id($id_pelatih)
	{
		return $this->db->get_where('pelatih', array('id_pelatih' => $id_pelatih))->row_array();
	}

	public function insert_pelatih($data)
	{
		return $this->db->insert('pelatih', $data);
	}

	public function update_pelatih($id_pelatih, $data)
	{
		$this->db->where('id_pelatih', $id_pelatih);
		return $this->db->update('pelatih', $data);
	}

	public function delete_pelatih($id_pelatih)
	{
		$this->db->where('id_pelatih', $id_pelatih);
		return $this->db->delete('pelatih');
	}
}
