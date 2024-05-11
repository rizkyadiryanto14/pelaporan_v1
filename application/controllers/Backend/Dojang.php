<?php

/**
 * @property $input
 * @property $Dojang_model
 * @property $session
 */
class Dojang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dojang_model');

	}

	public function index(): void
	{
		$data_array = [
			'title'			=> 'Halaman Dojang',
			'data_dojang'	=> $this->Dojang_model->get_all_dojang()
		];
		$this->load->view('backend/dojang', $data_array);
	}

	public function insert(): void
	{
		$post = $this->input->post();

		$insert = $this->Dojang_model->insert_dojang($post);

		if ($insert){
			$this->session->set_flashdata('sukses', 'Data Dojang Berhasil Di Tambahkan');
		}else {
			$this->session->set_flashdata('gagal', 'Data Dojang Gagal Di Tambahkan');
		}
		redirect(base_url('dojang'));

	}

	public function detail($dojangId): void
	{
		$atlet = $this->Dojang_model->get_dojang_id($dojangId);
		echo json_encode($atlet);
	}

	public function update($id_dojang): void
	{
		// Pastikan request adalah HTTP POST
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Ambil data dari form
			$data = array(
				'no_registrasi'	=> $this->input->post('no_registrasi'),
				'nama_dojang' => $this->input->post('nama_dojang'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'no_telepon' => $this->input->post('no_telepon'),

			);

			// Panggil model untuk update data atlet
			$update_dojang = $this->Dojang_model->updata_dojang($id_dojang, $data);

			if ($update_dojang){
				$this->session->set_flashdata('sukses', 'Data Dojang Berhasil Di Update');
			}else {
				$this->session->set_flashdata('gagal', 'Data Dojang Gagal Di Update');
			}

			// Redirect ke halaman yang sesuai setelah update
			redirect(base_url('dojang'));
		}
	}

	public function delete($id_dojang)
	{
		$delete = $this->Dojang_model->delete_dojang($id_dojang);

		if ($delete){
			$this->session->set_flashdata('sukses', 'Data Dojang Berhasil Di Hapus');
		}else {
			$this->session->set_flashdata('gagal', 'Data Dojang Gagal Di Hapus');
		}
		redirect(base_url('dojang'));
	}

}
