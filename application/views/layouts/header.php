<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <?php if ($title == "Detail Alat/Mesin") { ?>
    <title><?=$config->n_perusahaan?> | <?=$barang->n_barang?></title>
    <meta content='<?= preg_replace("/<p>|<\/p>/i","",htmlspecialchars_decode($barang->keyword))?>' name="keywords" />
    <meta content='<?= preg_replace("/<p>|<\/p>/i","",htmlspecialchars_decode($barang->meta_deskripsi))?>' name="description" />
    <meta content='<?= preg_replace("/<p>|<\/p>/i","",htmlspecialchars_decode($barang->meta_title))?>' property="og:title" />
    <meta content='<?= preg_replace("/<p>|<\/p>/i","",htmlspecialchars_decode($barang->meta_deskripsi))?>' property="og:description" />
    <meta content='<?=base_url()?>public/image/<?=$barang->gambar?>' property="og:image" />
    <meta content='<?=base_url()?>produk/view/<?=$barang->permalink?>' property="og:url" />
    <meta content='website' property="og:type" />
    <meta content='image/jpg' property="og:image:type" />
  <?php } else { ?>
    <title><?=$config->n_perusahaan?> | <?=$title?></title>
    <meta content='jual,dress,busana,murah,jakarta,jabodetabek' name="keywords" />
    <meta content='Jual Berbagai Busana murah seperti dress, kaos, celaka di jabodetabek' name="description" />
    <meta content='<?=$config->n_perusahaan?> - Jual Busana Modern' property="og:title" />
    <meta content='<?=$config->n_perusahaan?> - Menjual Berbagai Busana Modern' property="og:description" />
    <meta content='<?=base_url()?>public/image/<?=$config->logo?>' property="og:image" />
    <meta content='<?=base_url()?>' property="og:url" />
    <meta content='website' property="og:type" />
    <meta content='image/jpg' property="og:image:type" />
  <?php } ?>

  <!-- Favicon -->
  <link href="<?=base_url()?>favicon.ico" rel="shortcut icon"/>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- bootstrap -->
  <link href="<?php echo asset_url();?>shopper/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">      
  <link href="<?php echo asset_url();?>shopper/plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
  
  <link href="<?php echo asset_url();?>shopper/css/bootstrappage.css" rel="stylesheet"/>
  <link href="<?php echo asset_url();?>shopper/css/custom.css" rel="stylesheet"/>
  
  <!-- global styles -->
  <link href="<?php echo asset_url();?>shopper/css/flexslider.css" rel="stylesheet"/>
  <link href="<?php echo asset_url();?>shopper/css/main.css" rel="stylesheet"/>
  <link href="<?php echo asset_url();?>shopper/css/jquery.fancybox.css" rel="stylesheet"/>

  <!-- Jquery -->
  <script src="<?php echo asset_url();?>shopper/js/jquery-1.7.2.min.js"></script>
  <script src="<?php echo asset_url();?>shopper/js/superfish.js"></script>	
  <script src="<?php echo asset_url();?>shopper/js/global.js"></script>
</head>
<body>
  <span id='templatedirectory' style="display:none">http://<?php echo $_SERVER['HTTP_HOST']?>/tokotdc</span>
  <div id="top-bar" class="container">
    <div class="row">
      <div class="span3">
        <form method="GET" action="<?=base_url()?>search" class="search_form">
          <input type="text" name="q" class="input-block-level search-query text-dark" Placeholder="eg. Nama Produk">
        </form>
      </div>
      <div class="span3">
          <!-- <input type="text" id="checkTransaksi" class="input-block-level search-query text-dark" Placeholder="Eg. Nomor Transaksi">          -->
      </div>
      <div class="span6">
        <div class="account pull-right">
          <ul class="user-menu">				
            <li><a href="<?=base_url()?>">Home</a></li>
            <li><a href="<?=base_url()?>contact">Hubungi Kami</a></li>
            <li><a href="<?=base_url()?>about">Tentang Kami</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div id="loadingDiv" style="z-index:1000;top:40%;left:48%;position:fixed;display:none">
    <img src="<?=base_url()?>public/image/loading.gif">
    <h5>Get Data . . .</h5>
  </div>
  
  <!--================Header Menu Area =================-->
    <div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="<?=base_url()?>" class="logo pull-left"><img width="100" src="<?=base_url()?>public/image/<?=$config->logo?>" class="site_logo" alt="<?=$config->n_perusahaan?>"></a>
					<nav id="menu" class="pull-right m-top7">
            <ul>
              <?php foreach ($menuproduk as $key => $value) { ?>
                <li><a href="<?=base_url()?>produk/<?=str_replace(" ","-",$value->n_kategori)?>"><?= ucfirst($value->n_kategori)?></a></li>
              <?php } ?>
            <!-- <li><a href="<?php //echo base_url()?>blog">Blog</a></li> -->
            </ul>
					</nav>
				</div>
			</section>