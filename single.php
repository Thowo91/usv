<?php get_header(); ?>
<?php
if ( function_exists( usv_breadcrumb_shortcode ) ) {
	echo do_shortcode( '[breadcrumb]' );
}
?>
<div>
	<?php get_template_part( 'content', 'single' ); ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
