<?php get_header(); ?>
<?php
if ( function_exists( usv_breadcrumb_shortcode ) ) {
	echo do_shortcode( '[breadcrumb]' );
}
?>
<main id="content">
	<article>
		<header>
			<h2>Nichts gefunden</h2>
		</header>
		<div>
			<p>Entschuldigung, aber die Seite konnte leider nicht gefunden werden</p>
		</div>
	</article>
</main>
	// Hier Suche einbauen
<?php get_footer(); ?>