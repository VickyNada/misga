<?php

class Inventory extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('mcrud');
       
    }

    public function index()
    {
        $this->load->model('inventory_model');
        $dataArray["storage"] = $this->inventory_model->getallstorage();
        $dataArray["category"] = $this->inventory_model->getallcategory();
        $dataArray["unit"] = $this->inventory_model->getallunit();
       
        $userid = $this->session->userdata('userid');
        $data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
        $this->load->view('includes/dash_header');
        $this->load->view('includes/navigation', $data);
        $this->load->view('inventory/inventorymaster',$dataArray);
        $this->load->view('includes/dash_footer');
    }
    public function getAllProductData()
    {
        $allitem = $this->mcrud->getAllDataAscStatusActive('inventory_master', 'id');
        $dataString = '';
       
        foreach ($allitem as $item) {

            if($item->Item_status ==1 ){
                $status = "Avalable";
				$batchStyle = 'badge badge-primary';
            } else {
				$status = "Not Avalable";
				$batchStyle = 'badge badge-danger';
			}
          
            $dataString .= '
				<tr class="grade">
				<td>' . $item->Itemcode . '</td>
				<td>' . $item->itemname . '</td>
                
                <td>' . $item->Item_category . '</td>
                <td>' . $item->unit . '</td>
                <td>' . $item->storage_id . '</td>
               
                <td><span class="'.$batchStyle.'">' . $status . '</span></td>
                <td>' . $item->createddate . '</td>
               
                <td>' . $item->createdby . '</td>

				<td><a class="btn btn-warning btn-rounded" id="editItemBtn" onclick="editItem(' . $item->id . ')" href="#" ><i class="fa fa-pencil-square-o"></i></a>
				<a class="btn btn-danger btn-rounded" id="deleteItemBtn" onclick="deleteItem(' . $item->id . ') " href="#" ><i class="fa fa-trash-o"></i> </a></td>
				</tr>';

        }

        echo $dataString;
    }

    

    public function addItem()	{
		$data = array(

			'Itemcode'	    	=> $_POST['itemcode'],
			'unit'              => $_POST['unit'],
			'itemname'      	=> $_POST['itemname'],
			'Item_category'	    => $_POST['itemcategory'],
            'storage_id'        => $_POST['store'], 
			'Item_status'       => $_POST['itemstatus'], 
            'additional_details'=> $_POST['adddetails'],  
            'createdby'         => $userid = $this->session->userdata('userid')
		);
		$result = $this->mcrud->addDataByForm('inventory_master', $data);
		echo $result;
	}

    public function getItemData()
	{
		$itemId = $_GET['id'];
		$userData = $this->mcrud->getDataById('inventory_master', $itemId, 'id');
		echo json_encode($userData);
	}


    public function deleteItemData()
	{

		$id = array('id' => $_GET['id']);
		$data = array('delete_status' => 1);
		$data['unitDelete'] = $this->mcrud->updateDataByForm('inventory_master', $data, $id);
		redirect(URL_BASE . 'inventory');
	}

    public function updateItemData()
	{
   		$id = array('id' => $_POST['editId']);
		$data = array(
			'unit'              => $_POST['unit'],
			'itemname'      	=> $_POST['itemname'],
			'Item_category'	    => $_POST['itemcategory'],
            'storage_id'        => $_POST['store'], 
			'Item_status'       => $_POST['itemstatus'], 
            'additional_details'=> $_POST['adddetails'],  
		);
		
		$result = $this->mcrud->updateDataByForm('inventory_master', $data, $id);
        redirect(URL_BASE . 'inventory');
	}
    


    public function page()
	{
		$this->load->view('includes/page');
	}

    

}

