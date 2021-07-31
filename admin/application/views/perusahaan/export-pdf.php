<?php 
    $docRoot = $_SERVER['DOCUMENT_ROOT']."/";
    function stringInsert($str,$insertstr,$pos)
    {
        $str = substr($str, 0, $pos) . $insertstr . substr($str, $pos);
        return $str;
    }
    $ppn = (int)$total_harga * 10 / 100;
    $grandTotal = (int)$total_harga + $ppn;
?>
<html>
    <title>Export PDF - Surat Penawaran</title>
    <head>
        <style>
            .table {
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            .table td, .table th {
                border: 1px solid black;
                padding: 8px;
            }
        </style>
    </head>
    <div class='col-12'>
        <img src="<?=$docRoot."public/image/".$gambar_kop;?>" width='100%' height='120px'>
    </div>
    <div class='row text-dark' style='font-size:12px;padding-right:10px;padding-left:2px !important;margin-top:7px'>
        <div class='col-12'>
            <span>Ref: <?=$nomor?></span> <span style="text-align:right;padding-left: 24em;"><?=$tanggal?></span>
        </div>
        <div class='col-12'>
            <span>Hal: Penawaran Harga</span>
        </div>
        <br>
        <div class='col-12'>
            <span>Kepada Yth,</span>
        </div>
        <div class='col-12'>
            <span style="font-size:14px !important"><b>Bpk/Ibu. <?=$pic?></b></span>
        </div>
        <div class='col-12'>
            <span>Site &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$proyek?></span><br>
        </div>
        <div class='col-12'>
            <span>Alamat : <?=$alamat?></span><br>
        </div>
        <div class='col-12'>
            <span>Telp &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?=$phone?></span>
        </div>
        <div class='col-12'>
            <span>Email &nbsp;&nbsp;&nbsp;: <?=$email?></span>
        </div>
        <br>
        <div class='col-12'>
            <span><?php echo htmlspecialchars_decode($top_surat)?></span>
        </div>

        <div class='col-12'>
            <table class='table' >
                <?php if ($total_diskon == 0) { ?>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Model</th>
                            <th>Qty</th>
                            <th>Nett Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($barangs as $value) { ?>               
                            <tr style="vertical-align: middle">
                                <td style="vertical-align: middle;background-color:orange;line-height:4px" colspan="6"><?=$value->n_barang?></td>
                            </tr>
                            <tr>
                                <td rowspan='2' style="text-align:center;vertical-align: middle;padding:0;width:3px"><?= $no ?></td>
                                <td style="text-align:center;vertical-align: middle;line-height:2px !important;;padding:0;padding-top:5px" >Spesifikasi</td>
                                <td style="text-align:center;vertical-align: middle;height:2px;line-height:2px !important;padding:0px;padding-top:5px"><?=$value->brand?> <?=$value->code?></td>
                                <td></td>
                                <td rowspan='2' style="vertical-align: middle;text-align:center;width:40px;padding:0;"><?=$value->qty?> <?=($value->satuan == NULL ? 'Pcs' : $value->satuan)?></td>
                                <td rowspan='2' style="vertical-align: middle;text-align:center;font-size:12px !important;padding:0;"><b>Rp. <?=number_format($value->harga_nett)?></b></td>
                            </tr>
                            <tr>
                                <?php $spek = json_decode($value->spek); ?>
                                    <td style="vertical-align: top;text-align:left;padding:5px;"><?php if ($spek != 0) { 
                                        foreach ($spek as $val) {   
                                            echo $val->title."<br>";
                                        }
                                    } else { echo " - "; } ?>
                                </td>
                                <?php $spek = json_decode($value->spek); ?>
                                    <td style="vertical-align: top;text-align:center;padding:5px;"><><?php if ($spek != 0) { 
                                        foreach ($spek as $val) {
                                            echo $val->body."<br>";
                                        }
                                    } else { echo " - "; } ?>
                                </td>
                                <td style="vertical-align: middle;text-align:center;border-top:0px solid black !important;padding:2px">
                                <?php if ($value->gambar != NULL) { ?>
                                    <img src="<?=$docRoot."public/image/".$value->gambar;?>" width='115px'>
                                <?php } else { ?>
                                    -
                                <?php } ?>
                                </td>
                            </tr>
                        <?php $no++; } ?>
                        <tr>
                            <td style="vertical-align: middle;line-height:4px" colspan="5">Harga : </td>
                            <td style="vertical-align: middle;line-height:4px">Rp. <?=number_format($total_harga)?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;line-height:4px" colspan="5">PPN 10% : </td>
                            <td style="vertical-align: middle;line-height:4px">Rp. <?=number_format($ppn)?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;line-height:4px" colspan="5"><b>Grand Total : </b></td>
                            <td style="vertical-align: middle;line-height:4px;font-size:13px !important"><b>Rp. <?=number_format($grandTotal)?></b></td>
                        </tr>
                    </tbody>
                <?php } else { ?>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item Name</th>
                            <th>Description</th>
                            <th>Model</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th>Disc</th>
                            <th>Nett Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($barangs as $value) { ?>               
                            <tr style="vertical-align: middle">
                                <td style="vertical-align: middle;background-color:orange;line-height:4px" colspan="8"><?=$value->n_barang?></td>
                            </tr>
                            <tr>
                                <td rowspan='2' style="text-align:center;vertical-align: middle;padding:0;width:3px"><?= $no ?></td>
                                <td style="text-align:center;vertical-align: middle;line-height:2px !important;;padding:0;padding-top:5px" >Spesifikasi</td>
                                <td style="text-align:center;vertical-align: middle;height:2px;line-height:2px !important;padding:0px;padding-top:5px"><?=$value->brand?> <?=$value->code?></td>
                                <td></td>
                                <td rowspan='2' style="vertical-align: middle;text-align:center;width:40px;padding:0;"><?=$value->qty?> <?=($value->satuan == NULL ? 'Pcs' : $value->satuan)?></td>
                                <td rowspan='2' style="vertical-align: middle;text-align:center;font-size:12px !important;padding:0;"><b>Rp. <?=number_format($value->harga)?></b></td>
                                <td rowspan='2' style="vertical-align: middle;text-align:center;width:3px;padding:0"><?=$value->diskon?>%</td>
                                <td rowspan='2' style="vertical-align: middle;text-align:center;font-size:12px !important;padding:0;"><b>Rp. <?=number_format($value->harga_nett)?></b></td>
                            </tr>
                            <tr>
                                <?php $spek = json_decode($value->spek); ?>
                                    <td style="vertical-align: top;text-align:left;padding:5px;"><?php if ($spek != 0) { 
                                        foreach ($spek as $val) {   
                                            echo $val->title."<br>";
                                        }
                                    } else { echo " - "; } ?>
                                </td>
                                <?php $spek = json_decode($value->spek); ?>
                                    <td style="vertical-align: top;text-align:center;padding:5px;"><><?php if ($spek != 0) { 
                                        foreach ($spek as $val) {
                                            echo $val->body."<br>";
                                        }
                                    } else { echo " - "; } ?>
                                </td>
                                <td style="vertical-align: middle;text-align:center;border-top:0px solid black !important;padding:2px">
                                <?php if ($value->gambar != NULL) { ?>
                                    <img src="<?=$docRoot."public/image/".$value->gambar;?>" width='115px'>
                                <?php } else { ?>
                                    -
                                <?php } ?>
                                </td>
                            </tr>
                        <?php $no++; } ?>
                        <tr>
                            <td style="vertical-align: middle;line-height:4px" colspan="7">Diskon : </td>
                            <td style="vertical-align: middle;line-height:4px">Rp. <?=number_format($total_diskon)?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;line-height:4px" colspan="7">Harga : </td>
                            <td style="vertical-align: middle;line-height:4px">Rp. <?=number_format($total_harga)?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;line-height:4px" colspan="7">PPN 10% : </td>
                            <td style="vertical-align: middle;line-height:4px">Rp. <?=number_format($ppn)?></td>
                        </tr>
                        <tr>
                            <td style="vertical-align: middle;line-height:4px" colspan="7"><b>Grand Total : </b></td>
                            <td style="vertical-align: middle;line-height:4px;font-size:13px !important"><b>Rp. <?=number_format($grandTotal)?></b></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
        <div class='col-12'>
            <span><?= htmlspecialchars_decode($center_surat)?></span>
        </div>
        <div class='col-12'>
            Syarat dan Kondisi :
        </div>
        <div class='col-12'>
        <?php $keterangan = json_decode($keterangan);?>
        <?php $no = 1; foreach ($keterangan as $key => $value) { ?>
            <?php if ($value != "" && $value != "\r") { ?>
                <?php 
                    $syarat = stringInsert($value,"*",3); 
                    $syarat = preg_replace('/<p>|<\/p>/i',"",$syarat); 
                ?> 
                <?php echo $syarat ?><br>
            <?php } ?>
        <?php } ?>
        </div>

        <div class='col-12'>
            <span><?= htmlspecialchars_decode($bottom_surat)?></span>
        </div>
        <br>
        <div class='col-12'>
            Hormat Kami,
        </div>
        <div class='col-12'>
            <br><span><b><?=$n_perusahaan?></b></span>
        </div>
        <div class='col-12'>
            <img src="<?=$docRoot."public/image/".$ttd;?>" width='90px'>
        </div>
        <div class='col-12'>
            <span><b><?=$nama?></b></span>
        </div>
        <div class='col-12'>
            <span><b><?=$divisi?></b></span>
        </div>
        <div class='col-12'>
            <span><b><?=$hp?></b></span>
        </div>
    </div>

</html>