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
                <div class='row'>
                    <a href="<?=base_url()?>barang/add">
                        <button class="btn btn-sm btn-success mr-2">Add <?=$halaman?></button>
                    </a>
                    <form enctype="multipart/form-data" action="<?=base_url()?>barang/export" method="get">
                        <input type="submit" value="Export Excel" class="btn btn-sm btn-success">
                    </form>
                </div>
            
                <div class="float-right">
                    <form enctype="multipart/form-data" action="<?=base_url()?>barang/import" method="post">
                        <label for="filePrice">File Price List</label>
                        <input name="filePrice" type="file">

                        <input type="submit" value="Import Price List" class="btn btn-sm btn-info">
                        <i>*Pastikan format excel sudah sesuai</i>
                    </form>
                </div>
            <?php } ?>
            
            <hr>
            <table id="dataTable" class="text-center table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Code</th>
                        <th>Nama Barang</th>
                        <th>Gambar</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($barangs->num_rows() != 0) { ?>
                        <?php $no = 1;?>
                        <?php foreach ($barangs->result() as $barang) { ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td><?=$barang->n_kategori?></td>
                                <td><?=$barang->code?> <?= ($barang->feature == 1) ? "<i class='fas fa-star text-warning'></i>" : "" ?></td>
                                <td><?=$barang->n_barang?></td>
                                <?php if ($barang->gambar == NULL) { ?>
                                    <td> - </td>
                                <?php } else { ?>
                                    <td><img src="<?=base_url()?>../public/image/<?=$barang->gambar?>" width="48px"></td>
                                <?php } ?>
                                <td>Rp. <?=number_format($barang->harga)?></td>
                                <td>
                                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>
                                        <a href="<?=base_url()?>barang/edit/<?=$barang->id_barang?>">
                                            <button class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                    
                                        <a href="<?=base_url()?>barang/delete/<?=$barang->id_barang?>">
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </a>
                                    <?php } ?>
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
                        <th>Kategori</th>
                        <th>Code</th>
                        <th>Nama Barang</th>
                        <th>Gambar</th>
                        <th>Harga</th>
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