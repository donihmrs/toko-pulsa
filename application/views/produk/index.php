<section class="header_text sub">
	<h4><span>All products</span></h4>
</section>
<section class="main-content">
	<div class="row">						
		<div class="span10">								
			<ul class="thumbnails listing-products">
			<?php foreach($barang as $key => $value) { ?>
				<li class="span2">
					<div class="product-box">
						<span class="sale_tag"></span>												
						<p><a href="<?=base_url()?>produk/view/<?=$value->permalink?>"><img style="height:100px" src="<?=base_url()?>public/image/<?=$value->gambar?>" alt="<?= str_replace(" ","-",$value->n_barang)?>" /></a></p>
						<a href="<?=base_url()?>produk/view/<?=$value->permalink?>" class="title"><?=$value->n_barang?></a><br/>
						<a href="<?=base_url()?>produk/view/<?=$value->permalink?>" class="category"><?=$value->n_kategori?></a>
						<p class="price">Rp. <?= number_format($value->harga)?></p>
					</div>
				</li>
			<?php } ?>
			</ul>								
			<hr>
			<!-- <div class="pagination pagination-small pagination-centered">
				<ul>
					<li><a href="#">Prev</a></li>
					<li class="active"><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li><a href="#">Next</a></li>
				</ul>
			</div> -->
		</div>
		<div class="span2 col">
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
	</div>
</section>