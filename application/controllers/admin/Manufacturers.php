<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manufacturers extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if ( ! $this->session->userdata('isLogin') || $this->session->userdata('type')!="admin") { 
            redirect('controller_login');
        }
		
		$this->load->database();
		$this->load->model('model_manufacturer');
	}


	public function index()
	{	
	    $data['manufacturers'] = $this->model_manufacturer->getAllManufacturers();
	    $this->parser->parse('admin/view_manufacturers', $data);
	}

	public function addManufacturer()
	{	
		if(! $this->input->post('submit')) {
			redirect(base_url() . 'admin/manufacturers');
		}
		else {
		    $manufacturer_name = $this->input->post('manufacturer_name');
		    $this->session->set_flashdata('message','Manufacturer Successfully Created.');
			$this->model_manufacturer->insertManufacturer($manufacturer_name);
			redirect(base_url() . 'admin/manufacturers');
		}
	}

	public function deleteManufacturer($cid)
	{	
        $this->model_manufacturer->deleteManufacturer($cid);
        $this->session->set_flashdata('message','Manufacturer Successfully Deleted.');
        redirect(base_url('admin/manufacturers'));
	}
}