<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Management <?=ucfirst($halaman)?></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="col-12">
            <?php if ($this->session->userdata('level') != 4) { ?>
                <a href="<?=base_url()?>penawaran/create">
                    <button class="btn btn-success">Add <?=ucfirst($halaman)?></button>
                </a>
                <hr>
            <?php } ?>
            <table id="dataTable" class="text-center table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Sales</th>
                        <th>Proyek</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Nomor Penawaran</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($penawaran->num_rows() != 0) { ?>
                        <?php $no = 1;?>
                        <?php foreach ($penawaran->result() as $value) { ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td><?=$value->tanggal?></td>
                                <td><?=$value->nama?></td>
                                <td><?=$value->proyek?></td>
                                <td><?=$value->alamat?></td>
                                <td><?php switch ($value->status) {
                                    case 1:
                                        echo '<span class="badge badge-warning">Pending</span>';
                                        break;
                                    case 2:
                                        echo '<span class="badge badge-info">Processing</span>';
                                        break;
                                    case 3:
                                        echo '<span class="badge badge-light">Reply</span>';
                                        break;
                                    case 4:
                                        echo '<span class="badge badge-success">Approved</span>';
                                        break;
                                    case 5:
                                        echo '<span class="badge badge-primary">Finish</span>';
                                        break;
                                    default:
                                        echo '<span class="badge badge-danger">Cancel</span>';
                                    break;
                                }?></td>
                                <td>
                                    <?php if ($value->status == 4 || $value->status == 5) { ?>
                                        <?php if ($value->nomor == NULL && ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4)) { ?>
                                            <form action="<?php echo base_url()?>penawaran/save_nomor" method="POST">
                                                <div class="d-flex">
                                                    <input type="hidden" name="id" value="<?=$value->id_penawaran?>">
                                                    <input name="nomor" type="text" class="form-control" placeholder="Masukkan No Penawaran" required />
                                                    &nbsp;<input class='btn btn-sm btn-info' type="submit" value="Save" />
                                                </div>
                                            </form>
                                        <?php } else { ?>
                                            <?php if ($value->nomor == NULL) { ?>
                                                <span>Maaf, Nomor penawaran belum di input</span>
                                            <?php } ?>

                                            <?php if ($value->status == 5) { ?>
                                                <b><?=$value->nomor?></b>
                                                <a href="<?=base_url()?>penawaran/generatePdf/<?=$value->id_penawaran?>-ppn">
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </button>
                                                </a>
                                                <a href="<?=base_url()?>penawaran/generatePdf/<?=$value->id_penawaran?>-nonppn">
                                                    <button class="btn btn-sm btn-success">
                                                        <i class="fas fa-file-pdf"></i>
                                                    </button>
                                                </a>
                                            <?php } ?>
                                            <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>
                                                <a href = "<?=base_url()?>penawaran/deleteNomor/<?=$value->id_penawaran?>">
                                                    <button class="btn btn-sm btn-warning"><i class="fas fa-times"></i></button>
                                                </a>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <span>Maaf, Penawaran belum di approve</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?=base_url()?>penawaran/viewpenawaran/<?=$value->id_penawaran?>">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                    <?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) && $value->status != 5) { ?>
                                        <a href="<?=base_url()?>penawaran/delpenawaran/<?=$value->id_penawaran?>">
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <td class='text-center' colspan='6'>Data Penawaran Not Found</td>
                    <?php } ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Sales</th>
                        <th>Proyek</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Nomor Penawaran</th>
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