<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
		}
		
        $this->load->model('kategori_model');
    }

    function index() {
        $data['halaman'] = 'Kategori';
        $data['kategoris'] = $this->kategori_model->getAll();
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('kategori/list');
		$this->load->view('layouts/footer');
    }

    function add() {
        $data['halaman'] = 'Kategori';
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('kategori/create');
		$this->load->view('layouts/footer');
	}

	function edit($id) {
		$data['halaman'] = 'Kategori';
		$data['config'] = $this->config_model->getConfig();
		$getData = $this->kategori_model->getKategori_id($id);
		if ($getData->num_rows() != 0) {
			$data['kategori'] = $getData->first_row();
		} else {
			set_cookie('error',"Data yang Anda maksud tidak tersedia",5);
            redirect('kategori','refresh');
		}
		
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('kategori/edit');
		$this->load->view('layouts/footer');
	}
	
	function save() {
		$data['n_kategori'] = $this->input->post('nama');

		$getData = $this->kategori_model->save($data);

		if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menyimpan data",5);
            redirect('kategori','refresh');
        } else {
            set_cookie('success',"Anda berhasil menambah data",5);
            redirect('kategori','refresh');
        }
	}
	
	function update() {
		$data['n_kategori'] = $this->input->post('nama');
		$data['id_kategori'] = htmlspecialchars($this->input->post('id'),ENT_QUOTES);

		$getData = $this->kategori_model->update($data);

		if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil update data",5);
            redirect('kategori','refresh');
        } else {
            set_cookie('success',"Anda berhasil update data",5);
            redirect('kategori','refresh');
        }
	}

}