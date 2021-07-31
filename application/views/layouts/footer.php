	<section id="footer-bar">
		<div class="row">
			<div class="span3 text-white">
				<h4>Hubungi Kami</h4>
				<div class="">
					<span><i class="fa fa-home"></i></span>
					<p><?=$config->n_perusahaan?></p>
				</div>
				<div class="">
					<span><i class="fa fa-building-o"></i></span>
					<p><?=$config->alt_perusahaan?></p>
				</div>
				<div class="">
					<span><i class="fa fa-phone"></i></span>
					<p><?=$config->phone?> / <?=$config->hp?></p>
				</div>
				<div class="">
					<span><i class="fa fa-envelope"></i></span>
					<p><?=$config->email?></p>
				</div>	
			</div>
			<div class="span3">
				<h4>Web Menu</h4>
				<ul class="nav">
					<li><a href="<?=base_url()?>produk">Our Produk</a></li>
					<li><a href="<?=base_url()?>contact">Hubungi Kami</a></li>
					<li><a href="<?=base_url()?>about">Tentang Kami</a></li>
				</ul>
			</div>
			<div class="span3">
				<h4>Media Sosial</h4>
				<span class="">
					<?php foreach ($medias as $value) { ?>
						<a target="_blank" href="<?=$value->link?>" class="<?=$value->type?>"><i class="fa fa-<?=$value->type?>"></i><span><?=$value->type?></span></a>
					<?php } ?>
				</span>
			</div>
			<div class="span3">
				<p class="logo"><img src="<?=base_url()?>public/image/<?=$config->logo?>" class="site_logo" alt=""></p>
				<br/>
				
			</div>					
		</div>	
	</section>
	<section id="copyright">
		<span>Copyright @ 2020 - <?= date('Y') ?> - Powered By <?=$config->n_perusahaan?> | DoniHMRs.</span>
	</section>
</div>
<!-- Footer section end -->
<!--====== Javascripts ======-->
<script src="<?php echo asset_url();?>shopper/plugins/bootstrap/js/bootstrap.min.js" async></script>				
<script src="<?php echo asset_url();?>shopper/js/jquery.scrolltotop.js" async></script>	
<script src="<?php echo asset_url();?>shopper/js/common.js"></script>
<script src="<?php echo asset_url();?>shopper/js/jquery.fancybox.js"></script>
<script src="<?php echo asset_url();?>shopper/js/jquery.flexslider-min.js"></script>
<script type="text/javascript">
	$(function() {
		$(document).ready(function() {
			$('.flexslider').flexslider({
				animation: "fade",
				slideshowSpeed: 4000,
				animationSpeed: 600,
				controlNav: false,
				directionNav: true,
				controlsContainer: ".flex-container" // the container that holds the flexslider
			});
		});

		var inputCheckTransaksi = document.getElementById("checkTransaksi");

		inputCheckTransaksi.addEventListener("keyup", function(event) {
		// Number 13 is the "Enter" key on the keyboard
		if (event.keyCode === 13) {
			// Cancel the default action, if needed
			event.preventDefault();
			// Trigger the button element with a click
			var valTransaksi = $("#checkTransaksi").val();
			window.location.href = docRoot+"transaksi/"+valTransaksi
		}
		});
	});
</script>

</body>
</html>
