<?php

class Inbound extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('mcrud');
		$this->load->model('inventory_modal');

		if ($this->session->userdata('userid') == null) {
			redirect(URL_BASE . 'login');
		}
	}

	public function index()
	{
		$userid = $this->session->userdata('userid');
		$data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
		$data["farmerinfo"] = $this->mcrud->getDataById('consumers', FARMER, 'role');
		$data["iteminfo"] = $this->mcrud->getAllData('inventory_master');

		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation', $data);
		$this->load->view('admin/inbound/index');
		$this->load->view('includes/dash_footer');
	}

	public function generateInvoice()
	{
		$userid = $this->session->userdata('userid');
		$data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
		$data['storageData'] = $this->mcrud->getAllData('storage_types');

		$this->load->view('includes/dash_header');
		$this->load->view('includes/navigation', $data);
		$this->load->view('admin/inbound/invoice');
		$this->load->view('includes/dash_footer');
	}


	public function generateinvoicedata()
	{
		$postData = json_decode($_POST['str']);
		$dataString = '';
		$dataString2 = '';
		$dataString3 = '';
		$totalAmount = 0;

		foreach ($postData as $item) {
			$farmer_id = $item->farmer_id;
			$dataString .=
				'<tr>
		<td>
		<div>' . $item->item_name . '</div>
		</td>
		<td>' . $item->quantity . '</td>
		<td>' . $item->amount . '</td>
		<td>' . $item->unit . '</td>
		<td>' . $item->totalamount . '</td>
		</tr>';
			$totalAmount += (int)$item->totalamount;
		}

		$dataString2 .= '
		<tr>
		<td><strong>Sub Total :</strong></td>
		<td>' . $totalAmount . '</td>
		</tr>
		<tr>
		<td><strong>TAX :</strong></td>
		<td>0</td>
		</tr>
		<tr>
		<td><strong>TOTAL :</strong></td>
		<td>' . $totalAmount . '</td>
		</tr>';

		$farmerinfo = $this->mcrud->getDataById('consumers', $farmer_id, 'id');


		$dataString3 .= '
		<address>
		<strong>' . $farmerinfo[0]->farm_name . '.</strong><br>
		<strong>' . $farmerinfo[0]->first_name . ' ' . $farmerinfo[0]->last_name . '.</strong><br>
		' . $farmerinfo[0]->Billing . '<br>
		' . $farmerinfo[0]->city . '<br>
		<abbr title="Phone">P:</abbr>' . $farmerinfo[0]->contact1 . '
		<abbr title="Phone">P:</abbr>' . $farmerinfo[0]->contact2 . '
		</address>
		';

		$response['dataString'] = $dataString;
		$response['dataString2'] = $dataString2;
		$response['dataString3'] = $dataString3;

		echo json_encode($response);
	}


	public function saveinvoicedata()
	{
		$postData = json_decode($_POST['str']);

		$batchId = 1;
		$lasetOrder = $this->inventory_modal->getLastOrderId();
		$newOrderId = $lasetOrder[0]->order_id + 1;

		foreach ($postData as $item) {
			$data = array(
				'farmer_id' => $item->farmer_id,
				'batch_id' => $batchId,
				'order_id' => $newOrderId
			);
			
			$data2 = array(
				'itemId' => $item->item_id,
				'quantity' => $item->quantity,
				'batchno' => $batchId,
				'unit_price' => $item->amount,
				'amount' => $item->totalamount
			);

			$batchId ++; 

			$insert_order = $this->mcrud->addDataByForm('stock_order', $data);
			$insert_stock_batches = $this->mcrud->addDataByForm('onhand_stock', $data2);

		}

		echo 1;
	}


	public function updatestoragedata(){

		$whereArr = array(
			'type_id' => $_POST['storageType'],
			'size' => $_POST['storageSize'],			
		);

		$data = array(
			'allocated' => $_POST['volume'],
		);

		$this->mcrud->updateDataByForm('storage_types_vol', $data, $whereArr);	
		echo 1;

	}
}
