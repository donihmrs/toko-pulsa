<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Configuration</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <div class="col-6">
                <form enctype="multipart/form-data" id="form1" action="<?=base_url()?>barang/update" method="post">
                    <input type="hidden" value="<?= $barang->id_barang?>" name="id">
                    <div class="form-group">
                        <label for="n_barang">Nama Barang</label>
                        <input form="form1" name="n_barang" value="<?=$barang->n_barang?>" type="text" class="form-control" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori barang</label>
                        <select form="form1" class="form-control" name='kategori' required>
                            <option value=''>- Pilih Kategori Barang -</option> 
                            <?php foreach ($kategoris as $value) { ?>
                                <option value='<?=$value->id_kategori?>' <?php echo ($barang->id_kategori == $value->id_kategori) ? "selected" : "" ?>><?=$value->n_kategori?></option> 
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code">Code Barang (Harus Unik)</label>
                        <input form="form1" name="code" value="<?=$barang->code?>" type="text" class="form-control" placeholder="Code Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat Barang (gram)</label>
                        <input form="form1" name="berat" type="number" class="form-control" value="<?=$barang->berat?>" placeholder="Hitungan Gram" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Barang (Gambar Utama)</label><br>
                        <?php if ($barang->gambar != NULL) { ?>
                        <img src="<?=base_url()?>../public/image/<?=$barang->gambar?>" width="90px">
                        <?php } else { ?>
                            Gambar belum di upload
                        <?php } ?>
                        <input form="form1" type="hidden" name='namegambar' value="<?=$barang->gambar?>">
                        <input form="form1" class="form-control" name="gambar" type="file">
                    </div>
            </div>

            <div class='col-6'>
                <div class="form-group">
                    <label for="permalink">Permalink</label>
                    <input form="form1" name="permalink" value="<?=$barang->permalink?>" type="text" class="form-control" placeholder="Example : system-pos" required>
                </div>
                <?php if ($this->session->userdata('level') == 1) { ?>
                    <div class="form-group">
                        <label for="harga">Harga (Satuan)</label>
                        <input form="form1" name="harga" value="<?=$barang->harga?>" type="number" class="form-control" placeholder="0" required>
                    </div>  
                <?php } ?>
                <div class="form-group">
                    <form enctype="multipart/form-data" id="formTambahGambar">
                        <label for="gambar">Tambah Gambar Barang</label><br>
                        <input id="idbarang" type="hidden" value="<?= $barang->id_barang?>" name="id">
                        <input class="form-control" id ="gambarOther" name="gambarOther" type="file">
                        <span id="spanUpload"></span>
                        <br>
                        <?php if ($gambars != []) { ?>
                            <div class="row col-12">
                            <?php foreach ($gambars->result() as $val) { ?>
                                <div class="col-2">
                                    <img src="<?=base_url()?>../public/image/<?=$val->file?>" width="100%">
                                    <a href="<?=base_url()?>barang/deleteGambar/<?=$val->id_gambar?>">Hapus</a>
                                </div>
                            <?php } ?>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Barang</label><br>
                    <textarea form="form1" rows=6 name="deskripsi" id="deskripsi" class="form-control"><?=$barang->deskripsi?></textarea>
                </div>
            </div>

            <h4 class="pl-3">
                - SEO MANAGEMENT -
            </h4>

            <hr>

            <div class="col-12">
                <div class="form-group">
                    <label for="meta_title">Meta Title</label><br>
                    <i>*Direkomendasikan 75 Karakter</i>
                    <textarea form="form1" rows=2 name="meta_title" id="meta_title" class="form-control"><?=$barang->meta_title?></textarea>
                </div>
                
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="keyword">Keyword</label><br>
                    <i>*Example: jual,barang,system,software,pos</i>
                    <textarea form="form1" rows=2 name="keyword" id="keyword" class="form-control"><?=$barang->keyword?></textarea>
                </div>
                
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="meta_deskripsi">Meta Deskripsi</label><br>
                    <i>*Direkomendasikan 160 Karakter</i>
                    <textarea form="form1" rows=2 name="meta_deskripsi" id="meta_deskripsi" class="form-control"><?=$barang->meta_deskripsi?></textarea>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="kategori">Feature Barang</label>
                    <select form="form1" class="form-control" name='feature' required>
                        <option value=''>- Jadikan Barang ini feature ? -</option> 
                        <option value='1' <?php echo ($barang->feature == 1) ? "selected" : "" ?>>Yes</option>
                        <option value='0' <?php echo ($barang->feature == 0) ? "selected" : "" ?>>No</option>
                    </select>
                </div>
            </div>

                
            <hr>
            <div class="col-12">
                <input type="submit" id="submitForm" form="form1" class="btn btn-primary" value="Save">
            </div>
            </form>
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

<script src="<?php echo asset_url();?>plugins/ckeditor/ckeditor.js"></script>

<script>
    $( document ).ready(function() {
        CKEDITOR.replace( 'deskripsi' );

        $("#gambarOther:file").change(function (){
            $.ajax({
                url:'<?php echo base_url();?>barang/uploadGambar',
                type:"post",
                data:new FormData($('#form1')[0]),
                dataType: 'json',
                processData: false,
                contentType: false,
                beforeSend: function(data) {
                    $('#spanUpload').html("<b>Proses Upload File</b>")
                },
                complete:function() {
                    $('#gambarOther').val("")
                },
                success: function(data){
                    $('#spanUpload').html("<b>Upload Image Berhasil. <br> Jika sudah di upload semua gambar, silakan reload browser</b>");
                },
                error : function (err) {
                    $('#spanUpload').html("<b>Gagal Upload Image, Hubungi Administrator</b>")
                }
            });
        });
    })
</script>