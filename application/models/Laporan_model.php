<?php

/**
 * model for laporan_model
 * @property $db
 */
class Laporan_model extends CI_Model
{
	/**
	 * @return mixed
	 */
	public function getlaporan_atlet()
	{
		return $this->db->get('atlet')->result();
	}

	public function getlaporan_dojang()
	{
		return $this->db->get('dojang')->result();
	}

	public function getlaporan_jadwal()
	{
		return $this->db->get('jadwal')->result();
	}

	public function getlaporan_pembayaran()
	{
		return $this->db->get('pembayaran')->result();
	}

//	datatable laporan pembayaran

}
