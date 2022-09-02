<?php
/**
 * @package WordPress
 * @subpackage USV
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> id="Top">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php if ( have_posts() && is_single() ):while ( have_posts() ):the_post();
		echo get_the_excerpt(); endwhile;
	else: if ( is_home() ):bloginfo( 'description' ); endif; endif; ?>">
	<link rel="shortcut icon" href="<?php print IMG; ?>/usv_wap.ico" type="image/icon"/>
	<link rel="apple-touch-icon-precomposed" href="<?php print IMG; ?>/usv_wap.png">
<script type="application/ld+json">
{"@context": "http://schema.org","@type": "Organization","url": "<?php echo home_url(); ?>","logo": "<?php print IMG; ?>/usv_wap.png"}
</script>
<?php if(is_home()): ?>
<script type="application/ld+json">
{"@context":"http://schema.org","@type":"WebSite","url":"<?php echo home_url(); ?>","name":"<?php bloginfo( 'name' ); ?>","potentialAction":{"@type":"SearchAction","target":"<?php echo home_url(); ?>/?s={search_term_string}","query-input":"required name=search_term_string"}}
</script>
<?php endif; ?>
	
	<?php
#twitter cards hack
if(is_single()) {
  $twitter_url    = get_permalink();
 $twitter_title  = get_the_title();
 $twitter_desc   = get_the_excerpt();
	
  $output = preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $post->post_content, $matches);
	
    $twitter_thumb  = $matches[1][0];
      if(!$twitter_thumb) {
      $twitter_thumb = IMG. '/usv_wap.png';
    }
?>
<meta name="twitter:card" value="summary" />
<meta name="twitter:url" value="<?php echo $twitter_url; ?>" />
<meta name="twitter:title" value="<?php echo $twitter_title; ?>" />
<meta name="twitter:description" value="<?php echo $twitter_desc; ?>" />
<meta name="twitter:image" value="<?php echo $twitter_thumb; ?>" />
<?
}
?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page">
	<header id="branding">
		<p><a href="<?php echo home_url(); ?>"><img id="logo" src="<?php print IMG; ?>/usv_wap.png" alt="USV Logo"></a>
			<strong><a href="<?php echo home_url(); ?>"
			           style="font-size:xx-large;"><?php bloginfo( 'name' ); ?></a></strong><br>
				<span class="visible-sm">Bezirksverband des <a href="http://www.schachbund-bayern.de/" target="_blank">Bayerischen
						Schachbundes</a> im <a href="http://www.schachbund.de/" target="_blank">Deutschen Schachbund
						e.V.</a>
					<br>und <a href="http://www.blsv.de/" target="_blank">Bayerischen Landessportverband</a></span></p>
		<a class="menu_button" href="#"><em class="fa fa-bars"></em> MENU</a>
		<nav><?php wp_nav_menu( array( 'theme_location' => 'header-nav' ) ); ?></nav>
	</header><!-- end header -->
	<div id="wrap">