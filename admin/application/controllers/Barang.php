<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
		}
		
        $this->load->model('barang_model');
        $this->load->model('kategori_model');
    }

    function index() {
        $data['halaman'] = 'Barang';
        $data['barangs'] = $this->barang_model->getAll();
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('barang/list');
		$this->load->view('layouts/footer');
	}

    function add() {
		if ($this->session->userdata('level') != 1) {
            set_cookie('error',"Maaf, anda tidak memiliki akses untuk input barang",5);
			redirect('barang','refresh');
		}

        $data['halaman'] = 'Barang';
		$data['kategoris'] = $this->kategori_model->getAll()->result();
		$data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('barang/create');
		$this->load->view('layouts/footer');
	}

	function edit($id) {
		$this->load->model('gbarang_model');

		if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 4) {
            set_cookie('error',"Maaf, anda tidak memiliki akses untuk edit barang",5);
			redirect('barang','refresh');
		}
		
        $data['halaman'] = 'Barang';
		$data['kategoris'] = $this->kategori_model->getAll()->result();
		$getBarang = $this->gbarang_model->getAll($id);
		if ($getBarang->num_rows() != 0) {
			$data['gambars'] = $getBarang;
		} else {
			$data['gambars'] = [];
		}
		
		$getData = $this->barang_model->getBarang_id($id);
		$data['config'] = $this->config_model->getConfig();
		if ($getData->num_rows() != 0) {
			$data['barang'] = $getData->first_row();
		} else {
			set_cookie('error',"Data yang Anda maksud tidak tersedia",5);
            redirect('barang','refresh');
		}

		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('barang/edit');
		$this->load->view('layouts/footer');
	}

	function delete($id) {
		if ($this->session->userdata('level') != 1) {
            set_cookie('error',"Maaf, anda tidak memiliki akses untuk menghapus barang",5);
			redirect('barang','refresh');
		}
		
		$id = htmlspecialchars($id,ENT_QUOTES);

		$getData = $this->barang_model->getBarang_id($id);
		if ($getData->num_rows() != 0) {
			$file = $getData->first_row();		
			$file = $file->gambar;
			
			if ($file != "") {
				if (file_exists("./public/image/".$file)) {
					unlink("./public/image/".$file);
				}
			}

			$getData = $this->barang_model->delete($id);
			if ($getData == 0) {
				set_cookie('error',"Anda tidak berhasil menghapus data",5);
				redirect('barang','refresh');
			} else {
				set_cookie('success',"Anda berhasil menghapus data",5);
				redirect('barang','refresh');
			}
		} else {
			set_cookie('error',"Data yang anda maksud tidak tersedia",5);
			redirect('barang','refresh');
		}
	}

	function save () {
		if ($this->session->userdata('level') != 1) {
            set_cookie('error',"Maaf, anda tidak memiliki akses untuk input barang",5);
			redirect('barang','refresh');
		}

		$getData = 0;

		$permalink = htmlspecialchars($this->input->post('permalink',TRUE),ENT_QUOTES);
		$permalink = preg_replace("/ |\'|\"/i","-",$permalink);

		$check = $this->barang_model->checkPermalink($permalink);

		if ($check > 0) {
			set_cookie('error',"Maaf, Permalink yang anda masukan sudah terpakai",5);
			redirect('barang','refresh');
		}

        $data['id_kategori'] = htmlspecialchars($this->input->post('kategori',TRUE),ENT_QUOTES);
		$data['n_barang'] = htmlspecialchars($this->input->post('n_barang',TRUE),ENT_QUOTES);
		$data['code'] = htmlspecialchars($this->input->post('code',TRUE),ENT_QUOTES);
		$data['harga'] = htmlspecialchars($this->input->post('harga',TRUE),ENT_QUOTES);
		$data['berat'] = htmlspecialchars($this->input->post('berat',TRUE),ENT_QUOTES);
		$data['feature'] = htmlspecialchars($this->input->post('feature',TRUE),ENT_QUOTES);
        $data['deskripsi'] = htmlspecialchars($this->input->post('deskripsi',TRUE),ENT_QUOTES);
        $data['permalink'] = $permalink;
        $data['meta_title'] = htmlspecialchars($this->input->post('meta_title',TRUE),ENT_QUOTES);
		$data['keyword'] = htmlspecialchars($this->input->post('keyword',TRUE),ENT_QUOTES);
        $data['meta_deskripsi'] = htmlspecialchars($this->input->post('meta_deskripsi',TRUE),ENT_QUOTES);
		
		$count = count($_FILES['gambar']['name']);
		
		$this->load->model('gbarang_model');
		
		for($i=0;$i<$count;$i++){
			if ($_FILES["gambar"]["name"][$i] != "") {          
				$config['upload_path']          = '../public/image/';
				$config['allowed_types']        = 'gif|jpg|png|jpeg';
				$config['overwrite']			= true;
				$config['max_size']             = 2048; // 2MB

				$this->load->library('upload', $config);

				$_FILES['file']['name'] = $_FILES['gambar']['name'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
				$_FILES['file']['size'] = $_FILES['gambar']['size'][$i];
				$_FILES['file']['type'] = $_FILES['gambar']['type'][$i];
				$_FILES['file']['error'] = $_FILES['gambar']['error'][$i];

				$fileName = $_FILES['gambar']['name'][$i];

				$config['file_name'] = $this->fungsi->generateString().'-'.$fileName;

				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {
					$data['gambar'] = $this->upload->data('file_name');
				}
			}

			if ($i == 0) {
				$lastId = $this->barang_model->save($data);
				$getData = 1;
			} else {
				if ($getData != 0) {
					$gambar['id_barang'] = $lastId;
					$gambar['nama_gambar'] = $fileName;
					$gambar['file'] = $this->upload->data('file_name');
				
					$this->gbarang_model->save($gambar);
				}
			}
		}

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menambahkan barang",5);
            redirect('barang','refresh');
        } else {
            set_cookie('success',"Anda berhasil menambahkan barang",5);
            redirect('barang','refresh');
        }
	}
	
	function update () {
		if ($this->session->userdata('level') != 1 && $this->session->userdata('level') != 4) {
            set_cookie('error',"Maaf, anda tidak memiliki akses untuk update barang",5);
			redirect('barang','refresh');
		}

		$idbarang = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);

		$permalink = htmlspecialchars($this->input->post('permalink',TRUE),ENT_QUOTES);
		$permalink = preg_replace("/ |\'|\"/i","-",$permalink);

		$check = $this->barang_model->checkPermalink($permalink);
		$checkId = $this->barang_model->checkPermalinkId($permalink);

		if ($check > 0 && $idbarang != $checkId->id_barang) {
			set_cookie('error',"Maaf, Permalink yang anda masukan sudah terpakai",5);
			redirect('barang','refresh');
		}

        $data['id_barang'] = $idbarang;
        $data['id_kategori'] = htmlspecialchars($this->input->post('kategori',TRUE),ENT_QUOTES);
		$data['n_barang'] = htmlspecialchars($this->input->post('n_barang',TRUE),ENT_QUOTES);
		$data['code'] = htmlspecialchars($this->input->post('code',TRUE),ENT_QUOTES);
		$data['berat'] = htmlspecialchars($this->input->post('berat',TRUE),ENT_QUOTES);
		$data['feature'] = htmlspecialchars($this->input->post('feature',TRUE),ENT_QUOTES);
		
		if ($this->input->post('harga',TRUE) !== NULL) {
			$data['harga'] = htmlspecialchars($this->input->post('harga',TRUE),ENT_QUOTES);
		}

		$data['deskripsi'] = htmlspecialchars($this->input->post('deskripsi',TRUE),ENT_QUOTES);
        $data['permalink'] = $permalink;
        $data['meta_title'] = htmlspecialchars($this->input->post('meta_title',TRUE),ENT_QUOTES);
		$data['keyword'] = htmlspecialchars($this->input->post('keyword',TRUE),ENT_QUOTES);
        $data['meta_deskripsi'] = htmlspecialchars($this->input->post('meta_deskripsi',TRUE),ENT_QUOTES);
		
		if ($_FILES["gambar"]["name"] != "") { 
			$namegambar = $this->input->post('namegambar',TRUE);  
			
			if (file_exists("../public/image/".$namegambar) && $namegambar !== "") {
				unlink("../public/image/".$namegambar);
			}

			$config['upload_path']          = '../public/image/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['overwrite']			= true;
			$config['max_size']             = 2048; // 2MB
			$this->load->library('upload', $config);

			$fileName = $_FILES['gambar']['name'];

			$config['file_name'] = $this->fungsi->generateString(5).'-'.$fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('gambar')) {
				$data['gambar'] = $this->upload->data('file_name');
			}
		}

		$getData = $this->barang_model->update($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil update barang",5);
            redirect('barang','refresh');
        } else {
            set_cookie('success',"Anda berhasil melakukan update barang",5);
            redirect('barang','refresh');
        }
	}
	
	function import() {
		if ($this->session->userdata('level') != 1) {
            set_cookie('error',"Maaf, anda tidak memiliki akses untuk import barang",5);
			redirect('barang','refresh');
		}
		
		$this->load->model('kategori_model');
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

		if(isset($_FILES["filePrice"]["name"]) && in_array($_FILES['filePrice']['type'], $file_mimes))
		{
			$path = $_FILES["filePrice"]["tmp_name"];
			
			$spreadsheet = new Spreadsheet();

			$arr_file = explode('.', $_FILES['filePrice']['name']);
			$extension = end($arr_file);
		
			if('csv' == $extension) {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			} else {
				$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			}

			$spreadsheet = $reader->load($_FILES['filePrice']['tmp_name']);
     
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			for($i = 1;$i < count($sheetData);$i++)
			{	
				$rowName = $sheetData[$i]['3'];
				$idKategori = $this->kategori_model->getKategori_name($rowName);
				if ($idKategori->num_rows() != 0) {
					$idKategori = $idKategori->first_row();
					$kategori = $idKategori->id_kategori;
				} else {
					$kategori = 1;
				}
				$nama = $sheetData[$i]['1'];
				$permalink = preg_replace("/ |\'|\"/i","-",$sheetData[$i]['1']);
				$metaDeskripsi = htmlspecialchars($sheetData[$i]['1'],ENT_QUOTES);
				$deskripsi = htmlspecialchars($sheetData[$i]['1'],ENT_QUOTES);
				$harga = 0;
				$code = $sheetData[$i]['0'];
				$data[] = array(
					'n_barang'  => $nama,
					'code'    => $code,
					'harga'  => $harga,
					'deskripsi'  => $deskripsi,
					'id_kategori'   => $kategori,
					'feature' => 0,
					'meta_deskripsi' => "",
					'keyword' => 'jual,nomor,cantik,murah,online,'.$rowName.','.$nama,
					'meta_title' => 'Jual Nomor Cantik '.$nama.' - Operator : '.$rowName,
					'gambar' => ''
				);
			}

			$getData = $this->barang_model->saveImport($data);
			if ($getData == 0) {
				set_cookie('error',"Anda tidak berhasil import data, cek kembali format file excel Anda",5);
				redirect('barang','refresh');
			} else {
				set_cookie('success',"Anda berhasil melakukan import data barang",5);
				redirect('barang','refresh');
			}
		} 
	}

	public function uploadGambar($data = null) {
		$this->load->model('gbarang_model');
		if ($_FILES["gambarOther"]["name"] != "") {     
			$data['id_barang'] = htmlspecialchars($this->input->post('id',TRUE),ENT_QUOTES);

			$config['upload_path']          = '../public/image/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg';
			$config['overwrite']			= true;
			$config['max_size']             = 2048; // 2MB

			$this->load->library('upload', $config);

			$fileName = $_FILES['gambarOther']['name'];
			

			$config['file_name'] = $this->fungsi->generateString().'-'.$fileName;

			$this->upload->initialize($config);

			if ($this->upload->do_upload('gambarOther')) {
				$data['nama_gambar'] = $fileName;
				$data['file'] = $this->upload->data('file_name');
			}
		}

		$getData = $this->gbarang_model->save($data);

		echo json_encode(array("status"=>"OK"));
	}

	function deleteGambar($id) {
		$this->load->model('gbarang_model');
		
        $id = htmlspecialchars($id,ENT_QUOTES);
        $getData = $this->gbarang_model->getGambar($id);
		if ($getData->num_rows() != 0) {
			$file = $getData->first_row();		
			$file = $file->file;
			
			if ($file != "") {
				if (file_exists("../public/image/".$file)) {
					unlink("../public/image/".$file);
				}
            }
        }

        $getData = $this->gbarang_model->delete($id);
        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil menghapus data",5);
            redirect($_SERVER['HTTP_REFERER'],'refresh');
        } else {
            set_cookie('success',"Anda berhasil menghapus data",5);
            redirect($_SERVER['HTTP_REFERER'],'refresh');
        }
    }

}