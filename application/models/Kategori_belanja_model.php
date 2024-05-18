<?php

/**
 * @property $db
 */
class Kategori_belanja_model extends CI_Model
{
	public function get_all_kategori()
	{
		return $this->db->get('kategori_belanja')->result();
	}

	public function insert_kategori($data)
	{
		return $this->db->insert('kategori_belanja', $data);
	}

	public function update_kategori($id_kategori_belanja, $data)
	{
		$this->db->where('id_kategori_belanja', $id_kategori_belanja);
		return $this->db->update('kategori_belanja', $data);
	}

	public function delete_kategori($id_kategori)
	{
		$this->db->where('id_kategori_belanja', $id_kategori);
		return $this->db->delete('kategori_belanja');
	}

	public function get_iuran_id($id_kategori)
	{
		return $this->db->get_where('kategori_belanja', array('id_kategori_belanja' => $id_kategori))->row_array();
	}
}
