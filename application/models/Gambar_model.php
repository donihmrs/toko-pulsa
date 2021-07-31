<?php
    class Gambar_model extends CI_Model {
        public function getData()
        {
            $query = $this->db->get('gambar');
            return $query->result();
        }
    }
?>