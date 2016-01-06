<?php get_header(); ?>
<?php
if ( function_exists( usv_breadcrumb_shortcode ) ) {
	echo do_shortcode( '[breadcrumb]' );
}
?>
<main id="content">
	<?php get_template_part( 'content', 'page' ); ?>
</main>
<?php get_footer(); ?>
