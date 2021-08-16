<?php

class unit extends CI_Controller
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
        $this->load->view('inventory/unitmeasure');
        $this->load->view('includes/dash_footer');
    }
    public function getAllUnit()
    {
        $unit = $this->mcrud->getAllDataAscStatusActive('unitmeasure', 'id');
        $dataString = '';
        foreach ($unit as $unit) {

          
            $dataString .= '
				<tr class="grade">
			
				<td>' . $unit->unitname . '</td>
                <td>' . $unit->description . '</td>
                <td>' . $unit->created_date . '</td>
                <td>' . $unit->created_by . '</td>
              
                
				<td><a class="btn btn-warning btn-rounded" id="editunitBtn" onclick="editunit(' . $unit->id . ')" href="#" ><i class="fa fa-pencil-square-o"></i></a>
				<a class="btn btn-danger btn-rounded" id="deleteunitBtn" onclick="deleteunit(' . $unit->id . ') " href="#" ><i class="fa fa-trash-o"></i> </a></td>
				</tr>';
        }
        echo $dataString;
    }

    

    public function addunit()	{
		$data = array(

			'unitname'	    	=> $_POST['unitName'],
			'description'       => $_POST['unitdescription'],
			'created_by'        => $userid = $this->session->userdata('userid')
		);
		$result = $this->mcrud->addDataByForm('unitmeasure', $data);
		echo $result;
	}

    public function getunitData()
	{
		$unitId = $_GET['id'];
		$userData = $this->mcrud->getDataById('unitmeasure', $unitId, 'id');
		echo json_encode($userData);
	}


    public function deleteunit()
	{

		$id = array('id' => $_GET['id']);
		$data = array('delete_status' => 1);
		$data['unitDelete'] = $this->mcrud->updateDataByForm('unitmeasure', $data, $id);
		redirect(URL_BASE . 'inventory');
	}

    public function updateunitData()
	{
   		$id = array('id' => $_POST['editid']);
        
		$data = array(
			'unitname'      => $_POST['editunitname'],
			'description'   => $_POST['editdescription'],
		);

    
		$result = $this->mcrud->updateDataByForm('unitmeasure', $data, $id);
        redirect(URL_BASE . 'inventory');
	}
    
    public function page()
	{
		$this->load->view('includes/page');
	}

    

}

