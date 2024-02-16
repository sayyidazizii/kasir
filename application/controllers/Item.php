<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') !=true){
            redirect('Login');
        }
        $this->load->helper('date');
        $this->load->model('M_item');
    }

	public function index()
	{

        $data['title'] = 'Barang';

        //input search form
		$search              = $this->input->get('search');

        //layout
        $this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

        if ($search != null) {
			$data['item'] = $this->M_item->get_search_data($search);
			$data['pencarian'] = $search;
			$this->load->view('pages/item/index', $data);
		} else {
            $data['item'] = $this->M_item->get_data();
			$data['pencarian'] = null;
			$this->load->view('pages/item/index', $data);
		}

        //footer
		$this->load->view('layout/footer');
	}

    public function processAdd()
	{
		$item_name              = $this->input->post('item_name');
		$item_code              = $this->input->post('item_code'); 
		$item_unit_cost         = $this->input->post('item_unit_cost');
		$item_unit_price        = $this->input->post('item_unit_price');

		$data = array(
			'item_name'         => $item_name,
			'item_code'         => $item_code,
			'item_unit_cost'    => $item_unit_cost,
			'item_unit_price'   => $item_unit_price,
            'created_id'        => $this->session->userdata('id_user'),
            'created_at'        => date('Y-m-d H:i:s', now())
		);
		
        $this->M_item->save($data);
        $this->session->set_flashdata('alert', 
        '<div class="alert alert-success">
        <p>data berhasil di edit</p>
        </div>');
        redirect("Item");
	}

    public function edit($id)
	{
        $data['title'] = 'Edit Barang';
		$data['data'] = $this->M_item->first($id);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('pages/item/edit', $data);
		$this->load->view('layout/footer');

	}

    public function processEdit()
	{
		$item_id                = $this->input->post('item_id');
		$item_name              = $this->input->post('item_name');
		$item_code              = $this->input->post('item_code'); 
		$item_unit_cost         = $this->input->post('item_unit_cost');
		$item_unit_price        = $this->input->post('item_unit_price');

		$data = array(
			'item_name'         => $item_name,
			'item_code'         => $item_code,
			'item_unit_cost'    => $item_unit_cost,
			'item_unit_price'   => $item_unit_price,
            'created_id'        => $this->session->userdata('id_user'),
            'updated_at'        => date('Y-m-d H:i:s', now())

		);
		
		$this->M_item->update($item_id,$data);
        $this->session->set_flashdata('alert', 
        '<div class="alert alert-warning">
        <p>data berhasil di edit</p>
        </div>');
        redirect("Item");

	}

    public function hapus($id)
	{
		$data = array(
			'data_state' => 1,
		);
		
		$this->M_item->delete($id, $data);
        $this->session->set_flashdata('alert', 
        '<div class="alert alert-danger">
        <p>data berhasil di edit</p>
        </div>');
        redirect("Item");
	}
    
}
