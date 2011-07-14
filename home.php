<?php get_header(); 
	$theme_options = nycns_get_theme_options();
?>

<div class="main">
	
	<div class="wrap">

		<div class="content">			
		
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
				
			<h2 class="recent-headlines">Latest Headlines<?php nycns_show_current_page(); ?></h2>				
			
			<?php if ( $wp_query->query_vars['paged'] > 1 ) : ?>
			<div class="pagination">
				<div class="previous-posts-link"><?php previous_posts_link( __( '&laquo; Prior 10 Articles' ) ); ?></div>
			</div>
			<?php else: ?>
			
		<div class="all-posts">				
			
			<?php endif; ?>
				
			<?php while( $all_posts->have_posts() ): $all_posts->the_post(); ?>
				
				<?php
					$post_classes = array();
					if ( has_post_thumbnail() )
						$post_classes[] = 'has-post-thumbnail';
				?>
				<div <?php post_class( $post_classes ); ?>>
					
					<?php if ( has_post_thumbnail() ): ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'thumbnail-primary', array( 'class' => 'thumbnail float-left' ) ); ?></a>
					<?php endif; ?>
					<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					
					<div class="meta"><?php nycns_author_posts_link(); ?></div>
					
					<div class="entry">
						<?php the_excerpt(); ?>
					</div>
					
					<div class="clear-both"></div>

				</div>
				
			<?php endwhile; ?>
			
		</div>
			
			<div class="pagination">
				<div class="next-posts-link"><?php next_posts_link( __( 'Next 10 Articles &raquo;' ) ); ?></div>
			</div>
			
			<?php else: ?>
				
				<div class="message info"><?php _e( "There aren't any pieces published at this time." ); ?></div>
				
			<?php endif; ?>
			
		</div>

	</div>
		
</div>

<?php get_footer(); ?>
