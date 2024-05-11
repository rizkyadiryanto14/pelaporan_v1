<?php

/**
 * @property $input
 * @property $Auth_model
 * @property $session
 */
class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Auth_model');
	}

	public function login_view(): object|string
	{
		return $this->load->view('auth/login');
	}

	public function logic_login(): void
	{
		$post = $this->input->post();
		$user = $this->Auth_model->cek_username($post['username']);

		if ($user) {
			if (password_verify($post['password'], $user['password'])) {
				$usersession = [
					'id_users'      => $user['id_users'],
					'username'      => $user['username'],
					'role'          => $user['role'],
					'last_login'    => date("m-d-Y H:i:s"),
				];

				$this->session->set_userdata($usersession);

				if ($usersession['role'] == '1') {
					redirect(base_url('dashboard'));
				} elseif ($usersession['role'] == '2') {
					redirect(base_url('dashboard'));
				} else {
					show_404();
				}
			} else {
				$this->session->set_flashdata('gagal', 'Username atau password salah');
				redirect(base_url('Auth/login_view'));
			}
		} else {
			$this->session->set_flashdata('gagal', 'Username tidak ditemukan');
			redirect(base_url('Auth/login_view'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect(base_url('Auth/login_view'));
	}
}
