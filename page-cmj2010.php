<?php
/*
Template Name: Special Project - CMJ 2010
*/
?>

<?php get_header(); ?>

	<div id="content" class="clearfix">
    <div id="special-event-content">
      <h1><?php the_title(); ?></h1>
      
      <?php query_posts("category_name=cmj-2010"); ?>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      	  <div class="post-special-event">
      	    <?php if( $band_date = get_post_meta($post->ID, 'band_date', true) ) { ?><div class="show_date"><small>Date: <?php echo $band_date; ?></small></div><?php } ?>
            <div id="band-photo">
              <h2 class="special-project-post-title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
              <a href="<?php the_permalink(); ?>">
                <?php
                if ( function_exists('yapb_get_thumbnail') ) {
                                  echo yapb_get_thumbnail(
                                    '', // HTML before image tag
                                    array(
                                      'alt' => '', // image tag alt attribute
                                      'rel' => 'lightbox'                      // image tag rel attribute
                                    ),
                                    '',               // HTML after image tag
                                    array('w=315', 'h=236', 'q=100', 'zc=1'), // phpThumb configuration parameters
                                    ''             // image tag custom css class
                                  );
                  }
                                ?>
              </a>
            </div>
            <div class="entry">
              <ul class="band-details">
                <?php if( $band_venue = get_post_meta($post->ID, 'band_venue', true) ) { ?><li><small>Venue: <?php echo $band_venue; ?></small></li><?php } ?>
                <?php if( $band_genre = get_post_meta($post->ID, 'band_genre', true) ) { ?><li><small>Genre: <?php echo $band_genre; ?></small></li><?php } ?>
              </ul>
              <span class="byline">By <?php the_author_posts_link('namefl'); ?><?php if($add_author = get_post_meta($post->ID, 'add_author', true) ) { ?>, <?php echo $add_author; ?><?php } ?><?php if($add_author2 = get_post_meta($post->ID, 'add_author2', true) ) { ?>, <?php echo $add_author2; ?><?php } ?></span>
              <?php the_excerpt() ?>
              <p><a href="<?php the_permalink() ?>" title="Permanent Link to <?php the_title_attribute(); ?>">Read More</a></p>
            </div>
          </div>
          <?php endwhile; else: ?><p>There are currently no stories.</p>
          <?php endif; wp_reset_query(); ?>
  </div>
  <div id="sidebar-special">
    <h1><?php if( $subhead_1 = get_post_meta($post->ID, 'subhead_1', true) ) { ?><?php echo $subhead_1; ?><?php } ?></h1>
    <h1><?php if( $subhead_2 = get_post_meta($post->ID, 'subhead_2', true) ) { ?><?php echo $subhead_2; ?><?php } ?></h1>
    <h1><?php if( $subhead_3 = get_post_meta($post->ID, 'subhead_3', true) ) { ?><?php echo $subhead_3; ?><?php } ?></h1>
    <?php the_content(); ?>
  </div>
</div>
<?php get_footer(); ?>