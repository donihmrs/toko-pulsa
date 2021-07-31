<?php
    class Transaksi_model extends CI_Model {
        public function getAll(){
            $query = $this->db->get('transaksi');
            return $query;
        }

        public function get_id($id){
            $this->db->select('transaksi.*,trans_barang.*,barang.id_barang,barang.n_barang,barang.code,barang.gambar,barang.harga,barang.berat');
            $this->db->from('transaksi');
            $this->db->join('trans_barang', 'transaksi.id_transaksi = trans_barang.id_transaksi');
            $this->db->join('barang', 'trans_barang.id_barang = barang.id_barang');
            $this->db->where('transaksi.no_transaksi',$id);
            $query = $this->db->get();
            return $query->first_row();
        }

        public function update($data)
        {   
            if ($data['no_transaksi'] != NULL) {
                $this->db->where('no_transaksi',$data['no_transaksi']);
                $query = $this->db->update('transaksi', $data);
                return $query;
            } else {
                return 0;
            }
        }
    }
?>
