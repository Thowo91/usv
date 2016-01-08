<?php get_header(); ?>
<?php
if ( function_exists( usv_breadcrumb_shortcode ) ) {
	echo do_shortcode( '[breadcrumb]' );
}
?>
<main id="content">
	<h2>ARTIKEL ZUM SCHLAGWORT: <?php single_tag_title('',true); ?></h2>
	<p><?php if ( count(tag_description())) : ?>
		<?php echo tag_description(); ?>
	<?php endif; ?></p>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; ?>
	<?php
	if ( function_exists( usv_pagination_shortcode ) ) {
		echo do_shortcode( '[pagination]' );
	}
	?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
