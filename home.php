<?php get_header(); 
	$theme_options = nycns_get_theme_options();
?>

<div class="main">
	
	<div class="wrap">

		<div class="content">
			
			
			<div class="all-posts">
				<?php
					global $wp_query;
					if ( $wp_query->query_vars['paged'] <= 1 ) {
						$args = array(
							'posts_per_page' => 8,
						);
					} else {
						$args = array(
							'posts_per_page' => 10,
							'paged' => $wp_query->query_vars['paged'],
						);
					}
					$all_posts = new WP_Query( $args );
				?>
				<?php if ( $all_posts->have_posts() ): ?>
				
				<?php if ( $wp_query->query_vars['paged'] > 1 ) : ?>
				<div class="pagination">
					<div class="previous-posts-link"><?php previous_posts_link( __( '&laquo; Prior 10 Articles' ) ); ?></div>
				</div>
				<?php endif; ?>
					
				<?php while( $all_posts->have_posts() ): $all_posts->the_post(); ?>
					
					<div class="post-<?php the_id(); ?>" <?php post_class(); ?>>

						<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							
						<div class="entry">
							<?php the_excerpt(); ?>
						</div>

					</div>
					
				<?php endwhile; ?>
				
				<div class="pagination">
					<div class="next-posts-link"><?php next_posts_link( __( 'Next 10 Articles &raquo;' ) ); ?></div>
				</div>
				
				<?php else: ?>
					
					<div class="message info"><?php _e( "There aren't any pieces published at this time." ); ?></div>
					
				<?php endif; ?>
				
			</div>
			
		</div>

	</div>
		
</div>

<?php get_footer(); ?>
