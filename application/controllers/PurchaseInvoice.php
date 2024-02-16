<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PurchaseInvoice extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') !=true){
            redirect('Login');
        }
	    $this->load->helper('date');
        $this->load->model('M_supplier');
        $this->load->model('M_purchaseInvoice');
        $this->load->model('M_purchaseInvoiceItem');
        $this->load->model('M_stock');
        $this->load->model('M_stockMutation');
    }

	public function index()
	{
        $data['title'] = 'Pembelian';

        //input search form
		$search              = $this->input->get('search');

        //layout
        $this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

        if ($search != null) {
			$data['data'] = $this->M_purchaseInvoice->get_search_data($search);
			$data['pencarian'] = $search;
			$this->load->view('pages/purchase_invoice/index', $data);
		} else {
            $data['data'] = $this->M_purchaseInvoice->get_data();
			$data['pencarian'] = null;
			$this->load->view('pages/purchase_invoice/index', $data);
		}

        //footer
		$this->load->view('layout/footer');

	}

    public function add()
	{
        $data['title']      = 'Tambah Pembelian';
        $data['supplier']   = $this->M_supplier->get_data();
        $data['stock']      = $this->M_stock->get_data();

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('pages/purchase_invoice/add', $data);
		$this->load->view('layout/footer');

	}

    public function processAdd()
	{
		$supplier_name          = $this->input->post('supplier_name');
		$supplier_address       = $this->input->post('supplier_address'); 
		$supplier_phone         = $this->input->post('supplier_phone');

		$data = array(
			'supplier_name'     => $supplier_name,
			'supplier_address'  => $supplier_address,
			'supplier_phone'    => $supplier_phone,
            'created_id'        => $this->session->userdata('id_user'),
            'created_at'        => date('Y-m-d H:i:s', now())
		);
		
        $this->M_supplier->save($data);
        $this->session->set_flashdata('alert', 
        '<div class="alert alert-success">
        <p>data berhasil di edit</p>
        </div>');
        redirect("Supplier");
	}

    public function edit($id)
	{
        $data['title'] = 'Edit Pemasok';
		$data['data'] = $this->M_supplier->first($id);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('pages/supplier/edit', $data);
		$this->load->view('layout/footer');

	}

    public function processEdit()
	{
		$supplier_id            = $this->input->post('supplier_id');
        $supplier_name          = $this->input->post('supplier_name');
		$supplier_address       = $this->input->post('supplier_address'); 
		$supplier_phone         = $this->input->post('supplier_phone');

		$data = array(
			'supplier_name'     => $supplier_name,
			'supplier_address'  => $supplier_address,
			'supplier_phone'    => $supplier_phone,
            'created_id'        => $this->session->userdata('id_user'),
            'updated_at'        => date('Y-m-d H:i:s', now())

		);

		$this->M_supplier->update($supplier_id,$data);
        $this->session->set_flashdata('alert', 
        '<div class="alert alert-warning">
        <p>data berhasil di edit</p>
        </div>');
        redirect("Supplier");

	}

    public function hapus($id)
	{
		$data = array(
			'data_state' => 1,
		);
		
		$this->M_supplier->delete($id, $data);
        $this->session->set_flashdata('alert', 
        '<div class="alert alert-danger">
        <p>data berhasil di edit</p>
        </div>');
        redirect("Supplier");
	}

    
}
