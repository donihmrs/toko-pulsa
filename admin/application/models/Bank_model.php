<?php
    class Bank_model extends CI_Model {
        public function get_bank()
        {
            $query = $this->db->get('bank');
            return $query;
        }

        public function save_bank($data)
        {   
            if ($data['nama_bank'] != NULL && $data['rekening'] != NULL && $data['cabang'] != NULL && 
            $data['pemilik'] != NULL) {
                $query = $this->db->insert('bank', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function get_bank_id($id)
        {
            $this->db->where('id_bank',$id);
            $query = $this->db->get('bank');
            return $query;
        }

        public function update_bank($data)
        {   
            if ($data['nama_bank'] != NULL && $data['rekening'] != NULL && $data['cabang'] != NULL && 
            $data['pemilik'] != NULL && $data['id_bank'] != NULL) {
                $this->db->where('id_bank',$data['id_bank']);
                $query = $this->db->update('bank', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function delete_bank($id)
        {   
            if ($id != NULL) {
                $this->db->where('id_bank',$id);
                $query = $this->db->delete('bank');
                return $query;
            } else {
                return 0;
            }
        }
    }
?>