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
                <form enctype="multipart/form-data" action="<?=base_url()?>user/changeprofile" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" value="<?=$this->session->userdata('user')?>" type="text" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" value="" type="password" class="form-control" placeholder="Password">
                        <i>*Kosongkan password jika tidak ingin mengubah password sebelumnya</i>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama" value="<?=$this->session->userdata('nama')?>" type="text" class="form-control" placeholder="Nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input name="email" value="<?=$this->session->userdata('email')?>" type="email" class="form-control" placeholder="Nama Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="hp">Nomor Handphone</label>
                        <input name="hp" value="<?=$this->session->userdata('hp')?>" type="text" class="form-control" placeholder="Nomor Handphone Anda" required>
                    </div>
                    <hr>
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