<?php
/*
Template Name: Taxonomy - Places
*/

?>

<?php get_header(); ?>

  <div id="content" class="clearfix">

		<div class="post">
			<?php
			$args = array(
				'orderby' => 'name',
				'hide_empty' => false,
			);
			$places = get_terms( 'nycns_places', $args );
			if ( count( $places ) > 0 ) {
 				$html = '';
				foreach ( $places as $place ) {
					$html .= "<a href='" . get_bloginfo( 'url' ) . "/place/" . $place->slug . "'>" . $place->name . "</a> (" . $place->count . "), ";
				}
				echo rtrim( $html, ', ' );
			}
			?>
		</div>
		
  </div>
  
<?php get_footer(); ?>