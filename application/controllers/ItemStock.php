<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ItemStock extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') !=true){
            redirect('Login');
        }
        $this->load->helper('date');
        $this->load->model('M_stock');
    }

	public function index()
	{

        $data['title'] = 'Stock Barang';

        //input search form
		$search              = $this->input->get('search');

        //layout
        $this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

        if ($search != null) {
			$data['data'] = $this->M_stock->get_search_data($search);
			$data['pencarian'] = $search;
			$this->load->view('pages/item_stock/index', $data);
		} else {
            $data['data'] = $this->M_stock->get_data();
			$data['pencarian'] = null;
			$this->load->view('pages/item_stock/index', $data);
		}

        //footer
		$this->load->view('layout/footer');
	}
    
}
