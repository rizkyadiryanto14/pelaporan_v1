<?php

/**
 * @property $Pembayaran_model
 * @property $Dojang_model
 * @property $Atlet_model
 * @property $Iuran_model
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
		$this->load->model('Iuran_model');
		$this->load->library('upload');
	}

	public function index(): void
	{
		$data_array = [
			'title'				=> 'Halaman Pembayaran',
			'data_pembayaran'	=> $this->Pembayaran_model->get_join_pembayaran(),
			'data_dojang'		=> $this->Dojang_model->get_all_dojang(),
			'data_atlet'		=> $this->Atlet_model->get_all_atlet(),
			'data_iuran'		=> $this->Iuran_model->get_all_iuran()
		];

		$this->load->view('backend/pembayaran', $data_array);
	}

	public function insert(): void
	{

		$config['upload_path']          = './uploads/bukti_bayar/';
		$config['allowed_types']        = 'gif|jpg|png|pdf';
		$config['max_size']             = 2048;
		$config['encrypt_name']        = TRUE;

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('bukti_bayar')) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('gagal', 'Gagal upload bukti bayar: ' . $error);
		} else {
			$upload_data = $this->upload->data();
			$data['bukti_bayar'] = $upload_data['file_name'];
		}

		// Ambil data iuran dan konversi nominal ke integer
		$nominal_iuran = $this->Iuran_model->get_iuran_id($this->input->post('id_iuran'));
		$nominal_iuran = (int) $nominal_iuran['nominal']; // Konversi ke integer

		// Ambil data dari form
		$data = array_merge($data, array(
			'id_dojang' => $this->input->post('id_dojang'),
			'id_iuran' => $this->input->post('id_iuran'),
			'id_atlet' => $this->input->post('id_atlet'),
			'nominal_pembayaran' => $this->input->post('nominal_pembayaran'),
			'jumlah_pembayaran'    => $this->input->post('jumlah_pembayaran'),
			'metode_pembayaran' => $this->input->post('metode_pembayaran'),
			'tgl_bayar' => date('Y-m-d H:i:s'),
		));

		// Hitung sisa pembayaran
		$sisa_pembayaran = $nominal_iuran - (int) $this->input->post('nominal_pembayaran');

		//  sisa pembayaran tidak negatif
		// $sisa_pembayaran = max($sisa_pembayaran);

		// Update data pembayaran dengan sisa pembayaran
		$data['sisa'] = $sisa_pembayaran;

		// Update tabel pembayaran
		$insert_pembayaran = $this->Pembayaran_model->insert_pembayaran($data);

		if ($insert_pembayaran) {
			$this->session->set_flashdata('sukses', 'Data Pembayaran Berhasil Di Tambahkan');
		} else {
			$this->session->set_flashdata('gagal', 'Data Pembayaran Gagal Di Tambahkan');
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
		// Konfigurasi upload bukti bayar (tidak berubah)
		$config['upload_path']          = './uploads/bukti_bayar/';
		$config['allowed_types']        = 'gif|jpg|jpeg|png|pdf';
		$config['max_size']             = 2048;
		$config['encrypt_name']        = TRUE;

		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('bukti_bayar')) {
			$error = $this->upload->display_errors();
			$this->session->set_flashdata('gagal', 'Gagal upload bukti bayar: ' . $error);
			redirect(base_url('pembayaran'));
		} else {
			$upload_data = $this->upload->data();
			$data['bukti_bayar'] = $upload_data['file_name'];
		}

		$Pembayaran = $this->Pembayaran_model->get_id_pembayaran($id_pembayaran);
		$Pembayaran = (int) $Pembayaran['sisa'];
		
		if($Pembayaran <= (int) $this->input->post('nominal_pembayaran')){
			$this->session->set_flashdata('gagal' , 'Nilai Pembayaran Lebih Besar Dari Sisa Pembayaran, Harap perhatikan lagi');
			redirect(base_url('pembayaran'));
		}

		// Ambil data dari form
		$data = array_merge($data, array(
			'id_dojang' => $this->input->post('id_dojang'),
			'id_iuran' => $this->input->post('id_iuran'),
			'id_atlet' => $this->input->post('id_atlet'),
			'nominal_pembayaran' => (int) $this->input->post('nominal_pembayaran'),
			'jumlah_pembayaran'    => $this->input->post('jumlah_pembayaran'),
			'metode_pembayaran' => $this->input->post('metode_pembayaran'),
			'tgl_bayar' => date('Y-m-d H:i:s'),
		));


		// Hitung sisa pembayaran
		$sisa_pembayaran = $Pembayaran - (int) $data['nominal_pembayaran'];
		//  sisa pembayaran tidak negatif
		//$sisa_pembayaran = max($sisa_pembayaran ,0);

		// Update data pembayaran dengan sisa pembayaran
		$data['sisa'] = $sisa_pembayaran;

		// Update tabel pembayaran
		$update_pembayaran = $this->Pembayaran_model->update_pembayaran($id_pembayaran, $data);

		if ($update_pembayaran) {
			$this->session->set_flashdata('sukses', 'Data Pembayaran Berhasil Di Update');
		} else {
			$this->session->set_flashdata('gagal', 'Data Pembayaran Gagal Di Update');
		}
	
		redirect(base_url('pembayaran'));
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

	public function get_pembayaran_json(): void
	{
		$fetch_data = $this->Pembayaran_model->make_datatables();

		$data = array();
		$no = 1;

		if ($fetch_data) {
			foreach ($fetch_data as $row) {
				$sub_array = array();
				$sub_array[] = $no++;
				$sub_array[] = $row->nama_dojang;
				$sub_array[] = $row->nama_atlet;
				$sub_array[] = $row->nominal;
				$sub_array[] = $row->jumlah_pembayaran;
				$sub_array[] = 'Rp.'. number_format($row->nominal_pembayaran);
				$sub_array[] = $row->metode_pembayaran;
				$sub_array[] = $row->bukti_bayar;
				$sub_array[] = $row->tgl_bayar;
				$sub_array[] ='Rp.' . number_format( $row->sisa);
				$sub_array[] = '<a href="' . site_url('backend/update_materi_view/' . $row->id_atlet) . '" class="btn btn-info btn-sm update"><ion-icon name="print-outline"></ion-icon></a>';
				$data[] = $sub_array;
			}
		}

		$output = array(
			"draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,
			"recordsTotal" => $this->Pembayaran_model->get_all_data(),
			"recordsFiltered" => $this->Pembayaran_model->get_filtered_data(),
			"data" => $data
		);

		echo json_encode($output);
	}

}
