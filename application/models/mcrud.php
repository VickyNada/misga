<?php

class Mcrud extends CI_Model {

    public function getAllData($tablename) {
        $query = $this->db->get($tablename);
        return $query->result();
    }


    public function getAllDataDesc($tablename,$orderattr) {
        $this->db->order_by("$orderattr DESC");
        $query = $this->db->get($tablename);
        return $query->result();
    }

    public function getAllDataAsc($tablename,$orderattr) {
        $this->db->order_by("$orderattr ASC");
        $query = $this->db->get($tablename);
        return $query->result();
    }

    public function getAllDataAscStatusActive($tablename,$orderattr) {
        $this->db->order_by("$orderattr ASC");
        $query = $this->db->get_where($tablename,array('delete_status'=>0));
        return $query->result();
    }    


    public function getAllDataSin($tablename,$orderattr) {
        $this->db->select($orderattr);
        $this->db->group_by($orderattr);
        $query = $this->db->get($tablename);
        return $query->result();
    }    


    public function getDataById($tablename, $wherearr, $tableattr) {
        $query = $this->db->get_where($tablename, array($tableattr => $wherearr));
        return $query->result();
    }

    public function getDataByIdOrder($tablename, $wherearr, $tableattr, $orderattr) {
        $this->db->order_by("$orderattr DESC");
        $query = $this->db->get_where($tablename, array($tableattr => $wherearr));
        return $query->result();
    }

   public function addDataByForm($tablename, $data) {
        $this->db->insert($tablename, $data);
       
        return $this->db->insert_id();
    } 

    public function updateDataByForm($tablename, $datafetched, $where) {
        $a = $this->db->update($tablename, $datafetched, $where);
        return $a;
    }

    public function deleteDataById($tablename, $wherearr, $tableattr) {
        $a = $this->db->delete($tablename, array($tableattr => $wherearr));
        return $a;
    }

    public function getRowCountAll($tablename){
        $result = $this->db->from($tablename)->count_all_results();
        return $result;
    }

    public function getRowCountAttr($tablename, $wherearr, $tableattr){
        $result = $this->db->where(array($tableattr => $wherearr))->from($tablename)->count_all_results();
        return $result;
    }

    public function getRowSumAll($tablename,$tableattr){
        $query= $this->db->select_sum($tableattr);
        $query = $this->db->get($tablename);
        return $query->result();
    }

    public function getMaxIdRow($tablename,$tableattr){
        $query= $this->db->order_by('"$tableattr" DESC');
        $query= $this->db->select('*');
        $query = $this->db->get($tablename);
        return $query->result();
    }

        public function getMaxIdRowid($tablename){
        $query= $this->db->order_by('id DESC');
        $query= $this->db->select('*');
        $query = $this->db->get($tablename);
        return $query->result();
    }    

    //Fetch all Data from Database ASC order
    public function fetchAllData($tablename,$orderattr) {
        $this->db->order_by("$orderattr ASC");
        $query = $this->db->get($tablename);
        return $query->result();
    }

    // Fetch Delivery Details where del_statsu != '1' and Paystatus != '1'
    public function fetch_del_data($tablename,$orderattr) {
        $this->db->order_by("$orderattr ASC");
        $query = $this->db->get_where($tablename,array('pay_status'=>1));
        return $query->result();
    }  


}