<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
	}

	public function index()
	{
		$this->load->model('gambar_model');
		$this->load->model('template_model');
		
		$dataGambar = $this->gambar_model->getData();
		$dataTemplate = $this->template_model->getData();
		
		foreach ($dataGambar as $value) {
			$data[$value->type] = $value->file;
		}

		foreach ($dataTemplate as $value) {
			$data['template'.$value->type] = $value;
		}

		$data['halaman'] = 'Home';
		$data['homepage'] = 'Home';
		$data['title'] = 'System Applikasi Digital';
		$data['config'] = $this->config_model->getConfig();
		$data['medias'] = $this->media_model->getData();
		$data['b_feature'] = $this->barang_model->getFeature();
		$data['b_new'] = $this->barang_model->getNew();
		$data['kategoris'] = $this->barang_model->AllkategoriLimit(6)->result();
		$data['menuproduk'] = $this->barang_model->Allkategori()->result();
		
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/top');
		$this->load->view('layouts/body');
		$this->load->view('home');
		$this->load->view('layouts/footer');
	}

	public function contact()
	{
		$this->load->model('gambar_model');
		$this->load->model('template_model');
		
		$dataGambar = $this->gambar_model->getData();
		$dataTemplate = $this->template_model->getData();
		
		foreach ($dataGambar as $value) {
			$data[$value->type] = $value->file;
		}

		foreach ($dataTemplate as $value) {
			$data['template'.$value->type] = $value;
		}

		$data['halaman'] = 'Contact';
		$data['title'] = 'Hubungi Kami';
		$data['link'] = 'contact';
		$data['config'] = $this->config_model->getConfig();
		$data['medias'] = $this->media_model->getData();
		$data['menuproduk'] = $this->barang_model->Allkategori()->result();
		
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/top');
		$this->load->view('layouts/body');
		$this->load->view('contact');
		$this->load->view('layouts/footer');
	}

	public function about()
	{
		$this->load->model('gambar_model');
		$this->load->model('template_model');
		
		$dataGambar = $this->gambar_model->getData();
		$dataTemplate = $this->template_model->getData();
		
		foreach ($dataGambar as $value) {
			$data[$value->type] = $value->file;
		}

		foreach ($dataTemplate as $value) {
			$data['template'.$value->type] = $value;
		}

		$data['halaman'] = 'About';
		$data['title'] = 'About Us';
		$data['link'] = 'About';
		$data['config'] = $this->config_model->getConfig();
		$data['medias'] = $this->media_model->getData();
		$data['menuproduk'] = $this->barang_model->Allkategori()->result();
		
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/top');
		$this->load->view('layouts/body');
		$this->load->view('about');
		$this->load->view('layouts/footer');
	}
}
