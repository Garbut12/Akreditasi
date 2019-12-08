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

        public function changepassword(){
            $data['user'] = $this->um->getuser();
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if(!password_verify($current_password, $data['user']['password'])){
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong current password!</div>');
                redirect('user/changepassword');
            }else{
                if($current_password == $new_password){
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New passsword cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                }else{
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                }
            }
        }
    }