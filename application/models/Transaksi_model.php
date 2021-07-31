<?php
    class Transaksi_model extends CI_Model {
        public function save($data){
            if ($data['no_transaksi'] != NULL && $data['nama'] != NULL && $data['email'] != NULL 
            && $data['ongkir'] != NULL && $data['pembayaran'] != NULL) {
                $query = $this->db->insert('transaksi', $data);
                $insertId = $this->db->insert_id();
                return $insertId;
            } else {
                return 0;
            }
        }

        public function saveBarang($data){
            if ($data['id_transaksi'] != NULL && $data['id_barang'] != NULL && $data['qty'] != NULL 
            && $data['harga'] != NULL && $data['berat'] != NULL) {
                $query = $this->db->insert('trans_barang', $data);
                return $query;
            } else {
                return 0;
            }
        }
    }
?>