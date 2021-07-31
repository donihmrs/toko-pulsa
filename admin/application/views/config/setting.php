<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Configuration</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form enctype="multipart/form-data" action="<?=base_url()?>config/save" method="post">
        <div class="row">
            <div class="col-6">
                    <div class="form-group">
                        <label for="nperusahaan">Nama Perusahaan</label>
                        <input name="nperusahaan" type="text" class="form-control" placeholder="Nama Perusahaan" required>
                        <i>*Akan digunakan pada Contact</i>
                    </div>
                    <div class="form-group">
                        <label for="altperusahaan">Alamat Perusahaan</label>
                        <textarea class="form-control" name="altperusahaan"></textarea>
                        <i>*Akan digunakan pada Contact</i>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telepon</label>
                        <input name="phone" type="tel" class="form-control" placeholder="02112345678">
                        <i>*Akan digunakan pada Contact</i>
                    </div>

                    <div class="form-group">
                        <label for="hp">Handphone (Whatsapp)</label>
                        <input name="hp" type="tel" class="form-control" placeholder="081234567890">
                        <i>*Akan digunakan pada Contact</i>
                    </div>
                    
                    <hr>
            </div>

            <div class='col-6'>
                <div class="form-group">
                    <label for="email">E-Mail</label>
                    <input name="email" type="email" class="form-control" placeholder="example@info.com">
                    <i>*Akan digunakan pada Contact</i>
                </div>
                
                <div class="form-group">
                    <label for="singkatan">Nama Singkatan Perusahaan</label>
                    <input name="singkatan" type="text" class="form-control" placeholder="Nama Singkatan Perusahaan">
                </div>  

                <div class="form-group">
                    <label for="logo">Logo Perusahaan</label><br>
                    <input class="form-control" name="filelogo" type="file">
                    <i>*Akan digunakan pada Template</i>

                </div>
            </div>
            
            <hr>

            <div class="col-12">
                <div class="form-group">
                    <label for="contact">Contact Us (Page Contact)</label>
                    <textarea class="form-control" id = 'contact' name="contact"></textarea>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label for="about">About Us (Page About)</label>
                    <textarea class="form-control" id = 'about' name="about"></textarea>
                </div>
            </div>

            <!-- <div class='col-12'>
                <div class="form-group">
                    <label for="Keterangan">Default Keterangan</label>
                    <textarea class="form-control" id = 'keterangan' name="keterangan"></textarea>
                </div>

                <div class="form-group">
                    <label for="featuretop">Feature Top</label>
                    <textarea class="form-control" id = 'top' name="featuretop"></textarea>
                </div>
                <div class="form-group">
                    <label for="featurecenter">Feature Center</label>
                    <textarea class="form-control" id = 'center' name="featurecenter"></textarea>
                </div>
                <div class="form-group">
                    <label for="featurebottom">Feature Bottom</label>
                    <textarea class="form-control" id = 'bottom' name="featurebottom"></textarea>
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