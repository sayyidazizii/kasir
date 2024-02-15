<?php

class M_stock extends CI_Model
{
    public $table = 'stock';

    function get_data()
    {
        return $this->db->get($this->table)->result();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($item_stock_id)
    {
        $this->db->where('item_stock_id', $item_stock_id);
        $this->db->delete($this->table);
    }

    function first($item_stock_id)
    {
        $this->db->where('item_stock_id', $item_stock_id);
        return $this->db->get($this->table)->row();
    }

    function save_update($item_stock_id, $data)
    {
        $this->db->where('item_stock_id', $item_stock_id);
        $this->db->update($this->table, $data);
    }

}
