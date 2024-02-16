<?php

class M_item extends CI_Model
{
    public $table = 'item';

    function get_data()
    {
        return $this->db->get_where($this->table, array('data_state' => 0))->result();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($item_id,$data)
    {
        $this->db->where('item_id', $item_id);
        $this->db->update($this->table, $data);
    }

    function first($item_id)
    {
        $this->db->where('item_id', $item_id);
        return $this->db->get($this->table)->row();
    }

    function update($item_id, $data)
    {
        $this->db->where('item_id', $item_id);
        $this->db->update($this->table, $data);
    }

    function get_search_data($data)
    {
        $this->db->like('item_name', $data);
        $this->db->or_like('item_code', $data);
        $this->db->or_like('item_unit_cost', $data);
        $this->db->or_like('item_unit_price', $data);

        return $this->db->get($this->table)->result();
    }

}
