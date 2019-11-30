<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Admin
 */
class Akreditasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Akreditasi_model', 'akm');
    }


    public function index()
    {
        $data['title'] = 'TerAkreditasi';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

        $data['akreditasi']=  $this->akm->tahunValid();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akreditasi/index', $data);
        $this->load->view('templates/footer');
    }

    public function addtahun()
    {
        $data['title']= 'Add Tahun Validasi';
        $data['user'] =$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required|is_unique[tahun_valid.tahun]',
            array(
                'is_unique' => 'this Tahun has already registered'));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('akreditasi/addtahun', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'tahun' => htmlspecialchars($this->input->post('tahun'))
            ];

            $data2 = $this->akm->tahunValid();
            $berbeda = true;
            foreach ($data2 as $daB) {
                unset($daB['id']);
                if ($data == $daB) {
                    $berbeda = false;
                }
            }
            if ($berbeda) {
                if ($this->akm->addtahun($data)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menyimpan data Asesor</div>');
                    redirect('akreditasi/index');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menyimpan data asesor</div>');
                    redirect('akreditasi/index');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan, asesor dengan data yang sama sudah tersimpan</div>');
                redirect('akreditasi/index');
            }
        }

    }

    public function editTahun($id)
    {
        $data['title'] = 'Edit Tahun';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $data['akreditasi'] = $this->akm->getDetailTahun($id);

        $this->form_validation->set_rules('tahun', 'tahun', 'trim|required|is_unique[tahun_valid.tahun]',
            array(
                'is_unique' => 'this Tahun has already registered'));

        if ($this->form_validation->run()==false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('akreditasi/edittahun', $data);
            $this->load->view('templates/footer');
        }else{
            $tahun = $this->input->post('tahun');

            $data = array(
                'tahun' => $tahun
            );

            $this->akm->edittahun($id,$data);
            $this->session->set_flashdata('message',
                '<div class="alert alert-success" role="alert">
                              Data Years Has Been Update
                         </div>');
            redirect('akreditasi/index');
        }
    }

    public function deletetahun($id)
    {
        if ($this->akm->deletetahun($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data tahun</div>');
            redirect('akreditasi/index');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menghapus data tahun</div>');
            redirect('akreditasi/index');
        }
    }

    public function viewvalidasi($id)
    {
        $data['title'] = 'Validasi';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

        $data['akreditasi']=  $this->akm->validasi($id);

        $datasession = array(
            'id' => $id
        );
        $this->session->set_userdata($datasession);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akreditasi/viewvalidasi', $data);
        $this->load->view('templates/footer');
    }

    public function addvalidasi()
    {
        $data['title']= 'Add  Validasi';
        $data['user'] =$data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

        $sessionid = $this->session->userdata('id');

        $this->form_validation->set_rules('validasi', 'validasi', 'trim|required');
        $this->form_validation->set_rules('tahun_id', 'tahun_id', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('file_valid', 'file_valid', 'trim|required');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('akreditasi/addvalidasi', $data);
            $this->load->view('templates/footer');
        }else{
            $data = [
                'validasi' => $this->input->post('validasi'),
                'tahun_id' => $this->input->post('tahun_id'),
                'keterangan' => $this->input->post('keterangan'),
                'file_valid' => $this->input->post('file_valid')
            ];



            $data2 = $this->akm->valid();
            $berbeda = true;
            foreach ($data2 as $daB) {
                unset($daB['id']);
                if ($data == $daB) {
                    $berbeda = false;
                }
            }
            if ($berbeda) {
                if ($this->akm->addvalidasi($data)) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menyimpan data validasi</div>');
                    redirect('akreditasi/viewvalidasi/'.$sessionid);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menyimpan data validasi</div>');
                    redirect('akreditasi/viewvalidasi/'.$sessionid);
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan, validasi dengan data yang sama sudah </div>');
                redirect('akreditasi/viewvalidasi/'.$sessionid);
            }
        }

    }

    public function editvalidasi($id)
    {
        $data['title'] = 'Edit Validasi';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $data['validasi'] = $this->akm->getdetailvalid($id);
        $sessionid = $this->session->userdata('id');

        $this->form_validation->set_rules('validasi', 'validasi', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');
        $this->form_validation->set_rules('file_valid', 'file_valid', 'trim|required');


        if ($this->form_validation->run()==false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('akreditasi/editvalidasi', $data);
            $this->load->view('templates/footer');
        }else{
            $validasi = $this->input->post('validasi');
            $keterangan = $this->input->post('keterangan');
            $file = $this->input->post('file_valid');

            $data = array(
                'validasi' => $validasi,
                'keterangan' => $keterangan,
                'file_valid' => $file
            );

            $this->akm->editvalidasi($id,$data);
            $this->session->set_flashdata('message',
                '<div class="alert alert-success" role="alert">
                              Data Validasi Has Been Update
                         </div>');
            redirect('akreditasi/viewvalidasi/'. $sessionid);
        }
    }



    public function deleteValidasi($id)
    {
        $sessionid = $this->session->userdata('id');
        if ($this->akm->deleteValidasi($id)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Succes delete data valid</div>');
            redirect('akreditasi/viewvalidasi/'. $sessionid);
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Failed to delete data validasi</div>');
            redirect('akreditasi/viewvalidasi/'. $sessionid);
        }
    }

    public function hasilakreditasi()
    {
        $data['title'] = 'Hasil Akreditasi';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akreditasi/hasilakreditasi', $data);
        $this->load->view('templates/footer');
    }


}