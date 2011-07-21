<?php
/*
Template Name: Full Width - No Sidebar
*/
?>


<?php get_header(); ?>

  <div id="content" class="clearfix">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry-full">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
                    	<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
        


		<?php endwhile; endif; ?>

  </div>
  
<?php get_footer(); ?>