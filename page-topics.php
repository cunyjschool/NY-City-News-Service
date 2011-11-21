<?php
/*
Template Name: Taxonomy - Topics
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
			$topics = get_terms( 'nycns_topics', $args );
			if ( count( $topics ) > 0 ) {
 				$html = '';
				foreach ( $topics as $topic ) {
					$html .= "<a href='" . get_bloginfo( 'url' ) . "/topics/" . $topic->slug . "'>" . $topic->name . "</a> (" . $topic->count . "), ";
				}
				echo rtrim( $html, ', ' );
			}
			?>
		</div>
		
  </div>
  
<?php get_footer(); ?>