<?php

class delivery extends CI_Controller
{
    public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('mcrud');
        $this->load->model('delivery_model');
        
	}

    //Load Delivery Page
    public function Delivery()
    {
        $userid = $this->session->userdata('userid');
        $data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
        $this->load->view('includes/dash_header');
        $this->load->view('includes/navigation', $data);
        $this->load->view('delivery/Delivery');
        $this->load->view('includes/dash_footer');
    }

	//Load Delivery History Page
    public function allDelivery()
    {
        $userid = $this->session->userdata('userid');
        $data["userInfo"] = $this->mcrud->getDataById('users', $userid, 'id');
        $this->load->view('includes/dash_header');
        $this->load->view('includes/navigation', $data);
        $this->load->view('delivery/alldeliveryDetails');
        $this->load->view('includes/dash_footer');
    }

    //fetch Driver Name for Drop down
    public function get_driver_name(){
		$allrows = $this->delivery_model->get_driver_name();
		echo json_encode($allrows);
	}

    //fetch completed order list
    public function get_com_order_list(){
		$allrows = $this->delivery_model->get_com_order_list();
		echo json_encode($allrows);
	}

    //Fetch customer name
	public function get_cus_name($id){
   		$item = $this->delivery_model->get_cus_name($id);
		echo json_encode($item);

	}

    public function getDeliveryData()
	{
		$alldelivery = $this->mcrud->fetch_del_data('delivery', 'delivery_id');
		$dataString = '';
		foreach ($alldelivery as $row) {
			if ($row->pay_status == 1) {
				$status = "Payment Pending";
				$btnclass = "btn btn-danger btn-rounded";
				$faclass = "fa fa-money";
			} else {
				$status = "Paid";
				$btnclass = "btn btn-primary btn-rounded";
				$faclass = "fa fa-exchange";
			}
            if ($row->del_status == 1) {
				$status1 = "Delivery In Progress";
				$btnclass2 = "btn btn-danger btn-rounded";
				$faclass2 = "fa fa-bicycle";
			} else {
				$status1 = "Delivery Completed";
				$btnclass2 = "btn btn-primary btn-rounded";
				$faclass2 = "fa fa-handshake-o";
			}
			$dataString .= '
				<tr class="grade">
				<td>' . $row	->	delivery_id . '</td>
				<td>' . $row	->	del_date . '</td>
				<td>' . $row	->	driver_id . '</td>
				<td>' . $row	->	order_id . '</td>
				<td>' . $row	->	cus_name . '</td>	
				<td>' . $row	->	del_address . '</td>
				<td>' . $row	->	cus_mobile_num . '</td>		
				<td>' . $row	->	add_info . '</td>	
				<td>' . $row	->	del_chargers . '</td>	
				<td><div style="width: 40%; float:left">' . $status1 . '</div><div style="width: 60%; float:left"><a class="' . $btnclass2 . '" id="payBtn" onclick="comDelivery(' . $row->delivery_id . ',' . $row->del_status . ') " href="#" ><i class="' . $faclass2 . '" aria-hidden="true"></i></a></div></td>
				<td><div style="width: 40%; float:left">' . $status . '</div><div style="width: 60%; float:left"><a class="' . $btnclass . '" id="payBtn" onclick="payDelivery(' . $row->delivery_id . ',' . $row->pay_status . ') " href="#" ><i class="' . $faclass . '" aria-hidden="true"></i></a></div></td>
				</tr>';
		}
		echo $dataString;
	}

    // Insert delivery Method
	public function insert_delivery()
	{
		$data = array(
			'driver_id'			=> $_POST['Dname'],
			'del_date'			=> $_POST['Ddate'],
			'order_id'			=> $_POST['Dorder'],
			'cus_name'			=> $_POST['Dcusname'],
			'del_address'		=> $_POST['Daddress'],		
            'cus_mobile_num'	=> $_POST['Dmobile'],
            'add_info'			=> $_POST['Daddinfo'],
            'del_chargers'		=> $_POST['Dcharg'],
            'del_status'		=> $_POST['Dsts'],
		);
		$result = $this->mcrud->addDataByForm('delivery', $data);
		echo $result;
	}

	// Delivery Payment
	public function payDelivery()
	{
		$id = array('delivery_id' => $_GET['delivery_id']);
		if ($_GET['pay_status'] == 1) {
			$new_Status = 0;
		} else {
			$new_Status = 1;
		};
		$data = array('pay_status' => $new_Status);

		$data['userBlock'] = $this->mcrud->updateDataByForm('delivery', $data, $id);
		// redirect(URL_BASE . 'inventory');
	}

	// Complete Delviery
	public function comDelivery()
	{
		$id = array('delivery_id' => $_GET['delivery_id']);
		if ($_GET['del_status'] == 1) {
			$new_Status = 0;
		} else {
			$new_Status = 1;
		};
		$data = array('del_status' => $new_Status);

		$data['userBlock'] = $this->mcrud->updateDataByForm('delivery', $data, $id);
		// redirect(URL_BASE . 'inventory');
	}

	// Load All Delivery Infomation
	public function getallDeliveryData()
	{
		$alldelivery1 = $this->mcrud->fetchAllData('delivery_paid', 'delivery_id');
		$dataString = '';
		foreach ($alldelivery1 as $row) {
			$dataString .= '
				<tr class="grade">
				<td>' . $row	->	delivery_id . '</td>
				<td>' . $row	->	del_date . '</td>
				<td>' . $row	->	order_id . '</td>
				<td>' . $row	->	driver_id . '</td>
				<td>' . $row	->	driver_name . '</td>
				<td>' . $row	->	cus_name . '</td>		
				<td>' . $row	->	del_chargers . '</td>	
				<td>' . $row	->	del_status . '</td>		
				<td>' . $row	->	Payment_Status . '</td>
				</tr>';
		}
		echo $dataString;
	}





	

    

 

    public function page()
	{
		$this->load->view('includes/page');
	}

}