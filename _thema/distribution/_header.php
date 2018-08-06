<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <meta name="keyword" content="<?php echo $keyword; ?>">
    <meta name="description" content="<?php echo $desc; ?>">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="<?php echo $url; ?>/css/fontastic.css">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Fancybox-->
    <link rel="stylesheet" href="<?php echo $url; ?>/vendor/@fancyapps/fancybox/jquery.fancybox.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo $url; ?>/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo $url; ?>/css/custom.css">
    <script src="<?php echo $url; ?>/vendor/jquery/jquery.min.js"></script>
    <!-- Favicon
    <link rel="shortcut icon" href="<?php echo $url; ?>favicon.png">
    -->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="search-area">
            <div class="search-area-inner d-flex align-items-center justify-content-center">
                <div class="close-btn"><i class="icon-close"></i></div>
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                        <form action="#">
                            <div class="form-group">
                                <input type="search" name="search" id="search" placeholder="What are you looking for?">
                                <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="navbar-header d-flex align-items-center justify-content-between">
                <a href="<?php echo $h_menu["Home"]; ?>" class="navbar-brand"><?php echo $title; ?> </a>
                <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
            </div>

            <div id="navbarcollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <?php
                        foreach($h_menu as $k=>$v) {
                            
                            if ($vFIle == "main") {
                                if ($k == "Home") {
                                    $active = "active";
                                }else {
                                    $active = "";
                                }    
                            }else if ($vFIle == "news") {
                                if ($k == "News") {
                                    $active = "active";
                                }else {
                                    $active = "";
                                } 
                            }else if ($vFIle == "blog") {
                                if ($k == "Blog") {
                                    $active = "active";
                                }else {
                                    $active = "";
                                } 
                            
                            }else if ($vFIle == "tickers") {
                                if ($k == "Tickers") {
                                    $active = "active";
                                }else {
                                    $active = "";
                                } 
                            }
                    ?>
                    <li class="nav-item">
                        <a href="<?php echo $v; ?>" class="nav-link <?php echo $active; ?> "><?php echo $k; ?></a>
                    </li>
                    <?php 
                        }
                    ?>
                    
                </ul>
                <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
                <ul class="langs navbar-text">
                    <a href="#" class="active">KRW</a>
                    <span>           </span>
                    <a href="#">EN</a>
                    <span>           </span>
                    <a href="#">CNY</a>
                </ul>
            </div>
        </div>
    </nav>
</header>
    
<!-- Hero Section-->
<!--<section style="background: url(<?php echo $url; ?>/img/hero.jpg); background-size: cover; background-position: center center" class="hero">-->
<section style="background: url(<?php echo $url . "/img/custom/main-0.jpg";?>); background-size: cover; background-position: center center" class="hero">

    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h1><?php echo $title; ?></h1>
                <br>
                EOS / TRON / TUBE / Blockchain Media 
                <br>
                <a href="#" class="hero-link">More</a>
            </div>
        </div>
        <a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
    </div>
</section>

<!-- Intro Section-->
<section class="intro">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        <h2 class="h3"><font style="color:gray"><?php echo date("Y-m-d"); ?></font> Hot Issue</h2>
        <br>
          <p class="text-big"></p>
          <p>
            <?php if ( strtotime(date("Y-m-d H:i:s") ) < strtotime(date("2018-07-29 24:00:00") ) ) { ?>
            
            <marquee scrollamount="4">    
                <strong>ONO </strong> 
                <a href="https://www.onoico.com/" target="_blank"><font style="color:gray">ONO</font></a>  Sale ! 
            </marquee> 
            <br><hr>
            <?php }?>
            <?php if ( strtotime(date("Y-m-d H:i:s") ) < strtotime(date("2018-07-30 12:00:00") ) ) { ?>
            <marquee scrollamount="3">      
                <strong>TRON </strong> 
            <a href="https://tron.network/" target="_blank"><font style="color:gray">TVM</font></a> Countdown ! 
            </marquee>      
            <br><hr>
            <?php }?>
            <marquee scrollamount="4">
                <strong>EOS </strong> 
                <font style="color:gray">Voting</font> on Producers ! 
            </marquee>
            <hr>
            <marquee scrollamount="3">
                <strong>TUBE </strong>
                <font style="color:gray">There is no news.</font>
            </marquee>
          </p>
        </div>
      </div>
    </div>
</section>