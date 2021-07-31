<section class="main-content">
	<div class="row">
		<div class="span12">													
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Feature <strong>Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
						</span>
					</h4>
					<?php $no = 0; ?>
					<div id="myCarousel" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active item">
							<ul class="thumbnails">	
								<?php foreach ($b_feature as $key => $value) { ?>	
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
							<ul class="thumbnails">	
								<?php foreach ($b_feature as $key => $value) { ?>	
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
			<br/>
			<div class="row">
				<div class="span12">
					<h4 class="title">
						<span class="pull-left"><span class="text"><span class="line">Latest <strong>Products</strong></span></span></span>
						<span class="pull-right">
							<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
						</span>
					</h4>
					<div id="myCarousel-2" class="myCarousel carousel slide">
						<div class="carousel-inner">
							<div class="active item">
								<ul class="thumbnails">												
								<?php foreach($b_new as $key => $value) { ?>
									<?php if ($key < 10) { ?>
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
								<ul class="thumbnails">												
								<?php foreach($b_new as $key => $value) { ?>
									<?php if ($key > 10 && $key < 20) { ?>
									<li class="span2">
										<div class="product-box">
											<span class="sale_tag"></span>
											<p><a href="<?=base_url()?>produk/view/<?=$value->permalink?>"><img class="height" style="height:100px" src="<?=base_url()?>public/image/<?=$value->gambar?>" alt="<?= str_replace(" ","-",$value->n_barang)?>" /></a></p>
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
			<div class="row feature_box">						
				<div class="span4">
					<div class="service">
						<div class="responsive">	
							<?php if (isset($templatefooterleft)) { ?>
								<img src="<?php echo asset_url();?>shopper/images/feature_img_2.png" alt="" />
								<h4><?=html_entity_decode($templatefooterleft->title)?></h4>
								<p><?=html_entity_decode($templatefooterleft->body)?></p>		
							<?php } ?>							
						</div>
					</div>
				</div>
				<div class="span4">	
					<div class="service">
						<div class="customize">			
							<?php if (isset($templatefootercenter)) { ?>
								<img src="<?php echo asset_url();?>shopper/images/feature_img_1.png" alt="" />
								<h4><?=html_entity_decode($templatefootercenter->title)?></h4>
								<p><?=html_entity_decode($templatefootercenter->body)?></p>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="span4">
					<div class="service">
						<div class="support">	
							<?php if (isset($templatefooterright)) { ?>
								<img src="<?php echo asset_url();?>shopper/images/feature_img_3.png" alt="" />
								<h4><?=html_entity_decode($templatefooterright->title)?></h4>
								<p><?=html_entity_decode($templatefooterright->body)?></p>
							<?php } ?>
						</div>
					</div>
				</div>	
			</div>		
		</div>				
	</div>
</section>