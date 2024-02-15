<?php

class M_item extends CI_Model
{
    public $table = 'item';

    function get_data()
    {
        return $this->db->get($this->table)->result();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($item_id)
    {
        $this->db->where('item_id', $item_id);
        $this->db->delete($this->table);
    }

    function first($item_id)
    {
        $this->db->where('item_id', $item_id);
        return $this->db->get($this->table)->row();
    }

    function save_update($item_id, $data)
    {
        $this->db->where('item_id', $item_id);
        $this->db->update($this->table, $data);
    }

}
