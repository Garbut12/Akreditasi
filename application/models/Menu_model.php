    <?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu_model extends CI_Model
    {
        public function getSubMenu()
        {
            $query = "SELECT `user_sub_menu` .*, `user_menu`.`menu`
                      FROM `user_sub_menu` JOIN `user_menu`
                      ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                        ";

            return $this->db->query($query)->result_array();

        }

        public function getMenu()
        {
            $query = "SELECT * FROM `user_menu`";
            return $this->db->query($query)->result_array();

        }

        public function getDetailMenu($id)
        {

            $query = "SELECT * FROM `user_menu` WHERE `id` = $id";
            return $this->db->query($query)->row_array();
        }

        public function editmenu($id)
        {
            $menu = $this->input->post('menu');
            $this->db->set('menu', $menu);
            $this->db->where('id', $id);
            $this->db->update('user_menu');
        }


        public function getDetailSubMenu($id)
        {
            $query = "SELECT `user_sub_menu` .*, `user_menu`.`menu`
                      FROM `user_sub_menu` JOIN `user_menu`
                      ON `user_sub_menu`.`menu_id` = `user_menu`.`id` 
                      WHERE `user_sub_menu`.`id` = $id 
                        ";

            return$this->db->query($query)->row_array();
        }

        public function editSubmenu($id)
        {
            $title = $this->input->post('title');
            $menu_id = $this->input->post('menu_id');
            $url = $this->input->post('url');
            $icon = $this->input->post('icon');
            $is_active = $this->input->post('is_active');

            $this->db->set('title', $title);
            $this->db->set('menu_id', $menu_id);
            $this->db->set('url', $url);
            $this->db->set('menu_id', $menu_id);
            $this->db->set('icon', $icon);
            $this->db->set('is_active', $is_active);
            $this->db->where('id', $id);
            $this->db->update('user_sub_menu');
        }

        public function deleteSubmenu($id)
        {
            $this->db->delete('user_sub_menu', array('id'=> $id));
            return ($this->db->affected_rows() != 1) ? false : true;
        }
    }
