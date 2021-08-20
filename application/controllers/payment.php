<?php

class payment extends CI_Controller
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
        $this->load->view('payment/payment');
        $this->load->view('includes/dash_footer');
    }
    public function getAlltype()
    {
        $type = $this->mcrud->getAllDataAscStatusActive('payment_type', 'id');
        $dataString = '';
        foreach ($type as $type) {

          
            $dataString .= '
				<tr class="grade">
			
				<td>' . $type->id . '</td>
                <td>' . $type->payment_type . '</td>
                <td>' . $type->payment_description . '</td>
                <td>' . $type->created_date . '</td>
              
                
				<td><a class="btn btn-warning btn-rounded" id="edittypeBtn" onclick="edittype(' . $type->id . ')" href="#" ><i class="fa fa-pencil-square-o"></i></a>
				<a class="btn btn-danger btn-rounded" id="deletetypeBtn" onclick="deletetype(' . $type->id . ') " href="#" ><i class="fa fa-trash-o"></i> </a></td>
				</tr>';
        }
        echo $dataString;
    }

    public function addtype()	{
		$data = array(

			'payment_type '	        	=> $_POST['paymenttype'],
			'payment_description'       => $_POST['description'],
			
		);
		$result = $this->mcrud->addDataByForm('payment_type', $data);
		echo $result;
	}

    public function gettypeData()
	{
		$typeId = $_GET['id'];
		$userData = $this->mcrud->getDataById('payment_type', $typeId, 'id');
		echo json_encode($userData);
	}


    public function deletetype()
	{

		$id = array('id' => $_GET['id']);
		$data = array('delete_status' => 1);
		$data['typeDelete'] = $this->mcrud->updateDataByForm('payment_type', $data, $id);
		redirect(URL_BASE . 'payment');
	}

    public function updatetypeData()
	{
   		$id = array('id' => $_POST['editid']);
        
		$data = array(
			'payment_type'          => $_POST['edittype'],
			'payment_description'   => $_POST['editdescription'],	
		);

    
		$result = $this->mcrud->updateDataByForm('payment_type', $data, $id);
        redirect(URL_BASE . 'inventory');
	}
    
    public function page()
	{
		$this->load->view('includes/page');
	}
    

}