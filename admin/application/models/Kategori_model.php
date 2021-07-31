<?php
    class Kategori_model extends CI_Model {
        public function getAll(){
            $query = $this->db->get('kategori');
            return $query;
        }

        public function getKategori_id($id){
            $this->db->where('id_kategori',$id);
            $query = $this->db->get('kategori');
            return $query;
        }

        public function getKategori_name($name){
            $this->db->where('n_kategori',$name);
            $query = $this->db->get('kategori');
            return $query;
        }
        
        public function save($data) {
            if ($data['n_kategori'] != NULL) {
                $query = $this->db->insert('kategori', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function update($data) {
            if ($data['n_kategori'] != NULL && $data['id_kategori'] != NULL) {
                $this->db->where('id_kategori',$data['id_kategori']);
                $query = $this->db->update('kategori', $data);
                return $query;
            } else {
                return 0;
            }
        }
    }
?>