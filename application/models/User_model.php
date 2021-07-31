<?php
    class User_model extends CI_Model {
        public function getAdmin()
        {
            $query = $this->db->get('users');
            return $query->first_row();
        }
    }
?>