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
        $this->load->library('pagination');
    }


    public function asesor()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('asesor/asesor'); //site url
        $config['total_rows'] = $this->db->count_all('asesor'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model.


        $data['pagination'] = $this->pagination->create_links();
        $data['title'] = 'Asesor';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $data['asesor']=  $this->am->getAsesor($config["per_page"], $data['page']);
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

        $this->form_validation->set_rules('nia', 'nia', 'trim|required|is_unique[asesor.nia]',
        array(
            'is_unique' => 'this NIA has already registered'));
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('rumpun', 'rumpun', 'trim|required');
        $this->form_validation->set_rules('kab_kota', 'kab_kota', 'trim|required');
        $this->form_validation->set_rules('status_penugasan', 'status_penugasan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

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
                'status_penugasan' => htmlspecialchars($this->input->post('status_penugasan')),
                'keterangan' => htmlspecialchars($this->input->post('keterangan'))
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
                    redirect('asesor/asesor');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal menambahkan, asesor dengan data yang sama sudah tersimpan</div>');
                redirect('asesor/asesor');
            }
        }

    }

    public function editAsesor($id)
    {
        $data['title'] = 'Edit Asesor';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $data['asesor'] = $this->am->getDetailAsesor($id);

        $this->form_validation->set_rules('nia', 'nia', 'trim|required');
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('rumpun', 'rumpun', 'trim|required');
        $this->form_validation->set_rules('kab_kota', 'kab_kota', 'trim|required');
        $this->form_validation->set_rules('status_penugasan', 'status_penugasan', 'trim|required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

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
            $keterangan = $this->input->post('keterangan');


            $data = array(
                'nia' => $nia,
                'nama' => $nama,
                'rumpun' => $rumpun,
                'kab_kota' => $kab_kota,
                'status_penugasan' => $status_penugasan,
                'keterangan' => $keterangan

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

    public function searchAsesor()
    {
        $this->form_validation->set_rules('keywordNama', 'keywordNama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari user</div>');
            redirect('asesor/asesor');
        } else {
            $nama = htmlspecialchars($this->input->post('keywordNama'));
            $datas = $this->am->searchUser($nama);

            if ($datas) {
                $data['user'] = $datas;
                $data['title'] = "Data Asesor";


                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar');
                $this->load->view('asesor/asesor');
                $this->load->view('templates/footer');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kesalahan mencari user</div>');
                redirect('asesor/asesor');
            }
        }
    }

}