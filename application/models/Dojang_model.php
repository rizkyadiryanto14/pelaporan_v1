<?php

/**
 * @property $db
 */
class Dojang_model extends  CI_Model
{
	public function get_all_dojang()
	{
		return $this->db->get('dojang')->result();
	}

	public function get_dojang_id($id_dojang)
	{
		return $this->db->get_where('dojang', array('id_dojang' => $id_dojang))->row_array();
	}

	public function insert_dojang($data)
	{
		return $this->db->insert('dojang', $data);
	}

	public function updata_dojang($id_dojang, $data)
	{
		$this->db->where('id_dojang', $id_dojang);
		return $this->db->update('dojang', $data);
	}

	public function delete_dojang($id_dojang)
	{
		$this->db->where('id_dojang', $id_dojang);
		return $this->db->delete('dojang');
	}
}
