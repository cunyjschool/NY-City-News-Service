<?php
/*
Template Name: Class Members
*/

?>

<?php get_header(); ?>

  <div id="content" class="clearfix">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="post" id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry">
				<?php the_content(); ?>
			</div>

			<?php edit_post_link('Edit', '<p>', '</p>'); ?>
			
			<div class="class-member-pages">
			<?php
				$args = array(
							'child_of' => $post->ID,
							'sort_order' => 'desc',
						);
				$pages = get_pages( $args );
				
				foreach( $pages as $single_page ) {
					
					echo '<h3><a href="' . get_permalink( $single_page->ID ) . '">';
					echo $single_page->post_title;
					echo '</a></h3>';
					
				} // END foreach( $pages as $single_page )
			?>
			</div>

		</div>

		<?php endwhile; endif; ?>

<?php include (TEMPLATEPATH . '/category-sidebar.php'); ?>
	</div>
  </div>
  
<?php get_footer(); ?>