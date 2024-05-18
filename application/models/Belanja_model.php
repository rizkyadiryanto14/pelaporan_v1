<?php

/**
 * @property $db
 */
class Belanja_model extends CI_Model
{
	public function get_all_belanja()
	{
		return $this->db->get('belanja')->result();
	}

	public function insert_belanja($data)
	{
		return $this->db->insert('belanja', $data);
	}

	public function update_belanja($id_belanja, $data)
	{
		$this->db->where('id_belanja', $id_belanja);
		return $this->db->update('belanja', $data);
	}

	public function delete_belanja($id_kategori)
	{
		$this->db->where('id_belanja', $id_kategori);
		return $this->db->delete('belanja');
	}

	public function get_iuran_id($id_belanja)
	{
		return $this->db->get_where('belanja', array('id_belanja' => $id_belanja))->row_array();
	}
}
