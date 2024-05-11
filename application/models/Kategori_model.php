<?php

/**
 * @property $db
 */
class Kategori_model extends CI_Model
{
	public function get_all_kategori_sabuk()
	{
		return $this->db->get('kategori_sabuk')->result();
	}

	public function get_kategori_sabuk_id($id_kategori_sabuk)
	{
		return $this->db->get_where('kategori_sabuk', array('id_kategori' => $id_kategori_sabuk))->row_array();
	}

	public function insert_kategori_sabuk($data)
	{
		return $this->db->insert('kategori_sabuk', $data);
	}

	public function updata_kategori_sabuk($id_kategori_sabuk, $data)
	{
		$this->db->where('id_kategori', $id_kategori_sabuk);
		return $this->db->update('kategori_sabuk', $data);
	}

	public function delete_kategori_sabuk($id_kategori_sabuk)
	{
		$this->db->where('id_kategori', $id_kategori_sabuk);
		return $this->db->delete('kategori_sabuk');
	}
}
