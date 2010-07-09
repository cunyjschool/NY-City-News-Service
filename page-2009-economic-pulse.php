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
<?php $my_query = new WP_Query('cat=479&showposts=9'); ?>
<ul id="pulse-related">
<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>

 <li>
<?php if (yapb_is_photoblog_post()): ?>
<a href="<?php the_permalink(); ?>">
  <?php
    echo yapb_get_thumbnail(
      '', // HTML before image tag
      array(
        'alt' => '', // image tag alt attribute
        'rel' => 'lightbox' // image tag rel attribute
      ),
      '', // HTML after image tag
      array('w=100', 'h=75', 'q=100', 'zc=1'), // phpThumb configuration parameters
      'pulse-thumbnail' // image tag custom css class
    );
  ?>
</a>
  <?php else: ?>
<?php endif ?>

<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2></li>

               <?php endwhile; endif; ?>
</ul>

	</div>
  </div>
  
<?php get_footer(); ?>