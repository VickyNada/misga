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
			redirect(URL_BASE . 'login');
		} else {
			$result = $this->login_model->loginAuthenticateConsumer($username, $password);

			if (count($result) == 1) {

				$this->session->set_userdata('username', $result[0]['first_name'] . " " . $result[0]['last_name']);
				$this->session->set_userdata('userid', $result[0]['id']);

				if ($result[0]['role'] !== 0 && $result[0]['active_status'] == 0 && $result[0]['delete_status'] == 0) {
					if ($result[0]['pass_status'] == 0) {
						redirect(URL_BASE . 'dashboard/consumerdashboard');
					} else {
						redirect(URL_BASE . 'login/reset_password');
					}
				} else if($result[0]['active_status'] == 2) {
					$this->session->set_userdata('error', ' This account under verification');
					redirect(URL_BASE . 'login');
				} else {
					$this->session->set_userdata('error', ' This account restriected by admin');
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
		$this->session->sess_destroy();

		redirect(URL_BASE . 'login');
	}

	public function reset_password(){
		if(!$_POST){
			$this->load->view('includes/login_header');
			$this->load->view('reset_password/reset_password');
			$this->load->view('includes/login_footer');
		}else{

			$email = $this->input->post('email');
			$password = md5($this->input->post('password'));
			
         	$this->form_validation->set_rules('email','email','required');
         	$this->form_validation->set_rules('password','password','required');

	       if ($this->form_validation->run() == FALSE) {
	        $this->session->set_userdata('error', ' password updation failed!');
	        redirect(URL_BASE . 'login/reset_password');
	        }else{
				$verifyEmail = $this->mcrud->getDataById('consumers',$email,'email');
				if(count($verifyEmail) == 0){
	 				$this->session->set_userdata('error', ' Email does not exists!');
	 				redirect(URL_BASE . 'login/reset_password');
				}else{
					$data = array("password" => $password, 'pass_status' => 0);
					$res = $this->mcrud->updateDataByForm('consumers', $data, array('email'=>$email));
					$this->session->set_userdata('success', ' User has been updated succesfully!');
	 				redirect(URL_BASE . 'dashboard/consumerdashboard');
				}

	        }         	
		}
	}		


}
