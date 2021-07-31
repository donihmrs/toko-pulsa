<?php 
    $status = "";
    if (isset($transaksi)) {
        switch ($transaksi->status) {
            case '1':
                $status = "Menunggu Pembayaran Terkonfirmasi oleh Admin.";
                break;
            case '2':
                $status = "Transaksi di proses.";
                break;
            case '3':
                $status = "Pengiriman Barang dengan nomor Resi ".$transaksi->resi." - ".strtoupper($transaksi->ongkir).".";
                break;
            case '4':
                $status = "Transaksi selesai.";
                break;
            case '5':
                $status = "Pembayaran sudah valid";
                break;
            case '0':
                $status = "Transaksi dibatalkan, Informasi lanjut dapat hubungi Admin";
                break;
            
            default:
                $status = "Transaksi tidak ditemukan.";
                break;
        }
    }
?>
<section class="main-content">
	<div class="row">						
        <div class="span12">
            <?php
            if (isset($transaksi)) { ?>
                <div class="text-center">
                    <h4>Status Pembelian Anda dengan nomor transaksi <?=$transaksi->no_transaksi?> dalam Status : <?= $status?></h4>
                    <br>
                    <?php if ($transaksi->pembayaran != 1 && $transaksi->status == 1) { ?>
                        <div style="font-size:15px" class="alert alert-success" role="alert">
                            <p>Account Number : <?=$transaksi->accnumber?> (<?=$transaksi->opt_pembayaran?>)</p>
                        </div>  
                    <?php } ?>
                    <?php if ($transaksi->status == 4) { ?>
                        <div style="font-size:15px" class="alert alert-success" role="alert">
                            <h5>Transaksi selesai</h5>
                        </div>  
                    <?php } ?>
                    <div style="font-size:15px" class="alert alert-warning" role="alert">
                        <p>Harap simpan URL di bawah ini , untuk melakukan pengecekan transaksi Anda</p>
                        <b><a href="<?=base_url()?>transaksi/<?=$transaksi->no_transaksi?>"><?=base_url()?>transaksi/<?=$transaksi->no_transaksi?></a></b>
                    </div>  
                </div>
            <?php } else { ?>
                <div class="text-center">
                    <div style="font-size:15px" class="alert alert-danger" role="alert">
                            <h5>No Transaksi Tidak Ditemukan</h5>
                    </div>  
                </div>
            <?php } ?>
        </div>
    </div>
</section>