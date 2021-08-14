<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminLogin extends CI_Controller
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
		$this->load->view('admin/login.php');
		$this->load->view('includes/login_footer');
	}

	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'username', "trim|required");
		$this->form_validation->set_rules('password', 'password', "trim|required");

		if ($this->form_validation->run() == FALSE) {
			redirect(URL_BASE . 'adminlogin');
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
						redirect(URL_BASE . 'adminlogin/reset_password');
					}
				} else {
					$this->session->set_userdata('error', ' This account blocked by admin');
					redirect(URL_BASE . 'adminlogin');
				}
			} else {
				$this->session->set_userdata('error', ' The Username or password are invalid!');
				redirect(URL_BASE . 'adminlogin');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('userid');
		$this->session->unset_userdata('active_status');
		$this->session->unset_userdata('pass_status');
		$this->session->sess_destroy();

		redirect(URL_BASE . 'adminlogin');
	}

	public function reset_password(){
		if(!$_POST){
			$this->load->view('includes/login_header');
			$this->load->view('reset_password/reset_password_admin');
			$this->load->view('includes/login_footer');
		}else{

			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			
         	$this->form_validation->set_rules('email','email','required');
         	$this->form_validation->set_rules('password','password','required');

	       if ($this->form_validation->run() == FALSE) {
	        $this->session->set_userdata('error', ' password updation failed!');
	        redirect(URL_BASE . 'adminlogin/reset_password');
	        }else{
				$verifyEmail = $this->mcrud->getDataById('users',$email,'email');
				if(count($verifyEmail) == 0){
	 				$this->session->set_userdata('error', ' Email does not exists!');
	 				redirect(URL_BASE . 'adminlogin/reset_password');
				}else{
					$data = array("password" => $password, 'pass_status' => 0);
					$res = $this->mcrud->updateDataByForm('users', $data, array('email'=>$email));
					$this->session->set_userdata('success', ' User has been updated succesfully!');
	 				redirect(URL_BASE . 'dashboard');
				}
	        }         	
		}
	}		


}
