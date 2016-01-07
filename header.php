<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>

<body id="navi-open" <?php body_class(); ?>>
<div id="page">
	<header id="branding">
		<h1><?php bloginfo( 'name' ); ?></h1>
		<nav id="main-nav">
			<?php wp_nav_menu( array( 'theme_location' => 'header-nav' ) ); ?>
		</nav>
		<a class="nav-toggle nav-show" href="#navi-open">MENU</a>
		<a class="nav-toggle nav-hide" href="#navi-schliessen">MENU</a>
	</header>
	<div id="wrap">
