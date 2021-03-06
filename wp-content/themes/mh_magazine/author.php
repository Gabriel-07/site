<?php $options = get_option('mh_options'); ?>
<?php get_header(); ?>
<div class="wrapper clearfix">
	<div class="main">
		<section class="content <?php mh_content_class(); ?>">
			<?php mh_before_page_content(); ?>
			<?php mh_author_box(); ?> 
			<?php mh_loop_content(); ?>	
		</section>
		<aside class="sidebar <?php mh_sb_class(); ?>">
    		<?php dynamic_sidebar('sidebar'); ?>     
		</aside>
	</div>
    <?php mh_second_sb(); ?>
</div>
<?php get_footer(); ?>