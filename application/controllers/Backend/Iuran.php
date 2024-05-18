<?php

/**
 * @property $input
 * @property $Iuran_model
 * @property $session

 */
class Iuran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Iuran_model');
	}

	public function index(): void
	{
		$data_array = [
			'title'			=> 'Halaman Iuran',
			'data_iuran'	=> $this->Iuran_model->get_all_iuran()
		];
		$this->load->view('backend/iuran', $data_array);
	}

	public function insert(): void
	{
		$post = $this->input->post();
		$insert_iuran = $this->Iuran_model->insert_iuran($post);

		if ($insert_iuran){
			$this->session->set_flashdata('sukses', 'Data Iuran Berhasil Ditambahkan');
		}else {
			$this->session->set_flashdata('gagal', 'Data Iuran Gagal Ditambahkan');
		}
		redirect(base_url('iuran'));
	}

	public function update($id_iuran)
	{
		// Pastikan request adalah HTTP POST
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// Ambil data dari form
			$data = array(
				'kode_iuran'	=> $this->input->post('kode_iuran'),
				'nominal' => $this->input->post('nominal'),
				'keterangan_iuran' => $this->input->post('keterangan_iuran'),
				'jatuh_tempo' => $this->input->post('jatuh_tempo'),

			);

			// Panggil model untuk update data atlet
			$update_iuran = $this->Iuran_model->update_iuran($id_iuran, $data);

			if ($update_iuran){
				$this->session->set_flashdata('sukses', 'Data Iuran Berhasil Di Update');
			}else {
				$this->session->set_flashdata('gagal', 'Data Iuran Gagal Di Update');
			}

			// Redirect ke halaman yang sesuai setelah update
			redirect(base_url('iuran'));
		}
	}

	public function detail($dojangId): void
	{
		$atlet = $this->Iuran_model->get_iuran_id($dojangId);
		echo json_encode($atlet);
	}

	public function delete($id_iuran): void
	{
		$delete = $this->Iuran_model->delete_iuran($id_iuran);

		if ($delete){
			$this->session->set_flashdata('sukses', 'Data Iuran Berhasil Di Hapus');
		}else {
			$this->session->set_flashdata('gagal', 'Data Iuran Gagal Di Hapus');
		}
		redirect(base_url('iuran'));
	}
}
