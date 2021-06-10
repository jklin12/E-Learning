<?php

class Madmin extends CI_Model
{
    function getData($table)
    {
        return $this->db->get($table);
    }

    function addData($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    function editData($table, $data,$id)
    {
        $this->db->set($data);
        $this->db->where($id);
        return $this->db->update($table);

          
    }
}
