<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_car_model extends CI_Model {

	public function getAllmodels()
	{
		$result = $this->db->select('models.*, manufacturers.manufacturer_name')->from('models')->join('manufacturers', 'models.manufacturer_id = manufacturers.id')->get();
		return $result->result_array();
	}

	public function insertmodel($model_name, $manufacturer_id, $description)
	{
		$data = array(
               'model_name' 				=> $model_name,
               'manufacturer_id' 	=> $manufacturer_id,
               'model_description'		=> $description,
        );

		$this->db->insert('models', $data); 
	}

	public function deleteModel($model_id)
	{
		$this->db->where('id', $model_id);
		$this->db->delete('models'); 
	}
}