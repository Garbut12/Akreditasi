<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function getuser()
    {
        $this->db->SELECT('*');
        $this->db->FROM('user');
        $this->db->WHERE('email', $this->session->userdata('email'));
        $data = $this->db->get();
        return $data->row_array();
    }

    public function getAsesor ()
    {
        $query = "SELECT * FROM asesor ";
        return count($this->db->query($query)->result_array());
    }

    public function getTahun ()
    {
        $query = "SELECT * FROM tahun_valid ";
        return count($this->db->query($query)->result_array());
    }

    public function getValidasi ($id=null)
    {
        $query = "SELECT * FROM validasi";
        return count($this->db->query($query)->result_array());
    }

    public function getHasilValidasi ($id=null)
    {
        $query = "SELECT * FROM akreditasi";
        return count($this->db->query($query)->result_array());
    }
}