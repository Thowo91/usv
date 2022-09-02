<?php
/**
 * @package WordPress
 * @subpackage USV
 */

get_header(); ?>

	<main id="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav>
				<?php wp_pagenavi(); ?>
			</nav><!-- end pagenavi-->
		<?php endif; ?>
	</main><!-- end content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>