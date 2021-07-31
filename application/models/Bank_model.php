<?php
    class Bank_model extends CI_Model {
        public function get_bank()
        {
            $query = $this->db->get('bank');
            return $query;
        }

        public function get_bank_id($id)
        {
            $this->db->where('id_bank',$id);
            $query = $this->db->get('bank');
            return $query;
        }
    }
?>