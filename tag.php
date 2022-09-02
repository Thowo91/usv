<?php
/**
 * @package WordPress
 * @subpackage USV
 */

get_header(); ?>

	<div id="content" role="main">
		<article>
			<h2>ARTIKEL ZUM SCHLAGWORT: <?php single_tag_title( '', true ); ?></h2>
		</article>
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<header>
					<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<span class="post-info"><?php echo get_the_date( 'l, j. F Y' ); ?></span>
				</header>
				<div>
					<?php the_content(); ?>
					<div class="clearfix"></div>
				</div>
				<footer class="post-info">
					<p><?php if ( get_the_category_list() ) : ?>
							Kategorien: <?php echo get_the_category_list( ', ' ); ?> |
						<?php endif; ?>
						<?php if ( get_the_tag_list() ) : ?>
							<?php echo get_the_tag_list( 'Schlagwörter: ', ', ', ' |' ); ?>
						<?php endif; ?>
						<a href="<?php echo get_permalink(); ?>">Permalink</a>
					</p>
				</footer>
			</article>
		<?php endwhile; ?>
		<?php global $wp_query;
		if ( $wp_query->max_num_pages > 1 ) : ?>
			<nav>
				<?php wp_pagenavi(); ?>
			</nav><!-- end pagenavi-->
		<?php endif; ?>
	</div><!-- end content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>