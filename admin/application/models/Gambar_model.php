<?php
    class Gambar_model extends CI_Model {
        public function getData()
        {
            $query = $this->db->get('gambar');
            return $query;
        }

        public function save($data) {
            if ($data['type'] != NULL && $data['file'] != NULL) {
                $query = $this->db->insert('gambar', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function getGambar($id)
        {
            $this->db->where('id_gambar',$id);
            $query = $this->db->get('gambar');
            return $query;
        }

        public function update($data)
        {   
            if ($data['type'] != NULL && $data['id_gambar'] != NULL) {
                $this->db->where('id_gambar',$data['id_gambar']);
                $query = $this->db->update('gambar', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function delete($id)
        {   
            if ($id != NULL) {
                $this->db->where('id_gambar',$id);
                $query = $this->db->delete('gambar');
                return $query;
            } else {
                return 0;
            }
        }
    }
?>