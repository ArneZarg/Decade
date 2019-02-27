<?php get_header(); ?>
<?php $eventArchive = new WP_Query(array(
                        'post_type' => 'event'
                    )); ?>
<?php while(have_posts()){
	the_post();?>
<div class="row">
	<div class="col">
		<h1 class="section-headings"><?php the_title(); ?></h1>
	</div>
</div>
<div class="row">
	<div class="col generic-content">
		<?php the_content(); ?>
	</div>
</div>
<div class="row">
	<div class="col">
		<?php the_content(); ?>
		<a href="<?php the_field('event_link')?>"><p>Click here for the Facebook Event</p></a>
		<a href="<?php echo esc_url(site_url('/events')) ?>"><p>Back to Events</p></a>
    </div>
</div>
<?php } get_footer(); ?>