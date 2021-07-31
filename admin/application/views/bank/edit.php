<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Add Account Bank</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <div class="col-6">
                <form action="<?=base_url()?>user/updatebank" method="post">
                    <input type="hidden" name='id' value="<?=$bank->id_bank?>">
                    <div class="form-group">
                        <label for="bank">Nama Bank</label>
                        <input name="bank" type="text" value="<?=$bank->nama_bank?>" class="form-control" placeholder="Nama Bank, Contoh : Mandiri" required>
                    </div>
                    <div class="form-group">
                        <label for="rekening">Nomor Rekening</label>
                        <input name="rekening" type="number" value="<?=$bank->rekening?>" class="form-control" placeholder="Nomor Rekening" required>
                    </div>
                    <div class="form-group">
                        <label for="pemilik">Atas Nama Rekening</label>
                        <input name="pemilik" type="text" value="<?=$bank->pemilik?>" class="form-control" placeholder="Contoh : Doni" required>
                    </div>
                    <div class="form-group">
                        <label for="cabang">Kantor Cabang (Bank)</label>
                        <input name="cabang" type="text" value="<?=$bank->cabang?>" class="form-control" placeholder="Contoh : KCP Taman Semanan Indah " required>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary" value="Save">
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