<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Management Kategori</h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="col-12">
            <a href="<?=base_url()?>kategori/add">
                <button class="btn btn-success">Add Kategori</button>
            </a>
            <hr>
            <table id="dataTable" class="text-center table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($kategoris->num_rows() != 0) { ?>
                        <?php $no = 1;?>
                        <?php foreach ($kategoris->result() as $kategori) { ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td><?=$kategori->n_kategori?></td>
                                <td>
                                    <a href="<?=base_url()?>kategori/edit/<?=$kategori->id_kategori?>">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <td class='text-center' colspan='6'>Data Kategori Not Found</td>
                    <?php } ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
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