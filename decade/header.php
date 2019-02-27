<!DOCTYPE HTML>
<html <?php language_attributes() ?>>
    <head>
        <!--DEBUG21-->
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php wp_head();?>
        <link href="https://fonts.googleapis.com/css?family=Teko:600" rel="stylesheet">
        <meta charset="<?php bloginfo('charset')?>">
    </head>
    <body>
        <center>
            <div class="container">
                <?php $sliderPosts = new WP_Query(array('post_type'=>'slider'));?>
                <div class="row">
                    <div class="col">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <?php while($sliderPosts-> have_posts()){
                        $sliderPosts->the_post();
                    ?>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <a <?php if(get_field('slider_link_1')):?>href="<?php the_field('slider_link_1') ?>"<?php endif;?>>
                                        <img class="header-bg" src="<?php the_field('slider_image_1'); ?>"></a>
                                </div>
                                <div class="item">
                                    <a <?php if(get_field('slider_link_2')): ?>href="<?php the_field('slider_link_2') ?>"<?php endif; ?>>
                                        <img class="header-bg" src="<?php the_field('slider_image_2'); ?>"></a>
                                </div>
                                <div class="item">
                                    <a<?php if(the_field('slider_link_3')): ?>href="<?php the_field('slider_link_3') ?>"<?php endif; ?>>
                                        <img class="header-bg" src="<?php the_field('slider_image_3'); ?>"></a>
                                </div>
                                <?php } wp_reset_postdata();?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- navigation bars
                    TO DO:
                    * see that it works (see below)
                 -->
                <div class="row">
                    <div class="col">
                        <!--mobile navbar
                            * see that mobile works in other browsers (IE, Moz, Safari(at the end))
                        -->
                        <div class="nav hamburger">
                            <label for="nav-toggle">MENU</label>
                            <input type="checkbox" id="nav-toggle" class="nav-toggle">     
                            <div class="menu">
                              <input type="checkbox" id="nav-toggle" class="nav-toggle">
                              <a id="home-btn" class="nav-link active dropdown-links" href="<?php echo site_url() ?>">HOME</a>
                              <a class="nav-link dropdown-links" href="<?php echo esc_url(site_url('/news')) ?>">NEWS</a>
                              <a class="nav-link dropdown-links" href="<?php echo esc_url(site_url('/events')) ?>">SHOWS</a>
                              <a class="nav-link dropdown-links" href="<?php echo esc_url(site_url('/media'))?>">MEDIA</a>
                              <a class="nav-link dropdown-links" href="<?php echo esc_url(site_url('/about')) ?>">ABOUT</a>
                              <a id="contact-btn" class="nav-link dropdown-links" href="<?php echo esc_url(site_url('/contact')) ?>">CONTACT</a>   
                            </div>
                        </div>
                        <!-- DESKTOP NAV BAR -->
                        <nav class="nav my-bar">
                          <a id="home-btn" class="nav-link active decade-links" href="<?php echo site_url() ?>">HOME</a>
                          <a class="nav-link decade-links" href="<?php echo esc_url(site_url('/news')) ?>">NEWS</a>
                          <a class="nav-link decade-links" href="<?php echo esc_url(site_url('/events')) ?>">SHOWS</a>
                            <img id="centerpiece" src="<?php echo get_theme_file_uri('img/d-symbol.png');?>">
                          <a class="nav-link decade-links" href="<?php echo esc_url(site_url('/media'))?>">MEDIA</a>
                          <a class="nav-link decade-links" href="<?php echo esc_url(site_url('/about')) ?>">ABOUT</a>
                          <a id="contact-btn" class="nav-link decade-links" href="<?php echo esc_url(site_url('/contact')) ?>">CONTACT</a>   
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <hr class="red-border">
                    </div>
                </div>