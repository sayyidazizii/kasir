<?php

class M_customer extends CI_Model
{
    public $table = 'customer';

    function get_data()
    {
        return $this->db->get($this->table)->result();
    }

    function save($data)
    {
        $this->db->insert($this->table, $data);
    }

    function delete($customer_id)
    {
        $this->db->where('customer_id', $customer_id);
        $this->db->delete($this->table);
    }

    function first($customer_id)
    {
        $this->db->where('customer_id', $customer_id);
        return $this->db->get($this->table)->row();
    }

    function save_update($customer_id, $data)
    {
        $this->db->where('customer_id', $customer_id);
        $this->db->update($this->table, $data);
    }

}
