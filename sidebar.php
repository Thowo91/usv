<?php
/**
 * @package WordPress
 * @subpackage USV
 */
?>

<div id="sidebar" role="complementary">

	<?php
	if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Home-Sidebar' ) ) : ?>
	<?php endif; ?>

</div><!-- end sidebar -->