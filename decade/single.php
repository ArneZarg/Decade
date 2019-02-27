<?php get_header(); ?>
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
		Posted by <?php the_author_posts_link()?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(',') ?>
		<p><a href="<?php echo esc_url(site_url('/news')) ?>">Back to Main News Page</p>
	</div>
</div>
<?php } get_footer(); ?>