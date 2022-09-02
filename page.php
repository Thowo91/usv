<?php
/**
 * @package WordPress
 * @subpackage USV
 */

get_header(); ?>

<main id="content" class="full-width">
	<?php while ( have_posts() ) : the_post(); ?>
		<article>
			<header>
				<h2 class="entry-title"><?php the_title(); ?></h2>
			</header>
			<div>
				<?php the_content(); ?>
			</div>
		</article>
	<?php endwhile; ?>
</main><!-- end content -->
<?php get_footer(); ?>
