<?php get_header(); ?>
<?php
if ( function_exists( 'usv_breadcrumb_shortcode' ) ) {
	echo do_shortcode( '[breadcrumb]' );
}
?>
<main id="content">
	<h2>ARTIKEL DER KATEGORIE: <?php single_cat_title( '', true ); ?></h2>
	<p><?php if ( count( category_description() ) ) : ?>
			<?php echo category_description(); ?>
		<?php endif; ?></p>
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

	<?php endwhile; ?>
	<?php
	if ( function_exists( 'usv_pagination_shortcode' ) ) {
		echo do_shortcode( '[pagination]' );
	}
	?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
