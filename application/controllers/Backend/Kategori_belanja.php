<?php

/**
 * @property $Kategori_belanja_model
 * @property $input
 * @property $session
 */

class Kategori_belanja extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kategori_belanja_model');
	}

	public function index()
	{
		$data_array = [
			'data_kategori_belanja'	=> $this->Kategori_belanja_model->get_all_kategori(),
			'title'		=> 'Halaman Kategori Belanja'
		];
		$this->load->view('backend/kategori_belanja', $data_array);
	}

	public function insert(): void
	{
		$post = $this->input->post();

		$insert_kategori = $this->Kategori_belanja_model->insert_kategori($post);

		if($insert_kategori){
			$this->session->set_flashdata('sukses', 'Data Kategori Belanja Berhasil Ditambahkan');
		}else {
			$this->session->set_flashdata('gagal', 'Data Kategori Belanja Gagal Ditambahkan');
		}
		redirect(base_url('kategori_belanja'));
	}

	public function detail($id_kategori): void
	{
		$atlet = $this->Kategori_belanja_model->get_iuran_id($id_kategori);
		echo json_encode($atlet);
	}

	public function update($id_kategori_belanja): void
	{
		$post = $this->input->post();
		$update_kategori = $this->Kategori_belanja_model->update_kategori($id_kategori_belanja, $post);

		if ($update_kategori){
			$this->session->set_flashdata('sukses', 'Data Kategori Belanja Berhasil Diupdate');
		}else {
			$this->session->set_flashdata('gagal', 'Data Kategori Gagal Berhasil Diupdate');
		}
		redirect(base_url('kategori_belanja'));
	}

	public function delete($id_kategori_belanja)
	{
		$delete_kategori = $this->Kategori_belanja_model->delete_kategori($id_kategori_belanja);

		if ($delete_kategori){
			$this->session->set_flashdata('sukses', 'Data Kategori Belanja Berhasil Dihapus');
		}else {
			$this->session->set_flashdata('gagal', 'Data Kategori Belanja Gagal Dihapus');
		}
		redirect(base_url('kategori_belanja'));
	}
}
