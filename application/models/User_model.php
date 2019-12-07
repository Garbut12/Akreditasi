    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User_model extends CI_Model
    {
        public function getuser()
        {
            $data = $this->db->get_where('user', ['email' => $this->session->userdata('email')]);
            return $data->row_array();
        }

        public function edit(){
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            $upload_image = $_FILES['image']['name'];

            if($upload_image){
                $config ['allowed_types']='gif|jpg|png' ;
                $config ['max_size']= '2048';
                $config ['upload_path']= './assets/img/profile/';

                $this->load->library('upload', $config);

                $data['user'] = $this->user->getuser();
                $image_user = $data['user']['image'];

                if($this->upload->do_upload('image')){
//				$old_image = $this->session->userdata('image');
                    $old_image = $image_user;

                    if($old_image != 'default.jpg'){
                        unlink(FCPATH. 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');
        }
    }