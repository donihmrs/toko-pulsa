<?php
    class Api_model extends CI_Model {
        public function getBarang_id($id){
            $this->db->select('id_kategori,brand,code,harga,id_barang,n_barang');
            $this->db->where('id_kategori',$id);
            $query = $this->db->get('barang');
            return $query;
        }

        public function getKategori(){
            $query = $this->db->get('kategori');
            return $query;
        }

        public function getBarang_reply($id){
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->join('transaksi', 'transaksi.id_barang = barang.id_barang');
            $this->db->where('transaksi.id_penawaran', $id);
            $query = $this->db->get();
            return $query;
        }
        

    }
?>