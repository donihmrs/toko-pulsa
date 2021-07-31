<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        $this->load->model('api_model');
    }

    public function getBarang() {
        $id  = $_POST['id'];
        $data = $this->api_model->getBarang_id($id);
        echo json_encode($data->result());
    }

    public function getKategori() {
        $data = $this->api_model->getKategori();
        echo json_encode($data->result());
    }

    public function getBarangReply() {
        $id  = $_POST['id'];
        $data = $this->api_model->getBarang_reply($id);
        echo json_encode($data->result());
    }
}