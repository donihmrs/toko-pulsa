<?php
    class User_model extends CI_Model {
        public function get_user()
        {
            $this->db->where('username !=','admin');
            $query = $this->db->get('users');
            return $query;
        }

        public function get_user_id($id)
        {
            $this->db->where('id_users',$id);
            $query = $this->db->get('users');
            return $query;
        }

        public function save_user($data)
        {   
            if ($data['username'] != NULL && $data['password'] != NULL && $data['email'] != NULL && 
            $data['nama'] != NULL && $data['level'] != NULL) {
                $query = $this->db->insert('users', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function update_user($data)
        {   
            if ($data['username'] != NULL && $data['id_users'] != NULL && $data['email'] != NULL && 
            $data['nama'] != NULL && $data['level'] != NULL) {
                $this->db->where('id_users',$data['id_users']);
                $query = $this->db->update('users', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function update_profile($data)
        {   
            if ($data['username'] != NULL && $data['id_users'] != NULL && $data['email'] != NULL && 
            $data['nama'] != NULL) {
                $this->db->where('id_users',$data['id_users']);
                $query = $this->db->update('users', $data);
                return $query;
            } else {
                return 0;
            }
        }

        public function delete_user($id)
        {   
            if ($id != NULL) {
                $this->db->where('id_users',$id);
                $query = $this->db->delete('users');
                return $query;
            } else {
                return 0;
            }
        }
    }
?>