<?php

class category extends CI_Controller
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
        $this->load->view('inventory/category');
        $this->load->view('includes/dash_footer');
    }
    public function getAllcategory()
    {
        $category = $this->mcrud->getAllDataAscStatusActive('itemcategory', 'id');
        $dataString = '';
        foreach ($category as $category) {

            if($category->status ==1 ){
                $status = "Avalable";
				$batchStyle = 'badge badge-primary';
            } else {
				$status = "Not Avalable";
				$batchStyle = 'badge badge-danger';
			}
          
            $dataString .= '
				<tr class="grade">
			
				<td>' . $category->category . '</td>
                <td>' . $category->description . '</td>
                <td><span class="'.$batchStyle.'">' . $status . '</span></td>
                <td>' . $category->created_date . '</td>
                
              
                
				<td><a class="btn btn-warning btn-rounded" id="editcategoryBtn" onclick="editcategory(' . $category->id . ')" href="#" ><i class="fa fa-pencil-square-o"></i></a>
				<a class="btn btn-danger btn-rounded" id="deletecategoryBtn" onclick="deletecategory(' . $category->id . ') " href="#" ><i class="fa fa-trash-o"></i> </a></td>
				</tr>';
        }
        echo $dataString;
    }

    

    public function addcategory()	{
		$data = array(
			'category'	    	=> $_POST['category'],
			'description'       => $_POST['categorydescription'],
            'status'            => $_POST['categoryStatus'],
		);
        var_dump($data);
		$result = $this->mcrud->addDataByForm('itemcategory', $data);
		echo $result;
	}

    public function getcategoryData()
	{
		$categoryId = $_GET['id'];
		$userData = $this->mcrud->getDataById('itemcategory', $categoryId, 'id');
		echo json_encode($userData);
	}


    public function deletecategory()
	{

		$id = array('id' => $_GET['id']);
		$data = array('delete_status' => 1);
		$data['categoryDelete'] = $this->mcrud->updateDataByForm('itemcategory', $data, $id);
		redirect(URL_BASE . 'inventory');
	}

    public function updatecategoryData()
	{
   		$id = array('id' => $_POST['editid']);
        
		$data = array(
			'category'      => $_POST['editcategory'],
			'description'   => $_POST['editdescription'],
            'status'         => $_POST['editStatus'],
		);

        var_dump($data);
		$result = $this->mcrud->updateDataByForm('itemcategory', $data, $id);
        redirect(URL_BASE . 'inventory');
	}
    
    public function page()
	{
		$this->load->view('includes/page');
	}

    

}

