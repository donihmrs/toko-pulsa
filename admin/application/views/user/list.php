<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Management User</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="col-12">
            <a href="<?=base_url()?>admin/adduser">
                <button class="btn btn-success">Add User</button>
            </a>
            <hr>
            <table id="dataTable" class="text-center table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>E-mail</th>
                        <th>Grant</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($users->num_rows() != 0) { ?>
                        <?php $no = 1;?>
                        <?php foreach ($users->result() as $user) { ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td><?=$user->username?></td>
                                <td><?=$user->nama?></td>
                                <td><?=$user->email?></td>
                                <td><?php switch ($user->level) {
                                    case 2:
                                        echo '<span class="badge badge-primary">Manager</span>';
                                        break;
                                    case 3:
                                        echo '<span class="badge badge-warning">Editor</span>';
                                        break;
                                    case 4:
                                        echo '<span class="badge badge-info">Creator</span>';
                                        break;
                                    default:
                                        echo '<span class="badge badge-danger">Guest</span>';
                                    break;
                                }?></td>
                                <td>
                                    <a href="<?=base_url()?>admin/edituser/<?=$user->id_users?>">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        
                                    </a>
                                    <a href="<?=base_url()?>admin/deluser/<?=$user->id_users?>">
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <td class='text-center' colspan='6'>Data User Not Found</td>
                    <?php } ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>E-mail</th>
                        <th>Grant</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
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

<script src="<?php echo asset_url();?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo asset_url();?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo asset_url();?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script>
    $( document ).ready(function() {
        $("#dataTable").DataTable({
        "responsive": true,
        "autoWidth": false,
        });
    })
</script>