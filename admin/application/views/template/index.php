<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Management <?=$halaman?></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="col-12">
            <?php if ($this->session->userdata('level') == 1) { ?>
                <a href="<?=base_url()?>template/add">
                    <button class="btn btn-success">Add <?=$halaman?></button>
                </a>
            <?php } ?>
            
            <hr>
            <table id="dataTable" class="text-center table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($templates->num_rows() != 0) { ?>
                        <?php $no = 1;?>
                        <?php foreach ($templates->result() as $template) { ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td><?= strtoupper($template->type)?></td>
                                <td><?= $template->name ?></td>
                                <td><?= htmlspecialchars_decode($template->title) ?></td>
                                <td>
                                    <a href="<?=base_url()?>template/edit/<?=$template->id_template?>">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                
                                    <a href="<?=base_url()?>template/delete/<?=$template->id_template?>">
                                        <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <td class='text-center' colspan='6'>Data Barang Not Found</td>
                    <?php } ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Content</th>
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