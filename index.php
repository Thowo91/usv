<?php get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
	<?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; ?>
<?php
if ( function_exists( usv_pagination_shortcode ) ) {
	echo do_shortcode( '[pagination]' );
}
?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
