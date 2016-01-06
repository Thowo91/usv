<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h2 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
		<span class="updated"><?php echo get_the_date( 'l, j. F Y' ); ?></span>
		<span class="vcard author"><span class="fn" style="display:none;"><?php the_author() ?></span></span>
	</header>
	<div>
		<?php the_content(); ?>
		<footer>
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