<?php
/*
Template Name: Taxonomy - Publications
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
			$publications = get_terms( 'nycns_publications', $args );
			if ( count( $publications ) > 0 ) {
 				$html = '';
				foreach ( $publications as $publication ) {
					$html .= "<a href='" . get_bloginfo( 'url' ) . "/publications/" . $publication->slug . "'>" . $publication->name . "</a> (" . $publication->count . "), ";
				}
				echo rtrim( $html, ', ' );
			}
			?>
		</div>
		
  </div>
  
<?php get_footer(); ?>