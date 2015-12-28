<?php while ( have_posts() ) : the_post(); ?>
<h3>Content Single</h3>
<article>
	<header>
		<h2><?php the_title(); ?></h2>
		<span><?php echo get_the_date('l, j. F Y'); ?></span>
	</header>
	<div>
		<?php the_content(); ?>
		<footer>
			<p>Kategorie, Tag, Permalink</p>
		</footer>
	</div>
</article>
<?php endwhile; ?>