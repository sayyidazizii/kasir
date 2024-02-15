<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') !=true){
            redirect('Login');
        }
        $this->load->model('M_item');
    }

	public function index()
	{
        $data['title'] = 'Barang';
        $data['item'] = $this->M_item->get_data();
        
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('pages/item/index',$data);
		$this->load->view('layout/footer');
	}

    
}
