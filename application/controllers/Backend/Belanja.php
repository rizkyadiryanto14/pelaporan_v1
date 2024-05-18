<?php

/**
 * @property $Belanja_model
 * @property $input
 * @property $session
 */
class Belanja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Belanja_model');
	}

	public function index(): void
	{
		$data_array = [
			'data_belanja'	=> $this->Belanja_model->get_all_belanja(),
			'title'		=> 'Halaman Belanja'
		];
		$this->load->view('backend/belanja', $data_array);
	}

	public function insert(): void
	{
		$post = $this->input->post();

		$insert_belanja = $this->Belanja_model->insert_belanja($post);

		if($insert_belanja){
			$this->session->set_flashdata('sukses', 'Data Belanja Berhasil Ditambahkan');
		}else {
			$this->session->set_flashdata('gagal', 'Data Belanja Gagal Ditambahkan');
		}
		redirect(base_url('belanja'));
	}

	public function detail($id_belanja): void
	{
		$atlet = $this->Belanja_model->get_iuran_id($id_belanja);
		echo json_encode($atlet);
	}

	public function update($id_belanja): void
	{
		$post = $this->input->post();
		$update_belanja = $this->Belanja_model->update_belanja($id_belanja, $post);

		if ($update_belanja){
			$this->session->set_flashdata('sukses', 'Data Belanja Berhasil Diupdate');
		}else {
			$this->session->set_flashdata('gagal', 'Data Gagal Berhasil Diupdate');
		}
		redirect(base_url('belanja'));
	}

	public function delete($id_belanja): void
	{
		$delete_belanja = $this->Belanja_model->delete_belanja($id_belanja);

		if ($delete_belanja){
			$this->session->set_flashdata('sukses', 'Data Kategori Belanja Berhasil Dihapus');
		}else {
			$this->session->set_flashdata('gagal', 'Data Kategori Belanja Gagal Dihapus');
		}
		redirect(base_url('belanja'));
	}
}
