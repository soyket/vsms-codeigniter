<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_login extends CI_Model {

	public function login($email,$password)
	{
        $this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
        if($query->num_rows()==1) {
               return $query->result();               
        } else {
            return false;
        }
	}
}
		
