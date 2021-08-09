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
	}

	public function reg_cus()
	{
		$this->load->view('includes/login_header');
		$this->load->view('registration/customer');
		$this->load->view('includes/login_footer');
	}

	public function reg_far()
	{
		$this->load->view('includes/login_header');
		$this->load->view('registration/farmer');
		$this->load->view('includes/login_footer');
	}

	public function reg_del()
	{
		$this->load->view('includes/login_header');
		$this->load->view('registration/delivery');
		$this->load->view('includes/login_footer');
	}
}
