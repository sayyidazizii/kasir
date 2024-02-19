<?php

class M_salesInvoice extends CI_Model
{
    public $table = 'sales_invoice';

    function get_data()
    {
        return $this->db->get_where($this->table, array('data_state' => 0))->result();

    }

    public function insert_invoice($data)
    {
        // Simpan data ke dalam tabel Sales Invoice
        $this->db->insert($this->table, $data);

        // Kembalikan ID invoice yang baru saja disimpan
        return $this->db->insert_id();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($sales_invoice_id)
    {
        $this->db->where('sales_invoice_id', $sales_invoice_id);
        $this->db->delete($this->table);
    }

    function first($sales_invoice_id)
    {
        $this->db->where('sales_invoice_id', $sales_invoice_id);
        return $this->db->get($this->table)->row();
    }

    function save_update($sales_invoice_id, $data)
    {
        $this->db->where('sales_invoice_id', $sales_invoice_id);
        $this->db->update($this->table, $data);
    }

    
    function latest()
    {
        $this->db->select('sales_invoice.*');
        $this->db->from($this->table);
        $this->db->order_by('sales_invoice.sales_invoice_id', 'DESC');
        return $this->db->get()->row();
    }

}
