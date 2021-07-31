<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Edit <?=$halaman?></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <form action="<?=base_url()?>template/update" method="post">
        <div class="row">
            <input name="id" type="hidden" value="<?=$template->id_template?>" class="form-control">
            <div class="col-6">
                <div class="form-group">
                    <label for="type">Type Position</label>
                    <select name="type" class="form-control" >
                        <option value="">-- Pilih Posisi Template --</option>
                        <option value="header" <?php echo ($template->type == "header") ? 'selected' : '' ?>>Header (Top)</option>
                        <option value="center" <?php echo ($template->type == "center") ? 'selected' : '' ?>>Center</option>
                        <option value="footer" <?php echo ($template->type == "footer") ? 'selected' : '' ?>>Footer (Bottom)</option>
                        <option value="footerleft" <?php echo ($template->type == "footerleft") ? 'selected' : '' ?>>Footer-Left (Bottom-Left)</option>
                        <option value="footercenter" <?php echo ($template->type == "footercenter") ? 'selected' : '' ?>>Footer-Center (Bottom-Center)</option>
                        <option value="footerright" <?php echo ($template->type == "footerright") ? 'selected' : '' ?>>Footer-Right (Bottom-Right)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Nama Posisi</label>
                    <input name="name" value="<?=$template->name?>" type="text" class="form-control" placeholder="Contoh : Top Header Template" required>
                </div>
                
                <div class="form-group">
                    <label for="link">Link Button</label>
                    <input name="link_button" type="url" value="<?=$template->link_button?>" class="form-control" placeholder="Contoh : https://example.com/product" required>
                </div>
                <div class="form-group">
                    <label for="name">Text Button</label>
                    <input name="text_button" value="<?=$template->text_button?>" type="text" class="form-control" placeholder="Contoh : All Product" required>
                </div>
                <div class="form-group">
                    <label for="name">Footer</label>
                    <textarea class="form-control" id = 'footer' name="footer"><?= htmlspecialchars_decode($template->footer) ?></textarea>
                </div>
            </div>
            <div class = "col-6">
                <div class="form-group">
                    <label for="name">Title</label>
                    <textarea class="form-control" id = 'title' name="title"><?= htmlspecialchars_decode($template->title) ?></textarea>
                </div>
                <div class="form-group">
                    <label for="name">Body</label>
                    <textarea class="form-control" id = 'body' name="body"><?= htmlspecialchars_decode($template->body) ?></textarea>
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