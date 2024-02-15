<?php

class M_supplier extends CI_Model
{
    public $table = 'supplier';

    function get_data()
    {
        return $this->db->get($this->table)->result();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($supplier_id)
    {
        $this->db->where('supplier_id', $supplier_id);
        $this->db->delete($this->table);
    }

    function first($supplier_id)
    {
        $this->db->where('supplier_id', $supplier_id);
        return $this->db->get($this->table)->row();
    }

    function save_update($supplier_id, $data)
    {
        $this->db->where('supplier_id', $supplier_id);
        $this->db->update($this->table, $data);
    }

}
