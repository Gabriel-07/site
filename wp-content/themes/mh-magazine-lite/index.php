<?php get_header(); ?>

<div class="mh-wrapper clearfix">
	<div id="main-content" class="mh-content">

<div id="slider">
	<?php echo do_shortcode ( '[advps-slideshow optset="1"]' ); ?>
</div>

		<?php mh_before_page_content(); ?>
		<?php if (category_description()) { ?>
			<section class="cat-desc">
				<?php echo category_description(); ?>
			</section>
		<?php } ?>
		<?php mh_loop_content(); ?>
	</div>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
