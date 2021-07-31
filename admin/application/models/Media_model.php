<?php
    class Media_model extends CI_Model {
        public function getData()
        {
            $query = $this->db->get('sosial');
            return $query;
        }

        public function save($data) {
            if ($data['type'] != NULL && $data['link'] != NULL) {
                $query = $this->db->insert('sosial', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function getMedia($id)
        {
            $this->db->where('id_sosial',$id);
            $query = $this->db->get('sosial');
            return $query;
        }

        public function update($data)
        {   
            if ($data['type'] != NULL && $data['id_sosial'] != NULL && $data['link'] != NULL) {
                $this->db->where('id_sosial',$data['id_sosial']);
                $query = $this->db->update('sosial', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function delete($id)
        {   
            if ($id != NULL) {
                $this->db->where('id_sosial',$id);
                $query = $this->db->delete('sosial');
                return $query;
            } else {
                return 0;
            }
        }
    }
?>