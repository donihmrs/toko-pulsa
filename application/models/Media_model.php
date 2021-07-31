<?php
    class Media_model extends CI_Model {
        public function getData()
        {
            $query = $this->db->get('sosial');
            return $query->result();
        }
    }
?>