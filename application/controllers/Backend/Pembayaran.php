<?php

/**
 * @property $Pembayaran_model
 * @property $Dojang_model
 * @property $Atlet_model
 * @property $input
 * @property $session
 * @property $upload
 */

class Pembayaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pembayaran_model');
		$this->load->model('Dojang_model');
		$this->load->model('Atlet_model');
		$this->load->library('upload');
	}

	public function index(): void
	{
		$data_array = [
			'title'				=> 'Halaman Pembayaran',
			'data_pembayaran'	=> $this->Pembayaran_model->get_join_pembayaran(),
			'data_dojang'		=> $this->Dojang_model->get_all_dojang(),
			'data_atlet'		=> $this->Atlet_model->get_all_atlet(),
		];

		$this->load->view('backend/pembayaran', $data_array);
	}

	public function insert(): void
	{

		$config['upload_path']          = './uploads/bukti_bayar/'; // Set the upload path
		$config['allowed_types']        = 'gif|jpg|png|pdf'; // Allowed file types
		$config['max_size']             = 2048; // Maximum file size in kilobytes (2MB)
		$config['encrypt_name']        = TRUE; // Encrypt file names (optional for security)

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('bukti_bayar')) // Upload the file
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('gagal', 'Gagal upload bukti bayar: ' . $error);
		}
		else
		{
			$upload_data = $this->upload->data();
			$post = $this->input->post();
			$post['bukti_bayar'] = $upload_data['file_name'];
			$post['tgl_bayar']	 = date('Y-m-d H:i:s');

			$insert_pembayaran = $this->Pembayaran_model->insert_pembayaran($post);

			if ($insert_pembayaran) {
				$this->session->set_flashdata('sukses', 'Data Pembayaran berhasil ditambahkan');
			} else {
				$this->session->set_flashdata('gagal', 'Data Pembayaran gagal ditambahkan');
			}
		}
		redirect(base_url('pembayaran'));
	}

	public function detail($id_pembayaran): void
	{
		$detail_pembayaran = $this->Pembayaran_model->get_id_join_pembayaran($id_pembayaran);
		echo  json_encode($detail_pembayaran);
	}

	public function update($id_pembayaran): void
	{

		$config['upload_path']          = './uploads/bukti_bayar/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 2048;
		$config['encrypt_name']        = TRUE; // Optional

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('bukti_bayar')) // Attempt to upload the file
		{
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('gagal', 'Gagal upload bukti bayar: ' . $error);
		}
		else
		{
			$upload_data = $this->upload->data();
			$data['bukti_bayar'] = $upload_data['file_name'];

			// If you want to delete the old file when updating:
			// $old_bukti_bayar = $this->Pembayaran_model->get_bukti_bayar($id_pembayaran);
			// if ($old_bukti_bayar) {
			//     unlink($config['upload_path'] . $old_bukti_bayar);
			// }
		}

		// Ambil data dari form (excluding bukti_bayar if not uploaded)
		$data = array_merge($data, array(
			'id_dojang' => $this->input->post('id_dojang'),
			'id_atlet' => $this->input->post('id_atlet'),
			'metode_pembayaran' => $this->input->post('metode_pembayaran'),
			'tgl_bayar' => date('Y-m-d H:i:s'),
			'status'	=> $this->input->post('status')
		));

		$update_pembayaran = $this->Pembayaran_model->update_pembayaran($id_pembayaran, $data);

		if ($update_pembayaran) {
			$this->session->set_flashdata('sukses', 'Data Pembayaran Berhasil Di Update');
		} else {
			$this->session->set_flashdata('gagal', 'Data Pembayaran Gagal Di Update');
		}

		redirect(base_url('pembayaran')); // Redirect to the appropriate page
	}

	public function delete($id_pembayaran): void
	{
		$delete_pembayaran = $this->Pembayaran_model->delete_pembayaran($id_pembayaran);

		if ($delete_pembayaran){
			$this->session->set_flashdata('sukses','Data Pembayaran Berhasil Di Update');
		}else {
			$this->session->set_flashdata('gagal', 'Data Pembayaran Gagal Di Update');
		}
		redirect(base_url('pembayaran'));
	}

}
