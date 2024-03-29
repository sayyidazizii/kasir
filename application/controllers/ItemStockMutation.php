<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ItemStockMutation extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('is_login') != true) {
			redirect('Login');
		}
		$this->load->helper('date');
		$this->load->model('M_item');
		$this->load->model('M_StockMutation');

	}

	public function index()
	{

		$data['title'] = 'Mutasi';

		//input search form
		$search = $this->input->get('search');

		//layout
		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');

		if ($search != null) {
			$data['item'] = $this->M_StockMutation->get_search_data($search);
			$data['pencarian'] = $search;
			$this->load->view('pages/item_stock_mutasi/index', $data);
		} else {
			$data['item'] = $this->M_StockMutation->get_data();
			$data['pencarian'] = null;
			$this->load->view('pages/item_stock_mutasi/index', $data);
		}

		//footer
		$this->load->view('layout/footer');
	}

	public function processAdd()
	{
		$item_name = $this->input->post('item_name');
		$item_code = $this->input->post('item_code');
		$quantity = $this->input->post('quantity');
		$item_unit_price = $this->input->post('item_unit_price');

		$data = array(
			'item_name' => $item_name,
			'item_code' => $item_code,
			'quantity' => $quantity,
			'item_unit_price' => $item_unit_price,
			'created_id' => $this->session->userdata('id_user'),
			'created_at' => date('Y-m-d H:i:s', now())
		);

		$this->M_StockMutation->save($data);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success">
        <p>data berhasil di Tambah</p>
        </div>'
		);
		redirect("Item");
	}

	public function edit($id)
	{
		$data['title'] = 'Edit Barang';
		$data['data'] = $this->M_StockMutation->first($id);

		$this->load->view('layout/header');
		$this->load->view('layout/sidebar');
		$this->load->view('layout/navbar');
		$this->load->view('pages/item_stock_mutasi/edit', $data);
		$this->load->view('layout/footer');

	}

	public function processEdit()
	{
		$item_id = $this->input->post('item_id');
		$item_name = $this->input->post('item_name');
		$item_code = $this->input->post('item_code');
		$quantity = $this->input->post('quantity');
		$item_unit_price = $this->input->post('item_unit_price');

		$data = array(
			'item_name' => $item_name,
			'item_code' => $item_code,
			'quantity' => $quantity,
			'item_unit_price' => $item_unit_price,
			'created_id' => $this->session->userdata('id_user'),
			'updated_at' => date('Y-m-d H:i:s', now())

		);

		$this->M_StockMutation->update($item_id, $data);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-warning">
        <p>data berhasil di edit</p>
        </div>'
		);
		redirect("Item");

	}

	public function hapus($id)
	{
		$data = array(
			'data_state' => 1,
		);

		$this->M_StockMutation->delete($id, $data);
		$this->session->set_flashdata(
			'alert',
			'<div class="alert alert-danger">
        <p>data berhasil di edit</p>
        </div>'
		);
		redirect("Item");
	}

}
