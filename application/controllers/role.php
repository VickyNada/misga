<?php

class role extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('mcrud');

	
	}

    public function index()
	{
	
		$this->load->view('includes/login_header');
		$this->load->view('inventory/loginselection');
		$this->load->view('includes/login_footer');
	}


}