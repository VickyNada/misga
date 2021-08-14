<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('mcrud');
		$this->load->model('consumer');
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
			$config['file_name'] = time() . $_FILES['profilepic']['name'];

			$data = array(
				'first_name' => $_POST['firstname'],
				'last_name'	=> $_POST['lastname'],
				'role'		=> '3',
				'email'		=> $_POST['email'],
				'password'	=> md5($_POST['password']),
				'nic' 		=> $_POST['nic'],
				'Billing'	=> $_POST['baddress'],
				'Delivery'	=> $_POST['daddress'],
				'city'		=> $_POST['city'],
				'contact1'	=> $_POST['contact1'],
				'contact2'	=> $_POST['contact2'],
				'picture'	=> $config['upload_path'] . $config['file_name']
			);

			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('nic', 'nic', 'required');

			$this->form_validation->set_rules('city', 'city', 'required');
			$this->form_validation->set_rules('contact1', 'contact1', 'required');
			$this->form_validation->set_rules('contact2', 'contact2', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_userdata('error', ' Entered details are invalid!');
				redirect(URL_BASE . 'registration/reg_customer');
			} else {
				$verifyEmail = $this->consumer->verifyConsumerRegistration('consumers', '3', $_POST['email']);
				if (count($verifyEmail) == 0) {
					$result = $this->mcrud->addDataByForm('consumers', $data);
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('profilepic');
					$this->session->set_userdata('success', ' Registration Successful! Please login');
					redirect(URL_BASE . 'login');
				} else {
					$this->session->set_userdata('error', ' Email already has a Customer Account');
					redirect(URL_BASE . 'registration/reg_customer');
				}
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
			$config['file_name'] = time() . $_FILES['profilepic']['name'];

			$data = array(
				'role'		=> '4',
				'email'		=> $_POST['email'],
				'password'	=> md5($_POST['password']),
				'first_name' => $_POST['firstname'],
				'last_name'	=> $_POST['lastname'],
				'nic' 		=> $_POST['nic'],
				'Billing'	=> $_POST['baddress'],
				'contact1'	=> $_POST['contact1'],
				'city'		=> $_POST['city'],
				'farm_name' => $_POST['farmname'],
				'Delivery'	=> $_POST['daddress'],
				'area'		=> $_POST['area'],
				'contact2'	=> $_POST['contact2'],
				'picture'	=> $config['upload_path'] . $config['file_name']
			);

			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('nic', 'nic', 'required');
			$this->form_validation->set_rules('baddress', 'baddress', 'required');
			$this->form_validation->set_rules('contact1', 'contact1', 'required');
			$this->form_validation->set_rules('city', 'city', 'required');
			$this->form_validation->set_rules('farmname', 'farmname', 'required');
			$this->form_validation->set_rules('daddress', 'daddress', 'required');
			$this->form_validation->set_rules('area', 'area', 'required');
			$this->form_validation->set_rules('contact2', 'contact2', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_userdata('error', ' Entered details are invalid!');
				redirect(URL_BASE . 'registration/reg_farmer');
			} else {
				$verifyEmail = $this->consumer->verifyConsumerRegistration('consumers', '4', $_POST['email']);
				if (count($verifyEmail) == 0) {
					$insert_id = $this->mcrud->addDataByForm('consumers', $data);
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('profilepic');

					$this->uploadFilesToDBFarm('farmpic1', $insert_id);
					$this->uploadFilesToDBFarm('farmpic2', $insert_id);
					$this->uploadFilesToDBFarm('farmpic3', $insert_id);
					$this->uploadFilesToDBFarm('farmpic4', $insert_id);
					$this->uploadFilesToDBFarm('farmpic5', $insert_id);

					$this->session->set_userdata('success', ' Registration Successful! Please login');
					redirect(URL_BASE . 'login');
				} else {
					$this->session->set_userdata('error', ' Email already has a Farmer Account');
					redirect(URL_BASE . 'registration/reg_farmer');
				}
			}
		}
	}

	private function uploadFilesToDBFarm($filename, $farmer_id)
	{
		$config['upload_path'] = './assets/img/custom/farmers/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = time() . $_FILES[$filename]['name'];

		if (!empty($_FILES[$filename]['name'])) {
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload($filename);

			$dataArr = array(
				"farmer_id" => $farmer_id,
				"picture" => $config['upload_path'] . $config['file_name']
			);
			$this->mcrud->addDataByForm('farm_images', $dataArr);
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
			$config['file_name'] = time() . $_FILES['profilepic']['name'];

			$data = array(
				'role'		=> '5',
				'email'		=> $_POST['email'],
				'password'	=> md5($_POST['password']),
				'first_name' => $_POST['firstname'],
				'last_name'	=> $_POST['lastname'],
				'nic' 		=> $_POST['nic'],
				'drivinglicense' => $_POST['license'],
				'Billing'	=> $_POST['baddress'],
				'contact1'	=> $_POST['contact1'],
				'city'		=> $_POST['city'],
				'expirydate'	=> $_POST['expiry'],
				'picture'	=> $config['upload_path'] . $config['file_name'],
			);

			$this->form_validation->set_rules('email', 'email', 'required');
			$this->form_validation->set_rules('password', 'password', 'required');
			$this->form_validation->set_rules('firstname', 'firstname', 'required');
			$this->form_validation->set_rules('lastname', 'lastname', 'required');
			$this->form_validation->set_rules('nic', 'nic', 'required');
			$this->form_validation->set_rules('baddress', 'baddress', 'required');
			$this->form_validation->set_rules('contact1', 'contact1', 'required');
			$this->form_validation->set_rules('city', 'city', 'required');

			if ($this->form_validation->run() == FALSE) {
				$this->session->set_userdata('error', ' Entered details are invalid!');
				redirect(URL_BASE . 'registration/reg_deliveryuser');
			} else {
				$verifyEmail = $this->consumer->verifyConsumerRegistration('consumers', '5', $_POST['email']);
				if (count($verifyEmail) == 0) {
					$insert_id = $this->mcrud->addDataByForm('consumers', $data);
					$data2 = array(
						'userId' => $insert_id,
						'vehicle_type' => $_POST['vtype'],
						'manufacturer' => $_POST['mname'],
						'vehicle_model' => $_POST['vmodel'],
						'regnumber'	=> $_POST['regnumber'],
					);
					$result = $this->mcrud->addDataByForm('vehicle_info', $data2);
					$this->load->library('upload', $config);
					$this->upload->initialize($config);
					$this->upload->do_upload('profilepic');

					$this->uploadFilesToDBDocs('dril', $insert_id);
					$this->uploadFilesToDBDocs('revl', $insert_id);
					$this->uploadFilesToDBDocs('ins', $insert_id);
					$this->uploadFilesToDBDocs('vb', $insert_id);

					$this->session->set_userdata('success', ' Registration Successful! Please login');
					redirect(URL_BASE . 'login');
				} else {
					$this->session->set_userdata('error', ' Email already has a Delivery User Account');
					redirect(URL_BASE . 'registration/reg_deliveryuser');
				}
			}
		}
	}

	private function uploadFilesToDBDocs($filename, $driver_id)
	{
		$config['upload_path'] = './assets/img/custom/deliveryusers/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = time() . $_FILES[$filename]['name'];

		if (!empty($_FILES[$filename]['name'])) {
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			$this->upload->do_upload($filename);

			$dataArr = array(
				"deliveryuser_id" => $driver_id,
				"image_type" => $filename,
				"image " => $config['upload_path'] . $config['file_name']
			);
			$this->mcrud->addDataByForm('vehicle_images', $dataArr);
		}
	}
}
