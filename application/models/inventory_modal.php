<?php

class Inventory_modal extends CI_Model {

    public function getLastInsertInventoryMasterItemCode() {
        $this->db->select_max('itemcode');
        $query = $this->db->get('inventory_master');
        return $query->result();
    }


    public function getLastOrderId() {
        $this->db->select_max('order_id');
        $query = $this->db->get('stock_order');
        return $query->result();
    }

}

?>