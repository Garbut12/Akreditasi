<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Admin
 */
class Asesor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Asesor_model', 'am');
    }


    public function asesor()
    {
        $data['title'] = 'Data Asesor ';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $data['asesor']=  $this->am->getAsesor();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('asesor/asesor', $data);
        $this->load->view('templates/footer');
    }

    public function AddAsesor()
    {
        $data['title']=' Add New Asesor ';
        $data['user'] =$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

        $this->form_validation->set_rules('nia', 'nia', 'trim|required|is_unique[asesor_B.nia]',
        array(
            'is_unique' => 'this NIA has already registered'));
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('rumpun', 'rumpun', 'trim|required');
        $this->form_validation->set_rules('kab_kota', 'kab_kota', 'trim|required');
        $this->form_validation->set_rules('status_penugasan', 'status_penugasan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('asesor/addasesor', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'nia' => htmlspecialchars($this->input->post('nia')),
                'nama' =>htmlspecialchars($this->input->post('nama')),
                'rumpun' => htmlspecialchars($this->input->post('rumpun')),
                'kab_kota' => htmlspecialchars($this->input->post('kab_kota')),
                'status_penugasan' => htmlspecialchars($this->input->post('status_penugasan'))
            ];

            $data2 = $this->am->getAsesor();
            $berbeda = true;
            foreach ($data2 as $daB) {
                unset($daB['id']);
                if ($data == $daB) {
                    $berbeda = false;
                }
            }
            if ($berbeda) {
                if ($this->am->addAsesor($data)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menyimpan data Asesor</div>');
                    redirect('asesor/Asesor');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menyimpan data asesor</div>');
                    redirect('asesor/Asesor');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan, asesor dengan data yang sama sudah tersimpan</div>');
                redirect('asesor/Asesor');
            }
        }

    }

    public function editAsesor($id)
    {
        $data['title'] = 'Edit Asesor';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $data['asesor'] = $this->am->getDetailAsesor($id);

        $this->form_validation->set_rules('nia', 'nia', 'trim|required|is_unique[asesor_B.nia]',
        array(
            'is_unique' => 'this NIA has already registered'));
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('rumpun', 'rumpun', 'trim|required');
        $this->form_validation->set_rules('kab_kota', 'kab_kota', 'trim|required');
        $this->form_validation->set_rules('status_penugasan', 'status_penugasan', 'trim|required');

        if ($this->form_validation->run()==false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('asesor/editasesor', $data);
            $this->load->view('templates/footer');
        }else{
            $nia = $this->input->post('nia');
            $nama = $this->input->post('nama');
            $rumpun = $this->input->post('rumpun');
            $kab_kota = $this->input->post('kab_kota');
            $status_penugasan = $this->input->post('status_penugasan');


            $data = array(
                'nia' => $nia,
                'nama' => $nama,
                'rumpun' => $rumpun,
                'kab_kota' => $kab_kota,
                'status_penugasan' => $status_penugasan
            );

            $this->am->editAsesor($id,$data);
            $this->session->set_flashdata('message',
                '<div class="alert alert-success" role="alert">
                              Data Asesor Has Been Update
                         </div>');
            redirect('asesor/asesor');
        }
    }

    public function deleteAsesor($id)
    {
        if ($this->am->deleteAsesor($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data Asesor</div>');
            redirect('asesor/Asesor');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menghapus data Asesor</div>');
            redirect('asesor/Asesor');
        }
    }

    public function asesorB()
    {
        $data['title'] = 'Data Asesor B';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $data['asesor']=  $this->am->getAsesorB();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('asesor/asesorB', $data);
        $this->load->view('templates/footer');
    }

    public function AddAsesorB()
    {
        $data['title']=' Add New Asesor A';
        $data['user'] =$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

        $this->form_validation->set_rules('nia', 'nia', 'trim|required|is_unique[asesor_B.nia]',
        array(
            'is_unique' => 'this NIA has already registered'));
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('rumpun', 'rumpun', 'trim|required');
        $this->form_validation->set_rules('kab_kota', 'kab_kota', 'trim|required');
        $this->form_validation->set_rules('status_penugasan', 'status_penugasan', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('asesor/addasesorB', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'nia' => htmlspecialchars($this->input->post('nia')),
                'nama' =>htmlspecialchars($this->input->post('nama')),
                'rumpun' => htmlspecialchars($this->input->post('rumpun')),
                'kab_kota' => htmlspecialchars($this->input->post('kab_kota')),
                'status_penugasan' => htmlspecialchars($this->input->post('status_penugasan'))
            ];

            $data2 = $this->am->getAsesorB();
            $berbeda = true;
            foreach ($data2 as $daB) {
                unset($daB['id']);
                if ($data == $daB) {
                    $berbeda = false;
                }
            }
            if ($berbeda) {
                if ($this->am->addAsesorB($data)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menyimpan data Asesor</div>');
                    redirect('asesor/AsesorB');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menyimpan data asesor</div>');
                    redirect('asesor/AsesorB');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan, asesor dengan data yang sama sudah tersimpan</div>');
                redirect('asesor/AsesorB');
            }

//            $this->am->addAsesorB();
//            $this->session->set_flashdata('message',
//                '<div class="alert alert-success" role="alert">
//                              Succes Add Asessor B
//                         </div>');
//            redirect('asesor/AsesorB');
        }

    }

    public function editAsesorB($id)
    {
        $data['title'] = 'Edit Asesor';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $data['asesorB'] = $this->am->getDetailAsesorB($id);

        $this->form_validation->set_rules('nia', 'nia', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('rumpun', 'rumpun', 'trim|required');
        $this->form_validation->set_rules('kab_kota', 'kab_kota', 'trim|required');
        $this->form_validation->set_rules('status_penugasan', 'status_penugasan', 'trim|required');

        if ($this->form_validation->run()==false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('asesor/editasesorB', $data);
            $this->load->view('templates/footer');
        }else{
            $nia = $this->input->post('nia');
            $nama = $this->input->post('nama');
            $rumpun = $this->input->post('rumpun');
            $kab_kota = $this->input->post('kab_kota');
            $status_penugasan = $this->input->post('status_penugasan');


            $data = array(
                'nia' => $nia,
                'nama' => $nama,
                'rumpun' => $rumpun,
                'kab_kota' => $kab_kota,
                'status_penugasan' => $status_penugasan
            );

            $this->am->editAsesorB($id,$data);
            $this->session->set_flashdata('message',
                '<div class="alert alert-success" role="alert">
                              Data Asesor Has Been Update
                         </div>');
            redirect('asesor/asesorB');
        }
    }

    public function deleteAsesorB($id)
    {
        if ($this->am->deleteAsesorB($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data Asesor</div>');
            redirect('asesor/AsesorB');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menghapus data Asesor</div>');
            redirect('asesor/AsesorB');
        }
    }



}