<?php

/**
 * @property $db
 */
class  Pembayaran_model extends CI_Model
{
	public function get_all_pembayaran()
	{
		return $this->db->get('pembayaran')->result();
	}

	public function get_join_pembayaran()
	{
		$this->db->select('*');
		$this->db->from('pembayaran');
		$this->db->join('dojang', 'pembayaran.id_dojang = dojang.id_dojang');
		$this->db->join('atlet', 'pembayaran.id_atlet = atlet.id_atlet');
		return $this->db->get()->result();
	}

	public function get_id_join_pembayaran($id_pembayaran)
	{
		$this->db->select('*');
		$this->db->select('pembayaran.id_dojang as id_dojang_pembayaran, pembayaran.id_atlet as id_atlet_pembayaran');
		$this->db->from('pembayaran');
		$this->db->join('dojang', 'pembayaran.id_dojang = dojang.id_dojang');
		$this->db->join('atlet', 'pembayaran.id_atlet = atlet.id_atlet');
		$this->db->where('pembayaran.id_pembayaran', $id_pembayaran);
		return $this->db->get()->row_array();
	}

	public function get_id_pembayaran($id_pembayaran)
	{
		return $this->db->get_where('pembayaran', array('id_pembayaran' => $id_pembayaran))->row_array();
	}

	public function insert_pembayaran($data)
	{
		return $this->db->insert('pembayaran', $data);
	}

	public function update_pembayaran($id_pembayaran, $data)
	{
		$this->db->where('id_pembayaran', $id_pembayaran);
		return $this->db->update('pembayaran', $data);
	}

	public function delete_pembayaran($id_pembayaran)
	{
		$this->db->where('id_pembayaran',$id_pembayaran);
		return $this->db->delete('pembayaran');
	}
}
