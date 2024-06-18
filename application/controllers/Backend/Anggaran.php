<?php

/**
 * Anggaran Controller
 * Controller untuk mengelola anggaran
 *
 * @package Codeigniter
 * @subpackage Controllers
 * @Category Anggaran
 * @author rizky adi ryanto
 * @link github.com/rizkyadiryanto14
 *
 * @property $Anggaran_model
 * @property $input
 * @property $session
 */

class Anggaran extends CI_Controller
{

	/**
	 * Construct Anggaran
	 * Construct ini aka menjalankan fungsi default
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Anggaran_model');
	}

	public function index(): void
	{
		$data_array = [
			'data_anggaran'			=> $this->Anggaran_model->get_all_join_anggaran(),
			'data_kategori_belanja'	=> $this->Anggaran_model->listing_kategori_belanja(),
			'data_belanja'			=> $this->Anggaran_model->listing_belanja(),
			'data_dojang'			=> $this->Anggaran_model->listing_dojang(),
			'title'					=> 'Halaman Anggaran'
		];
		$this->load->view('backend/anggaran', $data_array);
	}

	/**
	 * Memasukan data kedalam tabel anggaran
	 * @return void
	 */

	public function insert(): void
	{
		$post = $this->input->post();

		$insert_anggaran = $this->Anggaran_model->insert_anggaran($post);

		if($insert_anggaran){
			$this->session->set_flashdata('sukses', 'Data Anggaran Berhasil Ditambahkan');
		}else {
			$this->session->set_flashdata('gagal', 'Data Anggaran Gagal Ditambahkan');
		}
		redirect(base_url('anggaran'));
	}

	/**
	 * Menampilkan data anggaran berdasarkan ID
	 * @param $id_anggaran
	 * @return void
	 */

	public function detail($id_anggaran): void
	{
		$atlet = $this->Anggaran_model->detail_anggaran($id_anggaran);
		echo json_encode($atlet);
	}

	/**
	 * Update data anggaran berdasarkan ID
	 * @param $id_anggaran
	 * @return void
	 */

	public function update($id_anggaran): void
	{
		$post = $this->input->post();
		$update_anggaran = $this->Anggaran_model->update_anggaran($id_anggaran, $post);

		if ($update_anggaran){
			$this->session->set_flashdata('sukses', 'Data Anggaran Berhasil Diupdate');
		}else {
			$this->session->set_flashdata('gagal', 'Data Gagal Berhasil Diupdate');
		}
		redirect(base_url('anggaran'));
	}

	/**
	 * Menghapus Data Anggaran Berdasarkan ID
	 * @param $id_anggaran
	 * @return void
	 */

	public function delete($id_anggaran): void
	{
		$delete_anggaran = $this->Anggaran_model->delete_anggaran($id_anggaran);

		if ($delete_anggaran){
			$this->session->set_flashdata('sukses', 'Data Kategori Anggaran Berhasil Dihapus');
		}else {
			$this->session->set_flashdata('gagal', 'Data Kategori Anggaran Gagal Dihapus');
		}
		redirect(base_url('anggaran'));
	}
}
