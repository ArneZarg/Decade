<?php get_header();?>
<!--MAIN BODY-->
                <div class="row">
                    <div class="col">
                        <h1 class="section-headings">LATEST NEWS</h1>
                    </div>
                </div>
                 <?php
                
                $blogPosts = new WP_Query(array(
                  'posts_per_page' => 6
                  ));
                 ?>
                <div id="latest-news" class="row">
                    <?php while($blogPosts->have_posts()){
                        echo $blogPosts->the_post();
                     ?>
                    <div class="col news-section" >
                        <a class="news-links" href="<?php the_permalink(); ?>"><img class="news-thumbnails" src="<?php the_field('post_thumbnail') ?>"><h2 class="news-headlines"><?php echo get_the_title() ?></h2></a>
                    </div>
                <?php } wp_reset_postdata(); ?>
                </div>
                <div class="row">
                    <div class="col">
                        <h1 class="section-headings">UPCOMING SHOWS</h1>
                    </div>
                </div>
                <div class="row">
                    <?php 
                      $today = date('Y-m-d');
                      $homepageEvents = new WP_Query(array(
                        'post_type'=>'event',
                        'posts_per_page' => 3,
                        'meta_key' => 'event_date',
                        'orderby' => 'meta_value',
                        'order' => 'ASC',
                        'meta_query' => array(
                            array(
                        'key' => 'event_date',
                        'value' => $today." 00:00:00",
                        'compare' => '>=',
                        'type' => 'numeric'
                      )
                    )
                  ));
                    while($homepageEvents->have_posts()) {
                       echo $homepageEvents->the_post();
                      ?>
                    <div class="col">
                        <p class="shows"><?php $eventDate = new DateTime(get_field("event_date")); echo $eventDate->format('m'); ?>/<?php $eventDate = new DateTime(get_field("event_date")); echo $eventDate->format('d'); ?>/<?php $eventDate = new DateTime(get_field("event_date")); echo $eventDate->format('Y'); ?> <?php $eventDate = new DateTime(get_field("event_date")); echo $eventDate->format('g:i a'); ?> - <?php the_field('venue'); ?> - <?php the_field('price'); ?> - <?php the_field('event_description'); ?> - <a href="<?php the_permalink(); ?>">Click here for Event Details</a></p>
                    </div>
                <?php } wp_reset_postdata();?>
                </div>
<?php get_footer(); ?>