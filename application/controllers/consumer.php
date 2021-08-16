<?php

class consumer extends CI_Controller
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
		$this->load->view('admin/Usermanagement/farmers');
		$this->load->view('includes/dash_footer');
	}

	public function customer()
	{
		$userid = $this->session->userdata('userid');
		$data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation', $data);
		$this->load->view('admin/Usermanagement/customer');
		$this->load->view('includes/dash_footer');
	}

	public function delivery()
	{
		$userid = $this->session->userdata('userid');
		$data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation', $data);
		$this->load->view('admin/Usermanagement/delivery');
		$this->load->view('includes/dash_footer');
	}

	public function getAlluserData()
	{
		$allusers = $this->mcrud->getAllDataAscStatusActive('consumers', 'id');
		$dataString = '';
		$dataString2 = '';
		$dataString3 = '';
		$roleId = $_GET["roleId"];
		foreach ($allusers as $user) {
			if ($user->role == $roleId) {
				if ($user->active_status == 1) {
					$status = "Blocked";
					$btnclass = "btn btn-danger btn-rounded";
					$faclass = "fa fa-lock";
					$batchStyle = 'badge badge-danger';		
				}else
				if ($user->active_status == 2) {
					$status = "Penidng";
					$btnclass = "btn btn-info btn-rounded";
					$faclass = "fa fa-lock";
					$batchStyle = 'badge badge-info';
				
					}else{

					$status = "Active";
					$btnclass = "btn btn-primary btn-rounded";
					$faclass = "fa fa-unlock-alt";
					$batchStyle = 'badge badge-primary';	
				}

				$editUrl = URL_BASE . "consumer/editConsumer?userId=$user->id&roleId=$roleId";

				$dataString .= '
				<tr class="grade">
                <td>' . $user->farm_name . '</td>
				<td>' . $user->first_name . " " . $user->last_name . '</td>
	            <td>' . $user->email . '</td>
				<td><span class="'.$batchStyle.'">' . $status . '</span></td>
				<td>' . $user->contact1 . '</td>
				<td>' . $user->contact2 . '</td>
				
				
				<td><a class="btn btn-warning btn-rounded" id="editUserBtn" href="' . $editUrl . '" ><i class="fa fa-pencil-square-o"></i> View</a></td>
				<td><a class="btn btn-danger btn-rounded" id="deleteUserBtn" onclick="deleteUser(' . $user->id . ') " href="#" ><i class="fa fa-trash-o"></i> Delete</a></td>
				<td><div style="width: 60%; float:left"><a class="' . $btnclass . '" id="blockUserBtn" onclick="blockUser(' . $user->id . ',' . $user->active_status . ') " href="#" ><i class="' . $faclass . '" aria-hidden="true"></i></a></div></td>
				
				</tr>';

				$dataString2 .= '

				<tr class="grade">
				<td>' . $user->first_name . '</td>
				<td>' .  $user->last_name . '</td>
	            <td>' . $user->email . '</td>
				<td>' . $user->Delivery . '</td>
				<td><span class="'.$batchStyle.'">' . $status . '</span></td>
                <td>' . $user->contact1 . "<br>" . $user->contact2 . '</td>
				
				<td><a class="btn btn-warning btn-rounded" id="editUserBtn" href="' . $editUrl . '" ><i class="fa fa-pencil-square-o"></i> View</a></td>
				<td><a class="btn btn-danger btn-rounded" id="deleteUserBtn" onclick="deleteUser(' . $user->id . ') " href="#" ><i class="fa fa-trash-o"></i> Delete</a></td>
				<td><div style="width: 60%; float:left"><a class="' . $btnclass . '" id="blockUserBtn" onclick="blockUser(' . $user->id . ',' . $user->active_status . ') " href="#" ><i class="' . $faclass . '" aria-hidden="true"></i></a></div></td>
				</tr>';

				$dataString3 .= '

				<tr class="grade">
				<td>' . $user->first_name . '</td>
				<td>' .  $user->last_name . '</td>
	            <td>' . $user->email . '</td>
				<td><span class="'.$batchStyle.'">' . $status . '</span></td>
                <td>' . $user->contact1 . '</td>
				
				<td><a class="btn btn-warning btn-rounded" id="editUserBtn" href="' . $editUrl . '" ><i class="fa fa-pencil-square-o"></i> View</a></td>
				<td><a class="btn btn-danger btn-rounded" id="deleteUserBtn" onclick="deleteUser(' . $user->id . ') " href="#" ><i class="fa fa-trash-o"></i> Delete</a></td>
				<td><div style="width: 60%; float:left"><a class="' . $btnclass . '" id="blockUserBtn" onclick="blockUser(' . $user->id . ',' . $user->active_status . ') " href="#" ><i class="' . $faclass . '" aria-hidden="true"></i></a></div></td>
				</tr>';
			}
		}

		if ($roleId == CUSTOMER) {
			echo $dataString2;
		}
		if ($roleId == FARMER) {
			echo $dataString;
		}
		if ($roleId == DELIVERYRIDER) {
			echo $dataString3;
		}
	}

	public function editConsumer()
	{
		$userid = $this->session->userdata('userid');
		$userIdFarmer = $_GET['userId'];
		$roleId = $_GET['roleId'];
		$data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
		$data2["consumerInfo"] = $this->mcrud->getDataById('consumers', $userIdFarmer, 'id');
		
		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation', $data);
		if ($roleId == CUSTOMER) {
			$this->load->view('profile/customer', $data2);
		}
		if ($roleId == FARMER) {
			$data2["farmImages"] = $this->mcrud->getDataById('farm_images', $userIdFarmer, 'farmer_id');
			$this->load->view('profile/farmer', $data2);
		}
		if ($roleId == DELIVERYRIDER) {
			$data2["vehicleInfo"] = $this->mcrud->getDataById('vehicle_info', $userIdFarmer, 'userId');
			$data2["vehicleImages"] = $this->mcrud->getDataById('vehicle_images', $userIdFarmer, 'deliveryuser_id');
			$this->load->view('profile/delivery', $data2);
		}
		$this->load->view('includes/dash_footer');
	}

	public function updateConsumer()
	{
		$id = array('id' => $_POST['id']);

		if ($_POST['role'] == CUSTOMER) {

			$data = array(
				'email'			=> $_POST['email'],
				'first_name' 	=> $_POST['firstname'],
				'last_name'		=> $_POST['lastname'],
				'nic'			=> $_POST['nic'],
				'contact1'		=> $_POST['contact1'],
				'contact2'		=> $_POST['contact2'],
				'billing'		=> $_POST['billing'],
				'delivery'		=> $_POST['delivery'],
				'city'		=> $_POST['city'],
			);
		}
		if ($_POST['role'] == FARMER) {
			$data = array(
				'email'			=> $_POST['email'],
				'farm_name'		=> $_POST['farmname'],
				'first_name' 	=> $_POST['firstname'],
				'last_name'		=> $_POST['lastname'],
				'nic'			=> $_POST['nic'],
				'contact1'		=> $_POST['contact1'],
				'contact2'		=> $_POST['contact2'],
				'billing'		=> $_POST['billing'],
				'delivery'		=> $_POST['delivery'],
				'city'		=> $_POST['city'],
				'area'		=> $_POST['area'],
			);

			$tags = explode(',',$_POST['tags']);
			var_dump($tags);
		}
		if ($_POST['role'] == DELIVERYRIDER) {
			$data = array(
				'email' => $_POST['email'],
				'first_name' => $_POST['firstname'],
				'last_name' => $_POST['lastname'],
				'nic' => $_POST['nic'],
				'drivinglicense' => $_POST['drivinglicense'],
				'expirydate' => $_POST['expirydate'],
				'contact1' => $_POST['contact1'],
				'contact2' => $_POST['contact2'],
				'billing' => $_POST['billing'],
				'city' => $_POST['city'],

			);
		}

		// $result = $this->mcrud->updateDataByForm('consumers', $data, $id);
	}


	public function getUserData()
	{
		$userId = $_GET['id'];
		$userData = $this->mcrud->getDataById('consumers', $userId, 'id');
		echo json_encode($userData);
	}

	public function deleteUserData()
	{
		$id = array('id' => $_GET['id']);
		$data = array('delete_status' => 1);
		$this->mcrud->updateDataByForm('consumers', $data, $id);
		redirect(URL_BASE . 'consumer');
	}

	public function blockUserData()
	{
		$id = array('id' => $_GET['id']);
		if ($_GET['status'] == 1|| $_GET['status'] == 2)  {
			$new_Status = 0;
		} else {
			$new_Status = 1;
		};
		$data = array('active_status' => $new_Status);
		$this->mcrud->updateDataByForm('consumers', $data, $id);
		redirect(URL_BASE . 'consumer');
	}


	public function updateVehicle()
	{
		$id = array('userId' => $_POST['userId']);

		$data = array(
			'vehicle_type' => $_POST['vehicle_type'],
			'manufacturer' => $_POST['manufacturer'],
			'vehicle_model' => $_POST['vehicle_model'],
			'regnumber' => $_POST['regnumber'],
		);

		$result = $this->mcrud->updateDataByForm('vehicle_info', $data, $id);
	}
}
