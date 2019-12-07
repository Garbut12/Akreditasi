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
    }

    public function index()
    {
        $data['title'] = 'History';
        $data['user'] = $this->um->getuser();
        $data['history'] = $this->hm->getHistory();

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
            $this->session->set_flashdata('message', '<div class="alert alert-danger role="alert">Terjadi kesalahan mencari asesor</div>');
            redirect('history/history');
        } else {
            $keyword = htmlspecialchars($this->input->post('keywordNama'));
            $datas = $this->hm->searchHistory($keyword);

            if ($datas) {
                $data['user'] = $datas;
                $data['title'] = "History";
                $data['akreditasi'] = $datas;
                $data['user'] = $this->um->getuser();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('history/history', $data);
                $this->load->view('templates/footer',);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kesalahan mencari asesor</div>');
                redirect('history/history');
            }
        }
    }
}