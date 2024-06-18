<?php


/**
 *  Controller untuk mengelola Atlet
 *
 * @package Codeigniter
 * @subpackage Controllers
 * @Category Atlet
 * @author rizky adi ryanto
 *
 * @property $Atlet_model
 * @property $input
 * @property $session
 */

class Atlet extends CI_Controller
{
	/**
	 * Fungsi Construct
	 */
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Atlet_model');
	}

	/**
	 * @return void
	 */

	public function index(): void
	{

		$data_array = [
			'title'      => 'Halaman Atlet',
			'data_atlet' => $this->Atlet_model->get_all_atlet(),
		];

		$this->load->view('backend/atlet', $data_array);
	}


	/**
	 * @param $atletId
	 * @return void
	 */

	public function detail($atletId): void
	{
		$atlet = $this->Atlet_model->get_atlet_id($atletId);
		echo json_encode($atlet);
	}

	/**
	 * @return void
	 */
	public function insert(): void
	{
		$post = $this->input->post();
		$insert_atlet = $this->Atlet_model->insert_atlet($post);

		if ($insert_atlet) {
			$this->session->set_flashdata('sukses', 'Data Atlet Berhasil Di Tambahkan');
		} else {
			$this->session->set_flashdata('gagal', 'Data Atlet Gagal Di Tambahkan');
		}
		redirect(base_url('atlet'));
	}

	/**
	 * @param $id_atlet
	 * @return void
	 */

	public function update($id_atlet): void
	{
		// HTTP POST
		if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$data = array(
				'nama_atlet' => $this->input->post('nama_atlet'),
				'email' => $this->input->post('email'),
				'alamat' => $this->input->post('alamat'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'tempat_lahir' => $this->input->post('tempat_lahir')
			);

			$this->Atlet_model->update_atlet($id_atlet, $data);

			redirect(base_url('atlet'));
		}
	}

	public function delete($id_atlet): void
	{
		$delete = $this->Atlet_model->delete_atlet($id_atlet);
		if ($delete) {
			$this->session->set_flashdata('sukses', 'Data Atlet Berhasil Di Hapus');
		} else {
			$this->session->set_flashdata('gagal', 'Data Atlet Gagal Di Hapus');
		}
		redirect(base_url('atlet'));
	}
}
