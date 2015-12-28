<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<nav>
	<ul>
		<li>A</li>
		<li>B</li>
		<li>C
			<ul>
				<li>C1</li>
				<li>C2</li>
				<li>C3</li>
			</ul>
		</li>
		<li>D</li>
	</ul>
</nav>
