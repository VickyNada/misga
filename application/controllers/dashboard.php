<?php

class dashboard extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('mcrud');

		if($this->session->userdata('userid') == null){
			redirect(URL_BASE . 'login');
		}
	}

    public function index()
	{
		$userid = $this->session->userdata('userid');
        $data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');

		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation',$data);
		$this->load->view('dashboard/dashboard');
		$this->load->view('includes/dash_footer');
	}

	public function consumerdashboard()
	{
		$userid = $this->session->userdata('userid');
        $data["userInfo"] = $this->mcrud->getDataById('consumers', $userid, 'id');

		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation',$data);
		$this->load->view('dashboard/dashboard');
		$this->load->view('includes/dash_footer');
	}


}

?>