<?php

class M_purchaseInvoiceItem extends CI_Model
{
    public $table = 'purchase_invoice_item';

    function get_data()
    {
        return $this->db->get($this->table)->result();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($purchase_invoice_item_id)
    {
        $this->db->where('purchase_invoice_item_id', $purchase_invoice_item_id);
        $this->db->delete($this->table);
    }

    function first($purchase_invoice_item_id)
    {
        $this->db->where('purchase_invoice_item_id', $purchase_invoice_item_id);
        return $this->db->get($this->table)->row();
    }

    function save_update($purchase_invoice_item_id, $data)
    {
        $this->db->where('purchase_invoice_item_id', $purchase_invoice_item_id);
        $this->db->update($this->table, $data);
    }

}
