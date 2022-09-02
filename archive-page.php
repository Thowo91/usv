<?php
/**
 * Template Name: Archive Page Template
 *
 * Description: A custom archive page with tags, latest posts and a monthly archive
 *
 */

get_header(); ?>

	<div id="content" class="full-width">	

		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				<h2>Artikel im Monat:</h2>
				<ul>
					<?php wp_get_archives(array('type' => 'monthly', 'show_post_count' => 'true')); ?>  
				</ul>
				<h2>Artikel des Jahres:</h2>
				<ul>
					<?php wp_get_archives(array('type' => 'yearly', 'show_post_count' => 'true')); ?>
				</ul>
			</article><!-- #post -->

		<?php endwhile; // end of the loop. ?>

	</div><!-- end content -->
	<?php get_footer(); ?>