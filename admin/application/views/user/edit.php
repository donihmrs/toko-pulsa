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
                <form action="<?=base_url()?>admin/updateuser" method="post">
                    <input type="hidden" name='id' value="<?=$users->id_users?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" value="<?=$users->username?>" type="text" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" value="" type="password" class="form-control" placeholder="Password">
                        <i>*Kosongkan password jika tidak ingin mengubah password sebelumnya</i>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama" value="<?=$users->nama?>" type="text" class="form-control" placeholder="Nama Anda" required>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary" value="Save">
            </div>
            <div class="col-6">    
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input name="email" value="<?=$users->email?>" type="email" class="form-control" placeholder="Email Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level User</label>
                        <select name="level" class="form-control" >
                            <option value="">-- Pilih Level --</option>
                            <option value="2" <?php echo ($users->level == 2) ? 'selected' : '' ?>>Manager</option>
                            <option value="3" <?php echo ($users->level == 3) ? 'selected' : '' ?>>Editor</option>
                            <option value="4" <?php echo ($users->level == 4) ? 'selected' : '' ?>>Creator</option>
                            
                        </select>
                    </div>
                    
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