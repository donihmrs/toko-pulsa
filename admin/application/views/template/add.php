<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add <?=$halaman?></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form action="<?=base_url()?>template/save" method="post">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label for="type">Type Position</label>
                    <select name="type" class="form-control" >
                        <option value="">-- Pilih Posisi Template --</option>
                        <option value="header">Header (Top)</option>
                        <option value="center">Center</option>
                        <option value="footer">Footer (Bottom)</option>
                        <option value="footerleft">Footer-Left (Bottom-Left)</option>
                        <option value="footercenter">Footer-Center (Bottom-Center)</option>
                        <option value="footerright">Footer-Right (Bottom-Right)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Nama Posisi</label>
                    <input name="name" type="text" class="form-control" placeholder="Contoh : Top Header Template" required>
                </div>
                
                <div class="form-group">
                    <label for="link">Link Button</label>
                    <input name="link_button" type="url" class="form-control" placeholder="Contoh : https://example.com/product" required>
                </div>
                <div class="form-group">
                    <label for="name">Text Button</label>
                    <input name="text_button" type="text" class="form-control" placeholder="Contoh : All Product" required>
                </div>
                <div class="form-group">
                    <label for="name">Footer</label>
                    <textarea class="form-control" id = 'footer' name="footer"></textarea>
                </div>
            </div>
            <div class = "col-6">
                <div class="form-group">
                    <label for="name">Title</label>
                    <textarea class="form-control" id = 'title' name="title"></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Body</label>
                    <textarea class="form-control" id = 'body' name="body"></textarea>
                </div>
                
            </div>
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
        CKEDITOR.replace( 'title' );
        CKEDITOR.replace( 'body' );
        CKEDITOR.replace( 'footer' );
    })
</script>