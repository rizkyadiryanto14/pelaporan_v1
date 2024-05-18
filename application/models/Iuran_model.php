<?php

/**
 * @property $db
 */
class Iuran_model extends CI_Model
{
	public function get_all_iuran()
	{
		return $this->db->get('iuran')->result();
	}

	public function get_iuran_id($id_iuran)
	{
		return $this->db->get_where('iuran', array('id_iuran' => $id_iuran))->row_array();
	}

	public function insert_iuran($data)
	{
		return $this->db->insert('iuran', $data);
	}

	public function update_iuran($id_iuran, $data)
	{
		$this->db->where('id_iuran', $id_iuran);
		return $this->db->update('iuran', $data);
	}

	public function delete_iuran($id_iuran)
	{
		$this->db->where('id_iuran', $id_iuran);
		return $this->db->delete('iuran');
	}
}
