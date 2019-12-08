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
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">User Berhasil Di edit</div>');
                redirect('user');
            }
        }

        public function changepassword()
        {
            $data['title'] = 'Change Password';
            $data['user'] = $this->um->getuser();
            $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
            $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
            $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');
            if($this->form_validation->run() == false){
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('user/changepassword', $data);
                $this->load->view('templates/footer');
            }else{
                $this->um->changepassword();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil di edit</div>');
                redirect('user/changepassword');
            }
        }

    }