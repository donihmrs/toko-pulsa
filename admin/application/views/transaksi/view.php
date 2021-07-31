<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Nomor Transaksi - <?=$transaksi->no_transaksi?></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <?php $pembayaran= ""; switch ($transaksi->pembayaran) {
                case '1':
                    $pembayaran = "Transfer Manual";
                    break;
                case '2':
                    $pembayaran = "Virtual Account";
                    break;
                case '3':
                    $pembayaran = "OVO";
                    break;
                
                default:
                    $pembayaran = "Not Found";
                    break;
            }
            ?>

            <?php 
                $status = "";
                switch ($transaksi->status) {
                    case '1':
                        $status = "Menunggu Pembayaran";
                        break;
                    case '2':
                        $status = "Transaksi di proses";
                        break;
                    case '3':
                        $status = "Pengiriman Barang dengan nomor Resi ".$transaksi->resi." - ".strtoupper($transaksi->ongkir).".";
                        break;
                    case '4':
                        $status = "Transaksi selesai";
                        break;
                    case '5':
                        $status = "Sudah melakukan pembayaran";
                        break;
                    case '0':
                        $status = "Transaksi dibatalkan";
                        break;
                    
                    default:
                        $status = "Transaksi tidak ditemukan";
                        break;
                }
            ?>
            <div class="col-4">
                <h5><b><?=$status?></b></h5>
                <br>

                <p>Nama Kustomer : <?=$transaksi->nama?></p>
                <p>Handphone : <?=$transaksi->hp?></p>
                <p>Email : <?=$transaksi->email?></p>
                <p>Alamat : <?=$transaksi->alamat?></p>
                <p>Kota : <?=$transaksi->kota?></p>
                <p>Provinsi : <?=$transaksi->provinsi?></p>
                <p>Kode Pos : <?=$transaksi->kodepos?></p>
            </div>
            <div class="col-3">
                <p>Ongkir : <?=strtoupper($transaksi->ongkir)?> - <?=$transaksi->service?></p>
                <p>Biaya Ongkir : Rp. <?=number_format($transaksi->harga_ongkir)?></p>
                <p>Berat Barang : <?=$transaksi->berat?> gram</p>
                <hr>
                <p>Metode Pembayaran : <?=$pembayaran?></p>
                <?php if ($transaksi->pembayaran == 1) { ?>
                <p>Nama Bank : <?= $bank->nama_bank?></p>
                <p>No Rekening : <?= $bank->rekening?></p>
                <p>Atas Nama : <?= $bank->pemilik?></p>
                <p>Cabang : <?= $bank->cabang?></p>
                <?php } else { ?>
                <p>Account : <?= $transaksi->opt_pembayaran?></p>
                <?php } ?>
            </div>
            <div class="col-2">
                <img src="<?=str_replace("admintdc","",base_url())?>public/image/<?=$transaksi->gambar?>" alt="<?= str_replace(" ","-",$transaksi->n_barang)?>" width="70%" />
            </div>
            <div class="col-3">
                <p>Nama Barang : <?= $transaksi->n_barang?></p> 
                <p>Code Barang : <?= $transaksi->code?></p> 
                <p>Keterangan : <?= $transaksi->keterangan?></p> 
                <p>Quantity : <?= $transaksi->qty?> Pcs</p> 
                <p>Harga Barang (satuan) : Rp. <?=number_format($transaksi->harga)?></p>
            </div>
        </div>
        <br>

        <div class="row">
            <div class="col-4">
                <h4>Total Transaksi : Rp. <?=number_format($transaksi->total)?></h4>
            </div>
            <?php if ($transaksi->status != 4) { ?>
                <div class="col-4 text-left">
                    <form method="POST" action="<?=base_url()?>transaksi/updateStatus">
                        <input type="hidden" name="nomor" value="<?=$transaksi->no_transaksi?>">
                        <select name="status" class="form-control">
                            <option value="">- Pilih Status Transaksi -</option>
                            <?php if ($transaksi->status != 3 && $transaksi->status != 4 ) { ?>
                                <option value="1">Menunggu Pembayaran</option>
                                <option value="5">Pembayaran Valid</option>
                                <option value="2">Pesanan Diproses</option>
                                <option value="0">Pembatalan Transaksi</option>
                            <?php } ?>
                            <?php if ($transaksi->status == 3 ) { ?>
                                <option value="4">Transaksi Selesai</option>
                            <?php } ?>
                        </select>
                        <br>
                        <input type="submit" class="btn btn-success" value="Update Status Transaksi">
                    </form>
                </div>
            <?php } ?>
        </div>
        <!-- /.row -->
        </div>
        <!-- ./card-body -->
        <div class="card-footer">
        <div class="row">
            
        </div>
        <!-- /.row -->
        </div>
        <!-- /.card-footer -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
</div>