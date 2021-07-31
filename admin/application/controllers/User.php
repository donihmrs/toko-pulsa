<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
    }

    function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $this->db->where('username',$username);
        $this->db->where('password',md5($password));
        $query = $this->db->get('users');
        $query = $query->first_row();
        
        if ($query != NULL) {
            $this->session->set_userdata('level',$query->level);
            $this->session->set_userdata('user',$query->username);
            $this->session->set_userdata('email',$query->email);
            $this->session->set_userdata('nama',$query->nama);
            $this->session->set_userdata('id',$query->id_users);
            $this->session->set_userdata('hp',$query->hp);
            set_cookie('success',"Anda Berhasil Login",5);
            redirect('home','refresh');
        } else {
            set_cookie('error',"Anda gagal Login",5);
            redirect('login','refresh');
        }
    }

    function login() {
        if ($this->session->userdata('user') != NULL) {
			redirect('home','refresh');
		} else {
            $this->load->view('login');
        }
    }

    function logout() {
        $this->session->sess_destroy();
        set_cookie('success',"Anda Berhasil Mengakhiri Aktifitas",5);
        redirect('login','refresh');
    }

    function profile() {
        if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
        }
        
        $data['halaman'] = 'Profile';
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('user/profile');
		$this->load->view('layouts/footer');
    }

    function changeprofile() {
        if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
        }
        
        $this->load->model('user_model');

        if ($_POST['password'] != NULL) {
            $user['password'] = md5($this->input->post('password',TRUE));
        }
        $user['id_users'] = htmlspecialchars($this->session->userdata('id'),ENT_QUOTES);
        $user['username'] = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $user['nama'] = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
        $user['hp'] = htmlspecialchars($this->input->post('hp',TRUE),ENT_QUOTES);
        $user['email'] = $this->input->post('email',TRUE);

        $getData = $this->user_model->update_profile($user);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil update profile",5);
            redirect('profile','refresh');
        } else {
            $this->session->set_userdata('user',$this->input->post('username'));
            $this->session->set_userdata('email',$this->input->post('email'));
            $this->session->set_userdata('nama',$this->input->post('nama'));
            $this->session->set_userdata('hp',$this->input->post('hp'));
            set_cookie('success',"Anda berhasil update profile, silakan Logout untuk refresh account",5);
            redirect('profile','refresh');
        }
    }

    function bank() {
        if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
        }
        
        $this->load->model('bank_model');

        $data['halaman'] = 'Bank';
        $data['banks'] = $this->bank_model->get_bank();
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('bank/list');
		$this->load->view('layouts/footer');
    }

    function addbank() {
        if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
		}
        $this->load->model('bank_model');

        $data['halaman'] = 'Bank';
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('bank/add');
		$this->load->view('layouts/footer');
    }

    function savebank() {
        if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
		}
        $this->load->model('bank_model');

        $bank['nama_bank'] = htmlspecialchars($this->input->post('bank',TRUE),ENT_QUOTES);
        $bank['rekening'] = htmlspecialchars($this->input->post('rekening',TRUE),ENT_QUOTES);
        $bank['pemilik'] = htmlspecialchars($this->input->post('pemilik',TRUE),ENT_QUOTES);
        $bank['cabang'] = htmlspecialchars($this->input->post('cabang',TRUE));
        $getData = $this->bank_model->save_bank($bank);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menambah data",5);
            redirect('bank','refresh');
        } else {
            set_cookie('success',"Anda berhasil menambah data",5);
            redirect('bank','refresh');
        }
    }

    function editbank($id) {
        if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
		}
        $this->load->model('bank_model');

        $getData = $this->bank_model->get_bank_id($id);
        $data['config'] = $this->config_model->getConfig();
        if ($getData->num_rows() == 0) {
            set_cookie('error',"Anda tidak mendapatkan data",5);
            redirect('bank','refresh');
        } else {
            $data['halaman'] = 'Bank';
            $data['bank'] = $getData->first_row();
        
            $this->load->view('layouts/header',$data);
            $this->load->view('layouts/sidebar');
            $this->load->view('layouts/body');
            $this->load->view('bank/edit');
            $this->load->view('layouts/footer');
        }
    }

    function updatebank() {
        if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
		}
        $this->load->model('bank_model');

        $bank['id_bank'] = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
        $bank['nama_bank'] = htmlspecialchars($this->input->post('bank',TRUE),ENT_QUOTES);
        $bank['rekening'] = htmlspecialchars($this->input->post('rekening',TRUE),ENT_QUOTES);
        $bank['pemilik'] = htmlspecialchars($this->input->post('pemilik',TRUE),ENT_QUOTES);
        $bank['cabang'] = htmlspecialchars($this->input->post('cabang',TRUE));
        $getData = $this->bank_model->update_bank($bank);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menambah data",5);
            redirect('bank','refresh');
        } else {
            set_cookie('success',"Anda berhasil menambah data",5);
            redirect('bank','refresh');
        }
    }

    function delbank($id) {
        if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
		}
        $this->load->model('bank_model');
        
        $id = htmlspecialchars($id,ENT_QUOTES);
        $getData = $this->bank_model->delete_bank($id);
        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menghapus data",5);
            redirect('bank','refresh');
        } else {
            set_cookie('success',"Anda berhasil menghapus data",5);
            redirect('bank','refresh');
        }
    }

    
}
?>
