<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?=$config->n_perusahaan?> | <?=$title?></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>favicon.ico" />
    <meta content='jual,nomor,cantik,telkomsel,murah,jakarta,jabodetabek,indonesia' name="keywords" />
    <meta content='Jual nomor cantik telkomsel dengan harga merah seluruh indonesia' name="description" />
    <meta content='<?=$config->n_perusahaan?> - Jual Nomor Cantik Telkomsel' property="og:title" />
    <meta content='<?=$config->n_perusahaan?> - Jual Nomor Cantik Telkomsel Murah Seluruh Indonesia' property="og:description" />
    <meta content='<?=base_url()?>public/image/<?=$config->logo?>' property="og:image" />
    <meta content='<?=base_url()?>' property="og:url" />
    <meta content='website' property="og:type" />
    <meta content='image/jpg' property="og:image:type" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="<?php echo asset_url();?>css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/tiny-slider.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/glightbox.min.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/main.css" />
    <link rel="stylesheet" href="<?php echo asset_url();?>css/custom.css" />

    <script src="<?php echo asset_url();?>vendor/jquery/jquery-3.6.0.min.js"></script>

</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                              <li><a href="<?=base_url()?>">Home</a></li>
                              <li><a href="<?=base_url()?>contact">Hubungi Kami</a></li>
                              <li><a href="<?=base_url()?>about">Tentang Kami</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <!-- <div class="top-end">
                            <div class="user">
                                <i class="lni lni-user"></i>
                                Hello
                            </div>
                            <ul class="user-login">
                                <li>
                                    <a href="login.html">Sign In</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="index.html">
                          <img src="<?php echo base_url();?>public/image/<?=$top?>" alt="Logo" />
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <div class="navbar-search search-style-5">
                                <div class="search-select">
                                    <div class="select-position">
                                        <select id="select1">
                                            <option selected>All</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-input">
                                  <form id="formSearch" method="GET" action="<?=base_url()?>search" class="search_form">
                                    <input type="text" name="q" Placeholder="contoh, 0812">
                                  </form>
                                </div>
                                <div class="search-btn">
                                    <button type="submit" form="formSearch"><i class="lni lni-search-alt"></i></button>
                                </div>
                            </div>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>Hotline:
                                    <span><?=$config->phone?> / <?=$config->hp?></span>
                                </h3>
                            </div>
                            <div class="navbar-cart">

              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        