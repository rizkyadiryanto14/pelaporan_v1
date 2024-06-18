<?php

use Dompdf\Dompdf;

/**
 * @property $Laporan_pembayaran_model
 * @property $Pembayaran_model
 * @property $session
 */

class Laporan_pembayaran extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan_pembayaran_model');
		$this->load->model('Pembayaran_model');
	}

	/**
	 * @return void
	 */
	public function index(): void
	{
		$data_array  =[
			'title'		=> 'Halaman Pembayaran'
		];
		$this->load->view('backend/laporan/pembayaran', $data_array);
	}

	/**
	 * @param $id_pembayaran
	 * @return void
	 */
	public function cetak_pdf_pembayaran(): void
	{
		// Ambil data pembayaran dengan join tabel terkait
		$data['pembayaran'] = $this->Pembayaran_model->get_join_pembayaran();

		// Jika data pembayaran tidak ditemukan, tampilkan pesan error
		if (!$data['pembayaran']) {
			$this->session->set_flashdata('gagal', 'Data pembayaran tidak ditemukan.');
			redirect(base_url('laporan/pembayaran')); // Redirect kembali ke halaman pembayaran
		}

		// Load view untuk menampilkan data dalam format PDF
		$html = $this->load->view('backend/laporan/pdf_pembayaran', $data, true);

		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);

		// (Optional) Set up the paper size and orientation
		$dompdf->setPaper('A4', 'portrait');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream("laporan_pembayaran.pdf", array("Attachment" => false));
	}

	/**
	 * @return void
	 */
	public function cetak_pdf_pembayaran_filter(): void
	{
		// Ambil parameter filter bulan dan tahun
		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		// Ambil data pembayaran yang sudah difilter dari model
		$data['data_pembayaran'] = $this->Laporan_pembayaran_model->get_join_pembayaran_filter($bulan, $tahun);

		// Jika tidak ada data yang sesuai filter
		if (empty($data['data_pembayaran'])) {
			$this->session->set_flashdata('gagal', 'Tidak ada data pembayaran untuk bulan dan tahun yang dipilih.');
			redirect(base_url('laporan/pembayaran')); // Redirect kembali ke halaman data pembayaran
		}

		// Load view untuk menampilkan data dalam format PDF
		$html = $this->load->view('backend/laporan/pdf_pembayaran_filter', $data, true); // Load view dan simpan sebagai string

		// Generate PDF menggunakan Dompdf
		$dompdf = new Dompdf();
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');
		$dompdf->render();

		// Nama file PDF
		$nama_file = 'laporan_pembayaran_' . bulan($bulan) . '_' . $tahun . '.pdf';

		// Output the generated PDF to Browser
		$dompdf->stream($nama_file, array("Attachment" => false));
	}


	public function get_pembayaran_json(): void
	{
		$fetch_data = $this->Laporan_pembayaran_model->make_datatables();

		$data = array();
		$no = 1;

		if ($fetch_data) {
			foreach ($fetch_data as $row) {
				$sub_array = array();
				$sub_array[] = $no++;
				$sub_array[] = $row->nama_dojang;
				$sub_array[] = $row->nama_atlet;
				$sub_array[] = 'Rp.' . number_format($row->nominal);
				$sub_array[] ='Rp.' . number_format( $row->sisa);
				$sub_array[] = $row->jumlah_pembayaran;
				$sub_array[] ='<a href="' . base_url('uploads/bukti_bayar/' .$row->bukti_bayar) . '">Lihat File</a>';
				$sub_array[] = $row->metode_pembayaran;
				$sub_array[] = 'Rp.'. number_format($row->nominal_pembayaran);
				$sub_array[] = $row->tgl_bayar;

				$sub_array[] = '<a href="' . site_url('backend/update_materi_view/' . $row->id_atlet) . '" class="btn btn-info btn-sm update"><ion-icon name="print-outline"></ion-icon></a>';
				$data[] = $sub_array;
			}
		}

		$output = array(
			"draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,
			"recordsTotal" => $this->Laporan_pembayaran_model->get_all_data(),
			"recordsFiltered" => $this->Laporan_pembayaran_model->get_filtered_data(),
			"data" => $data
		);

		echo json_encode($output); // Kirim data dalam format JSON
	}
}
