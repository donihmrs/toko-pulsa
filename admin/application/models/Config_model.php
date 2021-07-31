<?php
    class Config_model extends CI_Model {
        public function checkConfig()
        {
            $query = $this->db->get('config');
            return $query->num_rows();
        }

        public function getConfig()
        {
            $query = $this->db->get('config');
            return $query->first_row();
        }

        public function saveConfig($data) {
            if ($data['n_perusahaan'] != NULL && $data['alt_perusahaan'] != NULL) {
                $query = $this->db->insert('config', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function updateConfig($data)
        {   
            if ($data['n_perusahaan'] != NULL && $data['id_config'] != NULL && $data['alt_perusahaan'] != NULL) {
                $this->db->where('id_config',$data['id_config']);
                $query = $this->db->update('config', $data);
                return $query;
            } else {
                return 0;
            }
        }
    }
?>