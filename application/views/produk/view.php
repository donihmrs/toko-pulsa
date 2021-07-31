<section class="header_text sub">
    <h4><span>Product Detail</span></h4>
</section>
<!-- product section -->
<section class="main-content">				
    <div class="row">						
        <div class="span9">
            <div class="row">
                <div class="span4">
                    <a href="<?=base_url()?>public/image/<?=$barang->gambar?>" class="thumbnail" data-fancybox-group="group1" title="<?=$barang->n_barang?>"><img src="<?=base_url()?>public/image/<?=$barang->gambar?>" alt="<?=str_replace(" ","-",$barang->n_barang)?>"></a>	
                    <?php if ($gambars->num_rows() != 0) { ?>
                        <ul class="thumbnails small">	
                            <?php foreach ($gambars->result() as $val) { ?>					
                                <li class="span1">
                                    <a href="<?=base_url()?>public/image/<?=$val->file?>" class="thumbnail" data-fancybox-group="group1" title="<?=$val->nama_gambar?>"><img src="<?=base_url()?>public/image/<?=$val->file?>" alt=""></a>
                                </li>								
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
                <div class="span5">
                    <address>
                        <strong>Kategori:</strong> <span><?=$barang->n_kategori?></span><br>
                        <strong>Nama Produk:</strong> <span><?=$barang->n_barang?></span><br>
                        <strong>Ketersediaan:</strong> <span>Ready Stock</span><br>								
                        <strong>Berat:</strong> <span><?=number_format($barang->berat)?> gram</span><br>								
                    </address>									
                    <h4><strong>Rp. <?=number_format($barang->harga)?></strong></h4>
                </div>
                <div class="span5">
                    <br>
                    <input type="hidden" class="span1" value="<?=$barang->harga?>" name="h" placeholder="1">
                    <input type="hidden" class="span1" name="w" value="<?=$barang->berat?>" placeholder="1">
                    <input type="hidden" class="span1" name="b" value="<?=$barang->id_barang?>" placeholder="1">
                    <a href="https://wa.me/<?= preg_replace("/ |-/","",$config->hp) ?>?text=Pak,%20saya%20ingin%20membeli%20nomor%20 <?=$barang->n_barang?> %20ini,%20apakah%20masih%20tersedia%20?" target="_blank"><button class="btn btn-inverse" type="submit">Beli Nomor Cantik</button></a>
                    <br>
                    <br>
                    <ul class="nav nav-tabs" id="myTab">
                        <li class="active"><a href="#">Deskripsi</a></li>
                    </ul>							 
                    <div class="tab-content">
                        <div class="ml-2 tab-pane active" id="home"><?= html_entity_decode($barang->deskripsi)?></div>
                    </div>		
                </div>							
            </div>
            <br>
        </div>
        <div class="span3 col">
            <div class="block">	
                <ul class="nav nav-list">
                    <li class="nav-header">Others Category</li>
                    <?php foreach ($menuproduk as $key => $value) { ?>
                    <li>
                        <a href="<?=base_url()?>produk/<?=str_replace(" ","-",$value->n_kategori)?>"><?= ucfirst($value->n_kategori)?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="block">								
                <h4 class="title"><strong>Latest</strong> Product</h4>								
                <ul class="small-product">
                <?php foreach($b_new as $key => $value) { ?>
                    <?php if ($key < 5) { ?>
                    <li>
                        <a href="<?=base_url()?>produk/view/<?=$value->permalink?>" title="<?= $value->n_barang?>">
                            <img src="<?=base_url()?>public/image/<?=$value->gambar?>" alt="<?= str_replace(" ","-",$value->n_barang)?>">
                        </a>
                        <a href="<?=base_url()?>produk/view/<?=$value->permalink?>"><?= $value->n_barang?></a>
                    </li>
                    <?php } ?>
                <?php } ?>
                </ul>
            </div>
        </div>			
            <div class="row">
                <div class="span12">	
                    <br>
                    <h4 class="title">
                        <span class="pull-left"><span class="text"><strong>Related</strong> Products</span></span>
                        <span class="pull-right">
                            <a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
                        </span>
                    </h4>
                    <div id="myCarousel-1" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="active item">
                                <ul class="thumbnails listing-products">
                                <?php foreach($b_random as $key => $value) { ?>
                                    <?php if ($key < 5) { ?>
                                        <li class="span2">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>												
                                                <p><a href="<?=base_url()?>produk/view/<?=$value->permalink?>"><img style="height:100px" class="height" src="<?=base_url()?>public/image/<?=$value->gambar?>" alt="<?= str_replace(" ","-",$value->n_barang)?>" /></a></p>
                                                <a href="<?=base_url()?>produk/view/<?=$value->permalink?>" class="title"><?=$value->n_barang?></a><br/>
                                                <a href="<?=base_url()?>produk/view/<?=$value->permalink?>" class="category"><?=$value->n_kategori?></a>
                                                <p class="price">Rp. <?= number_format($value->harga)?></p>
                                            </div>
                                        </li>	
                                    <?php } ?>
                                <?php } ?>						
                                </ul>
                            </div>
                            <div class="item">
                                <ul class="thumbnails listing-products">
                                <?php foreach($b_random as $key => $value) { ?>
                                    <?php if ($key > 5 && $key < 10) { ?>
                                        <li class="span2">
                                            <div class="product-box">
                                                <span class="sale_tag"></span>												
                                                <p><a href="<?=base_url()?>produk/view/<?=$value->permalink?>"><img style="height:100px" class="height" src="<?=base_url()?>public/image/<?=$value->gambar?>" alt="<?= str_replace(" ","-",$value->n_barang)?>" /></a></p>
                                                <a href="<?=base_url()?>produk/view/<?=$value->permalink?>" class="title"><?=$value->n_barang?></a><br/>
                                                <a href="<?=base_url()?>produk/view/<?=$value->permalink?>" class="category"><?=$value->n_kategori?></a>
                                                <p class="price">Rp. <?= number_format($value->harga)?></p>
                                            </div>
                                        </li>	
                                    <?php } ?>
                                <?php } ?>						
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('.thumbnail').fancybox({
            openEffect  : 'none',
            closeEffect : 'none'
        });
    })
</script>