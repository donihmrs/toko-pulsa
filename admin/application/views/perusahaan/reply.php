<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Reply <?=ucfirst($halaman)?> - <?= $penawaran->kantor ?></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form enctype="multipart/form-data" action="<?=base_url()?>penawaran/savechildpenawaran" method="post">
        <div class="row">
            <div class="col-6">
                    <input type="hidden" name="id" id='id_penawaran' value="<?= $penawaran->id_penawaran ?>">
                    <div class="form-group">
                        <label for="kantor">Nama Perusahaan</label>
                        <input name="kantor" type="text" value="<?= $penawaran->kantor ?>" class="form-control" placeholder="Nama Proyek" required>
                    </div>
                    <div class="form-group">
                        <label for="proyek">Nama Proyek</label>
                        <input name="proyek" type="text" value="<?= $penawaran->proyek ?>" class="form-control" placeholder="Nama Proyek" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" required><?= $penawaran->alamat ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="komentar">Komentar</label>
                        <textarea name="komentar" class="form-control" required></textarea>
                    </div>
            </div>
            <div class="col-6">    
                <div class="form-group">
                    <label for="pic">Nama Pic</label>
                    <input name="pic" type="text" class="form-control" value="<?= $penawaran->pic ?>" placeholder="Nama PIC" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telephone/HP</label>
                    <input name="phone" type="tel" class="form-control" value="<?= $penawaran->phone ?>" placeholder="Telephone / HP Di Tempat" required>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input name="email" type="email" class="form-control" value="<?= $penawaran->email ?>" placeholder="Email PIC" required>
                </div>
                <div class="form-group">
                    <label>Input File (Optional)</label>
                    <input class="form-control" name="uploadfile[]" type="file" multiple>
                </div>
            </div>
            <input type='hidden' name='rowBarang' id='lengthRow' value='0'>
            <div class="col-12">
                <div class="form-group">
                    <label for="keterangan">Keterangan lainnya</label><br>
                    <i>*Gunakan baris baru untuk memisahkan keterangan</i>
                    <textarea name="keterangan" id="keterangan" rows='6' class="form-control" required>
                    <?php $keterangan = json_decode($penawaran->keterangan);?>
                    <?php foreach ($keterangan as $value) { ?>
                        <?php if ($value != "" && $value != "\r") { ?>
                            <?=$value?>
                        <?php } ?>
                    <?php } ?>
                    </textarea>
                </div>
            </div>
            <hr>
            <div class="col-12">
                <div class="form-group">
                    <label for="barang">Input Barang</label><span style="cursor: pointer" id='btnAdd' class='ml-3 btn btn-sm btn-success'><i class="nav-icon fas fa-plus"></i></span>
                    <br><i>Klik <b>'+'</b> untuk menambahkan barang yang ditawarkan</i>
                    <hr>
                    <div class='row'>
                        <div class='col-2'>
                            <label for='kategori'>Pilih Kategori</label>
                        </div>
                        <div class='col-3'>
                            <label for='barang'>Pilih Barang</label>
                        </div>
                        <div class='col-1'>
                            <label for='quantity'>Quantity</label>
                        </div>
                        <div class='col-1'>
                            <label for='diskon'>Diskon (%)</label>
                        </div>
                        <div class='col-2'>
                            <label for='nett'>Harga Nett</label>
                        </div>
                        <div class='col-2'>
                            <label for='total'>Total</label>
                        </div>
                        <div class='col-1'>
                            <label for='hapus'>Hapus</label>
                        </div>
                    </div>
                    <br><span id="rowBarang"></span>
                </div>
                <p><b>Total Diskon : Rp. <span id='textTotalDiskon'><?= number_format($penawaran->total_diskon)?></span></b></p>
                <p><b>Total Keseluruhan : Rp. <span id='textTotalHarga'><?= number_format($penawaran->total_harga) ?></span> </b></p>
                <hr>
            </div>
            <input type='hidden' readonly name='totalDiskon' id='totalDiskon' value='<?= $penawaran->total_diskon?>'>
            <input type='hidden' readonly name='totalHarga' id='totalHarga' value='<?=$penawaran->total_harga ?>'>

            <input type="submit" class="btn btn-primary" value="Save">
        </div>
        </form>
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

<script src="<?php echo asset_url();?>plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo asset_url();?>js/childpen.js"></script>



<script>
    $( document ).ready(function() {
        CKEDITOR.replace( 'keterangan',{
            on :
            {
                instanceReady : function( ev )
                {
                    // Output paragraphs as <p>Text</p>.
                    this.dataProcessor.writer.setRules( 'p',
                        {
                            indent : false,
                            breakBeforeOpen : true,
                            breakAfterOpen : false,
                            breakBeforeClose : false,
                            breakAfterClose : true
                        });
                }
            }
        });
        
    })
</script>