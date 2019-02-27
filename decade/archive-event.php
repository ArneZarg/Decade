<?php get_header();?>
                <div class="row">
                    <div class="col">
                        <h1 class="section-headings">
                            ALL SHOWS AND EVENTS</h1>
                    </div>
                </div>
                <div class="row">
                    <?php 
                    $Events = new WP_Query(array(
                        'paged' => get_query_var('paged', 1),
                        'post_type'=>'event',
                        'posts_per_page' => 10,
                        'meta_key' => 'event_date',
                        'orderby' => 'meta_value',
                        'order' => 'DESC'));
                    while($Events->have_posts()) {
                        echo $Events->the_post();
                      ?>
                    <div class="col">
                        <p class="shows"><?php $eventDate = new DateTime(get_field("event_date")); 
                            echo $eventDate->format('m'); ?>/
                            <?php $eventDate = new DateTime(get_field("event_date")); echo $eventDate->format('d'); ?>/
                            <?php $eventDate = new DateTime(get_field("event_date")); echo $eventDate->format('Y'); ?> 
                            <?php $eventDate = new DateTime(get_field("event_date")); echo $eventDate->format('g:i a'); ?> - <?php the_field('venue'); ?> - <?php the_field('price'); ?> - <?php the_field('event_description'); ?> - 
                            <a href="<?php the_permalink() ?>">Click here for Event Details</a>
                        </p>
                    </div>
                <?php } 
                wp_reset_postdata();
                ?>
                </div>
                <div>
                    <nav class="nav pag-nav">
                        <ul>
                            <!--paginate links goes in here-->
                            <li class="pagination"><?php echo paginate_links(array('total'=> $Events->max_num_pages));?></li>
                        </ul>
                    </nav>
                </div>
<?php get_footer();?>