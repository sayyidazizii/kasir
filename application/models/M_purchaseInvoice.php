<?php

class M_purchaseInvoice extends CI_Model
{
    public $table = 'purchase_invoice';

    function get_data()
    {
        return $this->db->get($this->table)->result();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($purchase_invoice_id)
    {
        $this->db->where('purchase_invoice_id', $purchase_invoice_id);
        $this->db->delete($this->table);
    }

    function first($purchase_invoice_id)
    {
        $this->db->where('purchase_invoice_id', $purchase_invoice_id);
        return $this->db->get($this->table)->row();
    }

    function save_update($purchase_invoice_id, $data)
    {
        $this->db->where('purchase_invoice_id', $purchase_invoice_id);
        $this->db->update($this->table, $data);
    }

}
