    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();
            is_logged_in();
            $this->load->model('Menu_model', 'mm');
        }

        public function index()
        {
            $data['title'] = 'Menu Management';
            $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();

            $data['menu'] = $this->db->get('user_menu')->result_array();

            $this->form_validation->set_rules('menu', 'menu', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/index', $data);
                $this->load->view('templates/footer');

            } else {
                $this->db->insert('user_menu', array('menu' => $this->input->post('menu')));
                $this->session->set_flashdata('message',
                        '<div class="alert alert-success" role="alert">
                              New Menu Add
                         </div>');
                redirect('menu');
            }
        }




        public function submenu()
        {
            $data['title'] = 'SubMenu Management';
            $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
            $this->load->model('menu_model', 'menu');
            $data['subMenu'] = $this->menu->getSubMenu();
            $data['menu'] = $this->db->get('user_menu')->result_array();

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('menu_id', 'Menu', 'required');
            $this->form_validation->set_rules('url', 'URL', 'required');
            $this->form_validation->set_rules('icon', 'icon', 'required');

            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/submenu', $data);
                $this->load->view('templates/footer');

            }else{
                $data=array(
                    'title' => $this->input->post('title'),
                    'menu_id' => $this->input->post('menu_id'),
                    'url' => $this->input->post('url'),
                    'icon' => $this->input->post('icon'),
                    'is_active' => $this->input->post('is_active'),

                );
                $this->db->insert('user_sub_menu',$data);
                $this->session->set_flashdata('message',
                        '<div class="alert alert-success" role="alert">
                              New Menu Sub Menu added
                         </div>');
                redirect('menu/submenu');
            }
        }



        public function editSubmenu($id)
        {
            $data['title'] = 'Edit Sub Menu';
            $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
            $data['menu'] = $this->mm->getMenu();
            $data['submenu'] = $this->mm->getDetailSubMenu($id);

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('menu_id', 'Menu', 'required');
            $this->form_validation->set_rules('url', 'Url', 'required');
            $this->form_validation->set_rules('icon', 'Icon', 'required');

            if ($this->form_validation->run() == false ){
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/editsubmenu', $data);
                $this->load->view('templates/footer');
            }else{
                $this->mm->editsubmenu($id);
                $this->session->set_flashdata('message',
                    '<div class="alert alert-success" role="alert">
                              Succes Edit Sub Menu
                         </div>');

                redirect('menu/submenu');
            }
        }

        public function editmenu($id)
        {
            $data['title'] = 'Edit Menu';
            $data['user'] = $this->db->get_where('user', array('email' => $this->session->userdata('email')))->row_array();
            $data['menu'] = $this->mm->getDetailMenu($id);

            $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

            if ($this->form_validation->run()==false) {
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('menu/editmenu', $data);
                $this->load->view('templates/footer');
            }else{
                $this->mm->editmenu($id);
                $this->session->set_flashdata('message',
                    '<div class="alert alert-success" role="alert">
                              Menu Has Been Update
                         </div>');
                redirect('menu');
            }
        }

        public function deletemenu($id)
        {
            $this->db->delete('user_menu', array('id' => $id));
            redirect('menu/');
        }

        public function deleteSubmenu($id)
        {

            if ($this->mm->deleteSubmenu($id)) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil menghapus data sub Menu</div>');
                redirect('menu/submenu');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Terjadi kesalahan, gagal menghapus sub menu</div>');
                redirect('menu/submenu');
            }
        }

    }