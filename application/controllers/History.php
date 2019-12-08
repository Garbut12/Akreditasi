<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Admin
 */
class History extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('History_model', 'hm');
        $this->load->model('User_model', 'um');
        $this->load->library('pagination');
    }

    public function index()
    {
        //konfigurasi pagination
        $config['base_url'] = site_url('history/index'); //site url
        $config['total_rows'] = $this->db->count_all('akreditasi'); //total row
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

        $data['title'] = 'History';
        $data['user'] = $this->um->getuser();
        $data['history']=  $this->hm->getHistory($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
//
//        $data['title'] = 'History';
//        $data['user'] = $this->um->getuser();
//        $data['history'] = $this->hm->getHistory();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('history/history', $data);
        $this->load->view('templates/footer');
    }

    public function searchHistory()
    {
        $this->form_validation->set_rules('keywordNama', 'keywordNama', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari Data History Hasil Validasi</div>');
            redirect('history');
        } else {
            $keyword = htmlspecialchars($this->input->post('keywordNama'));
            $datas = $this->hm->searchHistory($keyword);

            if ($datas) {
                $data['user'] = $datas;
                $data['title'] = "History";
                $data['history'] = $datas;
                $data['user'] = $this->um->getuser();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('history/history', $data);
                $this->load->view('templates/footer',);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kesalahan mencari Hisotry Hasil Validasi</div>');
                redirect('history');
            }
        }
    }


}