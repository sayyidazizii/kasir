<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') !=true){
            redirect('Login');
        }
        $this->load->model('M_supplier');
    }

	public function index()
	{
        $data['title'] = 'Pemasok';
        $data['data'] = $this->M_supplier->get_data();
        
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('pages/supplier/index',$data);
		$this->load->view('layout/footer');
	}

    
}
