<?php

/**
 * @property $db
 */
class Anggaran_model extends CI_Model
{
	public function get_all_anggaran()
	{
		return $this->db->get('anggaran')->result();
	}

	public function get_all_join_anggaran()
	{
		$this->db->select('*');
		$this->db->from('anggaran');
		$this->db->join('kategori_belanja', 'anggaran.id_kategori_belanja=kategori_belanja.id_kategori_belanja' ,'left');
		$this->db->join('belanja', 'anggaran.id_belanja=belanja.id_belanja', 'left');
		$this->db->join('dojang', 'anggaran.id_dojang=dojang.id_dojang', 'left');
		return $this->db->get()->result();
	}

	public function listing_kategori_belanja()
	{
		return $this->db->get('kategori_belanja')->result();
	}
	public function listing_belanja()
	{
		return $this->db->get('belanja')->result();
	}

	public function listing_dojang()
	{
		return $this->db->get('dojang')->result();
	}

	public function detail_anggaran($id_anggaran)
	{
		$this->db->select('*');
		$this->db->from('anggaran');
		$this->db->join('kategori_belanja', 'anggaran.id_kategori_belanja=kategori_belanja.id_kategori_belanja' ,'left');
		$this->db->join('belanja', 'anggaran.id_belanja=belanja.id_belanja', 'left');
		$this->db->join('dojang', 'anggaran.id_dojang=dojang.id_dojang', 'left');
		$this->db->where('anggaran.id_anggaran', $id_anggaran);
		return $this->db->get()->row_array();
	}

	public function insert_anggaran($data)
	{
		return $this->db->insert('anggaran', $data);
	}

	public function update_anggaran($id_anggaran, $data)
	{
		$this->db->where('id_anggaran', $id_anggaran);
		return $this->db->update('anggaran', $data);
	}

	public function delete_anggaran($id_kategori)
	{
		$this->db->where('id_anggaran', $id_kategori);
		return $this->db->delete('anggaran');
	}

	public function get_anggaran_id($id_anggaran)
	{
		return $this->db->get_where('anggaran', array('id_anggaran' => $id_anggaran))->row_array();
	}
}
