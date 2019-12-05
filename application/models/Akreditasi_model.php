<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akreditasi_model extends CI_Model
{
    public function tahunValid()
    {
        $query = "SELECT * FROM `tahun_valid`";
        return $this->db->query($query)->result_array();

    }

    public function addTahun()
    {
        $data = [
            'tahun' => $this->input->post('tahun')
        ];

        $this->db->insert('tahun_valid', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }
//    // Fungsi untuk melakukan proses upload file
//    public function upload_file($filename){
//        $this->load->library('upload'); // Load librari upload
//
//        $config['upload_path'] = './excel/';
//        $config['allowed_types'] = 'xlsx';
//        $config['max_size']	= '2048';
//        $config['overwrite'] = true;
//        $config['file_name'] = $filename;
//
//        $this->upload->initialize($config); // Load konfigurasi uploadnya
//        if($this->upload->do_upload('file_valid')){ // Lakukan upload dan Cek jika proses upload berhasil
//            // Jika berhasil :
//            $return = array('result' => 'success', 'file_valid' => $this->upload->data(), 'error' => '');
//            return $return;
//        }else{
//            // Jika gagal :
//            $return = array('result' => 'failed', 'file_valid' => '', 'error' => $this->upload->display_errors());
//            return $return;
//        }
//    }

    // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
    public function insert_multiple($data){
        $this->db->insert_batch('akreditasi', $data);
    }

    public function editTahun($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('tahun_valid', $data);
    }

    public function getDetailTahun($id)
    {
        $query = "SELECT * FROM `tahun_valid` WHERE `id` = $id";
        return $this->db->query($query)->row_array();
    }

    public function deleteTahun($id)
    {
        $this->db->delete('tahun_valid', array('id'=> $id));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function validasi($id)
    {
        $query = "SELECT * FROM `validasi` WHERE `tahun_id` =$id ";
        return $this->db->query($query)->result_array();
    }

    public function getdetailvalid($id)
    {
        $query = "SELECT * FROM `validasi` WHERE  `id` = $id";
        return $this->db->query($query)->row_array();
    }

    public function valid()
    {
        $query = "SELECT * FROM `validasi`";
        return $this->db->query($query)->result_array();
    }

    public function addvalidasi($data)
    {

        $this->db->insert('validasi',$data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function editvalidasi($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('validasi', $data);
    }

    public function deleteValidasi($id)
    {
        $this->db->delete('validasi', array('id'=> $id));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

}