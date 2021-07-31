<div class="row">
    <div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Management <?=$halaman?></h5>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <div class="col-12">
            <table id="dataTable" class="text-center table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Ongkir</th>
                        <th>Pembayaran</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($transaksi->num_rows() != 0) { ?>
                        <?php $no = 1; $pembayaran = "";?>
                        <?php foreach ($transaksi->result() as $transaksi) { ?>
                            <?php switch ($transaksi->pembayaran) {
                                case '1':
                                    $pembayaran = "Transfer Manual";
                                    break;
                                case '2':
                                    $pembayaran = "Virtual Account";
                                    break;
                                case '3':
                                    $pembayaran = "OVO";
                                    break;
                                
                                default:
                                    $pembayaran = "Not Found";
                                    break;
                            }
                            ?>

                            <?php 
                                $status = "";
                                switch ($transaksi->status) {
                                    case '1':
                                        $status = "<span class='text-dark'>Menunggu Pembayaran</span>";
                                        break;
                                    case '2':
                                        $status = "<span class='text-info'>Transaksi di proses</span>";
                                        break;
                                    case '3':
                                        $status = "<span class='text-primary'>Barang di kirim</span>";
                                        break;
                                    case '4':
                                        $status = "<span class='text-success'>Transaksi selesai</span>";
                                        break;
                                    
                                    default:
                                        $status = "<span class='text-danger'>Transaksi tidak ditemukan</span>";
                                        break;
                                }
                            ?>
                            <tr class="text-center">
                                <td><?=$no++?></td>
                                <td>
                                    <?=$transaksi->no_transaksi?>
                                    <a href="<?=base_url()?>transaksi/view/<?=$transaksi->no_transaksi?>">
                                        <button title="Lihat Transaksi" class="btn ml-2 btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                </td>
                                <td><?=$transaksi->nama?></td>
                                <td><?=$transaksi->alamat?>, <?=$transaksi->kota?>, <?=$transaksi->provinsi?>, <?=$transaksi->kodepos?> </td>
                                <td><?=strtoupper($transaksi->ongkir)?></td>
                                <td><?=$pembayaran?></td>
                                <td>Rp. <?=number_format($transaksi->total)?></td>
                                <td><?=$status?></td>
                                <td>
                                    <?php if ($this->session->userdata('level') == 1 && ($transaksi->status == 1 || $transaksi->status == 2)) { ?>
                                        <form method="POST" action="<?=base_url()?>transaksi/updateResi">
                                            <input type="hidden" name="nomor" value="<?=$transaksi->no_transaksi?>">
                                            <div class="d-flex">
                                                <input type="text" name="resi" placeholder="Masukkan No Resi" class="form-control">
                                                <input type="submit" class=" ml-2 btn btn-sm btn-success" value="Submit">
                                            </div>
                                        </form>
                                    <?php } else if ($this->session->userdata('level') == 1 && $transaksi->status == 3) { ?>
                                        <b>No Resi : <?=$transaksi->resi?></b>
                                    <?php } else if ($this->session->userdata('level') == 1 && $transaksi->status == 4) { ?>
                                        <b>Transaksi Selesai</b> <br>
                                        No Resi : <?=$transaksi->resi?>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <td class='text-center' colspan='6'>List Transaksi Not Found</td>
                    <?php } ?>
                    
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>No Transaksi</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Ongkir</th>
                        <th>Pembayaran</th>
                        <th>Total</th>
                        <th>Status</th>
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