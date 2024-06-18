<?php

/**
 * @property $db
 */
class  Laporan_atlet_model extends CI_Model
{

	public function get_all_atlet()
	{
		return $this->db->get('atlet')->result();
	}

	/**
	 * @return void
	 */
	public function make_query(): void
	{
		$this->db->select('atlet.*'); // Sesuaikan dengan kolom yang ingin ditampilkan
		$this->db->from('atlet'); // Sesuaikan dengan nama tabel atlet

		if (isset($_POST["search"]["value"])) {
			// Sesuaikan dengan kolom yang ingin difilter
			$this->db->like("nama_atlet", $_POST["search"]["value"]);
			$this->db->or_like("jenis_kelamin", $_POST["search"]["value"]);
		}

		if (isset($_POST["order"])) {
			// Sesuaikan dengan kolom yang ingin diurutkan
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else {
			$this->db->order_by('id_atlet', 'DESC');
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
		$this->db->from("atlet"); // Sesuaikan dengan nama tabel atlet
		return $this->db->count_all_results();
	}
}
