<?php

class Consumer extends CI_Model {

    public function verifyConsumerRegistration($tablename,$role,$email) {
        $this->db->where("email",$email);
        $this->db->where("role",$role);
        $query = $this->db->get($tablename);
        return $query->result();
    }

}