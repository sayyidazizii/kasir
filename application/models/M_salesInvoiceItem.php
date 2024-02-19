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

}
