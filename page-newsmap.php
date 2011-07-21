<?php
/*
Template Name: News Map
*/
?>


<?php get_header(); ?>

  <div id="content" class="clearfix">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>">
		<h2><?php the_title(); ?></h2>
			<div class="entry-full">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>
				<?php 
				if ( class_exists('GeoMashup') ) {
					echo GeoMashup::map('zoom=11&add_overview_control=false&add_map_type_control=false&map_content=global');	
				} ?>

			</div>

		</div>
        
		<?php endwhile; endif; ?>

  </div>
  
<?php get_footer(); ?>