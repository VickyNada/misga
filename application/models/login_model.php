<?php

class login_model extends CI_model
{

    function loginAuthenticate($username,$password)
    {
        $this->db->where('email =', $username);
        $this->db->where('password =', md5($password));
       

        $Query = $this->db->get('users');
        
        if ($Query->num_rows() == 1) {
            return $Query->result_array();
        }else{
            return [];
        }
    }

    function loginAuthenticateConsumer($username, $password,$roleid)
    {
        $this->db->where('email =', $username);
        $this->db->where('password =', md5($password));
        $this->db->where('role =', $roleid);
        $Query = $this->db->get('consumers');
        
        if ($Query->num_rows() == 1) {
            return $Query->result_array();
        }else{
            return [];
        }
    }


    function getUserDataByEmail($email){
        return $this-> db->where('email',$email)->get('users')->row();
       
    }


}
