<?php get_header();
	while(have_posts()){
		the_post()
?>
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
<?php } get_footer(); ?>