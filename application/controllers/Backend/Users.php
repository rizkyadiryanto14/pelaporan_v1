<?php

/**
 * @property $User_model
 */

class Users extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
	}

	public function index(): void
	{
		$data_array = [
			'title'		=> 'Halaman User',
			'data_user'	=> $this->User_model->get_all_user()
		];

		$this->load->view('backend/user', $data_array);
	}
}
