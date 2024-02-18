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


}
