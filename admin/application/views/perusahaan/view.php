<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <?php if ($status == 1) { ?>
                <h5 class="card-title">View <?=ucfirst($halaman)?> Terupdate & Reply By : <?=$penawaran->nama?></h5>
                <br><h5>Sales : <?=$penutama->nama?></h5>
                <a href="#komentar">
                    <button class="btn btn-info">List Komentar</button>
                </a>
            <?php } else { ?>
                <h5 class="card-title">View <?=ucfirst($halaman)?> & Sales : <?=$penawaran->nama?></h5>
                <a class='pl-5' href="#komentar">
                    <button class="btn btn-info">List Komentar</button>
                </a>
            <?php } ?>
            
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    <label for="kantor">Nama Perusahaan</label>
                    <h6><?=$penawaran->kantor?></h6>
                </div>
                <div class="form-group">
                    <label for="proyek">Nama Proyek</label>
                    <h6><?=$penawaran->proyek?></h6>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <h6><?=$penawaran->alamat?></h6>
                </div>
                
                <div class="form-group">
                    <label for="keterangan">Keterangan lainnya</label>
                    <?php $keterangan = json_decode($penawaran->keterangan);?>
                    <?php $no = 1; foreach ($keterangan as $value) { ?>
                        <?php if ($value != "") { ?>
                            <p><?= $value ?></p>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-4">    
                <div class="form-group">
                    <label for="pic">Nama Pic</label>
                    <h6><?=$penawaran->pic?></h6>
                </div>
                <div class="form-group">
                    <label for="phone">Telephone/HP</label>
                    <h6><?=$penawaran->phone?></h6>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <h6><?=$penawaran->email?></h6>
                </div>
                <div class="form-group">
                    <label for="barang">Barang</label>
                    <?php $no = 1; foreach ($barangs as $value) { ?>
                        <p><?= $no ?>. <?= $value->n_barang?> (<?= $value->code?>) / Qty : <?= $value->qty?>
                         / Diskon : <?= $value->diskon?>% / Total Harga : <b>Rp. <?= number_format($value->total_barang)?></b></p>
                    <?php $no++; } ?>
                </div>
                <?php if ($status == 1) { ?>
                    <div class="form-group">
                        <label for="email">Komentar</label>
                        <h6><?=$penawaran->komentar?></h6>
                    </div>
                <?php } ?>
            </div>
            <div class="col-4">
            <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>
                <?php if ($penutama->no_po == NULL && $penutama->status == 5 ) { ?>
                <form enctype="multipart/form-data" action="<?php echo base_url()?>penawaran/save_po/<?=$penutama->id_penawaran?>" method="POST">
                    <label>Input PO</label>
                    <input name="id" type="hidden" class="form-control" value="<?=$penutama->id_penawaran?>" required />
                    <input name="no_po" type="text" class="form-control" placeholder="Masukkan No PO" required />
                    <br>
                    <input name="uploadfile" type="file" required/>
                    <input class='btn btn-sm btn-success' type="submit" value="Upload File" />
                </form>
                <?php } else { ?>
                    <?php if ($penutama->no_po != NULL) { ?>
                        Download File PO (Click For Download File) : <br>
                        <a href ="<?=base_url()?>public/file/<?=$penutama->file_po?>">
                            <?= $penutama->no_po ?>
                        </a>
                        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>
                            <a href = "<?=base_url()?>penawaran/deletePo/<?=$penutama->id_penawaran?>">
                                <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                            </a>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } else { ?>
                <?php if ($penutama->no_po != NULL) { ?>
                    Download File PO (Click For Download File) : <br>
                    <a href ="<?=base_url()?>public/file/<?=$penutama->file_po?>">
                        <?= $penutama->no_po ?>
                    </a>
                    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) { ?>
                        <a href = "<?=base_url()?>penawaran/deletePo/<?=$penutama->id_penawaran?>">
                            <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                        </a>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <br>
            <?php if ($file->num_rows() != 0) { ?>
                <?php $files = $file->result(); ?>
                Download File Pendukung (Click For Download File) : <br>
                <?php foreach ($files as $val) { ?>
                    <a href ="<?=base_url()?>public/file/<?=$val->lokasi?>">
                        <?= $val->file ?>
                    </a>
                    <?php if ($this->session->userdata('level') == 1) { ?>
                        <a href = "<?=base_url()?>penawaran/deleteFile/<?=$val->id_file?>">
                            <button class="btn btn-sm btn-danger"><i class="fas fa-times"></i></button>
                        </a>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
            <br>
            <?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) && ($penutama->status != 4 && $penutama->status != 5)) { ?>
                <a href = "<?=base_url()?>penawaran/approve/<?=$penutama->id_penawaran?>">
                    <button class="btn btn-sm btn-success"><i class="fas fa-check"></i> Approve</button>
                </a>
            <?php } ?>
            <?php if ($this->session->userdata('level') != 4 && $penutama->status != 5) { ?>
                <a href = "<?=base_url()?>penawaran/reply/<?=$penutama->id_penawaran?>">
                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i> Reply Penawaran</button>
                </a>
            <?php } ?>
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
<?php if ($status == 1) { ?>
<hr>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">View <?=ucfirst($halaman)?> Utama & Sales : <?=$penutama->nama?></h5>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="kantor">Nama Perusahaan</label>
                        <h6><?=$penutama->kantor?></h6>
                    </div>
                    <div class="form-group">
                        <label for="proyek">Nama Proyek</label>
                        <h6><?=$penutama->proyek?></h6>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <h6><?=$penutama->alamat?></h6>
                    </div>
                    
                    <div class="form-group">
                        <label for="keterangan">Keterangan lainnya</label>
                        <?php $keterangan = json_decode($penutama->keterangan);?>
                        <?php $no = 1; foreach ($keterangan as $value) { ?>
                            <?php if ($value != "") { ?>
                                <p><?= $value ?></p>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-4">    
                    <div class="form-group">
                        <label for="pic">Nama Pic</label>
                        <h6><?=$penutama->pic?></h6>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telephone/HP</label>
                        <h6><?=$penutama->phone?></h6>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <h6><?=$penutama->email?></h6>
                    </div>
                    <div class="form-group">
                        <label for="barang">Barang</label>
                        <?php $no = 1; foreach ($barangsOld as $value) { ?>
                            <p><?= $no ?>. <?= $value->n_barang?> (<?= $value->code?>) / Qty : <?= $value->qty?>
                            / Diskon : <?= $value->diskon?>% / Total Harga : <b>Rp. <?= number_format($value->total_barang)?></b></p>
                        <?php $no++; } ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<hr>
<h4>Reply Permintaan Penawaran</h4>
<br>
<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">View <?=ucfirst($halaman)?></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="col-12" id='komentar'>
        <table id="dataTable" class="text-center table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Sales</th>
                        <th>Komentar</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($childpen->num_rows() != 0) { ?>
                        <?php $no = 1;?>
                        <?php foreach ($childpen->result() as $value) { ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td><?=$value->tanggal?></td>
                                <td><?=$value->nama?></td>
                                <td><?=$value->komentar?></td>
                                <td>
                                    <a href="<?=base_url()?>penawaran/viewkomentar/<?=$value->id_child?>">
                                        <button class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>

                                    <?php if (($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2)) { ?>
                                        <a href="<?=base_url()?>penawaran/delkomentar/<?=$value->id_child?>">
                                            <button class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus komentar ini ?')">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <td class='text-center' colspan='6'>Data Comments Not Found</td>
                    <?php } ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Sales</th>
                        <th>Komentar</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        <!-- /.row -->
        </div>
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
