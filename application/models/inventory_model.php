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
    
    public function getallstorage()
    {
        $query = $this->db->get('storage_types');
        return $query->result_array();
    }



}
