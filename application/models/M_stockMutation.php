<?php

class M_stockMutation extends CI_Model
{
    public $table = 'item_stock_mutation';

    function get_data()
    {
        $this->db->select('item_stock.*, item.item_name, item.item_code, item.item_unit_cost, item.item_unit_price');
        $this->db->from('item_stock');
        $this->db->join('item', 'item_stock.item_id = item.item_id');
        $this->db->where('item_stock.data_state', 0);
        return $this->db->get()->result();

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

    function update($item_stock_id, $data)
    {
        $this->db->where('item_stock_id', $item_stock_id);
        $this->db->update($this->table, $data);
    }

    function get_search_data($data)
    {
        $this->db->like('item_name ', $data);
        $this->db->or_like('item_code', $data);
        $this->db->or_like('item_unit_cost', $data);
        $this->db->or_like('item_unit_price', $data);

        return $this->db->get($this->table)->result();
    }

}
