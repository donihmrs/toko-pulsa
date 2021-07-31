<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Media Sosial</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <div class="col-6">
                <form action="<?=base_url()?>media/save" method="post">
                    <div class="form-group">
                        <label for="type">Type Media Sosial</label>
                        <select name="type" class="form-control" >
                            <option value="">-- Pilih Media Sosial --</option>
                            <option value="facebook">Facebook</option>
                            <option value="twitter">Twitter</option>
                            <option value="instagram">Instagram</option>
                            <option value="youtube">Youtube</option>
                            <option value="google">Google Plus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input name="link" type="url" class="form-control" placeholder="Contoh : https://faceboo.com/profile/" required>
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