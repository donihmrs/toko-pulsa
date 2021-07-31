<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('level') != 1) {
            set_cookie('error',"Maaf, anda tidak memiliki akses ke halaman tersebut",5);
			redirect('home','refresh');
        }
        $this->load->model('template_model');
    }

    public function index() {
        $data['halaman'] = 'Template';
        $data['templates'] = $this->template_model->getData();
        $data['config'] = $this->config_model->getConfig();
        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
        $this->load->view('layouts/body');
        $this->load->view('template/index');
		$this->load->view('layouts/footer');
    }

    function add() {
        $data['halaman'] = 'Template';
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('template/add');
		$this->load->view('layouts/footer');
	}

    function save() {
        $data['name'] = htmlspecialchars($this->input->post('name',TRUE),ENT_QUOTES);
        $data['type'] = htmlspecialchars($this->input->post('type',TRUE),ENT_QUOTES);
        $data['title'] = htmlspecialchars($this->input->post('title',FALSE),ENT_QUOTES);
        $data['body'] = htmlspecialchars($this->input->post('body',FALSE),ENT_QUOTES);
        $data['footer'] = htmlspecialchars($this->input->post('footer',FALSE),ENT_QUOTES);
        $data['text_button'] = htmlspecialchars($this->input->post('text_button',FALSE),ENT_QUOTES);
        $data['link_button'] = htmlspecialchars($this->input->post('link_button',FALSE),ENT_QUOTES);

        $getData = $this->template_model->save($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menambah Design, periksa form anda",5);
            redirect('template','refresh');
        } else {
            set_cookie('success',"Anda berhasil menambah Design",5);
            redirect('template','refresh');
        }
    }

    function edit($id) {
        $getData = $this->template_model->getTemplate($id);
        $data['config'] = $this->config_model->getConfig();
        if ($getData->num_rows() == 0) {
            set_cookie('error',"Anda tidak mendapatkan data",5);
            redirect('media','refresh');
        } else {
            $data['halaman'] = 'Template';
            $data['template'] = $getData->first_row();
        
            $this->load->view('layouts/header',$data);
            $this->load->view('layouts/sidebar');
            $this->load->view('layouts/body');
            $this->load->view('template/edit');
            $this->load->view('layouts/footer');
        }
    }

    function update() {
        $data['id_template'] = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
        $data['name'] = htmlspecialchars($this->input->post('name',TRUE),ENT_QUOTES);
        $data['type'] = htmlspecialchars($this->input->post('type',TRUE),ENT_QUOTES);
        $data['title'] = htmlspecialchars($this->input->post('title',FALSE),ENT_QUOTES);
        $data['body'] = htmlspecialchars($this->input->post('body',FALSE),ENT_QUOTES);
        $data['footer'] = htmlspecialchars($this->input->post('footer',FALSE),ENT_QUOTES);
        $data['text_button'] = htmlspecialchars($this->input->post('text_button',FALSE),ENT_QUOTES);
        $data['link_button'] = htmlspecialchars($this->input->post('link_button',FALSE),ENT_QUOTES);

        $getData = $this->template_model->update($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil update Template, periksa form anda",5);
            redirect('template','refresh');
        } else {
            set_cookie('success',"Anda berhasil update Template",5);
            redirect('template','refresh');
        }
    }

    function delete($id) {
        $id = htmlspecialchars($id,ENT_QUOTES);
        $getData = $this->template_model->delete($id);
        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menghapus data",5);
            redirect('template','refresh');
        } else {
            set_cookie('success',"Anda berhasil menghapus data",5);
            redirect('template','refresh');
        }
    }
}