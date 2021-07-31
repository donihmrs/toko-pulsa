<section class="main-content">
	<div class="row">						
		<div class="span12">
            <form action="<?=base_url()?>Produk/saveTransaksi" method="post">
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">Data Kustomer</a>
                        </div>
                        <div id="collapseOne" class="accordion-body in collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                <div class="span12 text-center">
                                    <div class="col-lg-12">
                                        <h5>Alamat Pengiriman</h5>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Nama</label>
                                        <input name="nama" class="form-control form-controls" type="text" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Email</label>
                                        <input name="email" class="form-control form-controls" type="email" placeholder="Email Aktif">
                                    </div>
                                    <div class="col-lg-6">
                                        <input id="provinces" type="hidden" name="provinces" value="">
                                        <label>Provinsi</label>
                                        <select name="province" id="provinsiTujuan" class="form-control form-controls">
                                            <option value="" selected disabled>Pilih Provinsi</option>
                                            <?php foreach($province as $key => $values){ 
                                                foreach($values["results"] as $value){ ?>
                                                    <option value="<?= $value["province_id"] ?>"><?= $value["province"] ?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <input id="kotas" type="hidden" name="kotas" value="">
                                        <label>Kota/Kabupaten</label>
                                        <select name="kota" id="kotaTujuan" class="form-control form-controls">
                                            <option value="0">Pilih Provinsi Terlebih Dahulu</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Alamat Lengkap</label>
                                        <textarea name="alamat" class="form-control form-controls" type="text" rows="3" placeholder="22 Jump Street"></textarea>
                                    </div>
                                    <!-- <div class="col-lg-6">
                                        <label>Kode Pos</label>
                                        <input class="form-control form-controls" type="text" placeholder="12345">
                                    </div> -->
                                    <div class="col-lg-12">
                                        <label>No Handphone</label>
                                        <input name="hp" class="form-control form-controls" type="tel" placeholder="08114003232">
                                    </div>
                                    <input name="berat" id="berat" type="hidden" value="<?=$_GET['w']?>" class="form-control form-controls">
                                    <input name="qty" id="qty" type="hidden" value="<?=$_GET['q']?>" class="form-control form-controls">
                                    <input name="keterangan" id="keterangan" type="hidden" value="<?=$_GET['k']?>" class="form-control form-controls">
                                    <input name="harga" id="harga" type="hidden" value="<?=$_GET['h']?>" class="form-control form-controls">
                                    <input name="idBarang" id="idBarang" type="hidden" value="<?=$_GET['b']?>" class="form-control form-controls">
                                    <input name="notransaksi" id="notransaksi" type="hidden" value="<?= $noTransaksi ?>" class="form-control form-controls">
                                    <input name="service" id="serviceKurir" type="hidden" class="form-control form-controls">
                                    
                                    <div class="col-lg-6">
                                        <label>Pilih Kurir</label>
                                        <select id="kurir" name="kurir" class="form-control form-controls">
                                            <option value="jne">JNE</option>
                                            <option value="pos">POS</option>
                                            <option value="tiki">TIKI</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle cekBiaya" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">Konfirmasi Order dan Ongkir</a>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse">
                            <div class="accordion-inner">
                                <div class="row-fluid">
                                <input name="ongkirs" type="hidden" id="ongkirs">  
                                    <div class="row-fluid">
                                        <div class="span4">
                                            <div id="hasilKurir" class="row">
                                                <!--data kurir-->
                                            </div>
                                        </div>

                                        <div id="metodePembayaranDiv" style="display:none" class="span2 row text-left mb-3">
                                            <h5>Metode Pembayaran</h5>
                                            <input name="Pembayarans" type="hidden" id="Pembayarans">
                                            <input type="hidden" name="totalSeluruh" id="totalSeluruh">
                                            <div class="card">
                                                <div class="form-check">
                                                    <input class="form-check-input check" type="radio" name="metode" id="metode1" value="1">
                                                    <label style="display:inline-block;margin-left:15px" class="form-check-label ml-2 w-100" for="metode1" style="font-size: 18px;color: grey;">
                                                        Bank Transfer
                                                    </label>
                                                </div>
                                                <div id="pilihBank" class="row mx-auto mt-2 methodePay" style="display:none">
                                                    <div class="span12">
                                                        <div class="form-group">
                                                            <label for="transferBank"><b>Pilih Bank</b></label>
                                                            <select name="transferBank" class="form-control form-controls" id="transferBank">
                                                                <?php foreach($bank as $data) { ?>
                                                                    <option value="<?= $data->id_bank ?>"><?= $data->nama_bank ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                    
                                                <div class="form-check">
                                                    <input class="form-check-input check" type="radio" name="metode" id="metode2" value="2">
                                                    <label style="display:inline-block;margin-left:15px" class="form-check-label ml-2 w-100" for="metode1" style="font-size: 18px;color: grey;">
                                                        Virtual Account
                                                    </label>
                                                </div>
                                                <div id="pilihVa" class="row mx-auto mt-2 methodePay" style="display:none">
                                                    <div class="span12">
                                                        <div class="form-group">
                                                            <label for="virtualAccount"><b>Pilih Virtual Accoung</b></label>
                                                            <select name="virtualAccount" class="form-control form-controls" id="virtualAccount">
                                                                <option value="BCA">BCA</option>
                                                                <option value="BNI">BNI</option>
                                                                <option value="BRI">BRI</option>
                                                                <option value="MANDIRI">MANDIRI</option>
                                                                <option value="PERMATA">PERMATA</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input check" type="radio" name="metode" id="metode3" value="3">
                                                    <label style="display:inline-block;margin-left:15px" class="form-check-label ml-2 w-100" for="metode2" style="font-size: 18px;color: grey;">
                                                        OVO
                                                    </label>
                                                </div>
                                                <div id="pilihOvo" class="row mx-auto mt-2 methodePay" style="display:none">
                                                    <div class="span12">
                                                        <label for="ovoTransfer"><b>Masukan Nomor OVO Anda </b></label>
                                                        <input name="ovoTransfer" id="ovoTransfer" class="form-control form-controls" type="text" placeholder="08114003232">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="totalPembayaranDiv" style="display:none;" class="span6">
                                            <h5 class="text-center">Informasi</h5>
                                            <input type="hidden" id="totalBelanja" value="<?=$_GET['h']?>">
                                            <div class="span12 text-left">
                                                <span style="font-size:13px" >Keterangan : <?= $_GET['k'] ?></span><br>
                                                <span style="font-size:13px" >Quantity : <?= $_GET['q'] ?> Pcs</span><br>
                                            </div>
                                            <hr>
                                            <br>
                                            <div class="span12 text-left">
                                                <span style="font-size:13px" id="hargaBarang">Total Harga Barang : <?= number_format($_GET['h'])?></span><br>
                                                <span style="font-size:13px" id="ongkosKirim"></span> <br>
                                                <br>
                                                <div style="background-color:darkgreen;color:white;font-size:15px">
                                                    <p><b>No Transaksi</b> <br><h3> <?= $noTransaksi ?> </h3></p>
                                                    <p>1. Jika melakukan transfer manual, Masukan nomor tersebut dalam kolom berita</p>
                                                    <p>2. Simpan nomor transaksi tersebut untuk melakukan pengecekan pembelian Anda</p>
                                                </div>
                                                <input type="hidden" name="total" id="totalPembayaran">
                                                <br>
                                                <p><h4 id="totalSeluruhPembayaran"></h4></p>
                                            </div>
                                        </div>
                                    </div>		

                                    <div class="row-fluid" id="errorCheckout">
                                        
                                    </div>			
                                    <br>
                                    <button style="display:none;margin:auto" id="btnConfirm" type="submit" class="btn btn-inverse">Confirm order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>	
            </form>	
        </div>  
    </div>
</section>

<script src="<?php echo asset_url();?>shopper/js/custom.js"></script>