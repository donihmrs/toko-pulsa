<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gambar extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        if ($this->session->userdata('level') != 1) {
            set_cookie('error',"Maaf, anda tidak memiliki akses ke halaman tersebut",5);
			redirect('home','refresh');
        }
        $this->load->model('gambar_model');
    }

    public function index() {
        $data['halaman'] = 'gambar';
        $data['gambars'] = $this->gambar_model->getData();
        $data['config'] = $this->config_model->getConfig();
        $this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
        $this->load->view('layouts/body');
        $this->load->view('gambar/index');
		$this->load->view('layouts/footer');
    }

    function add() {
        $data['halaman'] = 'gambar';
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('gambar/add');
		$this->load->view('layouts/footer');
	}

    function save() {
        $data['type'] = htmlspecialchars($this->input->post('type',TRUE),ENT_QUOTES);
        if ($_FILES["image"]["name"] != "") {          
			$config['upload_path']          = '../public/image/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['overwrite']			= true;
			$config['max_size']             = 2048; // 2MB

			$this->load->library('upload', $config);

			$fileName = $_FILES['image']['name'];

			$config['file_name'] = $this->fungsi->generateString().'-'.$fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('image')) {
				$data['file'] = $this->upload->data('file_name');
			}
		}

        $getData = $this->gambar_model->save($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menambah gambar, periksa form anda",5);
            redirect('gambar','refresh');
        } else {
            set_cookie('success',"Anda berhasil menambah gambar",5);
            redirect('gambar','refresh');
        }
    }

    function edit($id) {
        $getData = $this->gambar_model->getGambar($id);
        $data['config'] = $this->config_model->getConfig();
        if ($getData->num_rows() == 0) {
            set_cookie('error',"Anda tidak mendapatkan data",5);
            redirect('media','refresh');
        } else {
            $data['halaman'] = 'gambar';
            $data['gambar'] = $getData->first_row();
        
            $this->load->view('layouts/header',$data);
            $this->load->view('layouts/sidebar');
            $this->load->view('layouts/body');
            $this->load->view('gambar/edit');
            $this->load->view('layouts/footer');
        }
    }

    function update() {
        $data['id_gambar'] = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);
        $data['type'] = htmlspecialchars($this->input->post('type',TRUE),ENT_QUOTES);

        if ($_FILES["image"]["name"] != "") { 
			$namegambar = $this->input->post('namegambar',TRUE);  
			
			if (file_exists("../public/image/".$namegambar) && $namegambar !== "") {
				unlink("../public/image/".$namegambar);
			}

			$config['upload_path']          = '../public/image/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['overwrite']			= true;
			$config['max_size']             = 2048; // 2MB
			$this->load->library('upload', $config);

			$fileName = $_FILES['image']['name'];

			$config['file_name'] = $this->fungsi->generateString(5).'-'.$fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('image')) {
				$data['file'] = $this->upload->data('file_name');
			}
		}

        $getData = $this->gambar_model->update($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil update gambar, periksa form anda",5);
            redirect('gambar','refresh');
        } else {
            set_cookie('success',"Anda berhasil update gambar",5);
            redirect('gambar','refresh');
        }
    }

    function delete($id) {
        $id = htmlspecialchars($id,ENT_QUOTES);
        $getData = $this->gambar_model->getGambar($id);
		if ($getData->num_rows() != 0) {
			$file = $getData->first_row();		
			$file = $file->file;
			
			if ($file != "") {
				if (file_exists("../public/image/".$file)) {
					unlink("../public/image/".$file);
				}
            }
        }

        $getData = $this->gambar_model->delete($id);
        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menghapus data",5);
            redirect('gambar','refresh');
        } else {
            set_cookie('success',"Anda berhasil menghapus data",5);
            redirect('gambar','refresh');
        }
    }
}