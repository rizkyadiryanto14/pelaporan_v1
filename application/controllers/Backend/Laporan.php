<?php

/**
 * @property $input
 */
class Laporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * @return void
	 */
	public function index(): void
	{
		$data_array = [
			'title'		=> 'Halaman Laporan'
		];
		$this->load->view('backend/laporan', $data_array);
	}
}
