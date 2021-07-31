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
                <form action="<?=base_url()?>admin/saveuser" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" type="text" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input name="nama" type="text" class="form-control" placeholder="Nama Anda" required>
                    </div>
                    <hr>
                    <input type="submit" class="btn btn-primary" value="Save">
            </div>
            <div class="col-6">    
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input name="email" type="email" class="form-control" placeholder="Email Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="level">Level User</label>
                        <select name="level" class="form-control" >
                            <option value="">-- Pilih Level --</option>
                            <option value="2">Manager</option>
                            <option value="3">Editor</option>
                            <option value="4">Creator</option>
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