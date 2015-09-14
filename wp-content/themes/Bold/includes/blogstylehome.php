<?php get_header(); ?>
<?php
if (get_option('bold_duplicate') == 'false') {
	$args=array(
	   'showposts'=> (int) get_option('bold_homepage_posts'),
	   'post__not_in' => $ids,
	   'paged'=>$paged,
	   'category__not_in' => (array) get_option('bold_exlcats_recent'),
	);
} else {
	$args=array(
	   'showposts'=> (int) get_option('bold_homepage_posts'),
	   'paged'=>$paged,
	   'category__not_in' => (array) get_option('bold_exlcats_recent'),
	);
};
query_posts($args);
if (have_posts()) : while (have_posts()) : the_post(); ?>

		<?php get_template_part('includes/blogstyle-content'); ?>	
	<?php endwhile; ?>
	<div style="clear: both;"></div>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } 
else { ?>
<p class="pagination">
    <?php next_posts_link(esc_html__('&laquo; Previous Entries','Bold')) ?>
	<?php previous_posts_link(esc_html__('Next Entries &raquo;','Bold')) ?>
</p>
<?php } ?>
    <?php else : ?>
		<!--If no results are found-->
		<div class="single-post-wrap"> 
		<h1><?php esc_html_e('No Results Found','Bold') ?></h1>
		<p><?php esc_html_e('The page you requested could not be found. Try refining your search, or use the navigation above to locate the post.','Bold') ?></p>
		</div>
		<!--End if no results are found-->
    <?php endif; ?>
	<?php wp_reset_query(); ?>