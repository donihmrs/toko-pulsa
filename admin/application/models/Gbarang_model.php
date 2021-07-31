<?php
    class Gbarang_model extends CI_Model {
        public function getAll($id)
        {
            $this->db->where('id_barang',$id);
            $query = $this->db->get('gambar_barang');
            return $query;
        }

        public function save($data) {
            if ($data['id_barang'] != NULL && $data['nama_gambar'] != NULL && $data['file'] != NULL) {
                $query = $this->db->insert('gambar_barang', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function getGambar($id)
        {
            $this->db->where('id_gambar',$id);
            $query = $this->db->get('gambar_barang');
            return $query;
        }

        public function update($data)
        {   
            if ($data['type'] != NULL && $data['id_gambar'] != NULL) {
                $this->db->where('id_gambar',$data['id_gambar']);
                $query = $this->db->update('gambar_barang', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function delete($id)
        {   
            if ($id != NULL) {
                $this->db->where('id_gambar',$id);
                $query = $this->db->delete('gambar_barang');
                return $query;
            } else {
                return 0;
            }
        }
    }
?>