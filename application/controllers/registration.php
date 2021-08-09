<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('login_model');
		$this->load->model('mcrud');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));
	}

	public function reg_customer()
	{
		if (!$_POST) {
			$this->load->view('includes/login_header');
			$this->load->view('registration/customer');
			$this->load->view('includes/login_footer');
		} else {

			$config['upload_path'] = './assets/img/custom/customers/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = $_POST['firstname'] . '_' . $_POST['lastname'];

			$data = array(
				'firstname' => $_POST['firstname'],
				'lastname'	=> $_POST['lastname'],
				'role'	=> 'Customer',
				'email'		=> $_POST['email'],
				'password'	=> md5($_POST['password']),
				'nic' 		=> $_POST['nic'],
				'Billing'	=> $_POST['baddress'],
				'Delivery'	=> $_POST['daddress'],
				'city'		=> $_POST['city'],
				'contact1'	=> $_POST['contact1'],
				'contact2'	=> $_POST['contact2'],
				'picture'	=> $config['upload_path'] . "\\" . $config['file_name']
			);

			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('nic', 'nic', 'required');
			$this->form_validation->set_rules('baddress', 'baddress', 'required');
			$this->form_validation->set_rules('daddress', 'daddress', 'required');
			$this->form_validation->set_rules('city', 'city', 'required');
			$this->form_validation->set_rules('contact1', 'contact1', 'required');
			$this->form_validation->set_rules('contact2', 'contact2', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_userdata('error', ' Entered details are invalid!');
				redirect(URL_BASE . 'registration/reg_customer');
			} else {
				$result = $this->mcrud->addDataByForm('consumers', $data);
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('profilepic');
				$this->session->set_userdata('success', ' Registration Successful! Please login');
				redirect(URL_BASE . 'login');
			}
		}
	}

	public function reg_farmer()
	{
		if (!$_POST) {
			$this->load->view('includes/login_header');
			$this->load->view('registration/farmer');
			$this->load->view('includes/login_footer');
		} else {

			$config['upload_path'] = './assets/img/custom/farmers/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = $_POST['firstname'] . '_' . $_POST['lastname'];

			$data = array(
				'firstname' => $_POST['firstname'],
				'lastname'	=> $_POST['lastname'],
				'role'	=> 'Farmer',
				'email'		=> $_POST['email'],
				'password'	=> md5($_POST['password']),
				'nic' 		=> $_POST['nic'],
				'address'	=> $_POST['address'],
				'area'	=> $_POST['area'],
				'city'		=> $_POST['city'],
				'contact1'	=> $_POST['contact1'],
				'contact2'	=> $_POST['contact2'],
			);

			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('nic', 'nic', 'required');
			$this->form_validation->set_rules('address', 'address', 'required');
			$this->form_validation->set_rules('area', 'area', 'required');
			$this->form_validation->set_rules('city', 'city', 'required');
			$this->form_validation->set_rules('contact1', 'contact1', 'required');
			$this->form_validation->set_rules('contact2', 'contact2', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_userdata('error', ' Entered details are invalid!');
				redirect(URL_BASE . 'registration/reg_farmer');
			} else {
				$result = $this->mcrud->addDataByForm('consumers', $data);
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('profilepic');
				$this->session->set_userdata('success', ' Registration Successful! Please login');
				redirect(URL_BASE . 'login');
			}
		}
	}


	public function reg_deliveryuser()
	{
		if (!$_POST) {
			$this->load->view('includes/login_header');
			$this->load->view('registration/deliveryuser');
			$this->load->view('includes/login_footer');
		} else {

			$config['upload_path'] = './assets/img/custom/deliveryusers/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['file_name'] = $_POST['firstname'] . '_' . $_POST['lastname'];

			$data = array(
				'firstname' => $_POST['firstname'],
				'lastname'	=> $_POST['lastname'],
				'role'	=> 'Deliveryuser',
				'email'		=> $_POST['email'],
				'password'	=> md5($_POST['password']),
				'nic' 		=> $_POST['nic'],
				'address'	=> $_POST['address'],
				'city'		=> $_POST['city'],
				'contact1'	=> $_POST['contact1'],
				'contact2'	=> $_POST['contact2'],
				'license'	=> $_POST['license'],
				'vehicletype'	=> $_POST['vehicletype'],
				'modal'	=> $_POST['modal'],
				'vehiclenumber'	=> $_POST['vehiclenumber'],
			);

			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('nic', 'nic', 'required');
			$this->form_validation->set_rules('address', 'address', 'required');
			$this->form_validation->set_rules('city', 'city', 'required');
			$this->form_validation->set_rules('contact1', 'contact1', 'required');
			$this->form_validation->set_rules('contact2', 'contact2', 'required');
			$this->form_validation->set_rules('license', 'license', 'required');
			$this->form_validation->set_rules('vehicletype', 'vehicletype', 'required');
			$this->form_validation->set_rules('modal', 'modal', 'required');
			$this->form_validation->set_rules('vehiclenumber', 'vehiclenumber', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_userdata('error', ' Entered details are invalid!');
				redirect(URL_BASE . 'registration/reg_deliveryuser');
			} else {
				$result = $this->mcrud->addDataByForm('consumers', $data);
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$this->upload->do_upload('profilepic');
				$this->session->set_userdata('success', ' Registration Successful! Please login');
				redirect(URL_BASE . 'login');
			}
		}
	}
}
