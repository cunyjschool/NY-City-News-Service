<?php get_header(); ?>

<div class="main">

<div class="wrap">
	
<div class="content">	

	<div class="primary-search">
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>	
	</div>

	<?php
		global $nycns, $wp_query;
		$search_array = explode( ' ', get_search_query() );
		$args = array(
			'search' => get_search_query(),
			'orderby' => 'none',
		);
		if ( $wp_query->query_vars['paged'] <= 1 )
			$matching_terms = get_terms( $nycns->theme_taxonomies, $args );
	
		if ( count( $matching_terms ) ) {
			echo '<div class="all-matching-terms">Looking for? ';
			$all_terms = '';
			foreach ( $matching_terms as $matching_term ) {
				$term_name = new Highlighter( $matching_term->name, $search_array );
				$term_name->mark_words();
				$all_terms .= '<a href="' . get_term_link( $matching_term, $matching_term->taxonomy ) . '">' . $term_name->get() . '</a>, ';
			}
		
			echo rtrim( $all_terms, ', ' );
			echo '</div>';
		}
	?>

	<?php if ( have_posts() ): ?>

	<?php while (have_posts()) : the_post(); ?>
	
	<div class="post" id="post-<?php the_ID(); ?>">

		<?php if ( has_post_thumbnail()) { 	   
			the_post_thumbnail(  'thumbnail', array( 'class' => 'thumb float-right' ) ); 
	  	} ?>
		<?php
			$high_title = new Highlighter( $post->post_title, $search_array );
			$high_title->mark_words();		
		?>
  		<h3><a href="<?php the_permalink() ?>"><?php echo $high_title->get(); ?></a></h3>

		<div class="meta"><?php nycns_author_posts_link(); ?> - <?php nycns_timestamp(); ?></div>
  		
		<?php
			$high_content = new Highlighter( $post->post_content, $search_array );
			$high_content->text = $high_content->strip( $high_content->text );
			$high_content->zoom( 10, 175 );
			$high_content->mark_words();
		?>
		<div class="entry">					
			<?php echo $high_content->get(); ?>
		</div>

	</div>

    <?php endwhile; ?>

  	<div class="navigation">
  		<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
  		<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
  	</div>

    <?php else : ?>

	<div class="message error">No posts found. Try a different search?</div>
    
    <?php endif; ?>

</div>

</div>

<div>

<?php get_footer(); ?>