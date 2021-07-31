<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Account</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <div class="col-6">
                <form action="<?=base_url()?>media/update" method="post">
                    <input name="id" type="hidden" value="<?=$media->id_sosial?>" class="form-control" required>

                    <div class="form-group">
                        <label for="type">Type Media Sosial</label>
                        <select name="type" class="form-control" >
                            <option value="">-- Pilih Media Sosial --</option>
                            <option value="facebook" <?php echo ($media->type == "facebook") ? 'selected' : '' ?>>Facebook</option>
                            <option value="twitter" <?php echo ($media->type == "twitter") ? 'selected' : '' ?>>Twitter</option>
                            <option value="instagram" <?php echo ($media->type == "instagram") ? 'selected' : '' ?>>Instagram</option>
                            <option value="youtube" <?php echo ($media->type == "youtube") ? 'selected' : '' ?>>Youtube</option>
                            <option value="google" <?php echo ($media->type == "google") ? 'selected' : '' ?>>Google Plus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input name="link" type="url" value="<?=$media->link?>" class="form-control" placeholder="contoh:https://facebook.com/profile/" required>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Save">
                </form>
            </div>
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