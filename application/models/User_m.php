<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where(array("username" =>  $username, "password" => $password));
        return $this->db->get()->row();
    }
}
