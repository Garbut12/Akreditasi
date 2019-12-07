    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            is_logged_in();
            $this->load->model('User_model', 'um');
        }

        public function index()
        {
            $data['title'] = 'My Profile';
            $data['user'] = $this->um->getuser();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        }


        public function edit()
        {
            $data['title'] = 'Edit Profile';
            $data['user'] = $this->um->getuser();
            $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('user/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $this->um->edit();
                $this->session->set_flashdata('message', 'user berhasil diedit');
                redirect('user');
            }
        }


    }