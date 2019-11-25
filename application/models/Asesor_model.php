    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Asesor_model extends CI_Model
    {
        public function getAsesor()
        {
            $query = "SELECT * FROM `asesor` ";
            return $this->db->query($query)->result_array();
        }

        public function AddAsesor()
        {

            $data = [
                'nia' => $this->input->post('nia'),
                'nama' => $this->input->post('nama'),
                'rumpun' => $this->input->post('rumpun'),
                'kab_kota' => $this->input->post('kab_kota'),
                'status_penugasan' => $this->input->post('status_penugasan')
            ];

            $this->db->insert('asesor', $data);
            return ($this->db->affected_rows() != 1) ? false : true;

        }

        public function editAsesor($id,$data)
        {
            $this->db->where('id', $id);
            $this->db->update('asesor', $data);
        }

        public function getDetailAsesor($id)
        {
            $query = "SELECT * FROM `asesor` WHERE `id` = $id";
            return $this->db->query($query)->row_array();
        }

        public function deleteAsesor($id)
        {
            $this->db->delete('asesor', array('id'=> $id));
            return ($this->db->affected_rows() != 1) ? false : true;
        }

        public function getAsesorB()
        {
            $query = "SELECT * FROM `asesor_B` ";
            return $this->db->query($query)->result_array();
        }

        public function addAsesorB($data)
        {
            $this->db->insert('asesor_B', $data);
            return ($this->db->affected_rows() != 1) ? false : true;

        }

        public function editAsesorB($id,$data)
        {
            $this->db->where('id', $id);
            $this->db->update('asesor_B', $data);
        }

        public function getDetailAsesorB($id)
        {
            $query = "SELECT * FROM `asesor_B` WHERE `id` = $id";
            return $this->db->query($query)->row_array();
        }

        public function deleteAsesorB($id)
        {
            $this->db->delete('asesor_B', array('id'=> $id));
            return ($this->db->affected_rows() != 1) ? false : true;
        }

    }