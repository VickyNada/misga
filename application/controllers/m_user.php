<?php

class m_user extends CI_Controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('mcrud');
	}

    public function index()
	{
		$userid = $this->session->userdata('userid');
		$data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
        $data["allusers"] = $this->mcrud->getAllDataAscStatusActive('users','id');

		

		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation',$data);
		$this->load->view('dashboard/m_user');
		$this->load->view('includes/dash_footer');
		
	}

	public function editUser(){

		$id =array('id' => $_POST['userId']);
		$data = array(
			'id'=>$_POST['userId'],
			'first_name'=>$_POST['firstname'],
			'last_name'=>$_POST['lastname'],
			'email'=>$_POST['email'],			
	);
	$result = $this->mcrud->updateDataByForm('users', $data,$id);
	$this->session->set_userdata('success', ' ser has been deleted succesfully!');
	if ($result) {
		echo 1;
	  }else{
		echo 0;
	  }
}
		
	

	public function Delete(){

		$id =array('id' => $_GET['id']);
		$data = array( 'delete_status' => 1 );
		$data['userDelete']=$this->mcrud->updateDataByForm('users',$data,$id);
	
        redirect(URL_BASE . 'm_user');
		
	}

	public function addUser(){
		$data = array(
				'first_name'=>$_POST['addFname'],
				'last_name'=>$_POST['addLname'],
				'email'=>$_POST['addEmail'],
				'password'=>md5($_POST ['addPass']),
				// 'first_name'=>$_POST['retype'],
		);
		$result = $this->mcrud->addDataByForm('users', $data);
		$this->session->set_userdata('success', ' ser has been deleted succesfully!');
		if ($result) {
			echo 1;
		  }else{
			echo 0;
		  }
	}

}

?>