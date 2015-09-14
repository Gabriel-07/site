<?php get_header(); ?>

<!--Begin Feaured Article-->
<?php if (get_option('bold_featured') == 'false') { ?>
<?php { echo ''; } ?>
<?php } else { get_template_part('includes/featured'); } ?>
<!--End Feaured Article-->

<div id="content">
<img src="<?php bloginfo('template_directory'); ?>/images/content-top.gif" alt="top" style="float: left;" />
<div id="left-div">
    <?php if (get_option('bold_blog_style') == 'on') { ?>
    <?php include(TEMPLATEPATH.'/includes/blogstylehome.php'); ?>
    <?php } else { include(TEMPLATEPATH.'/includes/default.php');
	} ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>

</body>
</html>
