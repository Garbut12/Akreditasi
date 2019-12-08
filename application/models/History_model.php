<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_model extends CI_Model
{
    public function getHistory($limit, $start)
    {


        $data = $this->db->select('*')
            ->from('akreditasi')
            ->join('validasi', 'akreditasi.id_valid = validasi.id')
            ->join('tahun_valid', 'validasi.tahun_id = tahun_valid.id')
            ->limit($limit,$start)
            ->get();
        return $data->result_array();

    }

     public function pageHistory($limit, $start)
     {
         $data = $this->db->select('*')
             ->from('akreditasi')
             ->join('validasi', 'akreditasi.id_valid = validasi.id')
             ->join('tahun_valid', 'validasi.tahun_id = tahun_valid.id')
             ->limit($limit,$start)
             ->get();
         return $data->result_array();


     }

    public function searchHistory($keyword)
    {
        $this->db->SELECT('*');
        $this->db->FROM('akreditasi');
        $this->db->JOIN('validasi', 'akreditasi.id_valid = validasi.id');
        $this->db->JOIN('tahun_valid', 'validasi.tahun_id = tahun_valid.id');
        $this->db->LIKE('npsn', $keyword);
        $this->db->OR_LIKE('satuan_pendidikan', $keyword);
        $this->db->OR_LIKE('program', $keyword);
        $this->db->OR_LIKE('kab_kota', $keyword);

        $data = $this->db->get();
        return $data->result_array();
    }
}