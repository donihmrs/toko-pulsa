<section class="main-content">
	<div class="row">						
        <?php if ($_GET['metode'] == "virtual") { ?>
            <div class="span12">
                <div style="font-size:15px" class="alert alert-success" role="alert">
                    <h4>Transaksi Virtual Account</h4>
                    <br>
                    Silahkan tranfer melalui Virtual Account <?= strtoupper($_GET['akun'])?> <span id="inputVa"><b><?= $_GET['transfer']?></b></span>
                    Dan Nomor Transaksi Anda <b><?=$_GET['no']?></b> (Harap simpan nomor transaksi untuk pengecekan status pembelian Anda).
                </div>

                <div style="font-size:15px" class="alert alert-warning" role="alert">
                    <p>Harap simpan URL di bawah ini , untuk melakukan pengecekan transaksi Anda</p>
                    <b><a href="<?=base_url()?>transaksi/<?=$_GET['no']?>"><?=base_url()?>transaksi/<?=$_GET['no']?></a></b>
                </div> 

                <br>
                <a href="<?=base_url()?>transaksi/<?=$_GET['no']?>"><button class="btn btn-info">Cek Status Transaksi</button></a>
                <button onclick="copyVa()" class="btn btn-success">Copy Virtual Account</button>
            </div>
        <?php } else if ($_GET['metode'] == "ovo") { ?>
            <div class="span12">
                <div style="font-size:15px" class="alert alert-success" role="alert">
                    <h4>Transaksi OVO</h4>
                    <br>
                    Silahkan check applikasi OVO dan buka Notifikasi untuk melakukan konfirmasi pembayaran pada nomor OVO <?= $_GET['hp'] ?> <b>(Transaksi hanya berlaku 30 detik)</b>
                    <br>
                    Dan Nomor Transaksi Anda <b><?=$_GET['no']?></b> (Harap simpan nomor transaksi untuk pengecekan status pembelian Anda).
                </div>

                <div style="font-size:15px" class="alert alert-warning" role="alert">
                    <p>Harap simpan URL di bawah ini , untuk melakukan pengecekan transaksi Anda</p>
                    <b><a href="<?=base_url()?>transaksi/<?=$_GET['no']?>"><?=base_url()?>transaksi/<?=$_GET['no']?></a></b>
                </div> 

                <br>
                <a href="<?=base_url()?>transaksi/<?=$_GET['no']?>"><button class="btn btn-info">Cek Status Transaksi</button></a>
            </div>
        <?php } else if ($_GET['metode'] == "transfer") { ?>
            <div class="span12">
                <div style="font-size:15px" class="alert alert-success" role="alert">
                    <h4>Transaksi Transfer Manual</h4>
                    <br>
                    Silahkan Transfer pembayaran ke Nomor Rekening <?= strtoupper($_GET['akun'])?> - <b><?= $_GET['transfer']?></b> A.n <?= $_GET['nama'] ?> - Cabang <?= $_GET['cabang'] ?> 
                    <br>
                    Dan Cantumkan Nomor Transaksi <b><?=$_GET['no']?></b> pada berita acara.<br> (Harap simpan nomor transaksi untuk pengecekan status pembelian Anda).
                </div>

                <div style="font-size:15px" class="alert alert-warning" role="alert">
                    <p>Harap simpan URL di bawah ini , untuk melakukan pengecekan transaksi Anda</p>
                    <b><a href="<?=base_url()?>transaksi/<?=$_GET['no']?>"><?=base_url()?>transaksi/<?=$_GET['no']?></a></b>
                </div> 

                <br>
                <a href="<?=base_url()?>transaksi/<?=$_GET['no']?>"><button class="btn btn-info">Cek Status Transaksi</button></a>
            </div>
        <?php } else {
            header("location:".base_url());
        } ?>
    </div>
</section>

<script>
    function copyVa() {
        /* Get the text field */
        var copyText = document.getElementById("inputVa");
        console.log(copyText.textContent)
        var textArea = document.createElement("textarea");
        textArea.value = copyText.textContent;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand("Copy");
        textArea.remove();
        alert("Copied the text: " + copyText.textContent);
    }
</script>