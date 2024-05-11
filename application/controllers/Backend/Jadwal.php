<?php

/**
 * @property $Jadwal_model
 * @property $Dojang_model
 * @property $Pelatih_model
 * @property $Kategori_model
 * @property $input
 * @property $session
 */

class Jadwal extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jadwal_model');
		$this->load->model('Dojang_model');
		$this->load->model('Pelatih_model');
		$this->load->model('Kategori_model');
	}

	public function index(): void
	{
		$data_array = [
			'title'			=> 'Halaman Jadwal',
			'data_jadwal'	=> $this->Jadwal_model->get_all_join_jadwal(),
			'data_pelatih'	=> $this->Pelatih_model->get_all_pelatih(),
			'data_dojang'	=> $this->Dojang_model->get_all_dojang(),
			'data_kategori'	=> $this->Kategori_model->get_all_kategori_sabuk()
		];
		$this->load->view('backend/jadwal', $data_array);
	}

	public function detail($id_jadwal): void
	{
		$get_detail_jadwal = $this->Jadwal_model->get_id_join_jadwal($id_jadwal);

		$detail_jadwal = [
			'id_dojang' => $get_detail_jadwal['id_dojang_jadwal'],
			'id_pelatih'=> $get_detail_jadwal['id_pelatih'],
			'id_kategori'=> $get_detail_jadwal['id_kategori'],
			'id_jadwal'	=> $get_detail_jadwal['id_jadwal'],
			'dojang'	=> $get_detail_jadwal['nama_dojang'],
			'pelatih'	=> $get_detail_jadwal['nama_pelatih'],
			'tanggal'	=> $get_detail_jadwal['tanggal'],
			'tempat'	=> $get_detail_jadwal['tempat'],
			'kategori'	=> $get_detail_jadwal['nama_kategori'],
			'keterangan'=> $get_detail_jadwal['keterangan_kategori'],

		];

		echo json_encode($detail_jadwal);
	}

	public function insert(): void
	{
		$post = $this->input->post();

		$insert_jadwal = $this->Jadwal_model->insert_jadwal($post);

		if ($insert_jadwal){
			$this->session->set_flashdata('sukses', 'Data Jadwal Berhasil Di Tambahkan');
		}else {
			$this->session->set_flashdata('gagal', 'Data Jadwal Gagal Di Tambahkan');
		}
		redirect(base_url('jadwal'));
	}

	public function update($id_jadwal): void
	{
		// Pastikan request adalah HTTP POST
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Ambil data dari form
			$data = array(
				'id_dojang'	=> $this->input->post('id_dojang'),
				'id_pelatih' => $this->input->post('id_pelatih'),
				'id_kategori' => $this->input->post('id_kategori'),
				'tempat' => $this->input->post('tempat'),
				'tanggal' => $this->input->post('tanggal'),
				'keterangan' => $this->input->post('keterangan'),

			);

			// Panggil model untuk update data atlet
			$update_jadwal = $this->Jadwal_model->update_jadwal($id_jadwal, $data);

			if ($update_jadwal){
				$this->session->set_flashdata('sukses', 'Data Jadwal Berhasil Di Update');
			}else {
				$this->session->set_flashdata('gagal', 'Data Jadwal Gagal Di Update');
			}

			// Redirect ke halaman yang sesuai setelah update
			redirect(base_url('jadwal'));
		}
	}

	public function delete($id_jadwal)
	{
		$delete = $this->Jadwal_model->delete_jadwal($id_jadwal);

		if ($delete){
			$this->session->set_flashdata('sukses', 'Data Jadwal Berhasil Di Hapus');
		}else {
			$this->session->set_flashdata('gagal', 'Data Jadwal Gagal Di Hapus');
		}

		redirect(base_url('jadwal'));
	}
}
