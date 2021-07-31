<?php
    class Template_model extends CI_Model {
        public function getData()
        {
            $query = $this->db->get('template');
            return $query->result();
        }
    }
?>