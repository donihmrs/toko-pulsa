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
                <a href="<?=base_url()?>media/add">
                    <button class="btn btn-success">Add <?=$halaman?></button>
                </a>
            <?php } ?>
            
            <hr>
            <table id="dataTable" class="text-center table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Type</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($medias->num_rows() != 0) { ?>
                        <?php $no = 1;?>
                        <?php foreach ($medias->result() as $media) { ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td><?= strtoupper($media->type)?></td>
                                <td><a href="<?=$media->link?>" target="_blank"><?=$media->link?></a></td>
                                <td>
                                    <a href="<?=base_url()?>media/edit/<?=$media->id_sosial?>">
                                        <button class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </a>
                                
                                    <a href="<?=base_url()?>media/delete/<?=$media->id_sosial?>">
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
                        <th>Link</th>
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