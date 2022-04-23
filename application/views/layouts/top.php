<!-- End Header Middle -->
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-8 col-md-6 col-12">
				<div class="nav-inner">
					<!-- Start Navbar -->
					<nav class="navbar navbar-expand-lg">
						<button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
							data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
							aria-expanded="false" aria-label="Toggle navigation">
							<span class="toggler-icon"></span>
							<span class="toggler-icon"></span>
							<span class="toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
							<ul id="nav" class="navbar-nav ms-auto">
								<li class="nav-item">
									<a href="<?=base_url()?>" aria-label="Toggle navigation">Home</a>
								</li>
								<?php foreach ($menuproduk as $key => $value) { ?>
									<li class="nav-item" ><a href="<?=base_url()?>produk/<?=str_replace(" ","-",$value->n_kategori)?>"><?= ucfirst($value->n_kategori)?></a></li>
								<?php } ?>
								<!-- <li class="nav-item">
									<a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse"
										data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent"
										aria-expanded="false" aria-label="Toggle navigation">Produk</a>
									<ul class="sub-menu collapse" id="submenu-1-2">
										
									</ul>
								</li> -->
							</ul>
						</div> <!-- navbar collapse -->
					</nav>
					<!-- End Navbar -->
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-12">
				<!-- Start Nav Social -->
				<div class="nav-social">
					<h5 class="title">Follow Us:</h5>
					<ul>
						<?php foreach ($medias as $value) { ?>
							<li>
								<a target="_blank" href="<?=$value->link?>" class="<?=$value->type?>"><i class="lineHeight2-5 lni lni-<?=$value->type?>-filled"></i></a>
							</li>
						<?php } ?>
					</ul>
				</div>
				<!-- End Nav Social -->
			</div>
		</div>
	</div>
	<!-- End Header Bottom -->
</header>
<!-- End Header Area -->