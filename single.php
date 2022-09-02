<?php
/**
 * @package WordPress
 * @subpackage USV
 */

get_header(); ?>

	<style type="text/css">
		.menu-item-home {
			background: #CF5C3F;
			color: #fff;
			text-shadow: none !important;
		}
	</style>
	<div id="content">
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<header>
					<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
					<span class="post-info updated"><?php echo get_the_date( 'l, j. F Y' ); ?></span>
<span class="vcard author"><span class="fn" style="display:none;"><?php the_author() ?></span></span>
				</header>
				<div>
					<?php the_content(); ?>
					<div class="clearfix"></div>
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
				</div>
			</article>
		<?php endwhile; ?>
	</div><!-- end content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>