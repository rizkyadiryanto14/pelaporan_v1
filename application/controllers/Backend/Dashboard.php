<?php

/**
 * @property $Dashboard_model
 * @property $Jadwal_model
 */

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
		$this->load->model('Jadwal_model');
	}

	public function index(): void
	{
		$data_array = [
			'total_atlet'	=> $this->Dashboard_model->get_total_atlet(),
			'total_dojang'	=> $this->Dashboard_model->get_total_dojang(),
			'total_pelatih'	=> $this->Dashboard_model->get_total_pelatih(),
			'total_user'	=> $this->Dashboard_model->get_total_user(),
			'data_jadwal'	=> $this->Jadwal_model->get_all_jadwal(),
		];
		$this->load->view('backend/dashboard', $data_array);
	}
}
