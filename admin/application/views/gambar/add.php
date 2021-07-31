<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Gambar</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <div class="col-6">
                <form enctype="multipart/form-data" action="<?=base_url()?>gambar/save" method="post">
                    <div class="form-group">
                        <label for="type">Posisi Gambar</label>
                        <select name="type" class="form-control" >
                            <option value="">-- Pilih Posisi Gambar --</option>
                            <option value="top">Top</option>
                            <option value="center">Center</option>
                            <option value="bottom">Bottom</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="image">Gambar Barang</label><br>
                        <input class="form-control" name="image" type="file" required>
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