<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('level') != 1) {
            set_cookie('error',"Maaf, anda tidak memiliki akses ke halaman tersebut",5);
			redirect('home','refresh');
        }
        $this->load->model('user_model');
    }

    function list() {
        $data['halaman'] = 'User';
        $data['users'] = $this->user_model->get_user();
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('user/list');
		$this->load->view('layouts/footer');
    }

    function adduser() {
        $data['halaman'] = 'User';
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('user/create');
		$this->load->view('layouts/footer');
    }

    function saveuser() {
        $user['username'] = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $user['password'] = md5($this->input->post('password',TRUE));
        $user['nama'] = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
        $user['email'] = $this->input->post('email',TRUE);
        $user['level'] = htmlspecialchars($this->input->post('level',TRUE),ENT_QUOTES);
        $getData = $this->user_model->save_user($user);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menambah data",5);
            redirect('admin/list','refresh');
        } else {
            set_cookie('success',"Anda berhasil menambah data",5);
            redirect('admin/list','refresh');
        }
    }

    function edituser($id) {
        $getData = $this->user_model->get_user_id($id);
        $data['config'] = $this->config_model->getConfig();
        if ($getData->num_rows() == 0) {
            set_cookie('error',"Anda tidak mendapatkan data",5);
            redirect('admin/list','refresh');
        } else {
            $data['halaman'] = 'User';
            $data['users'] = $getData->first_row();
        
            $this->load->view('layouts/header',$data);
            $this->load->view('layouts/sidebar');
            $this->load->view('layouts/body');
            $this->load->view('user/edit');
            $this->load->view('layouts/footer');
        }
    }

    function updateuser() {
        if ($_POST['password'] != NULL) {
            $user['password'] = md5($this->input->post('password',TRUE));
        }
        $user['username'] = htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $user['id_users'] = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
        $user['nama'] = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
        $user['email'] = $this->input->post('email',TRUE);
        $user['level'] = htmlspecialchars($this->input->post('level',TRUE),ENT_QUOTES);

        $getData = $this->user_model->update_user($user);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil update data",5);
            redirect('admin/list','refresh');
        } else {
            set_cookie('success',"Anda berhasil update data",5);
            redirect('admin/list','refresh');
        }
    }

    function deluser($id) {
        $id = htmlspecialchars($id,ENT_QUOTES);
        $getData = $this->user_model->delete_user($id);
        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menghapus data",5);
            redirect('admin/list','refresh');
        } else {
            set_cookie('success',"Anda berhasil menghapus data",5);
            redirect('admin/list','refresh');
        }
    }
    
}
?>
