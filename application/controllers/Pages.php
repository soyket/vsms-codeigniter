<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('model_vehicle');
        $this->load->model('model_manufacturer');
        $this->load->model('model_car_model');
	}

	public function index()
	{	
		// $data['vehicles'] = $this->model_vehicle->getAll();
		$data['vehicles'] = $this->model_vehicle->getLatest();
		$data['featured'] = $this->model_vehicle->getFeatured();
		$data['manufacturers'] = $this->model_manufacturer->getAllManufacturers();
		$data['models'] = $this->model_car_model->getAllModels();
		
		$this->parser->parse('public/view_index', $data);   

        // $this->load->view('public/view_index');
	}

	public function show($vehicle_id)
	{
		$data['vehicle'] = $this->model_vehicle->getById($vehicle_id);
		
		$this->parser->parse('public/view_single.php', $data);
	}



}