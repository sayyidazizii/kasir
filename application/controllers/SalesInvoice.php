<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SalesInvoice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('is_login') != true) {
            redirect('Login');
        }
        $this->load->helper('date');
        $this->load->model('M_salesInvoice');
        $this->load->model('M_salesInvoiceItem');
        $this->load->model('M_item');
        $this->load->model('M_stockMutation');
    }

    public function index()
    {
        $data['title'] = 'Penjualan';

        //input search form
        $search = $this->input->get('search');

        //layout
        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');

        if ($search != null) {
            $data['data'] = $this->M_salesInvoice->get_search_data($search);
            $data['pencarian'] = $search;
            $this->load->view('pages/sales_invoice/index', $data);
        } else {
            $data['data'] = $this->M_salesInvoice->get_data();
            $data['pencarian'] = null;
            $this->load->view('pages/sales_invoice/index', $data);
        }

        //footer
        $this->load->view('layout/footer');

    }

    public function add()
    {
        $data['title'] = 'Tambah Penjualan';
        $data['item']  = $this->M_item->get_data();

        $this->load->view('layout/header');
        $this->load->view('layout/sidebar');
        $this->load->view('layout/navbar');
        $this->load->view('pages/sales_invoice/add', $data);
        $this->load->view('layout/footer');
    }

    public function simpanSesi() {
        $data = $this->input->post('data');
        $this->session->set_userdata('table_barang', $data);
    }

    //generate nomor Invoice
	public function numberInv()
    {
        $latest = $this->M_salesInvoice->latest();

        if (!$latest) {
            return 'SI0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->no_rm);

        return 'SI' . sprintf('%04d', $string + 1);
    }

    public function processAdd()
    {
        // Ambil data dari form
        $sales_invoice_date = $this->input->post('sales_invoice_date');
        $customer_name      = $this->input->post('customer_name');
        $total_bayar        = $this->input->post('total_bayar');
        $bayar              = $this->input->post('bayar');
        $kembalian          = $this->input->post('kembalian');

        // Buat array untuk data penjualan
        $sales_invoice_data = array(
            'sales_invoice_date'    => $sales_invoice_date,
            'sales_invoice_no'      => $this->numberInv(),
            'customer_name'         => $customer_name,
            'sales_invoice_amount'  => $total_bayar,
            'sales_invoice_payment' => $bayar,
            'sales_invoice_change'  => $kembalian,
            'created_id'            => $this->session->userdata('id_user'),
            'data_state'            => 0,
            'created_at'            =>  date('Y-m-d H:i:s')

        );

        // Panggil model untuk menyimpan data penjualan
        $this->M_salesInvoice->insert_invoice($sales_invoice_data);

        // Dapatkan sales_invoice_id terakhir yang disisipkan
        $sales_invoice_id = $this->db->insert_id();

        // Ambil data barang dari sesi
        $table_barang = $this->session->userdata('table_barang');
        // var_dump($table_barang);
        // exit;

        // Panggil model untuk menyimpan detail penjualan
        foreach ($table_barang as $barang) {
            // Menggunakan ID  sales invoice dalam data obat sebelum menyimpannya
			$data_barang = array(
				'sales_invoice_id'  => $sales_invoice_id,
				'item_id'           => $barang['item_id'],
				'quantity'          => $barang['quantity'],
				'total'             => $barang['total']

			);
            //simpan di tabel detail
			$this->M_salesInvoiceItem->save($data_barang);
            
            // Kurangi stok barang
            $this->M_item->reduce_stock($barang['item_id'], $barang['quantity']);
        }

        // Redirect atau tampilkan pesan berhasil
        $this->session->set_flashdata(
			'alert',
			'<div class="alert alert-success">
        <p>data berhasil di Tambah</p>
        </div>'
		);
        redirect('SalesInvoice/add');
    }

   

}
