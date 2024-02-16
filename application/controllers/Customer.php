<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') !=true){
            redirect('Login');
        }
	    $this->load->helper('date');
        $this->load->model('M_customer');
    }

	public function index()
	{
        $data['title'] = 'Pelanggan';
        //input search form
		$search              = $this->input->get('search');

        //layout
        $this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

        if ($search != null) {
			$data['data'] = $this->M_customer->get_search_data($search);
			$data['pencarian'] = $search;
			$this->load->view('pages/customer/index', $data);
		} else {
            $data['data'] = $this->M_customer->get_data();
			$data['pencarian'] = null;
			$this->load->view('pages/customer/index', $data);
		}

        //footer
		$this->load->view('layout/footer');
	}

    public function processAdd()
	{
		$customer_name          = $this->input->post('customer_name');
		$customer_address       = $this->input->post('customer_address'); 
		$customer_phone         = $this->input->post('customer_phone');

		$data = array(
			'customer_name'     => $customer_name,
			'customer_address'  => $customer_address,
			'customer_phone'    => $customer_phone,
            'created_id'        => $this->session->userdata('id_user'),
            'created_at'        => date('Y-m-d H:i:s', now())
		);
		
        $this->M_customer->save($data);
        $this->session->set_flashdata('alert', 
        '<div class="alert alert-success">
        <p>data berhasil di edit</p>
        </div>');
        redirect("Customer");
	}

    public function edit($id)
	{
        $data['title'] = 'Edit Customer';
		$data['data'] = $this->M_customer->first($id);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('pages/customer/edit', $data);
		$this->load->view('layout/footer');

	}

    public function processEdit()
	{
		$customer_id            = $this->input->post('customer_id');

        $customer_name          = $this->input->post('customer_name');
		$customer_address       = $this->input->post('customer_address'); 
		$customer_phone         = $this->input->post('customer_phone');

		$data = array(
			'customer_name'     => $customer_name,
			'customer_address'  => $customer_address,
			'customer_phone'    => $customer_phone,
            'created_id'        => $this->session->userdata('id_user'),
            'updated_at'        => date('Y-m-d H:i:s', now())
		);
        
		
		$this->M_customer->update($customer_id,$data);
        $this->session->set_flashdata('alert', 
        '<div class="alert alert-warning">
        <p>data berhasil di edit</p>
        </div>');
        redirect("Customer");

	}

    public function hapus($id)
	{
		$data = array(
			'data_state' => 1,
		);
		
		$this->M_customer->delete($id, $data);
        $this->session->set_flashdata('alert', 
        '<div class="alert alert-danger">
        <p>data berhasil di edit</p>
        </div>');
        redirect("Customer");
	}

    
}
