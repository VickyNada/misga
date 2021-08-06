<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('login_model');
		$this->load->model('mcrud');
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
				$this->session->set_userdata('pass_status', $result[0]['pass_status']);

				if ($result[0]['role'] !== 0 && $result[0]['active_status'] == 0) {
					// redirect(URL_BASE . 'dashboard');
					if ($result[0]['pass_status'] == 0) {
						redirect(URL_BASE . 'dashboard');
					} else {
						redirect(URL_BASE . 'login/reset_password');
					}
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
		$this->session->unset_userdata('active_status');
		$this->session->unset_userdata('pass_status');

		redirect(URL_BASE . 'login');
	}

	public function reset_password()
	{
		if(!$_POST){
			$this->load->view('includes/login_header');
			$this->load->view('reset_password/reset_password');
			$this->load->view('includes/login_footer');
		}else{

			$email = $this->input->post('email');
			$password = ($this->input->post('password'));

			$data = array("password" => $password);
			$res = $this->mcrud->updateDataByForm('users', $data, array('email'=>$email));

			var_dump($res);


		}
		
		// $email = $this->input->post('email');
		// $user = $this->login_model->getUserDataByEmail($email);

		// $id = ($user->id);
		// $pass = $user->password;
		// $password = $this->input->post('password');
		
	
		// var_dump($pass);
		// $result = $this->mcrud->updateDataByForm('users', $data, $id);
		// redirect(URL_BASE . 'login/reset_password');

	}		

	}

