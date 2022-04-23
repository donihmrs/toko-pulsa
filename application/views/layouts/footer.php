<!-- Start Footer Area -->
<footer class="footer">
        <!-- Start Footer Middle -->
        <div class="footer-middle">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-contact">
                                <h3>Hubungi Kami</h3>
                                <p class="phone"><?=$config->phone?> / <?=$config->hp?></p>
                                <ul>
                                    <li><span><?=$config->n_perusahaan?></span></li>
                                    <li><span><?=$config->alt_perusahaan?></span></li>
                                </ul>
                                <p class="mail">
									<?=$config->email?>
                                </p>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                        <div class="col-lg-3 col-md-6 col-12">
                            <!-- Single Widget -->
                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
									<li><a href="<?=base_url()?>">Home</a></li>
									<li><a href="<?=base_url()?>contact">Hubungi Kami</a></li>
									<li><a href="<?=base_url()?>about">Tentang Kami</a></li>
                                </ul>
                            </div>
                            <!-- End Single Widget -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Middle -->
        <!-- Start Footer Bottom -->
        <div class="footer-bottom">
            <div class="container">
                <div class="inner-content">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-12">
                            <div class="copyright">
                                <p>Designed and Developed by GrayGrids - @Copyright 2022 - <?php echo date("Y") ?> - Powered By <?=$config->n_perusahaan?> | DoniHMRs</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12">
                            <ul class="socila">
                                <li>
                                    <span>Follow Us On:</span>
                                </li>
								<?php foreach ($medias as $value) { ?>
									<li>
										<a target="_blank" href="<?=$value->link?>" class="<?=$value->type?>"><i class="lineHeight2-5 lni lni-<?=$value->type?>-filled"></i></a>
									</li>
								<?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom -->
    </footer>
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="<?php echo asset_url();?>/js/bootstrap.min.js"></script>
    <script src="<?php echo asset_url();?>/js/tiny-slider.js"></script>
    <script src="<?php echo asset_url();?>/js/glightbox.min.js"></script>
    <script src="<?php echo asset_url();?>/js/main.js"></script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
</body>

</html>