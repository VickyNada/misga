<?php

class Inventory_modal extends CI_Model
{

    public function getLastInsertInventoryMasterItemCode()
    {
        $this->db->select_max('itemcode');
        $query = $this->db->get('inventory_master');
        return $query->result();
    }


    public function getLastOrderId()
    {
        $this->db->select_max('order_id');
        $query = $this->db->get('stock_order');
        return $query->result();
    }

    public function getallcategory()
    {
        $query = $this->db->get('itemcategory');
        return $query->result_array();
    }
    public function getallunit()
    {
        $query = $this->db->get('unitmeasure');
        return $query->result_array();
    }

    public function getallstorage()
    {
        $query = $this->db->get('storage_types');
        return $query->result_array();
    }

    
}
