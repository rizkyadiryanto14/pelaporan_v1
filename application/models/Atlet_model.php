<?php

/**
 * @property $db
 */
class Atlet_model extends CI_Model
{
	public function get_all_atlet()
	{
		return $this->db->get('atlet')->result();
	}

	public function get_atlet_id($id_atlet)
	{
		return $this->db->get_where('atlet', array('id_atlet' => $id_atlet))->row_array();
	}

	public function insert_atlet($data)
	{
		return $this->db->insert('atlet', $data);
	}

	public function update_atlet($id_atlet, $data)
	{
		$this->db->where('id_atlet', $id_atlet);
		return $this->db->update('atlet', $data);
	}

	public function delete_atlet($id_atlet)
	{
		$this->db->where('id_atlet', $id_atlet);
		return $this->db->delete('atlet');
	}

}
