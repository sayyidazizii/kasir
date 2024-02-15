<?php

class M_salesInvoiceItem extends CI_Model
{
    public $table = 'sales_invoice_item';

    function get_data()
    {
        return $this->db->get($this->table)->result();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($sales_invoice_item_id)
    {
        $this->db->where('sales_invoice_item_id', $sales_invoice_item_id);
        $this->db->delete($this->table);
    }

    function first($sales_invoice_item_id)
    {
        $this->db->where('sales_invoice_item_id', $sales_invoice_item_id);
        return $this->db->get($this->table)->row();
    }

    function save_update($sales_invoice_item_id, $data)
    {
        $this->db->where('sales_invoice_item_id', $sales_invoice_item_id);
        $this->db->update($this->table, $data);
    }

}
