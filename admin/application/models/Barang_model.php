<?php
    class Barang_model extends CI_Model {
        public function getAll(){
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $query = $this->db->get();
            return $query;
        }

        public function getBarang_id($id){
            $this->db->where('id_barang',$id);
            $query = $this->db->get('barang');
            return $query;
        }

        public function checkPermalink($text){
            $this->db->where('permalink',$text);
            $query = $this->db->get('barang');
            return $query->num_rows();
        }

        public function checkPermalinkId($text){
            $this->db->where('permalink',$text);
            $query = $this->db->get('barang');
            return $query->first_row();
        }

        public function save($data) {
            if ($data['n_barang'] != NULL && $data['code'] != NULL && $data['deskripsi'] != NULL 
            && $data['harga'] != NULL) {
                $query = $this->db->insert('barang', $data);
                $insertId = $this->db->insert_id();
                return $insertId;
            } else {
                return 0;
            }
        }

        public function saveImport($data) {
            $query = $this->db->get('barang');
            $check = $query->num_rows();
            
            if ($data != 0) {
                if ($check == 0) {
                    $query = $this->db->insert_batch('barang', $data);
                } else {
                    foreach ($data as $value) {
                        $query = $this->db->query("INSERT INTO barang (id_kategori,n_barang,code,harga,deskripsi,feature,meta_deskripsi,keyword,meta_title,gambar) 
                        VALUES (".$value['id_kategori'].",'".$value['n_barang']."','".$value['code']."','".$value['harga']."','".$value['deskripsi']."',".$value['feature'].",'".$value['meta_deskripsi']."','".$value['keyword']."','".$value['meta_title']."','".$value['gambar']."') 
                        ON DUPLICATE KEY UPDATE 
                        n_barang='".$value['n_barang']."', deskripsi='".$value['deskripsi']."', harga='".$value['harga']."', feature=".$value['feature'].",meta_deskripsi='".$value['meta_deskripsi']."',keyword='".$value['keyword']."',meta_title='".$value['meta_title']."',gambar='".$value['gambar']."'");
                    }
                }
                return $query;
            } else {
                return 0;
            }
        }

        public function update($data) {
            if ($data['n_barang'] != NULL && $data['id_barang'] != NULL && $data['deskripsi'] != NULL 
                && $data['code'] != NULL) {
                $this->db->where('id_barang',$data['id_barang']);
                $query = $this->db->update('barang', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function delete($id)
        {   
            if ($id != NULL) {
                $this->db->where('id_barang',$id);
                $query = $this->db->delete('barang');
                return $query;
            } else {
                return 0;
            }
        }
    }
?>