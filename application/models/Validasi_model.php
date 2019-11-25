<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT * FROM validasi";
        return $this->db->query($query)->result_array();
    }
}