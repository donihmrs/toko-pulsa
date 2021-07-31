<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
    }

    public function cost()
	{
		$data = $this->fungsi->cost(151, $_POST['destination'], $_POST['weight'], $_POST['courier']);
		echo $data;
	}
	
	public function kota()
	{
		$data = $this->fungsi->kota($_POST['id']);
		echo $data;
	}

	public function bankTransfer()
	{
		$data = $this->fungsi->kota($_POST['id']);
		echo $data;
	}
}