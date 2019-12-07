<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_model extends CI_Model
{
    public function getHistory()
    {
        $query = "SELECT * FROM akreditasi
                    JOIN validasi ON akreditasi.id_valid = validasi.id
                    JOIN  tahun_valid ON validasi.tahun_id = tahun_valid.id";
        return $this->db->query($query)->result_array();
    }

    public function searchHistory($keyword)
    {
        $this->db->SELECT('*');
        $this->db->FROM('akreditasi');
        $this->db->LIKE('npsn', $keyword);
        $this->db->OR_LIKE('satuan_pendidikan', $keyword);
        $this->db->OR_LIKE('program', $keyword);
        $this->db->OR_LIKE('kab_kota', $keyword);

        $data = $this->db->get();
        return $data->result_array();
    }
}