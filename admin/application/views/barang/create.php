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
                <form enctype="multipart/form-data" action="<?=base_url()?>barang/save" method="post">
                    <div class="form-group">
                        <label for="n_barang">Nama Barang</label>
                        <input name="n_barang" type="text" class="form-control" placeholder="Nama Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori barang</label>
                        <select class="form-control" name='kategori' required>
                            <option value=''>- Pilih Kategori Barang -</option> 
                            <?php foreach ($kategoris as $value) { ?>
                                <option value='<?=$value->id_kategori?>'><?=$value->n_kategori?></option> 
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="code">Code Barang (Harus Unik)</label>
                        <input name="code" type="text" class="form-control" placeholder="Code Barang" required>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat Barang (gram)</label>
                        <input name="berat" type="number" value="1000" class="form-control" placeholder="Hitungan Gram" required>
                    </div>
            </div>

            <div class='col-6'>
                <div class="form-group">
                    <label for="permalink">Permalink</label>
                    <input name="permalink" type="text" class="form-control" placeholder="Example : system-pos" required>
                </div>
                <div class="form-group">
                    <label for="harga">Harga (Satuan)</label>
                    <input name="harga" type="number" class="form-control" placeholder="0" required>
                </div>  
                <div class="form-group">
                    <label for="gambar">Gambar Barang (Multiple Upload)</label><br>
                    <small>Tekan dan tahan Ctrl + Pilih File Gambar</small>
                    <input class="form-control" multiple="true" name="gambar[]" type="file">
                </div>
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi Barang</label><br>
                    <textarea rows=6 name="deskripsi" id="deskripsi" class="form-control"></textarea>
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
                    <textarea rows=2 name="meta_title" id="meta_title" class="form-control"></textarea>
                </div>
                
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="keyword">Keyword</label><br>
                    <i>*Example: jual,barang,system,software,pos</i>
                    <textarea rows=2 name="keyword" id="keyword" class="form-control"></textarea>
                </div>
                
            </div>

            <div class="col-12">
                <div class="form-group">
                    <label for="meta_deskripsi">Meta Deskripsi</label><br>
                    <i>*Direkomendasikan 160 Karakter</i>
                    <textarea rows=2 name="meta_deskripsi" id="meta_deskripsi" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label for="kategori">Feature Barang</label>
                    <select class="form-control" name='feature' required>
                        <option value=''>- Jadikan Barang ini feature ? -</option> 
                        <option value='1'>Yes</option>
                        <option value='0'>No</option>
                    </select>
                </div>
            </div>

                
            <hr>
            <div class="col-12">
            <input type="submit" class="btn btn-primary" value="Save">
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
    })
</script>