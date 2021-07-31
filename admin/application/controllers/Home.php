<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
		}
	}

	public function index()
	{
		$this->load->model('config_model');
		$data['check'] = $this->config_model->checkConfig();
		$data['halaman'] = 'Dashboard';
		$data['config'] = $this->config_model->getConfig();
		
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('dashboard');
		$this->load->view('layouts/footer');
	}
}
