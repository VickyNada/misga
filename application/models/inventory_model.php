<?php

class inventory_model extends CI_model
{

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

    public function get_all_items()
    {
        $query = $this->db->get('inventory_master');
        return $query->result_array();
    }

    public function get_item_desc($id){
        $query = $this->db->get_where('inventory_master', array('Itemcode'=>$id));
        return $query->result_array();
    }

    //Fetch Next Number Item Wastage
    public function get_next_num(){
        $query = $this->db->get_where('nextnumber', array('Attribute'=>'ITEMWASTAG'));
        return $query->result_array();
    }

    //Fetch Wastage Reason table data
    public function get_was_res_code()
    {
        $query = $this->db->get('wastagereasons');
        return $query->result_array();
    }
    //Fetch Batch Number from On hand Stock Table
    public function get_item_batch($id){
        $query = $this->db->get_where('onhand_stock', array('itemId'=>$id));
        return $query->result_array();
    }
    //Fetch Batch Number available stock from On hand Stock Table
    public function get_item_batch_qty($id){
        $query = $this->db->get_where('onhand_stock', array('batchno'=>$id));
        return $query->result_array();
    }


}
