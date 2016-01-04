<?php get_header(); ?>
<?php
if ( function_exists( usv_breadcrumb_shortcode ) ) {
	echo do_shortcode( '[breadcrumb]' );
}
?>
<div>
	<?php get_template_part( 'content', 'page' ); ?>
</div>
<?php get_footer(); ?>
