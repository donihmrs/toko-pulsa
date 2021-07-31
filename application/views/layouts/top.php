<section  class="homepage-slider" id="home-slider">
	<div class="flexslider">
		<ul class="slides">
			<img style="height:200px" src="<?php echo base_url();?>public/image/<?=$top?>" alt="Banner" />
			<!-- <div class="intro">
				<h1><?php echo html_entity_decode($templateheader->title) ?></h1>
				<p><span><?php echo html_entity_decode($templateheader->body)?></span></p>
				<p><a href="<?= base_url() ?>produk"><button class="btn"><?php echo html_entity_decode($templateheader->footer)?></button></a></p>
			</div> -->
		</ul>
	</div>			
</section>
<section class="header_text">
	<?php print html_entity_decode($templatecenter->body) ?>
</section>
<!-- <a href="<?= base_url() ?>">Home</a> /
<a href="<?=base_url()?><?=$link?>"><?= $halaman ?></a> -->

<?php if (!empty(get_cookie('error'))) { ?>
<div style="font-size:15px" class="alert alert-danger text-center" role="alert">
	<h4><?= get_cookie('error')?></h4>
</div>
<?php } ?>