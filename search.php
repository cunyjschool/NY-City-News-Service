<?php get_header(); ?>

<div id="primary-search">
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
</div>

<div id="content" class="clearfix search_page">

  <ul class="search-results">

  <?php if (have_posts()) : ?>

  <!-- <h2 class="pagetitle">Search Results</h2> -->

    <?php while (have_posts()) : the_post(); ?>

	  <li class="post">
  		<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
  		<small><?php the_time('l, F jS, Y') ?></small>
  		<p><?php the_excerpt(); ?></p>

  		<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?></p>
		</li>

    <?php endwhile; ?>

  	<li class="navigation">
  		<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
  		<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
  	</li>

    <?php else : ?>

    <li><h2 class="center">No posts found. Try a different search?</h2></li>
    
    <?php endif; ?>

    </ul>

    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>