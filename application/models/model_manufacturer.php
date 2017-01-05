<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_manufacturer extends CI_Model {

	public function insertManufacturer($manufacturer_name, $manufacturer_logo="")
	{
		$data = array(
			'manufacturer_name' => $manufacturer_name,
			'manufacturer_logo' => $manufacturer_logo,
        );

		$this->db->insert('manufacturers', $data);
	}

	
	/*
	* Get All Manufacturers
	*/
	
	public function getAllManufacturers()
	{
		$result = $this->db->get('manufacturers');
		return $result->result_array();
	}
	
	public function deleteManufacturer($manufacturer_id)
	{
		$this->db->where('id', $manufacturer_id);
		$this->db->delete('manufacturers');

		$this->db->where('manufacturer_id', $manufacturer_id);
		$this->db->delete('models');
	}
	

}