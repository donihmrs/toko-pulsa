<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('user') == NULL) {
			redirect('login','refresh');
		}
		
        $this->load->model('transaksi_model');
    }

    public function index() {
        $data['halaman'] = 'Transaksi';
        $data['transaksi'] = $this->transaksi_model->getAll();
        $data['config'] = $this->config_model->getConfig();
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('transaksi/list');
		$this->load->view('layouts/footer');
    }

    public function view($id) {
        $this->load->model('bank_model');

        $data['halaman'] = 'Transaksi';
        $transaksi = $this->transaksi_model->get_id($id);
        $data['transaksi'] = $transaksi;
        $data['config'] = $this->config_model->getConfig();
        if ($transaksi->pembayaran == 1) {
            $data['bank'] = $this->bank_model->get_bank_id($transaksi->opt_pembayaran)->first_row();
        }
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/sidebar');
		$this->load->view('layouts/body');
		$this->load->view('transaksi/view');
		$this->load->view('layouts/footer');
    }

    function updateStatus() {
        $data['no_transaksi'] = htmlspecialchars($this->input->post('nomor',TRUE),ENT_QUOTES);
        $data['status'] = htmlspecialchars($this->input->post('status',TRUE),ENT_QUOTES);

        $getData = $this->transaksi_model->update($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil update status transaksi, periksa form anda",5);
            redirect($_SERVER['HTTP_REFERER'],'refresh');
        } else {
            set_cookie('success',"Anda berhasil update status transaksi",5);
            redirect($_SERVER['HTTP_REFERER'],'refresh');
        }
    }

    function updateResi() {
        $data['no_transaksi'] = htmlspecialchars($this->input->post('nomor',TRUE),ENT_QUOTES);
        $data['resi'] = htmlspecialchars($this->input->post('resi',TRUE),ENT_QUOTES);
        $data['status'] = 3;

        $getData = $this->transaksi_model->update($data);

        if ($getData == 0) {
            set_cookie('error',"Anda tidak berhasil input nomor resi, periksa form anda",5);
            redirect($_SERVER['HTTP_REFERER'],'refresh');
        } else {
            set_cookie('success',"Anda berhasil input nomor resi",5);
            redirect($_SERVER['HTTP_REFERER'],'refresh');
        }
    }
}