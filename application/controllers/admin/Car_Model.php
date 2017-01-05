<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Car_Model extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin') || $this->session->userdata('type')!="admin") { 
            redirect('controller_login');
        }
		
		$this->load->database();
		$this->load->model('model_manufacturer');
		$this->load->model('model_car_model');
	}


	public function index()
	{
		$data['manufacturers'] = $this->model_manufacturer->getAllManufacturers();
		$data['models'] = $this->model_car_model->getAllModels();
		// $this->load->view('admin/car_model', $data);
		$this->parser->parse('admin/view_car_model', $data);
	}

	public function addmodel()
	{	
		if(! $this->input->post('buttonSubmit')) {
			redirect(base_url('admin/car_model'));
		}

		else {
			$model_name = $this->input->post('model_name');
			$manufacturer_id = $this->input->post('manufacturer_id');
			$description = $this->input->post('model_description');

			$this->model_car_model->insertmodel($model_name, $manufacturer_id, $description);
			$this->session->set_flashdata('message','Model Created Successfully.');
			redirect(base_url('admin/car_model'));
		}
	}

	public function deleteModel($cid)
	{	
        $this->model_car_model->deleteModel($cid);
        $this->session->set_flashdata('message','Model Deleted Successfully.');
        redirect(base_url('admin/car_model'));
	}
}