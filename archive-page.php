<?php
/*
Template Name: Archiv Page Template
*/
get_header(); ?>
	<main id="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<h1><?php the_title(); ?></h1>
				</header>
				<h2>Artikel im Monat:</h2>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
				<h2>Artikel des Jahres:</h2>
				<ul>
					<?php wp_get_archives( 'type=yearly' ); ?>
				</ul>
			</article>

		<?php endwhile; ?>
		<?php
		if ( function_exists( 'usv_pagination_shortcode' ) ) {
			echo do_shortcode( '[pagination]' );
		}
		?>
	</main>
<?php get_footer(); ?>