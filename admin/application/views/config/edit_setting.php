<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Configuration</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form enctype="multipart/form-data" action="<?=base_url()?>config/update" method="post">
        <div class="row">
            <div class="col-6">
                    <input type="hidden" name='id' value="<?=$config->id_config?>">
                    <div class="form-group">
                        <label for="nperusahaan">Nama Perusahaan</label>
                        <input name="nperusahaan" value="<?=$config->n_perusahaan?>" type="text" class="form-control" placeholder="Nama Perusahaan" required>
                    </div>
                    <div class="form-group">
                        <label for="altperusahaan">Alamat Perusahaan</label>
                        <textarea class="form-control" name="altperusahaan"><?=$config->alt_perusahaan?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input name="phone" type="tel" class="form-control" value="<?=$config->phone?>" placeholder="02112345678">
                    </div>
                    <div class="form-group">
                        <label for="hp">Handphone (Whatsapp)</label>
                        <input name="hp" type="tel" class="form-control" value="<?=$config->hp?>" placeholder="081234567890">
                    </div>
                    
                    <hr>
            </div>

            <div class='col-6'>
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input name="email" type="email" class="form-control" value="<?=$config->email?>" placeholder="example@info.com">
                    <i>*Akan digunakan pada Contact</i>
                </div>
                
                <div class="form-group">
                    <label for="singkatan">Nama Singkatan</label>
                    <input name="singkatan" type="text" value="<?=$config->sing_perusahaan?>" class="form-control" placeholder="Nama Singkatan Perusahaan">
                </div>  

                <div class="form-group">
                    <label for="logo">Logo Perusahaan</label><br>
                    <img src="<?=base_url()?>../public/image/<?=$config->logo?>" width="90px"><br>
                    <input type="hidden" name='namelogo' value="<?=$config->logo?>">
                    <input class="form-control" name="filelogo" type="file">
                </div>
            </div>
            <hr>
            <div class="col-12">
                <div class="form-group">
                    <label for="contact">Contact Us (Page Contact)</label>
                    <textarea class="form-control" id = 'contact' name="contact"><?=$config->contact?></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="about">About Us (Page About)</label>
                    <textarea class="form-control" id = 'about' name="about"><?=$config->about?></textarea>
                </div>
            </div>
            <!-- <div class='col-12'>
                <div class="form-group">
                    <label for="Keterangan">Default Keterangan</label>
                    <textarea class="form-control" id = 'keterangan' name="keterangan">
                    <?php $keterangan = json_decode($config->d_keterangan);?>
                    <?php $no = 1; foreach ($keterangan as $value) { ?>
                        <?php if ($value != "") { ?>
                            <p><?= preg_replace('/<p>|<\/p>/','',htmlspecialchars_decode($value)) ?></p>
                        <?php } ?>
                    <?php } ?>
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="featuretop">Feature Top</label>
                    <textarea class="form-control" id = 'top' name="featuretop"><?=$config->feature_top?></textarea>
                </div>
                <div class="form-group">
                    <label for="featurecenter">Feature Center</label>
                    <textarea class="form-control" id = 'center' name="featurecenter"><?=$config->feature_center?></textarea>
                </div>
                <div class="form-group">
                    <label for="featurebottom">Feature Bottom</label>
                    <textarea class="form-control" id = 'bottom' name="featurebottom"><?=$config->feature_bottom?></textarea>
                </div>
            </div> -->
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

<script>
    $( document ).ready(function() {
        CKEDITOR.replace( 'top' );
        CKEDITOR.replace( 'center' );
        CKEDITOR.replace( 'bottom' );
        CKEDITOR.replace( 'about' );
        CKEDITOR.replace( 'contact' );
    })
</script>