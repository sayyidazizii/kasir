<?php

class M_supplier extends CI_Model
{
    public $table = 'supplier';

    function get_data()
    {
        return $this->db->get_where($this->table, array('data_state' => 0))->result();
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

    function update($supplier_id, $data)
    {
        $this->db->where('supplier_id', $supplier_id);
        $this->db->update($this->table, $data);
    }

}
