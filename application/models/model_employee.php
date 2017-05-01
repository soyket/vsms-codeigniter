<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_employee extends CI_Model {

	public function insert($u_email,$f_name,$l_name,$u_bday,$u_position,$u_type,$u_pass,$u_mobile,$u_gender,$u_address)
	{
		$data = array(
			   'email' => $u_email,
               'first_name' => $f_name,
               'last_name' => $l_name,
               'birthday' => $u_bday,
			   'position' => $u_position,
			   'type' => $u_type,
			   'password' => $u_pass,
			   'mobile' => $u_mobile,
			   'gender' => $u_gender,
			   'address' => $u_address
            );
		$this->db->insert('users', $data); 
	}

	public function getAll()
	{
		$result = $this->db->get('users');
		return $result->result_array();
	}

	public function get($u_id)
	{
		$this->db->where('id', $u_id);
		$result = $this->db->get('users');
		return $result->row_array();
	}
	
	public function update($f_name,$l_name,$u_bday,$u_position,$u_type,$u_pass,$u_mobile,$u_gender,$u_address,$u_id)
	{
		$data = array(
			'first_name' => $f_name,
			'last_name' => $l_name,
			'birthday' => $u_bday,
			'position' => $u_position,
			'type' => $u_type,
			'password' => $u_pass,
			'mobile' => $u_mobile,
			'gender' => $u_gender,
			'address' => $u_address
        );

		$this->db->where('id', $u_id);
		$this->db->where("(su != 1)");
		$this->db->update('users', $data); 
	}


	public function delete($u_id)
	{
		$this->db->where('id', $u_id);
		$this->db->where("(su != 1)");
		$this->db->delete('users'); 
	}
}