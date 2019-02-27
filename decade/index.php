<?php get_header();?>
<div class="row">
                    <div class="col">
                        <h1 class="section-headings"><?php if(is_category()){
                                    single_cat_title();
                                }
                                if(is_author()){
                                    echo "Posts by "; the_author();
                                }?></h1>
                    </div>
                </div>
                <div id="latest-news" class="row">
                    <?php while(have_posts()){
                        the_post();
                     ?>
                    <div class="col news-section" >
                        <a class="news-links" href="<?php the_permalink(); ?>"><img class="news-thumbnails" src="<?php the_field('post_thumbnail') ?>"><h2 class="news-headlines"><?php echo get_the_title() ?></h2></a>
                    </div>
                <?php } wp_reset_postdata(); ?>
                </div>
                <div>
                    <nav class="nav pag-nav">
                        <ul>
                            <!--paginate links goes in here-->
                            <li class="pagination"><?php echo paginate_links();?></li>
                        </ul>
                    </nav>
                </div>
<?php get_footer();?>