<?php
    class Barang_model extends CI_Model {
        public function getAll(){
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $query = $this->db->get();
            return $query;
        }

        public function Allkategori(){
            $query = $this->db->get('kategori');
            return $query;
        }

        public function AllkategoriLimit($num){
            $this->db->limit($num);
            $query = $this->db->get('kategori');
            return $query;
        }

        public function getKategori($id){
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $this->db->where('kategori.n_kategori',$id);
            $query = $this->db->get();
            return $query;
        }

        public function getRandomBarang(){
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $this->db->order_by('barang.id_barang','RANDOM');
            $this->db->LIMIT(7);
            $query = $this->db->get();
            return $query->result();
        }

        public function getPermalink($id){
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $this->db->where('barang.permalink',$id);
            $this->db->order_by('barang.created_at','desc');
            $query = $this->db->get();
            return $query;
        }

        public function getFeature(){
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $this->db->where('barang.feature',1);
            $query = $this->db->get();
            return $query->result();
        }

        public function getFirst(){
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $this->db->order_by('barang.created_at','desc');
            $query = $this->db->get();
            return $query->first_row();
        }

        public function getNew(){
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $this->db->order_by('barang.created_at','desc');
            $this->db->LIMIT(12);
            $query = $this->db->get();
            return $query->result();
        }

        public function save($data) {
            if ($data['n_barang'] != NULL && $data['code'] != NULL && $data['deskripsi'] != NULL 
            && $data['harga'] != NULL) {
                $query = $this->db->insert('barang', $data);
                return $query;
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
                        $query = $this->db->query("INSERT INTO barang (id_kategori,n_barang,code,harga,deskripsi) 
                        VALUES (".$value['id_kategori'].",'".$value['n_barang']."','".$value['code']."','".$value['harga']."',".$value['deskripsi'].") 
                        ON DUPLICATE KEY UPDATE 
                        n_barang='".$value['n_barang']."', deskripsi='".$value['deskripsi']."', harga='".$value['harga']."', id_kategori=".$value['id_kategori']);
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

        public function getSearch($text) {
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori');
            $this->db->like('n_barang', $text);
            $query = $this->db->get();
            return $query;
            
        }

        public function getGambarBarangOther($id)
        {
            $this->db->where('id_barang',$id);
            $query = $this->db->get('gambar_barang');
            return $query;
        }

        public function checkNoTransaksi($no) {
            $this->db->where('no_transaksi',$no);
            $query = $this->db->get('transaksi');
            return $query;
        }

        public function checkHargaBarang($id,$harga) {
            $this->db->where('id_barang',$id);
            $query = $this->db->get('barang');
            $res = $query->row();
            if ($res->harga != $harga) {
                return 0;
            } else {
                return 1;
            }
        }
        
    }
?>