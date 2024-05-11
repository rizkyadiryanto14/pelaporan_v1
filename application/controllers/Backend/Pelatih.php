<?php

/**
 * @property $Pelatih_model
 * @property $Dojang_model
 * @property $input
 * @property $session
 */

class Pelatih extends  CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelatih_model');
		$this->load->model('Dojang_model');
	}

	public function index(): void
	{
		$data_array = [
			'title'			=> 'Halaman Pelatih',
			'data_pelatih'	=> $this->Pelatih_model->get_all_join_pelatih(),
			'data_dojang'	=> $this->Dojang_model->get_all_dojang()
		];
		$this->load->view('backend/pelatih', $data_array);
	}

	public function detail($id_pelatih): void
	{
		$detail_pelatih = $this->Pelatih_model->get_join_id_pelatih($id_pelatih);
		echo json_encode($detail_pelatih);
	}

	public function insert(): void
	{
		$post = $this->input->post();

		$insert_pelatih = $this->Pelatih_model->insert_pelatih($post);

		if ($insert_pelatih){
			$this->session->set_flashdata('sukses', 'Data Pelatih Berhasil Di Tambahkan');
		}else{
			$this->session->set_flashdata('gagal', 'Data Pelatih Gagal Di Tambahkan');
		}
		redirect(base_url('pelatih'));
	}

	public function update($id_pelatih): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Ambil data dari form
			$data = array(
				'id_dojang' => $this->input->post('id_dojang'),
				'nama_pelatih' => $this->input->post('nama_pelatih'),
				'email' => $this->input->post('email'),
			);

			$update_pelatih = $this->Pelatih_model->update_pelatih($id_pelatih, $data);

			if ($update_pelatih) {
				$this->session->set_flashdata('sukses', 'Data Jadwal Berhasil Di Update');
			} else {
				$this->session->set_flashdata('gagal', 'Data Jadwal Gagal Di Update');
			}

			redirect(base_url('pelatih'));
		}
	}

	public function delete($id_pelatih): void
	{
		$data_pelatih = $this->Pelatih_model->delete_pelatih($id_pelatih);
		if ($data_pelatih){
			$this->session->set_flashdata('sukses', 'Data Pelatih Berhasil Di Hapus');
		}else {
			$this->session->set_flashdata('gagal', 'Data Pelatih Gagal Di Hapus');
		}
		redirect(base_url('pelatih'));
	}
}
