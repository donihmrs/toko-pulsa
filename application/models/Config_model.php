<?php
    class Config_model extends CI_Model {
        public function getConfig()
        {
            $query = $this->db->get('config');
            return $query->first_row();
        }
    }
?>