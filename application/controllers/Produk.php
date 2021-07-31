<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('barang_model');
    }

    public function index($id = null)
	{
		
		$data['halaman'] = 'Product';
		$data['title'] = 'Jual Berbagai Busana Modern';
		$data['link'] = 'produk';

		$this->load->model('gambar_model');
		$this->load->model('template_model');

		$data['config'] = $this->config_model->getConfig();
		$data['medias'] = $this->media_model->getData();

		$dataGambar = $this->gambar_model->getData();
		$dataTemplate = $this->template_model->getData();
		
		foreach ($dataGambar as $value) {
			$data[$value->type] = $value->file;
		}

		foreach ($dataTemplate as $value) {
			$data['template'.$value->type] = $value;
		}
		
		$id = str_replace("-"," ",$id);

		if ($id == null) {
			$getBarang = $this->barang_model->getAll();
		} else {
			$getBarang = $this->barang_model->getKategori($id);
			if ($getBarang->num_rows() == 0) {
				$getBarang = $this->barang_model->getAll();
			}
		}

		$data['barang'] = $getBarang->result();
		$data['b_new'] = $this->barang_model->getNew();

		$data['menuproduk'] = $this->barang_model->Allkategori()->result();

		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/top');
		$this->load->view('layouts/body');
		$this->load->view('produk/index');
		$this->load->view('layouts/footer');
	}

	public function view($permalink) {
		$data['halaman'] = 'Product';
		$data['title'] = 'Detail Alat/Mesin';
		$data['link'] = 'produk';

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
		
		$data['b_feature'] = $this->barang_model->getFeature();
		$data['b_new'] = $this->barang_model->getNew();
		$data['b_random'] = $this->barang_model->getRandomBarang();

		$data['config'] = $this->config_model->getConfig();
		$data['medias'] = $this->media_model->getData();
		$getBarang = $this->barang_model->getPermalink($permalink);
		if ($getBarang->num_rows() == 0) {
            redirect('produk','refresh');
		} else {
			$data['barang'] = $getBarang->first_row();
		}

		$data['gambars'] = $this->barang_model->getGambarBarangOther($getBarang->first_row()->id_barang);
		$data['limitText'] = $this->fungsi->limit_text(htmlspecialchars_decode($getBarang->first_row()->deskripsi),45);
		$data['menuproduk'] = $this->barang_model->Allkategori()->result();
		
		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/top');
		$this->load->view('layouts/body');
		$this->load->view('produk/view');
		$this->load->view('layouts/footer');
	}

	public function search()
	{
		
		$data['halaman'] = 'Product';
		$data['title'] = 'Jual Berbagai Busana Modern';
		$data['link'] = 'produk';

		$this->load->model('gambar_model');
		$this->load->model('template_model');

		$data['config'] = $this->config_model->getConfig();
		$data['medias'] = $this->media_model->getData();

		$dataGambar = $this->gambar_model->getData();
		$dataTemplate = $this->template_model->getData();
		
		foreach ($dataGambar as $value) {
			$data[$value->type] = $value->file;
		}

		foreach ($dataTemplate as $value) {
			$data['template'.$value->type] = $value;
		}

		$url = parse_url($_SERVER['REQUEST_URI']);
		parse_str($_SERVER['QUERY_STRING'], $_GET);

		$id = str_replace("-"," ",$_GET['q']);

		if ($id == null) {
			$getBarang = $this->barang_model->getAll();
		} else {
			$getBarang = $this->barang_model->getSearch($id);
			if ($getBarang->num_rows() == 0) {
				$getBarang = $this->barang_model->getAll();
			}
		}

		$data['barang'] = $getBarang->result();
		$data['b_new'] = $this->barang_model->getNew();

		$data['menuproduk'] = $this->barang_model->Allkategori()->result();

		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/top');
		$this->load->view('layouts/body');
		$this->load->view('produk/index');
		$this->load->view('layouts/footer');
	}

	public function checkout($id = null)
	{
		
		$data['halaman'] = 'Product';
		$data['title'] = 'Checkout Pembelian';
		$data['link'] = 'produk/checkout';

		$this->load->model('gambar_model');
		$this->load->model('template_model');
		$this->load->model('bank_model');

		$data['config'] = $this->config_model->getConfig();
		$data['medias'] = $this->media_model->getData();
		$data['province'] = $this->fungsi->province();
		$data['bank'] = $this->bank_model->get_bank()->result();

		$dataGambar = $this->gambar_model->getData();
		$dataTemplate = $this->template_model->getData();
		
		foreach ($dataGambar as $value) {
			$data[$value->type] = $value->file;
		}

		foreach ($dataTemplate as $value) {
			$data['template'.$value->type] = $value;
		}
		
		$id = str_replace("-"," ",$id);

		if ($id == null) {
			$getBarang = $this->barang_model->getAll();
		} else {
			$getBarang = $this->barang_model->getKategori($id);
			if ($getBarang->num_rows() == 0) {
				$getBarang = $this->barang_model->getAll();
			}
		}

		$data['noTransaksi'] = $this->fungsi->generateString();

		$data['barang'] = $getBarang->result();
		$data['b_new'] = $this->barang_model->getNew();

		$data['menuproduk'] = $this->barang_model->Allkategori()->result();

		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/top');
		$this->load->view('layouts/body');
		$this->load->view('produk/checkout');
		$this->load->view('layouts/footer');
	}

	public function saveTransaksi() {
		$beratBarang = htmlspecialchars($this->input->post('berat',TRUE),ENT_QUOTES);
		$kurir = htmlspecialchars($this->input->post('kurir',TRUE),ENT_QUOTES);
		$service = htmlspecialchars($this->input->post('service',TRUE),ENT_QUOTES);

		if ($kurir == NULL || $service == NULL) {
            redirect('produk','refresh');
		}

		$idKota = htmlspecialchars($this->input->post('kota',TRUE),ENT_QUOTES);
		$idProvinsi = htmlspecialchars($this->input->post('province',TRUE),ENT_QUOTES);

		$getData = $this->fungsi->getNamaKotaProv($idKota,$idProvinsi);
		$resGetData = json_decode($getData)->rajaongkir->results;

		$checkOngkir = $this->fungsi->costServer(151, $resGetData->city_id, $beratBarang, $kurir);
		$decOngkir = json_decode($checkOngkir)->rajaongkir->results[0]->costs;
		$ongkosKirim = 0;

		foreach ($decOngkir as $value) {
			if ($value->service == $service) {
				$ongkosKirim = $value->cost[0]->value;
			}
		}

		$noTransaksi = htmlspecialchars($this->input->post('notransaksi',TRUE),ENT_QUOTES);

		while ($this->barang_model->checkNoTransaksi($noTransaksi)->num_rows() > 0) {
			$noTransaksi = $this->fungsi->generateString();
		}

		$data['no_transaksi'] = $noTransaksi;

		if ($this->barang_model->checkHargaBarang($this->input->post('idBarang',TRUE),$this->input->post('harga',TRUE)) == 0) {
			set_cookie('error',"Anda tidak berhasil melakukan checkout pembayaran",5);
            redirect('produk','refresh');
		}

		$hargaBarang = htmlspecialchars($this->input->post('harga',TRUE),ENT_QUOTES);
		$totalBelanja = (int)$hargaBarang + (int)$ongkosKirim;
		
		$metode = htmlspecialchars($this->input->post('metode',TRUE),ENT_QUOTES);

		$optPembayaran = NULL;
		$link = "";

		$handphone = htmlspecialchars($this->input->post('hp',TRUE),ENT_QUOTES);

		$this->load->model('user_model');
		switch ($metode) {
			case '1':
				$this->load->model('bank_model');

				$optPembayaran = htmlspecialchars($this->input->post('transferBank',TRUE),ENT_QUOTES);
				$getBank = $this->bank_model->get_bank_id($optPembayaran)->first_row();
				$link = base_url()."info-pembayaran?metode=transfer&akun=".$getBank->nama_bank."&transfer=".$getBank->rekening."&nama=".$getBank->pemilik."&no=".$noTransaksi."&cabang=".$getBank->cabang;
				
				$users = $this->user_model->getAdmin();
				$message = "Transaksi pembelian dengan nomor transaksi ".$noTransaksi.", Rp. ".number_format($totalBelanja).". Menggunakan Metode Pembayaran Transfer Bank ke ".$getBank->nama_bank." ".$getBank->rekening. " A.n ".$getBank->pemilik. " Mohon Check berkala.";
				$this->fungsi->sendWa(str_replace("+62","0",$users->hp),$message);
				break;
			case '2':
				$this->load->model('tdc_model');

				$optPembayaran = htmlspecialchars($this->input->post('virtualAccount',TRUE),ENT_QUOTES);

				$payment = [];
				$payment['total'] = $totalBelanja;
				$payment['transaksi'] = $noTransaksi;
				$payment['bank'] = $optPembayaran;
				$payment['nama'] = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);

				$tdcPayment = $this->tdc_model->virtualAccount($payment);
				$tdcPayment = json_decode($tdcPayment);
				
				if ($tdcPayment->Error == TRUE) {
					set_cookie('error',"Metode Pembayaran Virtual Account Gagal, Mohon Menggunakan Metode Pembayaran Lainnya",5);

					redirect('produk','refresh');
				}

				$link = base_url()."info-pembayaran?metode=virtual&akun=".$optPembayaran."&transfer=".$tdcPayment->data->accountNumber."&no=".$noTransaksi;

				$data['accnumber'] = $tdcPayment->data->accountNumber;

				$users = $this->user_model->getAdmin();
				$message = "Transaksi pembelian dengan nomor transaksi ".$noTransaksi.", Rp. ".number_format($totalBelanja).". Menggunakan Metode Pembayaran Virtual Account ".$optPembayaran;
				$this->fungsi->sendWa(str_replace("+62","0",$users->hp),$message);
				break;
			case '3':
				$this->load->model('tdc_model');
				$optPembayaran = htmlspecialchars($this->input->post('ovoTransfer',TRUE),ENT_QUOTES);

				$payment = [];
				$payment['total'] = $totalBelanja;
				$payment['transaksi'] = $noTransaksi;
				$payment['hp'] = str_replace('+62','0',$optPembayaran);
				
				$link = base_url()."info-pembayaran?metode=ovo&hp=".$optPembayaran."&no=".$noTransaksi;
				
				$tdcPayment = $this->tdc_model->ovo($payment);
				$tdcPayment = json_decode($tdcPayment);
				
				if ($tdcPayment->Error == TRUE) {
					set_cookie('error',"Metode Pembayaran OVO Gagal, Harap Periksa Nomor Handphone OVO",5);
					redirect('produk','refresh');
				}

				$data['accnumber'] = $optPembayaran;

				$users = $this->user_model->getAdmin();
				$message = "Transaksi pembelian dengan nomor transaksi ".$noTransaksi.", Rp. ".number_format($totalBelanja).". Menggunakan Metode Pembayaran OVO ".$optPembayaran;
				$this->fungsi->sendWa(str_replace("+62","0",$users->hp),$message);
				break;
			
			default:
				$optPembayaran = NULL;
				break;
		}

        $data['nama'] = htmlspecialchars($this->input->post('nama',TRUE),ENT_QUOTES);
        $data['hp'] = $handphone;
		$data['email'] = htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
		$data['provinsi'] = $resGetData->province;
		$data['kota'] = $resGetData->city_name;
		$data['kodepos'] = $resGetData->postal_code;
        $data['alamat'] = htmlspecialchars($this->input->post('alamat',TRUE),ENT_QUOTES);
		$data['ongkir'] = htmlspecialchars($this->input->post('kurir',TRUE),ENT_QUOTES);
		$data['total'] = $totalBelanja;
		$data['harga_ongkir'] = $ongkosKirim;
		$data['service'] = $service;
		$data['opt_pembayaran'] = $optPembayaran;
		$data['pembayaran'] = $metode;
		
		$this->load->model('transaksi_model');

		$getId = $this->transaksi_model->save($data);
		
        if ($getId == NULL) {
            set_cookie('error',"Anda tidak berhasil melakukan checkout pembayaran",5);
            redirect('produk','refresh');
        } else {
			$barang = [];
			$barang['keterangan'] = htmlspecialchars($this->input->post('keterangan',TRUE),ENT_QUOTES);
			$barang['harga'] = $hargaBarang;
			$barang['id_barang'] = htmlspecialchars($this->input->post('idBarang',TRUE),ENT_QUOTES);
			$barang['berat'] = htmlspecialchars($this->input->post('berat',TRUE),ENT_QUOTES);
			$barang['qty'] = htmlspecialchars($this->input->post('qty',TRUE),ENT_QUOTES);
			$barang['id_transaksi'] = $getId;
			
			$res = $this->transaksi_model->saveBarang($barang);

			if ($res != 0) {
				set_cookie('error',"Anda berhasil melakukan checkout pembayaran",5);
            	redirect($link,'refresh');
			} else {
				set_cookie('error',"Anda tidak berhasil melakukan checkout pembayaran",5);
            	redirect('produk','refresh');
			}
        }
	}

	public function info($id = null)
	{
		$data['halaman'] = 'Product';
		$data['title'] = 'Informasi Pembayaran';
		$data['link'] = 'info-pembayaran';

		$this->load->model('gambar_model');
		$this->load->model('template_model');
		$this->load->model('bank_model');

		$data['config'] = $this->config_model->getConfig();
		$data['medias'] = $this->media_model->getData();
		$data['bank'] = $this->bank_model->get_bank()->result();

		$dataGambar = $this->gambar_model->getData();
		$dataTemplate = $this->template_model->getData();
		
		foreach ($dataGambar as $value) {
			$data[$value->type] = $value->file;
		}

		foreach ($dataTemplate as $value) {
			$data['template'.$value->type] = $value;
		}

		$data['menuproduk'] = $this->barang_model->Allkategori()->result();

		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/top');
		$this->load->view('layouts/body');
		$this->load->view('produk/info');
		$this->load->view('layouts/footer');
	}

	public function transaksi($id = null)
	{
		$data['halaman'] = 'Product';
		$data['title'] = 'Transaksi Pembelian';
		$data['link'] = 'transaksi/'.$id;

		$this->load->model('gambar_model');
		$this->load->model('template_model');
		$this->load->model('bank_model');

		$data['config'] = $this->config_model->getConfig();
		$data['medias'] = $this->media_model->getData();
		$data['bank'] = $this->bank_model->get_bank()->result();

		$dataGambar = $this->gambar_model->getData();
		$dataTemplate = $this->template_model->getData();
		
		foreach ($dataGambar as $value) {
			$data[$value->type] = $value->file;
		}

		foreach ($dataTemplate as $value) {
			$data['template'.$value->type] = $value;
		}

		$data['menuproduk'] = $this->barang_model->Allkategori()->result();
		
		$data['transaksi'] = $this->barang_model->checkNoTransaksi($id)->first_row();

		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/top');
		$this->load->view('layouts/body');
		$this->load->view('produk/transaksi');
		$this->load->view('layouts/footer');
	}

	public function check()
	{
		$data['halaman'] = 'Product';
		$data['title'] = 'Transaksi Pembelian';
		$data['link'] = 'transaksi/'.$id;

		$this->load->model('gambar_model');
		$this->load->model('template_model');
		$this->load->model('bank_model');

		$data['config'] = $this->config_model->getConfig();
		$data['medias'] = $this->media_model->getData();
		$data['bank'] = $this->bank_model->get_bank()->result();

		$dataGambar = $this->gambar_model->getData();
		$dataTemplate = $this->template_model->getData();
		
		foreach ($dataGambar as $value) {
			$data[$value->type] = $value->file;
		}

		foreach ($dataTemplate as $value) {
			$data['template'.$value->type] = $value;
		}

		$data['menuproduk'] = $this->barang_model->Allkategori()->result();

		$this->load->view('layouts/header',$data);
		$this->load->view('layouts/top');
		$this->load->view('layouts/body');
		$this->load->view('produk/check');
		$this->load->view('layouts/footer');
	}
}
?>