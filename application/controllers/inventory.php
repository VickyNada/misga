<?php

class Inventory extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('mcrud');
        $this->load->model('inventory_model');
    }

    public function index()
    {
        $this->load->model('Inventory_modal');
        $dataArray["storage"] = $this->Inventory_modal->getallstorage();
        $dataArray["category"] = $this->Inventory_modal->getallcategory();
        $dataArray["unit"] = $this->Inventory_modal->getallunit();
       
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
        $itemcode =0;
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

                $itemcode = $item->Itemcode;
        }

        $response['dataString'] = $dataString;
		$response['itemcode'] = $itemcode;

		echo json_encode($response);
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

// Item Wastage Reason----------
    // Load Wastage-Reason page
    public function wastageReason()
	{
		$userid = $this->session->userdata('userid');
		$data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation', $data);
		$this->load->view('inventory/wastageReason');
		$this->load->view('includes/dash_footer');
	}

	// Fetch Wastage-Reason for Main Page Method
	public function getWreasonData()
	{
		$allWreason = $this->mcrud->fetchAllData('wastagereasons', 'id');
		$dataString = '';
		foreach ($allWreason as $row) {
			// if ($price->status == 0) {
			// 	$status = "Active";
			// 	$btnclass = "btn btn-danger btn-rounded";
			// 	$faclass = "fa fa-lock";
			// } else {
			// 	$status = "Blocked";
			// 	$btnclass = "btn btn-primary btn-rounded";
			// 	$faclass = "fa fa-unlock-alt";
			// }
			$dataString .= '
				<tr class="grade">
				<td>' . $row	->id . '</td>
				<td>' . $row	->wastageReason . '</td>
				<td>' . $row 	->Description . '</td>
				<td>' . $row	->createdDate . '</td>	
				<td><a class="btn btn-warning btn-rounded" id="editWreasonBtn" onclick="editWreason(' . $row->id . ')" href="#" ><i class="fa fa-pencil-square-o"></i> Edit</a></td>
				</tr>';
		}
		echo $dataString;
	}

	// Insert Wastage-Reason Method
	public function addWreason()
	{
		$data = array(
			'wastageReason'			=> strtoupper($_POST['addWcode']),
			'Description' 		=> $_POST['addWdesc'],	 
		);
		$result = $this->mcrud->addDataByForm('wastagereasons', $data);
		echo $result;
	}

	// Update Wastage-Reason Method
	public function editWreason()
	{
		$id = array('id' => $_POST['editId']);
		$data = array(
			'Description' 	=> $_POST['editWdesc'],
		);
		
		$result = $this->mcrud->updateDataByForm('wastagereasons', $data, $id);
	}

	// Fetch Wastage-Reason for editing Page Method
	public function getWreasoneditdata()
	{
		$wrid = $_GET['id'];
		$wrData = $this->mcrud->getDataById('wastagereasons', $wrid, 'id');
		echo json_encode($wrData);
	}

// Item Wastage----------
	//Load Item Wastage Page
	public function wastage()
	{
		$userid = $this->session->userdata('userid');
		$data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation', $data);
		$this->load->view('inventory/wastage');
		$this->load->view('includes/dash_footer');
	}

	// Fetch Wastage-Record for Main Page Method
	
	public function getWastageData()
	{
		$allWastage = $this->mcrud->fetchAllData('itemwastage', 'id');
		$dataString = '';
		foreach ($allWastage as $row) {
			// if ($price->status == 0) {
			// 	$status = "Active";
			// 	$btnclass = "btn btn-danger btn-rounded";
			// 	$faclass = "fa fa-lock";
			// } else {
			// 	$status = "Blocked";
			// 	$btnclass = "btn btn-primary btn-rounded";
			// 	$faclass = "fa fa-unlock-alt";
			// }
			$dataString .= '
				<tr class="grade">
				<td>' . $row	->	id . '</td>
				<td>' . $row	->	wastage_id . '</td>
				<td>' . $row 	->	wastageReason . '</td>
				<td>' . $row	->	Itemcode . '</td>
				<td>' . $row	->	itemname . '</td>	
				<td>' . $row	->	batchno . '</td>
				<td style="text-align:right">' . $row	->	qty . '</td>		
				<td style="text-align:right">' . $row	->	perItemCost . '</td>	
				<td style="text-align:right">' . $row	->	totalAmoun . '</td>	
				<td>' . $row	->	Description . '</td>	
				<td>' . $row	->	createdDate . '</td>	
				</tr>';
		}
		echo $dataString;
	}

	// Insert Wastage-Record Method
	public function addWastage()
	{
			$data = array(
			'wastage_id'			=> strtoupper($_POST['Worderid']),
			'wastageReason' 		=> $_POST['Wreason'],	 
			'Itemcode'				=> $_POST['WitemCode'],
			'itemname'				=> $_POST['Witemdesc'],
			'batchno'				=> $_POST['Wbatch'],
			'qty'					=> $_POST['Wqty'],
			'perItemCost'			=> $_POST['Wcost'],
			'totalAmoun'			=> $_POST['Wtotal'],
			'Description'			=> $_POST['Wremarks'],
			);

		$result = $this->mcrud->addDataByForm('itemwastage', $data);
		echo $result;

			$data2 = array(
			'CurrentNumber'  => $_POST['woid'],
			);

		$result2 = $this->mcrud->updateDataByForm('nextnumber', $data2, array('Attribute' => 'ITEMWASTAG'));
		// return $result2;

			$batch = array('batchno' => ($_POST['Wbatch']));
			$data3 = array(
			'quantity'  => $_POST['Remqty'],
			'amount'  => $_POST['Remval'],
			);
		
		$result3 = $this->mcrud->updateDataByForm('onhand_stock', $data3, $batch);
		return $result3;

	}

	//Fetch Wastage Record Next Number
	public function get_next_num(){

		$nn = $this->inventory_model->get_next_num();
		echo json_encode($nn);
	}

	// Fetch Wastage Reason for dropdown Method
	public function get_was_res_code(){
		$allrows = $this->inventory_model->get_was_res_code();
		echo json_encode($allrows);
	}

	//Fetch Wastage Record Item batch#
	public function get_item_batch($id){
		$item = $this->inventory_model->get_item_batch($id);
		echo json_encode($item);
	}
	//Fetch Wastage Record Item batch# available qty
	public function get_item_batch_qty($id){
		$item = $this->inventory_model->get_item_batch_qty($id);
		echo json_encode($item);
	}

   

}

