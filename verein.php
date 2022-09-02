<?php
/**
 * Template Name: Vereinsseite
 *
 * Description: A custom template for the Vereins Page
 *
 */
get_header();
?>
	<div id="content" class="full-width">
		<?php while ( have_posts() ) : the_post(); ?>
			<article>
				<header>
					<h2><?php the_title(); ?></h2>
				</header>
				<div>
					<?php
					$db = new mysqli( "ligen.ufra-schach.de", "d003f2a0", "qwat20rat", "d003f2a0" );
					$db->set_charset( 'utf8' );
					$season = $db->query( "SELECT * FROM seasons WHERE state='running' limit 1" );
					$id     = mysqli_fetch_object( $season );
					$club   = $db->query( "SELECT SQL_CALC_FOUND_ROWS id_club, name, zps FROM clubs WHERE is_visible=1 ORDER BY city, name" );
					$anzahl = $db->query( "SELECT FOUND_ROWS()" );
					$menge = $anzahl->fetch_row();
					$link   = '<a href="http://ligen.ufra-schach.de/Showclub/Showclubdata/id_season/';
					$nr     = 1;
					echo "<div style='overflow:hidden;'>";
					for ( $i = 0; $i < 3; $i ++ ) {
						$count = 1;
						echo "<div style='float:left;padding-left:5pt;'>";
						echo "<table>";
						echo "<tr><th>Nr.</th><th>ZPS</th><th>Verein</th></tr>";
						while ( $count <= $menge[0] / 2.5 && $nr <= $menge[0] ) {
							$row = mysqli_fetch_object( $club );
							echo "<tr>";
							echo "<td>" . $nr ++ . "</td>";
							echo "<td>" . $row->zps . "</td>";
							echo '<td>' . $link . $id->id_season . '/id_club/' . $row->id_club . '" target="_blank">' . $row->name . "</a></td>";
							echo "</tr>";
							$count ++;
						}
						echo "</table></div>";
					}
					echo "</div>";
					?>
				</div>
			</article>
		<?php endwhile; ?>
	</div><!-- end content -->
<?php get_footer(); ?>