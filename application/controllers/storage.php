<?php

class Storage extends CI_Controller
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
        $this->load->view('storage/index');
        $this->load->view('includes/dash_footer');
    }

    public function getAllStorageData()
    {
        $alldata = $this->mcrud->getAllDataAsc('storage_types', 'id');
        $allvoldata = $this->mcrud->getAllDataAsc('storage_types_vol', 'id');
        $dataString = '';

        foreach ($alldata as $data) {
            $dataString .= '
				<tr class="grade">
				<td>' . $data->type . '</td><td>';
            foreach ($allvoldata as $data2) {
                if ($data->id == $data2->type_id) {
                    if ($data2->size == "Small") {
                        $color = "primary";
                    } else if ($data2->size == "Medium") {
                        $color = "info";
                    } else if ($data2->size == "Large") {
                        $color = "success";
                    } else if ($data2->size == "XL") {
                        $color = "danger";
                    } else {
                        $color = "warning";
                    }

                    $dataString .= '<span class="label label-' . $color . '">' . $data2->size . '-' . $data2->vol . '</span>&nbsp;&nbsp;';
                }
            }
            $dataString .= '</td><td><a class="btn btn-danger btn-rounded" id="deleteUserBtn" onclick="deleteStorage(' . $data->id . ') " href="#" ><i class="fa fa-trash-o"></i> Delete</a></td>
            </td></tr>';
        }
        echo $dataString;
    }

    public function addStoragetype()
    {
        $data = array(
            'type' => $_POST['stype'],
        );

        $insert_id = $this->mcrud->addDataByForm('storage_types', $data);

        $this->insertStorageVolumes($insert_id, $_POST['Small'], 'Small');
        $this->insertStorageVolumes($insert_id, $_POST['Medium'], 'Medium');
        $this->insertStorageVolumes($insert_id, $_POST['Large'], 'Large');
        $this->insertStorageVolumes($insert_id, $_POST['XL'], 'XL');
        $this->insertStorageVolumes($insert_id, $_POST['XXL'], 'XXL');

        echo 1;
    }

    private function insertStorageVolumes($insert_id, $volValue, $size)
    {
        if ($volValue > 0) {
            $data2 = array('type_id' => $insert_id, 'vol' =>  $volValue, 'size' => $size);
            $result = $this->mcrud->addDataByForm('storage_types_vol', $data2);
        }
    }

    public function deleteStorageData()
    {
        $id = $_GET['id'];
        $data['userDelete'] = $this->mcrud->deleteDataById('storage_types', $id, 'id');

        redirect(URL_BASE . 'storage');
    }
}
