<?php

use Dompdf\Dompdf;

/**
 * @property $Laporan_atlet_model
 */
class  Laporan_atlet extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Laporan_atlet_model');
	}

	/**
	 * @return void
	 */
	public function index(): void
	{
		$data_array = [
			'title'		=> 'Laporan Atlet'
		];
		$this->load->view('backend/laporan/atlet', $data_array);
	}

	/**
	 * @return void
	 */
	public function cetak_pdf_atlet(): void
	{

		// Ambil data atlet dari database
		$data['atlet'] = $this->Laporan_atlet_model->get_all_atlet();

		// Inisialisasi Dompdf
		$dompdf = new Dompdf();

		// Load tampilan PDF
		$html = $this->load->view('backend/laporan/pdf_atlet', $data, true); // Ganti 'pdf_atlet' dengan nama view Anda

		// Styling tabel (CSS inline)
		$stylesheet = '
            <style>
                table { width: 100%; border-collapse: collapse; }
                th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
                th { background-color: #f2f2f2; }
            </style>
        ';

		// Gabungkan stylesheet dengan HTML
		$html = $stylesheet . $html;

		// Render PDF
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'landscape'); // Opsional: Mengatur ukuran dan orientasi kertas
		$dompdf->render();

		// Output PDF
		$dompdf->stream('data_atlet.pdf', array("Attachment" => false));
	}

	/**
	 * @return void
	 */
	public function get_atlet_json(): void
	{
		$fetch_data = $this->Laporan_atlet_model->make_datatables();

		$data = array();
		$no = 1;

		if ($fetch_data) {
			foreach ($fetch_data as $row) {
				$sub_array = array();
				$sub_array[] = $no++;
				$sub_array[] = $row->nama_atlet;
				$sub_array[] = $row->jenis_kelamin;
				$sub_array[] = $row->tgl_lahir;
				$sub_array[] = $row->alamat;
				$sub_array[] = $row->tempat_lahir;
				$sub_array[] = $row->email;
//				$sub_array[] = '<a href="' . site_url('backend/update_materi_view/' . $row->id_atlet) . '" class="btn btn-info btn-sm update"><ion-icon name="print-outline"></ion-icon></a>';
				$sub_array[] = '<a href="" class="btn btn-info btn-sm update"><ion-icon name="print-outline"></ion-icon></a>';

				$data[] = $sub_array;
			}
		}

		$output = array(
			"draw" => isset($_POST["draw"]) ? intval($_POST["draw"]) : 0,
			"recordsTotal" => $this->Laporan_atlet_model->get_all_data(),
			"recordsFiltered" => $this->Laporan_atlet_model->get_filtered_data(),
			"data" => $data
		);
		echo json_encode($output); // Kirim data dalam format JSON
	}

}
