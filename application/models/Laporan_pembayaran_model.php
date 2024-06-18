<?php

/**
 * @property $db
 */
class Laporan_pembayaran_model extends CI_Model
{
	public function get_all_atlet()
	{
		return $this->db->get('atlet')->result();
	}

	public function get_join_pembayaran_filter($bulan = null, $tahun = null)
	{
		$this->db->select('*');
		$this->db->select('pembayaran.id_dojang as id_dojang_pembayaran, pembayaran.id_atlet as id_atlet_pembayaran, iuran.id_iuran, iuran.periode as periode_iuran');
		$this->db->from('pembayaran');
		$this->db->join('dojang', 'pembayaran.id_dojang = dojang.id_dojang');
		$this->db->join('atlet', 'pembayaran.id_atlet = atlet.id_atlet');
		$this->db->join('iuran', 'pembayaran.id_iuran = iuran.id_iuran');

		// Filter berdasarkan bulan dan tahun jika diberikan
		if ($bulan && $tahun) {
			$this->db->where('MONTH(iuran.periode)', $bulan);
			$this->db->where('YEAR(iuran.periode)', $tahun);
		}

		return $this->db->get()->result();
	}

	/**
	 * @return void
	 */
	public function make_query(): void
	{
		$this->db->select('pembayaran.*, dojang.nama_dojang, atlet.nama_atlet, iuran.nominal'); // Sesuaikan dengan kolom yang ingin ditampilkan
		$this->db->from('pembayaran'); // Sesuaikan dengan nama tabel pembayaran
		$this->db->join('dojang', 'pembayaran.id_dojang=dojang.id_dojang', 'left');
		$this->db->join('atlet', 'pembayaran.id_atlet=atlet.id_atlet', 'left');
		$this->db->join('iuran', 'pembayaran.id_iuran=iuran.id_iuran', 'left');

		if (isset($_POST["search"]["value"])) {
			// Sesuaikan dengan kolom yang ingin difilter
			$this->db->like("nama_atlet", $_POST["search"]["value"]);
			$this->db->or_like("nama_dojang", $_POST["search"]["value"]);
		}

		if (isset($_POST["order"])) {
			// Sesuaikan dengan kolom yang ingin diurutkan
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_pembayaran', 'DESC');
		}
	}

	public function make_datatables() {
		$this->make_query();
		if (isset($_POST["length"]) && $_POST["length"] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result(); //_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function get_filtered_data()
	{
		$this->make_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function get_all_data() {
		$this->db->select("*");
		$this->db->from("pembayaran"); // Sesuaikan dengan nama tabel pembayaran
		return $this->db->count_all_results();
	}
}
