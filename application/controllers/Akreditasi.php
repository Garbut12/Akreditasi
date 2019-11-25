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
    }


    public function tahun2019()
    {
        $data['title'] = 'Tahun 2019';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akreditasi/tahun2019', $data);
        $this->load->view('templates/footer');
    }


    public function addtahun2019()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('akreditasi/addtahun2019', $data);
        $this->load->view('templates/footer');
    }

}