<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('level') != 1) {
            set_cookie('error',"Maaf, anda tidak memiliki akses ke halaman tersebut",5);
			redirect('home','refresh');
        }
        $this->load->model('config_model');
    }

    public function index() {
        $data['halaman'] = 'Config';
        $check = $this->config_model->checkConfig();
        $data['config'] = $this->config_model->getConfig();
        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
        $this->load->view('layouts/body');
        if ($check == 0) {
            $this->load->view('config/setting');
        } elseif ($check == 1) {
            $this->load->view('config/edit_setting');
        } else {
            return false;
        }
		$this->load->view('layouts/footer');
    }

    function save() {
        $data['n_perusahaan'] = htmlspecialchars($this->input->post('nperusahaan',TRUE),ENT_QUOTES);
        $data['alt_perusahaan'] = htmlspecialchars($this->input->post('altperusahaan',TRUE),ENT_QUOTES);
        $data['phone'] = htmlspecialchars($this->input->post('phone',TRUE),ENT_QUOTES);
        $data['email'] = htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $data['contact'] = htmlspecialchars($this->input->post('contact'),ENT_QUOTES);
        $data['about'] = htmlspecialchars($this->input->post('about'),ENT_QUOTES);
        $data['hp'] = htmlspecialchars(strtoupper($this->input->post('hp',TRUE)),ENT_QUOTES);
        $data['sing_perusahaan'] =htmlspecialchars(strtoupper($this->input->post('singkatan',TRUE)),ENT_QUOTES);
        // $data['top_surat'] =htmlspecialchars($this->input->post('suratpembukaan',TRUE),ENT_QUOTES);
        // $data['center_surat'] =htmlspecialchars($this->input->post('suratbody',TRUE),ENT_QUOTES);
        // $data['bottom_surat'] =htmlspecialchars($this->input->post('suratpenutup',TRUE),ENT_QUOTES);
    
        if ($_FILES["filelogo"]["name"] != "") {            
            $config['upload_path']          = '../public/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['overwrite']			= true;
            $config['max_size']             = 2048; // 2MB
        
            $this->load->library('upload', $config);

            $fileName = $_FILES['filelogo']['name'];

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('filelogo')) {
                $data['logo'] = $this->upload->data('file_name');
            }
        }

        $getData = $this->config_model->saveConfig($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil save konfigurasi, periksa form anda",5);
            redirect('config','refresh');
        } else {
            set_cookie('success',"Anda berhasil simpan data konfigurasi",5);
            redirect('config','refresh');
        }
    }

    function update() {
        $data['n_perusahaan'] = htmlspecialchars($this->input->post('nperusahaan',TRUE),ENT_QUOTES);
        $data['id_config'] = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
        $data['alt_perusahaan'] = htmlspecialchars($this->input->post('altperusahaan',TRUE),ENT_QUOTES);
        $data['phone'] = htmlspecialchars($this->input->post('phone',TRUE),ENT_QUOTES);
        $data['email'] = htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
        $data['contact'] = htmlspecialchars($this->input->post('contact'),ENT_QUOTES);
        $data['about'] = htmlspecialchars($this->input->post('about'),ENT_QUOTES);
        $data['hp'] = htmlspecialchars(strtoupper($this->input->post('hp',TRUE)),ENT_QUOTES);
        $data['sing_perusahaan'] =htmlspecialchars(strtoupper($this->input->post('singkatan',TRUE)),ENT_QUOTES);
        // $data['top_surat'] =htmlspecialchars($this->input->post('suratpembukaan',TRUE),ENT_QUOTES);
        // $data['center_surat'] =htmlspecialchars($this->input->post('suratbody',TRUE),ENT_QUOTES);
        // $data['bottom_surat'] =htmlspecialchars($this->input->post('suratpenutup',TRUE),ENT_QUOTES);

        if ($_FILES["filelogo"]["name"] != "") {       
            $namelogo = $this->input->post('namelogo',TRUE);     
            $config['upload_path']          = '../public/image/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['overwrite']			= true;
            $config['max_size']             = 2048; // 2MB
            
            if (file_exists("../public/image/".$namelogo) && $namelogo != NULL) {
                unlink("../public/image/".$namelogo);
            }

            $this->load->library('upload', $config);

            $fileName = $_FILES['filelogo']['name'];

            $config['file_name'] = $fileName;

            $this->upload->initialize($config);

            if ($this->upload->do_upload('filelogo')) {
                $data['logo'] = $this->upload->data('file_name');
            }
        }

        $getData = $this->config_model->updateConfig($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil update konfigurasi, periksa form anda",5);
            redirect('config','refresh');
        } else {
            set_cookie('success',"Anda berhasil simpan data konfigurasi",5);
            redirect('config','refresh');
        }
    }
}
?>
