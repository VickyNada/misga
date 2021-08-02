<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('login_model');
	}

	public function index()
	{
		$this->load->view('includes/login_header');
		$this->load->view('login');
		$this->load->view('includes/login_footer');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'username', "trim|required");
		$this->form_validation->set_rules('password', 'password', "trim|required");

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_userdata('error', ' The Username or password are invalid!');
			redirect(URL_BASE . 'login');
		} else {
			$result = $this->login_model->loginAuthenticate($username, $password);

			if (count($result) == 1) {

				$this->session->set_userdata('username', $result[0]['first_name'] . " " . $result[0]['last_name']);
				$this->session->set_userdata('userid', $result[0]['id']);
				$this->session->set_userdata('active_status', $result[0]['active_status']);
				
				if ($result[0]['role'] !== 0 && $result[0]['active_status'] == 0 ) {
					redirect(URL_BASE . 'dashboard');
				} else {
					$this->session->set_userdata('error', ' This account blocked by admin');
					redirect(URL_BASE . 'login');
				}
			} else {
				$this->session->set_userdata('error', ' The Username or password are invalid!');
				redirect(URL_BASE . 'login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('userid');
        redirect(URL_BASE . 'login');
	}
}
