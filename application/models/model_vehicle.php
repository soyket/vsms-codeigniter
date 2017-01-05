<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_vehicle extends CI_Model {

	public function insert($featured,$image,$manufacturer_id,$model_id,$category,$buying_price,$mileage,$add_date,$status,$registration_year,$insurance_id,$gear,$doors,$seats,$tank,$engine_no,$chesis_no,$user_id,$color)
	{
		$data = array(
			'featured' => $featured,
			'image' => $image,
			'manufacturer_id' => $manufacturer_id,
			'model_id' => $model_id,
			'category' => $category,
			'buying_price' => $buying_price,
			'mileage' => $mileage,
			'add_date' => $add_date,
			'status' => $status,
			'insurance_id' => $insurance_id,
			'gear' => $gear,
			'doors' => $doors,
			'seats' => $seats,
			'tank' => $tank,
			'engine_no' => $engine_no,
			'chesis_no' => $chesis_no,
			'user_id' => $user_id,
			'registration_year' => $registration_year,
			'color' => $color
        );

		$this->db->insert('vehicles', $data); 
	}


	public function getAll()
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $result = $this->db->get();
		return $result->result_array();
	}

	public function getAllByManufacturer()
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*, COUNT(manufacturer_id) as total');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        // $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->group_by('manufacturer_id');
        $this->db->order_by('total', 'desc'); 
        $result = $this->db->get();
		return $result->result_array();
	}

	public function getAllByManufacturerSold()
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*, COUNT(manufacturer_id) as total');
        $this->db->from('vehicles');
        $this->db->where('status', 'sold');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        // $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->group_by('manufacturer_id');
        $this->db->order_by('total', 'desc'); 
        $result = $this->db->get();
		return $result->result_array();
	}


	public function getLatest()
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->order_by("vehicle_id", "desc");
        $this->db->limit(4);
        $result = $this->db->get();
		return $result->result_array();
	}

	public function getFeatured()
	{
		//$result = $this->db->get('vehicles');
		$this->db->select('*');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->where("featured", 1);
        $this->db->order_by("vehicle_id", "desc");
        $this->db->limit(4);
        $result = $this->db->get();
		return $result->result_array();
	}

	public function getById($vehicle_id)
	{
		// $result = $this->db->get('vehicles');
		$this->db->select('*');
        $this->db->from('vehicles');
        $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
        $this->db->join('models', 'models.id = vehicles.model_id', 'inner');
        $this->db->where('vehicle_id', $vehicle_id);
        $this->db->limit(1);
        $result = $this->db->get();
		return $result->result_array();
	}
        
    public function customerList()
	{
		$this->db->select('*');
                $this->db->from('customer');
                $this->db->join('vehicles', 'customer.vehicle_id = vehicles.vehicle_id','inner');
                $this->db->join('manufacturers', 'manufacturers.id = vehicles.manufacturer_id','inner');
                $this->db->join('models', 'models.id = vehicles.model_id', 'inner');

                $result = $this->db->get();
                //echo $this->db->last_query();
		return $result->result_array();
	}
        
	public function get($v_id)
	{
		$this->db->where('vehicle_id', $v_id);
		$result = $this->db->get('vehicles');
		return $result->row_array();
	}
    

    public function sell($v_id,$cf_name,$cl_name,$c_email,$s_price,$c_mobile,$w_start,$w_end,$payment_type,$c_pass)
	{
				
		$data = array(
               'status' => 'sold',
               'selling_price' => $s_price,
               'sold_date' => $w_start
            );
		$this->db->where('vehicle_id', $v_id);
		$this->db->update('vehicles', $data); 
		
		$datac = array(
               'vehicle_id' => $v_id,
               'cf_name' => $cf_name,
               'cl_name' => $cl_name,
               'c_email' => $c_email,
               'c_mobile' => $c_mobile,
               'w_start' => $w_start,
               'w_end' => $w_end,
               'payment_type' => $payment_type,
               'c_pass' => $c_pass
            );
		$this->db->insert('customer', $datac);
	}

	public function delete($id)
	{
		$this->db->where('vehicle_id', $id);
		$this->db->delete('vehicles');
	}
        
    public function deletecustomer($c_id, $v_id)
	{
		$this->db->where('c_id', $c_id);
		$this->db->delete('customer'); 
                
        $data = array(
       'status' => 'available',
       'selling_price' => NULL,
       'sold_date' => NULL
        );
		$this->db->where('vehicle_id', $v_id);
		$this->db->update('vehicles', $data);
	}

	public function get_vehicle_by_month(){
        $this->db->select('*, MONTH(add_date) as month,  YEAR(add_date) as year, SUM(buying_price) as b_price, SUM(selling_price) as s_price');
        $this->db->from('vehicles');
        $this->db->group_by('month');
        $query = $this->db->get();
        return $query->result();
    }
}