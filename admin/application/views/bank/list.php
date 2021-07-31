<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Management Account Bank</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="col-12">
            <a href="<?=base_url()?>user/addbank">
                <button class="btn btn-success">Add Account Bank</button>
            </a>
            <hr>
            <table id="dataTable" class="text-center table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Bank</th>
                        <th>No Rekening</th>
                        <th>A.n</th>
                        <th>Cabang</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($banks->num_rows() != 0) { ?>
                        <?php $no = 1;?>
                        <?php foreach ($banks->result() as $user) { ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td><?=$user->nama_bank?></td>
                                <td><?=$user->rekening?></td>
                                <td><?=$user->pemilik?></td>
                                <td><?=$user->cabang?></td>
                                <td>
                                    <a href="<?=base_url()?>user/editbank/<?=$user->id_bank?>">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        
                                    </a>
                                    <a href="<?=base_url()?>user/delbank/<?=$user->id_bank?>">
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <td class='text-center' colspan='6'>Data Account Bank Not Found</td>
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