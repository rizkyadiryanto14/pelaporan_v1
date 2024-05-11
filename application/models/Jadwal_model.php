<?php

/**
 * @property $db
 */
class Jadwal_model extends CI_Model
{
	public function get_all_jadwal()
	{
		return $this->db->get('jadwal')->result();
	}

	public function get_all_join_jadwal()
	{
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->join('dojang', 'jadwal.id_dojang=dojang.id_dojang', 'left');
		$this->db->join('pelatih', 'jadwal.id_pelatih=pelatih.id_pelatih', 'left');
		$this->db->join('kategori_sabuk', 'jadwal.id_kategori=kategori_sabuk.id_kategori', 'left');
		return $this->db->get()->result();
	}

	public function get_id_join_jadwal($id_jadwal)
	{
		$this->db->select('*');
		$this->db->select('jadwal.id_dojang as id_dojang_jadwal');
		$this->db->from('jadwal');
		$this->db->join('dojang', 'jadwal.id_dojang=dojang.id_dojang', 'left');
		$this->db->join('pelatih', 'jadwal.id_pelatih=pelatih.id_pelatih', 'left');
		$this->db->join('kategori_sabuk', 'jadwal.id_kategori=kategori_sabuk.id_kategori', 'left');
		$this->db->where('id_jadwal', $id_jadwal);
		return $this->db->get()->row_array();
	}

	public function get_jadwal_id($id_jadwal)
	{
		return $this->db->get_where('jadwal', array('id_jadwal' => $id_jadwal))->row_array();
	}

	public function insert_jadwal($data)
	{
		return $this->db->insert('jadwal',$data);
	}

	public function update_jadwal($id_jadwal, $data)
	{
		$this->db->where('id_jadwal', $id_jadwal);
		return $this->db->update('jadwal', $data);
	}

	public function delete_jadwal($id_jadwal)
	{
		$this->db->where('id_jadwal',$id_jadwal);
		return $this->db->delete('jadwal');
	}
}
