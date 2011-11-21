<?php
/*
Template Name: Special Project - 2009 Economic Pulse
*/
?>


<?php get_header(); ?>

  <div id="content" class="clearfix">

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>">
		<h2 style="font-size: 20px;"><?php the_title(); ?></h2>
			<div class="entry-full">
				<?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

			</div>
				<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>

		</div>
        

        
               <?php endwhile; ?>



<h2>Related Stories</h2>
<?php $posts = new WP_Query('category_name=recession&showposts=9'); ?>
<ul id="pulse-related">
<?php while ($posts->have_posts()) : $posts->the_post(); ?>

	<li>
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( array( 100, 75 ), array( 'class' => 'pulse-thumbnail' ) ); ?></a>
	<?php endif; ?>

<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></li>

               <?php endwhile; endif; ?>
</ul>

	</div>
  </div>
  
<?php get_footer(); ?>