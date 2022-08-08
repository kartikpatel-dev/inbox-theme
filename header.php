<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>AR Digital</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo get_theme_file_uri();?>/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri();?>/style.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
  </head>
  <body>
  <main>
<?php 
$custom_logo_id = get_theme_mod( 'custom_logo' );
$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
if(!is_front_page()){
?>
<header class="main-header inner-page">
<?php }else{?>
  <header class="main-header">
<?php } ?>
    <div class="navbar shadow-sm mainnavbars">
      <div class="container">
        <a href="<?php echo home_url();?>" class="navbar-brand d-flex align-items-center">
          <img src="<?php echo  esc_url( $logo[0] );?>" alt="AR DIGITAL"> 
        </a>
        <div class="mainmenu" onclick="openHeaderMenu()">
          <span></span>
          <span></span>
          <span></span>
        </div>

        <div id="header-menu-main" class="header-menu-main">
          <div class="header-inner">
            <div class="header-menu-explore">
              <span class="explore-title">Explore menu</span>
              <span class="close-menu"  onclick="closeHeaderMenu()"><img src="/ardigital/wp-content/uploads/2022/05/close.png"></span>
            </div>

            <div class="header-menu-nav">
              <?php
  			wp_nav_menu( array( 
  				'theme_location' => 'ar-menu', 
  				'container_class' => 'ar-menu-nav' ) ); 
  			?>
              <div class="header-menu-touch">
                <div class="hmt-title">Get in touch</div>
                <a href="mailto:youremail@gmail.com">youremail@gmail.com</a>
                <a href="tel:919876543210">+91 98765 43210</a>
              </div>
            </div>

            <div class="header-menu-social">
              <a href="#" class="hms-fb">fb</a>
              <a href="#" class="hms-ln">ln</a>
              <a href="#" class="hms-be">Be</a>
              <a href="#" class="hms-pi">pi</a>
              <a href="#" class="hms-in">in</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>