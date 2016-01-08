<?php
/*
Template Name: Archives
*/
get_header(); ?>
	<main id="content"><?php
		the_archive_title( '<h1>', '</h1>' );
		the_archive_description( '<div>', '</div>' ); ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', get_post_format() ); ?>

		<?php endwhile; ?>
		<?php
		if ( function_exists( usv_pagination_shortcode ) ) {
			echo do_shortcode( '[pagination]' );
		}
		?>
	</main>
<?php get_footer(); ?>