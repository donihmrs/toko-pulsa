<?php
    class Template_model extends CI_Model {
        public function getData()
        {
            $query = $this->db->get('template');
            return $query;
        }

        public function save($data) {
            if ($data['type'] != NULL && $data['name'] != NULL && $data['title'] != NULL && $data['body'] != NULL) {
                $query = $this->db->insert('template', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function getTemplate($id)
        {
            $this->db->where('id_template',$id);
            $query = $this->db->get('template');
            return $query;
        }

        public function update($data)
        {   
            if ($data['type'] != NULL && $data['name'] != NULL && $data['id_template'] != NULL && $data['title'] != NULL && $data['body'] != NULL) {
                $this->db->where('id_template',$data['id_template']);
                $query = $this->db->update('template', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function delete($id)
        {   
            if ($id != NULL) {
                $this->db->where('id_template',$id);
                $query = $this->db->delete('template');
                return $query;
            } else {
                return 0;
            }
        }
    }
?>