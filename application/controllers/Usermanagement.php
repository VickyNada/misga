<?php

class Usermanagement extends CI_Controller
{

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
		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation', $data);
		$this->load->view('admin/Usermanagement/index');
		$this->load->view('includes/dash_footer');
	}


	public function getAlluserData()
	{

		$allusers = $this->mcrud->getAllDataAscStatusActive('users', 'id');
		$dataString = '';
		foreach ($allusers as $user) {
			if ($user->role == 1) {
				$userrole = "Admin";
				$batchStyle = 'badge badge-primary';
			} else {
				$userrole = "Standard User";
				$batchStyle = 'badge badge-success';
			}
			if ($user->active_status == 0) {
				$status = "Active";
				$btnclass = "btn btn-danger btn-rounded";
				$faclass = "fa fa-lock";
			} else {
				$status = "Blocked";
				$btnclass = "btn btn-primary btn-rounded";
				$faclass = "fa fa-unlock-alt";
			}
			$dataString .= '
				<tr class="grade">
				<td>' . $user->first_name . '</td>
				<td>' . $user->last_name . '</td>
				<td><span class="'.$batchStyle.'">' . $userrole . '</span></td>
				<td>' . $user->email . '</td>
				<td><a class="btn btn-warning btn-rounded" id="editUserBtn" onclick="editUser(' . $user->id . ')" href="#" ><i class="fa fa-pencil-square-o"></i> Edit</a></td>
				<td><a class="btn btn-danger btn-rounded" id="deleteUserBtn" onclick="deleteUser(' . $user->id . ') " href="#" ><i class="fa fa-trash-o"></i> Delete</a></td>
				<td><div style="width: 40%; float:left">' . $status . '</div><div style="width: 60%; float:left"><a class="' . $btnclass . '" id="blockUserBtn" onclick="blockUser(' . $user->id . ',' . $user->active_status . ') " href="#" ><i class="' . $faclass . '" aria-hidden="true"></i></a></div></td>
				</tr>';
		}
		echo $dataString;
	}

	public function getUserData()
	{
		$userId = $_GET['id'];
		$userData = $this->mcrud->getDataById('users', $userId, 'id');
		echo json_encode($userData);
	}

	public function addUser()
	{
		$data = array(
			'role'		=> $_POST['addRole'],
			'first_name' => $_POST['addFname'],
			'last_name'	=> $_POST['addLname'],
			'email'		=> $_POST['addEmail'],
			'password'		=> md5($_POST['addEmail']),
			'pass_status' => $_POST['addpass'], 

		);
		$result = $this->mcrud->addDataByForm('users', $data);
		echo $result;
	}

	public function deleteUserData()
	{

		$id = array('id' => $_GET['id']);
		$data = array('delete_status' => 1);
		$data['userDelete'] = $this->mcrud->updateDataByForm('users', $data, $id);
		$data = array('active_status' => 1);
		$data['userDelete'] = $this->mcrud->updateDataByForm('users', $data, $id);


		redirect(URL_BASE . 'usermanagement');
	}

	public function updateUserData()
	{
		$id = array('id' => $_POST['editId']);
		$data = array(
			'role'		=> $_POST['editRole'],
			'first_name' => $_POST['editFname'],
			'last_name'	=> $_POST['editLname'],
			'email'		=> $_POST['editEmail'],
		);
		
		$result = $this->mcrud->updateDataByForm('users', $data, $id);
	}

	public function blockUserData()
	{
		$id = array('id' => $_GET['id']);
		if ($_GET['status'] == 1) {
			$new_Status = 0;
		} else {
			$new_Status = 1;
		};
		$data = array('active_status' => $new_Status);

		$data['userBlock'] = $this->mcrud->updateDataByForm('users', $data, $id);
		redirect(URL_BASE . 'usermanagement');
	}

	public function page()
	{
		$this->load->view('includes/page');
	}
}
