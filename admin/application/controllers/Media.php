<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('level') != 1) {
            set_cookie('error',"Maaf, anda tidak memiliki akses ke halaman tersebut",5);
			redirect('home','refresh');
        }
        $this->load->model('media_model');
    }

    public function index() {
        $data['halaman'] = 'Media Sosial';
        $data['medias'] = $this->media_model->getData();
        $data['config'] = $this->config_model->getConfig();
        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
        $this->load->view('layouts/body');
        $this->load->view('media/index');
		$this->load->view('layouts/footer');
    }

    function add() {
        $data['halaman'] = 'Media Sosial';
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('media/add');
		$this->load->view('layouts/footer');
	}

    function save() {
        $data['type'] = htmlspecialchars($this->input->post('type',TRUE),ENT_QUOTES);
        $data['link'] = htmlspecialchars($this->input->post('link',FALSE),ENT_QUOTES);

        $getData = $this->media_model->save($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menambah media sosial, periksa form anda",5);
            redirect('media','refresh');
        } else {
            set_cookie('success',"Anda berhasil menambah media sosial",5);
            redirect('media','refresh');
        }
    }

    function edit($id) {
        $getData = $this->media_model->getMedia($id);
        $data['config'] = $this->config_model->getConfig();
        if ($getData->num_rows() == 0) {
            set_cookie('error',"Anda tidak mendapatkan data",5);
            redirect('media','refresh');
        } else {
            $data['halaman'] = 'Media Sosial';
            $data['media'] = $getData->first_row();
        
            $this->load->view('layouts/header',$data);
            $this->load->view('layouts/sidebar');
            $this->load->view('layouts/body');
            $this->load->view('media/edit');
            $this->load->view('layouts/footer');
        }
    }

    function update() {
        $data['id_sosial'] = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
        $data['type'] = htmlspecialchars($this->input->post('type',TRUE),ENT_QUOTES);
        $data['link'] = htmlspecialchars($this->input->post('link',FALSE),ENT_QUOTES);

        $getData = $this->media_model->update($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil update media sosial, periksa form anda",5);
            redirect('media','refresh');
        } else {
            set_cookie('success',"Anda berhasil update media sosial",5);
            redirect('media','refresh');
        }
    }

    function delete($id) {
        $id = htmlspecialchars($id,ENT_QUOTES);
        $getData = $this->media_model->delete($id);
        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menghapus data",5);
            redirect('media','refresh');
        } else {
            set_cookie('success',"Anda berhasil menghapus data",5);
            redirect('media','refresh');
        }
    }
}